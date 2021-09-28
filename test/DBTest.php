<?php

use PHPUnit\Framework\TestCase;

require "Model\DB.php";

class DBTest extends TestCase
{
    protected function setUp(): void
    {
        //TODO mettre les variables dans un autre fichier path username et password.
        exec('mysql -u root <"' . dirname(__DIR__) . '\db\teambuilder.sql"');
    }

    public function testSelectManyValid(): void
    {
        $db = new DB();
        $this->assertEquals('MEM', $db->selectMany("SELECT * FROM roles", [])[0]["slug"]);
        $this->assertEquals('MOD', $db->selectMany("SELECT * FROM roles", [])[1]["slug"]);
    }

    public function testInsertValid(): void
    {
        $db = new DB();
        $this->assertEquals(3, $db->insert("INSERT INTO roles(slug,name) VALUES (:slug, :name)", ["slug" => "XXX", "name" => "Slasher"]));
    }

    public function testExecuteValid(): void
    {
        $db = new DB();
        $db->insert("INSERT INTO roles(slug,name) VALUES (:slug, :name)", ["slug" => "XXX", "name" => "Slasher"]);
        $this->assertEquals(1, $db->execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]));
    }

    public function testExecute2ndTime(): void
    {
        $db = new DB();
        $db->insert("INSERT INTO roles(slug,name) VALUES (:slug, :name)", ["slug" => "XXX", "name" => "Slasher"]);
        $db->execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]);
        $this->assertEquals(0, $db->execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]));
    }

    public function testSelectOneValid(): void
    {
        $db = new DB();
        $res = $db->selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "MOD"]);
        $this->assertSame($res['slug'], 'MOD');
    }
}