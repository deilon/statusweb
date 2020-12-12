<?php
require_once 'configuration.php';

class MySQLDatabase {

  private $_connection;
  private $_real_escape_string_exists;
  private $_magic_quotes_active;

  public function __construct() {
    $this->_real_escape_string_exists = function_exists("mysqli_real_escape_string");
    $this->_magic_quotes_active       = get_magic_quotes_gpc();
    $this->open_connection();
  }

  private function open_connection() {
    $this->_connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_connect_error()) {
      trigger_error("Unable to connect" . $this->_connection = connect_error(), E_USER_ERROR);
    }
  }

  public function process_query($sql) {
    $result = mysqli_query($this->_connection, $sql);
    $this->confirm_query($result);
    return $result;
  }

  public function confirm_query($result) {
    if(!$result) {
      $output = "Could not perform query : " . mysqli_connect_error($this->_connection);
      return $output;
    }
  }

  public function escape_value( $value ) {
		if( $this->_real_escape_string_exists ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $this->_magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysqli_real_escape_string( $this->_connection, $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$this->_magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}

  public function close_connection() {
    if(isset($this->_connection)) {
      mysqli_close($this->_connection);
      unset($this->_connection);
    }
  }

  final private function __clone() {}

  public function getConnection() {
    return $this->_connection;
  }



}


$database = new MySQLDatabase();
$connection = $database->getConnection();

?>
