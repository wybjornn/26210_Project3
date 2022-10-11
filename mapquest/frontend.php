<html>

<head> 
<style>

body {background-color: powderblue;}


h1 {text-align: center;}

.messange {
    font-family: 'Courier New', monospace;
    font-size: 70px;
    color: black;
    margin-top: 80px;
    }
    
</style>

</head>
    <body>

    <h1 class ="title"> MAP QUEST </h1>
        <?php
         echo "<center>";
            # Selina Maganda
            # MINECRAFT

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
            $scode = $json_data["info"]["statuscode"];
            if($scode != 0 )
            {
                echo "<script>
                if(window.confirm(\"There's been an issue, you got an error code of: $scode, click OK to be redirected to find troubleshoot the error\"))
                {
                    window.location.href = \"https://developer.mapquest.com/documentation/directions-api/status-codes\";
                }
                else
                {
                    window.location.href = \"input.php\";
                }</script>";
            }

            echo "<table border='1'>";
            # setting manuevers as an array variable, $manueverlist is the variable as a 2D array
            # to get the values in $manueverlist its $manueverlist[x]["key"]
            # x is the value and key is the keyword, it being "image", "distance", "direction", and "narrative"
             
            
            

            $manueverlist = array();
            foreach($json_data["route"]["legs"][0]["maneuvers"] as $manuever)
            {
                # distance in km with 2 decimal places
                $manueverdistance = number_format($manuever["distance"] * 1.61, 2);

                # check if final manuever, if so, its final destination
                if($manueverdistance == 0)
                {
                    # map image
                    $manueverimage = "N/A";
                    # direction
                    $manueverdirection = "Arrived";
                    # narrative
                    $manuevernarrative = $manuever["narrative"];
                }
                else
                {
                    # map image
                    $manueverimage = $manuever["mapUrl"];
                    # direction
                    $manueverdirection = $manuever["directionName"];
                    # narrative
                    $manuevernarrative = $manuever["narrative"];
                }

                $manuevers = array(
                    "image" => $manueverimage,
                    "distance" => $manueverdistance,
                    "direction" => $manueverdirection,
                    "narrative" => $manuevernarrative
                );
                array_push($manueverlist, $manuevers);
            }
            # uncomment below to see the array
            # print_r($manueverlist);

            # remove echo and add in front end, use the php variables to get the strings
            echo $statuscode = "Status Code: $scode<br>";
            echo $startloc = "Starting Location: " . $json_data["route"]["locations"][0]["adminArea5"] . " " . $json_data["route"]["locations"][0]["adminArea1"] . "<br>";
            echo $dest = "Destination: " . $json_data["route"]["locations"][1]["adminArea5"] . " " . $json_data["route"]["locations"][1]["adminArea1"] . "<br>";
            

            # display manuevers, $manueverlist is the variable for its a 2D array
            # to get the values in $manueverlist its $manueverlist[x]["key"]
            # x is the value and key is the keyword, it being "image", "distance", "direction", and "narrative"
            # if you have another idea go, but the structure of the variable is just 
            # $manueverlist[x]["key"], where x is the row and key is the column name
            foreach($manueverlist as $manuever)
            {
                # distance of 0 means they have arrived
                if($manuever["distance"] == 0)
                {
                    echo "<br><br> You have reached your destination";
                    break;
                }

                

                echo "<br><br>";
                echo "<table border='1' width = '500px'>";
                echo "<tr>";

                echo "<td>";
                     echo "<img src=\"" . $manuever["image"] . "\">";
                echo "</td>";

                echo "<td>";
                     echo "<br> Distance = " . $manuever["distance"] . " km";
                     echo "<br> Direction = " . $manuever["direction"];
                     echo "<br> Narrative = " . $manuever["narrative"];
                echo "</td>";

               

              
                echo "</tr>";
                echo "</center>";



              
            }
        ?>
    </body>
</html>