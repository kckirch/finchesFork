<?php

   class Dao{
      //local login
      // public $dsn='mysql:dbname=rinventory;host=127.0.0.1';
      // public $user="root";
      // public $password="kckc";

      //heroku database
      private $dsn='mysql:dbname=heroku_56130100e745e40;host=http://us-cdbr-east-05.cleardb.net';
      private $user="b9cae243c7a38d";
      private $password="4082f1ae";

      public function getConection(){
         try{
            $conn = new PDO($this->dsn, $this->user, $this->password);
         }
         catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
         }
         return $conn;
      }

      public function userExist($email, $password){
         $conn = $this->getConection();

         try{

            //if username exists now check for password match
            //check for username
            
               $q = $conn->prepare("select count(*) as total from loginform where user = :email");
               $q->bindParam(":email", $email);

               $q->execute();
               
               $rows = $q->fetch();

               //if username is found enter
               if ($rows['total'] == 1){

                  //get the hashed password to be stored
                  $q = $conn->prepare("select pass as info from loginform where user = :email");
                  $q->bindParam(":email", $email);

                  $q->execute();
                  
                   $hash = $q->fetch();

                  // echo $hash['info'];

                  //$hashed = '$2y$10$ghTDEDELIjbL1EXO/KlIb.Um5vhBQZvaBHbRw0';

                  //testing
                  //if it matches the user
                  if ( password_verify('$password', $hash['info']) ){
                     echo "success";
                  }else{
                     //echo "pass did not verify ";
                     // echo "this should be your pass \n";

                     // echo $ha = password_hash('kck', PASSWORD_DEFAULT);

                     // echo "here      ";
                     // echo password_verify('kck', $ha);

                     // echo "      here      ";

                     // echo "\n";
                     // echo $hash['info'];
                     // echo "\n";
                  }
               }

               //if username exists

         //    $q = $conn->prepare("select count(*) as total from loginform where user = :email and pass = :password");
            
         //    $q->bindParam(":email", $email);
         //    $q->bindParam(":password", password_verify($password, $password));
         //   // $q->bindParam(":password", $password);

         //    $q->execute();
         //    $rows = $q->fetch();

         }catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
         #for testing
         #echo print_r($rows,1);

         if ($rows['total'] == 1) {
            return true;
         }else{
            echo "I returned flase here";
            return false;
         }

      }

      public function deleteInventory($inv_num){

         $conn = $this->getConection();
         $deleteQuery = "delete from inventory_table where inv_num = :inv_num";
         $q = $conn->prepare($deleteQuery);
         $q->bindParam(":inv_num", $inv_num);
         $q->execute();
      }

      public function insertInventory($brand, $model, $colorway, $size, $retailprice, $saleprice, $stylecode, $itemcondition, $notes){
         $conn = $this->getConection();
         try{

            $q = $conn->prepare("INSERT INTO inventory_table
            (brand, model, colorway, size, retailprice, saleprice, stylecode, itemcondition, notes) 
            VALUES 
            (:brand, :model, :colorway, :size, :retailprice, :saleprice, :stylecode, :itemcondition, :notes)");

            $q->bindParam(":brand", $brand);
            $q->bindParam(":model", $model);
            $q->bindParam(":colorway", $colorway);
            $q->bindParam(":size", $size);
            $q->bindParam(":retailprice", $retailprice);
            $q->bindParam(":saleprice", $saleprice);
            $q->bindParam(":stylecode", $stylecode);
            $q->bindParam(":itemcondition", $itemcondition);
            $q->bindParam(":notes", $notes);
            $q->execute();

         }catch(Exception $e){
            echo print_r($e,1);
            exit;
         }

      }

      public function insertUser($email, $password){
         $conn = $this->getConection();
         try{
            $q = $conn->prepare("INSERT INTO loginform (user, pass) VALUES (:email, :password)");
            $q->bindParam(":email", $email);
            $q->bindParam(":password",password_hash($password, PASSWORD_DEFAULT));
            $q->execute();

         }catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
      }

      public function getInventory(){
         $conn = $this->getConection();

         try{
            $rows = $conn->query("select inv_num, brand, model, colorway, size, retailprice, saleprice, stylecode, itemcondition, notes from inventory_table", PDO::FETCH_ASSOC);
         }
         catch(Exception $e){
            echo print_r($e,1);
            exit;
         }
         return $rows;
      }

   }

   #for testing if working
   $dao = new Dao();
   // $dao->deleteInventory("54");
   // $dao->insertInventory('Test', 'Testing', 'ForceInsert', 'Big', '100', '150', 'Forced', 'Test', 'FromDao');

   #$dao->insertUser($_POST['email'], $_POST['password']);

   $dao->userExist('kck', 'kck');