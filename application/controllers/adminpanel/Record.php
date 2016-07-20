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
 * 项目名称：租赁管理 
 * 版本号：1 
 * 最后生成时间：2016-07-20 16:26:28 
 */
class Record extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('Disc_model','record_model'));
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
        
        $orderby = "record_id desc";
        $dir = $order=  NULL;
		        
        $where ="";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
		        
		        
        
		        
        	
        	$_arr['record_user_no_1'] =isset($_GET['record_user_no_1'])?intval($_GET['record_user_no_1']):'';
        	$_arr['record_user_no_2'] =isset($_GET['record_user_no_2'])?intval($_GET['record_user_no_2']):'';
            if($_arr['record_user_no_1']!="") $where_arr[] = "(record_user_no >= ".$_arr['record_user_no_1'].")";
        	if($_arr['record_user_no_2']!="") $where_arr[] = "(record_user_no <= ".$_arr['record_user_no_2'].")";
        	if($where_arr)$where = implode(" and ",$where_arr);
        }

        	$data_list = $this->record_model->listinfo($where,'*',$orderby , $page_no, $this->record_model->page_size,'',$this->record_model->page_size,page_list_url('adminpanel/record/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k] = $this->_process_datacorce_value($v);
            	}
        }
    	$this->view('lists',array('require_js'=>true,'data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->record_model->pages));
    }
    
    /**
     * 处理数据源结
     * @param array v 
     * @return array
     */
    function _process_datacorce_value($v,$is_edit_model=false)
    {
			if(isset($v['record_disc']))
            {
            	//如果编辑模式
            	if($is_edit_model)
            		$v['record_disc_text'] = $this->Disc_model->DB_disc_list_value($v["record_disc"]);                    
                else
                	$v['record_disc'] = $this->Disc_model->DB_disc_list_value($v["record_disc"]);                    
             }
                    
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
			$_arr['record_user_no'] = isset($_POST["record_user_no"])?trim(safe_replace($_POST["record_user_no"])):exit(json_encode(array('status'=>false,'tips'=>'用户不能为空')));
			if($_arr['record_user_no']=='')exit(json_encode(array('status'=>false,'tips'=>'用户不能为空')));
			if($_arr['record_user_no']!=''){
			if(!is_number($_arr['record_user_no']))exit(json_encode(array('status'=>false,'tips'=>'用户不符合要求')));
			}
			$_arr['record_disc'] = isset($_POST["record_disc"])?trim(safe_replace($_POST["record_disc"])):exit(json_encode(array('status'=>false,'tips'=>'游戏盘不能为空')));
			if($_arr['record_disc']=='')exit(json_encode(array('status'=>false,'tips'=>'游戏盘不能为空')));
			$_arr['record_status'] = isset($_POST["record_status"])?trim(safe_replace($_POST["record_status"])):exit(json_encode(array('status'=>false,'tips'=>'状态不能为空')));
			if($_arr['record_status']=='')exit(json_encode(array('status'=>false,'tips'=>'状态不能为空')));
			$_arr['record_time'] = isset($_POST["record_time"])?trim(safe_replace($_POST["record_time"])):exit(json_encode(array('status'=>false,'tips'=>'操作时间不能为空')));
			if($_arr['record_time']=='')exit(json_encode(array('status'=>false,'tips'=>'操作时间不能为空')));
			if($_arr['record_time']!=''){
			if(!is_date($_arr['record_time']))exit(json_encode(array('status'=>false,'tips'=>'操作时间不符合要求')));
			}
			
            $new_id = $this->record_model->insert($_arr);
            if($new_id)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息新增成功','new_id'=>$new_id)));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息新增失败','new_id'=>0)));
            }
        }else
        {
        	$this->view('edit',array('require_js'=>true,'is_edit'=>false,'id'=>0,'data_info'=>$this->record_model->default_info()));
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
        $data_info =$this->record_model->get_one(array('record_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this->record_model->delete(array('record_id'=>$id));
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
			$where = $this->record_model->to_sqls($pidarr, '', 'record_id');
			$status = $this->record_model->delete($where);
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
        
        $data_info =$this->record_model->get_one(array('record_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
			$_arr['record_user_no'] = isset($_POST["record_user_no"])?trim(safe_replace($_POST["record_user_no"])):exit(json_encode(array('status'=>false,'tips'=>'用户不能为空')));
			if($_arr['record_user_no']=='')exit(json_encode(array('status'=>false,'tips'=>'用户不能为空')));
			if($_arr['record_user_no']!=''){
			if(!is_number($_arr['record_user_no']))exit(json_encode(array('status'=>false,'tips'=>'用户不符合要求')));
			}
			$_arr['record_disc'] = isset($_POST["record_disc"])?trim(safe_replace($_POST["record_disc"])):exit(json_encode(array('status'=>false,'tips'=>'游戏盘不能为空')));
			if($_arr['record_disc']=='')exit(json_encode(array('status'=>false,'tips'=>'游戏盘不能为空')));
			$_arr['record_status'] = isset($_POST["record_status"])?trim(safe_replace($_POST["record_status"])):exit(json_encode(array('status'=>false,'tips'=>'状态不能为空')));
			if($_arr['record_status']=='')exit(json_encode(array('status'=>false,'tips'=>'状态不能为空')));
			$_arr['record_time'] = isset($_POST["record_time"])?trim(safe_replace($_POST["record_time"])):exit(json_encode(array('status'=>false,'tips'=>'操作时间不能为空')));
			if($_arr['record_time']=='')exit(json_encode(array('status'=>false,'tips'=>'操作时间不能为空')));
			if($_arr['record_time']!=''){
			if(!is_date($_arr['record_time']))exit(json_encode(array('status'=>false,'tips'=>'操作时间不符合要求')));
			}
			
            $status = $this->record_model->update($_arr,array('record_id'=>$id));
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
        $data_info =$this->record_model->get_one(array('record_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
		$data_info = $this->_process_datacorce_value($data_info);
        
        $this->view('readonly',array('require_js'=>true,'data_info'=>$data_info));
    }

}

// END record class

/* End of file record.php */
/* Location: ./record.php */
?>