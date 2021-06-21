<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>MEP Sinemaları</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
</head>

<body>
    <?php
    include "connection.php";
    $sql = "SELECT * FROM movieTable";
    ?>
    <header></header>
    <div id="home-section-1" class="movie-show-container">
        <h1>#Gösterimdekiler</h1>
        <h3>Şimdi Bilet Ayırtın</h3>

        <div class="movies-container">

            <?php
            if ($result = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    for ($i = 0; $i <= 5; $i++) {
                        $row = mysqli_fetch_array($result);
                        echo '<div class="movie-box">';
                        echo '<img src="' . $row['movieImg'] . '" alt=" ">';
                        echo '<div class="movie-info ">';
                        echo '<h3>' . $row['movieTitle'] . '</h3>';
                        echo '<a href="booking.php?id=' . $row['movieID'] . '"><i class="fas fa-ticket-alt"></i> Bilet Ayırtın</a>';
                        echo '</div>';
                        echo '</div>';
                    }
                    mysqli_free_result($result);
                } else {
                    echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }

            // Close connection
            mysqli_close($con);
            ?>
        </div>
    </div>

    <div id="home-section-2" class="services-section">
        <h1>Nasıl Çalışır?</h1>
        <h3>En sevdiğiniz filmi ayırtmak için 3 basit adım!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Favori filmini seç</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Bilet parasını öde.</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Koltuğunu seç ve eğlencenin tadını çıkar</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div> 


    
    <div id="home-section-3" class="trailers-section">
        <h1 class="section-title">Yeni Filmler Keşfedin</h1>
        <h3>Gösterimde Olanlar</h3>
        <div class="trailers-grid">
            <div class="trailers-grid-item">
                <img src="img/trailer1.jpg" alt="">
                <div class="trailer-item-info" data-video="7BG-BpvkYB8">
                    <h3>Esaretin Bedeli</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/trailer2.jpg" alt="">
                <div class="trailer-item-info" data-video="E-wMep9G32A">
                    <h3>Başlangıç</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/trailer3.jpg" alt="">
                <div class="trailer-item-info" data-video="USNqsrW5DrQ">
                    <h3>Yüzüklerin Efendisi</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/trailer4.jpg" alt="">
                <div class="trailer-item-info" data-video="m8e-FF8MsqU">
                    <h3>Matrix</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/trailer5.jpg" alt="">
                <div class="trailer-item-info" data-video="Tgim0dflg0o">
                    <h3>Guguk Kuşu</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
            <div class="trailers-grid-item">
                <img src="img/trailer6.jpg" alt="">
                <div class="trailer-item-info" data-video="vVJeYMRam0o">
                    <h3>Yıldızlar Arası</h3>
                    <i class="far fa-3x fa-play-circle"></i>
                </div>
            </div>
        </div>
    </div>
    <footer></footer>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>