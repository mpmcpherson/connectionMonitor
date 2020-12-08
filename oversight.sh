#!/bin/bash
while inotifywait -e modify,create,delete -r -m /home/michael/src/connectionMonitor/; do
	
	echo "starting copy\n";
	sudo cp -r /home/michael/src/connectionMonitor/ /var/www/html;
	echo "\ncopy finished\n";


done