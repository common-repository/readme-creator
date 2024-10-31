<?php
/*
	# Plugin Name: ReadMe Creator
	# Version: 1.0
	# Description: 
	# Author: Scientech It Solution
	# Author URI: http://www.webriti.com
	# Plugin URI: 

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program. If not, see <http://www.gnu.org/licenses/>.
*/



/**
 *	Create required tables in database when plugin actgivated.
 **************************************************************/
register_activation_hook( __FILE__, 'create_tables' );
function create_tables()
{
	global $wpdb;
	$table_name = $wpdb->prefix ."readme_creator"; 
	$rm_creator="CREATE TABLE $table_name (
			`rm_id` BIGINT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
			`rm_plgname` VARCHAR( 100 ) NOT NULL ,
			`rm_cntbtr` VARCHAR( 200 ) NOT NULL ,
			`rm_tags` VARCHAR( 500 ) NOT NULL ,
			`rm_reqatleast` VARCHAR( 100 ) NOT NULL ,
			`rm_testupto` VARCHAR( 100 ) NOT NULL ,
			`rm_stbtag` VARCHAR( 100 ) NOT NULL ,
			`rm_stdesc` VARCHAR( 200 ) NOT NULL ,
			`rm_lngdesc` VARCHAR( 1000 ) NOT NULL ,
			`rm_dntlink` VARCHAR( 200 ) NOT NULL ,
			`rm_intist` VARCHAR( 1000 ) NOT NULL ,
			`rm_faq` VARCHAR( 3000 ) NOT NULL ,
			`rm_chnglg` VARCHAR( 3000 ) NOT NULL ,
			`rm_chnglgpnt` VARCHAR( 10000 ) NOT NULL,
			`rm_fsd` VARCHAR( 1000 ) NOT NULL ,
			`rm_ssd` VARCHAR( 10000 ) NOT NULL ,
			`rm_video` VARCHAR( 1000 ) NOT NULL ,
			`rm_arbsect` VARCHAR( 1000 ) NOT NULL,
			`rm_create_date` DATE NOT NULL,
			`rm_update_date` DATE NOT NULL
			);
			";
	$wpdb->query($rm_creator);
	
}

/**
 *	Admin Menu Pages For ReadMe Creator Plugin
 ************************************************/

add_action('admin_menu','readmefile_menu');

function readmefile_menu()
{

 	add_menu_page('ReadMe Creator', 'ReadMe Creator', 'administrator', 'readme');
	// Create Page
	add_submenu_page( 'readme', 'Create', 'Create', 'administrator', 'readme', 'readme_create_file_page' );
	
	// History Page
	add_submenu_page( 'readme', 'History', 'History', 'administrator', 'history', 'readme_file_history_page' );
	
	// ReadMe Help Page
	add_submenu_page( 'readme', 'ReadMe Help', 'ReadMe Help', 'administrator', 'help', 'readme_file_help_page' );
	
}

/**
 *	Admin Menu Pages For ReadMe Creator
 ****************************************/

function readme_create_file_page() 
{
	wp_enqueue_style('redmestyle',plugins_url('css/style.css',__FILE__));
	
	wp_enqueue_style('tooltip', plugins_url('tooltip/tooltip.css',__FILE__));
	wp_enqueue_script('vtip', plugins_url('tooltip/vtip.js',__FILE__));
	wp_enqueue_script('abc', plugins_url('js/jquery-1.3.2.min.js', __File__));
	
	include('js/jquery-latest.php');
	//include('js/validation.php');
	include('create.php');
}

/**
 *	Admin Menu Pages For History
 **********************************/

function readme_file_history_page() 
{ 
	include('history.php');
}


/**
 *	Admin Menu Pages For History
 **********************************/

function readme_file_help_page() 
{ 
	include('readme-help.php');
}


?>