<?php
	require_once 'assets/header.php';
	require_once 'libs/Home.php';
	require_once 'assets/inc/header.php';

	$home = new Home();
?>
	<br />
	<div class="container" id="introTron">
		<?php
			if (isset($_POST['submit'])) {
				$data = array(	'inputDate' 		=> $_POST['inputDate'],
								'inputStart'		=> $_POST['inputStart'],
								'inputEnd'			=> $_POST['inputEnd'],
								'inputPause'		=> $_POST['inputPause'],
								'inputCustomPause'	=> $_POST['inputCustomPause'],
								'inputUser'			=> $_SESSION['user']
							);
				print_r($home->addHours($data));
			}
		?>
		<div class="jumbotron">
				<h2>ClockHourz</h2>
				<p>Houd gemakkelijk je gewerkte uren bij en krijg een mooi overzicht van je gewerkte uren.</p>
				<p>
					Net gewerkt?
					<br />
					<br />
					<button type="button" class="btn btn-success" id="insertButton" onclick="fadeInsertForm();">Vul je uren gelijk in!</button>
				</p>
		</div>
	</div>
	<div class="container">
		<div id="insertForm">
				<form action="home.php" method="POST">
					<fieldset>
						<div class="form-group">
							<label for="inputDate" class="col-md-2 control-label">Datum:</label>
							<div class="col-md-10">
								<input type="date" class="form-control" name="inputDate" required placeholder="Datum" value="<?php echo date('Y-m-d'); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputStart" class="col-md-2 control-label">Begin tijd:</label>
							<div class="col-md-10">
								<input type="time" class="form-control" name="inputStart" required placeholder="Begin tijd">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEnd" class="col-md-2 control-label">Eind tijd:</label>
							<div class="col-md-10">
								<input type="time" class="form-control" name="inputEnd" required placeholder="Eind tijd" value="<?php echo date("H:i"); ?>">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPause" class="col-md-2 control-label">Pauze (min):</label>
							<div class="col-md-10">
								<select type="dropdown" onchange="customPause();" class="form-control" name="inputPause" id="inputPause" required placeholder="Pause" >
									<option value="0">0</option>
									<option value="15">15</option>
									<option value="30">30</option>
									<option value="45">45</option>
									<option value="60">60</option>
									<option value="different">Anders...</option>
								</select>
							</div>
						</div>
						<div class="form-group" id="customPause">
							<label for="inputCustomPause" class="col-md-2 control-label">Aangepaste pauze tijd (min):</label>
							<div class="col-md-10">
								<input type="number" name="inputCustomPause" id="inputCustomPause" autocomplete=off class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-10">
								<button type="submit" name="submit" class="btn btn-success">Voeg toe!</button>
							</div>
						</div>		
					</fieldset>
				</form>
			</div>
	</div>

<?php require_once 'assets/footer.php'; ?>