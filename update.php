<?php
    require_once 'Dao.php';
    $dao = new Dao();
    $accounts = $dao->getAccounts();

    
    //$accounts = $dao->updateUser($firstName, $lastName, $balance );

?>

<html>
    <table id="accounts">
        <thead>
            <tr>
                <th>First Name  |  </th>
                <th>Last Name  |  </th>
                <th>Account Num  |  </th>
                <th>Balance  |  </th>
                <th>Join Date</th> 
            </tr>
        </thead>
</html>

<?php
    

    
foreach ($accounts as $account) {
        echo "<tr>";
        
        echo "<td>" . ($account["firstName"]) . "</td>";
      
        echo "<td>" . ($account["lastName"]) . "</td>";
     
        echo "<td>" . ($account["accountNum"]) . "</td>";
   
        echo "<td>" . ($account["balance"]) . "</td>";
    
        echo "<td>" . ($account["create_time"]) . "</td>";

        
        echo "<td class='delete'> <a href='delete_handler.php?id={$account['accountNum']}'>[X]</a> </td>";
        echo "<tr>";

    }


//TODO A check where if the values are not present in the database do not attempt an update on it.
//also make update populate information based on sql query and not post query
    
?>

<!-- $account here cant be used it must use a Query that pulls the needed information from accountNum -->
<form method="post" action="update_handler.php">

<div class="accounts_box">
    <label>First Name</label>
    <!-- <input type="text" id="firstName" name="firstName" value="<?php echo $account['lastName']; ?>" required> -->
    <input type="text" id="firstName" name="firstName" value="<?php echo query('SELECT * FROM bank WHERE accountNum="' . $_GET['accountNum'] . '"');?> required>
</div>

<div class="accounts_box">
    <label>Last Name</label>
    <input type="text" id="lastName" name="lastName" value="<?php echo $account['lastName']; ?>" required>
</div>

<div class="accounts_box">
    <label>Balance</label>
    <input type="text" id="balance" name="balance" value="<?php echo $account['balance']; ?>" required>
</div>


<input type="submit" value="Submit">

</form>
