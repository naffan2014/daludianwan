<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="<?php echo base_url('adminpanel/merchant/edit')?>" >
	<div class='panel panel-default '>
		<div class='panel-heading'>
			<i class='fa fa-table'></i> 厂商管理 修改信息
			<div class='panel-tools'>
				<div class='btn-group'>
					<a class="btn " href="<?php echo base_url('adminpanel/merchant')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
				</div>
			</div>
		</div>
		<div class='panel-body '>
								<fieldset>
						<legend>基本信息</legend>
													
	<div class="form-group">
				<label for="merchant_name" class="col-sm-2 control-label form-control-static">厂商名称</label>
				<div class="col-sm-9 ">
					<input type="text" name="merchant_name"  id="merchant_name"  value='<?php echo isset($data_info['merchant_name'])?$data_info['merchant_name']:'' ?>'  class="form-control validate[required]"  placeholder="请输入厂商名称" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="merchant_url" class="col-sm-2 control-label form-control-static">厂商官网</label>
				<div class="col-sm-9 ">
					<input type="url" name="merchant_url"  id="merchant_url"   value='<?php echo isset($data_info['merchant_url'])?$data_info['merchant_url']:'' ?>'   class="form-control  validate[custom[url]]"  placeholder="请输入厂商官网" >
				</div>
			</div>
											</fieldset>
							<div class='form-actions'>
				<button class='btn btn-primary ' type='submit' id="dosubmit">保存</button>
			</div>
</form>
			<script language="javascript" type="text/javascript">
			var is_edit =<?php echo ($is_edit)?"true":"false" ?>;
			var id =<?php echo $id;?>;

			require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
		        require(['<?php echo SITE_URL?>scripts/adminpanel/merchant/edit.js']);
		    });
		</script>
	
	