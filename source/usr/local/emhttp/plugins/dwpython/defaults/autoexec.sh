#!/bin/bash
#
# Put here all commands that you wish to to execute after a system reboot.
# They are executed NON-BLOCKING (but sequentially), ensuring the boot sequence proceeds regardless of any script error.
#
# The purpose of this script, for example, is to establish that certain global packages are always installed with `pip`.
# Please keep in mind that using virtual environments is always preferable over globally installing any Python packages.
#
# All output is directed to the SYSLOG. To prevent this, append ` &>/dev/null` (without quotes) to the end of any command.
# Alternatively, just put `exec &>/dev/null` on the first non-comment line of this script to disable ALL commands outputs.
#
