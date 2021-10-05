<?php

use TeamBuilder\model\entity\Member;

class HomeController
{
    function displayHomepage()
    {
        if (!isset($_SESSION["loggedmember"])) {
            $_SESSION["loggedmember"] = Member::find(AUTOLOGINID);
        }
        require_once "src/view/homepage.php";
    }
}