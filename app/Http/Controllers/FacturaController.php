<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Usuario;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use PDF;
use Picqer\Barcode\BarcodeGeneratorPNG;

class FacturaController extends Controller
{
    // Vista para subir el Excel
    public function mostrarFormulario()
    {
        return view('factura.subir_excel');
    }

    // Descargar plantilla Excel
    public function descargarPlantilla()
    {
        $plantillaPath = public_path('plantillas/plantilla_factura.xlsx');

        if (file_exists($plantillaPath)) {
            return response()->download($plantillaPath);
        } else {
            return redirect()->back()->with('error', 'La plantilla no está disponible.');
        }
    }

    // Procesar el archivo Excel subido
    public function procesarExcel(Request $request)
    {
        $request->validate([
            'archivo_excel' => 'required|file|mimes:xlsx,xls',
        ]);

        try {
            $archivo = $request->file('archivo_excel');
            $datos = Excel::toArray([], $archivo);
            $facturaData = $datos[0][1];

            // Generar ID de factura personalizado
            $idFactura = 'FAC-' . date('Ymd') . '-' . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);

            // Verificar si el ID ya existe
            if (Factura::where('id_factura', $idFactura)->exists()) {
                throw new \Exception('El ID de factura generado ya existe');
            }

            $factura = new Factura();
            $factura->id_factura = $facturaData[0];// Asignar el ID personalizado
            $factura->descripcion_oferta = $facturaData[1];
            $factura->precio = $facturaData[2];
            $factura->descuento = $facturaData[3];
            $factura->cantidad = $facturaData[4];
            $factura->subtotal = $facturaData[5];
            $factura->total = $facturaData[6];
            $factura->nombre_programas = $facturaData[7];
            $factura->responsable = $facturaData[8];
            $factura->identificacion = $facturaData[9];
            $factura->consecutivo = $facturaData[10];

            // Manejo seguro de fechas
            try {
                $factura->fecha_factura = $facturaData[11];
            } catch (\Exception $e) {
                $factura->fecha_factura = now();
            }

            try {
                $factura->fecha_vencimiento = $facturaData[12];
            } catch (\Exception $e) {
                $factura->fecha_vencimiento = $factura->fecha_factura->copy()->addDays(30);
            }

            // Generar código de barras
            $codigo = 'FACT-' . uniqid();
            $generator = new BarcodeGeneratorPNG();
            $barcode = $generator->getBarcode($codigo, $generator::TYPE_CODE_128);
            
            // Asegurar que el directorio existe
            $barcodeDir = public_path('storage/codigos');
            if (!file_exists($barcodeDir)) {
                mkdir($barcodeDir, 0755, true);
            }
            
            $barcodePath = 'storage/codigos/' . $codigo . '.png';
            file_put_contents(public_path($barcodePath), $barcode);

            $factura->codigo_barras = $codigo;
            $factura->save();

            // Generar PDF
            $pdf = PDF::loadView('factura.pdf', [
                'factura' => $factura,
                'barcodePath' => $barcodePath
            ]);
            
            $pdfPath = 'facturas/factura_' . $factura->id_factura . '.pdf';
            Storage::disk('public')->put($pdfPath, $pdf->output());

            return redirect()->route('factura.descargar', basename($pdfPath))
                ->with('success', 'Factura generada correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al procesar el archivo: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Vista de descarga de la factura
    public function vistaDescarga($archivoFactura)
    {
        return view('factura.descargar_factura', compact('archivoFactura'));
    }

    public function verFactura($id)
    {
        $factura = Factura::findOrFail($id);
        $barcodePath = 'storage/codigos/' . $factura->codigo_barras . '.png';

        // Si el código de barras no existe, lo regeneramos
        if (!file_exists(public_path($barcodePath))) {
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            $barcode = $generator->getBarcode($factura->codigo_barras, $generator::TYPE_CODE_128);
            file_put_contents(public_path($barcodePath), $barcode);
        }

        return view('factura.pdf', compact('factura', 'barcodePath'));
    }
}