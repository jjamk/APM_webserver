<?php
    // session_start();
    // if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
    //     echo "<script>alert('비회원입니다!');";
    //     echo "window.location.replace('index.php');</script>";
    // }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $name = $_SESSION['user_name'];
    $conn = mysqli_connect('localhost', 'root', 'root', 'board');

    $sql = "INSERT INTO board(writer, title, content) VALUES ('$name','$title','$content');";

    $res = mysqli_query($conn, $sql);

    if($res) {
        echo "<script>alert('게시글이 작성되었습니다.');";
        echo "window.location.replace('board.php');</script>";
    } else {
        echo mysqli_error($conn);
    }
?>