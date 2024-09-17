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

if(array_key_exists('newfile', $_POST)) {

	$newfile     = '/etc/dwpython/'.$_POST['newfile'].'.py';

	$plgpath  = '/boot/config/plugins/dwpython/scripts/';
	$plgfile  = $plgpath.basename($newfile);

    // create directory on flash drive if missing (shouldn't happen)
    if(! is_dir($plgpath)){
        mkdir($plgpath);
    }

    // save conf file to flash drive
    file_put_contents($plgfile, "");

    // save conf file
    $return_var = file_put_contents($newfile, "");
} else {
    $return_var = false;
}

if($return_var !== false) {
    $return = ['success' => true, 'saved' => $newfile];
} else {
    $return = ['error' => $newfile];
}
echo json_encode($return);
?>
