<?php

class Utilities {

    public static $AllowedImages = array('gif', 'png', 'jpg', 'jpeg');

    public static function Clean(Array $array)
    {
        $cleaned = array();
        foreach($array as $key => $value) {
            if(is_array($value)){
                $cleaned[$key] = self::Clean($value);
            } else {
                $cleaned[$key] = addslashes($value);
            }
        }
        return $cleaned;
    }

    public static function Debug($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public static function Summarize($paragraph, $limit = 30)
    {
        $words = 0;
        $tok = strtok($paragraph, " ");
        while($tok) {
            $text .= " $tok";
            $words++;
            if(($words >= $limit) && ((substr($tok, -1) == "!") || (substr($tok, -1) == "."))){
                break;
            }
            $tok = strtok(" ");
        }
        return ltrim($text);
    }

    public static function Linkize($content)
    {
        return preg_replace('/(www|https?:\/\/[^ ]+)/', '<a href="\1">[Link]</a>', $content);
    }

    public static function Files($type)
    {
        $file_array = $_FILES[$type];
        $files = array();

        foreach($file_array['name'] as $key => $array) {
            foreach($array as $k => $name) {
                if(!$name) continue;
                $file = new file();
                $file->name = $name;
                $file->size = $file_array['size'][$key][$k];
                $file->error = $file_array['error'][$key][$k];
                $file->type = $file_array['type'][$key][$k];
                $file->tmp_name = $file_array['tmp_name'][$key][$k];
                $file->key = strtolower(str_replace(' ', '_', $key));
                $file->index = $k;
                $file->page_type = $type;
                $file->ext = Utilities::FileExtension($file->name);
                $file->path = _ASSETS . $type . '/' . $file->name;
                $file->url = _SITE_URL . _ASSETS_DIR . '/' . $type . '/' . $file->name;
                $files[] = $file;
                if(!$file->error){
                    if(!is_dir(_ASSETS . $type)){
                        mkdir(_ASSETS . $type, 0775, true);
                    }
                    move_uploaded_file($file->tmp_name, _ASSETS . $type . '/' . $file->name);
                }
            }
        }
        return $files;
    }

    /**
     * 
     * @param String $date mm/dd/yyyy
     * @return String $date yyyy-mm-dd
     */
    public static function MysqlDate($date = null)
    {
        if(!$date) return date('Y-m-d');
        list($m, $d, $y) = explode("/", $date);
        return "{$y}-{$m}-{$d}";
    }

    public static function TimeDiff($from, $to = null)
    {
        $to = ($to) ? strtotime($to) : time();
        $from = strtotime($from);
        $hour_diff = round(abs(($from - $to) / 60 / 60));
        if($hour_diff > 100){
            return $hour_diff = round(abs($hour_diff / 24)) . ' Days Ago';
        }
        return $hour_diff . ' Hours Ago';
    }

    public static function MysqlDateTime($time = null)
    {
        if(!$time) $time = time();
        return date("Y-m-d H:i:s", $time);
    }

    public static function MakeUrl($value)
    {
        $url = str_replace("s's", "s", $value);
        $url = preg_replace('/[^a-z0-9\_]+/i', "_", $url);
        $url = str_replace(array("__", "___"), "_", $url);
        if(substr($url, -1) == '_'){
            $url = substr($url, 0, -1);
        }

        return $url;
    }

    public function BeanToObject(Array $objects)
    {
        $beans = array();
        foreach($objects as $id => $object) {

            $bean = new stdClass();
            foreach($object->getProperties() as $key => $value) {
                $bean->$key = $value;
            }
            $beans[] = $bean;
        }
        return $beans;
    }

    public static function FileExtension($filename)
    {
        $parts = explode(".", $filename);
        $ext = array_pop($parts);
        return strtolower($ext);
    }

    public static function NormalizePhone($phone_number)
    {
        $phone_number = str_replace(array('-', '(', ')', "'", '.', ' '), '', $phone_number);
        $int_phone_number = preg_replace('/[^0-9]/', '', $phone_number);
        return $int_phone_number;
    }

    static function NormalizePath($path)
    {
        $patterns = array('/^(\/)?|(\/)+/', '/(\.+\/)/');
        $replacements = '';
        return preg_replace($patterns, $replacements, $path);
    }

}

?>
