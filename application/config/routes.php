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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Front';
$route['index.html'] = 'Front';

// Admin modules
$route['admin'] = 'Login';
$route['admin/dashboard'] = 'Dashboard';

// Settings
$route['admin/settings/general_settings'] = 'Settings';
$route['admin/settings/general_settings/([a-z]+)'] = 'Settings';
$route['admin/settings/seo_settings'] = 'Settings/seo_settings';
$route['admin/settings/seo_settings/([a-z]+)'] = 'Settings/seo_settings';
$route['admin/settings/module_settings'] = 'Settings/module_settings';
$route['admin/settings/module_settings/([a-z]+)'] = 'Settings/module_settings';
$route['admin/settings/script_settings'] = 'Settings/script_settings';
$route['admin/settings/script_settings/([a-z]+)'] = 'Settings/script_settings';
$route['admin/settings/social_settings'] = 'Settings/social_settings';
$route['admin/settings/social_add'] = 'Settings/social_settings_add';
$route['admin/settings/social_settings/([a-z]+)'] = 'Settings/social_settings';
$route['admin/settings/social_edit/(:num)'] = 'Settings/social_settings_edit';
$route['admin/settings/social_edit'] = 'Settings/social_settings_edit';
$route['admin/settings/social_delete/(:num)'] = 'Settings/social_settings_delete';
$route['admin/settings/theme_settings'] = 'Settings/theme_settings';
$route['admin/settings/theme_settings/([a-z]+)'] = 'Settings/theme_settings';

// Sliders
$route['admin/sliders/list'] = 'Sliders';
$route['admin/sliders/list/([a-z]+)'] = 'Sliders';
$route['admin/sliders/add'] = 'Sliders/add';
$route['admin/sliders/edit/(:num)'] = 'Sliders/edit';
$route['admin/sliders/edit'] = 'Sliders/edit';
$route['admin/sliders/delete/(:num)'] = 'Sliders/delete';
$route['admin/sliders/settings'] = 'Sliders/settings';
$route['admin/sliders/settings/([a-z]+)'] = 'Sliders/settings';

// profile
$route['admin/profile/about'] = 'Profile';
$route['admin/profile/about/([a-z]+)'] = 'Profile';
$route['admin/profile/contact'] = 'Profile/contact';
$route['admin/profile/contact/([a-z]+)'] = 'Profile/contact';
$route['admin/profile/facts'] = 'Profile/facts';
$route['admin/profile/facts/add'] = 'Profile/facts_add';


$route['admin/profile/facts/edit'] = 'Profile/facts_edit';
$route['admin/profile/facts/edit/(:num)'] = 'Profile/facts_edit';
$route['admin/profile/facts/([a-z]+)'] = 'Profile/facts';


$route['admin/profile/facts/delete/(:num)'] = 'Profile/facts_delete';
$route['admin/profile/cv'] = 'Profile/cv';
$route['admin/profile/cv/([a-z]+)'] = 'Profile/cv';

$route['admin/profile/edit_user'] = 'Profile/edit_user';
$route['admin/profile/edit_user/([a-z]+)'] = 'Profile/edit_user';

$route['admin/profile/change_password'] = 'Profile/change_password';
$route['admin/profile/change_password/([a-z]+)'] = 'Profile/change_password';

$route['admin/profile/logout'] = 'Profile/logout';


// Experience
$route['admin/experience/list'] = 'Experience';
$route['admin/experience/list/([a-z]+)'] = 'Experience';
$route['admin/experience/add'] = 'Experience/add';
$route['admin/experience/edit/(:num)'] = 'Experience/edit';
$route['admin/experience/edit'] = 'Experience/edit';
$route['admin/experience/delete/(:num)'] = 'Experience/delete';

// Education
$route['admin/education/list'] = 'Education';
$route['admin/education/list/([a-z]+)'] = 'Education';
$route['admin/education/add'] = 'Education/add';
$route['admin/education/edit/(:num)'] = 'Education/edit';
$route['admin/education/edit'] = 'Education/edit';
$route['admin/education/delete/(:num)'] = 'Education/delete';

// Skills
$route['admin/skills/list'] = 'Skills';
$route['admin/skills/list/([a-z]+)'] = 'Skills';
$route['admin/skills/add'] = 'Skills/add';
$route['admin/skills/edit/(:num)'] = 'Skills/edit';
$route['admin/skills/edit'] = 'Skills/edit';
$route['admin/skills/delete/(:num)'] = 'Skills/delete';

// Services
$route['admin/services/list'] = 'Services';
$route['admin/services/list/([a-z]+)'] = 'Services';
$route['admin/services/add'] = 'Services/add';
$route['admin/services/edit/(:num)'] = 'Services/edit';
$route['admin/services/edit'] = 'Services/edit';
$route['admin/services/delete/(:num)'] = 'Services/delete';
$route['admin/services/settings'] = 'Services/settings';
$route['admin/services/settings/([a-z]+)'] = 'Services/settings';


