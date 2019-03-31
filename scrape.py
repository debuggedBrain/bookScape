import requests
from bs4 import BeautifulSoup
import urlopen
from selenium import webdriver

url = requests.get("http://uisnetpr01.njit.edu/courseschedule/")
html = BeautifulSoup(url.text, 'html.parser')

driver = webdriver.Firefox()
driver.get("http://uisnetpr01.njit.edu/courseschedule/")

html = BeautifulSoup(url.content, 'html.parser')

# checking to see if connection was successful using HTTP status code

if(url.status_code == 200):
    print("Successfully Connected ... Scraping Data ... \n\n")
else:
    print("Unsuccessfully Connected ... Printing Errors ... \n\n")

print(html.prettify())