<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="<?php echo base_url('adminpanel/record/edit')?>" >
	<div class='panel panel-default '>
		<div class='panel-heading'>
			<i class='fa fa-table'></i> 租赁管理 修改信息
			<div class='panel-tools'>
				<div class='btn-group'>
					<a class="btn " href="<?php echo base_url('adminpanel/record')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
				</div>
			</div>
		</div>
		<div class='panel-body '>
								<fieldset>
						<legend>基本信息</legend>
													
	<div class="form-group">
				<label for="record_user_no" class="col-sm-2 control-label form-control-static">用户</label>
				<div class="col-sm-9 ">
					<input type="number" name="record_user_no"  id="record_user_no"  value='<?php echo isset($data_info['record_user_no'])?$data_info['record_user_no']:'' ?>'   class="form-control  validate[required,custom[integer]]" placeholder="请输入用户" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="record_disc" class="col-sm-2 control-label form-control-static">游戏盘</label>
				<div class="col-md-5 ">
					<input class="form-control" value="<?php echo isset($data_info['record_disc_text'])?$data_info['record_disc_text']:''; ?>" readonly="readonly" placeholder="请点击选择" type="text" id="record_disc_text"  /><input type="hidden" value="<?php echo isset($data_info['record_disc'])?$data_info['record_disc']:'';?>" id="record_disc" name="record_disc" />
				</div>
			</div>
													
	<div class="form-group">
				<label for="record_status" class="col-sm-2 control-label form-control-static">状态</label>
				<div class="col-sm-9 ">
					<select class="form-control  validate[required]"  name="record_status"  id="record_status">
				<option value="">==请选择==</option>
								<option value='1' <?php if(isset($data_info['record_status'])&&($data_info['record_status']=='1')) { ?> selected="selected" <?php } ?>            >借出</option>
				<option value='2' <?php if(isset($data_info['record_status'])&&($data_info['record_status']=='2')) { ?> selected="selected" <?php } ?>            >已还</option>
</select>
				</div>
			</div>
													
	<div class="form-group">
				<label for="record_time" class="col-sm-2 control-label form-control-static">操作时间</label>
				<div class="col-sm-9 ">
					<input type="text" name="record_time"  id="record_time"   value='<?php echo isset($data_info['record_time'])?$data_info['record_time']:'' ?>'  class="form-control datepicker  validate[required,custom[date]]"  placeholder="请输入操作时间" >
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
		        require(['<?php echo SITE_URL?>scripts/adminpanel/record/edit.js']);
		    });
		</script>
	
	