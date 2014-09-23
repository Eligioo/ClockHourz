<?php

	class Summary {
		
		function __construct() {}

		public function loadHours($data) {
			$query = mysql_query("SELECT * FROM `hours` WHERE `user` = '". $data ."' ORDER BY `date` DESC");
			$result = array();
			while($results = mysql_fetch_assoc($query)){
				$result[] = $results;
			};

			return $result;
		}

		public function dayOfWeek($data) {
			switch ($data) {
				case 'Monday':
					return "Maandag";
					break;

				case 'Tuesday':
					return "Dinsdag";
					break;

				case 'Wednesday':
					return "Woensdag";
					break;

				case 'Thursday':
					return "Donderdag";
					break;

				case 'Friday':
					return "Vrijdag";
					break;
				
				case 'Saturday':
					return "Zaterdag";
					break;

				case 'Sunday':
					return "Zondag";
					break;
				
			}
		}

		public function deleteHour($data) {
			$clearData = mysql_real_escape_string($data['id']);
			if (!empty($clearData)) {
				$query = mysql_query("SELECT * FROM `hours` WHERE `id` = '". $clearData ."' AND `user` = '". $_SESSION['user'] ."'") or die(mysql_error());
				if (mysql_num_rows($query) == 1) {
					mysql_query("DELETE FROM `hours` WHERE `user` = '". $_SESSION['user'] ."' AND `id` = '". $clearData ."'");
					return "<div class='form-group col-md-12 alert alert-dismissable alert-success'>
						<button type='button' class='close' data-dismiss='alert'>x</button>
						Je uren zijn verwijderd.
					</div>";
				}
				else {
					return "<div class='form-group col-md-12 alert alert-dismissable alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>x</button>
						Er is iets fout gegaan met het verwijderen van je uren, probeer het later opnieuw.
					</div>";
				}
			}
			else {
				return "<div class='form-group col-md-12 alert alert-dismissable alert-danger'>
						<button type='button' class='close' data-dismiss='alert'>x</button>
						Er is iets fout gegaan met het verwijderen van je uren, probeer het later opnieuw.
					</div>";
			}
		}
	}
?>