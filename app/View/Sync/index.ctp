<?php
//debug($lastsync);
?>
<div class="jumbotron">
	<h1>Sinkronisasi Database Amigo</h1>
	<p>Sinkronisasi Database Amigo adalah sebuah sistem yang dikhususkan untuk mengsinkronisasi database milik Amigo Group.</p>
</div>
<?php echo $this->Form->create(false, array('action' => 'sync_dump','class'=>'form-inline')); ?>
<div class="row">
	<div class="col-md-12">
		<p class="lead">Untuk memulai sinkronisasi, klik tombol di bawah ini. atau klik 
		<a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">disini</a> unutk melakukan konfigurasi sinkronisasi yang lebih detail</p>	
			<div class="collapse" id="collapseExample">
				<div class="alert alert-danger" role="alert">
				<div class="form-group">
				<?php
				echo $this->Form->input('startdate',
										array(
											'class'=>'startdate form-control',
											'readonly'=>false,
											'label'=>'mulai tanggal',
											'value'=>$lastsync['Waktusyncakhir']['timestamp_sync']));
				?>
				</div>
				<div class="form-group">
						<?php
						echo $this->Form->input('enddate',array('class'=>'enddate form-control','readonly'=>false,'label'=>"sampai tanggal"));
						?>
				</div>
				<p>Bagian ini hanya digunakan untuk keperluan tertentu saja, abaikan bagian ini jika Anda tidak ingin melakukan proses sinkronisasi yang lebih detail!</p>
				</div>
			</div>
	</div>	
</div>

<div class="row">
	<div class="col-md-12">

    	<div class="btn-group btn-group-lg">
    		<?php
    		echo $this->Form->end(array(
				'name' => 'submit',
				'label' => 'Sinkronisasi',
				'class' => 'btn btn-lg btn-primary right',
				'div' => false
			));
    		?>
    	</div>		
	</div>
</div>
<?php echo $this->form->end();?>

