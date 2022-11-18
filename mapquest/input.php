<html>
    <head>
        <style>

            * {
                }

            body {
                background-image:url(img/map3.jpg);
                background-repeat: no-repeat;
                background-size: cover;
                }

            header {
                padding: 30px;
                margin-bottom: 25px;
                text-align: center;
                }

            footer {
                width: 100%;
                padding: 15px;
                margin-top: 100px;
                margin-bottom: 0; 
                text-align: center;

                }

            h1 {
                font-family: 'Courier New', monospace;
                font-size: 70px;
                margin-top: 80px;
                }

                h3 {
                font-family: 'Courier New', monospace;
                font-size: 30px;
                }

                div {
                border: double; 
                border-width: 10px;
                background-color: powderblue;
                padding: 20px;
                margin-left: 20%;
                margin-right: 20%; 
                }

            input[type=text] {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                }

            input[type=submit] {
                width: 50%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                }

            input[type=submit]:hover {
                width: 50%;
                background-color: black;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                }
                
            
        </style>
    </head>

    <body>
        <center>
        <header>
            <h1> Know Your Map</h1>
        </header>

        <div>
            <form action="frontend.php" method="get">
                <label for="StartLoc"><h3>Starting Location: </h3> </label>
                <input type="text" id="StartLoc" name="StartLoc" placeholder="Manila PH..."><br><br>
                <label for="Dest"><h3>Destination: </h3></label>
                <input type="text" id="Dest" name="Dest" placeholder="Tagaytay PH..."><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>

        <footer>
            <p>26210: Group Starbs</p>
        </footer>
        </center>
    </body>

</html>