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
    <title>Admin Panel</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php
    $sql = "SELECT * FROM bookingTable";
    $bookingsNo = mysqli_num_rows(mysqli_query($con, $sql));
    $messagesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM feedbackTable"));
    $moviesNo = mysqli_num_rows(mysqli_query($con, "SELECT * FROM movieTable"));
    ?>
    
    <?php include('header.php'); ?>

    <div class="admin-container">

        <?php include('sidebar.php'); ?>
        <div class="admin-section admin-section2">
            <div class="admin-section-column">


                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Filmler</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>
                    <form action="" method="POST">
                         <input placeholder="Film Adı" type="text" name="movieTitle" required>
                        <input placeholder="Türü" type="text" name="movieGenre" required>
                        <input placeholder="Süresi" type="number" name="movieDuration" required>
                        <input placeholder="Çıkış Tarihi" type="date" name="movieRelDate" required>
                        <input placeholder="Yönetmen" type="text" name="movieDirector" required>
                        <input placeholder="Aktörler" type="text" name="movieActors" required>
                        <label>Ücret Ekle</label>
                        <input placeholder="Salon 1" type="text" name="mainhall" required><br />
                        <input placeholder="Salon 2" type="text" name="viphall" required><br />
                        <input placeholder="Özel Salon" type="text" name="privatehall" required><br />
                        <label>Poster Ekle</label>
                        <input type="file" name="movieImg" accept="image/*">
                        <button type="submit" value="submit" name="submit" class="form-btn">Film Ekle</button>
                        <?php
                        if (isset($_POST['submit'])) {
                            $insert_query = "INSERT INTO 
                            movieTable (  movieImg,
                                            movieTitle,
                                            movieGenre,
                                            movieDuration,
                                            movieRelDate,
                                            movieDirector,
                                            movieActors,
                                            mainhall,
                                            viphall,
                                            privatehall)
                            VALUES (        'img/" . $_POST['movieImg'] . "',
                                            '" . $_POST["movieTitle"] . "',
                                            '" . $_POST["movieGenre"] . "',
                                            '" . $_POST["movieDuration"] . "',
                                            '" . $_POST["movieRelDate"] . "',
                                            '" . $_POST["movieDirector"] . "',
                                            '" . $_POST["movieActors"] . "',
                                            '" . $_POST["mainhall"] . "',
                                            '" . $_POST["viphall"] . "',
                                            '" . $_POST["privatehall"] . "')";
                           $rs= mysqli_query($con, $insert_query);
                           if ($rs) {
                            echo "<script>alert('Sussessfully Submitted');
                                  window.location.href='addmovie.php';</script>";
                        }
                        }
                        ?>
                    </form>
                </div>
                <div class="admin-section-panel admin-section-panel2">
                    <div class="admin-panel-section-header">
                        <h2>Son Eklenenler</h2>
                        <i class="fas fa-film" style="background-color: #4547cf"></i>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>FilmID</th>
                            <th>Film Adı</th>
                            <th>Film Türü</th>
                            <th>Çıkış Tarihi</th>
                            <th>Yönetmen</th>
                            <th>Kaldır</th> 
                            
                        </tr>
                        <tbody>
                            <?php
                            $host = "localhost"; 
                            $user = "root"; 
                            $password = "12345678"; 
                            $dbname = "cms"; 

                            $con = mysqli_connect($host, $user, $password, $dbname);
                            $select = "SELECT * FROM `movietable`";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $ID = $row['movieID'];
                                $title = $row['movieTitle'];
                                $genere = $row['movieGenre'];
                                $releasedate = $row['movieRelDate'];
                                $movieactor = $row['movieDirector'];
                            ?>
                                <tr align="center">
                                    <td><?php echo $ID; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $genere; ?></td>
                                    <td><?php echo $releasedate; ?></td>
                                    <td><?php echo $movieactor; ?></td>
                                    <!--<td><?php echo  "<a href='deletemovie.php?id=" . $row['movieID'] . "'>delete</a>"; ?></td>-->
                                    <td><button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-danger"><?php echo  "<a href='deletemovie.php?id=" . $row['movieID'] . "'>KALDIR</a>"; ?></button></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <script src="../scripts/jquery-3.3.1.min.js "></script>
    <script src="../scripts/owl.carousel.min.js "></script>
    <script src="../scripts/script.js "></script>
</body>

</html>