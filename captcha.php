<?php
class capcha{
    public function creacapta(){
        $opcion = rand(1, 5);
        switch($opcion){
            case '1':
                return "<input id='' name='' value='' placeholder=''>-2 = 4";
            break;
        }
    }
}
?>
