<?php
	
	class Index
	{
		
		function __construct(){
			if (isset($_COOKIE['user_session'])) {
				$query = mysql_query("SELECT * FROM `user_session` WHERE `hash` = '". $_COOKIE['user_session'] ."'");
				$result = mysql_fetch_assoc($query);
				
				if (!empty($result)) {
					$_SESSION['user'] = $result['user'];
					header("Location: home.php");
				}
			}

			if (isset($_GET['dummy'])) {
				$_SESSION['user'] = "Dummy";
			}
		}

		public function login($data) {
			if (!empty($data['username']) && !empty($data['password'])) {
				$username = strtolower(mysql_real_escape_string($data['username']));
				$password = md5(mysql_real_escape_string($data['password']));

				$clearData = array(	'username' => $username, 
									'password' => $password,
									'remember' => $data['remember']
									);
				if ($this->checkCredentials($clearData)) {
					if ($data['remember']) {
						$hash = hash('sha256', rand(0, 60000));
						setcookie("user_session", $hash, time() + (10 * 365 * 24 * 60 * 60));
						mysql_query("INSERT INTO `sjaakcm112_clockhourz`.`user_session` (`id`, `user`, `hash`) VALUES (NULL, '". $clearData['username'] ."', '". $hash ."')");
					}

					$_SESSION['user'] = $username;
					header("Location: home.php");
				}
				else{
					return "<div class='form-group col-md-12 alert alert-dismissable alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>x</button>
						Verkeerde gebruikersnaam en/of wachtwoord.
					</div>";
				}
			}
			else {
				return "<div class='form-group col-md-12 alert alert-dismissable alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>x</button>
						Vul alle velden in.
					</div>";
			}
		}

		public function checkCredentials($data) {
			$query = mysql_query("SELECT * FROM `users` WHERE `username` = '". $data['username'] ."' AND `password` = '". $data['password'] ."'");
			$result = mysql_fetch_assoc($query);
			if (!empty($result['id'])) {
				return true;
			}
			else {
				return false;
			}
		}
	}
?>