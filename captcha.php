<?php
session_start();

include_once('../../../wp-load.php');

class captcha{
    private function creacapta(){

        $opcion = rand(1, 5);
        $_SESSION['IdRespuesta'] = $opcion;
        switch($opcion){
            case '1':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px; padding: 0;'> - 2 = 4";
            break;
            case '2':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px; padding: 0;'> + 2 = tres";
            break;
            case '3':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px; padding: 0;'> - uno = 2";
            break;
            case '4':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px; padding: 0;'> * 2 = 6";
            break;
            case '5':
                return "<input id='txtRespuesta' name='txtRespuesta' value='' placeholder='' style='width: 20px; padding: 0;'> * 1 = 5";
            break;
        }
    }
    private function mandamail(){
        $to = array('raicerk@gmail.com','raicerk@outlook.com');
        $subject = "Prueba de correo desde wordpress";
        $headers = 'Reply-to: Juan Mora <jvmora@raicerk.cl>' . "\r\n";
        $message.='Hola <br/>';
        $message.='Esto es una prueba de wordpress';
        add_filter('wp_mail_content_type',create_function('', 'return "text/html";'));
        add_filter('wp_mail_from',create_function('','return "callcenter@raicerk.cl";'));
        add_filter('wp_mail_from_name',create_function('','return "Wordpress";'));
        wp_mail( $to, $subject, $message, $headers);
    }
    public function opcionesmenu(){
        $html = "";
        $html .= "<table>";
        $html .= "<tr>";
        $html .= "<td><label>Correo Destinatario</label></td>";
        $html .= "<td><input id='' name='' class='' type='text'></td>";
        $html .= "</tr>";
        $html .= "<td><label>Correo Copia</label></td>";
        $html .= "<td><input id='' name='' class='' type='text'></td>";
        $html .= "</tr>";
        $html .= "<td><label>Nombre Salida</label></td>";
        $html .= "<td><input id='' name='' class='' type='text'></td>";
        $html .= "</tr>";
        $html .= "<td><label>Nombre responder a</label></td>";
        $html .= "<td><input id='' name='' class='' type='text'></td>";
        $html .= "</tr>";
        $html .= "<td><label>Responder a Correo</label></td>";
        $html .= "<td><input id='' name='' class='' type='text'></td>";
        $html .= "</tr>";
        $html .= "<td><!-- --></td>";
        $html .= "<td><input id='' name='' class='' type='button' value='Guardar'></td>";
        $html .= "</tr>";
        $html .= "</table>";
        return $html;
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
                $this->mandamail();
                $estado = "Exito";
            }
        }
        $html = "";
        $html .= "<div id='contactoraicerk'>";
        $html .= "<form action='".$pagina."' method='POST'>";
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
        $html .= "</div>";
        return $html;
    }
}
?>

<?php








?>









