<?php
/**
 * Description of output
 *
 * @author Tel Smith @74656c
 */
class output {

    public $content = '';
    public $output_type = 'html';
    public $render_template = true;
    
    function __construct($url) {
        if(method_exists($this, $url->action)){
            $action = $url->action;
            $this->$action($url->id);
        }
    }
    
    function __toString()
    {
        return $this->content;
    }

}

?>
