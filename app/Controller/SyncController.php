<?php
App::uses('Folder','Utility');
App::uses('File','Utility');

class SyncController extends AppController{
	public $uses	= array('Waktusyncakhir');

	public function index(){
		$this->set('lastsync',$this->Waktusyncakhir->find('first'));
	}

	public function sync_dump(){

		$start_date = $this->request->data['startdate'];
		$end_date 	= $this->request->data['enddate'];

		$log 	=  array();
		$msg	= array();


		if (!empty($this->request->data['submit'])) {
			$this->loadModel('Mddb');
			$this->loadModel('Waktusyncakhir');

			$this->Mddb->setDatabase('mddb');
			
			/* 1. get last synchronization time from mddb.waktusyncakhir */
			$last_sync = $this->Waktusyncakhir->find('first');

			/* 2. get list of operations happened after last synchronization from mddb.mddb */
			$changes = array();
			if (!empty($last_sync)) {
				$last_sync = $last_sync['Waktusyncakhir']['timestamp_sync'];
				$query_changes = "SELECT Mddb.jenis_op, Mddb.nama_tabel, Mddb.prim_key FROM mddb Mddb LEFT JOIN mddb m ";
				$query_changes .= "ON Mddb.nama_tabel = m.nama_tabel AND Mddb.prim_key = m.prim_key AND Mddb.mddb_id < m.mddb_id ";
				
				if(empty($start_date) AND empty($end_date)){
					$query_changes .= "WHERE m.mddb_id IS NULL AND Mddb.timestamp_op > '$last_sync' ";
				}else{
					$query_changes .= "WHERE m.mddb_id IS NULL AND Mddb.timestamp_op > '$start_date' AND Mddb.timestamp_op < '$end_date' ";
				}
				$changes = $this->Mddb->query($query_changes);
			}else{
				$query_changes = "SELECT Mddb.jenis_op, Mddb.nama_tabel, Mddb.prim_key FROM mddb Mddb LEFT JOIN mddb m ";
				$query_changes .= "ON Mddb.nama_tabel = m.nama_tabel AND Mddb.prim_key = m.prim_key AND Mddb.mddb_id < m.mddb_id ";
				$query_changes .= "WHERE m.mddb_id IS NULL";
				$changes = $this->Mddb->query($query_changes);
			}
			//debug($query_changes);
			if (empty($changes)) {
				$msg = array(
							'status'=>'info', 
							'msg'=>'Belum ada perubahan data sejak sinkronisasi terakhir.');

				$log['msg'] = $msg;
				$this->set('logs',$log);

				return;
			}

			/* get db and load all models */
			require_once('models.php');

			#$test = array();
			/* 3. get records as listed in the list obtained in step 2 */
			$sql = "USE $dbName;".PHP_EOL;
			for ($i=0; $i < sizeof($changes); $i++) { 
				$op = $changes[$i]['Mddb']['jenis_op']; /* get operation */
				$table_name = $changes[$i]['Mddb']['nama_tabel']; /* get table name */
				$pk = $changes[$i]['Mddb']['prim_key']; /* get primary key */
				
				/* get model name based on table name and set the database */
				$low_table_name = strtolower($table_name);
				$camel = Inflector::camelize($low_table_name);
				$ctrl = Inflector::singularize($camel);
				$this->$ctrl->setDatabase($dbName,'store');
				$this->$ctrl->useDbConfig = 'store';

				/* get name of primary key column */
				$pk_name_arr = $this->$ctrl->query("SHOW KEYS FROM $table_name WHERE Key_name = 'PRIMARY'");
				$pk_name = $pk_name_arr[0]['STATISTICS']['Column_name'];
				
				$record = $this->$ctrl->find('first',array('conditions' => array($pk_name => $pk)));

				#$test[$i] = $record;
				#continue;

				$str_pk = $pk;
				if ($op != "delete") {
					$str_fields = "";
					$str_values = "";
					$str_set = "";
					$idx = 0;
					foreach ($record[$ctrl] as $field => $value) {
						$col_type = $this->$ctrl->query("SHOW FIELDS FROM $table_name WHERE Field = '$field'");
						
						if (strpos($col_type[0]['COLUMNS']['Type'], "int") !== FALSE) {
							$str_value = $value;
						}else{
							$str_value = "'$value'";
							if ($field == $pk_name) {
								$str_pk = "'$pk'";
							}
						}

						if ($op == "insert" || $op == "update") {
							$str_fields .= $field;
							$str_values .= $str_value;
							$str_set .= "$field = $str_value";
						}
						if ($idx < sizeof($record[$ctrl]) - 1) {
							$str_fields .= ", ";
							$str_values .= ", ";
							$str_set .= ", ";
						}
						$idx++;
					}
				}else{
					$col_type = $this->$ctrl->query("SHOW FIELDS FROM $table_name WHERE Field = '$pk_name'");
							
					if (strpos($col_type[0]['COLUMNS']['Type'], "int") === FALSE) {
						$str_pk = "'$pk'";
					}
				}
				
				if ($op == "insert" || $op == "update") {
					$sql .= "INSERT INTO $table_name($str_fields) VALUES ($str_values) ";
					$sql .= "ON DUPLICATE KEY UPDATE $str_set;".PHP_EOL;
				} elseif ($op == "delete") {
					$sql .= "DELETE FROM $table_name WHERE $pk_name = $str_pk;".PHP_EOL;
				}
			}

			#return;
			/* write dump query to .sql file */
			date_default_timezone_set('Asia/Jakarta');
			$year = date("Y");
			$month = date("m");

			$folder = "/data/mysqldump/".$year."/".$month."/";
			$dir = new Folder($folder, true, 0755);	

			if(!empty($end_date)){
				
				$date = new DateTime($end_date);
				$dumpDate = date_format($date, "d-m-Y_H.i.s" );
				$last_sync = $end_date;

			}else{
				$last_sync = date("Y-m-d H:i:s");
				$dumpDate = date("d-m-Y_H.i.s");
			
			}

			$file_name = $folder.$dbName."_".$dumpDate.".sql";

			if (file_put_contents($file_name,$sql)) {

				/* update last synchronization time */
				$this->Waktusyncakhir->setDatabase('mddb');
				$this->Waktusyncakhir->query("INSERT INTO waktusyncakhir(timestamp_sync) VALUES('".$last_sync."')");
				
				//count file .sql in current dir
				$files = glob($folder . '*.sql');
				if ( $files !== false )
				{
				    $filecount = count( $files );
				    //echo $filecount;
				}				

				$msg = array(
							'status'=>'success', 
							'msg'=>'Belum ada perubahan data sejak sinkronisasi terakhir.');

				$log['lastsync'] = $last_sync;
				$log['nfile'] 	= $filecount;
				$log['msg']		= $msg;

				$this->set('logs',$log);

			}
		}

		
	}
}
?>
