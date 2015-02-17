<div class="jumbotron">
	<h1>Sinkronisasi Database Amigo</h1>
	<p>Sinkronisasi Database Amigo adalah sebuah sistem yang dikhususkan untuk mengsinkronisasi database milik Amigo Group.</p>
	<p>Untuk memulai sinkronisasi, klik tombol di bawah ini.</p>
	<hr style="border-color:#000">
		<?php echo $this->Form->create(false, array('action' => 'sync_dump')); ?>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<div class="col-sm-10">
					<?php
					echo $this->Form->input('startdate',array('class'=>'startdate form-control','readonly','label'=>'mulai tanggal'));
					?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
		                <div class="form-group">
                		        <div class="col-sm-10">
                        		<?php
                        		echo $this->Form->input('enddate',array('class'=>'enddate form-control','readonly','label'=>"sampai tanggal"));
                        		?>
                        		</div>
                		</div>
			</div>
		</div>
		<hr>
		<div class="row">
		  	<div class="col-sm-5">
		    	<div class="btn-group btn-group-lg">
	        		<?php
	        		echo $this->Form->end(array(
						'name' => 'submit',
						'label' => 'Sinkronisasi',
						'class' => 'btn btn-lg btn-primary',
						'div' => false
					));
	        		?>
		    	</div><!-- /input-group -->
		  	</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
</div>
