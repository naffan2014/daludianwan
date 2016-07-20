<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 游戏盘管理列表
        <div class='panel-tools'>
            <div class='btn-group'>
                 <a class="btn " href="<?php echo base_url('adminpanel/disc/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加 </a>             </div>
            <div class='badge'><?php echo count($data_list)?></div>
        </div>
    </div>
        <div class='panel-filter '>
      <div class='row'>
        <div class='col-md-12'>
        <form class="form-inline" role="form" method="get">
          
<div class="form-group">
<label for="keywords" class="form-control-static">光盘序号:</label>
<input class="form-control" size="3" type="number"  name="disc_no_1"  id="disc_nodisc_no1" placeholder="光盘序号大于等于范围"/> - <input class="form-control" size="3" type="number"  name="disc_no_2"  id="disc_nodisc_no2" placeholder="光盘序号小于等于范围"/></div>
<button type="submit" name="dosubmit" value="搜索" class="btn btn-success"><i class='glyphicon glyphicon-search'></i></button>        </form>
        </div>
      </div> 
    </div>
          <form method="post" id="form_list"  action="<?php echo base_url('adminpanel/disc/delete_all')?>"  > 
    <div class='panel-body '>
    <?php if($data_list):?>
        <table class="table table-hover dataTable" id="checkAll">
          <thead>
            <tr>
              <th>#</th>
                            <?php $css=""; $next_url = base_url('adminpanel/disc?order=disc_no&dir=desc'); ?>
              <?php if(($order=='disc_no'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/disc?order=disc_no&dir=asc'); ?>
              <?php } elseif (($order=='disc_no'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">光盘序号</th>
              <th   nowrap="nowrap">所属游戏</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><input type="checkbox" name="pid[]" value="<?php echo $v['disc_id']?>" /></td>
                             <td><?php echo $v['disc_no']?></td>
                            <td><?php echo $v['disc_game']?></td>
              <td>
                            	<a href="<?php echo base_url('adminpanel/disc/readonly/'.$v['disc_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                                            <a href="<?php echo base_url('adminpanel/disc/edit/'.$v['disc_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                                            <button type="button" class="btn btn-default btn-xs delete-btn" value="<?php echo $v['disc_id'];?>"><span class="glyphicon glyphicon-remove"></span> 删除</button>
                
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
        require(['<?php echo SITE_URL?>scripts/adminpanel/disc/lists.js']);
    });
</script>
    