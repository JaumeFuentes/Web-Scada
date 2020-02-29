import socket
import time
import struct
import digitals
import motor

port = 8082
host = "192.168.255.110" #ip address of this device

def pack_data(data):
	
	packer = struct.Struct('I I')
	return packer.pack(*data)
	
def recv_and_unpack_data(comm):
	unpacker = struct.Struct('I I')
	
	
	data = comm.recv(unpacker.size)
	print('received data')
	print (data)
	return unpacker.unpack(data)

def server(host, port):	
	
	data = [0,0]
	connected = 0
	
	    
	comms_socket = socket.socket()
	comms_socket.bind((host, port))
    
	print("Server started. Waiting for connections at ", host, " on port ", port)
    
	while True:
		comms_socket.listen(10)        
		connection, address = comms_socket.accept()
		connected = 1
		print("Connection established. Getting data from client", address)

		while connected != 0:
			try:        
				data_recv = recv_and_unpack_data(connection)
				print(data_recv)
                
				if(data_recv[0] == 5):
					motor.outputMotor(data_recv[1])
				else:
					digitals.writeDigitals(data_recv[0],data_recv[1])
					
				connected = 0
                
			except (BrokenPipeError, OSError):
				connection.close()
				connected = 0
				print("Connection closed with ", address)
		
		

		


#start server
server(host, port)
