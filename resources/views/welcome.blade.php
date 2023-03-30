<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form action="demo" method="post">
        <!-- Cần phải có @csrf tạo ra thẻ input ẩn chứa mã token bảo mật form -->
            @csrf
            <input type="submit" value="Submit form">
    </form>
</body>

</html>