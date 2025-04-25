<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ayeo\Barcode;
use Carbon\Carbon;

class BarcodeController extends Controller
{
    const COD_REFERENCIA = '(415)';
    const COD_EMPRESA ='7709998009653';
    const COD_RECAUDO ='(8020)';
    const COD_PAGO ='(3900)';
    const COD_FECHA_RECAUDO ='(96)';

    const DIGITOS_ORDEN_PAGO = 15;
    const DIGITOS_VALOR_PAGO = 8;

    function getCode($stringCode){
        //dd($stringCode);
        if($stringCode){
            $codeBuilder = new Barcode\Builder();
            $codeBuilder->setBarcodeType('gs1-128');
            $codeBuilder->setWidth(600);
            $codeBuilder->setHeight(120);

            $codeBuilder->output($stringCode);
            // $codeBuilder->output('(10)123456(400)11');
        }
    }

    public static function setDataFormat($data){
        $formatStringCode = self::COD_REFERENCIA .
                            self::COD_EMPRESA .
                            self::COD_RECAUDO .
                            $data["documento"] .
                            str_pad($data["consecutivo"], self::DIGITOS_ORDEN_PAGO, "0", STR_PAD_LEFT) .
                            self::COD_PAGO .
                            str_pad($data["total"], self::DIGITOS_VALOR_PAGO, "0", STR_PAD_LEFT) .
                            self::COD_FECHA_RECAUDO .
                            Carbon::now()->format('Ymd');
        ;

        return $formatStringCode;
    }

    

}