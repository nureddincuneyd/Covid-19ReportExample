#Data Lib
from lxml import html
import requests
#MySql Lib
import pymysql

getCovidDataPage = requests.get('https://www.mynet.com/koronavirus')
getCovid = html.fromstring(getCovidDataPage.content)

#getTrafficData = requests.get('https://sehirharitasi.ibb.gov.tr/')
#getTraffic = html.fromstring(getTrafficData.content)

cityData = getCovid.xpath('//div[@class="korona-div-statistic-table"]/div[@class="korona-div-table-body"]/div[@class="korona-div-table-row"]/div[@class="korona-div-table-cell korona-statistic-country"]/text()')
infectedData = getCovid.xpath('//div[@class="korona-div-statistic-table"]/div[@class="korona-div-table-body"]/div[@class="korona-div-table-row"]/div[@class="korona-div-table-cell korona-statistic-value"]/text()')
deathsData = getCovid.xpath('//div[@class="korona-div-statistic-table"]/div[@class="korona-div-table-body"]/div[@class="korona-div-table-row"]/div[@class="korona-div-table-cell korona-statistic-deaths"]/text()')
recoveredData = getCovid.xpath('//div[@class="korona-div-statistic-table"]/div[@class="korona-div-table-body"]/div[@class="korona-div-table-row"]/div[@class="korona-div-table-cell korona-statistic-recovered"]/text()')

#trafficData = getTraffic.xpath('//div[@id="trafikYogunluk"]/button[@id="btnTrafikYogunluk"]/text()')
#print(trafficData)

qry ="INSERT INTO infecteddataturkey(city, infectedPeople, deaths, recoveredPeople) VALUES(%s, %s, %s, %s)"
myconn = pymysql.connect(host='localhost', database='covid19', user='root', passwd='', charset='utf8mb4')

print(myconn)

mycursor = myconn.cursor()

for index in range(len(cityData)):
    city = str(cityData[index])
    infected = int(infectedData[index])
    deaths = int(deathsData[index])
    recovered = int(recoveredData[index])
    values = (city, infected, deaths, recovered)
    mycursor.execute(qry, values)
    myconn.commit()
    print(city, infected, deaths, recovered)

mycursor.close()
myconn.close()

print("Kayıt Sayısı =", index+1)