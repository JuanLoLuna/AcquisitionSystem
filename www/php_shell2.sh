#!/bin/sh
/sbin/service sshd restart

echo "Loading Device Tree Overlay..."
export SLOTS=/sys/devices/bone_capemgr.9/slots
cd /lib/firmware
echo EBB-PRU-ADC > $SLOTS
cat $SLOTS
echo "done";

rmmod uio_pruss
modprobe uio_pruss extram_pool_sz=0x4E20
echo "The RAM pool size for the acquisition is:"
cat /sys/class/uio/uio0/maps/map1/size

