<?php

use TeamBuilder\model\entity\Member;
use TeamBuilder\model\entity\Team;

class TeamController
{

    public function displayTeamPage(int $id)
    {
        $team = Team::find($id);
        require_once "src/view/team.php";
    }
}