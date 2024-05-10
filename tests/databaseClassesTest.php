<?php
############### autoload ###############
use Tester\Assert;

require_once "../vendor/autoload.php";

class DatabaseClassesTest extends Tester\TestCase
/**
 * TEST: Basic database query test.
 *
 * @phpVersion 8.0
 */
{
    public $Database;
    public function setUp()
    {
        $this->Database = new Database;
    }

    public function testConfigLoad()
    {
        Assert::notNull($this->Database->servername);
        Assert::notNull($this->Database->username);
        Assert::notNull($this->Database->password);
        Assert::notNull($this->Database->dbname);

        Assert::type("string", $this->Database->servername);
        Assert::type("string", $this->Database->username);
        Assert::type("string", $this->Database->password);
        Assert::type("string", $this->Database->dbname);

        Assert::false(empty($this->Database->servername));
        Assert::false(empty($this->Database->username));
        Assert::false(empty($this->Database->password));
        Assert::false(empty($this->Database->dbname));
    }
    public function testConnect()
    {
        $result = $this->Database->query("SELECT * FROM Users");
        Assert::type("mysqli_result", $result);
        Assert::notNull($result);
        Assert::false(empty($result));
    }
    public function testRowExists()
    {
        $result = $this->Database->rowExists("Users", "idUsers", "asd");
        Assert::false($result);
        Assert::notNull($result);
        Assert::true(empty($result));
        
        $result = $this->Database->rowExists("Users", "idUsers", 1);
        Assert::true($result);
        Assert::notNull($result);
        Assert::false(empty($result));
    }
}

(new DatabaseClassesTest)->run();
