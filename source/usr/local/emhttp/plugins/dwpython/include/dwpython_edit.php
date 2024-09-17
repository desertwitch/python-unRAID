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
    // Use substr to extract the start of the string and compare it with the given start string
    return substr($string, 0, strlen($startString)) === $startString;
}

if(isset($_GET['editfile'])) {
    try {
        if(!startsWith($_POST['editfile'], "/etc/dwpython/")) {
            $return = [];
            $return["error"]["response"] = "File location is not allowed.";
            die(json_encode($return));
        }
        $file = $_GET['editfile'];
        if(file_exists($file)) {
            $filecontents = file_get_contents($file);
            if($filecontents !== false) {
                $return["success"]["response"] = $filecontents;
            } else {
                $return["error"]["response"] = "Could not get file contents";
            }
        } else {
            $return["error"]["response"] = "File does not exist";
        }
    }
    catch (\Throwable $t) {
        $return = [];
        $return["error"]["response"] = $t->getMessage();
    }
    catch (\Exception $e) {
        $return = [];
        $return["error"]["response"] = $e->getMessage();
    }
    echo json_encode($return); 
}
?>
