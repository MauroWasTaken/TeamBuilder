<?php

class Member
{
    var $id, $name, $password, $role_id;

    static function find($id): ?Member
    {
        $db = new DB;
        $query = "SELECT * FROM members WHERE id=:id;";
        $params = ["id" => $id];
        $memberData = $db->selectOne($query, $params);
        if ($memberData != false) {
            return Member::Make($memberData);
        } else {
            return null;
        }

    }

    static function make(array $fields): Member
    {
        $output = new Member();
        if (isset($fields["id"])) {
            $output->id = $fields["id"];
        }
        $output->name = $fields["name"];
        $output->password = $fields["password"];
        $output->role_id = $fields["role_id"];
        return $output;
    }

    static function all(): array
    {
        $db = new DB;
        $output = [];
        $query = "SELECT * FROM members;";
        foreach ($db->selectMany($query, []) as $item) {
            array_push($output, Member::make($item));
        }
        return $output;
    }

    static function where($row, $value): array
    {
        $db = new DB;
        $output = [];
        foreach ($db->selectMany("SELECT * FROM members WHERE $row = :value", ["value" => $value]) as $item) {
            array_push($output, Member::make($item));
        }
        return $output;
    }

    static function destroy($id): bool
    {
        $db = new DB;
        try {
            $query = "DELETE FROM members WHERE id = :id";
            $params = ["id" => $id];
            $db->execute($query, $params);
            return true;
        } catch (PDOException $exeption) {
            return false;
        }
    }

    function create(): bool
    {
        $db = new DB;
        try {
            $query = "INSERT INTO members(name,password,role_id) VALUES (:name, :password,:role_id)";
            $params = ["name" => $this->name, "password" => $this->password, "role_id" => $this->role_id];
            $this->id = $db->insert($query, $params);
            return true;
        } catch (PDOException $exeption) {
            return false;
        }
    }

    function save(): bool
    {
        $db = new DB;
        try {
            $query = "UPDATE members SET name = :name, password = :password, role_id = :role_id WHERE id = :id";
            $params = ["id" => $this->id, "name" => $this->name, "password" => $this->password, "role_id" => $this->role_id];
            $db->execute($query, $params);
            return true;
        } catch (PDOException $exeption) {
            return false;
        }
    }

    function delete(): bool
    {
        $db = new DB;
        try {
            $query = "DELETE FROM members WHERE id = :id";
            $params = ["id" => $this->id];
            $this->id = $db->execute($query, $params);
            return true;
        } catch (PDOException $exeption) {
            return false;
        }
    }
}