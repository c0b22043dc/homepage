<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // ここで受信したデータを処理する（データベースに保存、メール送信など）
    // 例: データをデータベースに保存する場合
    $db_host = "your_database_host";
    $db_user = "your_database_user";
    $db_pass = "your_database_password";
    $db_name = "your_database_name";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        die("データベースへの接続に失敗しました: " . $conn->connect_error);
    }

    $sql = "INSERT INTO inquiries (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "お問い合わせが正常に送信されました。";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
