<!DOCTYPE html>

<head>
    <title>IVIIST</title>
    <link href="assets/css/main_page.css" rel="stylesheet" type="text/css">
    <link href="assets/css/subscribe.css" rel="stylesheet" type="text/css">
    <script src="assets/js/main_page.js"></script>
</head>

<body>
    <div class="div1">
        <div class="logo_back">
            <img src="assets/img/logo.png" class="logo">
        </div>
        <div class="label_back">
            <a href="main_page.html" class="link_main">
                <h1 class="label" title="INCIDENTS OF INTERNAL VIOLATIONS
                INFORMATION SECURITY">IIVIS</h1>
            </a>
        </div>
        <div class="menu_back link">
            <div class="info">
                <h4 class="info_txt"><a href="information.html">Информация</a></h4>
            </div>
            <div class="security">
                <h4 class="security_txt"><a href="security.html">Защита</a></h4>
            </div>
            <div class="threats">
                <h4 class="threats_txt"><a href="threats.html">Угрозы</a></h4>
            </div>
            <div class="decision">
                <h4 class="decision_txt"><a href="decision.html">Решения</a></h4>
            </div>
        </div>
    </div>
    <div class="popup">
        <form method="POST">
            <label for="email">Подпишитесь на нашу рассылку новостей:</label>
            <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
            <label for="name_user">Как к Вам обращаться?</label>
            <input type="name_user" id="name_user" name="name_user" required>
            <button type="submit" name="submit" value="submit">Подписаться</button>
        </form>
    </div>

    <?php
    $link = mysqli_connect("localhost", "root", "")
        or die("Не могу подключиться");

    mysqli_select_db($link, "IVIIS") or die('Не могу выбрать БД');
    
    if ($_POST['submit'] <> "") {
        $user = $_POST['name_user'];
        $email = $_POST['email'];
        $result = mysqli_query($link, "INSERT INTO `Subscribers` (`name_u`, `mail`) VALUES ('$user', '$email')");
    }

    

    mysqli_close($link);
    ?>
</body>

</html>