<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Login/styles.css">

    <title>Specskart</title>
</head>

<body>
    
    <div class="form-structor">
    <?php
    if (isset($_GET['error'])) { ?>
        <p class="error" style="display:inline;color:red;font-size:1.5max;font-weight:bold;opacity:1">
            <?php echo $_GET['error']; ?>
        </p>
    <?php } ?>
        <form action="./Login/New_user.php" method="post">
            <div class="signup">
                <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
                <div class="form-holder">
                    <input type="text" class="input" name="uname" placeholder="Username" />
                    <input type="password" class="input" name="psword" placeholder="Password" />
                    <input type="password" class="input" name="psword1" placeholder="Confirm Password" />
                </div>
                <button class="submit-btn">Sign up</button>
            </div>
        </form>
        <form action="./Login/login.php" method="post">
            <div class="login slide-up">
                <div class="center">
                    <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                    <div class="form-holder">
                        <input type="text" class="input" name="uname" placeholder="Username" />
                        <input type="password" class="input" name="psword" placeholder="Password" />
                    </div>

                    <button class="submit-btn">Log in</button>
                </div>
            </div>
        </form>

    </div>

    <script src="./Login/script.js"></script>
</body>

</html>