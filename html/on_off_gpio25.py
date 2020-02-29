#!/usr/bin/env python
import time
import RPi.GPIO as GPIO
import sys

php_value = sys.argv[1]

PIN_25 = 25 # Define LED colour and their GPIO pin
GPIO.setmode(GPIO.BCM)

GPIO.setup(PIN_25, GPIO.OUT) # Setup GPIO pin

if php_value == 'on':
	GPIO.output(PIN_25, True)  #Turn on
if php_value == 'off':
	GPIO.output(PIN_25, False)  #Turn off
#time.sleep (1)               #Wait
#GPIO.output(PIN_25, False) #Turn off

#GPIO.cleanup() #Useful to clear the board
