<?php
class Admin extends Smarty {

	var $cnf;
	var $db;

	public function __construct() {
		parent::__construct();
		$this->cnf = parse_ini_file('config.ini', true);

		$this->setTemplateDir($_SERVER['DOCUMENT_ROOT'].$this->cnf['smarty']['template_dir']);
		$this->setCompileDir($_SERVER['DOCUMENT_ROOT'].$this->cnf['smarty']['compile_dir']);
		$this->setConfigDir($_SERVER['DOCUMENT_ROOT'].$this->cnf['smarty']['config_dir']);
		$this->setCacheDir($_SERVER['DOCUMENT_ROOT'].$this->cnf['smarty']['cache_dir']);
		$this->configLoad("tr.conf");

		try {
			$this->db = new AGdb('db');
		} catch (PDOException $e) {
			$this->display('error.tpl');
		}

		$this->assign('pageTitle', $this->cnf['title']);
		$this->assign('pageDescription', $this->cnf['description']);
	}

	public function index() {
		$this->display('admin/index.tpl');
	}

}
?>
