<html>
    <head>
        <title>Converted Temperature</title>
    </head>
    <body>

    <?php
        
        $temp = $_POST["temp"];
        $input = $_POST["input"];
        $output = $_POST["output"];
        //echo "Input is: " . $input . "<br>Output is: " . $output . "<br>Temp is: " . $temp . "<br>"; - Check inputs

        if ($input == $output){
            echo "Silly goose, those are the same units <br>";
            echo $temp . " Degrees " . $input . " is " . $temp . " Degrees " . $output;
        }
        
        //From Celsius
        if (($input == "Celsius") and ($output == "Fahrenheit")){
            $convTemp = ($temp * (9/5)) + 32;
            echo $temp . " Degrees " . $input . " is " . $convTemp . " Degrees " . $output;
        } elseif (($input == "Celsius") and ($output == "Kelvin")){
            $convTemp = $temp + 273.15;
            echo $temp . " Degrees " . $input . " is " . $convTemp . " Degrees " . $output;
        }

        //From Fahrenheit
        if (($input == "Fahrenheit") and ($output == "Celsius")){
            $convTemp = ($temp - 32) * (5/9);
            echo $temp . " Degrees " . $input . " is " . $convTemp . " Degrees " . $output;
        } elseif (($input == "Fahrenheit") and ($output == "Kelvin")){
            $convTemp = ($temp - 32) * (5/9) + 273.15;
            echo $temp . " Degrees " . $input . " is " . $convTemp . " Degrees " . $output;
        }

        //From Kelvin
        if (($input == "Kelvin") and ($output == "Fahrenheit")){
            $convTemp = (($temp - 273.15) * (9/5)) + 32;
            echo $temp . " Degrees " . $input . " is " . $convTemp . " Degrees " . $output;
        } elseif (($input == "Kelvin") and ($output == "Celsius")){
            $convTemp = $temp - 273.15;
            echo $temp . " Degrees " . $input . " is " . $convTemp . " Degrees " . $output;
        }


    ?>
    
    </body>
</html>