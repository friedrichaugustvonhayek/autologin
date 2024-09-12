import mechanize
from bs4 import BeautifulSoup
import urllib3
import http.cookiejar
import re
import subprocess
import sys
import random
import json
import os

def get_status(br):
    soup = BeautifulSoup(br.response().read(), 'html.parser')
    error_message = soup.find('a', {'href': '#', 'id': 'loginerrormessage', 'class': 'sr-only'})
    if error_message:
        status = "invalid credentials"
    else:
        beendenButton = soup.find('a', href='?stoppen=1')
        if beendenButton:
            status = "zeiterfassung started"
        else:
            status = "logged in"
    return status

def login_(br, credentials):
    br.open("https://lernplattform.gfn.de/login/index.php")
    br.select_form(nr=0)
    br.form['username'] = credentials['username']
    br.form['password'] = credentials['password']
    br.submit()
    return get_status(br)

def is_valid(credentials):
    br = get_browser()
    status = login_(br, credentials)
    if status == "logged in":
        return True
    elif status == "zeiterfassung started":
        return True
    else:
        return False

def stop_zeiterfassung(credentials):
    br = get_browser()
    status = login_(br, credentials)
    if status == "logged in":
        print("zeiterfassung ist nicht gestartet\n")
        return "didnt stop \"zeiterfassung\" as it wasnt started"
    elif status == "zeiterfassung started":
        response = br.open("https://lernplattform.gfn.de/?stoppen=1")
        return "stoped \"zeiterfassung\""
    else:
        print("couldn't log in\n")
        return "couldn't log in"


def post_am_standort(br):
    br.select_form(nr=0)
    br.form['homeo'] = ["2"]
    br.submit()

def get_browser():
    cj = http.cookiejar.CookieJar()
    br = mechanize.Browser()
    br.set_cookiejar(cj)
    return br

def start_zeiterfassung(credentials):
    br = get_browser()
    status = login_(br, credentials)
    if status == "logged in":
        print("successful logged in\n")
        post_am_standort(br)
        print("zeiterfassung started\n")
        return "zeiterfassung started"
    elif status == "zeiterfassung started":
        print("already logged in\n")
        return "already logged in"
    else:
        print("couldn't log in\n")
        return "couldn't log in"


def get_credentials_from_file(filename):
    if not os.path.exists(filename):
        print("File '" + filename + "' does not exist")
        quit()
    with open(filename) as file:
        data = json.load(file)
        for key, value in data.items():
            if (key == "username"):
                username = value;
            if (key == "password"):
                password = value;
    return  {
            'username': username,
            'password': password
            }
