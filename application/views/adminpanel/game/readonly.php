<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 游戏管理 查看信息 
        <div class='panel-tools'>
            <div class='btn-group'>
            	<a class="btn " href="<?php echo base_url('adminpanel/game')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
            </div>
        </div>
    </div>
    <div class='panel-body '>
<div class="form-horizontal"  >
	<fieldset>
        <legend>基本信息</legend>
     
  	  	
	<div class="form-group">
				<label for="game_name" class="col-sm-2 control-label form-control-static">游戏名称</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_name'])?$data_info['game_name']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_desc" class="col-sm-2 control-label form-control-static">游戏介绍</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_desc'])?$data_info['game_desc']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_players" class="col-sm-2 control-label form-control-static">游戏人数</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_players'])?$data_info['game_players']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_style" class="col-sm-2 control-label form-control-static">游戏风格</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_style'])?$data_info['game_style']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_language" class="col-sm-2 control-label form-control-static">游戏语言</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_language'])?$data_info['game_language']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_url" class="col-sm-2 control-label form-control-static">游戏官网</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_url'])?$data_info['game_url']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_merchant" class="col-sm-2 control-label form-control-static">游戏厂商</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_merchant'])?$data_info['game_merchant']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_sale_time" class="col-sm-2 control-label form-control-static">游戏上市日期</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_sale_time'])?$data_info['game_sale_time']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_arrival_time" class="col-sm-2 control-label form-control-static">游戏到货日期</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_arrival_time'])?$data_info['game_arrival_time']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_record_time" class="col-sm-2 control-label form-control-static">游戏录入时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_record_time'])?$data_info['game_record_time']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="game_status" class="col-sm-2 control-label form-control-static">游戏状态</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['game_status'])?$data_info['game_status']:'' ?>
				</div>
			</div>
	    </fieldset>
	</div>
</div>
</div>
