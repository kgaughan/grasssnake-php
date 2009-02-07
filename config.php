<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'grasssnake');

define('APP_VERSION', '0.2.0');

function routes() {
	$r = new AFK_Routes(array('pid' => '\d+', 'iid' => '\d+'));

	$r->route('/', array('_handler' => 'Root', '_view' => 'console'));
	$r->route('/about', array('_handler' => 'Root', '_view' => 'about'));

	$r->route('/projects/', array('_handler' => 'Project'));
	$r->route('/projects/{pid}', array('_handler' => 'Project'));
	$r->route('/issues/', array('_handler' => 'Issue'));
	$r->route('/issues/{iid}', array('_handler' => 'Issue'));

	$r->route('/watches/',
		array('_handler' => 'Watch', '_view' => 'new'));
	$r->route('/watches/{iid}',
		array('_handler' => 'Watch', '_view' => 'watch'));

	return $r;
}

function init() {
	global $db;

	error_reporting(E_ALL);
	date_default_timezone_set('UTC');
	AFK::load_helper('core', 'html', 'slots', 'events', 'forms');

	if (defined('DB_NAME') && DB_NAME != '') {
		$db = new DB_MySQL(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	AFK_Users::set_implementation(new Users());

	AFK_Plugin::load(APP_ROOT . '/plugins', array('mailer'));

	return array();
}
