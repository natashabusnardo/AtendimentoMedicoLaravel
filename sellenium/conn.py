import mysql.connector

def getConn():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="",
        database="atendimento"
    )
    
def getCursor(conn):
    return conn.cursor()

def close_connection(conn):
    conn.close()
    
def close_cursor(cursor):
    cursor.close()
    
def insert_data(conn, cursor, table, data):
    sql = "INSERT INTO " + table + " (cid_id, descricao, created_at, updated_at) VALUES (%s, %s, %s, %s, NOW(), NOW())"
    cursor.execute(sql, data)
    conn.commit()
    
def update_data(conn, cursor, table, data):
    sql = "UPDATE " + table + " SET cid_id = %s, descricao = %s, updated_at = NOW() WHERE cid_id = %s"
    cursor.execute(sql, data)
    conn.commit()
    
def isset(cursor, table, data):
    sql = "SELECT * FROM " + table + " WHERE cid_id = %s"
    cursor.execute(sql, data)
    result = cursor.fetchall()
    if len(result) > 0:
        return True
    else:
        return False