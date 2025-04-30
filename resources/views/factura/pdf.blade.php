<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="generator" content="PhpSpreadsheet, https://github.com/PHPOffice/PhpSpreadsheet">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
</head>

<body>
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
                    <td class="column0 style23 null style23" colspan="3" rowspan="3">
                        <img src="{{ $logoBase64 }}" style="width: 200px; height: auto; display: block; margin: 0 auto;" />
                    </td>
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
                        <td class="column1 style505 s style505" colspan="3" style="text-align: center;">FECHA DE EXPEDICIÓN</td>
                        <td class="column4 style505 s style505" rowspan="2" style="text-align: center;"></td>
                        <td class="column5 style261 s" style="text-align: center;">TIPO DOCUMENTO:</td>
                        <td class="column6 style481 s style481" colspan="3">{{ $factura->tipo_documento  }}</td>
                        <td class="column9 style241 s" style="text-align: center;">PROGRAMA ACADEMICO</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row6">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style611 s text-center">AÑO</td>
                        <td class="column2 style611 s text-center">MES</td>
                        <td class="column3 style611 s text-center">DÍA</td>
                        <td class="column5 style261 s" style="text-align: center;">DOCUMENTO:</td>
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
                        <td class="column5 style57 s style58" rowspan="2" style="text-align: center;">RESPONSABLE: </td>
                        <td class="column6 style36 s style36" colspan="3" rowspan="2">
                            {{ $factura->responsable }}</td>
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
                        <td class="column1 style38 s style38" colspan="5">- Matricula Profesional</td>
                        <td class="column6 style21 s">${{ number_format($factura->matricula_profesional, 0, ',', '.') }}</td>
                        <td class="column7 style21 null"></td>
                        <td class="column8 style21 s">{{ $factura->cantidad }}</td>
                        <td class="column9 style21 s">${{ number_format($factura->matricula_profesional * $factura->cantidad, 0, ',', '.') }}
                        </td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row12">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style42 s style42" colspan="5">- Poliza Medica Semestral</td>
                        <td class="column6 style22 s">${{ number_format($factura->poliza_medica_semestral, 0, ',', '.') }}</td>
                        <td class="column7 style22 null"></td>
                        <td class="column8 style22 s">1</td>
                        <td class="column9 style22 s">${{ number_format($factura->poliza_medica_semestral, 0, ',', '.') }}</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row13">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style42 s style42" colspan="5">- Impuesto Procultura</td>
                        <td class="column6 style22 s">${{ number_format($factura->impuesto_procultura, 0, ',', '.') }}</td>
                        <td class="column7 style21 null"></td>
                        <td class="column8 style21 s">1</td>
                        <td class="column9 style21 s">${{ number_format($factura->impuesto_procultura, 0, ',', '.') }}</td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    <tr class="row15">
                        <td class="column0">&nbsp;</td>
                        <td class="column1 style34 s style34" colspan="6">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="column7 style49 s style49" colspan="2">TOTALES: </td>
                        <td class="column9 style48 s">
                            ${{ number_format($total = $subtotal + $factura->poliza_medica_semestral + $factura->impuesto_procultura, 0, ',', '.') }}
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
                        <td class="column3 style27 s style27" colspan="2">{{  $factura->numero_factura }}</td>
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
                        <td class="column8 style27 s style27" colspan="2" rowspan="2">${{ number_format($total = $subtotal + $factura->poliza_medica_semestral + $factura->impuesto_procultura, 0, ',', '.') }}</td>
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
                            <img src="{{ $barcodeImage }}" style="width: 50%; height: 100px; display: block; margin: 0 auto;">
                            <br>
                            <span style="font-size: 14px;">{{ $factura->codigo_barras }}</span>
                        </td>
                        </td>
                        <td class="column10">&nbsp;</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const $boton = document.getElementById("btnCrearPdf");
        const $divCaptura = document.getElementById("contenedor_tabla");

        // Si hay un botón, agregamos el evento
        if ($boton) {
            $boton.addEventListener("click", generarPDF);
        }

        // Función para generar el PDF
        function generarPDF() {
            const opt = {
                margin: [5, 5, 5, 5],
                filename: 'recibo_pago.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: {
                    scale: 1,
                    useCORS: true,
                    scrollY: 0,
                    windowHeight: $divCaptura.scrollHeight
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'letter',
                    orientation: 'portrait'
                },
                // ⚠️ Agregamos esta opción para permitir el corte en múltiples páginas
                pagebreak: {
                    mode: ['avoid-all', 'css', 'legacy']
                }
            };

            // Esperar a que las imágenes estén cargadas
            Promise.all(
                Array.from(document.images).map(img => {
                    if (!img.complete) {
                        return new Promise((resolve, reject) => {
                            img.onload = resolve;
                            img.onerror = reject;
                        });
                    }
                    return Promise.resolve();
                })
            ).then(() => {
                html2pdf().set(opt).from($divCaptura).save();
            }).catch(error => {
                console.error("Error al cargar imágenes:", error);
                html2pdf().set(opt).from($divCaptura).save();
            });
        }

        // Generar automáticamente si no hay botón
        if (!document.getElementById("btnCrearPdf")) {
            generarPDF();
        }
    });
