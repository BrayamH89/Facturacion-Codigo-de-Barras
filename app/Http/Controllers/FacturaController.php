<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Usuario;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\BarcodeController;
use Carbon\Carbon;

class FacturaController extends Controller
{
    //Controlador de la vista para subir excel
    public function mostrarFormulario()
    {
        return view('factura.subir_excel');
    }

    //Controlador de la vista para descargar plantilla excel
    public function descargarPlantilla()
    {
        $plantillaPath = public_path('plantillas/plantilla_factura.xlsx');

        if (file_exists($plantillaPath)) {
            return response()->download($plantillaPath);
        } else {
            return redirect()->back()->with('error', 'La plantilla no está disponible.');
        }
    }

    // Controlador procesar el archivo Excel subido
    public function procesarExcel(Request $request)
    {
        $request->validate([
            'archivo_excel' => 'required|file|mimes:xlsx,xls',
        ]);

        $factura = Factura::all();

        try {
            $archivo = $request->file('archivo_excel');
            $filas = Excel::toCollection(null, $archivo)->first();

            unset($filas[0]); // Eliminar encabezados

            $archivosGenerados = [];

            foreach ($filas as $index => $fila) {
                try {
                    $factura = $this->procesarFila($fila);

                    $archivosGenerados[] = [
                        'factura_id' => $factura->id,
                        'numero_factura' => $factura->numero_factura,
                        'archivo' => 'facturas/factura_' . $factura->numero_factura . '.pdf'
                    ];
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', "Error en fila $index: " . $e->getMessage());
                }
            }

            // dd($factura);

            // return response()->json(['mensaje', 'exito']);

            return redirect()->route('Pdfs'); 

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error procesando el archivo: ' . $e->getMessage());
        }
    }

    private function procesarFila($fila)
    {
        $factura = new Factura();
        $factura->numero_factura = $fila[0];
        $factura->matricula_profesional = intval($fila[1]);
        $factura->poliza_medica_semestral = intval($fila[2]);
        $factura->impuesto_procultura = intval($fila[3]);
        $factura->cantidad = intval($fila[4]);
        $factura->nombre_programas = $fila[5];
        $factura->responsable = $fila[6];
        $factura->numero_id = $fila[7];
        $factura->tipo_documento = $fila[8];
        $factura->consecutivo = $fila[9];

        $factura->fecha_factura = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fila[10]);
        $factura->fecha_vencimiento = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fila[11]);

        $subtotal = $factura->matricula_profesional * $factura->cantidad;
        $total = $subtotal + $factura->poliza_medica_semestral + $factura->impuesto_procultura;

        $datosBarcode = [
            'documento' => $factura->identificacion,
            'consecutivo' => $factura->consecutivo,
            'total' => intval($total),
        ];

        // Generar los dos formatos del código
        $codigoData = BarcodeController::setDataFormat($datosBarcode);
        $codigoSinParentesis = $codigoData['codigo_barras'];
        $codigoConParentesis = $codigoData['codigo_texto'];

        // Código de barras
        $barcodeFileName = md5($codigoSinParentesis) . '.png';
        $barcodePath = storage_path('app/public/codigos/' . $barcodeFileName);
        if (!file_exists(dirname($barcodePath))) {
            mkdir(dirname($barcodePath), 0755, true);
        }

        BarcodeController::getCode($codigoSinParentesis, $barcodePath);
        $factura->codigo_barras = $codigoSinParentesis;
        $factura->codigo_texto = $codigoConParentesis;
        $factura->save();

        // PDF
        $barcodeImage = 'data:image/png;base64,' . base64_encode(file_get_contents($barcodePath));

        $logoPath = storage_path('app/public/logos/logo_empresa.png');
        $logoBase64 = file_exists($logoPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath)) : null;

        $sloganPath = storage_path('app/public/logos/slogan.jpg');
        $sloganBase64 = file_exists($sloganPath) ? 'data:image/jpg;base64,' . base64_encode(file_get_contents($sloganPath)) : null;

        // Generar PDF
        $pdf = Pdf::loadView('factura.pdf', [
            'factura' => $factura,
            'barcodeImage' => $barcodeImage,
            'codigoTexto' => $codigoConParentesis,
            'logoBase64' => $logoBase64,
            'sloganBase64' => $sloganBase64,
            'subtotal' => $subtotal,
            'total' => $total
        ]);

        $pdfPath = 'facturas/factura_' . $factura->numero_factura . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        return $factura;
    }

    public function descargarFactura($id)
    {
        $pdfPath = 'factura/factura_' . $id . '.pdf';

        if (!Storage::disk('public')->exists($pdfPath)) {
            return redirect()->back()->with('error', 'El archivo PDF no existe.');
        }

        return Storage::disk('public')->download($pdfPath);
    }

    public function verFactura($id)
    {
        $factura = Factura::findOrFail($id);
        $barcodePath = 'storage/codigos/' . md5($factura->codigo_barras) . '.png';

        // Regenerar si no existe
        if (!file_exists(public_path($barcodePath))) {
            BarcodeController::getCode($factura->codigo_barras, public_path($barcodePath));
        }

        $barcodeBase64 = base64_encode(file_get_contents(public_path($barcodePath)));
        $barcodeImage = 'data:image/png;base64,' . $barcodeBase64;

        $logoPath = storage_path('app/public/logos/logo_empresa.png');
        $logoBase64 = file_exists($logoPath)
            ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath))
            : null;

        $sloganPath = storage_path('app/public/logos/slogan.jpg');
        $sloganBase64 = file_exists($sloganPath)
            ? 'data:image/jpg;base64,' . base64_encode(file_get_contents($sloganPath))
            : null;

        return view('factura.pdf', [
            'factura' => $factura,
            'barcodeImage' => $barcodeImage,
            'codigoTexto' => $factura->codigo_texto, // Mostrar el texto con paréntesis
            'logoBase64' => $logoBase64,
            'sloganBase64' => $sloganBase64
        ]);
    }


    public function mostrarPdfs()
    {
        $factura=Factura::all();

        return view('factura.descargar_factura', compact('factura'));
    }
}