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
 * 项目名称：游戏管理 MODEL
 * 版本号：1 
 * 最后生成时间：2016-07-18 16:01:36 
 */
class Game_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'game';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
		'game_id'=>0,
		'game_name'=>'',
		'game_desc'=>'',
		'game_players'=>'1',
		'game_style'=>'',
		'game_language'=>'',
		'game_url'=>'',
		'game_merchant'=>'0',
		'game_sale_time'=>'',
		'game_arrival_time'=>'',
		'game_record_time'=>'',
		'game_status'=>'',
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE  IF NOT EXISTS `t_aci_game`
(
`game_name` varchar(250) DEFAULT NULL COMMENT '游戏名称',
`game_desc` varchar(250) DEFAULT NULL COMMENT '游戏介绍',
`game_players` varchar(250) DEFAULT NULL COMMENT '游戏人数',
`game_style` varchar(50) DEFAULT NULL COMMENT '游戏风格',
`game_language` varchar(250) DEFAULT NULL COMMENT '游戏语言',
`game_url` varchar(250) DEFAULT NULL COMMENT '游戏官网',
`game_merchant` varchar(50) DEFAULT NULL COMMENT '游戏厂商',
`game_sale_time` date DEFAULT NULL COMMENT '游戏上市日期',
`game_arrival_time` date DEFAULT NULL COMMENT '游戏到货日期',
`game_record_time` date DEFAULT NULL COMMENT '游戏录入时间',
`game_status` varchar(250) DEFAULT NULL COMMENT '游戏状态',
`game_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`game_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        }

// END game_model class

/* End of file game_model.php */
/* Location: ./game_model.php */
?>