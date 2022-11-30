<?php
    require_once 'Dao.php';
    $dao = new Dao();
    $accounts = $dao->getAccounts();
?>

<html>

    <form method="post" action="accounts_handler.php">
        <div class="accounts_box">
            <label>First Name</label>
            <input type="text" id="firstName" name="firstName" required>
        </div>

        <div class="accounts_box">
            <label>Last Name</label>
            <input type="text" id="lastName" name="lastName" required>
        </div>

        <div class="accounts_box">
            <label>Balance</label>
            <input type="text" id="balance" name="balance" required>
        </div>

        <input type="submit" value="Submit">

    </form>
    
    <!-- prints header titles ready for loop -->
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


    //prints out a list of all accounts through sql
    foreach ($accounts as $account) {
        echo "<tr>";
        echo "<td>" . ($account["firstName"]) . "</td>";
      
        echo "<td>" . ($account["lastName"]) . "</td>";
     
        echo "<td>" . ($account["accountNum"]) . "</td>";
   
        echo "<td>" . ($account["balance"]) . "</td>";
    
        echo "<td>" . ($account["create_time"]) . "</td>";

        echo "<td class='update'> <a href='update.php?accountNum={$account['accountNum']}'>|edit|</a> </td>";
       
        
        echo "<td class='delete'> <a href='delete_handler.php?id={$account['accountNum']}'>[X]</a> </td>";
        echo "<tr>";

    }