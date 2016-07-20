<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="<?php echo base_url('adminpanel/disc/edit')?>" >
	<div class='panel panel-default '>
		<div class='panel-heading'>
			<i class='fa fa-table'></i> 游戏盘管理 修改信息
			<div class='panel-tools'>
				<div class='btn-group'>
					<a class="btn " href="<?php echo base_url('adminpanel/disc')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
				</div>
			</div>
		</div>
		<div class='panel-body '>
								<fieldset>
						<legend>基本信息</legend>
													
	<div class="form-group">
				<label for="disc_no" class="col-sm-2 control-label form-control-static">光盘序号</label>
				<div class="col-sm-9 ">
					<input type="number" name="disc_no"  id="disc_no"  value='<?php echo isset($data_info['disc_no'])?$data_info['disc_no']:'' ?>'   class="form-control  validate[required,custom[integer]]" placeholder="请输入光盘序号" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="disc_game" class="col-sm-2 control-label form-control-static">所属游戏</label>
				<div class="col-md-5 ">
					<input class="form-control" value="<?php echo isset($data_info['disc_game_text'])?$data_info['disc_game_text']:''; ?>" readonly="readonly" placeholder="请点击选择" type="text" id="disc_game_text"  /><input type="hidden" value="<?php echo isset($data_info['disc_game'])?$data_info['disc_game']:'';?>" id="disc_game" name="disc_game" />
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
		        require(['<?php echo SITE_URL?>scripts/adminpanel/disc/edit.js']);
		    });
		</script>
	
	