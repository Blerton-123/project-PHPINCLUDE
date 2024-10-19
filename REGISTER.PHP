<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration - MOVIES.COM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-image: url('bg.jpg'); background-size: cover; background-repeat: no-repeat; height: 100vh;">
    <div class="container d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
        <h1 class="my-4">MOVIES.COM</h1>
        <h2 class="scrolling-text">REGISTER NOW!, REGISTER NOW!, REGISTER NOW!, REGISTER NOW!</h2>

        <div class="row justify-content-center mt-5 w-100">
            <div class="col-md-6 col-lg-4">
                <form action="" method="post" class="p-4 bg-light rounded">
                    <div class="mb-3">
                        <input type="text" name="name" id="name" class="form-control" required placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="surname" id="surname" class="form-control" required placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <input type="number" name="phonenumber" id="phonenumber" class="form-control" required placeholder="Phone Number">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST["submit"])) {
            $name = htmlspecialchars($_POST["name"] ?? '');
            $surname = htmlspecialchars($_POST["surname"] ?? '');
            $phonenumber = htmlspecialchars($_POST["phonenumber"] ?? '');

      
            $errors = [];
            if (empty($name)) $errors[] = "Name is required.";
            if (empty($surname)) $errors[] = "Surname is required.";
            if (empty($phonenumber)) $errors[] = "Phone number is required.";

            if (empty($errors)) {
                $_SESSION["name"] = $name;
                $_SESSION["surname"] = $surname;
                $_SESSION["phonenumber"] = $phonenumber; 
                header("Location: login.php");
                exit();
                error_reporting(E_ALL);
            } else {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
    .scrolling-text {
        color: aliceblue;
        white-space: nowrap; 
        overflow: hidden; 
        box-sizing: border-box;
        animation: scroll 25s linear infinite; 
    }

    @keyframes scroll {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }

    h1 {
        font-size: 2.5rem; 
        margin: 0; 
        color: azure;
        text-decoration: underline #333;
    }

    @media (max-width: 768px) {
        h1 { font-size: 2rem; }
        .scrolling-text { font-size: 6vw; }
    }

    @media (max-width: 576px) {
        h1 { font-size: 1.5rem; }
        .scrolling-text { font-size: 8vw; }
    }
    </style>
</body>
</html>
