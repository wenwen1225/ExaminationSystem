<?php
session_start();
$user_id = $_SESSION['id'];

$link = @mysqli_connect(
    'localhost',  // MySQL主機
    'root',       // 使用者名稱
    '',           // 密碼
    'example'     // 連線資料庫名稱
);

echo '<h1>選擇題</h1>';
echo '<p>您的ID是：' . $user_id . '</p>'; // 显示用户ID

echo '<form method="post" action="score.php">';

foreach ($_POST as $key => $value) {
    echo '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' . htmlspecialchars($value) . '">';
}

$sql = "SELECT id, question, selOne, selTwo, selThree, selFour FROM selection ORDER BY RAND() LIMIT 15";
echo '<table border>';
echo '<tr bgcolor="green" align="center"><td>題號</td><td>問題</td><td>你的答案</td></tr>';
if ($result = mysqli_query($link, $sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row["id"] . '</td>';
        echo '<td>' . $row["question"] . '</td>';
        echo '<td>';
        echo '<input type="radio" name="answer' . $row["id"] . '" value="A">' . $row["selOne"] . ' ';
        echo '<input type="radio" name="answer' . $row["id"] . '" value="B">' . $row["selTwo"] . ' ';
        echo '<input type="radio" name="answer' . $row["id"] . '" value="C">' . $row["selThree"] . ' ';
        echo '<input type="radio" name="answer' . $row["id"] . '" value="D">' . $row["selFour"] . ' ';
        echo '</td>';
        echo '</tr>';
    }
}
echo '</table></br>';
echo '<input type="submit" value="送出答案">';
echo '</form>';

mysqli_free_result($result);
mysqli_close($link);
?>
