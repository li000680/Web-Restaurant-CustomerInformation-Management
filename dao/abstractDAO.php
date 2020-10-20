<?php

//Used to throw mysqli_sql_exceptions for database
//errors instead or printing them to the screen.
mysqli_report(MYSQLI_REPORT_STRICT);
/**
 * Abstract data access class. Holds all of the database
 * connection information, and initializes a mysqli object
 * on instantiation.
 * 
 * @author Wei Li
 */
class abstractDAO {
    protected $mysqli;

    protected static $DB_HOST = "127.0.0.1:3306";
    protected static $DB_USERNAME = "Wei Li";
    protected static $DB_PASSWORD = "";
    protected static $DB_DATABASE = "wp_eatery";

    /*
     * Constructor. Instantiates a new MySQLi object.
     * Throws an exception if there is an issue connecting
     * to the database.
     */
    function __construct() {
        try{
            $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        }catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    
    public function getMysqli(){
        return $this->mysqli;
        
    }
    
}

?>
