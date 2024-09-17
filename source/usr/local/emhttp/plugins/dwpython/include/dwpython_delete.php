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

if(array_key_exists('deletefile', $_POST)) {

	$deletefile     = $_POST['deletefile'];

	$plgpath  = '/boot/config/plugins/dwpython/scripts/';
	$plgfile  = $plgpath.basename($deletefile);

    // create directory on flash drive if missing (shouldn't happen)
    if(! is_dir($plgpath)){
        mkdir($plgpath);
    }

    // save conf file to flash drive
    unlink($plgfile);

    // save conf file
    $return_var = unlink($deletefile);
} else {
    $return_var = false;
}

if($return_var !== false) {
    $return = ['success' => true, 'saved' => $deletefile];
} else {
    $return = ['error' => $deletefile];
}
echo json_encode($return);
?>
