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
 * 项目名称：游戏管理 
 * 版本号：1 
 * 最后生成时间：2016-07-18 16:01:36 
 */
class Game extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('Type_model','Merchant_model','game_model'));
        $this->load->helper(array('auto_codeIgniter_helper','array'));
  
  
        //保证排序安全性
        $this->method_config['sort_field'] = array(
										'game_name'=>'game_name',
										'game_players'=>'game_players',
										'game_language'=>'game_language',
										'game_sale_time'=>'game_sale_time',
										'game_arrival_time'=>'game_arrival_time',
										'game_record_time'=>'game_record_time',
										);
	}
    
    /**
     * 默认首页列表
     * @param int $pageno 当前页码
     * @return void
     */
    function index($page_no=0,$sort_id=0)
    {
    	$page_no = max(intval($page_no),1);
        
        $orderby = "game_id desc";
        $dir = $order=  NULL;
		$order=isset($_GET['order'])?safe_replace(trim($_GET['order'])):'';
		$dir=isset($_GET['dir'])?safe_replace(trim($_GET['dir'])):'asc';
        
        if(trim($order)!="")
        {
        	//如果找到得
        	if(isset($this->method_config['sort_field'][strtolower($order)]))
            {
            	if(strtolower($dir)=="asc")
            		$orderby = $this->method_config['sort_field'][strtolower($order)]." asc," .$orderby;
                 else
            		$orderby = $this->method_config['sort_field'][strtolower($order)]." desc," .$orderby;
            }
        }
                
        $where ="";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
			$_arr['keyword'] =isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';
			if($_arr['keyword']!="") $where_arr[] = "concat(game_name,game_players,game_language) like '%{$_arr['keyword']}%'";
                
			$_arr['game_status'] = isset($_GET["game_status"])?trim(safe_replace($_GET["game_status"])):'';
        	if($_arr['game_status']!="") $where_arr[] = "game_status = '".$_arr['game_status']."'";

                
        
		        
        	if($where_arr)$where = implode(" and ",$where_arr);
        }

        	$data_list = $this->game_model->listinfo($where,'*',$orderby , $page_no, $this->game_model->page_size,'',$this->game_model->page_size,page_list_url('adminpanel/game/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k] = $this->_process_datacorce_value($v);
            	}
        }
    	$this->view('lists',array('require_js'=>true,'data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->game_model->pages));
    }
    
    /**
     * 处理数据源结
     * @param array v 
     * @return array
     */
    function _process_datacorce_value($v,$is_edit_model=false)
    {
			if(isset($v['game_style']))
            {
            	//如果编辑模式
            	if($is_edit_model)
            		$v['game_style_text'] = $this->Type_model->DB_style_list_value($v["game_style"]);                    
                else
                	$v['game_style'] = $this->Type_model->DB_style_list_value($v["game_style"]);                    
             }
                    
			if(isset($v['game_merchant']))
            {
            	//如果编辑模式
            	if($is_edit_model)
            		$v['game_merchant_text'] = $this->Merchant_model->DB_merchant_list_value($v["game_merchant"]);                    
                else
                	$v['game_merchant'] = $this->Merchant_model->DB_merchant_list_value($v["game_merchant"]);                    
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
			$_arr['game_name'] = isset($_POST["game_name"])?trim(safe_replace($_POST["game_name"])):exit(json_encode(array('status'=>false,'tips'=>'游戏名称不能为空')));
			if($_arr['game_name']=='')exit(json_encode(array('status'=>false,'tips'=>'游戏名称不能为空')));
			$_arr['game_desc'] = isset($_POST["game_desc"])?trim(safe_replace($_POST["game_desc"])):'';
			$_arr['game_players'] = isset($_POST["game_players"])?trim(safe_replace($_POST["game_players"])):'';
			$_arr['game_style'] = isset($_POST["game_style"])?trim(safe_replace($_POST["game_style"])):'';
			$_arr['game_language'] = isset($_POST["game_language"])?trim(safe_replace($_POST["game_language"])):'';
			$_arr['game_url'] = isset($_POST["game_url"])?trim(safe_replace($_POST["game_url"])):'';
			$_arr['game_merchant'] = isset($_POST["game_merchant"])?trim(safe_replace($_POST["game_merchant"])):'';
			$_arr['game_sale_time'] = isset($_POST["game_sale_time"])?trim(safe_replace($_POST["game_sale_time"])):'';
			if($_arr['game_sale_time']!=''){
			if(!is_date($_arr['game_sale_time']))exit(json_encode(array('status'=>false,'tips'=>'游戏上市日期不符合要求')));
			}
			$_arr['game_arrival_time'] = isset($_POST["game_arrival_time"])?trim(safe_replace($_POST["game_arrival_time"])):'';
			if($_arr['game_arrival_time']!=''){
			if(!is_date($_arr['game_arrival_time']))exit(json_encode(array('status'=>false,'tips'=>'游戏到货日期不符合要求')));
			}
			$_arr['game_record_time'] = isset($_POST["game_record_time"])?trim(safe_replace($_POST["game_record_time"])):'';
			if($_arr['game_record_time']!=''){
			if(!is_date($_arr['game_record_time']))exit(json_encode(array('status'=>false,'tips'=>'游戏录入时间不符合要求')));
			}
			$_arr['game_status'] = isset($_POST["game_status"])?trim(safe_replace($_POST["game_status"])):exit(json_encode(array('status'=>false,'tips'=>'游戏状态不能为空')));
			if($_arr['game_status']=='')exit(json_encode(array('status'=>false,'tips'=>'游戏状态不能为空')));
			
            $new_id = $this->game_model->insert($_arr);
            if($new_id)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息新增成功','new_id'=>$new_id)));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息新增失败','new_id'=>0)));
            }
        }else
        {
        	$this->view('edit',array('require_js'=>true,'is_edit'=>false,'id'=>0,'data_info'=>$this->game_model->default_info()));
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
        $data_info =$this->game_model->get_one(array('game_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this->game_model->delete(array('game_id'=>$id));
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
			$where = $this->game_model->to_sqls($pidarr, '', 'game_id');
			$status = $this->game_model->delete($where);
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
        
        $data_info =$this->game_model->get_one(array('game_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
			$_arr['game_name'] = isset($_POST["game_name"])?trim(safe_replace($_POST["game_name"])):exit(json_encode(array('status'=>false,'tips'=>'游戏名称不能为空')));
			if($_arr['game_name']=='')exit(json_encode(array('status'=>false,'tips'=>'游戏名称不能为空')));
			$_arr['game_desc'] = isset($_POST["game_desc"])?trim(safe_replace($_POST["game_desc"])):'';
			$_arr['game_players'] = isset($_POST["game_players"])?trim(safe_replace($_POST["game_players"])):'';
			$_arr['game_style'] = isset($_POST["game_style"])?trim(safe_replace($_POST["game_style"])):'';
			$_arr['game_language'] = isset($_POST["game_language"])?trim(safe_replace($_POST["game_language"])):'';
			$_arr['game_url'] = isset($_POST["game_url"])?trim(safe_replace($_POST["game_url"])):'';
			$_arr['game_merchant'] = isset($_POST["game_merchant"])?trim(safe_replace($_POST["game_merchant"])):'';
			$_arr['game_sale_time'] = isset($_POST["game_sale_time"])?trim(safe_replace($_POST["game_sale_time"])):'';
			if($_arr['game_sale_time']!=''){
			if(!is_date($_arr['game_sale_time']))exit(json_encode(array('status'=>false,'tips'=>'游戏上市日期不符合要求')));
			}
			$_arr['game_arrival_time'] = isset($_POST["game_arrival_time"])?trim(safe_replace($_POST["game_arrival_time"])):'';
			if($_arr['game_arrival_time']!=''){
			if(!is_date($_arr['game_arrival_time']))exit(json_encode(array('status'=>false,'tips'=>'游戏到货日期不符合要求')));
			}
			$_arr['game_record_time'] = isset($_POST["game_record_time"])?trim(safe_replace($_POST["game_record_time"])):'';
			if($_arr['game_record_time']!=''){
			if(!is_date($_arr['game_record_time']))exit(json_encode(array('status'=>false,'tips'=>'游戏录入时间不符合要求')));
			}
			$_arr['game_status'] = isset($_POST["game_status"])?trim(safe_replace($_POST["game_status"])):exit(json_encode(array('status'=>false,'tips'=>'游戏状态不能为空')));
			if($_arr['game_status']=='')exit(json_encode(array('status'=>false,'tips'=>'游戏状态不能为空')));
			
            $status = $this->game_model->update($_arr,array('game_id'=>$id));
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
        $data_info =$this->game_model->get_one(array('game_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
		$data_info = $this->_process_datacorce_value($data_info);
        
        $this->view('readonly',array('require_js'=>true,'data_info'=>$data_info));
    }

    /**
     *      * @return array
     */
    function DB_game_list_window($controlId='',$page_no=0)
    {
    	$page_no = max(intval($page_no),1);
        $orderby = 'game_ID desc';
        $keyword=safe_replace(trim($this->input->get('keyword')));

		$where ="";
		if (isset($_GET['dosubmit'])) {
			if($keyword!="") $where = "concat(game_id,game_name,game_id,game_merchant) like '%{$keyword}%'";
		}
		
        
    	$data_list = $this->game_model->listinfo($where,'game_id,game_name,game_id,game_merchant',$orderby , $page_no, $this->game_model->page_size,'',$this->game_model->page_size,page_list_url('adminpanel/game/DB_game_list_window',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k]['game_merchant'] = $this->Merchant_model->DB_merchant_list_value($data_list[$k]["game_merchant"]);    
    			}
        }
    	$this->view('choose',array('require_js'=>true,'hidden_menu'=>true,'fields_convert'=>explode(",",'game_name'),'fields'=>explode(",",'game_id,game_name,game_id,game_merchant'),'fields_caption'=>explode(",",'ID,游戏名称,ID,游戏厂商'),'data_list'=>$data_list,'pages'=>$this->game_model->pages,'control_id'=>$controlId,'keyword'=>$keyword,'concat_char'=>''));
      
    }
}

// END game class

/* End of file game.php */
/* Location: ./game.php */
?>