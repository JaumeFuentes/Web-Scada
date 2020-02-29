#The sistem is designed to have 5 Analog inputs and 5 Analog outputs
#Analog inputs may come from different sources: they can be calculated 
#by software, for example when counting pulses in a period of time or
#from analog to digital converters or read from files

#In this script we will take care of collecting the data of all AI and AO,
#and we will store it in two arrays analogInputs and analogOutputs

#Depending on the applicantion this script has to be changed 


import anemometro
import os

#####################
## AI1 CALCULATION ##
#####################

def ai1Calculation():
	velocidad = anemometro.velocidad()
	#During the time the function is counting pulses it returns -1
	#After that time it returns the correct value and we pass it to ai1
	return velocidad
		

#####################
## AI2 CALCULATION ##
#####################


def ai2Calculation():
	file = open("/home/pi/jscab/humidity.txt", "r")
	humidity = file.readline()
	file.close()
	try:
		ai2 = float(humidity)
	except ValueError:
		ai2 = -1
	
	return ai2

#####################
## AI3 CALCULATION ##
#####################

def ai3Calculation():
	file = open("/home/pi/jscab/temperature.txt", "r")
	temperature = file.readline()
	file.close()
	try:
		ai3 = float(temperature)
	except ValueError:
		ai3 = -1
	
	return ai3

#####################
## AI4 CALCULATION ##
#####################

def ai4Calculation():
	ai4 = 0
	return ai4

#####################
## AI5 CALCULATION ##
#####################

def ai5Calculation():
	ai5 = 0
	return ai5
	
	
	
####################################################################
######### analogInputs 
####################################################################

def readAnalogInputs(lastState):
	
	ai1= ai1Calculation()
	if(ai1 == -1):
		ai1 = lastState[0]
		
	ai2= ai2Calculation()
	if(ai2 == -1):
		ai2 = lastState[1]
	
	ai3= ai3Calculation()
	if(ai3 == -1):
		ai3 = lastState[2]
	
	ai4= ai4Calculation()
	
	ai5= ai5Calculation()
	
	analogInputs = [ai1, ai2, ai3, ai4, ai5]
	return analogInputs
	
	
#####################
## AO1 CALCULATION ##
#####################

def ao1Calculation():
	ao1 = 0
	return ao1
	
#####################
## AO2 CALCULATION ##
#####################

def ao2Calculation():
	ao2 = 0
	return ao2
	
#####################
## AO3 CALCULATION ##
#####################

def ao3Calculation():
	ao3 = 0
	return ao3
	
#####################
## AO4 CALCULATION ##
#####################

def ao4Calculation():
	ao4 = 0
	return ao4
	
#####################
## AO5 CALCULATION ##
#####################

def ao5Calculation():
	ao5 = 0
	return ao5
		
####################################################################
######### analogOutputs
####################################################################

def readAnalogOutputs(lastState):
	
	ao1= ao1Calculation()
	
	ao2= ao2Calculation()
	
	ao3= ao3Calculation()
	
	ao4= ao4Calculation()
	
	ao5= ao5Calculation()
	
	analogOutputs = [ao1, ao2, ao3, ao4, ao5]
	return analogOutputs




