import socket

server = socket.socket()
ip = 'localhost'
port = 6000

server.bind((ip, port))
server.listen((3)) #max 3 client may connect to my server if you set 0 ise no limit
client, client_address = server.accept()
print(client_address)

client.send('Welcome to Python' .encode())

server.close()
