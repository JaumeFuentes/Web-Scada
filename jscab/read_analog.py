import RPi.GPIO as IO        # calling for header file which helps us use GPIO’s of PI
import time                          # calling for time to provide delays in program
IO.setwarnings(False)         # do not show any warnings


IO.setmode (IO.BCM)            
IO.setup(21,IO.IN)                  
IO.setup(20,IO.IN)
IO.setup(16,IO.IN)
IO.setup(12,IO.IN)
IO.setup(25,IO.IN)
IO.setup(24,IO.IN)
IO.setup(23,IO.IN)
IO.setup(18,IO.IN)


def readAnalog(): 
	b0 =0                                   
	b1 =0
	b2 =0
	b3 =0
	b4 =0
	b5 =0
	b6 =0
	b7 =0 
	lecturas = [0,0,0,0,0,0,0,0,0,0]
	total = 0
	totalAnt = 0
	aux = 0
	while (aux <= 9):
	                                        
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
		
		
		lecturas[aux] = x
		aux = aux + 1
		time.sleep(0.05) 
		
	for i in lecturas:
		total = total + i
	total = total/10;
	return total


			
			
			 
		                                 

