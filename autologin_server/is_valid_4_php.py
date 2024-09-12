import sys
from autologinChronJob.lernplattformInteractionsLib import is_valid
#print("hi from is_valid.py")
if is_valid({'username': sys.argv[1], 'password': sys.argv[2]}):
    print("boolean: true")
else:
    print("boolean: false")

