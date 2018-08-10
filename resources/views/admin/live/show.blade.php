@extends("admin.common")
@section("title")生成推流地址和拉流地址@endsection
@section("content")
<article class="page-container">
    <table class="table table-border table-bordered table-striped">
        <thead>
            <tr class="text-c">
                <th width="150">直播课程名称</th>
                <th>{{ $liveInfo->course_name }}</th>
            </tr>
            <tr class="text-c">
                <th width="100">所属专业</th>
                <th>{{ $liveInfo->profession->profession_name }}</th>
            </tr>
            <tr class="text-c">
                <th width="100">直播时间</th>
                <th>开始时间：{{ $liveInfo->start_at }}<br>
                    结束时间：{{ $liveInfo->end_at }}
                </th>
            </tr>
            <tr class="text-c">
                <th width="100">推流地址</th>
                <th>123456489</th>
            </tr>
            <tr class="text-c">
                <th width="100">播放地址</th>
                <th>12345689</th>
            </tr>   
            <tr class="text-c">
                <th width="100">通知主讲老师</th>
                <th>
                    <span class="btn btn-primary radius send_email">发送邮件通知</span>
                    <span class="btn btn-primary radius send_sms">发送短信通知</span>
                </th>
            </tr>                      
        </thead>
        <tbody>
        </tbody>
    </table>
</article>
@endsection

@section("footer-js")
<script>
    $(".send_email").on("click", function(){
        $.get("/api/Admin/live/email",function(msg){
            console.log(msg);
        },"json");
    });

    $(".send_sms").on("click", function(){
        $.get("/api/Admin/live/sms",function(msg){
            console.log(msg);
        },"json");
    });
</script>
@endsection