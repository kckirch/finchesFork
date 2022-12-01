<?php 
 
    class Dao{
        //Heroku Database connection
        private $dsn='mysql:dbname=heroku_80b23211cf3ffb6;host=us-cdbr-east-06.cleardb.net';
        private $user="b021dee6c96aa1";
        private $password="8dceb965";

     public function getConection(){
        try{
            $conn = new PDO($this->dsn, $this->user, $this->password);
        }
        catch (PDOException $e){
            echo 'Connection failed ' . $e->getMessage();
        }
        return $conn;
    }


    public function getAccounts(){
        $conn = $this->getConection();
        try{
           
            $rows = $conn->query("SELECT firstName, lastName, accountNum,
            balance, create_time
             FROM heroku_80b23211cf3ffb6.user;", PDO::FETCH_ASSOC);
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
           $q = $conn->prepare("INSERT INTO heroku_80b23211cf3ffb6 . user (firstName, lastName, balance) VALUES (:firstName, :lastName, :balance)");

           $q->bindParam(":firstName", $firstName);
           $q->bindParam(":lastName", $lastName);
           $q->bindParam(":balance", $balance);
           $q->execute();

        }catch(Exception $e){
           echo print_r($e,1);
           exit;
        }
     }
    
    //Deletes user with bindParam
    public function deleteUser($accountNum){

        $conn = $this->getConection();
        
        $deleteQuery = "DELETE FROM heroku_80b23211cf3ffb6 . user WHERE accountNum = :accountNum";
        $q = $conn->prepare($deleteQuery);
        $q->bindParam(":accountNum", $accountNum);
        $q->execute();
        }



    public function updateUser(){
        $conn = $this->getConection();

         try{

            $stmt = $conn->prepare("SELECT firstName FROM heroku_80b23211cf3ffb6.user WHERE accountNum = 24;");
            $stmt->execute();
            foreach ($stmt as $row) {
                print_r($row);
            }
         }
         catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
         return $stmt;
    }
    

    


}


?>