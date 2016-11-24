<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 */

class Cli extends Oa_controller {

  public function __construct () {
    parent::__construct ();
    
    if (!$this->input->is_cli_request ()) {
      echo 'Request 錯誤！';
      exit ();
    }
  }
  public function clean_query () {
    $this->load->helper ('file');
    write_file (FCPATH . 'application/logs/query.log', '', FOPEN_READ_WRITE_CREATE_DESTRUCTIVE);
  }
  public function reset () {
    $this->load->library ('migration');

    $this->migration->version (0);
    $this->migration->version (20);

    $this->load->helper ('directory');
    directory_clean (FCPATH . 'upload/');
    recurse_copy (FCPATH . '_upload/', FCPATH . 'upload/');
  }
}