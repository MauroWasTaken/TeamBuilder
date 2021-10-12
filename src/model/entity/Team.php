<?php

namespace TeamBuilder\model\entity;

class Team extends Entity
{

    //region Fields

    protected const TABLE_NAME = 'teams';

    protected string $name;
    protected int    $state_id;

    public function getMembers(): array
    {
        $query = "SELECT members.id,members.name,members.role_id FROM members
                    inner JOIN team_member ON members.id = team_member.member_id
                    INNER JOIN teams ON team_member.team_id = teams.id
                    WHERE teams.id = :id; ";
        return self::createDatabase()->fetchRecords($query, Member::class, ["id" => $this->id]);
    }

    public function getCaptain(): Member
    {
        $query = "SELECT members.id,members.name,members.role_id FROM members
                    inner JOIN team_member ON members.id = team_member.member_id
                    INNER JOIN teams ON team_member.team_id = teams.id
                    WHERE teams.id = :id AND team_member.is_captain=1 ; ";
        return self::createDatabase()->fetchOne($query, Member::class, ["id" => $this->id]);
    }
    //endregion
}
