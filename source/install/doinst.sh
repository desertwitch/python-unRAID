#!/bin/bash
#
# Copyright Derek Macias (parts of code from NUT package)
# Copyright macester (parts of code from NUT package)
# Copyright gfjardim (parts of code from NUT package)
# Copyright SimonF (parts of code from NUT package)
# Copyright Lime Technology (any and all other parts of Unraid)
#
# Copyright desertwitch (as author and maintainer of this file)
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License 2
# as published by the Free Software Foundation.
#
# The above copyright notice and this permission notice shall be
# included in all copies or substantial portions of the Software.
#
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

# set up plugin-specific polling tasks
rm -f /etc/cron.daily/python-poller >/dev/null 2>&1
ln -sf /usr/local/emhttp/plugins/dwpython/scripts/poller /etc/cron.daily/python-poller >/dev/null 2>&1
chmod +x /etc/cron.daily/python-poller >/dev/null 2>&1
