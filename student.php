<?php
	$link=@mysqli_connect(
		'localhost',  //MySQL主機
		'root',  //使用者名稱
		'',  //密碼
		'example');  //連線資料庫名稱
		
	/*if($link)
			echo '資料庫連線成功<br/>';
	else
		echo '資料庫連接失敗<br/>';*/
	
	
		
	mysqli_close($link);
?>