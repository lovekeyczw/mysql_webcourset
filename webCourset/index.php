<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ѧУѡ��ϵͳ</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
 <script type="text/javascript">
  <!--
	function createXMLHttpRequest(oInput,oSelect){
	var request;
	if(window.ActiveXObject){
	  request=new ActiveXObject("Microsoft.XMLHttp");
	}else if(window.XMLHttpRequest){
	  request=new XMLHttpRequest();
	}
	//var setString=oInput.id+"="+oInput.value;
	//alert(setString);
    var url="usernamecheck.php?userName="+oInput.value+"&purview="+oSelect.value+"&timestamp="+new Date().getTime();
	//alert(url);
	request.open("GET",url);
	request.onreadystatechange=function(){
	  if(request.readyState==4&&request.status==200){
	   showResult(request.responseText);
		  //showResult("abc");
	  }
	}
	request.send(null);
	}
	function startCheck(oInput){
		var oSelect=document.getElementById("select");
	  if(!oInput.value){
	    oInput.focus();
		document.getElementById("UserResult").innerHTML="�û�������Ϊ��";
		return false;
	  }
	  document.getElementById("UserResult").innerHTML="";
	  createXMLHttpRequest(oInput,oSelect);
	}
	function showResult(sText){
	  var oSpan=document.getElementById("UserResult");
	  //alert(sText);
	  oSpan.innerHTML=sText;
	  if(sText.indexOf("������")>=0){
	    oSpan.style.color="red";
	  }else{
	    oSpan.style.color="blue";
	  }
	}
  //-->
  </script>
</head>
<body>

	<div id="main_content">
		<div id="top_banner">
			<div align="left">
				<img src="images/logo.jpg" alt="home" width="230" height="130"
					border="0" title="logo" />
			</div>
		</div>

		<div id="page_content_left">
			<div class="content_text">
				<p><?php 
				include "conn.php";
		
				?></p>
			</div>
			<div class="content_text">
				<form name="loginFrm" method="post" action="loginCheck.php">
					<fieldset>
						<p>
							��&nbsp;&nbsp;&nbsp;&nbsp;����<select id="select" name="select">
								<option value="1">ѧ��</option>
								<option value="2">��ʦ</option>
								<option value="3">����Ա</option>
							</select>
						</p>
						<p>
							�û�����<input name="userName" type="text" onblur="startCheck(this);" /><span class="check" id="UserResult"></span>
						</p>
						<p>
							��&nbsp;&nbsp;&nbsp;&nbsp;�룺<input name="pwd" type="password" />
						</p>
						<p>
							<input type="submit" name="postSubmit" value="ȷ��" />
							<a href="registstd.php">ѧ��ע��</a>
							<a href="registteacher.php">��ʦע��</a>
						</p>
					</fieldset>
				</form>
			</div>
			<div class="content_text">
				<p>ѧ�����û�����ѧ��ѧ�ţ�����Ϊѧ�ź���λ��</p>
				<p>��ʦ���û����ǽ�ʦ��ţ�����Ϊ��ʦ��������ƴ����</p>
			</div>
		</div>

		<div id="page_content_right">


			<div class="content_text">
				<img src="images/pic/1.jpg" width="100" height="100" alt="pic"
					title="pic" class="gallery" /><img src="images/pic/2.jpg"
					width="100" height="100" alt="pic" title="pic" class="gallery" /><img
					src="images/pic/3.jpg" width="100" height="100" alt="pic"
					title="pic" class="gallery" /><img src="images/pic/4.jpg"
					width="100" height="100" alt="pic" title="pic" class="gallery" /><img
					src="images/pic/5.jpg" width="100" height="100" alt="pic"
					title="pic" class="gallery" /><img src="images/pic/6.jpg"
					width="100" height="100" alt="pic" title="pic" class="gallery" /><img
					src="images/pic/7.jpg" width="100" height="100" alt="pic"
					title="pic" class="gallery" /><img src="images/pic/8.jpg"
					width="100" height="100" alt="pic" title="pic" class="gallery" /><img
					src="images/pic/9.jpg" width="100" height="100" alt="pic"
					title="pic" class="gallery" />
			</div>
		</div>


		<div id="page_bottom">
			<div class="content_text" style="text-align: center">
				<img src="images/s2.jpg" width="125" height="40" alt="s" title="s"
					class="inspiration" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp; <img src="images/s3.jpg" width="125" height="40" alt="s"
					title="s" class="inspiration" />&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <img src="images/s4.jpg" width="125"
					height="40" alt="s" title="s" class="inspiration" />&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; <img src="images/s1.jpg" width="125"
					height="40" alt="s" title="s" class="inspiration" />
			</div>
		</div>

	</div>

	<div id="footer">
		<div id="footer_content"><p><br></br>xxxѧУѡ��ϵͳ designed by ����</p></div>
	</div>



</body>
</html>