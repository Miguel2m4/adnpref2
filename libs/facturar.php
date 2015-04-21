<?php
include("conexion.php");

@$codigo = $_POST['cod'];

$meses = ['ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'];

require_once('tcpdf.php');

      class MYPDF extends TCPDF {

          public function Header() {
              $image_file = '../images/head.jpg';
              $this->Image($image_file, 25, 5, 135, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
          }
      }

      // create new PDF document
      $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      // set default header data
      $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

      // set header and footer fonts
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

      // set default monospaced font
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

      // set margins
      $pdf->SetMargins(10, 20, 10);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

      // set auto page breaks
      $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

      // set image scale factor
      $pdf->setImageScale(1.53);

      // set some language-dependent strings (optional)
      if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
          require_once(dirname(__FILE__).'/lang/eng.php');
          $pdf->setLanguageArray($l);
      }

      $html = '<style>
                  table {border: 2px solid black;}
                  th {border-bottom: 2px solid black; text-align:center;}
                  table.fecha{border: none;}
                  table.info{border: none;}
                  .text1{line-height:2}
                  .text2{line-height:2; font-size:18px}
                  .text3{font-size:15px}
                  .text4{font-size:18px}
                  .text5{font-size:15px;line-height:2}
              </style>';
      $bs = mysql_query("SELECT * from facturacion WHERE Id_fac='$codigo' ");
        while($resp = mysql_fetch_array($bs))
        {
            $pdf->AddPage();
            $pdf->Write(10, '', '', 0, 'L', true, 0, false, false, 0);
            $pdf->SetFont('times', '', 9);

            $arr =$resp['Id_arr'];
            $fini = explode("-",$resp['Ini_fac']);
            $extra = $resp['Val_inm']+$resp['Recrg_arr']+$resp['Mora_arr'];
            $ford = calculaFecha("days",4,$resp['Ini_fac']);
            $fextr = calculaFecha("days",12,$resp['Ini_fac']);

            $bus = mysql_query("SELECT * FROM arrendatarios WHERE Id_arr='$arr' ");
            $resp2 = mysql_fetch_array($bus);

            $nompdf = $resp2['Id_arr'].'-'.$fini[1].$fini[0];

            $tbl_datos  = '<table cellspacing="3" cellpadding="4" >
                             <tr>
                                <td width="105"><b>Nombre:</b></td>
                                <td colspan="2" width="347">'.$resp2['Nom_arr'].' '.$resp2['Apel_arr'].'</td>
                                <td colspan="2" align="right"><b>COMPROBANTE DE CONSIGNACION</b></td>
                             </tr>
                              <tr>
                                <td><b>Tipo de Cliente:</b></td>
                                <td colspan="2">Arrendatario</td>
                                <td>                     <b>COD:</b></td>
                                <td>'.$resp['Cod_inm'].'</td>
                             </tr>
                             <tr>
                                <td><b>Inmueble:</b></td>
                                <td colspan="2" >'.$resp['Dir_inm'].' - '.$resp['Barr_inm'].'</td>
                                <td>                     <b>MES:</b></td>
                                <td>'.$meses[((int)$fini[1])-1].'-'. $fini[0].'</td>
                             </tr>
                            </table>';
          $tb_info1= '<table cellspacing="0" cellpadding="4">
                          <tr>
                            <th><b>CODIGO</b></th>
                            <th><b>DESCRIPCION</b></th>
                            <th align="right"><b>PAGO ORDINARIO</b></th>
                            <th align="right"><b>PAGO EXTEMPORANEO</b></th>
                          </tr>
                           <tr>
                              <td align="center">'.$resp['Cod_inm'].'</td>
                              <th align="left">'.$meses[((int)$fini[1])-1].'-'. $fini[0].'</th>
                              <td align="right">$ '.number_format($resp['Val_inm'],0,'','.').'</td>
                              <td align="right">$ '.number_format($resp['Val_inm'],0,'','.').'</td>
                           </tr>
                           <tr>
                              <td></td>
                              <td>Recargo mora arriendo</td>
                              <td></td>
                              <td align="right">$ '.number_format($resp['Recrg_arr'],0,'','.').'</td>
                           </tr>
                            <tr>
                              <td></td>
                              <td>Recargo cuota admon</td>
                              <td></td>
                              <td align="right">$ '.number_format($resp['Mora_arr'],0,'','.').'</td>
                           </tr>
                           <tr>
                              <td colspan="4"></td>
                           </tr>
                        </table>

                        <table class="fecha">
                          <tr>
                             <td colspan="2"></td>
                            <td align="right">$ '.number_format($resp['Val_inm'],0,'','.').'</td>
                            <td align="right">$ '.number_format($extra,0,'','.').'</td>
                          </tr>
                          <tr>
                            <td><b>FECHA LIMITE DE PAGO</b></td>
                            <td></td>
                            <td align="right">'.$ford.'</td>
                            <td align="right">'.$fextr.'</td>
                          </tr>
                          <tr>
                            <td></td>
                          </tr>
                        </table>
                        ';

          $tb_info2= '<table class="info" cellpadding="-6" cellspacing="0">
                          <tr>
                            <td width="420">
                              <table cellspacing="0" cellpadding="3">
                                 <tr>
                                    <th align="center"><b>PROCEDIMIENTO PARA EL DILIGENCIAMIENTO DEL RECIBO DE PAGO ARRIENDO</b></th>
                                 </tr>
                                 <tr>
                                    <td class="text1">
                                      <br/>Paguese en las entidades financieras indicadas abajo.
                                      <br/>En caja inmobiliaria Andapref Ltda solo en cheque o efectivo.
                                      <br/>En fecha de vencimiento tenga en cuenta el horario bancario.
                                      <br/>La jornada adicional bancaria corresponde al siguiente dia calendario.
                                      <br/>Despues del 5 de cada mes se generaran recargo de mora arriendo.
                                      <br/>Para inmuebles en propiedad horizontal, el recargo de cuota admon sera generado.
                                    </td>
                                 </tr>
                                 <tr>
                                  <td align="center"><b>DESPUES DEL 15: INFORMACION Y PAGOS SOLO EN ANDAPREF O EN LA AFIANZADORA CORRESPONDIENTE</b></td>
                                 </tr>
                              </table>
                            </td>
                            <td width="30"></td>
                            <td align="right">
                              <table cellspacing="0" cellpadding="5" width="320">
                                <tr>
                                    <th align="center" height="55px" class="text2"><b>SELLO DEL BANCO</b></th>
                                </tr>
                                <tr>
                                  <td height="235px"></td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                      </table>
                      <table class="fecha" cellpadding="8">
                        <tr>
                          <td colspan="2" align="center" class="text3"><b>Nota: NO ES VALIDA SIN SELLO DE BANCO</b></td>
                        </tr>
                      </table>';

          $tb_info3= '<table cellspacing="10" cellpadding="-2">
                          <tr>
                            <td colspan="5" align="center">
                              <img src="../images/head.jpg"  width="600" height="80">
                            </td>
                          </tr>
                          <tr>
                            <td class="text3"><b>BANCO COLPATRIA</b></td>
                            <td colspan="2"></td>
                            <td class="text3"><b>COMPROBANTE No:</b></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td><b>No cuenta:</b></td>
                            <td colspan="2" align="center" class="text4"><b>5581002809</b></td>
                            <td colspan="2"></td>
                          </tr>
                          <tr>
                            <td><b>Nombre titular:</b></td>
                            <td colspan="2"><b>INMOBILIARIA ANDAPREF S.A.S</b></td>
                            <td colspan="2"></td>
                          </tr>
                          <tr>
                            <td>REF 1:</td>
                            <td></td>
                            <td>REF 2:</td>
                            <td colspan="2"></td>
                          </tr>
                          <tr>
                            <td><b>EFECTIVO:</b></td>
                            <td>_____________________</td>
                          </tr>
                          <tr>
                            <td><b>CHEQUE:</b></td>
                            <td>_____________________</td>
                          </tr>
                          <tr>
                            <td><b>TOTAL:</b></td>
                            <td>_____________________</td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td>Nombre del depositante:</td>
                            <td>_____________________</td>
                          </tr>
                          <tr>
                            <td colspan="3"></td>
                            <td>Telefono:</td>
                            <td>_____________________</td>
                          </tr>
                      </table>';

          $divisor = '<br/><br/>
                          _________________________________________________________________________________________________________________
                        <br/><br/>';

          $conten = '<table class="info" width="1600" cellspacing="8"  >
                          <tr>
                            <td>
                              '.$tbl_datos.'
                            </td>
                            <td width="20" rowspan="4" class="text5" align="center">
                              COPIA     ARRENDATARIO
                            </td>
                          </tr><br/>
                          <tr>
                            <td>
                              '.$tb_info1.'
                            </td>
                          </tr>
                           <tr>
                            <td>
                              '.$tb_info2.'
                            </td>
                          </tr>
                          <tr>
                            <td>
                              '.$divisor.'
                            </td>
                          </tr>
                           <tr>
                            <td>
                              '.$tb_info3.'
                            </td>
                             <td class="text3" width="20" align="center">
                              COPIA        BANCO
                            </td>
                          </tr>
                      </table>';

            $pdf->writeHTML($html.$conten, true, false, false, false, '');
        }

        //Close and output PDF document
        $pdf->Output('Fac'.$nompdf.'.pdf', 'I');


function calculaFecha($modo,$valor,$fecha_inicio=false){

   if($fecha_inicio!=false) {
          $fecha_base = strtotime($fecha_inicio);
   }else {
          $time=time();
          $fecha_actual=date("Y-m-d",$time);
          $fecha_base=strtotime($fecha_actual);
   }

   $calculo = strtotime("$valor $modo","$fecha_base");

   return date("Y-m-d", $calculo);

}

?>