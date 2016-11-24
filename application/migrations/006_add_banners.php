<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author      OA Wu <comdan66@gmail.com>
 * @copyright   Copyright (c) 2016 OA Wu Design
 */

class Migration_Add_banners extends CI_Migration {
  public function up () {
    $this->db->query (
      "CREATE TABLE `banners` (
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,

        `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '標題',
        `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '內容',
        `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '鏈結',
        `cover` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '封面',
        
        `target` tinyint(4) unsigned NOT NULL DEFAULT 0 COMMENT '鏈結開啟方式，1 分頁，0 本頁',
        `sort` int(11) unsigned NOT NULL DEFAULT 0 COMMENT '排列順序，上至下 DESC',
        `is_enabled` tinyint(4) unsigned NOT NULL DEFAULT 0 COMMENT '上下架，1 上架，0 下架',

        `updated_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "' COMMENT '更新時間',
        `created_at` datetime NOT NULL DEFAULT '" . date ('Y-m-d H:i:s') . "' COMMENT '新增時間',
        PRIMARY KEY (`id`)
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;"
    );
  }
  public function down () {
    $this->db->query (
      "DROP TABLE `banners`;"
    );
  }
}