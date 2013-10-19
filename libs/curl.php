<?php

class Curl {

    public static function Post($url, $params = array(), $headers = array())
    {

        $options = array(
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
            CURLOPT_HTTPHEADER => $headers
        );
        return self::_init($url, $params, $options);
    }

    public static function Get($url, $headers = null)
    {
        $options = array();

        if($headers){
            $options = array(CURLOPT_HTTPHEADER => $headers);
        }
        return self::_init($url, null, $options);
    }

    public static function Put($url, $params = array())
    {
        $options = array(
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => $params
        );
        return self::_init($url, $params, $options);
    }

    public static function Delete($url, $params = array())
    {
        $options = array(
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_POSTFIELDS => $params
        );
        return self::_init($url, $params, $options);
    }

    private static function _init($url, $params = array(), $options = array())
    {
        $curl = curl_init($url);
        curl_setopt_array($curl, $options);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLINFO_HEADER_OUT, false);

        $response = curl_exec($curl);

        Utilities::Debug($response);

        curl_close($curl);

        return $response;
    }

}

?>