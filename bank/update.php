<a href="/bank/account.php"><b>Accounts</b> </a>
<br><br>


<?php
    require_once 'Dao.php';
    $dao = new Dao();
    $accounts = $dao->getAccounts(); 
    $conn = $dao->getConection();
    

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

?>

<html>
    <form method="post" action="update_handler.php">

    <?php


        //populates prefill info from specific accountNum
        
        $accountNum = $_GET['accountNum'];
        echo "You are Editing Account Num:  " . $accountNum;

        $stmt = $conn->prepare("SELECT * FROM heroku_80b23211cf3ffb6.user where accountNum = $accountNum;");
        $stmt->execute();
        foreach ($stmt as $row) {}


    ?>
    



    
    <div class="accounts_box">
        <label>First Name</label>
        <input type="text" id="firstName" name="firstName" value="<?php echo $row['firstName']; ?>" required>

    </div>

    <div class="accounts_box">
        <label>Last Name</label>
        <input type="text" id="lastName" name="lastName" value="<?php echo $row['lastName']; ?>" required>
    </div>

    <div class="accounts_box">
        
        <input type="hidden" id="accountNum" name="accountNum" value="<?php echo $row['accountNum']; ?>">
    </div>

    <div class="accounts_box">
        <label>Balance</label>
        <input type="text" id="balance" name="balance" value="<?php echo $row['balance']; ?>" required>
    </div>
    


    <input type="submit" value="Submit">

    </form>
</html>
