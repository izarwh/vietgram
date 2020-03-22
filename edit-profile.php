<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
        session_start();
        

        if (isset($_POST['submit'])){
            include_once "conn.php";
            $name = $_POST['name'];
            $user = $_POST['username'];
            $web = $_POST['website'];
            $bio = $_POST['bio'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];

            $userupdate=$_SESSION['username'];

            $query = mysqli_query($conn, "ALTER TABLE accountpost drop constraint fk_toacc");
            $query = mysqli_query($conn, "ALTER TABLE accountpost drop index fk_toacc");
            // drop constrain dan index terlebih dahulu untuk mengedit primary key

            $query = mysqli_query($conn, "UPDATE account set nama = '$name', username = '$user' , website = '$web', bio = '$bio', email = '$email', phone = '$phone', gender = '$gender' WHERE username = '$userupdate';");
            $query = mysqli_query($conn, "UPDATE accountpost set username = '$user' where username='$userupdate';");

            $query = mysqli_query($conn, "ALTER TABLE accountpost add CONSTRAINT fk_toacc FOREIGN KEY (username) REFERENCES account(username); ");

            $data_profil = mysqli_query($conn, "SELECT * FROM account where username='$user';");
            $row = mysqli_fetch_array($data_profil);

            // mysqli_fetch_array to store top of the list data
            $_SESSION['username'] = $row['username'];
            // $_SESSION['status'] = "login";
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['website'] = $row['website'];
            $_SESSION['bio'] = $row['bio'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['pp'] = $row['profilepict'];

            echo "<script type='text/JavaScript'>
            alert('Profile updated');
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
            <form action="edit-profile.php" class="edit-profile__form" method="post">
                <div class="form__row">
                    <label for="full-name" class="form__label">Name:</label>
                    <input id="full-name" type="text" class="form__input" name="name" value="<?=$_SESSION['nama'];?>"/>
                </div>
                <div class="form__row">
                    <label for="user-name" class="form__label">Username:</label>
                    <input id="user-name" type="text" class="form__input" name="username" value="<?=$_SESSION['username'];?>" />
                </div>
                <div class="form__row">
                    <label for="website" class="form__label">Website:</label>
                    <input id="website" type="url" class="form__input" name="website" value="<?=$_SESSION['website'];?>"/>
                </div>
                <div class="form__row">
                    <label for="bio" class="form__label">Bio:</label>
                    <textarea id="bio" name="bio"><?=$_SESSION['bio'];?></textarea>
                </div>
                <div class="form__row">
                    <label for="email" class="form__label">Email:</label>
                    <input id="email" type="email" class="form__input" name="email" value="<?=$_SESSION['email']?>" />
                </div>
                <div class="form__row">
                    <label for="phone" class="form__label">Phone Number:</label>
                    <input id="phone" type="tel" class="form__input" name="phone" value="<?=$_SESSION['phone']?>"/>
                </div>
                <div class="form__row">
                    <label for="gender" class="form__label">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="cant">Can't remember</option>
                    </select>
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