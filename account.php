<?php
	require_once 'assets/header.php';
	require_once 'libs/Account.php';
	require_once 'assets/inc/header.php';

	$account = new Account();
?>
	<br />
	<div class="container">
		<div class="jumbotron">
			<h3><strong>Wachtwoord wijzigen:</strong></h3> <br/>
			<?php
				if (isset($_POST['submit'])) {
					$data = array(
									'inputOld' 		=> $_POST['inputOld'],
									'inputNew' 		=> $_POST['inputNew'],
									'inputRepeat' 	=> $_POST['inputRepeat'],
									'inputUser'		=> $_SESSION['user'],
								);
					print_r($account->changePassword($data));
				}
			?>
			<form action="account.php" method="POST">
				<fieldset>
					<div class="form-group">
						<label for="inputOld" class="col-md-2 control-label">Oude wachtwoord:</label>
						<div class="col-md-10">
							<input type="password" class="form-control" name="inputOld" required placeholder="Oude wachtwoord..." />
						</div>
					</div>
					<div class="form-group">
						<label for="inputNew" class="col-md-2 control-label">Nieuw wachtwoord:</label>
						<div class="col-md-10">
							<input type="password" class="form-control" name="inputNew" required placeholder="Nieuw wachtwoord..." />
						</div>
					</div>
					<div class="form-group">
						<label for="inputRepeat" class="col-md-2 control-label">Herhaal nieuw wachtwoord:</label>
						<div class="col-md-10">
							<input type="password" class="form-control" name="inputRepeat" required placeholder="Herhaal nieuw wachtwoord..." />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-10">
							<button type="submit" name="submit" class="btn btn-success">Wijzigen!</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>

<?php require_once 'assets/footer.php'; ?>