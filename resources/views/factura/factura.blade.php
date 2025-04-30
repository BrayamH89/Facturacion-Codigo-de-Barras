<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
    <meta name="author" content="Andres Alexander Lopez Guerra" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- by andres alexander lopez guerra -->
    <link rel="stylesheet" href="{{ asset('resources/css/recibo/estilos.css') }}">
    <script src="{{ asset('lib/html2pdf.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/JsBarcode.all.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        button:hover {
            cursor: pointer;
        }

        .espacios {
            padding: 30px;
        }
    </style>
</head>

<body>
    {{-- <div style="text-align: center;" class="container">
        <button id="btnCrearPdf" class="btn btn-success"
            style="background-color: #4CAF50; width:140px; height: 40px; border-radius:8px; border-color:#FABF21; color: white; font-size:18px; float: left;">
            Generar PDF
        </button>

        <button id="btnPagoVirtual" class="btn btn-success"
            style="background-color: #4CAF50; width:140px; height: 40px; border-radius:8px; border-color:#FABF21; color: white; font-size:18px; float: left;">
            Pago Virtual
        </button>

        <button id="btnRegresar" class="btn btn-warning"
            style="background-color: #FFC107; width:140px; height: 40px; border-radius:8px; border-color:#FABF21; color: white; font-size:18px; float: right;">
            Regresar
        </button>
    </div> --}}
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 10px;" class="container">
        <!-- Contenedor para los dos primeros botones -->
        <div style="display: flex; gap: 10px;">
            <button id="btnCrearPdf" class="btn btn-success"
                style="background-color: #4CAF50; width:140px; height: 40px; border-radius:8px; border-color:#FABF21; color: white; font-size:18px;">
                Generar PDF
            </button>
    
            <a href="https://www.avalpaycenter.com/wps/portal/portal-de-pagos/web/pagos-aval/resultado-busqueda/realizar-pago?idConv=00012179&origen=buscar" class="btn btn-success" 
                style="background-color: #1e4c77; width:140px; height: 40px; border-radius:8px; border-color:#FABF21; color: white; font-size:18px; text-align: center; display: inline-block;">
             Pago Virtual
            </a>

        </div>
    
        <!-- Botón al lado derecho -->
        <button id="btnRegresar" class="btn btn-warning"
            style="background-color: #FFC107; width:140px; height: 40px; border-radius:8px; border-color:#FABF21; color: white; font-size:18px;">
            Regresar
        </button>
    </div>
    <div class="espacios"></div>
    <div id="contenedor_tabla">
        <div class="col-md-12">
            <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 mx-auto">
                <col class="col0">
                <col class="col1">
                <col class="col2">
                <col class="col3">
                <col class="col4">
                <col class="col5">
                <col class="col6">
                <col class="col7">
                <col class="col8">
                <col class="col9">
                <col class="col10">
                <tbody>
                    <tr class="row0">
                        <td class="column0 style23 null style23" colspan="3" rowspan="3"><img
                                src="{{ asset('resources/imgs/recibo/Logo_Unicatolica.png') }}" width="200" height="70"></td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row1">
                        <td class="column4">&nbsp;</td>
                        <td class="column5 style25 s style25" colspan="3" rowspan="2">ORDEN DE RECIBO DE PAGO No.
                        </td>
                        <td class="column8 style26 s style26" rowspan="2">{{ $factura->numero_factura }}</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row2">
                        <td class="column4">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row3">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style30 s style30" colspan="3">NIT: 800.185.664-6</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7 style2 null"></td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>

                    <tr class="row5">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style505 s style505" colspan="3">FECHA DE EXPEDICIÓN</td>
                        <td class="column4 style505 s style505" rowspan="2"></td>
                        <td class="column5 style261 s">ESTUDIANTE:</td>
                        <td class="column6 style481 s style481" colspan="3">{{ $factura->identificacion }}</td>
                        <td class="column9 style241 s">&nbsp;CURSO VIRTUAL</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row6">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style611 s text-center">AÑO</td>
                        <td class="column2 style611 s text-center">MES</td>
                        <td class="column3 style611 s text-center">DÍA</td>
                        <td class="column5 style271 s">{{ $factura->tipo_documento }} :</td>
                        <td class="column6 style481 s style481" colspan="3">{{ $factura->identificacion }}</td>
                        <td class="column9 style401 s style401" rowspan="3">{{ $factura->nombre_programas }}</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row7">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style35 s style35" rowspan="2">{{ \Carbon\Carbon::parse($factura->fecha_factura)->format('Y') }}</td>
                        <td class="column2 style35 s style35" rowspan="2">{{ \Carbon\Carbon::parse($factura->fecha_factura)->format('m') }}</td>
                        <td class="column3 style35 s style35" rowspan="2">{{ \Carbon\Carbon::parse($factura->fecha_factura)->format('d') }}</td>
                        <td class="column4 style35 s style35" rowspan="2"></td>
                        <td class="column5 style57 s style58" rowspan="2">RESPONSABLE: </td>
                        <td class="column6 style36 s style36" colspan="3" rowspan="2">
                            {{ $factura->responsable  }}</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row8">
                        <td class="column0">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row9">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style44 null style44" colspan="9"></td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row10">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style50 s style50" colspan="5">CONCEPTOS</td>
                        <td class="column6 style51 s style52" colspan="2">CARGOS</td>
                        <td class="column8 style53 s">CANTIDAD</td>
                        <td class="column9 style54 s">BALANCES</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row11">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style38 s style38" colspan="5">-  Curso Virtual</td>
                        <td class="column6 style21 s">${{ number_format($factura->precio, 0, ',', '.') }}</td>
                        <td class="column7 style21 null"></td>
                        <td class="column8 style21 s">{{ $factura->cantidad }}</td>
                        <td class="column9 style21 s">${{ number_format($factura->precio * $factura->cantidad, 0, ',', '.') }}
                        </td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row12">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style42 s style42" colspan="5">- Valor Descuento</td>
                        <td class="column6 style22 s">${{ number_format($factura->descuento, 0, ',', '.') }}</td>
                        <td class="column7 style22 null"></td>
                        <td class="column8 style22 s">1</td>
                        <td class="column9 style22 s">-${{ number_format($factura->descuento, 0, ',', '.') }}</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row13">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style38 s style38" colspan="5"></td>
                        <td class="column6 style21 s"></td>
                        <td class="column7 style21 null"></td>
                        <td class="column8 style21 s"></td>
                        <td class="column9 style21 s"></td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row15">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style34 s style34" colspan="6">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="column7 style49 s style49" colspan="2">TOTALES: </td>
                        <td class="column9 style48 s">
                            ${{ number_format($factura->total, 0, ',', '.') }}
                        </td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row17">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style40 s style40" colspan="5">FECHA DE VENCIMIENTO: {{ \Carbon\Carbon::parse($factura->fecha_vencimiento)->format('F d, Y') }}
                        </td>
                        <td class="column6 style41 null style41" colspan="4"></td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row18">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style31 s style31" colspan="9">- Páguese en las entidades financieras indicadas en la parte inferior de la orden de pago</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row19">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style47 s style47" colspan="9">DOCUMENTO PARA EL ESTUDIANTE</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row21">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style32 s style32" colspan="2">ORDEN RECIBO DE PAGO No.</td>
                        <td class="column3 style27 s style27" colspan="2">{{  $factura->id_factura }}</td>
                        <td class="column5 style12 s">RESPONSABLE:</td>
                        <td class="column6 style33 s style33" colspan="4">{{ $factura->responsable }} </td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row23">
                        <td class="column0">&nbsp;</td>
                        <td class="column1">&nbsp;</td>
                        <td class="column2 style11 s"></td>
                        <td class="column3 style27 s style27" colspan="2"></td>
                        <td class="column5 style12 s">IDENTIFICACIÓN:</td>
                        <td class="column6 style33 s style33" colspan="4">{{ $factura->identificacion }} </td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row24">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style17 null"></td>
                        <td class="column2 style13 null"></td>
                        <td class="column3 style18 null"></td>
                        <td class="column4 style18 null"></td>
                        <td class="column5 style14 null"></td>
                        <td class="column6 style15 null"></td>
                        <td class="column7 style15 null"></td>
                        <td class="column8 style15 null"></td>
                        <td class="column9 style15 null"></td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row25">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style60 s style60" colspan="9">RREALICE EL PAGO EN BANCO DE BOGOTÁ, COOPERATIVA MINUTO DE DIOS, OFICINAS GANE, SEDE MELÉNDEZ</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row27">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style46 s style46" colspan="4">RELACIÓN DE CHEQUES</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6 style46 s style46" colspan="2">FECHA DE VENCIMIENTO</td>
                        <td class="column8 style27 s style27" colspan="2">{{ \Carbon\Carbon::parse($factura->fecha_vencimiento)->format('F d, Y') }}</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row28">
                        <td class="column0">&nbsp;</td>
                        <td class="column1">&nbsp;</td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row29">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style16 s">C. BCO.</td>
                        <td class="column2 style16 s style16 mx-auto" colspan="2">No.CHEQUE</td>
                        <td class="column4 style16 s text-center">C.CHEQUES</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6 style45 s style45" colspan="2" rowspan="2">TOTAL A PAGAR</td>
                        <td class="column8 style27 s style27" colspan="2" rowspan="2">${{ number_format($factura->total, 0, ',', '.') }}</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row30">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style20 null"></td>
                        <td class="column2 style29 null style29" colspan="2"></td>
                        <td class="column4 style20 null"></td>
                        <td class="column5">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>

                    <tr class="row32">
                        <td class="column0">&nbsp;</td>
                        <td class="column1"></td>
                        <td class="column2 " colspan="2"></td>
                        <td class="column4"></td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6 style23 null style23" colspan="3" rowspan="6">
                                <div class="text-center" style="width: 300px; height: 200px ; display: flex; align-items: center">
                                    <!--REALIZAR CONSIGNACIÓN EN EL BANCO DE BOGOTA EN ESTA CUENTA 249031790-->
                                </div></td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    {{-- <tr class="row33">
                        <td class="column0">&nbsp;</td>
                        <td class="column1">&nbsp;</td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column10">&nbsp;</td> --}}
                    <tr class="row34">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style46 s style46" colspan="4">VALOR</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row35">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style39 s style39" colspan="2">EFECTIVO</td>
                        <td class="column3 style39 null style39" colspan="2"></td>
                        <td class="column5">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row36">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style43 s style43" colspan="2">CH DE ESTE BCO</td>
                        <td class="column3 style43 null style43" colspan="2"></td>
                        <td class="column5">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row37">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style39 s style39" colspan="2">TOTAL A PAGAR</td>
                        <td class="column3 style39 null style39" colspan="2"></td>
                        <td class="column5">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row39">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style47 s style47" colspan="9">DOCUMENTO PARA EL BANCO</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row40">
                        <td class="column0">&nbsp;</td>
                        <td class="column1" colspan="9" rowspan="7" style="text-align: center; vertical-align: middle;">
                            <img src="{{ asset($barcodePath) }}" alt="Código de Barras" style="width: 300px; height: auto;">
                        </td>
                        </td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                     <tr class="row41">
                        <td class="column0">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    {{--</tr>
                    <tr class="row42">
                        <td class="column0">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row43">
                        <td class="column0">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row44">
                        <td class="column0">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row45">
                        <td class="column0">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row46">
                        <td class="column0">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row47">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style1 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row48">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row49">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                    </tr>
                    <tr class="row50">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row51">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row52">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row53">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row54">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row55">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style2 null"></td>
                        <td class="column2">&nbsp;</td>
                        <td class="column3">&nbsp;</td>
                        <td class="column4">&nbsp;</td>
                        <td class="column5">&nbsp;</td>
                        <td class="column6">&nbsp;</td>
                        <td class="column7">&nbsp;</td>
                        <td class="column8">&nbsp;</td>
                        <td class="column9">&nbsp;</td>
                        <td class="column10">&nbsp;</td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</html>
<script>
    const $boton = document.getElementById("btnCrearPdf");
    const $divCaptura = document.getElementById("contenedor_tabla");
    $boton.addEventListener("click", () => {

            //const $elementoParaConvertir = document.body; // Elemento del DOM que quieres convertir en PDF
        
        console.log('hola');
        
        html2pdf($divCaptura, {
            margin: [0, 2, 0, 0], // Margenes del PDF [arriba, derecha, abajo, izquierda]
            filename: 'documento.pdf', // Nombre del archivo PDF
            image: {
                type: 'jpeg',
                quality: 0.98
            }, // Configuración de la imagen
            html2canvas: {
                scale: 1,
                letterRendering: true
            }, // Reducción del escalamiento para evitar sobredimensionamiento
            jsPDF: {
                unit: "mm",
                format: [215.9, 279.4],
                orientation: 'portrait'
            } // Tamaño de papel carta y orientación
        });

    });
</script>

