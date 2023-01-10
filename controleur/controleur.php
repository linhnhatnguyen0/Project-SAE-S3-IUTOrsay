<?php
class Controleur
{
    function controllerIndex()
    {
        include("./View/head.php");
        include("./View/headerVisitor.php");
        include("./View/mainPage.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }
    function controllerSearch()
    {
        include("./View/head.php");
        include("./View/headerVisitor.php");
        include("./View/search-tab.php");
        include("./View/search-result.php");
        include("./View/login.php");
        include("./View/signup.php");
        include("./View/footer.php");
    }
    function controllerPropos()
    {

    }
}

?>