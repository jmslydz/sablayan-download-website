<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->config->load('school', TRUE);
    }

    public function index()
    {
        $this->output->set_content_type('text/html', 'utf-8');
        $this->load->view('landing/index', array(
            'download_ready' => $this->download_url() !== '',
        ));
    }

    public function download()
    {
        $url = $this->download_url();
        if ($url === '') {
            // Keep old download links useful without rendering a duplicate page.
            $this->output->set_status_header(302);
            $this->output->set_header('Location: ' . base_url() . '#help');
            return;
        }
        redirect($url, 'location', 302);
    }

    private function download_url()
    {
        // Read trusted configuration only; never redirect to a visitor's query input.
        $url = trim((string) $this->config->item('app_download_url', 'school'));
        if ($url === '' || filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return '';
        }
        $parts = parse_url($url);
        if (!is_array($parts) || strtolower(isset($parts['scheme']) ? $parts['scheme'] : '') !== 'https'
            || empty($parts['host']) || isset($parts['user']) || isset($parts['pass'])) {
            return '';
        }
        return $url;
    }
}
