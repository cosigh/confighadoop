<pre> 
<?php 

#    echo "参数 name 的值通过\$_POST获取为 ".$_POST["show"]." ,"; 
 #   echo "参数 name 的值通过\$_REQUEST获取为 ".$_REQUEST["show"]." .\r\n"; 
#echo "参数 name 的值通过\$_POST获取为 ".$_POST["config"]." ,";
$config=$_POST["config"];
$myfile = fopen($config, "w") or die("Unable to open file!");

fwrite($myfile, $_POST["show"]);   
fclose($myfile);


$text = $_REQUEST["show"];







?>
<div>配置文件已被修改</div>
<textarea id="showcore" name="show" cols="70" rows="30" readonly="readonly" ><?php echo $text; ?></textarea>


</pre>
