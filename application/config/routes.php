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

$route['default_controller'] = "home";
$route['404_override'] = '';

//Routes for main menu
$route['about'] = 'about';
$route['statistics'] = 'statistics';
$route['matches'] = 'matches';

/*About page*/
$route['about/(:any)'] = 'about/about_articles_view/$1';

/*routes for pagination*/
$route['archive/(:any)'] = 'home/index/$1';
$route['article/(:any)'] = 'home/showArticle/$1';

/*routes for images page*/
$route['gallery'] = 'gallery';
$route['gallery/(:num)'] = 'gallery/index/$1';

/*routes for login page*/
$route['login'] = 'users/login';
$route['register'] = 'users/register_view';
$route['signup'] = 'users/register';
$route['contact'] = 'contact';

/*routes for admin page*/
$route['admin'] = 'admin';

/* End of file routes.php */
/* Location: ./application/config/routes.php */