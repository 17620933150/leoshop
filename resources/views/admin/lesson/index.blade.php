@extends('admin.common')
@section('title')点播课时 - 课时列表@endsection
@section('content')

<style>
    .video_box{
        max-width: 90%;
        max-height: 90%;

        /* 设置当前标签相对于页面绝对居中 */
        display: block;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
</style>

    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 课时管理 <span
                class="c-gray en">&gt;</span> 课时列表 <a class="btn btn-success radius r"
                                                       style="line-height:1.6em;margin-top:3px"
                                                       href="javascript:location.replace(location.href);" title="刷新"><i
                    class="Hui-iconfont">&#xe68f;</i></a></nav>
    <div class="page-container">
        <div class="text-c"> 日期范围：
            <input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin"
                   class="input-text Wdate" style="width:120px;">
            <input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })"
                   id="datemax" class="input-text Wdate" style="width:120px;">
            <input type="text" class="input-text" style="width:250px" placeholder="输入课时名称" id="" name="">
            <button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户
            </button>
        </div>
        <div class="cl pd-5 bg-1 bk-gray mt-20"><span class="l"><a href="javascript:;" onclick="datadel()"
                                                                   class="btn btn-danger radius"><i
                            class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;"
                                                                          onclick="lesson_add('添加课时','{{ url('Admin/lesson/create') }}','800','500')"
                                                                          class="btn btn-primary radius"><i
                            class="Hui-iconfont">&#xe600;</i> 添加课时</a></span> <span class="r">共有数据：<strong>54</strong> 条</span>
        </div>
        <table class="table table-border table-bordered table-bg" id="table">
            <thead>
            <tr>
                <th scope="col" colspan="9">员工列表</th>
            </tr>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">ID</th>
                <th width="150">课时名称</th>
                <th width="100">所属专业</th>
                <th width="90">封面</th>
                <th width="90">视频</th>
                <th width="130">创建时间</th>
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
                    url: "{{ url("api/Admin/lesson/ajax_list") }}",
                    type: "GET",
                    {{--headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },--}}
                },
                // 接收后端响应的数据，并且控制输出到表格里面
                columns: [
                    {'data':'a',"defaultContent": "",'className':'text-c'},
                    {'data':'id',"defaultContent": "",'className':'text-c'},
                    {'data':'lesson_name',"defaultContent": "",'className':'text-c'},
                    {'data':'course.course_name',"defaultContent": "",'className':'text-c'},
                    {'data':'cover',"defaultContent": "",'className':'text-c'},
                    {'data':'video_address',"defaultContent": "",'className':'text-c'},
                    {'data':'created_at',"defaultContent": "",'className':'text-c'},
                    {'data':'b',"defaultContent": "",'className':'text-c'},
                ],
                createdRow: function(row, data, dataIndex){
                    // console.log(row);
                    $(row).children().eq(0).html('<input type="checkbox" value="'+data.id+'" name="">');
                    $(row).children().eq(-1).html('<a title="编辑" href="javascript:;" onclick="lesson_edit(\'专业编辑\',\'admin-add.html\',\''+data.id+'\',\'800\',\'500\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="lesson_del(this,\''+data.id+'\')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>');
                    
                    if(data.cover){
                        $(row).children().eq(4).html('<img height="50" src="'+data.cover+'" alt="" />');
                    }else{
                        $(row).children().eq(4).html("");
                    }

                    if(data.video_address){
                    $(row).children().eq(5).html('<span class="btn btn-primary player" preload="auto" data-title="'+data.lesson_name+'" data-url="'+data.video_address+'">播放</span>');
                    }
                }
            });
        });

        // 播放视频
        $(document).on('click',".player",function(){
            lesson_name = $(this).data("title");
            url = $(this).data("url");
            layer.open({
                    type: 1,
                    area: ['700px', '400px'], // 窗口宽高[像素]
                    fix: true, //设置窗口是否固定
                    maxmin: true, // 是否允许最大化和最小化
                    shade:0.6,    // 背景透明度
                    title: "《"+lesson_name+"》的视频", // 窗口标题，没有标题则设置值为 false 
                    content: '<video class="video_box" autoplay="autoplay" controls src="'+url+'"></video>'
            });
        })


        /*
            参数解释：
            title	标题
            url		请求的url
            id		需要操作的数据id
            w		弹出层宽度（缺省调默认值）
            h		弹出层高度（缺省调默认值）
        */
        /*课时-增加*/
        function lesson_add(title, url, w, h) {
            layer_show(title, url, w, h);
        }

        /*课时-删除*/
        function lesson_del(obj, id) {
            layer.confirm('确认要删除吗？', function (index) {
                $.ajax({
                    type: 'POST',
                    url: '/Admin/lesson/'+id,
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

        /*课时-编辑*/
        function lesson_edit(title, url, id, w, h) {
            url = "/Admin/lesson/"+id+"/edit";
            layer_show(title, url, w, h);
        }

        /*课时-停用*/
        function lesson_stop(obj, id) {
            layer.confirm('确认要停用吗？', function (index) {
                //此处请求后台程序，下方是成功后的前台处理……

                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="lesson_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
                $(obj).remove();
                layer.msg('已停用!', {icon: 5, time: 1000});
            });
        }

        /*课时-启用*/
        function lesson_start(obj, id) {
            layer.confirm('确认要启用吗？', function (index) {
                //此处请求后台程序，下方是成功后的前台处理……


                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="lesson_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!', {icon: 6, time: 1000});
            });
        }
    </script>
@endsection
