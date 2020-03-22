<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Image | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
        session_start();
        

        if (isset($_POST['submit'])){
            include_once "conn.php";
            $url = $_POST['image'];
            $caption = $_POST['caption'];

            $userupdate=$_SESSION['username'];

            $query = mysqli_query($conn, "INSERT INTO `accountpost` (`url`, `caption`, `like`, `username`) VALUES ('$url', '$caption', '0', '$userupdate');");

            // $_SESSION['status'] = "login";

            echo "<script type='text/JavaScript'>
            alert('Photo Uploaded');
            </script>";
            // echo "<script>
            // document.location.href = 'profile.php';
            // </script>";
        }
    ?>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <img src="images/logo.png" />
            </a>
        </div>
        <div class="navigation__column">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search">
        </div>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="uploadimage.php" class="navigation__link">
                        <i class="fa fa-file-image-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="explore.php" class="navigation__link">
                        <i class="fa fa-compass fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="edit-profile">
        <div class="edit-profile__container">
            <header class="edit-profile__header">
                <div class="edit-profile__avatar-container">
                    <img src="<?=$_SESSION['pp']?>" class="edit-profile__avatar" />
                </div>
                <h4 class="edit-profile__username"><?=$_SESSION['username'];?></h4>
            </header>
            <form action="uploadimage.php" class="edit-profile__form" method="post">
                <div class="form__row">
                    <label for="full-name" class="form__label">Image URL:</label>
                    <input id="full-name" type="text" class="form__input" name="image" stakeholder="insert here" required/>
                </div>
                <div class="form__row">
                    <label for="user-name" class="form__label">Caption:</label>
                    <input id="user-name" type="text" class="form__input" name="caption" stakeholder="insert here"/>
                </div>
                <input type="submit" value="Submit" name='submit'>
            </form>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>