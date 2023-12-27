# Instalar o Python 3
# pip install pymysql

import pymysql

def conectar():
    hostname = "localhost"
    bancodedados = "agendamento"
    usuario = "root"
    senha = ""

    try:
        conexao = pymysql.connect(
            host=hostname,
            user=usuario,
            password=senha,
            database=bancodedados
        )

        return True, conexao
    
    except pymysql.Error as erro:
        print("Falha ao conectar ao banco de dados:", erro)
        return False, None
