<?php

    class Dao{
        //local login
        // public $dsn='mysql:dbname=bank;host=127.0.0.1';
        // public $user="root";
        // public $password="";
    
        //heroku database
        private $dsn='mysql:dbname=heroku_80b23211cf3ffb6;host=us-cdbr-east-05.cleardb.net';
        private $user="b021dee6c96aa1";
        private $password="8dceb965";

     public function getConection(){
        try{
            $conn = new PDO($this->dsn, $this->user, $this->password);
        }
        catch (PDOException $e){
            echo 'Connection failed' . $e->getMessage();
        }
        return $conn;
    }


    public function getAccounts(){
        $conn = $this->getConection();
        try{
           
            $rows = $conn->query("SELECT firstName, lastName, accountNum,
            balance, create_time
             FROM bank.user;", PDO::FETCH_ASSOC);
        }
        catch(Exception $e){
            echo print_r($e,1);
            exit;
        }
        
        return $rows;
    }

    public function insertNewUser($firstName, $lastName, $balance){
        $conn = $this->getConection();
        try{
           $q = $conn->prepare("INSERT INTO bank . user (firstName, lastName, balance) VALUES (:firstName, :lastName, :balance)");

           $q->bindParam(":firstName", $firstName);
           $q->bindParam(":lastName", $lastName);
           $q->bindParam(":balance", $balance);
           $q->execute();

        }catch(Exception $e){
           echo print_r($e,1);
           exit;
        }
     }
    

    public function deleteUser($accountNum){

        $conn = $this->getConection();
        //$deleteQuery = "delete from inventory_table where inv_num = :inv_num";

        //fix this to delete certain row.  
        $deleteQuery = "DELETE FROM bank . user WHERE accountNum = :accountNum";
        $q = $conn->prepare($deleteQuery);
        $q->bindParam(":accountNum", $accountNum);
        $q->execute();
        }



    public function updateUser($firstName, $lastName, $balance){
        $conn = $this->getConection();
        try{
            $updateQuery = "UPDATE FROM bank . user SET firstName = ':firstName', lastName = ':lastName', balance = ':balance' WHERE accountNum = $_GET[accountNum]";
            $q = $conn->prepare($updateQuery);
            $q->bindParam(":firstName", $firstName);
            $q->bindParam(":lastName", $lastName);
            $q->bindParam(":balance", $balance);
            $q->execute();
        }
        catch(Exception $e){
            echo print_r($e,1);
            exit;
        }


    }


}
$dao = new Dao();
$dao->getAccounts();


?>