<?php
require 'db.php';

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    // 类静态属性
    private static $db;

    public static function setUpBeforeClass()
    {
        self::$db = new Db();;
    }

    public function testSelect()
    {
        self::$result = self::$db->select('task');
        $this->assertEquals(self::$db,self::$result);
    }

    public function testDel()
    {

        $result = self::$db->del('task');
        $this->assertEquals(self::$db, $result);
    }

    public function testUpdate()
    {
        $result = self::$db->update('task', ['type' => 1]);
        $this->assertEquals(self::$db, $result);
    }

    public function testSave()
    {
        $result = self::$db->save('task', ['user_id' => '"' . 1 . '"', 'content' => '"' . 123123 . '"', 'create_at' => time(), 'update_at' => time()]);
        $this->assertEquals($result,true);
    }
    public function testWhere()
    {
        $result = self::$result->where(['id' => 1]);
        $this->assertEquals(self::$db,$result);
    }
    public function testAll()
    {
        $result = self::$result->all();
        $this->assertEquals(self::$db,$result);
    }
}