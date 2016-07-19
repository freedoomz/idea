<?php

class AEdb extends PDO {
	var $cnf;
	var $dsn;

	public function __construct() {
		$this->cnf = parse_ini_file('config.ini', true);
		$this->dsn = $this->cnf['db']['driver'].":".
		"host=".$this->cnf['db']['dbhost'].
		(isset($this->cnf['db']['dbport']) ? ";port=".$this->cnf['db']['dbport'] : "").
		";dbname=".$this->cnf['db']['dbname'];

		return parent::__construct($this->dsn, $this->cnf['db']['dbuser'], $this->cnf['db']['dbpass']);
	}
}

?>
