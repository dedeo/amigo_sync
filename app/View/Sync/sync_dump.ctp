<?php
	debug($logs);

if (isset($success)) {
	?>
	<div class="jumbotron">
		<h1>Sinkronisasi Database Amigo</h1>
		<div class="alert alert-success" role="alert">
		<p><?php echo $success; ?></p>			
		</div>
		<p>
			<a href="/amigo_sync/" class="btn btn-lg btn-primary">Kembali ke halaman utama</a>
		</p>
	</div>
	<?php
} elseif (isset($info)) {
	?>
	<div class="jumbotron">
		<h1>Sinkronisasi Database Amigo</h1>
		<p><span class="label label-info"><?php echo $info; ?></span></p>
		<p>
			<a href="/amigo_sync/" class="btn btn-lg btn-primary">Kembali ke halaman utama</a>

		</p>

	</div>
	<?php
}else{
	/* redirect ke halaman utama: /amigo/index */
	header("location: /amigo_sync/");
	exit();
	#print_r($test);
}
?>
