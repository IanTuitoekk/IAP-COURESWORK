<?php
session_start();
require "includes/constants.php";
require "includes/dbConnection.php";
//Class Auto Load

function classAutoLoad($classname)
{
    $directories = ["contents", "layouts", "menus"];

    foreach ($directories as $dir) {
    
        $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR
            . $classname . ".php";
        if (file_exists($filename) and is_readable($filename)) {
            require_once $filename;
        }
    }
}

spl_autoload_register('classAutoLoad');

$ObjGlob = new fncs();

// $ObjSendMail = new SendMail();

//Create instances of all classes

// require_once "layouts/layouts.php";
$ObjLayouts = new layouts();
// require_once "menus/menus.php";
$ObjMenus = new menus();
// require_once "contents/headings.php";
$ObjHeadings = new headings();
$ObjCont=new contents();
$ObjForm = new user_forms();

$conn = new dbConnection(DBTYPE,HOSTNAME,DBPORT,HOSTUSER,HOSTPASS,DBNAME);


//Create process instances

$ObjAuth=new auth();
$ObjAuth->signup($conn,$ObjGlob,$Obj);

?>