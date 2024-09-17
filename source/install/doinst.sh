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

# copy auto-execution script to RAM and make executable for post-install
cp -f $BOOT/scripts/autoexec.sh /tmp/dwpython-autoexec.sh >/dev/null 2>&1
chmod 755 /tmp/dwpython-autoexec.sh >/dev/null 2>&1

# set up plugin-specific polling tasks
rm -f /etc/cron.daily/python-poller >/dev/null 2>&1
ln -sf /usr/local/emhttp/plugins/dwpython/scripts/poller /etc/cron.daily/python-poller >/dev/null 2>&1
chmod +x /etc/cron.daily/python-poller >/dev/null 2>&1
