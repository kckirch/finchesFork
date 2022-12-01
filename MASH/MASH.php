<html>
    <head>
        <title>MASH Game</title>
    </head>
    <body>

    <?php

        echo "<h2> Hello! Welcome to a PHP based MASH (Mansion, Apartment, Shed, House) Game </h2>";

    ?>
    <form action= "Future.php" method= "post">
        <label for="gender">Select your preference in partner:</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="either">Either</option>
            <option value="neither">Neither</option>
        </select>
            Enter your name to begin: <input name="name" type="text">
            <input type="submit">
    
    </body>
</html>