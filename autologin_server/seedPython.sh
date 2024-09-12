#!/bin/bash
sudo apt update && sudo apt install libmariadb-dev/stable
python3 -m venv .venv && .venv/bin/pip install -r autologinChronJob/pythonDependencies.txt
