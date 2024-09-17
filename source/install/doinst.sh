#!/bin/bash
BOOT="/boot/config/plugins/dwpython"
DOCROOT="/usr/local/emhttp/plugins/dwpython"

# create local scripts directory
if [ ! -d /etc/dwpython ]; then
    mkdir -p /etc/dwpython
fi

# prepare scripts backup directory on flash drive, if it does not already exist
if [ ! -d $BOOT/scripts ]; then
    mkdir -p $BOOT/scripts
fi

# copy default script files to flash drive, if no backups exist there
cp -nr $DOCROOT/defaults/* $BOOT/scripts/ >/dev/null 2>&1

# copy script files from flash drive to local system, for our plugin to use
cp -rf $BOOT/scripts/* /etc/dwpython/ >/dev/null 2>&1

# Set permissions
chmod 755 $DOCROOT/scripts/* >/dev/null 2>&1
chmod 755 /etc/dwpython/*.sh >/dev/null 2>&1

if [ "$( grep -ic "dwpython" /etc/rc.d/rc.local_shutdown )" -eq 0 ]; then
    sed -i -e '/# Get time-out setting/i [ -x /usr/local/emhttp/plugins/dwpython/scripts/backup ] && /usr/local/emhttp/plugins/dwpython/scripts/backup' -e //N /etc/rc.d/rc.local_shutdown
fi
