<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 */

class UserRole extends OaModel {

  static $table_name = 'user_roles';

  static $has_one = array (
  );

  static $has_many = array (
  );

  static $belongs_to = array (
  );

  public function __construct ($attributes = array (), $guard_attributes = true, $instantiating_via_find = false, $new_record = true) {
    parent::__construct ($attributes, $guard_attributes, $instantiating_via_find, $new_record);
  }
  public function name () {
    return Cfg::setting ('role', 'role_names', $this->name);
  }
  public function destroy () {
    return $this->delete ();
  }
  public function to_array (array $opt = array ()) {
    return array (
        'key' => $this->name,
        'name' => Cfg::setting('role', 'role_names', $this->name)
      );
  }
}