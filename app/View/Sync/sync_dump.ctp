<?
	$status = $logs['msg']['status'];
	$msg	= $logs['msg']['msg']; 
?>

<div class="jumbotron">
	<h1>Sinkronisasi Database Amigo</h1>
	<?php
		if ($status=='info') { ?>
			<div class="alert alert-info" role="alert">
				<p><?php echo $msg; ?></p>
			</div>
			<?php
		}elseif ($status=='success') { ?>
			<div class="alert alert-success" role="alert">
				<p><?php echo $msg; ?></p>
			</div>
			<?php
		}
		?>
	<p>
		<a href="/amigo_sync/" class="btn btn-lg btn-primary">Kembali ke halaman utama</a>
	</p>
</div>
<?php

	/* redirect ke halaman utama: /amigo/index */
	// header("location: /amigo_sync/");
	// exit();
	#print_r($test);
?>
