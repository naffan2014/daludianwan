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
 * 项目名称：游戏风格管理 MODEL
 * 版本号：1 
 * 最后生成时间：2016-07-18 18:22:08 
 */
class Type_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'type';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
		'type_id'=>0,
		'type_name'=>'',
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE  IF NOT EXISTS `t_aci_type`
(
`type_name` varchar(250) DEFAULT NULL COMMENT '风格名称',
`type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        
    /**
     * 风格列表     * @return array
     */
    function DB_style_list_datasource($where='',$limit = '', $order = '', $group = '', $key='')
    {
    	$datalist = $this->select($where,'type_id,type_name',$limit,$order,$group,$key);
        return $datalist;
    }
    
    /**
     * 风格列表选择中项值     * @return array
     */
    function DB_style_list_value($id=0)
    {
    	$data_info = $this->get_one(array('type_id'=>$id),'type_name');
        if($data_info)
        {
        	return  implode("-",$data_info);
        }
        return NULL;
    }
        }

// END type_model class

/* End of file type_model.php */
/* Location: ./type_model.php */
?>