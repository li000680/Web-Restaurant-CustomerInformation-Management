<?php
require_once('abstractDAO.php');
//require_once('./model/customContact.php');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employeeDAO
 *
 * @author Matt
 */
class customContactDAO extends abstractDAO {
        
    function __construct() {
        try{
            parent::__construct();
        } catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function insertContact($contact){
        $sql = "insert into mailinglist(customerName, phoneNumber, emailAddress, deletedCustomerNames, referrer) 
                    values('{$contact->getName()}','{$contact->getPhoneNumber()}', '{$contact->getEmailAddress()}',
                            'NotDelete', '{$contact->getReferral()}')";
        if($this->mysqli->query($sql) === TRUE){

            return true;
        }else {
            echo $this->mysqli->error;
            return false;
        }
    }

    public function checkEmailExists($emailAddress){
        $sql = "select * from mailinglist where emailAddress='$emailAddress'";
        try {
            $result = $this->mysqli->query($sql) or die(mysqli_error($this->mysqli));;
        }catch(mysqli_sql_exception $e){
            echo $this->mysqli->error;
            throw $e;
        }
        if ($result->num_rows > 0)
            return true;
        return false;
    }

    public function deleteContact($id){
        $sql = "update mailinglist SET deletedCustomerNames = 'Deleted' WHERE _id = '$id'";
        try {
            $result = $this->mysqli->query($sql);
        }catch(mysqli_sql_exception $e){
            echo $this->mysqli->error;
            throw $e;
        }
        if ($result === TRUE){
            return true;
        }
        return false;
    }

    public function getItems($deleted){
        $Array=array();
        $num = 0;
        $sql = "select * from mailinglist where deletedCustomerNames='$deleted'";
        try {
            $result = $this->mysqli->query($sql);
        }catch(mysqli_sql_exception $e){
            echo $this->mysqli->error;
            throw $e;
        }
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $Array[$num++] = new customContact($row['_id'], $row['customerName'], $row['phoneNumber'], $row['emailAddress'], $row['referrer']);
            }
            $result->free();
            return $Array;
        }
        return false;
    }
}

?>
