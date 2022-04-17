import socket

server = socket.socket()
ip = 'localhost'
port = 6000

server.connect((ip, port))

print('Connected')

message = server.recv(1024)
print(message.decode())
server.close()