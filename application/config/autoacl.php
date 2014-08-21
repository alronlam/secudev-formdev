<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Maximum number of segments that Ar-acl should check
$config['segment_max']	= 3;

// variable session role id
$config['sess_role_var'] = "faciRoles";

// admin role id
$config['admin_role_var'] = 0;

// default role: this role will applied if there is no role found
$config['default_role'] = -1;

// default uri: default uri to redirect to
$config['default_redirect_uri'] = "/account/login";

// Pages that need to be controlled
$config['page_control'] = array(
    'account/settings' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'], 1,2,3,4,5,6,7),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'faci/' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'], 1,2,3,4,5,6,7),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'faci/classes' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array(1),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'outreach/add' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array(3),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'outreach/edit' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array(3),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'outreach/delete' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array(3),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'admin/' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'biblestudy/' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'announcement/edit' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'announcement/add' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'announcement/delete' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'event/edit' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'event/add' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'event/delete' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var']),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'media/upload' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'], 1,2,3,4,5,6,7),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'tasks/' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'], 1,2,3,4,5,6,7),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'tasks/assign' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'], 1,2,3,4,5,6),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'tasks/' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'], 1,2,3,4,5,6,7),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	'tasks/' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'], 1,2,3,4,5,6,7),                    // the allowed user role_id array 
        'error_uri'  => $config['default_redirect_uri'],  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),
	
);

// Page that need The Very Private Page (VPP) access control
$config['vpp_control'] = array(
    /*'test/salary/personal/' => array(                       // the "module/controller/method/" to protect
        'allowed'    => array($config['admin_role_var'],1,2,3,4,5,6,7),                    // the allowed user role_id array (e.g. user role is 0, Admin role is 1)
        'vpp_sess_name'        => 'user_id',          // variable session key for Very Private Page (VPP)
        'vpp_key'        => 4,          // number of segment in the uri that contain the information about vpp_sess_name (e.g. user_id)
        'error_uri'  => '/staticpage/error_auth',  // the url to redirect to on failure
        'error_msg'  => "acl_view_denied",
    ),*/
);

/* End of file autoacl.php */
/* Location: ./system/application/config/autoacl.php */
