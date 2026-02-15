<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set database credentials
$host = "localhost";
$dbname = "parth_db";
$username = "parth_user";
$password = "(-NbQr8cXw6O";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Add SEO
$p_result = mysqli_query($conn, "SELECT * FROM pf_seo where seo_city='Mumbai'");
if (mysqli_num_rows($p_result) > 0) {
   while ($p_row = mysqli_fetch_assoc($p_result)) {

    	// Insert in products for new
    	echo $q = "insert into pf_seo set 
    		 seo_city = 'India',
    		 seo_title = '".mysqli_real_escape_string($conn, str_replace('India India', 'India', str_replace('Mumbai', 'India',  $p_row['seo_title'])))."',
    		 seo_key = '".mysqli_real_escape_string($conn, str_replace('India India', 'India', str_replace('Mumbai', 'India', $p_row['seo_key'])))."',
    		 seo_desc = '".mysqli_real_escape_string($conn, str_replace('India India', 'India', str_replace('Mumbai', 'India', $p_row['seo_desc'])))."',
    		 seo_image = '".mysqli_real_escape_string($conn, $p_row['seo_image'])."',
    		 seo_url = '".mysqli_real_escape_string($conn, $p_row['seo_url'])."'";
    	$data = mysqli_query($conn, $q);

   	}
}
echo "Done";
exit;
*/
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Set database credentials
$host = "localhost";
$dbname = "parth_db";
$username = "parth_user";
$password = "(-NbQr8cXw6O";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Select All Products
$p_result = mysqli_query($conn, "SELECT * FROM pf_product where prod_city_id=2");
if (mysqli_num_rows($p_result) > 0) {
   while ($p_row = mysqli_fetch_assoc($p_result)) {

    	// Insert in products for new
    	$q = "insert into pf_product set 
    		 prod_url = '".mysqli_real_escape_string($conn, $p_row['prod_url'])."',
    		 prod_title = '".mysqli_real_escape_string($conn, $p_row['prod_title'])."',
    		 prod_metakey = '".mysqli_real_escape_string($conn, $p_row['prod_metakey'])."',
    		 prod_metadesc = '".mysqli_real_escape_string($conn, $p_row['prod_metadesc'])."',
    		 prod_small_desc = '".mysqli_real_escape_string($conn, $p_row['prod_small_desc'])."',
    		 prod_desc = '".mysqli_real_escape_string($conn, $p_row['prod_desc'])."',
    		 prod_window_title = '".mysqli_real_escape_string($conn, $p_row['prod_window_title'])."',
    		 prod_image = '".mysqli_real_escape_string($conn, $p_row['prod_image'])."',
    		 prod_main_image = '".mysqli_real_escape_string($conn, $p_row['prod_main_image'])."',
    		 prod_cost = '".mysqli_real_escape_string($conn, $p_row['prod_cost'])."',
    		 prod_short_desc = '".mysqli_real_escape_string($conn, $p_row['prod_short_desc'])."',
    		 prod_cat_id = '".mysqli_real_escape_string($conn, $p_row['prod_cat_id'])."',
    		 prod_city_id = '3',
    		 prod_code = '".mysqli_real_escape_string($conn, $p_row['prod_code'])."'";
    	$data = mysqli_query($conn, $q);

    	$prod_id = $conn->insert_id;

      // Check for existing features
    $pf_result = mysqli_query($conn,"SELECT * FROM pf_product_feature where prod_id = ".$p_row['prod_id']);
		if (mysqli_num_rows($pf_result) > 0) {
		    while ($pf_row = mysqli_fetch_assoc($pf_result)) {

		    	// Insert in features for new
		    	$pfq = "insert into pf_product_feature 
		    		set prod_id = ".$prod_id.", 
		    		pf_name = '".mysqli_real_escape_string($conn, $pf_row['pf_name'])."', 
		    		pf_detail = '".mysqli_real_escape_string($conn, $pf_row['pf_detail'])."'";
		    	mysqli_query($conn, $pfq);
		    }
		}

      // Check for existing images
	  $img_result = mysqli_query($conn, "SELECT * FROM pf_product_image where prod_id = ".$p_row['prod_id']);
		if (mysqli_num_rows($img_result) > 0) {
		    while ($img_row = mysqli_fetch_assoc($img_result)) {
		    	 
		    	// Insert in images for new
		    	mysqli_query($conn, "insert into pf_product_image 
		    		set prod_id = '".$prod_id."', 
		    		prod_image = '".mysqli_real_escape_string($conn, $img_row['prod_image'])."'");
		    }
		}
   }
}
echo "Done";
exit;
*/
// echo "111111111111"; exit;
/*	error_reporting(E_ALL); 
	/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'production');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
	$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder then the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server.  If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 *
 */
	$application_folder = 'application';

/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here.  For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT:  If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller.  Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 *
 */
	// The directory name, relative to the "controllers" folder.  Leave blank
	// if your controller is not in a sub-folder within the "controllers" folder
	// $routing['directory'] = '';

	// The controller class file name.  Example:  Mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 *
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
	if (defined('STDIN'))
	{
		chdir(dirname(__FILE__));
	}

	if (realpath($system_path) !== FALSE)
	{
		$system_path = realpath($system_path).'/';
	}

	// ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';

	// Is the system path correct?
	if ( ! is_dir($system_path))
	{
		exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: ".pathinfo(__FILE__, PATHINFO_BASENAME));
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
	define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// The PHP file extension
	// this global constant is deprecated.
	define('EXT', '.php');

	// Path to the system folder
	define('BASEPATH', str_replace("\\", "/", $system_path));

	// Path to the front controller (this file)
	define('FCPATH', str_replace(SELF, '', __FILE__));

	// Name of the "system folder"
	define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


	// The path to the "application" folder
	if (is_dir($application_folder))
	{
		define('APPPATH', $application_folder.'/');
	}
	else
	{
		if ( ! is_dir(BASEPATH.$application_folder.'/'))
		{
			exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: ".SELF);
		}

		define('APPPATH', BASEPATH.$application_folder.'/');
	}

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 *
 */
require_once BASEPATH.'core/CodeIgniter.php';

/* End of file index.php */
/* Location: ./index.php */