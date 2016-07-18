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
 * 项目名称：游戏风格管理 
 * 版本号：1 
 * 最后生成时间：2016-07-18 18:22:08 
 */
class Type extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('type_model'));
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
        
        $orderby = "type_id desc";
        $dir = $order=  NULL;
		        
        $where ="";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
			$_arr['keyword'] =isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';
			if($_arr['keyword']!="") $where_arr[] = "concat(type_name) like '%{$_arr['keyword']}%'";
                
		        
        
		        
        	if($where_arr)$where = implode(" and ",$where_arr);
        }

        	$data_list = $this->type_model->listinfo($where,'*',$orderby , $page_no, $this->type_model->page_size,'',$this->type_model->page_size,page_list_url('adminpanel/type/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k] = $this->_process_datacorce_value($v);
            	}
        }
    	$this->view('lists',array('require_js'=>true,'data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->type_model->pages));
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
			$_arr['type_name'] = isset($_POST["type_name"])?trim(safe_replace($_POST["type_name"])):exit(json_encode(array('status'=>false,'tips'=>'风格名称不能为空')));
			if($_arr['type_name']=='')exit(json_encode(array('status'=>false,'tips'=>'风格名称不能为空')));
			
            $new_id = $this->type_model->insert($_arr);
            if($new_id)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息新增成功','new_id'=>$new_id)));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息新增失败','new_id'=>0)));
            }
        }else
        {
        	$this->view('edit',array('require_js'=>true,'is_edit'=>false,'id'=>0,'data_info'=>$this->type_model->default_info()));
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
        $data_info =$this->type_model->get_one(array('type_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this->type_model->delete(array('type_id'=>$id));
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
			$where = $this->type_model->to_sqls($pidarr, '', 'type_id');
			$status = $this->type_model->delete($where);
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
        
        $data_info =$this->type_model->get_one(array('type_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
			$_arr['type_name'] = isset($_POST["type_name"])?trim(safe_replace($_POST["type_name"])):exit(json_encode(array('status'=>false,'tips'=>'风格名称不能为空')));
			if($_arr['type_name']=='')exit(json_encode(array('status'=>false,'tips'=>'风格名称不能为空')));
			
            $status = $this->type_model->update($_arr,array('type_id'=>$id));
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
        $data_info =$this->type_model->get_one(array('type_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
		$data_info = $this->_process_datacorce_value($data_info);
        
        $this->view('readonly',array('require_js'=>true,'data_info'=>$data_info));
    }

    /**
     *      * @return array
     */
    function DB_style_list_window($controlId='',$page_no=0)
    {
    	$page_no = max(intval($page_no),1);
        $orderby = 'type_ID desc';
        $keyword=safe_replace(trim($this->input->get('keyword')));

		$where ="";
		if (isset($_GET['dosubmit'])) {
			if($keyword!="") $where = "concat(type_id,type_name) like '%{$keyword}%'";
		}
		
        
    	$data_list = $this->type_model->listinfo($where,'type_id,type_name',$orderby , $page_no, $this->type_model->page_size,'',$this->type_model->page_size,page_list_url('adminpanel/type/DB_style_list_window',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
    
    			}
        }
    	$this->view('choose',array('require_js'=>true,'hidden_menu'=>true,'fields_convert'=>explode(",",'type_name'),'fields'=>explode(",",'type_id,type_name'),'fields_caption'=>explode(",",'ID,风格名称'),'data_list'=>$data_list,'pages'=>$this->type_model->pages,'control_id'=>$controlId,'keyword'=>$keyword,'concat_char'=>''));
      
    }
}

// END type class

/* End of file type.php */
/* Location: ./type.php */
?>