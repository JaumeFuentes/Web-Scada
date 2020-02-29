import RPi.GPIO as GPIO




GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

digitalInput1 = 4
digitalInput2 = 17
digitalInput3 = 27
digitalInput4 = 22

digitalOutput1 = 5
digitalOutput2 = 6
digitalOutput3 = 13
digitalOutput4 = 19

GPIO.setup(digitalInput1, GPIO.IN) 
GPIO.setup(digitalInput2, GPIO.IN)
GPIO.setup(digitalInput3, GPIO.IN)
GPIO.setup(digitalInput4, GPIO.IN)

GPIO.setup(digitalOutput1, GPIO.OUT)
GPIO.setup(digitalOutput2, GPIO.OUT)
GPIO.setup(digitalOutput3, GPIO.OUT)
GPIO.setup(digitalOutput4, GPIO.OUT)

def readDigitals():
	di1 = GPIO.input(digitalInput1)
	di2 = GPIO.input(digitalInput2)
	di3 = GPIO.input(digitalInput3)
	di4 = GPIO.input(digitalInput4)
	
	do1 = GPIO.input(digitalOutput1)
	do2 = GPIO.input(digitalOutput2)
	do3 = GPIO.input(digitalOutput3)
	do4 = GPIO.input(digitalOutput4)
	digitals = [di1, di2, di3, di4, do1, do2, do3, do4]
	
	return digitals
	
def writeDigitals(digitalOutput, state):
	if(digitalOutput == 1):
		GPIO.output(digitalOutput1, state)
	if(digitalOutput == 2):
		GPIO.output(digitalOutput2, state)
	if(digitalOutput == 3):
		GPIO.output(digitalOutput3, state)
	if(digitalOutput == 4):
		GPIO.output(digitalOutput4, state)		
		

   

