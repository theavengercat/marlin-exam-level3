<?php
class Flash
{
    /*
        $status -> name for message
        $message -> your flash message (text)
    */
    public static function set($status = null, $message = null)
    {
        if($status && $message){
            $_SESSION[$status] = $message;
            return true;
        } else {
            return false;
        }
    }

    // $name -> your name for message
    public static function showMessage($name = NULL)
    {
        $message = "";

        if ($_SESSION[$name]){
            $message = "<div class=\"alert alert-{$name}\" role=\"alert\">" .$_SESSION[$name] . "</div>";
            $_SESSION[$name] = NULL;

        }

        return $message;
    }
}