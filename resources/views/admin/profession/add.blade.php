@extends("admin.common")
@section("title")添加专业@endsection
@section("content")
	<link rel="stylesheet" href="{{ asset('backend')}}/lib/webuploader/0.1.5/webuploader.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend')}}/lib/zyupload/control/css/zyUpload.css">
<article class="page-container">
	<form action="{{ url('Admin/profession') }}" method="post" class="form form-horizontal" id="form-add-profession">
		{{ csrf_field() }}
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>专业名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" name="profession_name" id="profession">
			</div>
		</div>

		<div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>所属学科：</label>
	      <div class="formControls col-xs-4 col-sm-6">
	        <span class="select-box">
	          <select class="select" name="subject_id" id="subject_id">
	            @foreach($subjectList as $subject)
	            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
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
	      <label class="form-label col-xs-4 col-sm-3">专业简介：</label>
	      <div class="formControls col-xs-8 col-sm-6">
	        <textarea name="profession_desc" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true"></textarea>
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
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>专业时长(单位：小时)：</label>
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
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>轮播图：</label>
	      <div class="formControls col-xs-4 col-sm-6">
		        <div id="banner-list">
		        </div>{{-- 轮播图的地址 --}}
	        <div id="zyupload-box"></div>{{-- 轮播图上传框 --}}
	      </div>
	    </div>
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否推荐专业：</label>
	      <div class="formControls col-xs-8 col-sm-9 skin-minimal">
	        <div class="radio-box">
	          <input name="is_recommend" type="radio" value="1" id="recommend-1" checked>
	          <label for="recommend-1">是</label>
	        </div>
	        <div class="radio-box">
	          <input type="radio" id="recommend-2" value="0" name="is_recommend">
	          <label for="recommend-2">否</label>
	        </div>
	      </div>
	    </div>
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否精品专业：</label>
	      <div class="formControls col-xs-8 col-sm-9 skin-minimal">
	        <div class="radio-box">
	          <input name="is_best" type="radio" value="1" id="best-1" checked>
	          <label for="best-1">是</label>
	        </div>
	        <div class="radio-box">
	          <input type="radio" id="best-2" value="0" name="is_best">
	          <label for="best-2">否</label>
	        </div>
	      </div>
	    </div>
	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否热门专业：</label>
	      <div class="formControls col-xs-8 col-sm-9 skin-minimal">
	        <div class="radio-box">
	          <input name="is_hot" type="radio" value="1" id="hot-1" checked>
	          <label for="hot-1">是</label>
	        </div>
	        <div class="radio-box">
	          <input type="radio" id="hot-2" value="0" name="is_hot">
	          <label for="best-2">否</label>
	        </div>
	      </div>
	    </div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>排序：</label>
			<div class="formControls col-xs-3 col-sm-3">
				<input type="text" class="input-text" placeholder="" name="sort" id="sort">
			</div>
		</div>

	    <div class="row cl">
	      <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>专业详情：</label>
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
<!-- zyuploader插件多图片(文件)上传 -->
<script charset="utf-8" src="{{ asset('backend') }}/lib/zyupload/core/zyFile.js"></script>
<script charset="utf-8" src="{{ asset('backend') }}/lib/zyupload/control/js/zyUpload.js"></script>
<script type="text/javascript">
$(function(){

	//zyupload多图片上传
	csrf_token = '{{ csrf_token() }}';
	$("#zyupload-box").zyUpload({
		width            :   "500px",                 // 宽度
		height           :   "auto",                  // 宽度
		itemWidth        :   "80px",                 // 文件项的宽度
		itemHeight       :   "60px",                 // 文件项的高度
		url              :   "{{ url("Admin/upload") }}",  // 上传文件的路径
		multiple         :   true,                    // 是否可以多个文件上传
		dragDrop         :   true,                    // 是否可以拖动上传文件
		del              :   true,                    // 是否可以删除文件
		finishDel        :   false,  				  // 是否在上传文件完成后删除预览
	});

	//配置zyupload插件的文件上传成功以后的功能
	ZYFILE.onSubject = function(file,responseInfo) {
		responseInfo = JSON.parse(responseInfo);
		if (responseInfo.status) {
			//上传文件成功以后,打钩效果
			$("#uploadProgress_" + file.index).hide();
			$("#uploadSuccess" + file.index).show();
			//上传文件的地址
			console.log(responseInfo.data);
			$("#banner-list").append('<input type="hidden" id="zyUpload_index_'+file.index+'" name="banner[]" value="'+responseInfo.data+'"/>');
		}else{
			//如果图片上传不成功,那么移除当前图片
			$("#uploadList_"+file.index).fadeOut();
			//重新设置统计栏信息
			self.funSetStatusInfo(files);
		}
	}

	//点击删除指定图片
	ZYFILE.onDelete = function(file,files) {
		//删除指定的id对应的隐藏域
		$("#banner-list").find("#zyUpload_index_"+file.index).remove();
		//移除效果
		$("#uploadList_" + file.index).fadeOut();
		//重新设置统计栏信息
		self.funSetStatusInfo(files);
	}

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
	$("#form-add-profession").validate({
		// validate中的验证规则有哪些？可以查看validate-methods.js
		//rules 设置校验规则，值是json对象
		rules:{
			profession:{  // 每一个文本框的id
				required:true,  // 设置当前输入框为必填字段
				// minlength:6,    // 设置当前输入框的长度最小是6
				// maxlength:16    // 设置当前输入框的长度最大是16
			},
			sort:{
				required:true,
				// minlength:6,
				// maxlength:16,
				// equalTo: "#profession" // 设置当前输入框的值必须和指定id的输入框的值一致
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