<?php
include "config.php";

// Check user login or not
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
}

// logout
if (isset($_POST['but_logout'])) {
    session_destroy();
    header('Location: index.php');
}

?>
<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yeni Gösterim Ekle</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $link = mysqli_connect("localhost", "root", "12345678", "cms");
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($link, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM feedbackTable"));
    $moviesNo = mysqli_num_rows(mysqli_query($link, "SELECT * FROM movieTable"));
    ?>

    <?php include('header.php'); ?>
    
    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Gösterim Ekle</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <div class="booking-form-container">
                        <form action="spot.php" method="POST">


                            <select name="theatre" required>
                        <option value="" disabled selected>Salon 1</option>
                        <option value="main-hall">Salon 2</option>
                        <option value="private-hall">Özel Salon</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>Boyut/Tip</option>
                        <option value="3d">2D</option>
                        <option value="2d">3D</option>
                        <option value="imax">IMAX</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>Tarih</option>
                        <option value="12-3">12 TEMMUZ</option>
                        <option value="13-3">13 TEMMUZ</option>
                        <option value="13-3">14 TEMMUZ</option>
                        <option value="13-3">15 TEMMUZ</option>
                        <option value="13-3">16 TEMMUZ</option>
                        <option value="13-3">17 TEMMUZ</option>
                        <option value="13-3">18 TEMMUZ</option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>Seans Saati</option>
                        <option value="09-00">09:00 </option>
                        <option value="12-00">13:00 </option>
                        <option value="18-00">18:00 </option>
                       
                        
                    </select>

                    <input placeholder="Adınız" type="text" name="fName" required>

                    <input placeholder="Soyadınız" type="text" name="lName">

                    <input placeholder="Telefon Numaranız" type="text" name="pNumber" required>
                    <input placeholder="Mail Adresiniz" type="email" name="email" required>
                    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">

                            <button type="submit" value="submit" name="submit" class="form-btn">EKLE</button>
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>