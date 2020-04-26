<?php
	include_once 'dbh.inc.php';

	$name = mysqli_real_escape_string($conn, $_POST['qname']);

	$sql = "SELECT * FROM users WHERE qname='$name';";
	$result = mysqli_query($conn, $sql);
	$check = mysqli_num_rows($result);

?>

<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="fetch.css">
</head>
<body>
<div id="page">
	<div id="box">

		<?php
			if($check > 0) {
				?> <p id="contri">Contributers:</p> <?php
				while ($row = mysqli_fetch_assoc($result)){
					?>
					<p id="sorry">
					<?php echo $row['uname']; ?>
					<div id="display">
					<?php echo $row['code']; ?>
					</div>
				<?php }	?>
					<p id="sorry">
					<?php echo "Have a Better Code?"; ?>
					</p>
					<form action="submit.inc.php" method="POST">
					<textarea name='codearea'></textarea>
					<div id="low">
						<button type="submit">Contribute</button>
						<input name="user" required="required" placeholder="Enter Your name">
						<input name="qname" required="required">
					</div>
					</form>
				<?php
			}

			else{
				?>
				<p id="sorry">
				<?php echo "Sorry! There is no code Available Yet"; ?>
				</p>
				<form action="submit.inc.php" method="POST">
					<textarea name='codearea'></textarea>
					<div id="low">
						<button type="submit">Contribute</button>
						<input name="user" required="required" placeholder="Enter Your name">
						<input name="qname" required="required">
					</div>
				</form>
			<?php }	?>			
			
		</div>
	</div>

<!--
<script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="jquery-linenumbers.min.js"></script> 
<script type="text/javascript">
	$(function(){
		$('textarea').linenumbers({col_width:'25px'});
	});
</script>

-->
</body>
</html>