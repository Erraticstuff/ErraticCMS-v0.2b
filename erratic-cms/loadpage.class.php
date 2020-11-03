<?php
include('erratic-cms/themes/default.php');
include_once('../ecms-config.php');
$testconndb = mysqli_connect(ECMS_DB_HOST, ECMS_DB_USR, ECMS_DB_PASS, ECMS_DB_NAME);
if(!$testconndb) {
    include('../erratic-cms/includes/500-critical-error.php');
}
?>