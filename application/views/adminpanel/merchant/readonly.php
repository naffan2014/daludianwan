<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 厂商管理 查看信息 
        <div class='panel-tools'>
            <div class='btn-group'>
            	<a class="btn " href="<?php echo base_url('adminpanel/merchant')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
            </div>
        </div>
    </div>
    <div class='panel-body '>
<div class="form-horizontal"  >
	<fieldset>
        <legend>基本信息</legend>
     
  	  	
	<div class="form-group">
				<label for="merchant_name" class="col-sm-2 control-label form-control-static">厂商名称</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['merchant_name'])?$data_info['merchant_name']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="merchant_url" class="col-sm-2 control-label form-control-static">厂商官网</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['merchant_url'])?$data_info['merchant_url']:'' ?>
				</div>
			</div>
	    </fieldset>
	</div>
</div>
</div>
