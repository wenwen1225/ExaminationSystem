<?php
	$id = $_POST['id'];
    $pwd = $_POST['password'];

    $link=@mysqli_connect(
			'localhost',  //MySQL主機
			'root',  //使用者名稱
			'',  //密碼
			'example');  //連線資料庫名稱
	
	$sql = "SELECT * FROM students WHERE id='$id' AND pwd='$pwd'";		
	
	if( $result = mysqli_query($link, $sql)){
		$total_records=mysqli_num_rows($result);
		if($total_records>0){
			$row = mysqli_fetch_assoc($result);
			$name = $row["name"];
			echo '<h1>' . $name . '您好</h1>';
		}else{
			echo '帳/密錯誤<br><a href=login.html>回登入畫面</a>';
		}
	}
		
	mysqli_free_result($result);
		
	mysqli_close($link);

?>