<?php
 include_once '../includes/merger.php';

$dirjs="../../js/";
 $dirjsdata = array($dirjs."jquery24.js",$dirjs."materialize.js",$dirjs."index.js",$dirjs."init.js",$dirjs."updatecontent.js",$dirjs."waypoint.js");
 mergerjs($dirjsdata,$dirjs."combine/index.js");
 
 $dircss="../../css/";
 $dircssdata = array($dircss."mobile-device.css",$dircss."pc-device.css",$dircss."materialize.css",$dircss."style.css");
 mergercss($dircssdata,$dircss."combine/index.css");
 
?>