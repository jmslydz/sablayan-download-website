<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'landing';
$route['download']['get'] = 'landing/download';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
