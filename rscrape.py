from bs4 import BeautifulSoup
import requests
import re
from pprint import pprint as pp

URL = "https://sis.rutgers.edu/soc/#courses?subject=003&semester=12019&campus=NK&level=U";
req = requests.get(URL)

soup = BeautifulSoup(req.text, 'html.parser')
