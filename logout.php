<?php
		setcookie('user_id', '', time() - 3600);
		setcookie('user_login', '', time() - 3600);
		$login_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
		header('Location: ' . $login_url);
?>