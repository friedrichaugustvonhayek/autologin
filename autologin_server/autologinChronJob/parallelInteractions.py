import connect2db as db
import os
import lernplattformInteractionsLib as gfn
import threading
import random
import time
from datetime import datetime

def start_all(allCredentials, mode):
    threads = create_threads(allCredentials, mode)
    start_threads(threads)
    wait_for_threads(threads)

def delayed_start(credentials):
    time.sleep(random.randint(1, 60*15))
    with open("/var/www/clients/client15/web22/web/logs/"+credentials['username']+".log", 'a') as file:
        file.write(f"in: {datetime.now()}\n")
        try:
            status = gfn.start_zeiterfassung(credentials)
        except Exception as e:
            file.write(f"    error: {e}\n")
        else:
            file.write("     "+status+"\n")


def delayed_stop(credentials):
    time.sleep(random.randint(1, 60*5))
    with open("/var/www/clients/client15/web22/web/logs/"+credentials['username']+".log", 'a') as file:
        file.write(f"out: {datetime.now()}\n")
        try:
            gfn.stop_zeiterfassung(credentials)
            status = gfn.stop_zeiterfassung(credentials)
        except Exception as e:
            file.write(f"    error: {e}\n")
        else:
            file.write("     "+status+"\n")

def create_threads(allCredentials, mode):
    if mode == "start":
        target = delayed_start
    else:
        target = delayed_stop

    threads = [None] * len(allCredentials)
    i = 0
    for credentials in allCredentials:
        threads[i] = threading.Thread(target=target, args=(credentials,))
        i+=1
    return threads

def start_threads(threads):
    for thread in threads:
        thread.start()

def wait_for_threads(threads):
    for thread in threads:
        thread.join()
