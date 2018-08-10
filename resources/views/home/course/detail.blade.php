<!DOCTYPE html>
<!-- saved from url=(0067)http://www.boxuegu.com/web/html/CourseDetailZhiBo.html?courseId=151 -->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:bd="http://www.baidu.com/2010/xbdml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!--[if IE 9]>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9">
    <![endif]-->
		<meta http-equiv="X-UA-Compatible" content="IEedge">
		
		<title>Java高新技术 - 博学谷云课堂</title>
		<link rel="shortcut icon" href="http://www.boxuegu.com/favicon.ico">

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/ResetPassword.css">
		<link rel="stylesheet" href="css/mylogin.css">
		<link rel="stylesheet" href="css/componet.css">
		<link rel="stylesheet" href="css/header.css">

		<link rel="stylesheet" href="css/iconfont.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/modal.css">
		<link rel="stylesheet" href="css/myprofile.css">
		<link rel="stylesheet" href="css/CourseDetailZhiBo.css">
		<script src="js/hm.js"></script><script src="js/jquery-1.12.1.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/ajax.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/artTemplate.js"></script>
		<script src="js/jquery.pagination.js"></script>
		<script src="js/bootstrap.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.form.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/header.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/helpers.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/jquery.dotdotdot.js"></script>
		<script src="js/jquery.nicescroll.js"></script>
		<script type="text/javascript" src="js/modal.js"></script>
		<script src="js/mydata.js"></script>
		<script>
			var _hmt = _hmt || [];
			(function() {
				var hm = document.createElement("script");
				hm.src = "https://hm.baidu.com/hm.js?30ed673100bd4991fb9d20db9e374fb1";
				var s = document.getElementsByTagName("script")[0];
				s.parentNode.insertBefore(hm, s);
			})();
		</script>
	</head>

	<body>
		<div class="rrrTips"></div>
		<div class="personBack">
			<div class="personMess">
				<p class="title">职业课程报名信息填写</p>
				<div class="view-content-content">
					<div class="my-data-1">
						<div class="kecheng" style="display: block;padding: 0 20PX;">
							<p class="warn">1、职业课程需要填写报名信息，只需填写一次，适应于其他所有课程；<br>2、此信息不公开显示，只是为了方便老师通知课程信息，提供优质班级服务；<br>3、保存后，可以到<a href="javascript:;">个人中心-我的资料-课程报名信息</a>里查看或者修改信息。</p>
							<div class="cy-myprofile-myfom-dv-1" style="margin-bottom:12px">
								<div class="buer"><i class="red">*</i>真实姓名:</div>
								<input type="text" maxlength="7" class="truename ipt">
								<span class="true-warn warning">真实姓名不能为空</span>
							</div>
							<div class="cy-myprofile-myfom-dv-radio-zu">
								<div class="buer"><i class="red">*</i>性别:</div>
								<label><div class="radio-cover"><em class="active"></em></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="1" id="myradio1"><span>男</span></label>
								<label><div class="radio-cover"><em></em></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="0" id="myradio2"><span>女</span></label>
								<span class="sex-warn warning" style="display:none">请选择性别</span>
							</div>
							<div>
								<div class="buer"><i class="red">*</i>手机号:</div>
								<input type="text" maxlength="18" class="phonenumber ipt">
								<span class="phone-warn warning">手机号不得为空</span>
							</div>
							<div>
								<div class="buer"><i class="red">*</i>邮箱:</div>
								<input type="text" class="emailname ipt">
								<span class="email-warn warning">邮箱不得为空</span>
							</div>
							<div class="333">
								<div class="buer"><i class="red">*</i>QQ号:</div>
								<input type="text" maxlength="15" class="QQnumber ipt">
								<span class="QQ-warn warning">QQ不得为空</span>
							</div>

							<div class="111">
								<div class="bue"><i class="red">*</i>学历:</div>
								<span name="food2" class="rq-college"> 
		<p class="select-xiala" id="record">请选择</p> 
		<div class="xiala" id="recordxl" style="top:37px"> 

		</div> 
		</span>
								<span class="college-warn warning">请选择学历</span>
							</div>

							<div class="222">
								<div class="buer">毕业院校:</div>
								<div class="address-right">
									<div>
										<p id="rq_province" class="select-xiala">请选择</p>
										<div class="xiala yearxl" id="rqsxl">
										</div>
									</div>
									<div>
										<p id="rq_city" class="select-xiala">请选择</p>
										<div class="xiala monthxl" id="rqcxl">
										</div>
									</div>
									<div>
										<p id="rq_college" class="select-xiala">请选择</p>
										<div class="xiala dayxl" id="rqdxxl">
										</div>
									</div>
								</div>
							</div>

							<div class="a000">
								<div class="bue">专业:</div>
								<span name="food2" class="rq-college"> 
									<p class="select-xiala" id="major">请选择</p> 
									<div class="xiala" id="majorxl" style="top:37px"> 
									</div> 
								</span>
							</div>

							<div>
								<div class="buer"></div>
								<button class="btn1" id="save">保存</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		

		<div class="content">
			<div class="bread">
				<a href="http://www.boxuegu.com/index.html">云课堂</a><span class="glyphiconRight"> &gt; </span><i class="cur">Java高新技术</i></div>
			<div class="course-mess clearfix"><div class="mess-left"><p class="mess-title" data-courseid="151">Java高新技术</p></div><div class="mess-right clearfix"><div class="right1"><p>学习人数：<span>49</span></p></div><div class="right2"><p>课程时长：<span>14</span>小时</p></div><div class="right2"><p>课时长度：<span>5</span>课时</p></div></div></div>

			<div class="course-range clearfix">
				<div class="l1">
				</div>

			<div class="l2"><div class="blue" style="width:0px"><img src="img/icon-range.png" class="range"><img src="img/kc_detail_sanjiao.png" class="sanjiao"><div class="xuanfu"><span>0</span>/<span>5</span></div></div><p class="tip">人不能太懒，后有追兵，快加油往前冲吧~~</p></div><a class="l3 start" style="cursor:pointer" data-sectionid="8a9bdf305961f81f0159642d3bad0026" data-zhishidianid="8a9bdf305961f81f0159642d53c20027" data-videoid="33708403A60C937D9C33DC5901307461" data-vid="8a9bdf305961f81f0159670b44b00095">开始学习</a></div>

			<!-------课程详情目录------------>
			<div class="course-nav clearfix">
				<ul class="clearfix">
					<li class="jihua" style="display: none;">
						<a href="javascript:;">学习计划</a>
					</li>
					<li class="video active">
						<a href="javascript:;">视频</a>
					</li>
					<li class="notes">
						<a href="javascript:;">笔记</a>
					</li>
					<li class="wenda">
						<a href="javascript:;">问答</a>
					</li>
					<li class="info">
						<a href="javascript:;">课程资料</a>
					</li>
				</ul>
			</div>
			<!-------课程详情------------>
			<div class="course-main">
				<div class="main clearfix" style="display: block;">
					<div class="main-left"><ul class="allvideo"><li class="" data-id="8a9bdf305961f81f0159642ac1ff001b" title="概述"><a href="javascript:;">第1章  概述 </a><span><img src="img/kc_title_right.png"></span></li><li data-id="8a9bdf305961f81f0159642ae588001c" title="eclipse开发工具" class="active"><a href="javascript:;">第2章  eclipse开发工具 </a><span><img src="img/kc_title_right.png"></span></li></ul></div>
					<div class="main-right clearfix">
						<div class="main-video" style="display: block;">
							<div class="right-nav clearfix">
								<div class="sp"><i class="iconfont icon-shipin"></i>视频</div>
								<div class="gq"><i class="iconfont icon-shijuan"></i>关卡</div>
								<span class="nav0"><i class="iconfont icon-jiesuo"></i>已解锁</span>
								<span class="nav1"><i class="iconfont icon-weikaishi1"></i>未解锁</span>
								<span class="nav2"><i class="iconfont icon-xuexizhong"></i>学习中</span>
								<span class="nav3"><i class="iconfont icon-xiaowancheng"></i>已学完</span>
							</div>
							<div class="right-con"><div class="con1"><p class="con-title" data-id="8a9bdf305961f81f0159642d3bad0026">第1节  eclipse及IDE开发工具介绍</p><div class="kechengAll clearfix"><a href="javascript:;" data-sectionid="8a9bdf305961f81f0159642d3bad0026" data-zhishidianid="8a9bdf305961f81f0159642d53c20027" data-vid="8a9bdf305961f81f0159670b44b00095" data-videoid="33708403A60C937D9C33DC5901307461" class="kecheng"><span title="eclipse及IDE开发工具介绍"><i class="iconfont icon-shipin"></i><em class="index">1-</em>eclipse及IDE开发工具介绍</span><i class="iconfont icon-jiesuo tb pd" lock_status="1"></i></a></div></div><div class="con1"><p class="con-title" data-id="8a9bdf305961f81f0159642d8f3f0028">第2节  eclipse工程管理与快捷键配置</p><div class="kechengAll clearfix"><a href="javascript:;" data-sectionid="8a9bdf305961f81f0159642d8f3f0028" data-zhishidianid="8a9bdf305961f81f0159642da4ba0029" data-vid="8a9bdf305961f81f0159670bd1120096" data-videoid="3018AD38AA2715C49C33DC5901307461" class="kecheng"><span title="eclipse工程管理与快捷键配置"><i class="iconfont icon-shipin"></i><em class="index">1-</em>eclipse工程管理与快捷键配置</span><i class="iconfont icon-jiesuo tb pd" lock_status="1"></i></a></div></div><div class="con1"><p class="con-title" data-id="8a9bdf305961f81f0159642dc8da002a">第3节  eclipse视图管理与程序调试</p><div class="kechengAll clearfix"><a href="javascript:;" data-sectionid="8a9bdf305961f81f0159642dc8da002a" data-zhishidianid="8a9bdf305961f81f0159642dd4e9002b" data-vid="8a9bdf305961f81f0159670c0f3c0097" data-videoid="0D15196137EE917B9C33DC5901307461" class="kecheng"><span title="eclipse视图管理与程序调试"><i class="iconfont icon-shipin"></i><em class="index">1-</em>eclipse视图管理与程序调试</span><i class="iconfont icon-jiesuo tb pd" lock_status="1"></i></a></div></div><div class="con1"><p class="con-title" data-id="8a9bdf305961f81f0159642df850002c">第4节  配置eclispe的编译与运行环境</p><div class="kechengAll clearfix"><a href="javascript:;" data-sectionid="8a9bdf305961f81f0159642df850002c" data-zhishidianid="8a9bdf305961f81f0159642e02e9002d" data-vid="8a9bdf305961f81f0159670c9a600098" data-videoid="9E1579309685BFAB9C33DC5901307461" class="kecheng"><span title="配置eclispe的编译与运行环境"><i class="iconfont icon-shipin"></i><em class="index">1-</em>配置eclispe的编译与运行环境</span><i class="iconfont icon-jiesuo tb pd" lock_status="1"></i></a></div></div></div>
						</div>
						<div class="main-ppt" style="display: none;">
							<div class="right-ppt">
								<span class="act">PPT</span><i>|</i><span>教案</span>
							</div>
							<div class="right-con">
								<div class="con-wait">
									<img class="loadingImg" src="img/loading.gif" alt="">
									<p class="loadingWord">加载中</p>
								</div>
								<div class="page-no-result" style="display: block;">
									<img src="img/my_nodata.png">
									<div class="no-title">暂无数据</div>
								</div>
								<iframe id="frame" src="saved_resource.html" width="100%" height="600" frameborder="0"></iframe>
							</div>
						</div>
						<div class="main-note" style="display: none;">
							<div class="right-note">
								<span class="act">全部</span><i>|</i><span>我的笔记</span><i>|</i><span>我的收藏</span>
							</div>
							<div class="right-con"><div class="right-noteInfo clearfix"><div class="right-noteImg"><div class="img"><img src="img/defaultHeadImg.jpg"></div><p class="note-username" title="bxg_91128">bxg_91128</p></div><div class="right-noteContent"><p class="note-content dot5" data-noteid="7e545b959833410aa47da792af7eecdd" style="word-wrap: break-word;">增强for循环很好用.lambda表达式更好用</p><div class="right-note-others"><span class="noteTime">2017-01-12</span><span class="noteHitZan"><i class="iconfont icon-zan"></i><span class="praise_Count">0</span></span><span class="rightPinglun"><i class="iconfont icon-pinglun"></i><span class="comment_Count">0</span></span><span class="rightShoucang"><i class="iconfont icon-shoucang"></i><span class="shoucang">收藏</span></span></div><div class="pinglunBox"></div></div></div></div>
						</div>
						<div class="main-ask" style="display: none;">
							<div class="right-ask">
								<span class="act">全部</span><i>|</i><span class="">我提的问题</span>
							</div>
							<div class="right-con"><div class="page-no-result" style="display: block;"><img src="img/my_nodata.png"><div class="no-title">暂无数据</div></div></div>
						</div>
						<div class="pages" style="display: none">
							<div id="Pagination"></div>
							<div class="searchPage">
								<span class="page-sum">共<strong class="allPage">0</strong>页</span>
								<span class="page-go">跳转<input type="text" style="width: 37px;" min="1" max="">页</span>
								<a href="javascript:;" class="page-btn">确定</a>
							</div>
						</div>
					</div>
				</div>
				<div class="main1 clearfix" style="display: none;">
					<!-------左边日历------>
					<div class="calder clearfix">
						<div class="tool">
							<span class="calder-up"><i class="iconfont icon-left"></i></span>
							<p class="calder-data"><span class="year">2017</span>年<span class="month">1</span>月</p>
							<span class="calder-down"><i class="iconfont icon-left"></i></span>
						</div>
						<div class="data-show clearfix">
							<div style="width: 110%;" class="clearfix">
								<ol class="clearfix">
									<li week="0">日</li>
									<li week="1">一</li>
									<li week="2">二</li>
									<li week="3">三</li>
									<li week="4">四</li>
									<li week="5">五</li>
									<li week="6">六</li>
								</ol>
								<ul class="clearfix">
								</ul>
							</div>
						</div>
					</div>
					<!----------右边目录------------->
					<div class="myplan">
						<ol class="clearfix">
							<li><span class="td1">日期</span><span class="td2">星期</span><span class="td3">知识点</span></li>
						</ol>
						<ul class="">
							<!--<li ><span class="td1">2016-09-05</span><span class="td2">星期6</span>
								<div class="td3">
									<span>常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍</span>
									<a href="###"><i class="iconfont icon-zhibo"></i>
										<span>常用标签介绍常用标</span>
									</a>
								</div>
							</li>
							<li ><span class="td1">2016-09-05</span><span class="td2">星期6</span>
								<div class="td3">
									<span>常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍</span>
									<a href="###"><i class="iconfont icon-zhibo"></i>
										<span>常用标签介绍常用标</span>
									</a>
								</div>
							</li>
							<li ><span class="td1">2016-09-05</span><span class="td2">星期6</span>
								<div class="td3">
									<span>常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍</span>
									<a href="###"><i class="iconfont icon-zhibo"></i>
										<span>常用标签介绍常用标</span>
									</a>
								</div>
							</li>
							<li ><span class="td1">2016-09-05</span><span class="td2">星期6</span>
								<div class="td3">
									<span>常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍</span>
									<a href="###"><i class="iconfont icon-zhibo"></i>
										<span>常用标签介绍常用标</span>
									</a>
								</div>
							</li>
							<li ><span class="td1">2016-09-05</span><span class="td2">星期6</span>
								<div class="td3">
									<span>常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍</span>
									<a href="###"><i class="iconfont icon-zhibo"></i>
										<span>常用标签介绍常用标</span>
									</a>
								</div>
							</li>
							<li ><span class="td1">2016-09-05</span><span class="td2">星期6</span>
								<div class="td3">
									<span>常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍常用标签介绍</span>
									<a href="###"><i class="iconfont icon-zhibo"></i>
										<span>常用标签介绍常用标</span>
									</a>
								</div>
							</li>-->
						</ul>
					</div>
				</div>
			</div>
		</div>
	
	<script src="js/CourseDetailZhiBo.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/footer.js" type="text/javascript"></script><div class="footerDT"><footer><div class="content"><div class="content-item footer-bodys"><div class="content-item content-footer-link about-us"><ul class="gate"><li data-id="first" data-url="../html/aboutUs.html">关于我们<span>|</span></li><li data-id="two" data-url="../html/aboutUs.html">人才招聘<span>|</span></li><li data-id="three" data-url="../html/aboutUs.html">联系我们<span>|</span></li><li data-id="four" data-url="../html/aboutUs.html" class="noline">常见问题</li></ul></div><div class="trademark">京ICP备08001421号 京公网安备110108007702 Copyright @ 2016 博学谷 All Rights Reserved<span style="margin-right:5px;"></span><span id="cnzz_stat_icon_1260713417"><a href="http://www.cnzz.com/stat/website.php?web_id=1260713417" target="_blank" title="站长统计"><img border="0" hspace="0" vspace="0" src="img/pic1.gif"></a></span></div></div></div></footer></div></script>
	<script src="js/placeHolder.js"></script>
	<script type="text/javascript">
		$(function() {
			$('input').placeholder();
		});
	</script>

