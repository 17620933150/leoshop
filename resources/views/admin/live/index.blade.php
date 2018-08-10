@extends("admin.common")
@section("title")课程列表@endsection
@section("content")
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 直播课程 <span class="c-gray en">&gt;</span> 课程列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入课程名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜课程</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="livee_add('添加课程','{{ url("admin/live/create") }}','1100','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加课程</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg" id="table">
		<thead>
			<tr>
				<th scope="col" colspan="10">课程列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">课程名称</th>
				<th width="100">所属专业</th>
				<th width="100">直播流</th>
				<th width="90">封面</th>
				<th width="150">排序</th>
				<th width="130">加入时间</th>
				<th width="100">编辑时间</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
@endsection

@section("footer-js")
<!--请在下方写此页面业务相关的脚本-->
<script src="{{ asset("backend") }}/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script src="{{ asset("backend") }}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script src="{{ asset("backend") }}/lib/laypage/1.2/laypage.js"></script>
<script>
	// 在当前页面使用datatables插件显示列表数据
	$(function(){
		$("#table").DataTable({
			// paging: false,  // 设置关闭分页功能,false表示关闭
			lengthMenu: [ [2, 3,-1], [2,3,"全部"] ],  // 设置显示数据的数量
			info: true,        // 设置是否开启分页辅助信息功能
			searching: true,   // 设置是否开启搜索数据的功能
			ordering: true,     // 设置是否允许字段进行正序、倒序的功能
			order: [[ 1, "asc" ]],           // 设置默认以哪个字段进行排序排序
			columnDefs: [{   // 设置哪些字段可以进行点击排序
			   targets: [0,3,-1],
			   orderable: false
			}],
			stateSave: true,   // 是否保存当前列表数据的实现效果
			serverSide: false, // True，每次操作都从后端获取数据，False表示页面一开始就获取全部后端数据
			ajax: {
			    "url": "{{ url("api/Admin/live/ajax_list") }}",
			    "type": "GET",
			    // 'headers': { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
			},
			// 接收后端响应的数据，并且控制输出到表格里面
			columns: [
			    {'data':'a',"defaultContent": "",'className':'text-c'},
			    {'data':'id',"defaultContent": "",'className':'text-c'},
			    {'data':'course_name',"defaultContent": "",'className':'text-c'},
			    {'data':'profession.profession_name',"defaultContent": "",'className':'text-c'},
			    {'data':'stream.stream_name',"defaultContent": "",'className':'text-c'},
			    {'data':'cover',"defaultContent": "",'className':'text-c'},
			    {'data':'sort',"defaultContent": "",'className':'text-c'},
			    {'data':'created_at',"defaultContent": "",'className':'text-c'},
				{'data':'updated_at',"defaultContent": "",'className':'text-c'},
				{'data':'b',"defaultContent": "",'className':'text-c'},
			],
			createdRow: function(row, data, dataIndex){
				// console.log(row);
				$(row).children().eq(0).html('<input type="checkbox" value="'+data.id+'" name="">');
				$(row).children().eq(-1).html('<a title="编辑" href="javascript:;" onclick="live_edit(\'课程编辑\',\'admin-add.html\',\''+data.id+'\',\'800\',\'500\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="livee_del(this,\''+data.id+'\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>');
				
				if(data.stream){
					$(row).children().eq(4).html('<span data-id="'+data.id+'" class="btn btn-primary radius generate_url">'+(data.stream.stream_name)+'</span>');
				}

				if(data.cover){
					$(row).children().eq(5).html('<img height="50" src="'+data.cover+'" alt="" />');
				}else{
					$(row).children().eq(5).html("");
				}

			}
		});
	});

	// 点击弹出生成推流地址的页面窗口
	$(document).on("click",".generate_url", function(){
		var course_id = $(this).data("id")
		layer_show("生成推流/拉流地址","/Admin/live/"+course_id,800,500);
	});
	/*
		参数解释：
		title	标题
		url		请求的url
		id		需要操作的数据id
		w		弹出层宽度（缺省调默认值）
		h		弹出层高度（缺省调默认值）
	*/
	/*课程-增加*/
	function livee_add(title,url,w,h){
		
		// layer.msg("删除成功！",{"icon": 6, "time": 3000}, function(){
		// 	alert("回调函数");
		// });
		
		// layer.alert("缺少重要参数！添加失败！",{"icon":2,  closeBtn:0});
		
		// layer.confirm("您确认要删除这些数据吗？",{"icon":0,btn:["删除","不删"]},function(){
		// 	alert("您点击了删除");
		// }, function(){
		// 	alert("您点击了不删");
		// });
		
		layer_show(title,url,w,h);
		// layer.open({
		// 	type: 2,  // 样式版本
		// 	area: [w+'px', h +'px'], // 窗口宽高[像素]
		// 	fix: true, //设置窗口是否固定
		// 	maxmin: true, // 是否允许最大化和最小化
		// 	shade:0.6,    // 背景透明度
		// 	title: title, // 窗口标题，没有标题则设置值为 false 
		// 	content: url  // 窗口内容，可以使用url链接，也可以直接是html/文本内容
		// });
	}
	/*课程-删除*/
	function livee_del(obj,id){
		layer.confirm('确认要删除吗？',function(index){
			$.ajax({
				type: 'POST',
				url: '/Admin/live/'+id,
				dataType: 'json',
				// post要发送给后端数据，通过data来指定
				data: {
					"_method": "delete",
					"_token": "{{ csrf_token() }}",
				},
				success: function(data){
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				},
				error:function(data) {
					console.log(data.msg);
				},
			});
		});
	}

	/*课程-编辑*/
	function live_edit(title,url,id,w,h){
		url = "/admin/live/"+id+"/edit";
		layer_show(title,url,w,h);
	}
</script>
@endsection
