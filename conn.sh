#!/bin/bash

while :
do
	curl -X post 'http://www.mpmcpherson.com/connTime/resources/dateTimeHandler.php' -d '{ "name" : "dellHouse" }'	
	#curl -X post 'http://localhost/connTime/resources/dateTimeHandler.php' -d '{ "name" : "genericName" }'	
	sleep 30s
done
