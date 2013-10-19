<?php

class Error {

    static function Raise($err_no = null) {
        $error_template = new template();
        if ($err_no) {
            $error_template->assign('err_no', $err_no);
        }

        $template_name = (file_exists(_TEMPLATE_DIR . "errors/{$err_no}.tpl")) ? _TEMPLATE_DIR . "errors/{$err_no}.tpl" : 'generic.tpl';
        $error_template->display($template_name);
        die();
    }
   

}

?>
