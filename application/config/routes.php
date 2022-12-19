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

/** *Font-End User Route List* **/
// Font-end Template
$route['default_controller'] = 'home';
$route['home'] = '/home/index';
$route['aboutus'] = '/aboutus/index';
$route['course'] = '/course/index';
$route['course'] = '/course/index/$1';
$route['course/page/(:any)'] = '/course/page/$1';
$route['course/detail/(:any)'] = '/course/detail/$1';
$route['course/find'] = '/course/find';
$route['course/search/ref/(:any)'] = '/course/search/ref/$1';
$route['course/search/cat/(:any)'] = '/course/search/cat/$1';
$route['qanda'] = '/qanda/index';
$route['news'] = '/news/index';
$route['news/page/(:num)'] = '/news/page/$1';
$route['news/detail/(:any)'] = '/news/detail/$1';
$route['contactus'] = '/contactus/index';
$route['auth/login'] = 'auth/login';
$route['auth/logout'] = 'auth/logout';
$route['auth/regist'] = 'auth/regist';
$route['auth/regist/confirm'] = 'auth/regist_confirm';
$route['auth/regist/store'] = 'auth/store_register';
$route['auth/regist/complete'] = 'auth/regist_complete';

/*** Student Protal Route List ***/
$route['student/dashboard'] = 'student/index';
$route['student/page/(:any)'] = '/student/page/$1';
$route['student/course/(:num)/(:any)/(:any)'] = '/student/cos_detail/$1/$2/$3';
$route['student/course/request/(:num)/(:any)/(:any)'] = '/student/cos_request/$1/$2/$3';
$route['student/lessons/(:num)/(:any)'] = '/student/lessons/$1/$2';
$route['student/lessons/note'] = '/student/addnote';
$route['student/purchase/history'] = '/student/history';
$route['student/purchase/history/(:num)'] = '/student/history/$1';
$route['student/task/checkpoint/(:any)/(:any)'] = '/student/task/$1/$2';


$route['student/profile'] = '/student/profile';
$route['student/edit'] = '/student/edit';
$route['student/enroll'] = 'enroll/regist';
$route['student/enroll/course'] = 'enroll/course';
$route['student/enroll/payment'] = 'enroll/payment';
$route['student/enroll/enroll_check'] = 'enroll/enroll_check';
$route['student/enroll/complete'] = 'enroll/complete';
$route['student/enroll/cancel'] = 'enroll/course_cancel';
$route['enroll/fetch_payment'] = 'enroll/fetch_payment';

$route['api/user/(:any)'] = '/dashboard/api/index_get/$1';


/*** Admin Panel Route List ***/
/**** Admin Dashboard ****/
$route['root/portal/url/generate/ipaccess'] = '/dashboard/secrect/loader';
$route['root/portal/url/generate/ipaccess/new'] = '/dashboard/secrect/add';

$route['adm/portal/d-panel'] = '/dashboard/dashboard/index';
$route['dashboard/fetch_data'] = '/dashboard/dashboard/fetch_data';

$route['initial'] = '/dashboard/welcome/welcome';
$route['initial/confirm'] = '/dashboard/welcome/welcome_confirm';
$route['initial/complete'] = '/dashboard/welcome/welcome_complete';
$route['config/reset'] = '/dashboard/welcome/reset_all_setting';

$route['adm/portal/auth/login'] = '/dashboard/auth/index/';
$route['adm/portal/auth/login/(:any)/(:any)'] = '/dashboard/auth/login/$1/$2';
$route['adm/portal/auth/logout'] = '/dashboard/auth/logout';
$route['adm/portal/auth/profile'] = '/dashboard/admin/profile';
$route['adm/portal/auth/password'] = '/dashboard/admin/password';
$route['adm/portal/auth/useredit'] = '/dashboard/admin/edit_user';

$route['delete/record/(:any)/(:any)'] = '/dashboard/admin/delete_record/$1/$2';
$route['force/logout/(:any)'] = '/dashboard/admin/delete_all_record/$1';
	
