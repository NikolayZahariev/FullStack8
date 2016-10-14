<?php
	require_once 'db.php';
	require_once 'PHPUnit/Autoload.php';
	
	class dbTest extends PHPUnit_Framework_TestCase {
		
		public $test;
		
		// enter data for the database !!!!
		public $dbname = 'studymanag';
		public $dbuser = 'test';
		public $dbpass = '1234';
		public $dbhost = 'localhost';
		
		public $table = 'tasks';
		public $write_data= array (3, 3, 'test1', 'other', NULL, '1', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-12 22:17:45');
		
		public function setUp() {
			$this->test = new DB($dbname, $dbhost, $dbuser, $dbpass);
		}
		
		public function testWrite() {
			$res = $this->test->simpleWrite($table, $write_data);
			$this->assertTrue(!empty($res));
		}
		
		public function testSimpleRead() {
			$res = $this->test->simpleRead($table);
			$this->assertTrue(!empty($res));
		}
		
		public function testRead() {
			$sql = "SELECT id, fname, lname, username, email FROM users WHERE id = 1 AND fname = fn";
			   
			$res = $this->test->read($sql);
			$this->assertTrue(!empty($res) || $res == FALSE);
		}	

		public function testModify() {
			$sql = "DELETE FROM tasks WHERE id = 1 AND userid = 3";
			   
			$res = $this->test->modify($sql);
			$this->assertTrue(!empty($res) || $res == FALSE);
		}		
	}
?>