</script>

<style>

a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
div.comment { display:none }
table { border-collapse:collapse; page-break-after:always }
.gridlines td { border:1px dotted black }
.gridlines th { border:1px dotted black }
.b { text-align:center }
.e { text-align:center }
.f { text-align:right }
.inlineStr { text-align:left }
.n { text-align:right }
.s { text-align:left }
td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
td.style1 { vertical-align:middle; text-align:left; padding-left:135px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style1 { vertical-align:middle; text-align:left; padding-left:135px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style2 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style2 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style3 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style3 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style4 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style5 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style5 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style6 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style6 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style7 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style7 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style8 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style8 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style9 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style9 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
th.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
td.style11 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style11 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style12 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style12 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style13 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style13 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style14 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style14 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style15 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style15 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style16 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style17 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style17 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style18 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style18 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style19 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style19 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style20 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style20 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style21 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style21 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style22 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style22 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style23 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style23 { vertical-align:bottom; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style24 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style24 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style25 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:11pt; background-color:white }
th.style25 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:11pt; background-color:white }
td.style26 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:11pt; background-color:white }
th.style26 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:11pt; background-color:white }
td.style27 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style27 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style28 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style28 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style29 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style29 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style30 { vertical-align:middle; text-align:left; padding-left:18px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style30 { vertical-align:middle; text-align:left; padding-left:18px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style31 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:9pt; background-color:white }
th.style31 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:9pt; background-color:white }
td.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style32 { vertical-align:middle; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style33 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style33 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style34 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style34 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#FFFFFF; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style35 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style35 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style36 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style36 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style37 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style37 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style38 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style38 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style39 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style39 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style40 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style40 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style41 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
th.style41 { vertical-align:middle; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:10pt; background-color:white }
td.style42 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style42 { vertical-align:middle; text-align:left; padding-left:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style43 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
th.style43 { vertical-align:middle; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#E7E6E6 }
td.style44 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style44 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style45 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:11pt; background-color:#B4C6E7 }
th.style45 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:11pt; background-color:#B4C6E7 }
td.style46 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#B4C6E7 }
th.style46 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#B4C6E7 }
td.style47 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#8EAADB }
th.style47 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#8EAADB }
td.style48 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#8EAADB }
th.style48 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#8EAADB }
td.style49 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#8EAADB }
th.style49 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:12pt; background-color:#8EAADB }
td.style50 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style50 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style51 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #FFFFFF !important; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style51 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #FFFFFF !important; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style52 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #FFFFFF !important; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style52 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:1px solid #FFFFFF !important; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style53 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style53 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style54 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #FFFFFF !important; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style54 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:1px solid #FFFFFF !important; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style55 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:1px solid #FFFFFF !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style55 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:1px solid #FFFFFF !important; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style56 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style56 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style57 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:1px solid #FFFFFF !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style57 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:1px solid #FFFFFF !important; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style58 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
th.style58 { vertical-align:middle; text-align:right; padding-right:9px; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#8EAADB }
td.style59 { vertical-align:middle; text-align:center; border-bottom:1px solid #B4C6E7 !important; border-top:1px solid #B4C6E7 !important; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style59 { vertical-align:middle; text-align:center; border-bottom:1px solid #B4C6E7 !important; border-top:1px solid #B4C6E7 !important; border-left:none #000000; border-right:none #000000; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
td.style60 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
th.style60 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; font-weight:bold; color:#335593; font-family:'Calibri'; font-size:10pt; background-color:#FFFFFF }
table.sheet0 col.col0 { width:6.09999993pt }
table.sheet0 col.col1 { width:56.25555491pt }
table.sheet0 col.col2 { width:53.54444383pt }
table.sheet0 col.col3 { width:49.47777721pt }
table.sheet0 col.col4 { width:42pt }
table.sheet0 col.col5 { width:66.42222146pt }
table.sheet0 col.col6 { width:56.93333268pt }
table.sheet0 col.col7 { width:14.91111094pt }
table.sheet0 col.col8 { width:58.96666599pt }
table.sheet0 col.col9 { width:84.04444348pt }
table.sheet0 col.col10 { width:4.74444439pt }
table.sheet0 tr { height:15pt }
table.sheet0 tr.row0 { height:14.5pt }
table.sheet0 tr.row1 { height:14.5pt }
table.sheet0 tr.row2 { height:13pt }
table.sheet0 tr.row3 { height:13pt }
table.sheet0 tr.row4 { height:4.5pt }
table.sheet0 tr.row5 { height:18.5pt }
table.sheet0 tr.row6 { height:18.5pt }
table.sheet0 tr.row7 { height:15.5pt }
table.sheet0 tr.row8 { height:15pt }
table.sheet0 tr.row9 { height:2pt }
table.sheet0 tr.row10 { height:17.5pt }
table.sheet0 tr.row11 { height:16.5pt }
table.sheet0 tr.row12 { height:16.5pt }
table.sheet0 tr.row13 { height:16.5pt }
table.sheet0 tr.row14 { height:16.5pt }
table.sheet0 tr.row15 { height:19.5pt }
table.sheet0 tr.row16 { height:2pt }
table.sheet0 tr.row17 { height:13pt }
table.sheet0 tr.row18 { height:70pt }
table.sheet0 tr.row19 { height:15.5pt }
table.sheet0 tr.row20 { height:13pt }
table.sheet0 tr.row21 { height:23pt }
table.sheet0 tr.row22 { height:2pt }
table.sheet0 tr.row23 { height:20pt }
table.sheet0 tr.row24 { height:5.5pt }
table.sheet0 tr.row25 { height:24pt }
table.sheet0 tr.row26 { height:5pt }
table.sheet0 tr.row27 { height:26pt }
table.sheet0 tr.row28 { height:4.5pt }
table.sheet0 tr.row29 { height:13pt }
table.sheet0 tr.row30 { height:16pt }
table.sheet0 tr.row31 { height:16pt }
table.sheet0 tr.row32 { height:16pt }
table.sheet0 tr.row33 { height:5pt }
table.sheet0 tr.row34 { height:17pt }
table.sheet0 tr.row35 { height:13pt }
table.sheet0 tr.row36 { height:13pt }
table.sheet0 tr.row37 { height:13pt }
table.sheet0 tr.row38 { height:5.5pt }
table.sheet0 tr.row39 { height:17pt }
table.sheet0 tr.row40 { height:13pt }
table.sheet0 tr.row41 { height:13pt }
table.sheet0 tr.row42 { height:13pt }
table.sheet0 tr.row43 { height:13pt }
table.sheet0 tr.row44 { height:13pt }
table.sheet0 tr.row45 { height:13pt }
table.sheet0 tr.row46 { height:13pt }
table.sheet0 tr.row47 { height:13pt }
table.sheet0 tr.row48 { height:13pt }
table.sheet0 tr.row49 { height:13pt }
table.sheet0 tr.row50 { height:13pt }
table.sheet0 tr.row51 { height:13pt }

html { 
    font-family: 'Calibri'; 
    font-size: 11pt; 
    background-color: white;
    margin: 0;
    padding: 0;
}
        
@media print {
    .no-print {
        display: none;
    }
    body {
        margin: 0;
        padding: 0;
    }
}
        
#contenedor_tabla {
    padding: 5px;
}
/* mis estilos  */

table.sheet0 {
    width: 100%;
    border-collapse: collapse;
    page-break-inside: avoid;
}
        
table.sheet0 tr {
    height: auto !important;
    min-height: 12pt;
}
        
table.sheet0 td {
    padding: 2px;
}

td.style505 {
    vertical-align: middle;
    text-align: center;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #FFFFFF;
}

th.style505 {
    vertical-align: middle;
    text-align: center;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #FFFFFF
}

td.style261 {
    vertical-align: middle;
    text-align: right;
    padding-right: 9px;
    border-bottom: 1px solid #FFFFFF !important;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB;
}

th.style261 {
    vertical-align: middle;
    text-align: right;
    padding-right: 9px;
    border-bottom: 1px solid #FFFFFF !important;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB
}

td.style481 {
    vertical-align: middle;
    text-align: left;
    padding-left: 9px;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #FFFFFF
}

th.style481 {
    vertical-align: middle;
    text-align: left;
    padding-left: 9px;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #FFFFFF
}

td.style241 {
    vertical-align: middle;
    text-align: center;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB
}

th.style241 {
    vertical-align: middle;
    text-align: center;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB
}

td.style611 {
    vertical-align: middle;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB
}

th.style611 {
    vertical-align: middle;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB
}

td.style271 {
    vertical-align: middle;
    text-align: right;
    padding-right: 9px;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB
}

th.style271 {
    vertical-align: middle;
    text-align: right;
    padding-right: 9px;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    font-weight: bold;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: #8EAADB
}

td.style401 {
    vertical-align: middle;
    text-align: center;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: white
}

th.style401 {
    vertical-align: middle;
    text-align: center;
    border-bottom: none #000000;
    border-top: none #000000;
    border-left: none #000000;
    border-right: none #000000;
    color: #335593;
    font-family: 'Calibri';
    font-size: 10pt;
    background-color: white
}

</style>

