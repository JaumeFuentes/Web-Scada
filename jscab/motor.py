import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setup(24, GPIO.OUT)  # Ponemos el pin GPIO nº24 como salida
 
  
motor = GPIO.PWM(24, 100)   # Creamos el objeto 'white' en el pin 25 a 100 Hz  

  
motor.start(0)              # Iniciamos el objeto 'motor' al 0% del ciclo de trabajo (completamente apagado)  

def outputMotor(value):
	motor.ChangeDutyCycle(value) #va de 0 a 100
