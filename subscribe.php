<!DOCTYPE html>

<head>
    <title>IVIIST</title>
    <link href="assets/css/main_page.css" rel="stylesheet" type="text/css">
    <script src="assets/js/main_page.js"></script>
    <style>
        .form-container {
            display: none;
        }

        .all_radio {
            margin-left: 38.3%;
            margin-top: 10%;
        }

        .radio-group {
            display: inline-block;
            cursor: pointer;
            padding: 0px 15px;
            line-height: 34px;
            border: 1px solid #999;
            border-radius: 6px;
            user-select: none;
        }

        .radio-group input[type="radio"] {
            margin-right: 10px;
        }

        .form-container.active {
            display: block;
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .popup form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .popup label {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .popup input[type="email"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
        }

        .popup input[type="name_user"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            width: 100%;
        }

        .popup button[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .popup button[type="submit"]:hover {
            background-color: white;
            color: black;
        }
    </style>

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
    <div class="all_radio">
        <div class="radio-group">
            <input type="radio" name="form-group" value="opt1" checked>
            <label for="form1">Подписаться</label>
        </div>
        <div class="radio-group">
            <input type="radio" name="form-group" value="opt2">
            <label for="form2">Отписаться</label>
        </div>
        <div class="radio-group">
            <input type="radio" name="form-group" value="opt3">
            <label for="form3">Изменить</label>
        </div>
    </div>


    <div class="form-container active popup" id="form1">
        <form method="POST">
            <label for="email">Подпишитесь на нашу рассылку новостей:</label>
            <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
            <label for="name_user">Как к Вам обращаться?</label>
            <input type="name_user" id="name_user" name="name_user" required>
            <button type="submit" name="submit" value="submit">Подписаться</button>
        </form>
    </div>

    <div class="form-container popup" id="form2" style="display: none;">
        <form method="POST">
            <label for="email">Отписаться от рассылкы</label>
            <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
            <button type="submit" name="delete" value="delete">Отписаться</button>
        </form>
    </div>


    <div class="form-container popup" id="form3" style="display: none;">
        <form method="POST">
            <label for="email">Изменить адрес рассылки</label>
            <input type="email" id="email" name="email" placeholder="Введите старый email" required>
            <input type="email" id="n_email" name="n_email" placeholder="Введите новый email" required>
            <button type="submit" name="change" value="change">Изменить</button>
        </form>
    </div>
    <script>
    </script>
    <script>
        document.querySelectorAll('input[name="form-group"]').forEach(radio => {
            radio.addEventListener('change',
                function() {
                    if (this.value === 'opt1') {
                        document.getElementById('form1').style.display = 'block';
                        document.getElementById('form2').style.display = 'none';
                        document.getElementById('form3').style.display = 'none';
                    } else if (this.value === 'opt2') {
                        document.getElementById('form1').style.display = 'none';
                        document.getElementById('form2').style.display = 'block';
                    } else if (this.value === 'opt3') {
                        document.getElementById('form1').style.display = 'none';
                        document.getElementById('form2').style.display = 'none';
                        document.getElementById('form3').style.display = 'block';
                    }
                });
        });
    </script>

    <?php
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);

    $link = mysqli_connect("localhost", "root", "")
        or die("Не могу подключиться");

    mysqli_select_db($link, "IVIIS") or die('Не могу выбрать БД');

    if ($_POST['submit'] <> "") {
        $user = $_POST['name_user'];
        $mail = $_POST['email'];
        $find = mysqli_query($link, "SELECT `mail` FROM `Subscribers` WHERE `mail`='$mail'");
        echo ($find);
        // echo ($mail);
        $result = mysqli_query($link, "INSERT INTO `Subscribers` (`name_u`, `mail`) VALUES ('$user', '$mail')");
    } else if ($_POST["delete"] <> "") {
        $mail = $_POST["email"];
        $result = mysqli_query($link, "DELETE FROM `Subscribers` WHERE `mail`='$mail'");
    } else if ($_POST["change"] <> "") {
        $mail = $_POST["email"];
        $n_mail = $_POST["n_email"];
        $result = mysqli_query($link, "UPDATE `Subscribers` SET `mail`='$n_mail' WHERE `mail`='$mail'");
    }

    mysqli_close($link);
    ?>
</body>

</html>