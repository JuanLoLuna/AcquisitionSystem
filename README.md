# Acquisition System
A BeagleBone Black based acquisition system (based on Derek Molloy PRUADC example)

This is aquisition system with a developed laravel user interface

## Debian BB version
The version used to develop the AS was Debian 8.4 2016-05-13 downloaded directly from BeagleBoard.org Latest Firmware Images page, here is the download link:

[Debian 8.4 2016-05-13](https://debian.beagleboard.org/images/bone-debian-8.4-lxqt-4gb-armhf-2016-05-13-4gb.img.xz)

The Linux image used was the 3.8.13-bone70, you can get it using the apt-get command as follows:

	apt-get install linux-headers-3.8.13-bone70
	apt-get install linux-image-3.8.13-bone70
	
Don't forget to reboot after both headers and linux image are installed using

	-reboot

## PostgreSQL and Nginx installation
The database used is PostgreSQL, at the time of installation the newest version was 9.4, use the next line to install it

	apt-get install postgresql
	
Nginx server was used, the first step for the new server installation is to remove Apache2 (default server in BB)

	apt-get remove apache2
	apt-get autoremove
	
And then we have to disable the port 80, which is used by the BB to display the main page. Nginx uses this port to display the demo page, which is usefull to check if the installation was successful

	systemctl disable bonescript.service
	systemctl disable bonescript.socket
	systemctl disable bonescript-autorun.service
	-reboot
	
Then install Nginx (version 1.6.2 was used)

	apt-get install nginx

Nginx installation can be checked in a browser typing the BB IP used

## PHP installation
The version installed was php 5.6.22

Install the newest version and the FastCGI Process Manager typing the following lines in the command window

	apt-get install php5 php5-fpm
	apt-get install php5-pgsql
	
The last code line install the pgsql extension to be used by PostgreSQL

## Laravel installation
For laraver installation is necessary to first install [Composer](https://getcomposer.org/download/) (follow the directions from the link). Once comopser is downloaded move the file composer.phar to bin folder.

	mv composer.phar /usr/local/bin/composer
	
The you can follow the instructions stated in the Digital Ocean blog. [How to Install Laravel with an Nginx Web Server on Ubuntu 14.04](https://www.digitalocean.com/community/tutorials/how-to-install-laravel-with-an-nginx-web-server-on-ubuntu-14-04), in order to install laravel.

## Disable HDMI cape from BB
Disable the HDMI cape adding the next lines to the uEnv.txt file located in the boot folder

	cape_disable=/sys/device/bone_capemgr.9/slots
	reboot
	