// Portfolio
$route['admin/portfolio/category'] = 'Portfolio/category';
$route['admin/portfolio/category/add'] = 'Portfolio/category_add';
$route['admin/portfolio/category/edit/(:num)'] = 'Portfolio/category_edit';
$route['admin/portfolio/category/edit'] = 'Portfolio/category_edit';
$route['admin/portfolio/category/delete/(:num)'] = 'Portfolio/category_delete';
$route['admin/portfolio/category/([a-z]+)'] = 'Portfolio/category';

$route['admin/portfolio/list'] = 'Portfolio';
$route['admin/portfolio/add'] = 'Portfolio/add';
$route['admin/portfolio/edit/(:num)'] = 'Portfolio/edit';
$route['admin/portfolio/edit'] = 'Portfolio/edit';
$route['admin/portfolio/delete/(:num)'] = 'Portfolio/delete';
$route['admin/portfolio/list/([a-z]+)'] = 'Portfolio';
$route['admin/portfolio/settings'] = 'Portfolio/settings';
$route['admin/portfolio/settings/([a-z]+)'] = 'Portfolio/settings';


// Blogs
$route['admin/blogs/category'] = 'Blogs/category';
$route['admin/blogs/category/add'] = 'Blogs/category_add';
$route['admin/blogs/category/edit/(:num)'] = 'Blogs/category_edit';
$route['admin/blogs/category/edit'] = 'Blogs/category_edit';
$route['admin/blogs/category/delete/(:num)'] = 'Blogs/category_delete';
$route['admin/blogs/category/([a-z]+)'] = 'Blogs/category';

$route['admin/blogs/list'] = 'Blogs';
$route['admin/blogs/add'] = 'Blogs/add';
$route['admin/blogs/edit/(:num)'] = 'Blogs/edit';
$route['admin/blogs/edit'] = 'Blogs/edit';
$route['admin/blogs/delete/(:num)'] = 'Blogs/delete';
$route['admin/blogs/list/([a-z]+)'] = 'Blogs';
$route['admin/blogs/settings'] = 'Blogs/settings';
$route['admin/blogs/settings/([a-z]+)'] = 'Blogs/settings';
$route['admin/blogs/comments/view/(:num)'] = 'Blogs/comments_list';
$route['admin/blogs/comments/view/(:num)/([a-z]+)'] = 'Blogs/comments_list';
$route['admin/blogs/comments/delete/(:num)'] = 'Blogs/comments_delete';
$route['admin/blogs/comments/active/(:num)'] = 'Blogs/comments_active';

// team
$route['admin/team/list'] = 'Team';
$route['admin/team/list/([a-z]+)'] = 'Team';
$route['admin/team/add'] = 'Team/add';
$route['admin/team/edit/(:num)'] = 'Team/edit';
$route['admin/team/edit'] = 'Team/edit';
$route['admin/team/delete/(:num)'] = 'Team/delete';
$route['admin/team/settings'] = 'Team/settings';
$route['admin/team/settings/([a-z]+)'] = 'Team/settings';

// testimonials
$route['admin/testimonials/list'] = 'Testimonials';
$route['admin/testimonials/list/([a-z]+)'] = 'Testimonials';
$route['admin/testimonials/add'] = 'Testimonials/add';
$route['admin/testimonials/edit/(:num)'] = 'Testimonials/edit';
$route['admin/testimonials/edit'] = 'Testimonials/edit';
$route['admin/testimonials/delete/(:num)'] = 'Testimonials/delete';
$route['admin/testimonials/settings'] = 'Testimonials/settings';
$route['admin/testimonials/settings/([a-z]+)'] = 'Testimonials/settings';


// Pricing
$route['admin/pricing/category'] = 'Pricing/category';
$route['admin/pricing/category/add'] = 'Pricing/category_add';
$route['admin/pricing/category/edit/(:num)'] = 'Pricing/category_edit';
$route['admin/pricing/category/edit'] = 'Pricing/category_edit';
$route['admin/pricing/category/delete/(:num)'] = 'Pricing/category_delete';
$route['admin/pricing/category/([a-z]+)'] = 'Pricing/category';

$route['admin/pricing/list'] = 'pricing';
$route['admin/pricing/add'] = 'pricing/add';
$route['admin/pricing/edit/(:num)'] = 'pricing/edit';
$route['admin/pricing/edit'] = 'pricing/edit';
$route['admin/pricing/delete/(:num)'] = 'pricing/delete';
$route['admin/pricing/list/([a-z]+)'] = 'pricing';
$route['admin/pricing/settings'] = 'pricing/settings';
$route['admin/pricing/settings/([a-z]+)'] = 'pricing/settings';


// Contact Messages
$route['admin/messages/list'] = 'Messages';
$route['admin/messages/list/([a-z]+)'] = 'Messages';
$route['admin/messages/view/(:num)'] = 'Messages/view';
$route['admin/messages/delete/(:num)'] = 'Messages/delete';


// blog inner pages

$route['blogs-list'] = 'Front/blog_list';
$route['blogs-list/category/(:num)'] = 'Front/blog_list';
$route['blogs-list/(:num)'] = 'Front/blog_detail';

// Common 
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
