#!/bin/bash
BOOT="/boot/config/plugins/dwpython"
DOCROOT="/usr/local/emhttp/plugins/dwpython"

# set permissions
chmod 755 $DOCROOT/scripts/* >/dev/null 2>&1

# prepare scripts backup directory on flash drive, if it does not already exist
if [ ! -d $BOOT/scripts ]; then
    mkdir -p $BOOT/scripts
fi

# copy default settings file if none exists
cp -n $DOCROOT/default.cfg $BOOT/dwpython.cfg >/dev/null 2>&1

# copy default script files to flash drive, if no backups exist there
cp -nr $DOCROOT/defaults/* $BOOT/scripts/ >/dev/null 2>&1

# copy auto-execution script to RAM and make executable
cp -f $BOOT/scripts/autoexec.sh /tmp/dwpython-autoexec.sh
chmod 755 /tmp/dwpython-autoexec.sh
