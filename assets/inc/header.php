<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo $host.'/index.php'; ?>" class="navbar-brand">ClockHourz, <?php echo $_SESSION['user']; ?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
          	<li><a href="home.php">Home</a></li>
          	<li><a href="summary.php">Overzicht</a></li>
          	<li><a href="account.php">Account Instellingen</a></li>
          	<li><a href="logout.php">Uitloggen</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
        		<ul class="dropdown-menu">
          			<li><a href="#about" data-toggle="modal">Over</a></li>
          			<li><a href="#contact" data-toggle="modal">Contact</a></li>
          			<li><a href="#changelog" data-toggle="modal">Changelog</a></li>
        		</ul>
      		</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Over deze applicatie.</h4>
	      </div>
	      <div class="modal-body">
	        ClockHourz is ontwikkeld door Stefan Koolen. <br />
	        <?php include_once '/home/sjaakcm112/domains/stefankoolen.nl/public_html/clockhourz/assets/inc/version.php'; ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Contact gegevens.</h4>
	      </div>
	      <div class="modal-body">
	        Email: <a href="mailto:nast3zz@gmail.com" >Stefan Koolen</a>.<br />
	        Of via whatsapp of IRL.
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
	      </div>
	    </div>
	  </div>
	</div>
	<div class="modal fade" id="changelog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Changelog.</h4>
	      </div>
	      <div class="modal-body">
	      	<?php include_once '/home/sjaakcm112/domains/stefankoolen.nl/public_html/clockhourz/assets/inc/changelog.php'; ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Sluiten</button>
	      </div>
	    </div>
	  </div>
	</div>