<?php

class AGAuth {

	var $db;

	public function __construct() {
		try {
			$this->db = new AEdb;
		} catch (PDOException $e) {
			print_r($e);
		}
	}

	public function login($username, $password) {
		$result = false;

		$stmt = $this->db->prepare("SELECT id, full_name FROM users WHERE username = :username AND password = :password");
		$stmt->execute([
			'username' => $username,
			'password' => md5($password),
		]);

		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if($user) {
			$_SESSION['userid'] = $user['id'];
			$_SESSION['fullName'] = $user['full_name'];
			$result = true;
		}

		return $result;
	}

	public function logout() {
		try {
			unset($_SESSION['userid']);
			unset($_SESSION['fullName']);
			session_destroy();
			$result = true;
		} catch (Exception $e) {
			$result = false;
		}

		return $result;
	}

	public function register($username, $password, $fullName) {
		$stmt = $this->db->prepare("INSERT INTO users (username, password, full_name) VALUES (:username, :password, :full_name)");

		$params = [
			'username' => $username,
			'password' => md5($password),
			'full_name' => $fullName,
		];

		if($stmt->execute($params)) {
			return true;
		} else {
			return false;
		}
	}

}

?>
