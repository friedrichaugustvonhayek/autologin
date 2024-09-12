#!/usr/bin/python3

import mariadb
import sys

def get_conn(\
    user="autologinUser", \
    password="changeThisPassword1234", \
    host="127.0.0.1", \
    database="autologinDB"\
    ):
    try:
        conn = mariadb.connect(
            user=user,
            password=password,
            host=host,
            database=database
        )
    except mariadb.Error as e:
        print(f"Error connecting to MariaDB Platform: {e}")
        sys.exit(1)
    return conn

def get_rows():
    conn = get_conn()
    # Get Cursor
    cur = conn.cursor()
    query = "SELECT username, password FROM credentials"
    cur.execute(query)
    rows = cur.fetchall()
    cur.close()
    conn.close()
    rows = list_to_credentials_dict(rows)
    return rows


def list_to_credentials_dict(array_of_lists):
    keys = ['username', 'password']

    # Convert the array of lists into an array of dictionaries
    array_of_dictionaries = [dict(zip(keys, values)) for values in array_of_lists]

    # Output the array of dictionaries
   # for dictionary in array_of_dictionaries:
   #     print(dictionary)
    return array_of_dictionaries

def del_credentials(credentials):
    conn = get_conn()
    # Get Cursor
    cur = conn.cursor()
    query = "DELETE FROM credentials WHERE username=? AND password=?";
    cur.execute(query, (credentials['username'], credentials['password']))
    cur.close()
    conn.commit()
    conn.close()
