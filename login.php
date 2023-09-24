<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Uptechai">
    <!--<link rel="apple-touch-icon" sizes="180x180" href="production-images/favicon/apple-touch-icon.png">-->
    <link rel="icon" type="image/png" href="production-images/favicon/favicon-500x500.png" sizes="32x32">
    <title>Log in - Uptechai</title>
    <link rel="stylesheet" media="all" href="styles/zara.css">
    <script>
        window.global = window;
    </script>  
</head>

<body>
    <div id="app-page-root">
        <div class="flex flex-column justify-center">
            <div class="" style="--menu-drawer-height:874px;">
                <!-- global header is embeded here  -->
                <?php include("templates/navbar.php"); ?>
                
                <div class="section mt7">
                    <div class="center pb6" style="max-width:470px;">
                        <h1 class="headline-semi mb0">Welcome back</h1>
                        <div class="pb4"><p class="tbody-4 ma0">Enter your login credentials to continue.</p></div>
                        <div class="">
                            <form action="../input_validation/login.php" data-input_form method="post" novalidate>
                                <div class="flex flex-column">
                                    <div class="mb3 w-100">
                                        <div><label for="usr_email" class="b mb1 block">Email</label>
                                                <div class="relative inline-flex w-100 z-0 ba b-gray br3"><input type="email" data-errEm class="w-100 btn-reset pa3" autofocus="" name="usr_email" value="<? echo $_GET['email']; ?>" id="usr_email">
                                            </div>
                                        </div>
                                        <div data-email class="red tbody-5 mt1 normal"></div>
                                        
                                    </div>
                                    <div class="w-100">
                                        <div><label for="usr_password" class="b mb1 block">Password</label>
                                            <div class="relative inline-flex w-100 z-0 ba b-gray br3"><input type="password" data-errPw class="w-100 btn-reset pa3" autofocus="" name="usr_password" value="" id="usr_password">
                                            </div>
                                        </div>
                                        <div data-password class="red tbody-5 mt1 normal"></div>
                                    </div>
                                </div>
                                <a href="/forgot-password" class="black-300 tbody-6 w-100 flex justify-end">Forgot password?</a>
            
                                <?php 
                                if (isset($_GET["invalid"])) {
                                    echo "<p class='red tbody-5 mt2'>The entered email address or password is incorrect.</p>"; 
                                }
                                ?>
                          <div class="mt4"><button class="w-100 bg-main btn-reset br3" type="submit" id="submitBtn" style="height: 53px;"><span class="white b">Log in</span></button></div>
                    </form>
                    </div>
                    <p class="tc mt6">No Account? <a href="/register">Register here</a>.</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>