$route['adm/portal/auth/lists'] = '/dashboard/admin/lists';
$route['adm/portal/auth/add'] = '/dashboard/admin/add';
$route['adm/portal/auth/views/(:any)'] = '/dashboard/admin/views/$1';
$route['adm/portal/auth/edit/(:any)'] = '/dashboard/admin/edit/$1';
$route['adm/portal/auth/withdraw/(:any)'] = '/dashboard/admin/withdraw/$1';

$route['adm/portal/auth/role'] = '/dashboard/admin/role';
$route['adm/portal/auth/role_add'] = '/dashboard/admin/role_add';
$route['adm/portal/auth/role_edit/(:any)'] = '/dashboard/admin/role_edit/$1';
$route['adm/portal/auth/role_delete/(:any)'] = '/dashboard/admin/role_delete/$1';

$route['adm/portal/category'] = '/dashboard/category/index';
$route['adm/portal/category/add'] = '/dashboard/category/add';
$route['adm/portal/category/view/(:any)'] = '/dashboard/category/view/$1';
$route['adm/portal/category/edit/(:any)'] = '/dashboard/category/edit/$1';
$route['adm/portal/category/delete/(:any)'] = '/dashboard/category/delete/$1';

$route['adm/portal/subcategory'] = '/dashboard/subcategory/index';
$route['adm/portal/subcategory/add'] = '/dashboard/subcategory/add';
$route['adm/portal/subcategory/view/(:any)'] = '/dashboard/subcategory/view/$1';
$route['adm/portal/subcategory/edit/(:any)'] = '/dashboard/subcategory/edit/$1';
$route['adm/portal/subcategory/delete/(:any)'] = '/dashboard/subcategory/delete/$1';

$route['adm/portal/level'] = '/dashboard/level/index';
$route['adm/portal/level/add'] = '/dashboard/level/add';
$route['adm/portal/level/view/(:any)'] = '/dashboard/level/view/$1';
$route['adm/portal/level/edit/(:any)'] = '/dashboard/level/edit/$1';
$route['adm/portal/level/delete/(:any)'] = '/dashboard/level/delete/$1';

$route['adm/portal/instructor'] = '/dashboard/instructor/index';
$route['adm/portal/instructor/add'] = '/dashboard/instructor/add';
$route['adm/portal/instructor/view/(:any)'] = '/dashboard/instructor/view/$1';
$route['adm/portal/instructor/edit/(:any)'] = '/dashboard/instructor/edit/$1';
$route['adm/portal/instructor/delete/(:any)'] = '/dashboard/instructor/delete/$1';

$route['adm/portal/course'] = '/dashboard/course/index';
$route['adm/portal/course/add'] = '/dashboard/course/add';
$route['adm/portal/course/view/(:any)'] = '/dashboard/course/view/$1';
$route['adm/portal/course/edit/(:any)'] = '/dashboard/course/edit/$1';
$route['adm/portal/course/delete/(:any)'] = '/dashboard/course/delete/$1';

$route['adm/portal/batch'] = '/dashboard/batch/index';
$route['adm/portal/batch/add'] = '/dashboard/batch/add';
$route['adm/batch/fetch_course'] = '/dashboard/batch/fetch_course';
$route['adm/portal/batch/view/(:any)'] = '/dashboard/batch/view/$1';
$route['adm/portal/batch/edit/(:any)'] = '/dashboard/batch/edit/$1';
$route['adm/portal/batch/delete/(:any)'] = '/dashboard/batch/delete/$1';

$route['adm/portal/lessons'] = '/dashboard/lessons/index';
$route['adm/portal/lessons/add'] = '/dashboard/lessons/add';
$route['adm/portal/lessons/view/(:any)'] = '/dashboard/lessons/view/$1';
$route['adm/portal/lessons/edit/(:any)'] = '/dashboard/lessons/edit/$1';
$route['adm/portal/lessons/delete/(:any)'] = '/dashboard/lessons/delete/$1';
//$1 => current_id, $2 => lesson id
$route['adm/portal/lessons/add_movies/(:any)'] = '/dashboard/lessons/add_movies/$1';
$route['adm/portal/lessons/edit_movies/(:any)/(:any)'] = '/dashboard/lessons/edit_movies/$1/$2';
$route['adm/portal/lessons/view_movies/(:any)/(:any)'] = '/dashboard/lessons/view_movies/$1/$2';
$route['adm/portal/lessons/delete_movies/(:any)/(:any)'] = '/dashboard/lessons/delete_movies/$1/$2';

