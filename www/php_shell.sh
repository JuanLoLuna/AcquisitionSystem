#!/bin/sh
/sbin/service sshd restart

./pruadc
./mem2file 100000  > Prueba01.dat
