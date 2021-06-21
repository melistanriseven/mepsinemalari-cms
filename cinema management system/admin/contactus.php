
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mesaj</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    
    <?php include('header.php'); ?>
    
    <div class="admin-container">
        
        <?php include('sidebar.php'); ?>
        <div class="container-lg">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Kullanıcılar ve <b>Mesajlar</b></h2>
                            </div>
                            
                        </div>
                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Mesaj ID</th>
                            <th>Adı</th>
                            <th>Soyadı</th>
                            <th>Email</th>
                            <th>Mesaj</th>
                            <th>Kaldır</th>
                        </tr>
                        <tbody>
                            <?php
                            include "config.php";
                            $host = "localhost";
                            $user = "root"; 
                            $password = ""; 
                            $dbname = "cinema_db"; 

                            $select = "SELECT * FROM `feedbacktable`";
                            $run = mysqli_query($con, $select);
                            while ($row = mysqli_fetch_array($run)) {
                                $id = $row['msgID'];
                                $firstname = $row['senderfName'];
                                $lastname = $row['senderlName'];
                                $email = $row['sendereMail'];
                                $message = $row['senderfeedback'];

                            ?>
                                <tr align="center">
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $firstname; ?></td>
                                    <td><?php echo $lastname; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $message; ?></td>
                                    <!--<td><?php echo  "<a href='Deletecontact.php?id=" . $row['msgID'] . "'>delete</a>"; ?></td>-->
                                    <td><button value="Book Now!" type="submit" onclick="" type="button" class="btn btn-danger"><?php echo  "<a href='Deletecontact.php?id=" . $row['msgID'] . "'>KALDIR</a>"; ?></button></td>
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