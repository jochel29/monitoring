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
	logout = True


	if log != "":
		mycursor = mydb.cursor()

		selectOutQuery = ("""SELECT * FROM log where log_lib_id = %s AND time_out = '' """)
		selOutVal = (str(log),)
		mycursor.execute(selectOutQuery,selOutVal)
		selOutResult = mycursor.fetchall()
		for x in selOutResult:
			if x[0] == log:
				updateQuery = ("""UPDATE log SET time_out = %s WHERE log_lib_id = %s AND time_out = '' """)
				now = datetime.datetime.now()
				updateVal = (now.strftime("%Y-%m-%d %H:%M:%S"), str(log))
				mycursor.execute(updateQuery, updateVal)
				mydb.commit()
				print(log, "logout")
				logout = False
			else:
				logout = True
				print("Barcode not Register	")
		if logout:
			selectQuery = ("""SELECT * FROM  lib_user WHERE lib_id = %s """)
			selVal = (str(log),)
			mycursor.execute(selectQuery, selVal)
			selResult = mycursor.fetchall()
			for x in selResult:
				if x[0] == log:
					query = """INSERT INTO log (log_lib_id, time_in, name, departmentORcurriculum) VALUE (%s,%s,%s,%s)"""
					now = datetime.datetime.now()
					val = (str(log), now.strftime("%Y-%m-%d %H:%M:%S"),x[1],x[2])
					mycursor.execute(query, val)
					mydb.commit()
					print(log, "login")
				else:
					print("Barcode not Register	")
		
		