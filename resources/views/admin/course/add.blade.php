@extends("admin.common")
@section("title")添加课程@endsection
@section("content")
	<link rel="stylesheet" href="{{ asset('backend')}}/lib/webuploader/0.1.5/webuploader.css">
<article class="page-container">
	<form action="{{ url('Admin/course') }}" method="post" class="form form-horizontal" id="form-add-course">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="course_name" id="course">
			</div>
		</div>

		<div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属专业：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <span class="select-box">
	          <select class="select" name="profession_id" id="profession_id">
	            @foreach($professionList as $profession)
	            <option value="{{ $profession->id }}">{{ $profession->profession_name }}</option>
	            @endforeach
	          </select>
	        </span>
	      </div>
	    </div>
		<!-- 授课老师
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>授课老师: </label>
			<div class="formControls col-xs-8 col-sm-6">
				<input type="text" class="input-text" placeholder="" name="teacher_ids" id="teacher_ids">
			</div>
		</div> -->

		 <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3">课程简介：</label>
	      <div class="formControls col-xs-8 col-sm-6">
	        <textarea name="course_desc" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true"></textarea>
	        <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
	      </div>
	    </div>   
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>价格：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <input type="text" class="input-text" name="price" id="price">
	      </div>
	    </div>
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>优惠价：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <input type="text" class="input-text" name="sale_price" id="sale_price" placeholder="实际价格=价格-优惠">
	      </div>
	    </div>
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程时长(单位：小时)：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <input type="text" class="input-text" name="duration" id="duration">
	      </div>
	    </div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>封面: </label>
			<div class="formControls col-xs-3 col-sm-3">
				<div id="baidu-webuploader-preview" style="margin-bottom: 6px;"></div>
				<div id="baidu-webuploader">选择图片</div>
				<span id="uploader" class="btn btn-primarv radius">开始上传</span>
				<input type="hidden" name="cover">
				<!-- 上传进度条 -->
				<div id="processing">
					<div class="progress" style="width: 400px">
						<span class="progress-bar">
							<span class="sr-only" style="width: 0%"></span>
						</span>
					</div>
					<span id="progress-num">0%</span>
				</div>
			</div>
		</div>

		<div class="row cl">
	     <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>有效时间(单位：天)：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <input type="text" class="input-text" name="expire_at" id="expire_at">
	      </div>
	    </div>
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>点击量：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <input type="text" class="input-text" name="click" id="click">
	      </div>
	    </div>    
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>学习人数：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <input type="text" class="input-text" name="number" id="number">
	      </div>
	    </div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
			<div class="formControls col-xs-3 col-sm-3">
				<input type="text" class="input-text" placeholder="" name="sort" id="sort">
			</div>
		</div>

	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>课程详情：</label>
	      <div class="formControls col-xs-8 col-sm-6">
	        <textarea name="content" id="ueditor-content" dragonfly="true"></textarea>
	        <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
	      </div>
	    </div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>
@endsection


@section("footer-js")
<!--请在下方写此页面业务相关的脚本-->
<script src="{{ asset('backend') }}/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script src="{{ asset('backend') }}/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script src="{{ asset('backend') }}/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script src="{{ asset('backend') }}/lib/webuploader/0.1.5/webuploader.min.js"> </script>
<!-- 富文本js -->
<script charset="utf-8" src="{{ asset('backend') }}/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script charset="utf-8" src="{{ asset('backend') }}/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script charset="utf-8" src="{{ asset('backend') }}/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
$(function(){

	//富文本框配置(UMeditor)
	var ue = UE.getEditor('ueditor-content', {
	    toolbars: [
	        ['fullscreen', 'source', 'undo', 'redo', 'bold']
	    ],
	    autoHeightEnabled: true,
	    autoFloatEnabled: true
	});
    //百度webuploader初始化
    var uploader = WebUploader.create({
		auto: false,//设置是否自动上传文件,false表示不设置
        // 因为部分低版本浏览器并不支持HTML5的ajax文件上传,所以对于这部分浏览,可以设置告诉系统,使用swf来完成文件上传功能
        swf: "{{ asset('backend') }}/lib/webuploader/0.1.5/Uploader.swf",
		pick: '#baidu-webuploader',//设置选择图片的按钮,内部根据当前运行是创建，可能是input元素，也可能是flash.
        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false,
		//设置允许上传文件的类型
		accept: {
            title: "图片",
			extensions: 'jpg,jpeg,png',
		},
		// 文件接收服务端。
        server: "{{ url('Admin/upload')}}",
        //formData 本次ajax提交,附带数据,可以使用json声明
    	formData: {
    			// Laravel框架中上传文件使用post方法，所以必须提供scrf token令牌
		 	  	'_token': '{{ csrf_token() }}',
		}

    });
    //webuploader的上传进度条
    uploader.on('uploadProgress',function(file,percentage) {//percentage 表示上传的百分比进度
    	$('#processing .sr-only').css('width',percentage * 100 + '%');
    	$("#progress-num").html(percentage * 100 + '%');
    })
    //接收webuploader上传文件以后服务器返回的信息
    uploader.on('uploadSuccess',function(file,msg) {
    	$('#'+file.id).addClass('uploader-state-done');
    	//把服务器返回的图片地址保存到隐藏域
    	$('input[name=cover]').val(msg.data);
    })
    //关闭webuploader自动上传,设置为手动上传
    $('#uploader').click(function() {
    	//调用webupload插件 开始上传
    	uploader.upload();
    })
    //webuploader预览效果
    var preview = $('#baidu-webuploader-preview');
    uploader.on('fileQueued',function(file){
    		//缩略图
    		uploader.makeThumb(file,function(error,src) {
    			preview.empty();
    			if (error) {
    				layer.msg("不能预览图片");
    				return;
    			}
    			preview.html("<img src='"+src+"'/>'");
    		},100,100);
    })
	$("#form-add-course").validate({
		// validate中的验证规则有哪些？可以查看validate-methods.js
		//rules 设置校验规则，值是json对象
		rules:{
			course:{  // 每一个文本框的id
				required:true,  // 设置当前输入框为必填字段
				// minlength:6,    // 设置当前输入框的长度最小是6
				// maxlength:16    // 设置当前输入框的长度最大是16
			},
			sort:{
				required:true,
				// minlength:6,
				// maxlength:16,
				// equalTo: "#course" // 设置当前输入框的值必须和指定id的输入框的值一致
			},
		},
		onkeyup:false,      // 表单验证是否是在用户松开键盘的时候进行数据校验，false表示不是
		focusCleanup:true,  // 当焦点进入输入框中是否要清空原来内容[没效果]
		success:"valid",    // 当校验数据成功以后，当前输入框中要实现的样式类
		//submitHandler 当点击提交表单时，执行的会回调函数
		//一般我们在这个函数进行ajax提交数据
		submitHandler:function(form){
			$(form).ajaxSubmit(function(msg){
				if (msg.status) {
					//保存成功
					layer.msg(msg.message,{"icon":1,time:2000},function() {
						//刷新当前layer窗口的父级窗口
						parent.window.location.reload();
					});
				}else{
					//保存失败
					layer.alert("添加失败");
				}
			}); // h-ui集成的ajax表单提交功能
			// return false;
			// // 关闭当前layer的窗口
			// var index = parent.layer.getFrameIndex(window.name);
			// parent.$('.btn-refresh').click();
			// parent.layer.close(index);
		}
	});
});
</script>
@endsection