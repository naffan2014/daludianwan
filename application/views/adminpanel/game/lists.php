<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 游戏管理列表
        <div class='panel-tools'>
            <div class='btn-group'>
                 <a class="btn " href="<?php echo base_url('adminpanel/game/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加 </a>             </div>
            <div class='badge'><?php echo count($data_list)?></div>
        </div>
    </div>
        <div class='panel-filter '>
      <div class='row'>
        <div class='col-md-12'>
        <form class="form-inline" role="form" method="get">
          
<div class="form-group">
<label for="keyword" class="control-label form-control-static">关键词</label>
<input class="form-control" type="text" name="keyword"  value="<?php echo isset($data_info['keyword'])? $data_info['keyword']:"";?>" id="keyword" placeholder="请输入关键词"/></div>

	<div class="form-group">
				<label for="game_status" class="col-sm-5 control-label form-control-static">游戏状态</label>
				<div class="col-sm-7 ">
					<select class="form-control "  name="game_status"  id="game_status">
				<option value="">==不限==</option>
								<option value='1' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='1')) { ?> selected="selected" <?php } ?>            >可售</option>
				<option value='2' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='2')) { ?> selected="selected" <?php } ?>            >不可售</option>
				<option value='3' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='3')) { ?> selected="selected" <?php } ?>            >可借</option>
				<option value='4' <?php if(isset($data_info['game_status'])&&($data_info['game_status']=='4')) { ?> selected="selected" <?php } ?>            >不可借</option>
</select>
				</div>
			</div>
<button type="submit" name="dosubmit" value="搜索" class="btn btn-success"><i class='glyphicon glyphicon-search'></i></button>        </form>
        </div>
      </div> 
    </div>
          <form method="post" id="form_list"  action="<?php echo base_url('adminpanel/game/delete_all')?>"  > 
    <div class='panel-body '>
    <?php if($data_list):?>
        <table class="table table-hover dataTable" id="checkAll">
          <thead>
            <tr>
              <th>#</th>
                            <?php $css=""; $next_url = base_url('adminpanel/game?order=game_name&dir=desc'); ?>
              <?php if(($order=='game_name'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/game?order=game_name&dir=asc'); ?>
              <?php } elseif (($order=='game_name'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">游戏名称</th>
                            <?php $css=""; $next_url = base_url('adminpanel/game?order=game_players&dir=desc'); ?>
              <?php if(($order=='game_players'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/game?order=game_players&dir=asc'); ?>
              <?php } elseif (($order=='game_players'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">游戏人数</th>
                            <?php $css=""; $next_url = base_url('adminpanel/game?order=game_language&dir=desc'); ?>
              <?php if(($order=='game_language'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/game?order=game_language&dir=asc'); ?>
              <?php } elseif (($order=='game_language'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">游戏语言</th>
              <th   nowrap="nowrap">游戏官网</th>
              <th   nowrap="nowrap">游戏厂商</th>
                            <?php $css=""; $next_url = base_url('adminpanel/game?order=game_sale_time&dir=desc'); ?>
              <?php if(($order=='game_sale_time'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/game?order=game_sale_time&dir=asc'); ?>
              <?php } elseif (($order=='game_sale_time'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">游戏上市日期</th>
                            <?php $css=""; $next_url = base_url('adminpanel/game?order=game_arrival_time&dir=desc'); ?>
              <?php if(($order=='game_arrival_time'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/game?order=game_arrival_time&dir=asc'); ?>
              <?php } elseif (($order=='game_arrival_time'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">游戏到货日期</th>
                            <?php $css=""; $next_url = base_url('adminpanel/game?order=game_record_time&dir=desc'); ?>
              <?php if(($order=='game_record_time'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/game?order=game_record_time&dir=asc'); ?>
              <?php } elseif (($order=='game_record_time'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">游戏录入时间</th>
                            <?php $css=""; $next_url = base_url('adminpanel/game?order=game_status&dir=desc'); ?>
              <?php if(($order=='game_status'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/game?order=game_status&dir=asc'); ?>
              <?php } elseif (($order=='game_status'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">游戏状态</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><input type="checkbox" name="pid[]" value="<?php echo $v['game_id']?>" /></td>
                             <td><?php echo $v['game_name']?></td>
                            <td><?php echo $v['game_players']?></td>
                            <td><?php echo $v['game_language']?></td>
                            <td><?php echo $v['game_url']?></td>
                            <td><?php echo $v['game_merchant']?></td>
                            <td><?php echo $v['game_sale_time']?></td>
                            <td><?php echo $v['game_arrival_time']?></td>
                            <td><?php echo $v['game_record_time']?></td>
                            <td><?php echo $v['game_status']?></td>
              <td>
                            	<a href="<?php echo base_url('adminpanel/game/readonly/'.$v['game_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                                            <a href="<?php echo base_url('adminpanel/game/edit/'.$v['game_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                                            <button type="button" class="btn btn-default btn-xs delete-btn" value="<?php echo $v['game_id'];?>"><span class="glyphicon glyphicon-remove"></span> 删除</button>
                
              </td>
            </tr>
            <?php endforeach;?>
            
          </tbody>
        </table> 
    	</div>
      <div class="panel-footer">
        <div class="pull-left">
          <div class="btn-group">
                  <button type="button" class="btn btn-default" id="reverseBtn"><span class="glyphicon glyphicon-ok"></span> 反选</button>
            <button type="button" id="deleteBtn"  class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
                 </div>
      </div>
        <div class="pull-right">
        <?php echo $pages;?>
        </div>
      </div> 
      </form>  
  </div>
<?php else:?>
    <div class="no-result">-- 暂无数据 -- </div>
<?php endif;?>

	    <script language="javascript" type="text/javascript">
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/adminpanel/game/lists.js']);
    });
</script>
    