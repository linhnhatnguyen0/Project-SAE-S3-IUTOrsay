<?php
if (!Session::userConnected() && !Session::userConnecting()) {
    include("./View/headerVisitor.php");
    $signedIn = false;
} else {
    include("./View/headerUtilisateur.php");
    $signedIn = true;
}
?>