<?php
	
	class Account {
		
		function __construct() {}

		public function changePassword($data) {
			if (!empty($data['inputOld']) && !empty($data['inputNew']) && !empty($data['inputRepeat'])) {
				$inputOld		= md5(mysql_real_escape_string($data['inputOld']));
				$inputNew		= md5(mysql_real_escape_string($data['inputNew']));
				$inputRepeat	= md5(mysql_real_escape_string($data['inputRepeat']));
				$inputUser		= $data['inputUser'];

				$clearData = array( 'inputOld' 		=> $inputOld,
									'inputNew'		=> $inputNew,
									'inputRepeat'	=> $inputRepeat,
									'inputUser'		=> $inputUser
								);

				if ($this->oldPasswordCheck($clearData)) {

					if ($this->newPasswordCheck($clearData) == "same") {
						mysql_query("UPDATE `users` SET `password`= '". $clearData['inputNew'] ."' WHERE `username` = '". $clearData['inputUser'] ."'");
						return "<div class='alert alert-dismissable alert-success'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Je wachtwoord is aangepast.
</div>";
					}
					elseif ($this->newPasswordCheck($clearData) == "different"){
						return "<div class='alert alert-dismissable alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Nieuwe wachtwoord velden komen niet overeen.
</div>";
					}

				}
				else {
					return "<div class='alert alert-dismissable alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Oude wachtwoord is incorrect.
</div>";
				}
			}
			else{
				return "<div class='alert alert-dismissable alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Niet alle velden zijn ingevuld.
</div>";
			}
		}

		public function oldPasswordCheck($data) {
			$query = mysql_query("SELECT * FROM `users` WHERE `username` = '". $data['inputUser'] ."' AND `password` = '". $data['inputOld'] ."'");
			if (mysql_num_rows($query) == 1) {
				return true;
			}
		}

		public function newPasswordCheck($data) {
			$new = $data['inputNew'];
			$repeat = $data['inputRepeat'];
			
			if ($new == $repeat) {
				return "same";
			}
			else {
				return "different";
			}
		}
	}
?>