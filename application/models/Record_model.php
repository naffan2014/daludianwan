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
 * 项目名称：租赁管理 MODEL
 * 版本号：1 
 * 最后生成时间：2016-07-20 16:26:28 
 */
class Record_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'record';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
		'record_id'=>0,
		'record_user_no'=>'',
		'record_disc'=>'',
		'record_status'=>'1',
		'record_time'=>'',
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE  IF NOT EXISTS `t_aci_record`
(
`record_user_no` int(11) DEFAULT '0' COMMENT '用户',
`record_disc` varchar(50) DEFAULT NULL COMMENT '游戏盘',
`record_status` varchar(250) DEFAULT NULL COMMENT '状态',
`record_time` date DEFAULT NULL COMMENT '操作时间',
`record_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`record_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        }

// END record_model class

/* End of file record_model.php */
/* Location: ./record_model.php */
?>