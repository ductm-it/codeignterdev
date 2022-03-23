<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'traversy/pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login']='user/usercontroller/login_view';
$route['authen'] = 'user/usercontroller/loginAuth';
$route['register']='user/usercontroller/register_view';
$route['home'] = 'user/usercontroller/successpage';
$route['logout'] = 'user/usercontroller/logout';
$route['email'] = 'MailerController/index';
$route['user/verify/(:num)'] = 'user/usercontroller/user_verify/$1';
$route['file/(:any)'] = 'filecontroller/download/$1';
$route['file/download/(:any)'] = "filecontroller/send_mail_link_download/$1";


//admin
$route['admin/home']='admin/homecontroller/index';
$route['admin/list']='admin/homecontroller/list';
$route['admin/log']='admin/homecontroller/log';


//traversy
$route['posts/(:any)'] = 'traversy/posts/view/$1';
$route['posts'] = 'traversy/posts/index';
$route['(:any)'] = 'traversy/pages/view/$1';


// $routes->group('admin', function ($routes) {
//     $routes->get('home', 'Admin\HomeController::index');
//     $routes->group('user', function ($routes) {
//         $routes->get('list', 'Admin\UserController::list');
//         $routes->get('add', 'Admin\UserController::add');
//         $routes->post('create', 'Admin\UserController::create');
//         $routes->get('edit/(:num)', 'Admin\UserController::edit/$1');

//     });
// });



