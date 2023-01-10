<?php
class Controleur
{
    public static function controleurIndex()
    {
        include("./View/head.php");
        include("./View/headerVisitor.php");
        include("./View/mainPage.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }
    public static function controleurSearch()
    {
        include("./View/head.php");
        include("./View/headerVisitor.php");
        include("./View/search-tab.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }
    function controllerPropos()
    {

    }
}

?>