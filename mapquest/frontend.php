<html>
    <body>
        <?php
            $StartingLocation = $_GET["StartLoc"];
            $Destination = $_GET["Dest"];
            
            // $StartingLocation = "Metro Manila";
            // $Destination = "Paranaque City";
            
            # Command to run python script and update the JSON file
            $output = passthru("python mapquest_parse-json_main.py \"$StartingLocation\" \"$Destination\"");
            
            # Read Contents of JSON file
            $json = file_get_contents("data.json");
            $json_data = json_decode($json, true);

            # Get the Error Code, if 0 then its good, otherwise, display error
            # remove echo and add in front end, use the php variables to get the strings
            echo $statuscode = "Status Code: " . $json_data["info"]["statuscode"] . "<br>";
            echo $startloc = "Starting Location: " . $json_data["route"]["locations"][0]["adminArea5"] . " " . $json_data["route"]["locations"][0]["adminArea1"] . "<br>";
            echo $dest = "Destination: " . $json_data["route"]["locations"][1]["adminArea5"] . " " . $json_data["route"]["locations"][1]["adminArea1"] . "<br>";
        ?>
    </body>
</html>