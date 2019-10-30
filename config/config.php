<?php

define('DB_NAME','madi');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');

define('DEBUG',true);
define('DEFAULT_CONTROLLER','Home');//define controller if there isnt one definfined by the url
define('DEFAULT_LAYOUT','default'); //if no layout is set in the controller use this layout

define('PROOT','/camagru/');//set this to '/' for a live server

define('SITE_TITLE','Zakhele Mvc Framework');//This will be used if no site title is se
define('CURRENT_USER_SESSION_NAME' , 'zakhele');//sission  name  for logged in user
define('REMEMBER_ME_COOKIE_NAME','madi');//cookie name for loged in user remember me
define('REMEMBER_ME_COOKIE_EXPIRY',64000);//time in seconds for me cookie to live(aday)