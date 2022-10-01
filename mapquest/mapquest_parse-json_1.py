import urllib.parse
import requests
import json # Was added for converting to a JSON object to a file

main_api = "https://www.mapquestapi.com/directions/v2/route?"
# key is set up from Kendricks Account, change niyo to yours if you want but di na need
key = "w7F1A2zr3whFfdDYVAh53GRR4z8CGeyF"

# Get input
orig = input("Starting Location: ")
dest = input("Destination: ")

url = main_api + urllib.parse.urlencode({"key": key, "from":orig, "to":dest})
# prints URL where the json object is taken from
print("URL: " + (url))

# json_data is the json object with complete data
json_data = requests.get(url).json()

# Code below is Sample for output, the json_status checks if its successful, 0 means success, otherwise there is an error
# Commented out because not needed, but kept just in case, this is a sample on how data can be displayed on frontend
json_status = json_data["info"]["statuscode"]
if json_status == 0:
    print("API Status: " + str(json_status) + " = A successful route call.\n")
    print("=============================================")
    print("Directions from " + (orig) + " to " + (dest))
    print("Trip Duration: " + (json_data["route"]["formattedTime"]))
    print("Miles: " + str(json_data["route"]["distance"]))
    print("Fuel Used (Gal): " + str(json_data["route"]["fuelUsed"]))
    print("=============================================")

    # Code below is the direction
    for each in json_data["route"]["legs"][0]["maneuvers"]:
        print((each["narrative"]) + " (" + str("{:.2f}".format((each["distance"])*1.61) + " km)"))
        print("=============================================\n")
elif json_status == 402:
    print("**********************************************")
    print("Status Code: " + str(json_status) + "; Invalid user inputs for one or both locations.")
    print("**********************************************\n")
elif json_status == 611:
    print("**********************************************")
    print("Status Code: " + str(json_status) + "; Missing an entry for one or both locations.")
    print("**********************************************\n")
else:
    print("************************************************************************")
    print("For Staus Code: " + str(json_status) + "; Refer to:")
    print("https://developer.mapquest.com/documentation/directions-api/status-codes")
    print("************************************************************************\n")


