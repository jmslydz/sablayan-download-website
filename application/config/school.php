<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Paste the school's verified HTTPS Google Play or APK download URL here.
// Leave blank until it is available; the FAQ explains that it is not yet available.
// You may also set the SCHOOL_APP_DOWNLOAD_URL environment variable.
$config['app_download_url'] = getenv('SCHOOL_APP_DOWNLOAD_URL') ?: '';
