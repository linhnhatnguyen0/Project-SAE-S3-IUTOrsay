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
        if (isset($_GET["action"]) && $_GET["action"] == "controleurIndexConnected") {
            return true;
        } else
            return false;
    }
}
?>