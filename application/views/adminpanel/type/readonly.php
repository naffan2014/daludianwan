<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 游戏风格管理 查看信息 
        <div class='panel-tools'>
            <div class='btn-group'>
            	<a class="btn " href="<?php echo base_url('adminpanel/type')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
            </div>
        </div>
    </div>
    <div class='panel-body '>
<div class="form-horizontal"  >
	<fieldset>
        <legend>基本信息</legend>
     
  	  	
	<div class="form-group">
				<label for="type_name" class="col-sm-2 control-label form-control-static">风格名称</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['type_name'])?$data_info['type_name']:'' ?>
				</div>
			</div>
	    </fieldset>
	</div>
</div>
</div>
