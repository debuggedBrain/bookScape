import requests
from bs4 import BeautifulSoup
import urlopen
from selenium import webdriver

url = requests.get("http://uisnetpr01.njit.edu/courseschedule/")
<<<<<<< HEAD
html = BeautifulSoup(url.text, 'html.parser')

driver = webdriver.FireFox()
driver.get("http://uisnetpr01.njit.edu/courseschedule/")
=======
html = BeautifulSoup(url.content, 'html.parser')
>>>>>>> ac1a397edeb49ff8f2f7c7125e564e68629611a8

# checking to see if connection was successful using HTTP status code

if(url.status_code == 200):
<<<<<<< HEAD
    print("Successfully Connected ... Scraping Data ... \n\n")
else:
    print("Unsuccessfully Connected ... Printing Errors ... \n\n")

print(html.prettify())
=======
    print("Successfully Connected ...  Scraping Data ...\n\n")
else:
    print("Unsuccessfuly Connected ... Printing Errors ... \n\n")

print(html.prettify())

>>>>>>> ac1a397edeb49ff8f2f7c7125e564e68629611a8
