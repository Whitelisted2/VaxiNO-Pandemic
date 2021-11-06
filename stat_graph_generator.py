import requests
import matplotlib.pyplot as plt
# import json
# import pandas as pd

new_var = requests.get("https://api.covid19api.com/country/india/status/confirmed")
data_json = new_var.json()
# print(type(data_json))
# print(data_json[0]['Cases'])
# print(data_json[1]['Cases'])
# print(data_json[2]['Cases'])
# print(len(data_json))
cases_list=[]
dates_list=[]
i=0
for each_date in data_json:
    cases_list.append(int(each_date['Cases']))
    dates_list.append(i)


plt.plot(cases_list)
plt.xlabel("No. of days since Jan. 22 2020")
plt.ylabel("No. of Confirmed Cases")
plt.ticklabel_format(style = 'plain')
plt.subplots_adjust(left=0.18)
plt.tight_layout()
plt.savefig('stat1.jpeg')


# df = pd.read_json(new_var)
# print(df.to_string())




# print(type(new_var.content))
# filenew = open("input.txt", "wt")
# filenew.write(str(new_var.content))

# data_list = json.dumps(new_var.json())
# data_list = list(data_list)
# print(data_list[2])