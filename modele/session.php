<?php
class Session
{
    public static function userConnected()
    {
        if (isset($_SESSION["login"])) {
            return true;
        } else
            return false;
    }

    public static function userConnecting()
    {
        if (isset($_POST["action"]) && $_POST["action"] == "controleurIndexConnected") {
            return true;
        } else
            return false;
    }
}
?>