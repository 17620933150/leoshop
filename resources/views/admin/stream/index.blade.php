@extends('admin.common')
@section('title')直播管理 - 直播流列表@endsection
@section('content')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 直播管理 <span
                class="c-gray en">&gt;</span> 直播流列表 <a class="btn btn-success radius r"
                                                       style="line-height:1.6em;margin-top:3px"
                                                       href="javascript:location.replace(location.href);" title="刷新"><i
                    class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin"
                   class="input-text Wdate" style="width:120px;">
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })"
                   id="datemax" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入流名称" id="" name="">
            <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户
            </button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()"
                                                                   class="btn btn-danger radius"><i
                            class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;"
                                                                          onclick="stream_add('添加直播流','{{ url('Admin/stream/create') }}','800','500')"
                                                                          class="btn btn-primary radius"><i
                            class="Hui-iconfont">&#xe600;</i> 添加直播流</a></span> <span class="r">共有数据：<strong>54</strong> 条</span>
        </div>
        <table class="table table-border table-bordered table-bg" id="table">
            <thead>
            <tr>
                <th scope="col" colspan="9">员工列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">ID</th>
                <th width="150">流名称</th>
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
@section('footer-js')

    <!--请在下方写此页面业务相关的脚本-->
    <script type="text/javascript" src="{{ asset('backend') }}/lib/My97DatePicker/4.8/WdatePicker.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{ asset('backend') }}/lib/laypage/1.2/laypage.js"></script>
    <script type="text/javascript">
        //DataTables插件初始化
        $(function () {
            $('#table').DataTable({
                //设置没一页显示的数据量
                lengthMenu: [[2, 4, -1], ['二', '四', '全部']],
                //是否开启分页功能
                paging: true,
                //是否开启显示分页辅助信息
                info: true,
                //是否开始检索功能
                searching: true,
                //是否开启字段排序
                ordering: true,
                //设置默认排序的表格列
                order: [1, 'asc'],
                //是否要保存当前表格的状态
                stateSave: true,
                //设置不需要使用的字段排序功能的表格列
                columnDefs: [{
                    targets: [0, -1,-2,-3],
                    orderable: false
                }],

                ServerSide:false,//一次性访问所有数据
                //使用ajax获取服务器的数据
                ajax: {
                    url: "{{ url("api/Admin/stream/ajax_list") }}",
                    type: "GET",
                    {{--headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },--}}
                },
                // 接收后端响应的数据，并且控制输出到表格里面
                columns: [
                    {'data':'a',"defaultContent": "",'className':'text-c'},
                    {'data':'id',"defaultContent": "",'className':'text-c'},
                    {'data':'stream_name',"defaultContent": "",'className':'text-c'},
                    {'data':'created_at',"defaultContent": "",'className':'text-c'},
                    {'data':'updated_at',"defaultContent": "",'className':'text-c'},
                    {'data':'b',"defaultContent": "",'className':'text-c'},
                ],
                createdRow: function(row, data, dataIndex){
                    // console.log(row);
                    $(row).children().eq(0).html('<input type="checkbox" value="'+data.id+'" name="">');
                    $(row).children().eq(-1).html('<a title="编辑" href="javascript:;" onclick="stream_edit(\'直播流编辑\',\'admin-add.html\',\''+data.id+'\',\'800\',\'500\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="stream_del(this,\''+data.id+'\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>');
                    
                    if(data.logo){
                        $(row).children().eq(3).html('<img height="50" src="'+data.logo+'" alt="" />');
                    }else{
                        $(row).children().eq(3).html("");
                    }
            }
            });
        });
        /*
            参数解释：
            title	标题
            url		请求的url
            id		需要操作的数据id
            w		弹出层宽度（缺省调默认值）
            h		弹出层高度（缺省调默认值）
        */
        /*直播流-增加*/
        function stream_add(title, url, w, h) {
            layer_show(title, url, w, h);
        }

        /*直播流-删除*/
        function stream_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'POST',
                    url: '/Admin/stream/'+id,
                    dataType: 'json',
                    //post要发送给后台数据 ,需要通过data来请求
                    data: {
                        "_method": "delete",
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!', {icon: 1, time: 1000});
                    },

                });
            });
        }

        /*直播流-编辑*/
        function stream_edit(title, url, id, w, h) {
            url = "/Admin/stream/"+id+"/edit";
            layer_show(title, url, w, h);
        }

        /*直播流-停用*/
        function stream_stop(obj, id) {
            layer.confirm('确认要停用吗？', function (index) {
                //此处请求后台程序，下方是成功后的前台处理……

                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="stream_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
                $(obj).remove();
                layer.msg('已停用!', {icon: 5, time: 1000});
            });
        }

        /*直播流-启用*/
        function stream_start(obj, id) {
            layer.confirm('确认要启用吗？', function (index) {
                //此处请求后台程序，下方是成功后的前台处理……


                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="stream_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!', {icon: 6, time: 1000});
            });
        }
    </script>
@endsection
