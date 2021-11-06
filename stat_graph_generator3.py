import requests as req
import matplotlib.pyplot as plt

response = req.get("https://webhooks.mongodb-stitch.com/api/client/v2.0/app/covid-19-qppza/service/REST-API/incoming_webhook/global?country_iso3=IND&hide_fields=_id,%20country,%20country_code,%20country_iso2,%20country_iso3,%20loc,%20state,%20uid")

# # print(type(response))

response_json = response.json()
print(len(response_json))
print(response_json[len(response_json)-2])
print(type(response_json[len(response_json)-2]))

list_for_plot=[]

for each_dict in response_json:
    # if(each_dict['confirmed_daily']=="Chandigarh"):
    list_for_plot.append(int(each_dict['deaths_daily']))#("on "+str(each_dict['Date'])+" there were "+str(each_dict['Active'])+" many active cases !")

plt.plot(list_for_plot)
plt.xlabel("No. of days since Jan. 22 2020")
plt.ylabel("No. of Deaths Daily Daily")
plt.ticklabel_format(style = 'plain')
# plt.subplots_adjust(left=0.18)
plt.tight_layout()
plt.savefig('stat3.jpeg')
