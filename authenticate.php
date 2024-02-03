<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<?
	$host = "localhost";
	$user = "root";
	$pass = "130613";
	$db = "users";
	
	//db연결
	$conn = new mysqli($host, $user, $pass, $db);

	if ($conn->connect_error) {
		die("연결실패: " . $conn->connect_error);
	}

	//사용자 인증
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT id FROM users WHERE username = '$username' and password = '$password'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			session_start();
			$_SESSION["username"] = $username;
			echo "<script>alert('로그인에 성공하였습니다');</script>";
			//header("location: webshell.php");
			exit();
		} else {
			$error = "아이디 또는 비밀번호가 잘못되었습니다.";
			echo "<script>alert('로그인에 실패하였습니다');history.back(-1);</script>";
		}
	}
?>
</body>