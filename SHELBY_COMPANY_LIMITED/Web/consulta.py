from conexao import conectar

# Obtém a conexão com o banco de dados
conectado, conexao = conectar()

# Verifica se a conexão é bem-sucedida
if conectado:
    print("Conectado")
    # Faça outras operações no banco de dados
    cursor = conexao.cursor()

    # Executa a consulta SELECT para obter os dados
    query = "SELECT * FROM cadastro"
    cursor.execute(query)
    
    # Recupera os resultados da consulta
    resultados = cursor.fetchall()

    # Exibe os dados obtidos
    for row in resultados:
        print(row)

    # Fecha o cursor e a conexão com o banco de dados
    cursor.close()
    conexao.close()
