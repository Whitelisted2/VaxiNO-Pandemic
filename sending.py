import requests as req
import sys
from datetime import datetime as dt


pincode = sys.argv[1]

date_set = str(dt.now().day)+"-"+str(dt.now().month)+"-"+str(dt.now().year)
response = req.get("https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin?pincode="+pincode+"&date="+date_set)

all_centers = response.json()

all_centers = all_centers["centers"]
print("Total no. of centers available around you : "+str(len(all_centers))+"<br/><br/>")
print("List of all Center Names Around you :-<br/>")
print("<ol>")
for each_center in all_centers:
    print("<li>")
    print("Center name : "+str(each_center['name'])+"<br/>")
    print("Center address : "+str(each_center['address'])+", "+str(each_center['block_name'])+"<br/>")
    print("Timings for center open : "+str(each_center['from'])+"-"+str(each_center['to'])+"<br/>")
    print("Vaccines Available on this center :-")
    print("<ul>")
    for diff_vaccines in each_center['sessions']:
        print("<li>For Date : "+str(diff_vaccines['date'])+" :-</li>")
        print("<li>"+str(diff_vaccines['vaccine'])+" Capacity dose 1: "+str(diff_vaccines['available_capacity_dose1'])+"</li>")
        print("<li>"+str(diff_vaccines['vaccine'])+" Capacity dose 2: "+str(diff_vaccines['available_capacity_dose2'])+"</li>")
        print("<li>Minimum age limit : "+str(diff_vaccines['min_age_limit'])+"</li><br/>")
    print("</ul>")
    print("<br/><br/>")
    print("</li>")
print("</ol>")
