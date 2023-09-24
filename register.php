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
    <title>Register - Uptechai</title>
    <link rel="stylesheet" media="all" href="styles/zara.css">
    <script>
        window.global = window;
    </script>  
</head>

<body>
    <div id="app-page-root">
        <div class="flex flex-column">
            <!-- global header is embeded here  -->
            <?php include("templates/navbar.php"); ?>

            <div class="section">
                <div class="center pb6 mt7" style="max-width:470px;">
                    <h1 class="headline-semi">Create an account</h1>
                    <div class="">
                        <form action="/input_validation/signup.php" data-input_form method="post" novalidate>
                            <div class="flex flex-column">
                                <div class="mb3 w-100">
                                    <div><label for="usr_email" class="b mb1 block">Email</label>
                                            <div class="relative inline-flex w-100 z-0 ba b-gray br3"><input type="email" data-errEm class="w-100 btn-reset pa3" autofocus="" name="usr_email" value="" id="usr_email">
                                        </div>
                                    </div>
                                    <div data-email class="error_font"></div>
                                    
                                </div>
                                <div class="mb3 w-100">
                                    <div><label for="usr_password" class="b mb1 block">Password</label>
                                        <div class="relative inline-flex w-100 z-0 ba b-gray br3"><input type="password" data-errPw class="w-100 btn-reset pa3" autofocus="" name="usr_password" value="" id="usr_password">
                                        </div>
                                    </div>
                                    <div data-password class="error_font"></div>
                                </div>
                            </div>
                            <?php
                            if (isset($_GET['invalid'])) {
                                $invalid = $_GET['invalid'];
                                if ($invalid == 'true') {
                                    echo "<p class='red'>Input error.</p>";
                                }
                                if ($invalid == 'true-email') {
                                    echo "<p class='red'>An account with this email adress already exists.</p>";
                                }
                            }
                            ?>
                            <div class="mt4">
                                <p class="tbody-5">By creating a customer account,
                                    <!-- -->you agree to our
                                    <!-- --><a href="../legal/terms-and-conditions" target="_blank" class="underline tbody-5"> terms of use</a>
                                    <!-- -->and 
                                    <!-- --><a href="../legal/privacy-policy" target="_blank" class="underline tbody-5"> privacy policy</a>.</p>
                            </div>
        
                      <div class="mt4"><button class="w-100 bg-main btn-reset br3" type="submit" id="submitBtn" style="height: 53px;"><span class="white b">Sign up</span></button></div>
                </form>
                </div>
                <p class="tc mt6">Do you already have an account? <a href="/login">Log in</a>.</p>
                </div>
                </div>
                </div>
                </div>
        </div>
        
</body>

</html>