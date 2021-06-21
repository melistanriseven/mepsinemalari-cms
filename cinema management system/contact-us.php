<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>İletişim</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
</head>

<body>
    <?php
    include "connection.php";
    ?>
    <header></header>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>İletişim</h1>
            <p>Bizimle İletişim Kurun </p>
            <form action="" method="POST">
                <input placeholder="Adınız" name="fName" required><br>
                <input placeholder="Soyadınız" name="lName"><br>
                <input placeholder="Mail Adresiniz" name="eMail" required><br>
                <textarea placeholder="Mesajınızı Giriniz" name="feedback" rows="10" cols="30" required></textarea><br>
                <button type="submit" name="submit" value="submit">Mesajı Gönder</button>
                <?php
                if (isset($_POST['submit'])) {
                    $insert_query = "INSERT INTO 
                        feedbackTable ( senderfName,
                                        senderlName,
                                        sendereMail,
                                        senderfeedback)
                        VALUES (        '" . $_POST["fName"] . "',
                                        '" . $_POST["lName"] . "',
                                        '" . $_POST["eMail"] . "',
                                        '" . $_POST["feedback"] . "')";
                    $add = mysqli_query($con, $insert_query);

                    if ($add) {
                        echo "<script>alert('Succesfully Submitted');</script>";
                    }
                }
                ?>
            </form>

        </div>
        <div class="contact-us-section contact-us-section2">
            <h1>Adres</h1>
            <h3>Telefon & Fax No</h3>
            <p><a href="tel:01011391148">0850 800 50 50</a><br>
                <a href="tel:01011391148">0850 800 50 50</a></p>
            <h3>Adres</h3>
            <p>Ziyapaşa Bulvarı Seyhan/Adana</p>
            <h3>E-mail</h3>
            <p><a href="info@mepsinemalari.com">info@mepsinemalari.com</a></p>
        </div>
    </div>
    <div style="width: 75%; height: 350px; margin: 15%;">
        <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=ziyapa%C5%9Fa%20adana&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
    <footer></footer>
    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>