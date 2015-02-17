<?php
/**
 *
 * PHP 5
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem untuk sinkronisasi database Amigo. Dibuat dengan framework CakePHP dan CSS Bootstrap.">
    <meta name="author" content="Universitas Kristen Duta Wacana Yogyakarta">

    <title>Sinkronisasi Database Amigo</title>

    <!-- Bootstrap core CSS -->
    <?php
    echo $this->Html->css(array('bootstrap.min','bootstrap-datetimepicker.min.css'));
    echo $this->Html->css('navbar-fixed-top');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://www.amigogroup.co.id/" target="_blank">Amigo</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <?php echo $this->fetch('content'); ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="../../assets/js/jquery.js"></script> -->
    <!-- <script src="../../dist/js/bootstrap.min.js"></script> -->
	<?php
	echo $this->Html->script(array('jquery-1.8.3.min.js',
					'bootstrap.min.js',
					'bootstrap-datetimepicker.min.js'
				));
	?>
	<script type="text/javascript">
	    	$(".startdate").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
		$(".enddate").datetimepicker({format: 'yyyy-mm-dd hh:ii:ss'});
	</script>  

	
  </body>
</html>
