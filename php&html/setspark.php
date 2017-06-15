<html>
<body>
<h1>spark相关文件配置</h1>

<div style="height:50px;width:100%;">

<div style="width:130px;float:left"><button style="width:130px" id="default">SPARK DEFAULT</button></div>
<div style="width:130px;float:left"><button style="width:130px" id="env">SPARK ENV</button></div>
<div style="width:130px;float:left"><button style="width:130px" id="slaves">SPARK SLAVES</button></div>

</div>

<script type="text/javascript">
document.getElementById("default").onclick=function(){
document.getElementById("displaydefault").style.display="block";
document.getElementById("displayenv").style.display="none";
document.getElementById("displayslaves").style.display="none";
}
document.getElementById("env").onclick=function(){
document.getElementById("displaydefault").style.display="none";
document.getElementById("displayenv").style.display="block";
document.getElementById("displayslaves").style.display="none";
}
document.getElementById("slaves").onclick=function(){
document.getElementById("displaydefault").style.display="none";
document.getElementById("displayenv").style.display="none";
document.getElementById("displayslaves").style.display="block";
}
</script>

<div>

<div id="displaydefault" style=""  >
<form action="write.php" method="post">
<table>
<tr>
<td>
<textarea  cols="50" rows="30" readonly="readonly" >
<?php
$arr=file('/var/www/html/settings/spark-defaults.conf');
foreach ($arr as $value){
echo iconv("gb2312","utf-8",$value);
}
?>
</textarea>
</td>
<td>
<?php
$text = file_get_contents('/home/hadoop/spark-1.6.0/conf/spark-defaults.conf');
?>
<textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
</td>
</tr>
<tr>
<td>
<textarea  name="config" readonly="readonly"  style="display:none" >/home/hadoop/spark-1.6.0/conf/spark-defaults.conf</textarea>
</td>
<td>
<input id="subcore" type="submit" value="确认提交"  >
</td>
</tr>
</table>
</form>
</div>


<div id="displayenv" style="display:none"  >
<form action="write.php" method="post">
<table>
<tr>
<td>
<textarea  cols="50" rows="30" readonly="readonly" >
<?php
$arr=file('/var/www/html/settings/spark-env.sh');
foreach ($arr as $value){
echo iconv("gb2312","utf-8",$value);
}
?>
</textarea>
</td>
<td>
<?php
$text = file_get_contents('/home/hadoop/spark-1.6.0/conf/spark-env.sh');
?>
<textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
</td>
</tr>
<tr>
<td>
<textarea  name="config" readonly="readonly"  style="display:none" >/home/hadoop/spark-1.6.0/conf/spark-env.sh</textarea>
</td>
<td>
<input id="subcore" type="submit" value="确认提交"  >
</td>
</tr>
</table>
</form>
</div>



<div id="displayslaves" style="display:none"  >
<form action="write.php" method="post">
<table>
<tr>
<td>
<textarea  cols="50" rows="30" readonly="readonly" >
<?php
$arr=file('/var/www/html/settings/slaves');
foreach ($arr as $value){
echo iconv("gb2312","utf-8",$value);
}
?>
</textarea>
</td>
<td>
<?php
$text = file_get_contents('/home/hadoop/spark-1.6.0/conf/slaves');
?>
<textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
</td>
</tr>
<tr>
<td>
<textarea  name="config" readonly="readonly"  style="display:none" >/home/hadoop/spark-1.6.0/conf/slaves</textarea>
</td>
<td>
<input id="subcore" type="submit" value="确认提交"  >
</td>
</tr>
</table>
</form>
</div>



































</div>


</body>
</html>
