	define(function (require) {
	    var $ = require('jquery');
	    var aci = require('aci');
	    require('bootstrap');
	    require('bootstrapValidator');

		$(function () {
			$("#reverseBtn").click(function(){
				aci.ReverseChecked('pid[]')
			});

			$("#deleteBtn").click(function(){
				var _arr = aci.GetCheckboxValue("pid[]");
				if(_arr.length==0)
				{
					alert("请先勾选明细");
					return false;
				}
				if(confirm('确定要删除吗?'))
				{
					$("#form_list").submit();
				}
			});
        
			 $(".delete-btn").click(function(){
				var v = $(this).val();
				if(confirm('确定要删除吗?'))
				{
					window.location.href= SITE_URL+ "adminpanel/game/delete_one/"+v;
				}
			});
            
		$(".datepicker").datepicker();
            $('#validateform').bootstrapValidator({
				message: '输入框不能为空',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					 game_name: {
						 validators: {
							notEmpty: {
								message: '游戏名称不符合要求'
							}
						 }
					 },
					 game_desc: {
						 validators: {
							notEmpty: {
								message: '游戏介绍不符合要求'
							}
						 }
					 },
					 game_players: {
						 validators: {
							notEmpty: {
								message: '游戏人数不符合要求'
							}
						 }
					 },
					 game_style: {
						 validators: {
							notEmpty: {
								message: '游戏风格不符合要求'
							}
						 }
					 },
					 game_language: {
						 validators: {
							notEmpty: {
								message: '游戏语言不符合要求'
							}
						 }
					 },
					 game_url: {
						 validators: {
							notEmpty: {
								message: '游戏官网不符合要求'
							}
						 }
					 },
					 game_merchant: {
						 validators: {
							notEmpty: {
								message: '游戏厂商不符合要求'
							}
						 }
					 },
					 game_sale_time: {
						 validators: {
							notEmpty: {
								message: '游戏上市日期不符合要求'
							}
						 }
					 },
					 game_arrival_time: {
						 validators: {
							notEmpty: {
								message: '游戏到货日期不符合要求'
							}
						 }
					 },
					 game_record_time: {
						 validators: {
							notEmpty: {
								message: '游戏录入时间不符合要求'
							}
						 }
					 },
					 game_status: {
						 validators: {
							notEmpty: {
								message: '游戏状态不符合要求'
							}
						 }
					 },
				}
			}).on('success.form.bv', function(e) {
				
				e.preventDefault();
				$("#dosubmit").attr("disabled","disabled");
				
				$.scojs_message("正在保存，请稍等...", $.scojs_message.TYPE_ERROR);
				$.ajax({
					type: "POST",
					url: edit?SITE_URL+"adminpanel/game/edit/"+id:SITE_URL+"adminpanel/game/add/",
					data:  $("#validateform").serialize(),
					success:function(response){
						var dataObj=jQuery.parseJSON(response);
						if(dataObj.status)
						{
							$.scojs_message('操作成功,3秒后将返回列表页...', $.scojs_message.TYPE_OK);
							aci.GoUrl(SITE_URL+'adminpanel/game/',1);
						}else
						{
							$.scojs_message(dataObj.tips, $.scojs_message.TYPE_ERROR);
							$("#dosubmit").removeAttr("disabled");
						}
					},
					error: function (request, status, error) {
						$.scojs_message(request.responseText, $.scojs_message.TYPE_ERROR);
						$("#dosubmit").removeAttr("disabled");
					}                  
				});
			
			}).on('error.form.bv',function(e){ $.scojs_message('带*号不能为空', $.scojs_message.TYPE_ERROR);$("#dosubmit").removeAttr("disabled");});
            
        });
});
