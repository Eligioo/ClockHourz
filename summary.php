<?php
	require_once 'assets/header.php';
	require_once 'libs/Summary.php';
	require_once 'assets/inc/header.php';

	$summary = new Summary();
?>
	<br />
	<div class="container">
		<?php
			if (isset($_GET['id'])) {
				$data = array('id' => $_GET['id']);
				print_r($summary->deleteHour($data));
			}
		?>		
		<?php foreach ($summary->loadHours($_SESSION['user']) as $key => $value): ?>
			<div class="col-md-4">
				<form action="summary.php?id= <?php echo $value['id']; ?>" onsubmit="return confirm('Weet je zeker dat je deze uren wilt verwijderen?');" method="GET">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div align="right"><button name="id" value="<?php echo $value['id']; ?>" type="submit" class="btn btn-danger">X</button></div>
						<h3 class="panel-title"><?php echo date("d-m-Y", strtotime($value['date'])); ?>, <?php $day = date("l", strtotime($value['date'])); echo $summary->dayOfWeek($day); ?>.</h3>
					</div>
					<div class="panel-body">
						<p>Gewerkt van:&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<?php echo date("H:i", strtotime($value['start'])); ?> uur.</p>
						<p>Gewerkt tot: &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<?php echo date("H:i", strtotime($value['end'])); ?> uur.</p>
						<p>Pauze: 
							&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
							<?php echo $value['pause']; ?> minuten.
						</p>
						<p>Productief <a href="#productive" data-toggle="modal">[?]</a>: &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("H:i", strtotime($value['productive'])); ?> uur.</p>
						<div class="modal fade" id="productive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						        <h4 class="modal-title" id="myModalLabel">Over deze applicatie.</h4>
						      </div>
						      <div class="modal-body">
						        Productief is het totaal aantal gewerkte uren, minus de eventueel genomen pauze.<br/>
						        Bijvoorbeeld:<br />
						        Gewerkt van 15:00 uur tot 20:00 uur met 30 minuten pauze. <br/>
						        Geeft een productiviteit van 04:30 uur.
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
						      </div>
						    </div>
						  </div>
						</div>
						<p>200%:
						&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
						<?php if($value['dt'] != "on") {echo "Nee.";} else {echo "Ja.";} ?></p>
					</div>
				</div>
				</form>
			</div>
		<?php endforeach ?>
	</div>

<?php require_once 'assets/footer.php'; ?>