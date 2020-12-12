<?php
require_once 'database.php';

class DatabaseObject {

  public static function find_by_sql($sql) {
    global $database;
    $submit_query = $database->process_query($sql);

    // if data exist
    $attribute = array();
    while($row = $submit_query->fetch_assoc()) {
      $attribute[] = $row;
    }
    return $attribute;
  }

  private function attributes() {
    global $database;
    $attributes = array();
    foreach(static::$db_fields as $attribute) {
      if(property_exists($this, $attribute)) {
        $attributes[$attribute] = $database->escape_value($this->$attribute);
      }
    }
    return $attributes;
  }

  public function create() {
    global $connection;
    global $database;
    $sql  = "INSERT INTO ".static::$table_name." (";
    $sql .= join(", ", array_keys($this->attributes()));
    $sql .= " ) ";
    $sql .= "VALUES ('";
    $sql .= join( "', '", array_values($this->attributes()) );
    $sql .= "')";

    $set = $database->process_query($sql);
  }

}
















?>
