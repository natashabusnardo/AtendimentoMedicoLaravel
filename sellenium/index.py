from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By


options = webdriver.ChromeOptions()
options.add_argument("--headless")
browser = webdriver.Chrome(chrome_options=options)
url = 'https://cid10.com.br/%5Ebuscacode$?query='

def searchCidCode(code):
    browser.get(url + code)
    data = (
            browser.find_element(By.CSS_SELECTOR, 'td:nth-child(2)').text,
        )
    return data


