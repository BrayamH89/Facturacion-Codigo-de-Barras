<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BarcodeController extends Controller
{
    const COD_REFERENCIA = '(415)';
    const COD_EMPRESA = '7709998009653';
    const COD_RECAUDO = '(8020)';
    const COD_PAGO = '(3900)';
    const COD_FECHA_RECAUDO = '(96)';

    const DIGITOS_ORDEN_PAGO = 15;
    const DIGITOS_VALOR_PAGO = 8;

    // Formatear los datos para el contenido del código de barras
    public static function setDataFormat($data)
    {
        $codigoSinParentesis = '415' . self::COD_EMPRESA .
                    '8020' . $data["documento"] .
                    str_pad($data["consecutivo"], self::DIGITOS_ORDEN_PAGO, "0", STR_PAD_LEFT) .
                    '3900' . str_pad($data["total"], self::DIGITOS_VALOR_PAGO, "0", STR_PAD_LEFT) .
                    '96' . Carbon::now()->format('Ymd');

        $codigoConParentesis = self::COD_REFERENCIA . self::COD_EMPRESA .
                        self::COD_RECAUDO . $data["documento"] .
                        str_pad($data["consecutivo"], self::DIGITOS_ORDEN_PAGO, "0", STR_PAD_LEFT) .
                        self::COD_PAGO . str_pad($data["total"], self::DIGITOS_VALOR_PAGO, "0", STR_PAD_LEFT) .
                        self::COD_FECHA_RECAUDO . Carbon::now()->format('Ymd');

        return [
            'codigo_barras' => $codigoSinParentesis,   // Solo números, para escáner
            'codigo_texto' => $codigoConParentesis    // Con paréntesis, para mostrar
        ];
    }

    // Generar la imagen del código de barras y guardarla en un archivo
    public static function getCode($stringCode, $filePath)
    {
        if ($stringCode) {
            $generator = new BarcodeGeneratorPNG();
            $barcode = $generator->getBarcode($stringCode, $generator::TYPE_CODE_128);

            file_put_contents($filePath, $barcode);
        }
    }
}