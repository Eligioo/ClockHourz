<?php
	
	class Home {
		
		function __construct() {}

		public function addHours($data) {
			if (!empty($data['inputDate']) && !empty($data['inputStart']) && !empty($data['inputEnd'])  && $data['inputPause'] != "") {
				$inputDate 			= mysql_real_escape_string($data['inputDate']);
				$inputStart 		= mysql_real_escape_string($data['inputStart']);
				$inputEnd			= mysql_real_escape_string($data['inputEnd']);
				$inputPause			= mysql_real_escape_string($data['inputPause']);
				$inputCustomPause	= mysql_real_escape_string($data['inputCustomPause']);
				$inputDouble		= mysql_real_escape_string($data['inputDouble']);
				$inputUser			= $data['inputUser'];

				if ($inputPause == "different" && empty($inputCustomPause)) {
					return "<div class='alert alert-dismissable alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Aangepaste pauze tijd veld is leeg.
</div>";
					
				}
				elseif ($inputPause == "different" && !is_numeric($inputCustomPause)){
					return "<div class='alert alert-dismissable alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Aangepaste pauze tijd veld is geen getal.
</div>";
				}
				else {
					$clearData = array(	'inputDate'			=> $inputDate,
										'inputStart'		=> $inputStart,
										'inputEnd'			=> $inputEnd,
										'inputPause'		=> $this->pauseHours($inputPause, $inputCustomPause),
										'inputUser'			=> $inputUser
										);
					$inputDouble		= $this->checkDate($clearData['inputDate']);
					$inputProductive = $this->productiveHours($clearData['inputStart'], $clearData['inputEnd'], $clearData['inputPause']);
					mysql_query("INSERT INTO `hours`(`id`, `date`, `start`, `end`, `pause`, `productive`, `user`, `dt`) VALUES (NULL,'$clearData[inputDate]','$clearData[inputStart]','$clearData[inputEnd]','$clearData[inputPause]', '$inputProductive', '$clearData[inputUser]', '$inputDouble')") or die(mysql_error());
					return "<div class='alert alert-dismissable alert-success'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Je gewerkte uren zijn verwerkt.
</div>";
				}
			}
			else{
				return "<div class='alert alert-dismissable alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>x</button>
  Alle velden zijn verplicht.
</div>";
			}
		}

		public function pauseHours($inputPause, $inputCustomPause) {
			if ($inputPause == "different") {
				return $inputCustomPause;
			}
			else {
				return $inputPause;
			}
		}

		public function productiveHours($start, $end, $pause) {
			$start = strtotime($start);
			$start = date("H:i", strtotime('+60 minutes', $start));
			if ($pause != "different") {
				//$end sub $pause
				$productive = date("H:i", strtotime("-". $pause ." minutes", strtotime($end)));
				$calc = strtotime($productive) - strtotime($start);
			}

			return date("H:i", $calc);
		}

		public function checkDate($data) {
			//print_r(date("l", strtotime($data)));
			if (date("l", strtotime($data)) == "Sunday") {
				return "on";
			}
			else {
				return "off";
			}
		}
	}
?>