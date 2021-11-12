<?php
require_once 'vendor/autoload.php';
require_once 'src/controller/HomeController.php';
require_once 'src/controller/MemberController.php';
require_once 'src/controller/TeamController.php';
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        // Affiche la page d'accueil du site
        case 'Home' :
            $homeController = new HomeController();
            $homeController->displayHomepage();
            break;
        // Affiche le formulaire d'inscription
        case 'MembersList' :
            $memberController = new MemberController();
            $memberController->displayMembersList();
            break;
        case 'MyTeams' :
            $memberController = new MemberController();
            $memberController->displayMyTeams();
            break;
        case 'ModeratorsList' :
            $memberController = new MemberController();
            $memberController->displayModeratorsList();
            break;
        case 'Team' :
            $teamController = new TeamController();
            $teamController->displayTeamPage($_GET["id"]);
            break;
        case 'MemberProfile' :
            $memberController = new MemberController();
            $memberController->displayMemberProfile($_GET["id"]);
            break;
        // Permet d'afficher la home de base au lancement du site
        default :
            $homeController = new HomeController();
            $homeController->displayHomepage();
    }
} else {
    $homeController = new HomeController();
    $homeController->displayHomepage();
}