$route['adm/portal/lessons/part/(:any)'] = '/dashboard/lessons/part/$1';
$route['adm/portal/lessons/add_part/(:any)'] = '/dashboard/lessons/add_part/$1';
$route['adm/portal/lessons/edit_part/(:any)/(:any)'] = '/dashboard/lessons/edit_part/$1/$2';
$route['adm/portal/lessons/delete_part/(:any)/(:any)'] = '/dashboard/lessons/delete_part/$1/$2';

$route['adm/portal/qanda'] = '/dashboard/qanda/index';
$route['adm/portal/qanda/add'] = '/dashboard/qanda/add';
$route['adm/portal/qanda/view/(:any)'] = '/dashboard/qanda/view/$1';
$route['adm/portal/qanda/edit/(:any)'] = '/dashboard/qanda/edit/$1';
$route['adm/portal/qanda/delete/(:any)'] = '/dashboard/qanda/delete/$1';

$route['adm/portal/news'] = '/dashboard/news/index';
$route['adm/portal/news/add'] = '/dashboard/news/add';
$route['adm/portal/news/view/(:any)'] = '/dashboard/news/view/$1';
$route['adm/portal/news/edit/(:any)'] = '/dashboard/news/edit/$1';
$route['adm/portal/news/delete/(:any)'] = '/dashboard/news/delete/$1';

$route['adm/portal/tags'] = '/dashboard/tags/index';
$route['adm/portal/tags/add'] = '/dashboard/tags/add';
$route['adm/portal/tags/edit/(:any)'] = '/dashboard/tags/edit/$1';
$route['adm/portal/tags/delete/(:any)'] = '/dashboard/tags/delete/$1';

$route['adm/portal/feedback'] = '/dashboard/feedback/index';
$route['adm/portal/feedback/add'] = '/dashboard/feedback/add';
$route['adm/portal/feedback/view/(:any)'] = '/dashboard/feedback/view/$1';
$route['adm/portal/feedback/update/(:any)'] = '/dashboard/feedback/update/$1';
$route['adm/portal/feedback/delete/(:any)'] = '/dashboard/feedback/delete/$1';

$route['adm/portal/email'] = '/dashboard/email/index';
$route['adm/portal/email/add'] = '/dashboard/email/add';
$route['adm/portal/email/view/(:any)'] = '/dashboard/email/view/$1';
$route['adm/portal/email/edit/(:any)'] = '/dashboard/email/edit/$1';
$route['adm/portal/email/delete/(:any)'] = '/dashboard/email/delete/$1';

$route['adm/portal/student'] = '/dashboard/student/index';
$route['adm/portal/student/add'] = '/dashboard/student/add';
$route['adm/portal/student/activated/(:any)'] = '/dashboard/student/activated/$1';
$route['adm/portal/student/deactivated/(:any)'] = '/dashboard/student/deactivated/$1';
$route['adm/portal/student/permission/activated/(:any)'] = '/dashboard/student/permission_activated/$1';
$route['adm/portal/student/permission/deactivated/(:any)'] = '/dashboard/student/permission_deactivated/$1';

$route['adm/portal/student/view/(:any)'] = '/dashboard/student/view/$1';
$route['adm/portal/student/edit/(:any)'] = '/dashboard/student/edit/$1';
$route['adm/portal/student/delete/(:any)'] = '/dashboard/student/delete/$1';

$route['adm/portal/jls_applicant/jcli_admission/(:any)'] = '/dashboard/pdf/jcli_admiss/$1';
$route['adm/portal/jls_applicant/ecc_interview/(:any)'] = '/dashboard/pdf/eccinter/$1';
$route['adm/portal/jls_applicant/ecc_admission/(:any)'] = '/dashboard/pdf/ecc_admiss/$1';

