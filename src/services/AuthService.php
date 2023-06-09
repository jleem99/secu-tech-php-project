<?php
class AuthService
{
	private Core\RelationalDataSource $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function register($username, $password)
	{
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $this->pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
		$stmt->execute([$username, $hashedPassword]);
	}

	public function login($username, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = ?");
		$stmt->execute([$username]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		if ($user && password_verify($password, $user['password'])) {
			$_SESSION['user'] = $user;
			return true;
		}

		return false;
	}
}
