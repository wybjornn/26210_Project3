import urllib.parse
import requests
import json # Was added for converting to a JSON object to a file
import sys # Was added to allow calling execution through php

# Check for arguments, uncomment to test
#print("Number of arguments:", len(sys.argv), "arguments.")
#print("Argument List:", str(sys.argv))

main_api = "https://www.mapquestapi.com/directions/v2/route?"
# key is set up from Kendricks Account, change niyo to yours if you want but di na need
key = "w7F1A2zr3whFfdDYVAh53GRR4z8CGeyF"

# Get input
orig = str(sys.argv[1])
dest = str(sys.argv[2])

url = main_api + urllib.parse.urlencode({"key": key, "from":orig, "to":dest})

# json_data is the json object with complete data
json_data = requests.get(url).json()

# Convert JSON object to a file named sample.json, get data from there
# Suggest ko is buksan with notepad++ if you want to see ano data available 
# Then go to Plugins Tab -> Plugins Admin -> Search JSON Viewer -> Install
# Once na install JSON viewer, highlight lahat, then Plugins Tab -> JSON Viewer -> Format JSON
with open("data.json", "w") as outfile:
    json.dump(json_data, outfile)

