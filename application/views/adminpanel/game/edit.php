<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="<?php echo base_url('adminpanel/game/edit')?>" >
	<div class='panel panel-default '>
		<div class='panel-heading'>
			<i class='fa fa-table'></i> 游戏管理 修改信息
			<div class='panel-tools'>
				<div class='btn-group'>
					<a class="btn " href="<?php echo base_url('adminpanel/game')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
				</div>
			</div>
		</div>
		<div class='panel-body '>
								<fieldset>
						<legend>基本信息</legend>
													
	<div class="form-group">
				<label for="game_name" class="col-sm-2 control-label form-control-static">游戏名称</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_name"  id="game_name"  value='<?php echo isset($data_info['game_name'])?$data_info['game_name']:'' ?>'  class="form-control validate[required]"  placeholder="请输入游戏名称" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_desc" class="col-sm-2 control-label form-control-static">游戏介绍</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_desc"  id="game_desc"  value='<?php echo isset($data_info['game_desc'])?$data_info['game_desc']:'' ?>'  class="form-control validate[required]"  placeholder="请输入游戏介绍" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_players" class="col-sm-2 control-label form-control-static">游戏人数</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_players"  id="game_players"  value='<?php echo isset($data_info['game_players'])?$data_info['game_players']:'' ?>'  class="form-control validate[required]"  placeholder="请输入游戏人数" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_style" class="col-sm-2 control-label form-control-static">游戏风格</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_style"  id="game_style"  value='<?php echo isset($data_info['game_style'])?$data_info['game_style']:'' ?>'  class="form-control validate[required]"  placeholder="请输入游戏风格" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_language" class="col-sm-2 control-label form-control-static">游戏语言</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_language"  id="game_language"  value='<?php echo isset($data_info['game_language'])?$data_info['game_language']:'' ?>'  class="form-control validate[required]"  placeholder="请输入游戏语言" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_url" class="col-sm-2 control-label form-control-static">游戏官网</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_url"  id="game_url"  value='<?php echo isset($data_info['game_url'])?$data_info['game_url']:'' ?>'  class="form-control validate[required]"  placeholder="请输入游戏官网" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_merchant" class="col-sm-2 control-label form-control-static">游戏厂商</label>
				<div class="col-md-5 ">
					<input class="form-control" value="<?php echo isset($data_info['game_merchant_text'])?$data_info['game_merchant_text']:''; ?>" readonly="readonly" placeholder="请点击选择" type="text" id="game_merchant_text"  /><input type="hidden" value="<?php echo isset($data_info['game_merchant'])?$data_info['game_merchant']:'';?>" id="game_merchant" name="game_merchant" />
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_sale_time" class="col-sm-2 control-label form-control-static">游戏上市日期</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_sale_time"  id="game_sale_time"   value='<?php echo isset($data_info['game_sale_time'])?$data_info['game_sale_time']:'' ?>'  class="form-control datepicker validate[custom[date]]"  placeholder="请输入游戏上市日期" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_arrival_time" class="col-sm-2 control-label form-control-static">游戏到货日期</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_arrival_time"  id="game_arrival_time"   value='<?php echo isset($data_info['game_arrival_time'])?$data_info['game_arrival_time']:'' ?>'  class="form-control datepicker validate[custom[date]]"  placeholder="请输入游戏到货日期" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_record_time" class="col-sm-2 control-label form-control-static">游戏录入时间</label>
				<div class="col-sm-9 ">
					<input type="text" name="game_record_time"  id="game_record_time"   value='<?php echo isset($data_info['game_record_time'])?$data_info['game_record_time']:'' ?>'  class="form-control datepicker validate[custom[date]]"  placeholder="请输入游戏录入时间" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="game_status" class="col-sm-2 control-label form-control-static">游戏状态</label>
				<div class="col-sm-9 ">
					<select class="form-control  validate[required]"  name="game_status"  id="game_status">
				<option value="">==请选择==</option>
								<option value='1' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='1')) { ?> selected="selected" <?php } ?>            >可售</option>
				<option value='2' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='2')) { ?> selected="selected" <?php } ?>            >不可售</option>
				<option value='3' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='3')) { ?> selected="selected" <?php } ?>            >可借</option>
				<option value='4' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='4')) { ?> selected="selected" <?php } ?>            >不可借</option>
</select>
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
		        require(['<?php echo SITE_URL?>scripts/adminpanel/game/edit.js']);
		    });
		</script>
	
	