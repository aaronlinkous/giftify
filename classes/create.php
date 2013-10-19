<?php

class create extends output {

    
   function step($step)
   {
       $form = "create/step{$step}.tpl";
       if(!file_exists(_TEMPLATE_DIR."/create/step{$step}.tpl")){
           Error::Raise('404');
           return false;
       }
       $template = new template();
       $this->content = $template->fetch($form);
   }
   
   function save()
   {
       
   }

}

?>
