#!/bin/bash
#
# Put here all commands to run anytime the plugin installed (e.g. at boot-time), re-installed or updated on your system.
# They are executed NON-BLOCKING (but sequentially), ensuring boot/(re-)install proceed regardless of any script errors.
# The purpose of this script, for example, is to establish that certain packages are always installed by means of `pip`.
#
# All output is directed to the SYSLOG, to prevent this append '&>/dev/null' (without quotes) to the end of any command.
# or, alternatively, put 'exec &>/dev/null' on the first non-comment line of this script to disable ANY commands output.
#
