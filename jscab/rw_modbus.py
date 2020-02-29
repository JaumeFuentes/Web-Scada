import digitals
import RPi.GPIO as GPIO
import time
from pymodbus.client.sync import ModbusTcpClient

class Objeto():
	def __init__(self, s, xa, xm, automatico):
		self.s = s
		self.xa = xa
		self.xm = xm
		self.automatico = automatico
		
	def salida(self):
		if self.automatico and self.xa:
			self.s = 1
		
			
		if not self.automatico and self.xm:
			self.s = 1
		
		if not self.automatico and not self.xm:
			self.s = 0
			
		if self.xm == 0 and self.xa == 0:
			self.s = 0

digital1 = Objeto(0,0,0,0)
digital2 = Objeto(0,0,0,0)

objetos = [digital1, digital2]

client = ModbusTcpClient('192.168.1.39')
while True:
	print (digital1.automatico)
	result = client.read_holding_registers(0x10, 2, uint=1)
	parametro = result.registers[0]
	orden = result.registers[1]
	
	#orden paso automatico
	if orden == 200:
		objetos[parametro].automatico = True
	#orden paso a manual	
	if orden == 201:
		objetos[parametro].automatico = False
	
	#orden marcha manual
	if orden == 300:
		objetos[parametro].xm = True
	#orden paro manual
	if orden == 301:
		objetos[parametro].xm = False
	
	digital1.salida()
	s1 = digital1.s
	
	digital1.xa = GPIO.input(17)
	
	
	
	digitals.writeDigitals(1,s1)
	time.sleep(0.5)
	
client.close()
