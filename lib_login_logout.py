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
	# print(mydb)

	if log != "":
		mycursor = mydb.cursor()

		selectOutQuery = ("""SELECT * FROM log WHERE log_lib_id = %s AND time_out = '' """)
		selOutVal = (str(log),)
		mycursor.execute(selectOutQuery,selOutVal)
		selOutResult = mycursor.fetchall()
		# print(selOutResult, log)
		for x in selOutResult:
			if x[1] == log:
				updateQuery = ("""UPDATE log SET time_out = %s WHERE log_lib_id = %s AND time_out = '' """)
				now = datetime.datetime.now()
				updateVal = (now.strftime("%Y-%m-%d %H:%M:%S"), str(log))
				mycursor.execute(updateQuery, updateVal)
				mydb.commit()
				print(x[2], "Logout Succesfully")
				logout = False
			else:
				logout = True
				print("Barcode not Register 1	")
		if logout:
			selectQuery = ("""SELECT * FROM  lib_user WHERE lib_ID = %s """)
			selVal = (str(log),)
			mycursor.execute(selectQuery, selVal)
			selResult = mycursor.fetchall()
			# print(selResult)
			mycursor.reset()
			for x in selResult:
				if x[1] == log:
					query = """INSERT INTO log (log_lib_id, time_in, name, departmentORcurriculum, time_out) VALUE (%s,%s,%s,%s,%s)"""
					now = datetime.datetime.now()
					val = (str(log), now.strftime("%Y-%m-%d %H:%M:%S"),x[2],x[3],'')
					mycursor.execute(query, val)
					mydb.commit()
					print(x[2], "Login Succesfully")
				else:
					print("Barcode not Register 2")
		
		