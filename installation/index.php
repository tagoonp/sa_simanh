<?php
session_start();
$id=1;
if(isset($_GET['id'])){
	$id = $_GET['id'];	
}



if(isset($_POST['txtUsername']))
	$_SESSION["buffUsername"] = $_POST['txtUsername'];
	
if(isset($_POST['txtPassword']))
	$_SESSION["buffPassword"] = $_POST['txtPassword'];

if(isset($_POST['txtEmail']))
	$_SESSION["buffEmail"] = $_POST['txtEmail'];
	
session_write_close();

if($id==2){
	if((!isset($_SESSION["buffUsername"])) || (!isset($_SESSION["buffPassword"])) || (!isset($_SESSION["buffEmail"]))){
		header('Location: index.php?id=1');	
	}else{
		if(($_SESSION["buffUsername"]=='') || ($_SESSION["buffPassword"]=='') || ($_SESSION["buffEmail"]=='')){
			header('Location: index.php?id=1');	
		}
	}
}

if($id==1){
	if(isset($_SESSION["buffUsername"])){
		if(($_SESSION["buffUsername"]!='') || ($_SESSION["buffPassword"]!='') || ($_SESSION["buffEmail"]!='')){
			header('Location: index.php?id=2');	
		}
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simanh installation</title>
</head>
<style>
body{
	padding:0;
	margin:0;
	font-family:Verdana, Geneva, sans-serif;
	font-size:0.9em;
}

ul,li,p{margin:0;padding:0;list-style:none}

.css_simple_tab{float:left;width:100%;border-bottom:1px solid #8b0401;height:29px;}
/* css แท็บทั้งหมด */
.css_simple_tab li{float:left;height:29px;margin-right:3px;
 	border:1px solid #CCCCCC;
	border-bottom:0px;
}
.css_simple_tab li i{float:left;width:3px;overflow:hidden;height:29px;}
.css_simple_tab li a{float:left;line-height:25px;padding-top:4px;text-align:center;outline:none;padding:0px 20px;}
.css_simple_tab li a:link{color:#383838}
.css_simple_tab li a:visited{color:#383838}
.css_simple_tab li a:hover{color:#8b0401}
/* css แท็บที่ถูกเลือก */
.css_simple_tab_li{height:30px;
	border:1px solid #8b0401 !important;
	border-bottom:0px !important;
	background-color:#FFF;
}
.css_simple_tab_li a{font-weight:bold !important;color:#8b0401 !important;}
.css_simple_tab_detailed{float:left;width:96%;line-height:23px;padding-top:10px;padding-left:15px;display:none;overflow:hidden}

a:link { color:#fff; text-decoration:none}
a:visited {color: #fff; text-decoration: none}
a:hover {color:#FC0;}

.border-r{
	border:solid;
	border-color:#CCC;
	border-width:1px;
	border-radius:5px;
	height:30px;
	padding-left:5px;
}
</style>
<script src="js/jquery.min.js"></script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table width="900" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="100" align="center"><img src="images/logo.png" width="300" height="65" /></td>
      </tr>
      <tr>
        <td align="center"><font color="#0099CC"><strong>SIMANH</strong></font> is a open source that provided by WHO</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>
          <ul class="css_simple_tab">
            <li class="<?php if($id==1){ print "css_simple_tab_li";}else{print ""; }?>"><a href="index.php?id=1" rel="nofollow" hidefocus="">Website setting</a></li>
            <li class="<?php if($id==2){ print "css_simple_tab_li";}else{print ""; }?>"><a href="index.php?id=2" rel="nofollow" hidefocus="">Database</a></li>
            </ul>
          <div class="css_simple_tab_detailed" style="display: <?php if($id==1){ print "block";}else{print "none"; }?>;">
            <?php require "./page/setting.php"; ?>
            </div>
          <div class="css_simple_tab_detailed" style="display: <?php if($id==2){ print "block";}else{print "none"; }?>;">
            <?php require "./page/database.php"; ?>
            </div>          
          <script type="text/javascript">
            $(".css_simple_tab").find("li").bind("click",function(){	// เมื่อเคลิกที่ แท็บ ใดๆ
                var indexObj=$(".css_simple_tab").find("li").index(this);	// หาค่า ตำแหน่งแท็บนั้นๆ ที่คลิก เริ่มที่ 0
                $(".css_simple_tab").find("li").attr("class","");	// กำหนด class ให้ว่าง สำหรับทุกๆ แท็บ	
                $(this).attr("class","css_simple_tab_li");	 // กำหนด class สำหรับแท็บที่ถูกเลือก
                $(".css_simple_tab_detailed").hide().eq(indexObj).show(); // แสดงแท็บที่เลือก และซ่อนแท็บอื่นๆ		
            });
        </script>
          </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="1" bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td height="1">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" style="color:#999; font-size:0.8em;">Improving Health System Response through Epidemiological Surveillance 
          in Improving Maternal and Newborn Health and Survival Project</td>
      </tr>
      <tr>
        <td align="center" style="color:#999; font-size:0.8em;">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
