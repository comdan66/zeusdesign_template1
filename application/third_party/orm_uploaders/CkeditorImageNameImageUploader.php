<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 */

class CkeditorImageNameImageUploader extends OrmImageUploader {

  public function getVersions () {
    return array (
        '' => array (),
        '400h' => array ('resize', 400, 400, 'height'),
      );
  }
}