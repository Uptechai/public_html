<?php
session_start();
date_default_timezone_set('Europe/Berlin');
$mode = "enter_email";
if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}
if(count($_POST) > 0){
    switch ($mode) {
        case 'enter_email':
            $email = $_POST["usr_email"];
            $_SESSION["usr_email"] = $email;
            // validate usr email 
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                exit("Email Adresse ungültig!");
            }
            require("db-connection/user.php");
            $stmt = $conn->prepare("SELECT * FROM user_general WHERE usr_email = :email");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count == 1) {
                $row = $stmt->fetch();
                $name = $row["usr_email"];
                $id = $row["id"];
                $_SESSION["id"] = $id;
                $select = '1';
                $_SESSION["select"] = $select;
                $check_key = 1;
            } 
            require("db-connection/psw-recovery_conn.php");
            $expire = time() + (60 * 5);
            $code = rand(10000,99999);
            $_SESSION["token"] = $code;
            $stmt = $conn->prepare("INSERT INTO password_reset_temp (email, code, expire) VALUES (:email, :code, :expire)");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":code", $code);
            $stmt->bindParam(":expire", $expire);
            $stmt->execute();
    
            // send the email
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $from = "contact@uptechai.com";
            $to = $email;
            $subject = "Update password - Uptechai";
            $message = "
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                <meta name='viewport' content='width=device-width, initial-scale=1.0' />
                <meta name='x-apple-disable-message-reformatting' />
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                <meta name='color-scheme' content='light dark' />
                <meta name='supported-color-schemes' content='light dark' />
                <title></title>
                <style type='text/css' rel='stylesheet' media='all'>
                /* Base ------------------------------ */
                
                @import url('https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap');
                body {
                    width: 100% !important;
                    height: 100%;
                    margin: 0;
                    -webkit-text-size-adjust: none;
                }
                
                a {
                    color: #3869D4;
                }
                
                a img {
                    border: none;
                }
                
                td {
                    word-break: break-word;
                }
                
                .preheader {
                    display: none !important;
                    visibility: hidden;
                    mso-hide: all;
                    font-size: 1px;
                    line-height: 1px;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                }
                /* Type ------------------------------ */
                
                body,
                td,
                th {
                    font-family: Helvetica, Arial, sans-serif;
                }
                
                h1 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 22px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h2 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: left;
                }
                
                h3 {
                    margin-top: 0;
                    color: #333333;
                    font-size: 14px;
                    font-weight: bold;
                    text-align: left;
                }
                
                td,
                th {
                    font-size: 16px;
                }
                
                p,
                ul,
                ol,
                blockquote {
                    margin: .4em 0 1.1875em;
                    font-size: 16px;
                    line-height: 1.625;
                }
                
                p.sub {
                    font-size: 13px;
                }
                /* Utilities ------------------------------ */
                
                .align-right {
                    text-align: right;
                }
                
                .align-left {
                    text-align: left;
                }
                
                .align-center {
                    text-align: center;
                }
                
                .u-margin-bottom-none {
                    margin-bottom: 0;
                }
                /* Buttons ------------------------------ */
                
                .button {
                    background-color: #f8c237;
                    border-top: 7px #f8c237;
                    border-right: 7px #f8c237;
                    border-bottom: 7px #f8c237;
                    border-left: 7px #f8c237;
                    display: flex;
                    color: #eaf6fa!important;
                    height: 50px;
                    text-decoration: none;
                    border-radius: 3px;
                    -webkit-text-size-adjust: none;
                    box-sizing: border-box;
                    align-items: center!important;
                    justify-content:center!important;
                }
                
                .button--blue {
                    background-color: #f8c237;
                    border-top: 7px #f8c237;
                    border-right: 7px #f8c237;
                    border-bottom: 7px #f8c237;
                    border-left: 7px #f8c237;
                }
                
                @media only screen and (max-width: 500px) {
                    .button {
                    width: 100% !important;
                    text-align: center !important;
                    }
                }
                /* Attribute list ------------------------------ */
                
                .attributes {
                    margin: 0 0 21px;
                }
                
                .attributes_content {
                    background-color: #F4F4F7;
                    padding: 16px;
                }
                
                .attributes_item {
                    padding: 0;
                }
                /* Related Items ------------------------------ */
                
                .related {
                    width: 100%;
                    margin: 0;
                    padding: 25px 0 0 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .related_item {
                    padding: 10px 0;
                    color: #CBCCCF;
                    font-size: 15px;
                    line-height: 18px;
                }
                
                .related_item-title {
                    display: block;
                    margin: .5em 0 0;
                }
                
                .related_item-thumb {
                    display: block;
                    padding-bottom: 10px;
                }
                
                .related_heading {
                    border-top: 1px solid #CBCCCF;
                    text-align: center;
                    padding: 25px 0 10px;
                }
                /* Discount Code ------------------------------ */
                
                .discount {
                    width: 100%;
                    margin: 0;
                    padding: 24px;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #F4F4F7;
                    border: 2px dashed #CBCCCF;
                }
                
                .discount_heading {
                    text-align: center;
                }
                
                .discount_body {
                    text-align: center;
                    font-size: 15px;
                }
                /* Social Icons ------------------------------ */
                
                .social {
                    width: auto;
                }
                
                .social td {
                    padding: 0;
                    width: auto;
                }
                
                .social_icon {
                    height: 20px;
                    margin: 0 8px 10px 8px;
                    padding: 0;
                }
                /* Data table ------------------------------ */
                
                .purchase {
                    width: 100%;
                    margin: 0;
                    padding: 35px 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .purchase_content {
                    width: 100%;
                    margin: 0;
                    padding: 25px 0 0 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .purchase_item {
                    padding: 10px 0;
                    color: #51545E;
                    font-size: 15px;
                    line-height: 18px;
                }
                
                .purchase_heading {
                    padding-bottom: 8px;
                    border-bottom: 1px solid #EAEAEC;
                }
                
                .purchase_heading p {
                    margin: 0;
                    color: #85878E;
                    font-size: 12px;
                }
                
                .purchase_footer {
                    padding-top: 15px;
                    border-top: 1px solid #EAEAEC;
                }
                
                .purchase_total {
                    margin: 0;
                    text-align: right;
                    font-weight: bold;
                    color: #333333;
                }
                
                .purchase_total--label {
                    padding: 0 15px 0 0;
                }
                
                body {
                    background-color: #F2F4F6;
                    color: #51545E;
                }
                
                p {
                    color: #51545E;
                }
                
                .email-wrapper {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #F2F4F6;
                }
                
                .email-content {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                /* Masthead ----------------------- */
                
                .email-masthead {
                    padding-top: 25px;
                    text-align: center;
                }
                
                .email-masthead_logo {
                    width: 94px;
                }
                
                .email-masthead_name {
                    font-size: 27px;
                    font-weight: bold;
                    color: #343434;
                    text-decoration: none;
                    font-family: 'Baloo 2', cursive;
                }

                /* Body ------------------------------ */
                
                .email-body {
                    width: 100%;
                    margin: 0;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                }
                
                .email-body_inner {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    -premailer-width: 570px;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    background-color: #FFFFFF;
                }
                
                .email-footer {
                    width: 570px;
                    margin: 0 auto;
                    padding: 0;
                    -premailer-width: 570px;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    text-align: center;
                }
                
                .email-footer p {
                    color: #A8AAAF;
                }
                
                .body-action {
                    width: 100%;
                    margin: 30px auto;
                    padding: 0;
                    -premailer-width: 100%;
                    -premailer-cellpadding: 0;
                    -premailer-cellspacing: 0;
                    text-align: center;
                }
                
                .content-cell {
                    padding: 45px;
                }


                /*Media Queries ------------------------------ */
                
                @media only screen and (max-width: 600px) {
                    .email-body_inner,
                    .email-footer {
                    width: 100% !important;
                    }
                }
                
                @media (prefers-color-scheme: dark) {
                    body,
                    .email-body,
                    .email-body_inner,
                    .email-content,
                    .email-wrapper,
                    .email-masthead,
                    .email-footer {
                    background-color: #fff !important;
                    color: #000000 !important;
                    }
                    p,
                    ul,
                    ol,
                    blockquote,
                    h1,
                    h2,
                    h3,
                    .purchase_item {
                    color: #000000 !important;
                    }
                    .attributes_content,
                    .discount {
                    background-color: #222 !important;
                    }
                    .email-masthead_name {
                    text-shadow: none !important;
                    }
                }
                
                :root {
                    color-scheme: light dark;
                    supported-color-schemes: light dark;
                }
                </style>
                <!--[if mso]>
                <style type='text/css'>
                    .f-fallback  {
                    font-family: Arial, sans-serif;
                    }
                </style>
                <![endif]-->
                </head>
                <body>
                <p class='preheader'>Use this code to reset your password. The code is valid for 15 minutes.</p>
                <table class='email-wrapper' width='100%' cellpadding='0' cellspacing='0' role='presentation'>
                    <tr>
                    <td align='center'>
                        <table class='email-content' width='100%' cellpadding='0' cellspacing='0' role='presentation'>
                        <tr>
                            <td class='email-masthead'>
                            <a href='https://www.uptechai.com' class='f-fallback email-masthead_name'>
                            Uptechai<span style='font-color:#f8c237!important;'>.</span>
                            </a>
                            </td>
                        </tr>
                        <!-- Email Body -->
                        <tr>
                            <td class='email-body' width='570' cellpadding='0' cellspacing='0'>
                            <table class='email-body_inner' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
                                <!-- Body content -->
                                <tr>
                                <td class='content-cell'>
                                    <div class='f-fallback'>
                                    <h1>Hi $name,</h1>
                                    <p>You recently requested to reset your password for your Uptechai account. Here is the code to reset your password. <strong>This code is valid for the next 15 minutes.</strong>You recently requested to reset your password for your Uptechai account. Here is the code to reset your password. <strong>This code is valid for the next 15 minutes.</strong></p>
                                    <!-- Action -->
                                    <table class='body-action' align='center' width='100%' cellpadding='0' cellspacing='0' role='presentation'>
                                        <tr>
                                        <td align='center'>
                                            <table width='100%' border='0' cellspacing='0' cellpadding='0' role='presentation'>
                                            <tr>
                                                <td align='center'>
                                                <div class='f-fallback button button--blue'><div style='color:#eaf6fa;font-size:20px;font-weight:bold;padding-top:20px;padding-bottom:20px;'>$code</div></div>
                                                </td>
                                            </tr>
                                            </table>
                                        </td>
                                        </tr>
                                    </table>
                                    <p>If you have not made these changes, please ignore this email or let us know at <span>contact@uptechai.com</d>.</p>
                                    <p>Thank you,
                                        <br>Your Uptechai team</p>
                                    <!-- Sub copy -->
                                    </div>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <table class='email-footer' align='center' width='570' cellpadding='0' cellspacing='0' role='presentation'>
                                <tr>
                                <td class='content-cell' align='center'>
                                    <p class='f-fallback sub align-center'>
                                    @2023 Uptechai
                                    </p>
                                </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </table>
                </body>
            </html>
            ";
            // The content-type header must be set when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From:" . $from;
            if(mail($to,$subject,$message, $headers)) {
                header("location: forgot-password.php?mode=enter_code");
            } else {
                alert("Message was not sent.");
            }
            die;
        break;



        case 'enter_code':
            require("db-connection/psw-recovery_conn.php");
            $email = $_SESSION["usr_email"];
            $code = $_SESSION["token"];
            $currentTime = time();
            $stmt = $conn->prepare("SELECT * FROM password_reset_temp WHERE email = :email && code = :code"); 
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":code", $code);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count !== 0) {
                $row = $stmt->fetch();
                $_SESSION["expire"] = $row["expire"];
                if($_SESSION["expire"] > $currentTime) {
                    $_SESSION["code"] = $row["code"];
                    $code = $_SESSION["code"];
                    $usr_code = $_POST["code"];
                    if ($code !== $usr_code){
                        $noMatch = true;
                        die();
                    } else {
                        $SESSION["sessionKey"] = 1;
                        header("location: forgot-password.php?mode=enter_password");
                    }
                } if($_SESSION["expire"] < $currentTime) {
                    alert("Token is expired.");
                    die();
                }
            } else {
                // usr has no account 
                $_SESSION["noAcc"] = "true";
                header("location: forgot-password.php?mode=enter_code");
                die();
            } 
            header("location: forgot-password.php?mode=enter_password");
            die();
        break;



        case 'enter_password':
            $email = $_SESSION["usr_email"];
            $select = $_SESSION["select"];
            $id = $_SESSION["id"];
            $psw = $_POST["usr_password"];
            $hash = password_hash($psw, PASSWORD_BCRYPT);
            if($select = 1){
                require("db-connection/user.php");
                $sql = "UPDATE user_general SET usr_password=:psw WHERE id=$id;";
                $stmt= $conn->prepare($sql);
                $stmt->bindParam(":psw", $hash);
                $stmt->execute();
                header("location: login.php");
            }
            if($select = 2){
                require("db-connection/proceed-pro_conn.php");
                $sql = "UPDATE providers SET pro_password=:psw WHERE pro_id=$id;";
                $stmt= $conn->prepare($sql);
                $stmt->bindParam(":psw", $hash);
                $stmt->execute();
                header("location: login.php");
            }
            else {
                header("location: forgot-password.php?mode=enter_email");
                die;
            }
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset password - Uptechai</title>
    <meta name="description">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Uptechai">
    <meta property="og:image:type" content="image/jpeg">
    <link rel="canonical" href="https://www.uptechai.com/">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" media="all" href="../styles/zara.css">
    <link rel="icon" type="image/png" href="production-images/favicon/favicon-500x500.png" sizes="32x32">
    <script defer src="javascript/formValidation.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@700&display=swap" rel="stylesheet">
    <script>
        window.global = window;
    </script>  
</head>
<body>
    
<div id="app-page-root">
        <div class="flex flex-column relative">
            <?php
            include("templates/navbar.php");
            ?>

            <div class="relative">
                <div class="section">
                <?php
                switch ($mode){
                case 'enter_email':
                ?>
                        <!---->
                        <div class="mw7 center">
                            <h1 class="headline-semi pt6 mb0 tl">Forgot password?</h1>
                                <div class="flex justify-end pb3 pt2" data-test="labels">
                                    <p class="tbody-3">No problem, we know the struggle! Just provide us with your email address and we'll send you a code to reset your password.</p>
                                </div>   
                                    <form data-input_form id="signupForm" action="forgot-password.php?mode=enter_email" method="POST" accept-charset="UTF-8">     
                                        <label for="usr_email" class="black tbody-3">Email adress</label>
                                            <div class="ba b-gray bw-2 br3"><input type="email" class="bn pa3 w-100 br3 normal" placeholder="Email" autofocus="" id="usr_email" name="usr_email" value="<?= htmlspecialchars($_SESSION["usr_email"] ?? "") ?>">
                                            </div>
                                            <div id="errEMfield"></div>
                                            <button class="btn-fill mt4 ph3 pv2 br3" type="submit"><span class="black tbody-3">Send</span></button>
                                    </form>
                        </div>
                        <!---->
                <?php
                break;
                case 'enter_code':
                if(!$check_key == 1){
                    header("location:forgot-password.php?mode=enter_email");
                }
                ?>
                        <!---->
                        <div class="mw7 center">
                            <h1 class="headline-semi pt6 mb0 tl">Enter code:</h1> 
                            <p class="_3n1ubgNywOj7LmMk3eLlub pt2 pb3">We have sent you an email with a code to reset your password.</p>
                                    <form data-input_form id="signupForm" action="forgot-password.php?mode=enter_code" method="POST" accept-charset="UTF-8" abineguid="D75E0B31ED8F40079A8234FAFD4948A3">     
                                        <input type="hidden" name="csrf_token" value="ASibFTLKgB9tuLxVgv7_0_qkFswGga3XGs6YwS746bI="><label for="usr_email" class="C3ZJ7tn6y7IAgBqmOsKqd b CMcV-FHKJ-vRPLskO7Cbi">Code</label>
                                            <div class="ba b-gray bw-2 br3"><input type="text" class="bn pa3 w-100 br3 normal" autofocus="" name="code" value="" id="code">
                                                <div class="_uXwwlqjtq4857utXkPZR _hpUzguLZp6C8Ze1WaLWd _U7myuANYvcDdRAB2lee6 _WJUIecBtm3MXDn4wbJLf"></div>
                                            </div>
                                            <div id="errEMfield"></div>
                                            <div class="flex justify-end pv2" data-test="labels">
                                            </div><button id="submitBtn" name="loginBtn" class="btn-fill pv2 ph3 mt3 br3" type="submit"><span class="black tbody-4">Next</span></button>
                                    </form>
                        </div>
                        <!---->
                    <?php
                    break;
                    case 'enter_password':
                    ?>
                        <!---->
                        <div class="mw7 center">
                            <h1 class="headline-semi pb5 pt6 tl">Set your new password:</h1>   
                                    <form data-input_form id="signupForm" action="forgot-password.php?mode=enter_password" method="POST" accept-charset="UTF-8" abineguid="D75E0B31ED8F40079A8234FAFD4948A3">     
                                        <label for="usr_email" class="black b tbody-3">New password</label>
                                            <div class="ba b-gray bw-2 br3"><input type="password" class="bn pa3 w-100 br3 normal" placeholder="Password" autofocus="" name="usr_password" value="" id="usr_password">
                                            </div>
                                            <div id="errEMfield"></div>
                                            <div class="flex justify-end pv2" data-test="labels">
                                            </div><button id="submitBtn" name="loginBtn" class="btn-fill pv2 ph3 mt3 br3" type="submit"><span class="black tbody-4">Update password</span></button>
                                            
                                    </form>
                        </div>
                        <!---->
                    <?php
                    break;
                }
                ?>
                    
            </div>
    </div>
    </div>
    </div>
</body>