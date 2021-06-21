<!DOCTYPE html>
<?php
$id = $_GET['id'];
//durumlar
if ((!$_GET['id'])) {
    echo "<script>alert('Buraya Doğrudan Gelmemelisiniz, Lütfen Ana Sayfadan Seçim Yapınız');window.location.href='index.php';</script>";
}
include "connection.php";
$movieQuery = "SELECT * FROM movieTable WHERE movieID = $id";
$movieImageById = mysqli_query($con, $movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Rezervasyon <?php echo $row['movieTitle']; ?> Şimdi Yap</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1> REZERVASYON</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['movieImg'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movieTitle']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>TÜRÜ</td>
                        <td><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td>SÜRESİ</td>
                        <td><?php echo $row['movieDuration']; ?></td>
                    </tr>
                    <tr>
                        <td>ÇIKIŞ TARİHİ</td>
                        <td><?php echo $row['movieRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>YAPIMCISI</td>
                        <td><?php echo $row['movieDirector']; ?></td>
                    </tr>
                    <tr>
                        <td>AKTÖRLER</td>
                        <td><?php echo $row['movieActors']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <form action="verify.php" method="POST">


                    <select name="theatre" required>
                        <option value="Salon1" disabled selected>Salon 1</option>
                        <option value="Salon2">Salon 2</option>
                        <option value="Ozel Salon">Ozel Salon</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>Boyut/Tip</option>
                        <option value="2D">2D</option>
                        <option value="3D">3D</option>
                        <option value="IMAX">IMAX</option>
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



                    <button type="submit" value="save" name="submit" class="form-btn">Bilet Al</button>

                </form>
            </div>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>