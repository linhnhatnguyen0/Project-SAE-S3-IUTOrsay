<?php
echo ("<pre>");
print_r($_SESSION);
echo ("</pre>");
if (!Session::userConnected() && !Session::userConnecting()) {
    include("./View/headerVisitor.php");
    $signedIn = false;
} else {
    include("./View/headerUtilisateur.php");
    $signedIn = true;
}
?>