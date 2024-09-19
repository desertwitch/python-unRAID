<?
/* Copyright Derek Macias (parts of code from NUT package)
 * Copyright macester (parts of code from NUT package)
 * Copyright gfjardim (parts of code from NUT package)
 * Copyright SimonF (parts of code from NUT package)
 * Copyright Dan Landon (parts of code from Web GUI)
 * Copyright Bergware International (parts of code from Web GUI)
 * Copyright Lime Technology (any and all other parts of Unraid)
 *
 * Copyright desertwitch (as author and maintainer of this file)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License 2
 * as published by the Free Software Foundation.
 *
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 */
$dwpython_cfg = parse_ini_file("/boot/config/plugins/dwpython/dwpython.cfg");
$dwpython_backend = trim(isset($dwpython_cfg['BACKEND']) ? htmlspecialchars($dwpython_cfg['BACKEND']) : 'default');
$dwpython_metricsapi = trim(isset($dwpython_cfg['METRICSAPI']) ? htmlspecialchars($dwpython_cfg['METRICSAPI']) : 'enable');

$dwpython_py_backend = htmlspecialchars(trim(shell_exec("find /var/log/packages/ -type f -iname 'python3-*' -printf '%f\n' 2>/dev/null") ?? "n/a"));
$dwpython_pip_backend = htmlspecialchars(trim(shell_exec("find /var/log/packages/ -type f -iname 'python-pip-*' -printf '%f\n' 2>/dev/null") ?? "n/a"));
$dwpython_st_backend = htmlspecialchars(trim(shell_exec("find /var/log/packages/ -type f -iname 'python-setuptools-*' -printf '%f\n' 2>/dev/null") ?? "n/a"));
?>
