<?php

    function Calendario($mes,$año)
    {
        $dias = array("L", "M", "M", "J", "V", "S", "D");
        $table = '<table class="my-5 shadow rounded-lg">';
        $mes_nombre = mktime(0,0,0,$mes + 1,0,0);
        $table.= '
            <tr>
                <td></td>
                <td></td>
                <td style="font-size : 12px">'. date("M",$mes_nombre) .'</td>
                <td style="font-size : 12px">'.$año.'</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        ';
        $table .= '<tbody class="sijala"><tr><td class="bg-yellow-300">' . implode('</td> <td class="bg-yellow-300">', $dias). '</td></tr>';

        $primer_dia = date('w', mktime(0, 0, 0, $mes, 1, $año));
        $primer_dia = ($primer_dia > 0) ? $primer_dia - 1 : $primer_dia;
        $total_dias = date('t', mktime(0, 0, 0, $mes, 1, $año));
        $dias_semana = 1;
        $contador = 0;
        
        $table .= '<tr>';
        

        for ($i = 0; $i < $primer_dia; $i++) {
            $table .= '<td> </td>';
            $dias_semana++;
        }

        for ($dias_ciclados = 1; $dias_ciclados <= $total_dias; $dias_ciclados++) {

            $table .= '<td class="border">';
            $table .= "<div>" . $dias_ciclados . "</div>";
            $table .= '</td>';

            if ($primer_dia == 6) {
                $table .= '</tr>';
                //nueva horizontal
                if (($contador + 1) != $total_dias) {
                    $table .= '<tr class="OTRA FILA">';
                }
                $primer_dia = -1;
                $dias_semana = 0;
            }
            $dias_semana++;
            $primer_dia++;
            $contador++;
        }

        //en blanco
        if ($dias_semana < 8) {
            for ($i = 1; $i <= (8 - $dias_semana); $i++) {
                $table .= '<td> </td>';
            }
        }

        $table .= '</tr>' . '</tbody></table>';
        return $table;
    }

    function Rango($mes,$año,$mesf,$añof)
    {
        $texto = '';
        if ($mes == '' || $año == '' || $mesf == '' || $añof == '' || $mes == '00' || $mesf =='00') {
            return '';
        }
        if ($año < $añof) {

            for ($año_actual = $año; $año_actual < $añof + 1; $año_actual++) { 

                for ($i= $mes ; $i < 13 ; $i++) { 

                    $texto .= Calendario($i,$año_actual);
                    //ultima vuelta si entra aqui
                    if($añof - $año_actual == 0 && $i == $mesf)
                    {
                        return $texto;
                    }

                    if ($i == 12) {
                        $mes = 1;
                    }
                }
            }
            return $texto;
        }
        if ($año == $añof) {

            for ($i= $mes; $i < $mesf + 1 ; $i++) {
         
                $texto .= Calendario($i,$año);
             }

            return $texto;
        }

    }

 ?>