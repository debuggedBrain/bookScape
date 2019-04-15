import requests
from bs4 import BeautifulSoup
import urlopen
from selenium import webdriver

url = requests.get("http://uisnetpr01.njit.edu/courseschedule/")
html = BeautifulSoup(url.text, 'html.parser')

#driver = webdriver.Firefox()
#driver.get("http://uisnetpr01.njit.edu/courseschedule/")

# checking to see if connection was successful using  HTTP status code

if(url.status_code == 200):
    print("Successfully Scraped! See courses.csv")
else:
    print("Unsuccessfully Scraped!")

site_containers = html.findAll('td', attrs={'class': 'highBorder'})

filename = "raw.csv"
f = open(filename, "w")

headers = "Book, Section\n"

f.write(headers)
data = []
counter = 1

for containers in site_containers:
    data.append(containers.text.strip().split('\n'))

data_size = len(data)

for inner in data:
    if counter > 12:
        f.write("".join(inner) + '\n')
        counter =1
    else:
        f.write("".join(inner) + '|')
        counter += 1
f.close()

#print(html.prettify())

