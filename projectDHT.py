import pigpio
import DHT22
import urllib.request
from time import sleep

#sudo pigpiod minden inditás előtt
# GPIO betöltése pigpionak
pi = pigpio.pi()
# Szenzor telepitése
dht22 = DHT22.sensor(pi, 4) # aktuláis GPIO pin neve
dht22.trigger()# ez nem számit

# x másodpercig aludjon legalább
sleepTime = 30

def readDHT22():
    #Új adat
    dht22.trigger()
    #értékek elmentése
    humidity = '%.2f' % (dht22.humidity())
    temp= '%.2f' % (dht22.temperature())
    return (humidity, temp) # visszaadja a páratartalom és hőmérsékletet

while True: 
    humidity, temperature = readDHT22()
    if humidity > "0" and temperature >"-100":
        print("Humidity is: " + humidity + "%")
        print("Temperature is: " + temperature +"C")
        urllib.request.urlopen("https://patrikkocsis98.000webhostapp.com/add_data.php?temp="+temperature+"&hum="+humidity).read()
    sleep(sleepTime)
