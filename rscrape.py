import time
from bs4 import BeautifulSoup
import requests
import re
from pprint import pprint as pp
from selenium import webdriver

# driver = webdriver.Chrome(r'C:Users\OFFICIALMAJ\Downloads\chromedriver.exe');

URL = "https://sis.rutgers.edu/soc/#courses?subject=003&semester=12019&campus=NK&level=U";
# driver.get("https://sis.rutgers.edu/soc/#courses?subject=003&semester=12019%campus=NK&level=U";
# driver.quit();
req = requests.get(URL);

soup = BeautifulSoup(req.text, 'html.parser');

body = soup.find_all('div');


