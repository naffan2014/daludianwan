<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：厂商管理 MODEL
 * 版本号：1 
 * 最后生成时间：2016-07-18 17:59:13 
 */
class Merchant_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'merchant';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
		'merchant_id'=>0,
		'merchant_name'=>'',
		'merchant_url'=>'',
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE  IF NOT EXISTS `t_aci_merchant`
(
`merchant_name` varchar(250) DEFAULT NULL COMMENT '厂商名称',
`merchant_url` varchar(50) DEFAULT NULL COMMENT '厂商官网',
`merchant_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`merchant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        }

// END merchant_model class

/* End of file merchant_model.php */
/* Location: ./merchant_model.php */
?>