$route['adm/portal/jls_applicant/fukuoka_interview/(:any)'] = '/dashboard/pdf/fukuokainter/$1';
//$route['adm/portal/jls_applicant/fukuoka_interview/(:any)']= '/dashboard/pdf/fukuoka_inter/$1';
$route['adm/portal/jls_applicant/fukuoka_admission/(:any)']= '/dashboard/pdf/fukuoka_admiss/$1';
$route['adm/portal/jls_applicant/shizuoka_interview/(:any)'] = '/dashboard/pdf/shizuka_inter/$1';
$route['adm/portal/jls_applicant/shizuoka_admission/(:any)']= '/dashboard/pdf/shizuoka_admiss/$1';

$route['adm/portal/jls_applicant/employee'] = '/dashboard/employee/index';
$route['adm/portal/jls_applicant/employee/createexcel'] = '/dashboard/employee/createExcel';

$route['adm/portal/jls_applicant'] = '/dashboard/langschoolapplicant/index';
$route['adm/portal/jls_applicant/add'] = '/dashboard/langschoolapplicant/add';
$route['adm/portal/jls_applicant/confirm'] = '/dashboard/langschoolapplicant/confirm';
$route['adm/portal/jls_applicant/store'] = '/dashboard/langschoolapplicant/store';
$route['adm/portal/jls_applicant/complete'] = '/dashboard/langschoolapplicant/complete';
$route['adm/portal/jls_applicant/new'] = '/dashboard/langschoolapplicant/new';
$route['adm/portal/jls_applicant/interview'] = '/dashboard/langschoolapplicant/interview';
$route['adm/portal/jls_applicant/activated/(:any)'] = '/dashboard/langschoolapplicant/activated/$1';
$route['adm/portal/jls_applicant/deactivated/(:any)'] = '/dashboard/langschoolapplicant/deactivated/$1';
$route['adm/portal/jls_applicant/permission/activated/(:any)'] = '/dashboard/langschoolapplicant/permission_activated/$1';
$route['adm/portal/jls_applicant/permission/deactivated/(:any)'] = '/dashboard/langschoolapplicant/permission_deactivated/$1';

$route['adm/portal/jls_applicant/view/(:any)'] = '/dashboard/langschoolapplicant/view/$1';
$route['adm/portal/jls_applicant/edit/(:any)'] = '/dashboard/langschoolapplicant/edit/$1';
$route['adm/portal/jls_applicant/delete/(:any)'] = '/dashboard/langschoolapplicant/delete/$1';

$route['adm/portal/student/invoice/view/(:any)'] = '/dashboard/student/invoice_view/$1';
$route['adm/portal/student/purchase/add/(:any)'] = '/dashboard/student/purchase_add/$1';
$route['adm/portal/student/purchase/delete/(:any)/(:any)'] = '/dashboard/student/purchase_delete/$1/$2';
$route['adm/portal/student/course/active/(:any)'] = '/dashboard/student/course_active/$1';
$route['adm/portal/student/course/deactive/(:any)'] = '/dashboard/student/course_deactive/$1';
$route['adm/portal/student/course/delete/(:any)/(:any)'] = '/dashboard/student/course_delete/$1/$2';

$route['adm/portal/payment'] = '/dashboard/payment/index';
$route['adm/portal/payment/add'] = '/dashboard/payment/add';
$route['adm/portal/payment/edit/(:any)'] = '/dashboard/payment/edit/$1';
$route['adm/portal/payment/delete/(:any)'] = '/dashboard/payment/delete/$1';

$route['adm/portal/image-upload'] = '/dashboard/ImageUpload';
$route['adm/portal/image-upload/post']['post'] = "/dashboard/ImageUpload/uploadImage";

//attendent student+trainer
//pdf, qrcode, csv
//exam, centificate, roll mark
//time limiter
//email process

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/*** Admin Panel Route List ***/