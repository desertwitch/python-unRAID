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

if(isset($_POST['deletefile'])) {
    try {
            $deletefile = $_POST['deletefile'];
            $bootpath   = '/boot/config/plugins/dwpython/scripts/';
            $bootfile   = $plgpath.basename($deletefile);
            if(!file_exists($deletefile)){
                $return = [];
                $return["error"]["response"] = "File does not exist on local system.";
                die(json_encode($return));
            }
            if(!file_exists($bootfile)){
                $return = [];
                $return["error"]["response"] = "File does not exist on USB.";
                die(json_encode($return));
            }
            if(!unlink($deletefile)) {
                $return = [];
                $return["error"]["response"] = "Failed to delete file on local system.";
                die(json_encode($return));
            }
            if(!unlink($bootfile)) {
                $return = [];
                $return["error"]["response"] = "Failed to delete file on USB flashdrive.";
                die(json_encode($return));
            }
            $return["success"]["response"] = $deletefile;
    }
    catch (\Throwable $t) {
        $return = [];
        $return["error"]["response"] = $t->getMessage();
        die(json_encode($return));
    }
    catch (\Exception $e) {
        $return = [];
        $return["error"]["response"] = $e->getMessage();
        die(json_encode($return));
    }
    echo json_encode($return);
}
?>
