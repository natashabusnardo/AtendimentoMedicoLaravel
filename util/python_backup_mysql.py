import config   # arquivo de configuracao
import mysql.connector
import os
import datetime
import time

now	 = datetime.datetime.now() #data atual

dt = now.strftime(config.date_format)

time.strftime('%m/%d/%Y',time.strptime('12/1/2009', '%m/%d/%Y'))

def datetime():
	""" Return the datetime to concatenate to filename """
	t = time.localtime();	
	timestamp = str(t.tm_mday)+'/'+str(t.tm_mon)+'/'+ str(t.tm_year)+'  '+str(t.tm_hour)+':'+str(t.tm_min)+':'+str(t.tm_sec) 
	return timestamp

try:
	db = mysql.connector.connect(user=config.mysql_user, password=config.mysql_password, host=config.mysql_host)
except:
	print('Database connection error. Check your config.py file....\n')
	print ('host: '+config.mysql_host)
	print ('username: '+config.mysql_user)
	print ('password: '+config.mysql_password)
	print ('path: '+config.path)

cursor = db.cursor() 

cursor.execute("show databases") #executo um sql para retornar todos os nomes dos bancos de dados

data = config.databases

for item in data:

	#tm_year=2012, tm_mon=2, tm_mday=9, tm_hour=18, tm_min=3, tm_sec=39, tm_wday=3, tm_yday=40, tm_isdst=0
	filename = config.path+item+'.'+dt+'.sql'	

	if item != 'mysql' and item != 'information_schema' and item != 'performance_schema': 
	
		timestamp = datetime()
		print('Iniciando o backup de '+item+' em '+timestamp)
		
		os.system('C:\\xampp\\mysql\\bin\\mysqldump.exe --add-drop-database -u ' + config.mysql_user + ' -p ' + config.mysql_password + ' --databases ' + item + ' > ' + filename) #executo o comando de backup do banco de dados (mysqldump) e salvo o arquivo na pasta de destino (path + nome do banco de dados + data + .sql)

		timestamp = datetime() 
		
		mensagem = 'Backup '+ filename + ' finalizado em ' + timestamp

		print(mensagem)
