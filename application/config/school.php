<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Paste the school's verified HTTPS Google Play or APK download URL here.
// Leave blank until it is available; the page then shows a helpful notice.
// You may also set the SCHOOL_APP_DOWNLOAD_URL environment variable.
$config['app_download_url'] = getenv('SCHOOL_APP_DOWNLOAD_URL') ?: '';
