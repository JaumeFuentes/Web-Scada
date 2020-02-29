import RPi.GPIO as IO        # calling for header file which helps us use GPIO’s of PI
import time                          # calling for time to provide delays in program
IO.setwarnings(False)         # do not show any warnings
x=1
b0 =0                                    # integers for storing 8 bits
b1 =0
b2 =0
b3 =0
b4 =0
b5 =0
b6 =0
b7 =0
IO.setmode (IO.BCM)            # programming the GPIO by BCM pin numbers. (like PIN29 as‘GPIO5’)
IO.setup(21,IO.IN)                    # initialize GPIO Pins as input
IO.setup(20,IO.IN)
IO.setup(16,IO.IN)
IO.setup(12,IO.IN)
IO.setup(25,IO.IN)
IO.setup(24,IO.IN)
IO.setup(23,IO.IN)
IO.setup(18,IO.IN)

lecturas = [0,0,0,0,0,0,0,0,0,0]
total = 0
totalAnt = 0
aux = 0
while 1:  
	                                        
	if (IO.input(18) == True):
		time.sleep(0.001)
		if (IO.input(18) == True):
			b7=1                                      
	
	if (IO.input(23) == True):
		time.sleep(0.001)
		if (IO.input(23) == True):
			b6=1                                     

	if (IO.input(24) == True):
		time.sleep(0.001)
		if (IO.input(24) == True):
			b5=1                                      
	
	if (IO.input(25) == True):
		time.sleep(0.001)
		if (IO.input(25) == True):
			b4=1                                    

	if (IO.input(12) == True):
		time.sleep(0.001)
		if (IO.input(12) == True):
			b3=1                                     
	
	if (IO.input(16) == True):
		time.sleep(0.001)
		if (IO.input(16) == True):
			b2=1                                    

	if (IO.input(20) == True):
		time.sleep(0.001)
		if (IO.input(20) == True):
			b1=1                                    
	
	if (IO.input(21) == True):
		time.sleep(0.001)
		if (IO.input(21) == True):
			b0=1                                    
    
    
	x = (1*b0)+(2*b1)+(4*b2)+(8*b3)+(16*b4)+(32*b5)+(64*b6)+(128*b7)
	
	if ( aux <= 9 ):
		lecturas[aux] = x
		aux = aux + 1
	else:
		aux = 0
		for i in lecturas:
			total = total + i
		total = total/10;
		
		if ( abs(total - totalAnt) <= 1 ):
			print (totalAnt)
		else:
			print (total)
			totalAnt = total			
		
		total = 0
		time.sleep(1) 
		
	                                    
	b0=b1=b2=b3=b4=b5=b6=b7=0   
	     
	time.sleep(0.05)                                  

