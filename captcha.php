<?php
session_start();
class captcha{
    private function creacapta(){

        $opcion = rand(1, 5);
        $_SESSION['IdRespuesta'] = $opcion;
        switch($opcion){
            case '1':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px;'> - 2 = 4";
            break;
            case '2':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px;'> + 2 = tres";
            break;
            case '3':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px;'> - uno = 2";
            break;
            case '4':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px;'> * 2 = 6";
            break;
            case '5':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px;'> * 1 = 5";
            break;
        }
    }

    public function formularioCaptcha($pagina){

        if($_POST){
            $respuesta = array(
                '1' => '6',
                '2' => '1',
                '3' => '3',
                '4' => '3',
                '5' => '5',
            );

            if($respuesta[$_SESSION['IdRespuesta']] != $_POST['txtRespuesta']){
                $estado = "Error";
            }else{
                $estado = "Exito";
            }
        }

        $html = "<form action='".$pagina."' method='POST'>";
        $html .= "<table>";
        $html .= "<tr>";
        $html .= "<td><label>Nombre</label></td>";
        $html .= "<td><input type='text' value='' class='' id='' name=''></td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= "<td><label>Telefono</label></td>";
        $html .= "<td><input type='text' value='' class='' id='' name=''></td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= "<td><label>Correo Electronico</label></td>";
        $html .= "<td><input type='text' value='' class='' id='' name=''></td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= "<td><label>Valida</label></td>";
        $html .= "<td>".$this->creacapta()."</td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= "<td><label>Consulta</label></td>";
        $html .= "<td><textarea class='' id='' name=''></textarea></td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= "<td><!-- Submit --></td>";
        $html .= "<td><input type='submit' class='' id='' name='' value='Enviar'></td>";
        $html .= "</tr>";
        $html .= "<td colspan='2'>".$estado."</td>";
        $html .= "</tr>";
        $html .= "</table>";
        $html .= "</form>";
        return $html;
    }


}
?>









