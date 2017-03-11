<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * All your custom route must be set here note see https://ellislab.com/codeigniter/user-guide/general/routing.html
 * example 
 * $route["login"] = "mycontroller/myfunction/$1";
 */


$route["superuser"] = "superuser/index";
$route["superuser/login"] = "superuser/login";
$route["superuser"] = "superuser/index";
$route["superuser/login"] = "superuser/login";
$route["superuser/categories"] = "superuser/categories";
$route["requests/(:any)"] = "superuser/requests/$1";
$route["superuser/add_news"] = "superuser/add_news";
$route["superuser/news"] = "superuser/news";
$route["superuser/news/(:num)"] = "superuser/edit_news/$1";
$route["superuser/users"] = "superuser/users";
$route["superuser/design"] = "superuser/design";
$route["superuser/settings"] = "superuser/settings";
$route["superuser/referral"] = "superuser/referral";
$route["generate/(:any)"] = "p2p/generate_users/$1";
$route["login"] = "p2p/login";
$route["register"] = "p2p/register";
$route["logout"] = "p2p/logout";

$route["request/(:any)"] = "p2p/request/$1";
$route["(:any)/ticket/(:any)"] = "p2p/read_ticket/$1/$2";
$route["(:any)/referral"] = "p2p/referral/$1";
$route["(:any)/account"] =  "p2p/settings/$1";
$route["transaction/(:any)/(:num)"] = "p2p/transaction/$1/$2";
$route["(:any)/upgrade"] = "p2p/upgrade/$1";
$route["(:any)/support"] = "p2p/support/$1";

$route["(:any)"] = "p2p/account/$1";
