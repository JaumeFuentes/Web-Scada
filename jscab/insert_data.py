import socket
import time
import digitals
import analogs


#host = "192.168.1.42"  #ip address where is the web server running
host = "192.168.255.110"
port = 80
device = "raspberry2"  #name of this device



digitalData = []
lastDigitalData = []

analogInputs = []
lastAnalogInputs = [0,0,0,0,0]

analogOutputs = []
lastAnalogOutputs = [0,0,0,0,0]


		
def insertData(host, port, device, di1, di2, di3, di4, do1, do2, do3, do4, ai1, ai2, ai3, ai4, ai5, ao1, ao2, ao3, ao4, ao5):
	
		
	#create a socket
	comms_socket = socket.socket()
	print("socket created")
	
	try:
		#connect to host through that socket
		comms_socket.connect((host, port))
		print("connected to host")	
		
		#prepare the http request
		data = "GET /phpfunctions/insert_data.php?device=" + device + "&DI1=" + str(di1) + "&DI2=" + str(di2) + "&DI3=" + str(di3) + "&DI4=" + str(di4) + "&DO1=" + str(do1) + "&DO2=" + str(do2) + "&DO3=" + str(do3) + "&DO4=" + str(do4) + "&AI1=" + str(ai1) + "&AI2=" + str(ai2) + "&AI3=" + str(ai3) + "&AI4=" + str(ai4) + "&AI5=" + str(ai5) + "&AO1=" + str(ao1) + "&AO2=" + str(ao2) + "&AO3=" + str(ao3) + "&AO4=" + str(ao4) + "&AO5=" + str(ao5) + " HTTP/1.1\r\nhost: localhost\r\nConnection: close\r\n\r\n"
		
		#send the data	
		comms_socket.send(bytes(data, "UTF-8"))
		print("data sent")
					
		data_recv = comms_socket.recv(4096).decode("UTF-8")
		
		
		comms_socket.close()
		
		print(data_recv)
	except(BrokenPipeError, OSError):
		print ("conexion no establecida")


	
while True:	
	digitalData = digitals.readDigitals()
	analogInputs = analogs.readAnalogInputs(lastAnalogInputs)
	analogOutputs = analogs.readAnalogOutputs(lastAnalogOutputs)
		
	
	if (lastDigitalData != digitalData or lastAnalogInputs != analogInputs or lastAnalogOutputs != analogOutputs):
		insertData(host, port, device, digitalData[0], digitalData[1], digitalData[2], digitalData[3], digitalData[4], digitalData[5], digitalData[6],digitalData[7], analogInputs[0], analogInputs[1], analogInputs[2], analogInputs[3], analogInputs[4], analogOutputs[0], analogOutputs[1], analogOutputs[2], analogOutputs[3], analogOutputs[4])
		lastDigitalData = digitalData
		lastAnalogInputs = analogInputs
		lastAnalogOutputs = analogOutputs
		
