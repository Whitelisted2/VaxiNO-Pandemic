import requests as req
import sys
from datetime import datetime as dt


pincode = sys.argv[1]

date_set = str(dt.now().day)+"-"+str(dt.now().month)+"-"+str(dt.now().year)
response = req.get("https://cdn-api.co-vin.in/api/v2/appointment/sessions/public/calendarByPin?pincode="+pincode+"&date="+date_set)

new_var = response.json()

new_var = new_var["centers"]
print("total centers available around you : "+str(len(new_var))+"<br/><br/>")
print("List of all Center Names Around you :-<br/>")
for each_center in new_var:
    print("center name : "+str(each_center['name'])+"<br/>")
    print("center address : "+str(each_center['address'])+", "+str(each_center['block_name'])+"<br/>")
    print("Timings for center open : "+str(each_center['from'])+"-"+str(each_center['to']))
    print("<ul>")
    for diff_vaccines in each_center['sessions']:
        print("<li>"+str(diff_vaccines['vaccine'])+" Capacity dose 1: "+str(diff_vaccines['available_capacity_dose1'])+"</li><br/>")
        print("<li>"+str(diff_vaccines['vaccine'])+" Capacity dose 2: "+str(diff_vaccines['available_capacity_dose2'])+"</li><br/><br/>")
    print("</ul>")