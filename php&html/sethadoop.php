<html>

   <body>
   <h1>hadoop相关文件配置</h1>
	<div style="height:50px;width:100%;">
	<div style="width:150px;float:left"><a href="#" id="core">Hadoop CORE </a> </div>
	<div style="width:150px;float:left"><a href="#" id="hdfs">Hadoop HDFS </a></div>
	<div style="width:150px;float:left"><a href="#" id="mapsite">Hadoop Mapred </a></div>
	<div style="width:150px;float:left"><a href="#" id="yarn">Hadoop YARN </a></div>
	<div style="width:150px;float:left"><a href="#" id="slaves">Hadoop SLAVES </a></div>
	</div>

<script type="text/javascript">
document.getElementById("hdfs").onclick=function(){
document.getElementById("displaycore").style.display="none";
document.getElementById("displaymapred").style.display="none";
document.getElementById("displayyarn").style.display="none";
document.getElementById("displayhdfs").style.display="block";
document.getElementById("displayslaves").style.display="none";
}
document.getElementById("mapsite").onclick=function(){
document.getElementById("displaycore").style.display="none";
document.getElementById("displaymapred").style.display="block";
document.getElementById("displayyarn").style.display="none";
document.getElementById("displayhdfs").style.display="none";
document.getElementById("displayslaves").style.display="none";
}
document.getElementById("yarn").onclick=function(){
document.getElementById("displaycore").style.display="none";
document.getElementById("displaymapred").style.display="none";
document.getElementById("displayyarn").style.display="block";
document.getElementById("displayhdfs").style.display="none";
document.getElementById("displayslaves").style.display="none";
}
document.getElementById("core").onclick=function(){
document.getElementById("displaycore").style.display="block";
document.getElementById("displaymapred").style.display="none";
document.getElementById("displayyarn").style.display="none";
document.getElementById("displayhdfs").style.display="none";
document.getElementById("displayslaves").style.display="none";
}
document.getElementById("slaves").onclick=function(){
document.getElementById("displaycore").style.display="none";
document.getElementById("displaymapred").style.display="none";
document.getElementById("displayyarn").style.display="none";
document.getElementById("displayhdfs").style.display="none";
document.getElementById("displayslaves").style.display="block";
}
</script>

<div>
	  
	<div id="displaycore" style=""  >
        <form action="write.php" method="post">
	<table>
	<tr>
		<td>
			<textarea  cols="50" rows="30" readonly="readonly" >
<?php
$arr=file('/var/www/html/settings/core-site.xml');
foreach ($arr as $value){
echo iconv("gb2312","utf-8",$value);
}
?>
			</textarea>
		</td>
		<td>
			<?php
			$text = file_get_contents('/home/hadoop/hadoop-2.6.5/etc/hadoop/core-site.xml');
			?>	
			<textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
		</td>
	</tr>
	<tr>
             <td>
			<textarea  name="config" readonly="readonly"  style="display:none" >/home/hadoop/hadoop-2.6.5/etc/hadoop/core-site.xml</textarea>
	     </td>
	<td>
		<input id="subcore" type="submit" value="确认提交"  >
	</td>
        </tr>
	</table>
	</form>
	</div>

	<div id="displayhdfs" style="display:none">
        <form action="write.php" method="post">
	<table>
        <tr>
                <td>
			<textarea id="show" name="show" cols="50" rows="30" readonly="readonly" >
<?php
$arr=file('/var/www/html/settings/hdfs-site.xml');
foreach ($arr as $value){
echo iconv("gb2312","utf-8",$value);
}
?>
		        </textarea>
                </td>
                <td>                
			<?php
                        $text = file_get_contents('/home/hadoop/hadoop-2.6.5/etc/hadoop/hdfs-site.xml');
                        ?>
                        <textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
                </td>
        </tr>
        <tr>
             <td>
			<textarea  name="config" readonly="readonly"  style="display:none">/home/hadoop/hadoop-2.6.5/etc/hadoop/hdfs-site.xml</textarea>
             </td>
             <td><input type="submit" value="确认提交"></td>
        </tr>
        </table>
	</form>
        </div>

	<div id="displaymapred" style="display:none">
        <form action="write.php" method="post">
	<table>
        <tr>
                <td>
			<textarea id="show" name="show" cols="50" rows="30" readonly="readonly" >
<?php
$arr=file('/var/www/html/settings/mapred-site.xml');
foreach ($arr as $value){
echo iconv("gb2312","utf-8",$value);
}
?>
		        </textarea>
                </td>
                <td>
	                <?php
                        $text = file_get_contents('/home/hadoop/hadoop-2.6.5/etc/hadoop/mapred-site.xml');
                        ?>
                        <textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
                </td>
        </tr>
        <tr>
             <td>
			<textarea  name="config" readonly="readonly"  style="display:none" >/home/hadoop/hadoop-2.6.5/etc/hadoop/mapred-site.xml</textarea>
             </td>
             <td><input type="submit" value="确认提交"></td>
        </tr>
        </table>
	</form>
        </div>


	<div id="displayyarn" style="display:none">
	<form action="write.php" method="post">
        <table>
        <tr>        
		<td>
			<textarea id="show" name="show" cols="50" rows="30" readonly="readonly" >
<?php
$arr=file('/var/www/html/settings/yarn-site.xml');
foreach ($arr as $value){
echo iconv("gb2312","utf-8",$value);
}
?>
		        </textarea>
                </td>
                <td>
	                <?php
                        $text = file_get_contents('/home/hadoop/hadoop-2.6.5/etc/hadoop/yarn-site.xml');
                        ?>
                        <textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
                </td>
        </tr>
        <tr>
             <td>
                        <textarea  name="config" readonly="readonly"  style="display:none" >/home/hadoop/hadoop-2.6.5/etc/hadoop/yarn-site.xml</textarea>
             </td>
             <td><input type="submit" value="确认提交"></td>
        </tr>
        </table>
	</form>
        </div>




        <div id="displayslaves" style="display:none">
        <form action="write.php" method="post">
        <table>
        <tr>
                <td>
                        <textarea id="show" name="show" cols="50" rows="30" readonly="readonly" >
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
                        $text = file_get_contents('/home/hadoop/hadoop-2.6.5/etc/hadoop/slaves');
                        ?>
                        <textarea id="showcore" name="show" cols="50" rows="30" ><?php echo $text; ?></textarea>
                </td>
        </tr>
        <tr>
             <td>
                        <textarea  name="config" readonly="readonly"  style="display:none" >/home/hadoop/hadoop-2.6.5/etc/hadoop/slaves</textarea>
             </td>
             <td><input type="submit" value="确认提交"></td>
        </tr>
        </table>
        </form>
        </div>









    </div>

    </body>
</html>
