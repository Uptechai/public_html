<?php
session_start();
?>
<link rel="stylesheet" href="styles/zara.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Generate high-quality product photos for your e-commerce store. Our AI tool creates a background for your product based on your description. Start using now.">
    <meta name="keywords" content="product photos, e-commerce, background, AI, transparent background, image upload">
    <title>Product Photo Generator - Create High-Quality Images for Your E-commerce Store</title>
    <link rel="stylesheet" href="styles/main.css">
    <link rel="icon" type="image/png" href="production-images/favicon/favicon-500x500.png" sizes="32x32">
</head>
<body>
    <div id="app-page-root" class="bg-gray-200">
        <div class="flex flex-column justify-center">
            <!-- navbar  -->
            <?php
            if (isset($_SESSION["usrId"])) {
                include("templates/navbar-loggedin.php");
            } else {
                include("templates/navbar.php");
            }
            ?>
            <div class="flex mt7 w-100 section justify-center pt2">
                <div class="flex flex-column w-100" style="max-width: 1000px">
                    <div class="flex justify-between w-100">
                        <p class="b title">Showcase</p>
                    </div>
                    <div class="defaultProducts mb6">
                        <div class="flex flex-wrap">
                            <div data-image-container class='relative mr3 mb3' style='width: 29%'>
                                <img src='/production-images/showcase-images/sample-w3eu2.png'> 
                            </div>
                            <div data-image-container class='relative mr3 mb3' style='width: 29%'>
                                <img src='/production-images/showcase-images/sample-29sh3.png'> 
                            </div>
                            <div data-image-container class='relative mr3 mb3' style='width: 29%'>
                                <img src='/production-images/showcase-images/sample-982s3.png'> 
                            </div>
                            <div data-image-container class='relative mr3 mb3' style='width: 29%'>
                                <img src='/production-images/showcase-images/sample-93sh3l.png'> 
                            </div>
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/showcase-images/sample-38sg3l.png'> -->
                            <!--</div>-->
                            <div data-image-container class='relative mr3 mb3' style='width: 29%'>
                                <img src='/production-images/showcase-images/sample-48sh39.png'> 
                            </div>
                            <div data-image-container class='relative mr3' style='width: 29%'>
                                <img src='/production-images/showcase-images/sample-93hs9slj.png'>
                            </div>
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-18.jpeg' loading="lazy">-->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-two.png' loading="lazy"> -->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-16.png' loading="lazy"> -->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-4.png' loading="lazy">-->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-14.png' loading="lazy"> -->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-three.png' loading="lazy"> -->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-5.jpeg' loading="lazy"> -->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-6.jpeg' loading="lazy"> -->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-7.png' loading="lazy">-->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-8.png' loading="lazy"> -->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-10.png' loading="lazy">-->
                            <!--</div>-->
                            <!--<div data-image-container class='relative mr3 mb3' style='width: 29%'>-->
                            <!--    <img src='/production-images/sample-images/sample-17.jpeg' loading="lazy">-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
</body>
</html>