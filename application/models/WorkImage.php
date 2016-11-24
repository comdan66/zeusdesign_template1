<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 */

class WorkImage extends OaModel {

  static $table_name = 'work_images';

  static $has_one = array (
  );

  static $has_many = array (
  );

  static $belongs_to = array (
  );

  public function __construct ($attributes = array (), $guard_attributes = true, $instantiating_via_find = false, $new_record = true) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);

    OrmImageUploader::bind ('name', 'WorkImageNameImageUploader');
  }
  public function to_array (array $opt = array ()) {
    return array (
        'id' => $this->id,
        'ori' => $this->name->url (),
        'w800' => $this->name->url ('800w'),
      );

  }
  public function destroy () {
    if (!(isset ($this->name) && isset ($this->id)))
      return false;

    return $this->delete ();
  }
}