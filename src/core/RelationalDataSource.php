<?php

namespace Core;

use PDO;

class RelationalDataSource
{
	private $conn;

	public function __construct(
		$host = 'localhost',
		$db = 'database',
		$user = 'root',
		$pass = 'password'
	) {
		$this->conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	public function execute($query, $parameters = [])
	{
		$pstmt = $this->conn->prepare($query);
		foreach ($parameters as $key => $value) {
			$pstmt->bindValue(':' . $key, $value);
		}
		$pstmt->execute();
		return $pstmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
