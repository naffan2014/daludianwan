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
 * 项目名称：游戏盘管理 MODEL
 * 版本号：1 
 * 最后生成时间：2016-07-20 15:28:56 
 */
class Disc_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'disc';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
		'disc_id'=>0,
		'disc_no'=>'',
		'disc_game'=>'',
		'disc_status'=>'1',
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE  IF NOT EXISTS `t_aci_disc`
(
`disc_no` int(11) DEFAULT '0' COMMENT '光盘序号',
`disc_game` varchar(50) DEFAULT NULL COMMENT '所属游戏',
`disc_status` varchar(250) DEFAULT NULL COMMENT '光盘状态',
`disc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`disc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        
    /**
     * 游戏盘列表     * @return array
     */
    function DB_disc_list_datasource($where='',$limit = '', $order = '', $group = '', $key='')
    {
    	$datalist = $this->select($where,'disc_no,disc_no,disc_game,disc_status',$limit,$order,$group,$key);
        return $datalist;
    }
    
    /**
     * 游戏盘列表选择中项值     * @return array
     */
    function DB_disc_list_value($id=0)
    {
    	$data_info = $this->get_one(array('disc_no'=>$id),'disc_game');
        if($data_info)
        {
        	return  implode("-",$data_info);
        }
        return NULL;
    }
        }

// END disc_model class

/* End of file disc_model.php */
/* Location: ./disc_model.php */
?>