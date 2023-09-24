<?php
session_start();

if (!$_SESSION["pricing_plan"] == 1) {
    header("location: member");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pricing - Uptechai">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Uptechai">
    <link rel="icon" type="image/png" href="https://uptechai.com/production-images/favicon/favicon-500x500.png" sizes="32x32">
    <title>Product Photo Generator - Create High-Quality Images for Your E-commerce Store</title>
    <link rel="stylesheet" media="all" href="styles/zara.css">
    <script>
        window.global = window;
    </script>  
</head>
<body>
    <div id="app-page-root">
        <div class="flex flex-column justify-center">
            <!-- navbar  -->
            <?php 
                include("templates/navbar-loggedin.php");
            ?>
            
            <div id="pricing">
                <div class="mt6 flex justify-center section" style="/*background: linear-gradient(to bottom, #fff , #ffe07d);*/">
                    <div class="relative overflow-hidden w-100 pv6 m_pt2 mw9">
                        <div class="relative overflow-hidden pb6">
                            <div class="subline pb2 main-color tc">Pricing</div>
                            <div class="black tc" style="font-size: 39px; line-height: 42px">The only AI tool you'll ever need</div>
                        </div>
                        <!---->
                        <script async src="https://js.stripe.com/v3/pricing-table.js"></script>
                        <stripe-pricing-table pricing-table-id="prctbl_1NHWFHIhMgyVjqao8JA3gpMY"
                        publishable-key="pk_live_51MnPINIhMgyVjqao4P5LUtJRCySOWepNQ1lDPrM4Q236nzTvc68rQvXNVUsb6HFuRn7HBN0bpXL71BU2BXuiRR0n00qxOd997H">
                        </stripe-pricing-table>
                        <!---->
                    </div>
                </div>
            </div>
            
            <!-- navbar  -->
            <?php 
                include("templates/footer.php");
            ?>
            
        </div>
    </div>
            