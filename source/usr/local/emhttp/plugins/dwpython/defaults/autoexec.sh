#!/bin/bash
#
# Put here all commands to run anytime the plugin installed (e.g. at boot-time), re-installed or updated on your system.
# They are executed NON-BLOCKING (but sequentially), ensuring boot/(re-)install proceed regardless of any script errors.
# The purpose of this script, for example, is to establish that certain global packages are always installed with `pip`.
#
# All output is directed to the SYSLOG. To prevent this, append ` &>/dev/null` (without quotes) to the end of any command.
# Alternatively, just put `exec &>/dev/null` on the first non-comment line of this script to disable ALL commands outputs.
#
