import mysql.connector
import datetime

mydb = mysql.connector.connect(
	host="localhost",
	user="root",
	password="",
	database="monitoring"
	)




while True:
	log = input()
	if log != "":
		mycursor = mydb.cursor()
		query = """INSERT INTO log (log_lib_id, time_in) VALUES (%s,%s)"""
		now = datetime.datetime.now()
		val = (str(log), str(now.strftime("%Y-%m-%d %H:%M:%S")))
		mycursor.execute(query, val)

		mydb.commit()
		print(log, "added")
