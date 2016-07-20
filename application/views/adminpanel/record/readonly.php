<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 租赁管理 查看信息 
        <div class='panel-tools'>
            <div class='btn-group'>
            	<a class="btn " href="<?php echo base_url('adminpanel/record')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
            </div>
        </div>
    </div>
    <div class='panel-body '>
<div class="form-horizontal"  >
	<fieldset>
        <legend>基本信息</legend>
     
  	  	
	<div class="form-group">
				<label for="record_user_no" class="col-sm-2 control-label form-control-static">用户</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['record_user_no'])?$data_info['record_user_no']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="record_disc" class="col-sm-2 control-label form-control-static">游戏盘</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['record_disc'])?$data_info['record_disc']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="record_status" class="col-sm-2 control-label form-control-static">状态</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['record_status'])?$data_info['record_status']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="record_time" class="col-sm-2 control-label form-control-static">操作时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['record_time'])?$data_info['record_time']:'' ?>
				</div>
			</div>
	    </fieldset>
	</div>
</div>
</div>
