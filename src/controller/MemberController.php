<?php

use TeamBuilder\model\entity\Member;
use TeamBuilder\model\entity\Team;
use TeamBuilder\model\entity\MemberStatus;
use TeamBuilder\model\entity\Role;

class MemberController
{

    function displayMembersList()
    {
        $query = "SELECT * FROM members ORDER BY members.name";
        $isModerator = ($_SESSION["loggedmember"]->role_id == 2);
        $membersList = Member::createDatabase()->fetchRecords($query, Member::class, []);
        require_once "src/view/listmembers.php";
    }

    function displayMemberProfile(int $id)
    {
        $member = MEMBER::find($id);
        $role = ROLE::find($member->role_id);
        $status = MemberStatus::find($member->status);
        $memberOf = [];
        $captainOf = [];
        $teams = $member->teams();
        foreach ($teams as $team) {
            if ($team->getCaptain()->id == $id) {
                array_push($captainOf, $team);
            } else {
                array_push($memberOf, $team);
            }
        }
        require_once "src/view/memberprofile.php";
    }

    function displayMyTeams()
    {
        $teams = $_SESSION["loggedmember"]->teams();
        require_once "src/view/myteams.php";
    }

    function displayModeratorsList()
    {
        $membersList = Member::findByRoleSlug("MOD");
        require_once "src/view/moderators.php";
    }
}