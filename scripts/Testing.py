from selenium import webdriver
import time

def login_test():
    driver = webdriver.Chrome("D:\\Hamza\\Trent university\\4th Year\\Fall\\COIS 3850H\\Rate-Trent-Food\\scripts\\WebDrivers\\chromedriver.exe")
    driver.get("https://loki.trentu.ca/~hamzasalimattarwala/3850/login")
    driver.find_element("id", "username").send_keys("test")
    driver.find_element("id", "password").send_keys("admintest000")
    driver.find_element("name", "submit").click()

    time.sleep(2)

    title = driver.title

    if title == "Rate Trent Food":
        print("Test Passed")
    else:
        print("Test Failed")


def create_account_test():
    driver = webdriver.Chrome("D:\\Hamza\\Trent university\\4th Year\\Fall\\COIS 3850H\\Rate-Trent-Food\\scripts\\WebDrivers\\chromedriver.exe")
    driver.get("https://loki.trentu.ca/~hamzasalimattarwala/3850/createaccount")
    driver.find_element("id", "fname").send_keys("Test")
    driver.find_element("id", "lname").send_keys("lastname")
    driver.find_element("id", "email").send_keys("test@justtesting.com")
    driver.find_element("id", "major").send_keys("CS")
    driver.find_element("id", "date_start").send_keys("01-09-2019")
    driver.find_element("id", "date_end").send_keys("01-05-2025")
    driver.find_element("id", "username").send_keys("test")
    driver.find_element("id", "password").send_keys("admintest000")
    driver.find_element("id", "passwordre").send_keys("admintest000")
    driver.find_element("id", "agree").click()
    driver.find_element("name", "submit").click()

    title = driver.title

    if title == "Rate Trent Food: Login ":
        print("Test Passed")
    else:
        print("Test Failed")


def search():
     driver = webdriver.Chrome("D:\\Hamza\\Trent university\\4th Year\\Fall\\COIS 3850H\\Rate-Trent-Food\\scripts\\WebDrivers\\chromedriver.exe")
     driver.get("https://loki.trentu.ca/~hamzasalimattarwala/3850/index.php")
     time.sleep(2)
     driver.find_element("tag name","input").send_keys("1")
     driver.find_element("name", "submit").click()
     time.sleep(5)
     driver.find_element("partial link text", "1 lb").click()

     time.sleep(2)

     title = driver.title

     if title == "Rate Trent Food: Dish Rating":
        print("Test Passed")
     else:
        print("Test Failed")


def rateadish():
    driver = webdriver.Chrome("D:\\Hamza\\Trent university\\4th Year\\Fall\\COIS 3850H\\Rate-Trent-Food\\scripts\\WebDrivers\\chromedriver.exe")
    driver.get("https://loki.trentu.ca/~hamzasalimattarwala/3850/RateaDish.php")
    driver.find_element("id", "username").send_keys("test")
    driver.find_element("id", "password").send_keys("admintest000")
    driver.find_element("name", "submit").click()
    driver.find_element("name","dish").send_keys("1")
    driver.find_elements("css selector", "label")[3].click()
    time.sleep(10)
    driver.find_element("tag name", "textarea").send_keys("Average")

    time.sleep(2)

    driver.find_element("name", "submit").click()

    title = driver.title

    if title == "Rate Trent Food: Dish Rating":
        print("Test Passed")
    else:
        print("Test Failed")


#create_account_test()  # test to check if the login page works
#login_test()  # test to check if login page works
#search() #  test to check if the search does redirect to testing page
#rateadish()



