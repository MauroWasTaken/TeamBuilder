<?php

use \TeamBuilder\model\entity\Member;
use TeamBuilder\model\entity\Team;

class MemberController
{

    function displayMembersList()
    {
        $query = "SELECT * FROM members ORDER BY members.name";
        $membersList = Member::createDatabase()->fetchRecords($query, Member::class, []);
        require_once "src/view/listmembers.php";
    }

    function displayMyTeams()
    {
        $teams = $_SESSION["loggedmember"]->teams();
        require_once "src/view/myteams.php";
    }
}