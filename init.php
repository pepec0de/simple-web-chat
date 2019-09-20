<?php
	define("DB_HOST", "localhost");
	define("DB_PORT", "5432");
	define("DB_NAME", "database");
	define("DB_USER", "user");
	define("DB_PASSWORD", "password");
	$dbconn = pg_connect("host='".DB_HOST."' port='".DB_PORT."' dbname='".DB_NAME."' user='".DB_USER."' password='".DB_PASSWORD."'") or die("CONN ERROR");

	function readQuery($query) {
		$resultQuery = array();
		if(count($query) > 0) {
			$cont = 0;
			while($row = pg_fetch_row($query)) {
				$resultQuery[$cont] = $row;
				$cont++;
			}
			return $resultQuery; 
		}
	}

	function getLastNrecords($table, $n) {
		//$dbconn =
		if(!pg_connection_busy($dbconn)){
			$sql = "SELECT * FROM $table ORDER BY id ASC OFFSET (SELECT count(*) FROM $table)-$n;";
			$query = pg_query($dbconn, $sql);
			//pg_close($dbconn);
			return readQuery($query);
		}
	}

	function getLastId($table) {
		//$dbconn =
		if(!pg_connection_busy($dbconn)) {
			$sql = "SELECT * FROM $table WHERE id=(SELECT max(id) FROM $table);";
			$query = pg_query($dbconn, $sql);
			//pg_close($dbconn);
			return (int)readQuery($query)[0][0];	
		}
		return -1;
	}
	/*
        	GET DATA ORIGINAL FUNC
		<?php
			include "dbh.php";

			$sql = "SELECT * FROM posts;";
			$query = pg_query($connection, $sql);

			if (count($query) > 0) {
				// Output all the data of each row
				while($row = pg_fetch_row($query)) {
					echo "[".$row[3]."] &lt".$row[1]."&gt ".$row[2]."<br>";
				}
			} else {
				echo "No data";
			}
			pg_close($connection);
		?>
	*/
	function getData() {
		$output = "";
		$dbconn = pg_connect("host='".DB_HOST."' port='".DB_PORT."' dbname='".DB_NAME."' user='".DB_USER."' password='".DB_PASSWORD."'") or die("CONN ERROR");
		if(!pg_connection_busy($dbconn)) {
			$query = pg_query($dbconn, "SELECT * FROM posts;");
			$rows = readQuery($query);
			foreach($rows as $row) {
				$output .= "[".$row[3]."] &lt".$row[1]."&gt ".$row[2]."<br>";
			}
		}
		return $output;
	}
	
	function getSessionParam($param) {
		session_start();
		if(isset($_SESSION[$param])) {
			return $_SESSION[$param];
		}
	}
/*
  HINT:
	TO GET THE LENGHT OF A VECTOR IN AN ARRAY:
	max(array_map('count', getLastNrecords("posts", 2)));
*/
?>