<div class="browserBody" style="display:none;"><div class="bcgop"></div><div class="browserBody-text"><p>您目前使用的浏览器可能无法实现最佳浏览效果，建议使用Chrome(谷歌)、Firefox(火狐)、Edge、IE9及IE9以上版本浏览器。</p><a href="http://www.boxuegu.com/web/html/Download.html">立即升级</a><img src="img/BWcolse.png"></div></div><div id="modalBackground" class="hide"></div><div id="tousu" class="modalFather payment-modal hide"><div class="modalHeader"><span>投诉理由</span><i class="iconfont icon-guanbi payment-modal-close"></i></div><div class="modalBody"><p><span></span>我要投诉的内容涉及</p><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="广告营销等垃圾信息" id="myradio1"><span>广告营销等垃圾信息</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="抄袭内容" id="myradio2"><span>抄袭内容</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="辱骂等不文明语言的人身攻击" id="myradio3"><span>辱骂等不文明语言的人身攻击</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="色情或反动的违法信息" id="myradio4"><span>色情或反动的违法信息</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="" id="myradio4"><span>其他</span><input type="text" class="comment-content"></label><br></div><div class="errorInfo"><img src="img/alter_14.png" alt=""><span>请选择投诉理由</span></div><div class="modalFooter"><a>提交</a></div></div><div id="quxiaoshoucang" class="modalFather payment-modal hide"><div class="modalHeader"><i class="iconfont icon-guanbi payment-modal-close"></i></div><div class="modalBody"><div><i class="iconfont icon-wenhao"></i></div><p class="tipType">确定要取消收藏吗？</p></div><div class="modalFooter"><div><a class="yesBtn">确定</a></div><div><a class="notBtn">取消</a></div></div></div><div id="tousu1" class="modalFather payment-modal hide"><div class="modalHeader"><span>投诉理由</span><i class="iconfont icon-guanbi payment-modal-close"></i></div><div class="modalBody"><p><span></span>我要投诉的内容涉及</p><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="广告营销等垃圾信息" id="myradio1"><span>广告营销等垃圾信息</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="抄袭内容" id="myradio2"><span>抄袭内容</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="辱骂等不文明语言的人身攻击" id="myradio3"><span>辱骂等不文明语言的人身攻击</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="色情或反动的违法信息" id="myradio4"><span>色情或反动的违法信息</span></label><br><label><div class="radio-cover"></div><input type="radio" class="cy-myprofile-myfom-dv-radio" name="gender" value="" id="myradio4"><span>其他</span><input type="text" class="comment-content"></label></div><div class="errorInfo"><img src="img/alter_14.png" alt=""><span>请选择投诉理由</span></div><div class="modalFooter"><a>提交</a></div></div></body></html>