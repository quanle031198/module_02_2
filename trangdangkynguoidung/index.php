<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    if (empty($name)) {
        $err_name = " * moi nhap name";
    }
    if (empty($email)) {
        $err_email = " * moi nhap email";
    }
    if (filter_var($email)) {
        $check = " * moi nhap dung dang email";
    }
    if (empty($phone)) {
        $err_phone = " * moi nhap so dien thoai";
    }
    saveDataJson('uesr.json', $name, $email, $phone);
}

?>
<?php
function saveDataJson($filename, $name, $email, $phone)
{
    try {
        $contact = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone
        );
        array_push($contact);
        json_encode($contact);
        json_decode($contact);
        file_put_contents($filename, $contact);
        echo "Lưu dữ liệu thành công!";
        file_get_contents($filename);
    } catch (Exception $e) {
        $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>[Bài tập] Trang đăng ký người dùng</title>
</head>

<body>
    <form method="POST">
        <input id="name" type="text" name="name" placeholder="input name" /><?php echo $err_name ?><br />
        <input id="email" type="text" name="email" placeholder="input email" /><?php echo $err_email ?><?php echo $check ?><br />
        <input id="phone" type="number" name="phone" placeholder="input number phone" /><?php echo $err_phone ?><br />
        <input type="submit" id="submit" value="Đăng ký" />
    </form>
</body>

</html>