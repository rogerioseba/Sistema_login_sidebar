<?php
$routes = new \CoffeeCode\Router\Router(URL_BASE);

$routes->namespace("Controllers");

//ROTAS HOME
$routes->group(null);
$routes->get('/', 'HomeController:index');
$routes->get('/home','HomeController:index');
$routes->get('/recover-pass','ViewController:recoverPass');
$routes->get('/newpass','ViewController:newPass');
$routes->post('/newpass','ViewController:newPass');
$routes->post('/recover-pass','ViewController:recoverPass');
$routes->get('/profile','HomeController:index');
$routes->get('/contato','HomeController:contato');
$routes->post('/edit_tag','TagController:editTag');
$routes->post('/addtag','TagController:addTag');
$routes->post('/update_tag','TagController:atualizaTag');
$routes->post('/delete_tag','TagController:apagarTag');
$routes->get('/tags','TagController:listTags');
$routes->get('/cadastrar_tag','TagController:formTag');
$routes->get('/viewtag/{tag}','ViewController:viewTag');
$routes->get('/login','LoginController:logIn');
$routes->get('/logout','LoginController:logout');
$routes->post('/entrar','LoginController:loginUser');
$routes->get('/register','LoginController:registerUser');
$routes->post('/create_account','UserController:createUser');
$routes->post('/update_user','UserController:updateUser');
$routes->post('/update_password','UserController:passwordUser');
$routes->post('/delete_user','UserController:apagarUser');

$routes->dispatch();