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

        try {
            $archivo = $request->file('archivo_excel');
            $datos = Excel::toArray([], $archivo);
            $filas = $datos[0];

            unset($filas[0]); // Eliminar cabecera

            $archivosGenerados = [];

            foreach ($filas as $index => $facturaData) {
                try {
                    $factura = new Factura();
                    $factura->numero_factura = $facturaData[0];
                    $factura->matricula_profesional = intval($facturaData[1]);
                    $factura->poliza_medica_semestral = intval($facturaData[2]);
                    $factura->impuesto_procultura = intval($facturaData[3]);
                    $factura->cantidad = intval($facturaData[4]);

                    $subtotal = $factura->matricula_profesional * $factura->cantidad;
                    $total = $subtotal + $factura->poliza_medica_semestral + $factura->impuesto_procultura;

                    $factura->nombre_programas = $facturaData[5];
                    $factura->responsable = $facturaData[6];
                    $factura->identificacion = $facturaData[7];
                    $factura->tipo_documento = $facturaData[8];
                    $factura->consecutivo = $facturaData[9];

                    // Validar y convertir fecha de Excel
                    $fechaFactura = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($facturaData[10]);
                    $fechaVencimiento = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($facturaData[11]);

                    $factura->fecha_factura = $fechaFactura;
                    $factura->fecha_vencimiento = $fechaVencimiento;

                    // Generar código de barras
                    $datosBarcode = [
                        'documento' => $factura->identificacion,
                        'consecutivo' => $factura->consecutivo,
                        'total' => intval($total),
                    ];
                    $codigo = BarcodeController::setDataFormat($datosBarcode);

                    $barcodeFileName = md5($codigo) . '.png';
                    $barcodePath = public_path('storage/codigos/' . $barcodeFileName);
                    if (!file_exists(dirname($barcodePath))) mkdir(dirname($barcodePath), 0755, true);

                    BarcodeController::getCode($codigo, $barcodePath);

                    $factura->codigo_barras = $codigo;
                    $factura->save();

                    // Convertir imagen de código a base64
                    $barcodeBase64 = base64_encode(file_get_contents($barcodePath));
                    $barcodeImage = 'data:image/png;base64,' . $barcodeBase64;

                    // Logo
                    $logoPath = storage_path('app/public/logos/logo_empresa.png');
                    $logoBase64 = file_exists($logoPath)
                        ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath))
                        : null;

                    // Generar PDF
                    $pdf = Pdf::loadView('factura.pdf', [
                        'factura' => $factura,
                        'barcodeImage' => $barcodeImage,
                        'logoBase64' => $logoBase64,
                        'total' => $total,
                        'subtotal' => $subtotal
                    ]);

                    $pdfPath = 'facturas/factura_' . $factura->id . '.pdf';
                    Storage::disk('public')->put($pdfPath, $pdf->output());

                    $archivosGenerados[] = [
                        'factura_id' => $factura->id,
                        'archivo' => $pdfPath
                    ];

                } catch (\Exception $e) {
                    return redirect()->back()->with('error', "Error en la fila $index: " . $e->getMessage());
                }
            }

            return view('factura.descargar_factura', compact('archivosGenerados'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al procesar el archivo: ' . $e->getMessage());
        }
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

        // Si el código de barras no existe, lo regeneramos
        if (!file_exists(public_path($barcodePath))) {
            BarcodeController::getCode($factura->codigo_barras, public_path($barcodePath));
        }

        $barcodeBase64 = base64_encode(file_get_contents(public_path($barcodePath)));
        $barcodeImage = 'data:image/png;base64,' . $barcodeBase64;

        $logoPath = storage_path('app/public/logos/logo_empresa.png');
        $logoBase64 = file_exists($logoPath)
            ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath))
            : null;

        return view('factura.pdf', compact('factura', 'barcodeImage', 'logoBase64'));
    }
}