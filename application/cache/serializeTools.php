<?php
defined('APPPATH') or define('APPPATH', dirname(__DIR__) . '/');
defined('BASEPATH') or define('BASEPATH', dirname(APPPATH) . '/system/');
include_once APPPATH . 'config/config.php';
$new_base_url = $config['base_url'];

$content = file_get_contents('cache_module_menu_all');
$data = unserialize($content);
foreach ($data['data'] as & $row) {
    $row['url'] = str_replace('http://localhost', $new_base_url, $row['url']);
}
$content = serialize($data);
file_put_contents('cache_module_menu_all', $content);
?>