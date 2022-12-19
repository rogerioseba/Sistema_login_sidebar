<?php

session_start();

if ($_SERVER['REQUEST_SCHEME']=='https'){
    $pathIn = "";
    define("URL_BASE","https://login.servehttp.com");
}else{
    $pathIn = "/Tippet_Tag";
    define("URL_BASE","http://localhost".$pathIn);
}


#caminhos absolutos

define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}{$pathIn}");

(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$bar="":$bar="/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$pathIn}");

#banco de dados
define('DBHOST','localhost');
define('DBNAME','bd_tag_tippet');
define('DBUSER','rogerio');
define('DBPASS','R0g3r10@');
