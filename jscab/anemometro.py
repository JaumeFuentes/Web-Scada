#!/usr/bin/env python
import time
import RPi.GPIO as GPIO

PIN_25 = 25
GPIO.setmode(GPIO.BCM)
GPIO.setup(PIN_25, GPIO.IN)


def timer(Tiempo):
	global TimeNotReached
	global TiempoFin
	
	if(TimeNotReached == False):
		TiempoFin = int( time.time() ) +Tiempo
	if(time.time() > TiempoFin):
		TimeNotReached = False
		return True
	else:
		TimeNotReached = True
		return False
		
def velocidad():	
	global Contador
	global EstadoAnterior
	
	Estado = GPIO.input(PIN_25)
	if(timer(5) == False):
		if(Estado != EstadoAnterior):
			Contador = Contador + 1
			EstadoAnterior = Estado			
		return -1
	else:
		Aux = Contador/2
		Contador = 0
		return Aux

TimeNotReached = False		
Contador = 0
EstadoAnterior = 0
'''while True:
	velocidad = anemometro()
	if(velocidad != -1):
		print(velocidad)
'''
