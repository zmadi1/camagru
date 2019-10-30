<?php
class Session{
    public static function exists($name){
        return (isset($_SESSION[$name])) ? true : false;
    }
    public static function get($name){
        return $_SESSION[$name];
    }
    public static function set($name, $value){
        return $_SESSION[$name] = $value;
    }
    public static function delete($name){
        if(self::exists($name)){
            unset($_SESSION);
        }
    } 
    //This is  a example
    //were dont want to store the exact user agent thats the reason 
    //were going to process it using ragex
    public static function uagent_no_version(){
        $uagent = $_SERVER['HTTP_USER_AGENT'];
        $ragex = '/\/[a-zA-Z0-9.]+/';
        $newString = preg_replace($ragex,'',$uagent);
        return $newString;
        //it went in and removed my firefox version,chrome,safari
        //This is in a human readable form its going to be better to store
        //even if they can guess that we're using the useragent with out cookies they wont know 
        //how we strip those out of there, they wont know the algorithm which will make it a little
        //secure
    }
}