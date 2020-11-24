<?php
namespace app\core\Security;

Trait FireWall
{
	public function isGranted($requiredLevel, $level) {
		if ($requiredLevel == $level) return true;
		else return false;
	}

	public function isValidePassword($password, $cryptedPassword) {
		return password_verify($password, $cryptedPassword);
	}

	public function isValideCode($code, $cryptedCode) {
		return $this->isValidePassword($code, $cryptedCode);
	}
}