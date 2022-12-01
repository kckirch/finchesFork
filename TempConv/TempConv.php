<html>
    <head>
        <title>Temperature Converter</title>
    </head>
    <body>

    <?php

        echo "<h2> Hello! Welcome to a PHP based Temperature Converter!</h2>";

    ?>
    <form action= "TempOutput.php" method= "post">
        Convert: <input name="temp" type="text">
        <label for="input">Degrees:</label>
        <select name="input" id="input">
            <option value="Celsius">Celsius</option>
            <option value="Kelvin">Kelvin</option>
            <option value="Fahrenheit">Fahrenheit</option>
        </select>
        <label for="output">to Degrees:</label>
        <select name="output" id="output">
            <option value="Celsius">Celsius</option>
            <option value="Kelvin">Kelvin</option>
            <option value="Fahrenheit">Fahrenheit</option>
        </select>
        <input type="submit">
    </body>
</html>