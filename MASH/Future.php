<html>
    <head>
        <title>Your Future</title>
    </head>
    <body>

    <?php
        //Take in the name and gender preference from MASH
        $name = $_POST["name"];
        $gender = $_POST["gender"];

        //Begin printout
        echo "<h1> Your Future! </h1>";
        echo "Hello " . $name . ",<br>";
        //echo "Selected gender: " . $gender . "<br>";

        //Create a spouselist based on preference
        if ($gender == "female"){
            $people = array("Alice", "Victoria", "Abby", "Emily", "Anne", "Sophie", "Grace");
        } elseif ($gender == "male"){
            $people = array("Timothy", "Bob", "Steve", "Geralt", "Chad", "Godrick", "Jim");
        } elseif ($gender == "either"){
            $people = array("Alice", "Victoria", "Abby", "Emily", "Anne", "Sophie", "Grace", "Timothy", "Bob", "Steve", "Geralt", "Chad", "Godrick", "Jim");
        }

        //create a selector for the spouselist if spouselist was created
        if ($gender !== "neither"){
        $peoplesel = rand(0, sizeof($people) - 1);
        }
        //echo "People select value: " . $peoplesel . "<br>";

        //Create houselist and selector for houselist
        $homes = array("Shack", "Houseboat", "Mansion", "House", "Apartment");
        $homesel = rand(0, sizeof($homes) - 1);
        //echo "Home select value: " . $homesel . "<br>";

        //Create placelist and selector for placelist
        $places = array("Boise", "Denver", "Los Angeles", "Chicago", "Fort Collins", "New York");
        $placesel = rand(0, sizeof($places) - 1);
        //echo "Place select value: " . $placesel . "<br>";

        //Create joblist and selector for joblist
        $jobs = array("Doctor", "Racecar Driver", "Chef", "Lawyer", "Computer Scientist");
        $jobsel = rand(0, sizeof($jobs) - 1);
        //echo "Job select value: " . $jobsel . "<br>";
        
        //Future printout
        echo "In your future you shall become a " . $jobs[$jobsel] . ".<br>";
        echo "You shall own a " . $homes[$homesel] . " in " . $places[$placesel] . ".<br>";
        //Check for neither gender preference to output special ending
        if ($gender == "neither"){
            echo "You will live alone in your abode and live happily ever after. <br>";
        } else {
            echo "You will meet an amazing person " . $people[$peoplesel] . ", get married and live happily ever after. <br>";
        }

        echo "The End!!! <br>"
    ?>
    
    </body>
</html>