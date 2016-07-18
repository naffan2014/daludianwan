<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team EMAIL:hubinjie@outlook.com QQ:5516448
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：厂商管理 
 * 版本号：1 
 * 最后生成时间：2016-07-18 17:59:13 
 */
class Merchant extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('merchant_model'));
        $this->load->helper(array('auto_codeIgniter_helper','array'));
  
	}
    
    /**
     * 默认首页列表
     * @param int $pageno 当前页码
     * @return void
     */
    function index($page_no=0,$sort_id=0)
    {
    	$page_no = max(intval($page_no),1);
        
        $orderby = "merchant_id desc";
        $dir = $order=  NULL;
		        
        $where ="";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
			$_arr['keyword'] =isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';
			if($_arr['keyword']!="") $where_arr[] = "concat(merchant_name) like '%{$_arr['keyword']}%'";
                
		        
        
		        
        	if($where_arr)$where = implode(" and ",$where_arr);
        }

        	$data_list = $this->merchant_model->listinfo($where,'*',$orderby , $page_no, $this->merchant_model->page_size,'',$this->merchant_model->page_size,page_list_url('adminpanel/merchant/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k] = $this->_process_datacorce_value($v);
            	}
        }
    	$this->view('lists',array('require_js'=>true,'data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->merchant_model->pages));
    }
    
    /**
     * 处理数据源结
     * @param array v 
     * @return array
     */
    function _process_datacorce_value($v,$is_edit_model=false)
    {
         return $v;
    }
     /**
     * 新增数据
     * @param AJAX POST 
     * @return void
     */
    function add()
    {
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	//接收POST参数
			$_arr['merchant_name'] = isset($_POST["merchant_name"])?trim(safe_replace($_POST["merchant_name"])):exit(json_encode(array('status'=>false,'tips'=>'厂商名称不能为空')));
			if($_arr['merchant_name']=='')exit(json_encode(array('status'=>false,'tips'=>'厂商名称不能为空')));
			$_arr['merchant_url'] = isset($_POST["merchant_url"])?trim(safe_replace($_POST["merchant_url"])):'';
			if($_arr['merchant_url']!=''){
			if(!is_url($_arr['merchant_url']))exit(json_encode(array('status'=>false,'tips'=>'厂商官网不符合要求')));
			}
			
            $new_id = $this->merchant_model->insert($_arr);
            if($new_id)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息新增成功','new_id'=>$new_id)));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息新增失败','new_id'=>0)));
            }
        }else
        {
        	$this->view('edit',array('require_js'=>true,'is_edit'=>false,'id'=>0,'data_info'=>$this->merchant_model->default_info()));
        }
    }
     /**
     * 删除单个数据
     * @param int id 
     * @return void
     */
    function delete_one($id=0)
    {
    	$id = intval($id);
        $data_info =$this->merchant_model->get_one(array('merchant_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this->merchant_model->delete(array('merchant_id'=>$id));
        if($status)
        {
        	$this->showmessage('删除成功');
        }else
        	$this->showmessage('删除失败');
    }

    /**
     * 删除选中数据
     * @param post pid 
     * @return void
     */
    function delete_all()
    {
        if(isset($_POST))
		{
			$pidarr = isset($_POST['pid']) ? $_POST['pid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->merchant_model->to_sqls($pidarr, '', 'merchant_id');
			$status = $this->merchant_model->delete($where);
			if($status)
			{
				$this->showmessage('操作成功', HTTP_REFERER);
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
    }
     /**
     * 修改数据
     * @param int id 
     * @return void
     */
    function edit($id=0)
    {
    	$id = intval($id);
        
        $data_info =$this->merchant_model->get_one(array('merchant_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
			$_arr['merchant_name'] = isset($_POST["merchant_name"])?trim(safe_replace($_POST["merchant_name"])):exit(json_encode(array('status'=>false,'tips'=>'厂商名称不能为空')));
			if($_arr['merchant_name']=='')exit(json_encode(array('status'=>false,'tips'=>'厂商名称不能为空')));
			$_arr['merchant_url'] = isset($_POST["merchant_url"])?trim(safe_replace($_POST["merchant_url"])):'';
			if($_arr['merchant_url']!=''){
			if(!is_url($_arr['merchant_url']))exit(json_encode(array('status'=>false,'tips'=>'厂商官网不符合要求')));
			}
			
            $status = $this->merchant_model->update($_arr,array('merchant_id'=>$id));
            if($status)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息修改成功')));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息修改失败')));
            }
        }else
        {
        	if(!$data_info)$this->showmessage('信息不存在');
            $data_info = $this->_process_datacorce_value($data_info,true);
        	$this->view('edit',array('require_js'=>true,'data_info'=>$data_info,'is_edit'=>true,'id'=>$id));
        }
    }
 
  
     /**
     * 只读查看数据
     * @param int id 
     * @return void
     */
    function readonly($id=0)
    {
    	$id = intval($id);
        $data_info =$this->merchant_model->get_one(array('merchant_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
		$data_info = $this->_process_datacorce_value($data_info);
        
        $this->view('readonly',array('require_js'=>true,'data_info'=>$data_info));
    }

}

// END merchant class

/* End of file merchant.php */
/* Location: ./merchant.php */
?>