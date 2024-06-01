<?php
	session_start();
	$user_id = $_SESSION['id']; // 获取用户ID

	$link = @mysqli_connect(
		'localhost',  // MySQL主機
		'root',       // 使用者名稱
		'',           // 密碼
		'example'     // 連線資料庫名稱
	);

	$sql = "SELECT * FROM truefalse ORDER BY RAND() LIMIT 5";
	echo '<h1>是非題</h1>';
	echo '<p>您的ID是：' . $user_id . '</p>'; // 显示用户ID
	echo '<form method="post" action="student2.php">';
	echo '<table border>';
	echo '<tr bgcolor="green" align="center"><td>ID</td><td>問題</td><td>你的答案</td></tr>';
	if ($result = mysqli_query($link, $sql)) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo '<tr>';
			echo '<td>' . $row["id"] . '</td>'; // Display the question ID
			echo '<td>' . $row["question"] . '</td>';
			echo '<td>';
			echo '<input type="radio" name="answer' . $row["id"] . '" value="Y"> True ';
			echo '<input type="radio" name="answer' . $row["id"] . '" value="N"> False';
			echo '</td>';
			echo '</tr>';
		}
	}
	echo '</table></br>';
	echo '<input type="submit" value="前往選擇題">';
	echo '</form>';

	mysqli_free_result($result);
	mysqli_close($link);
?>
