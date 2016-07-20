<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 游戏盘管理 查看信息 
        <div class='panel-tools'>
            <div class='btn-group'>
            	<a class="btn " href="<?php echo base_url('adminpanel/disc')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
            </div>
        </div>
    </div>
    <div class='panel-body '>
<div class="form-horizontal"  >
	<fieldset>
        <legend>基本信息</legend>
     
  	  	
	<div class="form-group">
				<label for="disc_no" class="col-sm-2 control-label form-control-static">光盘序号</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['disc_no'])?$data_info['disc_no']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="disc_game" class="col-sm-2 control-label form-control-static">所属游戏</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['disc_game'])?$data_info['disc_game']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="disc_status" class="col-sm-2 control-label form-control-static">光盘状态</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['disc_status'])?$data_info['disc_status']:'' ?>
				</div>
			</div>
	    </fieldset>
	</div>
</div>
</div>
