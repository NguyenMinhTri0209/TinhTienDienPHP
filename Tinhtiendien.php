<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tính tiền điện</title>
    <style type="text/css">
        body {  
          /*  background-color: #d24dff;*/
        }
        table{
            background: #ffd94d;
            border: 0 solid yellow;
        }
        thead{
            background: #fff14d;    
        }
        td {
            color: blue;
        }
        h3{
            font-family: verdana;
            text-align: center;
            /* text-anchor: middle; */
            color: #ff8100;
            font-size: medium;
        }
    </style>
</head>
<body>
<?php 
    if(isset($_POST['tenchuso']))  
        $tenchuso=trim($_POST['tenchuso']); 
    else 
	    {
	    	$tenchuso=null;
	    }
    if(isset($_POST['chisocu'])) 
        $chisocu=trim($_POST['chisocu']); 
    else 
    	{
    		$chisocu=0;
    	}
    if(isset($_POST['chisomoi'])) 
    $chisomoi=trim($_POST['chisomoi']); 
    else 
    	{
    		$chisomoi=0;
    	}
    if(isset($_POST['tinh']))
        {
        	if(!$tenchuso)
        		echo "<font color='red'>Chưa nhập tên chủ hộ! </font>";
        	if(!$chisocu || !is_numeric($chisocu))
        		echo "<font color='red'>Chưa nhập chỉ số cũ hoặc bạn đang nhập kí tự khác số! </font>";
        	if(!$chisomoi || !is_numeric($chisomoi))
        		echo "<font color='red'>Chưa nhập chỉ số mới hoặc bạn đang nhập kí tự khác số! </font>";

        	if (is_numeric($chisomoi) && is_numeric($chisocu)) 
            {
            	if($chisomoi >= $chisocu){
            		$sotienthanhtoan=($chisomoi - $chisocu)*2000;
            	}
            	else
            	{
            		echo "<font color='red'>Chi số cũ lớn hơn chỉ số mới! </font>";
            		$sotienthanhtoan="0";
            	}
            }
            else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                    $sotienthanhtoan="0";
                }
        }
    else $sotienthanhtoan=0;
?>
<form align='center' action="" method="post">
<table>
    <thead>
        <th colspan="2" align="center"><h3>Thanh toán tiền điện</h3></th>
    </thead>
    <tr><td>Tên chủ hộ:</td>
     <td><input type="text" name="tenchuso" value="<?php  echo $tenchuso;?> "/></td>
    </tr>
    <tr><td>Chỉ số cũ:</td>
     <td><input type="text" name="chisocu" value="<?php  echo $chisocu;?> "/></td>
     <td>(Kw)</td>
    </tr>
    <tr><td>Chỉ số mới:</td>
     <td><input type="text" name="chisomoi" value="<?php  echo $chisomoi;?> "/></td>
     <td>(Kw)</td>
    </tr>
    <tr><td>Đơn giá:</td>
     <td><input type="text" name="dongia" value="2000"/></td>
     <td>(VNĐ)</td>
    </tr>
    <tr><td>Số tiền thanh toán:</td>
     <td><input type="text" name="sotienthanhtoan" disabled="disabled" value="<?php  echo $sotienthanhtoan;?> "/></td>
     <td>(VNĐ)</td>
    </tr>
    <tr>
     <td colspan="2" align="center"><input type="submit" value="Tính" name="tinh" /></td>
    </tr>
</table>
</form>
</body>
</html>