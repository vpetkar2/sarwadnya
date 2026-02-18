<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//----------Live 24.12.20-----------

$route['default_controller'] = "home";
$route['404_override'] = 'fournotfour';

$route['set_city'] = "home/set_city";
$route['home/success'] = "home/success";
$route['admin'] = "admin/login";
$route['admin/dashboard'] = "admin/dashboard";
$route['admin/dashboard/:any'] = "admin/dashboard";
$route['admin/(:any)/(:any)'] = "admin/$1/$2";
$route['admin/(:any)'] = "admin/$1";

$route['home/submitContact'] = "home/submitContact";
$route['home/submitEnquire'] = "home/submitEnquire";
$route['about-us'] = "home/about_us";
$route['carrier/submitPost'] = "carrier/submitPost";
$route['career'] = "carrier/index";
$route['carrier/detail/:any'] = "carrier/detail";
$route['success-career'] = "carrier/success_career";
$route['success-contact'] = "home/success_contact";
$route['team'] = "home/team";

$route['gallery'] = "home/gallery";
$route['(gallery/detail/:any)'] = "home/galleryDetail";

/*$route['terms-and-condition'] = "home/page";
$route['legal-notice'] = "home/page";
$route['privacy-policy'] = "home/page";
*/

$route['testimonials'] = "home/testimonials";
$route['contact-us'] = "home/contact_us";
$route['blog'] = "blog";
$route['(blog/detail/:any)'] = "blog/detail";
$route['(blog/:any)'] = "blog/category";

$route['products'] = "products";

$route['(products/detail/:any)'] = "products/detail";
$route['products'] = "products";
$route['(products/:any)'] = "products";
$route['(product/:any)'] = "products/productcat/$1";
$route['(product/:any/:any)'] = "products/productcat/$1";

$route['projects'] = "projects";
$route['(projects/:any)'] = "projects/details";

$route['(:any)/(:any)/(:any)'] = "products/productcat/$1/$2/$3";
$route['(:any)/(:any)'] = "products/show_slug/$1/$2";
$route['(:any)'] = "products/show_slug2/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */