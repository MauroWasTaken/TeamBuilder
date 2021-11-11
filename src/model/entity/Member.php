<?php


namespace TeamBuilder\model\entity;

use PDOException;

class Member extends Entity
{

    //region Fields

    protected const TABLE_NAME = 'members';

    protected string $name;
    protected string $password;
    protected int $role_id;

    //endregion

    //region Methods

    /**
     * Search a member where value equal column.
     *
     * @param string $column The column.
     * @param int $value The value searched.
     *
     * @return array An array of members founds, empty if not found.
     */
    public static function where(string $column, int $value): array
    {
        $query = "SELECT * FROM members WHERE $column = :id";

        return self::createDatabase()->fetchRecords($query, Member::class, ["id" => $value]);
    }

    public function teams(): array
    {
        $query =
            "SELECT teams.id, teams.name,teams.state_id FROM members INNER JOIN team_member ON members.id=team_member.member_id INNER JOIN teams ON teams.id=team_member.team_id WHERE members.id = :id;";
        $queryResults = self::createDatabase()->fetchRecords($query, Team::class, ["id" => $this->id]);
        return $queryResults;
    }

    public static function findByRoleSlug(string $slug)
    {
        $query = "SELECT members.id, members.name, members.password, members.role_id FROM members
                    right join roles on members.role_id = roles.id
                    Where roles.slug=:slug
                    ORDER BY members.name;";
        $queryResults = self::createDatabase()->fetchRecords($query, Member::class, ["slug" => $slug]);
        return $queryResults;
    }
    //endregion
}
