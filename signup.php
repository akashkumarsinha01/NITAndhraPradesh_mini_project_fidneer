<?php

@include 'config.php';
if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM user_form WHERE username = '$username' && password = '$pass'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exist!';
    } else {
        $insert = "INSERT INTO user_form(name,username,password) VALUES('$name','$username','$pass')";
        mysqli_query($conn, $insert);
        header('location:login.php');
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Inter:wght@400;500;600;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand" href="index.html"> <span style="color:#217059">FID</span>NEER</a>
    </nav>
    <?php
    if (isset($error)) {
        foreach ($error as $error) {
            echo '<span class="error-msg">' . $error . '</span>';
        };
    };
    ?>
    <main>
        <section class="sec1">
            <h2 class="head1">
                Find your perfect travel companion
            </h2>
            <p class="p1">
                Join our community of like-minded travelers and discover new destinations together.
            </p>
            <img src="signup/pic/undraw_traveling_yhxq 1.svg" alt="#">
        </section>
        <section class="sec2">
            <h2 class="head2">
                Create an Account
            </h2>
            <div class="create-account">
                <div class="continue-with-account">
                    <div class="continue-with-google">
                        <img src="signup/pic/Google logo.svg" alt="#">
                        <a class="link text1" href="#">Continue with Google</a>
                    </div>
                    <div class="continue-with-google">
                        <img src="signup/pic/facebook logo.svg" alt="#">
                        <a class="link text1" href="#">Continue with Facebook</a>
                    </div>
                </div>
                <h3 class="head3">-OR-</h3>
                <form action="" method="post">

                    <div class="input-body">
                        <label for="name" class="text2">First Name</label>
                        <input type="text" name="name" id="name" class="input-text">
                    </div>
                    <div class="input-body">
                        <label for="username" class="text2">Username</label>
                        <input type="username" name="username" id="username" class="input-text">
                    </div>
                    <div class="input-body">
                        <label for="password" class="text2">Password</label>
                        <input type="password" name="password" id="password" class="input-text">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            I accept the <span class="fidneer"><span style="color:#0BB685">FID</span>NEER </span><span
                                style="color:#376CF5"> Terms &
                                conditions</span>
                        </label>
                    </div>
                    <button class="button" name="submit" value="register now">Create Account</button>
                </form>
            </div>
            <div class="text2 login">Already have an account? <a href="login.php"
                    class="link ms-1 text-primary">Login</a></div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
    </script>
</body>

</html>