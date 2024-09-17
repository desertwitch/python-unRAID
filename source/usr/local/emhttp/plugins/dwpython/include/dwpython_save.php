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
$return = [];

function startsWith($string, $startString) {
    return substr($string, 0, strlen($startString)) === $startString;
}

if(isset($_POST['editfile']) && isset($_POST['editdata'])) {
    try {
        $editfile = $_POST['editfile'];
        if(!startsWith($editfile, "/boot/config/plugins/dwpython/")) {
            $return = [];
            $return["error"]["response"] = "File location is not allowed.";
            die(json_encode($return));
        }
        $editdata = str_replace("\r", '', $_POST['editdata']);
        if(file_put_contents($editfile, $editdata) !== false) {
            $return["success"]["response"] = $editfile;
        } else {
            $return["error"]["response"] = "Failed to create file.";
        }
    }
    catch (\Throwable $t) {
        error_log($t);
        $return = [];
        $return["error"]["response"] = $t->getMessage();
    }
    catch (\Exception $e) {
        error_log($e);
        $return = [];
        $return["error"]["response"] = $e->getMessage();
    }
    echo json_encode($return);
}
?>
