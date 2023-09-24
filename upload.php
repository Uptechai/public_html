<?php
session_start();

// // Check if the user has any remaining credits
// if (!isset($_SESSION['credits'])) {
//     // Set the initial credits to 3 if it's not already set
//     $_SESSION['credits'] = 1;
// }

// // Check if the user has exceeded the 24-hour limit
// if (isset($_SESSION['last_request_time']) && time() - $_SESSION['last_request_time'] > 24 * 60 * 60) {
//     // Reset the credits to 1 if the 24-hour limit has passed
//     $_SESSION['credits'] = 1;
// }

// // Update the last request time to the current time
// $_SESSION['last_request_time'] = time();
 
$mode = $_GET["img"];

switch($mode) {
    case 'first':
        echo "<script>document.getElementById('currentUpload').click();</script>";
        break;
    case 'second':
        break;
}
$allowedIP = '217.230.159.225';

$clientIP = $_SERVER['REMOTE_ADDR'];

if ($clientIP === $allowedIP) {
    // IP address matches, perform desired actions here
    // echo "Access granted for IP: $clientIP";
    $_SESSION["credits"] = 3;
} else {
    // IP address does not match, deny access
    // echo "Access denied for IP: $clientIP. Current IP: $clientIP";
}
?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studio - Uptechai</title>
    <link rel="stylesheet" href="../styles\main.css">
    <link rel="icon" type="image/png" href="production-images/favicon/favicon-500x500.png" sizes="32x32">
    <!-- DO NOT REMOVE THE LINES BELOW -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/konva@8.4.3/konva.min.js"></script>
<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://uptechai.matomo.cloud/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src='//cdn.matomo.cloud/uptechai.matomo.cloud/matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

</head>
<body>
    <div id="app-page-root" class="w-100 flex flex-column bg-gray-200" style="height: 80vh;">
        
        <!---->
        <!---->
        
        <?php require("templates/navbar.php"); ?>
           
        <!---->
        <!---->
        
        
        <div data-preview-box class="dn z-5 w-100 justify-center items-center pv6" style="display: flex; margin-top: 78px;">
                <div class="br3 ba w-100 ph3 bg-white b-gray-300 shadow-300" style="max-width: 900px;">
                    <div class="flex justify-end w-100 pt3 pr3"><div data-closeCanvis onclick="location.reload();" class="cursor-pointer"><svg height="32" width="32" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></div></div>
                    <div class="flex flex-column m_flex-row pb3 justify-between">
                        <div class="w-100 h-100" style="max-width: 512px; max-height: 512px;">
                            <div class="relative flex justify-center" style="height: 512px;">
                                <!---->
                                <div data-processing-indicator class="absolute dn" style="height: 512px; width: 512px; z-index: 7;">
                                    <div class="loading-container">
                                        <div id="loading-div"></div>
                                    </div>
                                </div>
                                <!---->
                                <canvas data-canva id="canvasOne" class="br3 shadow-300 absolute aspect-ratio-1x1 overflow-hidden bg-center checkerboard" style="height: 512px; width: 512px; z-index: 6;"></canvas>
                                <canvas data-canva id="canvasTwo" class="br3 shadow-300 absolute aspect-ratio-1x1 overflow-hidden bg-center checkerboard dn" style="height: 512px; width: 512px; z-index: 5;"></canvas>
                                <canvas data-canva id="canvasThree" class="br3 shadow-300 absolute aspect-ratio-1x1 overflow-hidden bg-center checkerboard dn" style="height: 512px; width: 512px; z-index: 4;"></canvas>
                                <div class="absolute" style="z-index: 3; width: 512px; height: 512px"></div><span class="dn items-center pr3 absolute bg-gray br2 white pa3" style="margin-top: 220px; display: flex; z-index: 8;" data-remBgSpinner>Removing background<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></span>
                            </div>
                        </div>
                        <div class="relative w-100 mr3 flex flex-column" style="max-width: 230px;">
                            <p class="tbody-4 mt3 mb0">Background:</p>
                            <!---->
                            <div class="flex flex-row mt3 mb3 w-100 overflow-hidden br3 ba b-main bw-2" style="justify-content: space-around;">
                                <button data-original class="btn-reset w-100 pv1 bg-main"><span class="tbody-4 black">Original</span></button>
                                <button data-none class="btn-reset w-100 pv1" style="border-right: 2px solid #fd3; border-left: 2px solid #fd3;"><span class="tbody-4 black">None</span></button>
                                <button data-shadow data-after-view  class="btn-reset w-100 pv1"><span class="tbody-4 black">Shadow</span></button>
                            </div>
                            <!---->
                            <button data-generate-btn class="w-90 btn-fill bg-gray br3 w-100 ph3 pv2 mt4 nowrap" <? if($_SESSION['credits'] == 0) {echo 'disabled=´true´';} ?>><span class="tbody-4 normal black">Regenerate</span></button>
                            <button data-download-btn class="w-90 btn-fill br3 w-100 ph3 pv2 mt4 nowrap"><span class="tbody-4 normal black">Download</span></button>
                            <span class="tbody-5 mt1 normal black-300 flex justify-center">Resolution: 512 x 512</span>
                            
                            <!---->
                            <div class="flex flex-column items-center mt5" style="justify-content: space-evenly;">
                                <p class="tbody-3">Did you like the result?</p>
                                <div class="flex flex-row w-100" style="justify-content: space-evenly;">
                                    <button data-feedback-btn='0' class="br3 ba btn-reset b-gray-300 pa3" style="height: 59px;">
                                        <svg height="25" width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                                        </svg>
                                    </button>
                                    <button data-feedback-btn='1' class="br3 ba btn-reset b-gray-300 pa3" style="height: 59px;">
                                        <svg height="25" width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 15h2.25m8.024-9.75c.011.05.028.1.052.148.591 1.2.924 2.55.924 3.977a8.96 8.96 0 01-.999 4.125m.023-8.25c-.076-.365.183-.75.575-.75h.908c.889 0 1.713.518 1.972 1.368.339 1.11.521 2.287.521 3.507 0 1.553-.295 3.036-.831 4.398C20.613 14.547 19.833 15 19 15h-1.053c-.472 0-.745-.556-.5-.96a8.95 8.95 0 00.303-.54m.023-8.25H16.48a4.5 4.5 0 01-1.423-.23l-3.114-1.04a4.5 4.5 0 00-1.423-.23H6.504c-.618 0-1.217.247-1.605.729A11.95 11.95 0 002.25 12c0 .434.023.863.068 1.285C2.427 14.306 3.346 15 4.372 15h3.126c.618 0 .991.724.725 1.282A7.471 7.471 0 007.5 19.5a2.25 2.25 0 002.25 2.25.75.75 0 00.75-.75v-.633c0-.573.11-1.14.322-1.672.304-.76.93-1.33 1.653-1.715a9.04 9.04 0 002.86-2.4c.498-.634 1.226-1.08 2.032-1.08h.384" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!---->
            <!---->
            
            <script>
                feedbackBtns = document.querySelectorAll("[data-feedback-btn]");
                
                // Add click event listener to each button
                feedbackBtns.forEach(function(button) {
                    button.addEventListener("click", function() {
                        var feedbackValue = button.getAttribute('data-feedback-btn');
                        console.log(feedbackValue);
                        if (feedbackValue == 1) {
                            downloadImage()
                        }
                        transmitFeedback(feedbackValue);
                    });
                });
                
                
                function downloadImage() {
                    let timestamp = new Date().getTime();
                  $(document).ready(function(){
                        $.ajax({
                          type: "POST",
                          url: "../safeNegImgs.php",
                          data: {
                            image: document.getElementById("canvasThree").toDataURL(),
                            timestamp: timestamp
                          },
                          cache: false,
                          success: function(data){
                              console.log("Feedback image saved successfully");
                          },
                          error: function(xhr, status, error){
                            console.error(xhr);
                            reject(error);
                          }
                        });
                    })
                }
                
                
                
                
                function transmitFeedback(feedbackValue) {
                    $(document).ready(function(){
                        $.ajax({
                          type: "POST",
                          url: "../updateFeedback.php",
                          data: {
                            feedbackValue: feedbackValue
                          },
                          cache: false,
                          success: function(data){
                              console.log("Feedback received successfully");
                          },
                          error: function(xhr, status, error){
                            console.error(xhr);
                            reject(error);
                          }
                        });
                    })
                }
            </script>

        
            <!---->
            <!---->
            
            <div data-upload-box class="absolute" style="width: fit-content; min-height: 100vh; left: 50%; right: 50%; transform: translate(-50%);">
                <div class="relative w-100 pt7">
                    <div class="flex flex-column mb6 m_mt6 mt5">
                        <p class="title black b mb0">Upload</p>
                        <p class="balck-300 normal mb0" style="font-size: 16px;">Start by uploading a product photo:</p>
                    </div>
                    <div>
                        <div class="flex flex-row">
                            <li class="bg-transparent">
                                <button class="h6 b-dashed shadow-300 bw-2 b-gray br3 bg-transparent relative flex flex-column items-center justify-center" type="file" style="width: 500px;" onclick="document.getElementById('currentUpload').click()" ondragover="handleDragOver(event)" ondrop="handleFileSelect(event)">
                                    <div class="flex items-center flex-column justify-center">
                                        <img class="h3 mb3 br3" src="https://uptechai.com/production-images/favicon/favicon-500x500.png">
                                        <div class="items-center" style="display:flex;">
                                            <svg class="main-color mr1" height="20" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.0" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg><span class="tbody-4 b main-color nowrap">Add Photo</span>
                                        </div>
                                    </div>
                                </button>
                                <input id="currentUpload" onchange="uploadFile(event);" class="dn" type="file" name="image">
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                
        <!---->
        <!---->
        <div class="pt6 bg-gray-200">
            <?php require("templates/footer.php"); ?>
        </div>
        <!---->
        <!---->
        
            
    </div>
    
    
<script>
    var mode = "<?php echo $_GET['img']; ?>"; // Retrieve the value of the "img" parameter from PHP
    var url = "production-images/sample-images/sample-" + mode + ".png";

    switch (mode) {
    case 'one':
    case 'two':
    case 'three':
        uploadUrl(url);
        break;
    default:
        // Handle other cases if needed
        break;
}
function uploadUrl(url) {
  try {
    document.querySelector("[data-preview-box]").classList.remove("dn");
    document.querySelector("[data-upload-box]").classList.add("dn");
    document.querySelector("[data-processing-indicator]").classList.remove("dn");
    

    var rembgEnabled = true;
    
    canvas = document.getElementById("canvasOne");
    
     canvas.width = 512; // Set the desired width of the canvas
    canvas.height = 512; // Set the desired height of the canvas
    
    const img = new Image();
    img.onload = function() {
      const ctx = canvas.getContext("2d");
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

      const base64data = canvas.toDataURL("image/png").split(",")[1];
      removebg(base64data);
    };
    img.src = url;
  } catch (error) {
    alert("Error: " + error.message);
  }
}



    let uploadBox = document.querySelector("[data-upload-box]");
    let previewBox = document.querySelector("[data-preview-box]");
    
    
    // send request to backend to remove the background
    function removebg(base64data) {
        console.log("sending request for removing background...");
        // Regular expression pattern to match the prefix
          var pattern = /^data:image\/png;base64,/i;
          // Use the replace method to remove the prefix
          base64data = base64data.replace(pattern, '');
    
          
        $(document).ready(function(){
            $.ajax({
              type: "POST",
              url: "../rembg.php",
              data: {
                base64data: base64data
              },
              cache: false,
              success: function(data){
                  canvasTwoEnabled = true;
                console.log(data)
                base64data = data.result;
                console.log(base64data);
                document.querySelector("[data-processing-indicator]").classList.add("dn");
                document.getElementById("canvasOne").classList.add("dn");
                document.getElementById("canvasTwo").classList.remove("dn");
                document.querySelector("[data-original]").classList.remove("bg-main");
                document.querySelector("[data-none]").classList.add("bg-main");
                const canva = "canvasTwo";
                drawOnCanvas(canva, base64data);
                drawShadows();
              },
              error: function(xhr, status, error){
                console.error(xhr);
                reject(error);
              }
            });
        })
    }
    



    
    // used to draw the generated images on the canvases
    function drawOnCanvas(canva, base64data) {
        canvas = document.getElementById(canva);
        ctx = canvas.getContext("2d");
        
        // create a new image with the base64 data
        const img = new Image();
        img.onload = () => {
        let ratio = 512 / img.width;
        canvas.width = 512;
        canvas.height = img.height * ratio;
        
        // Draw the image on the canvas
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
        
        };
        img.src = "data:image/png;base64," + base64data;
    }
    
function drawShadows() {
  console.log("sending request for generating shadow image...");

  setTimeout(function() {
    console.log("Timeout completed");
    const base64image = document.getElementById("canvasTwo").toDataURL();

    $(document).ready(function() { 
      $.ajax({
        type: "POST",
        url: "../drawShadows.php",
        data: {
          base64data: base64image
        },
        cache: false,
        success: function(data) {
        //   const base64data = data;
          var parsedData = JSON.parse(data);
          const base64data = parsedData.base64data;
          const credits = parsedData.credits;
          if (credits == 0) {
              document.querySelector("[data-credit-score]").classList.add("red");
              document.querySelector("[data-processing-indicator]").classList.add("red");
          }
          document.querySelector("[data-credit-score]").innerText = `${credits} Credits left`;
          
          document.querySelector("[data-processing-indicator]").classList.add("dn");
          document.getElementById("canvasTwo").classList.add("dn");
          document.getElementById("canvasOne").classList.add("dn");
          document.getElementById("canvasThree").classList.remove("dn");
          document.querySelector("[data-none]").classList.remove("bg-main");
          document.querySelector("[data-shadow]").classList.add("bg-main");
          const canvas = "canvasThree";

          drawOnCanvas(canvas, base64data);
        },
        error: function(xhr, status, error) {
          console.error(xhr);
          reject(error);
        }
      });
    });
  }, 1000); // 3000 milliseconds = 3 seconds
}

    
    
    
    
    
    
    
    function uploadFile(event) {
      uploadBox.classList.add("dn");
      var rembgEnabled = true;
      
      canvas = document.getElementById("canvasOne");
      const file = event.target.files[0];
      const extension = file.name.split(".").pop().toLowerCase();
    
      previewBox.classList.remove("dn");
    
      const reader = new FileReader();
      reader.onload = (event) => {
        const img = new Image();
        img.onload = (e) => {
          let imgWidth, imgHeight, offsetX, offsetY;
          const canvasSize = 512;
          const canvasAspectRatio = 1;
          const imageAspectRatio = e.target.width / e.target.height;
    
          if (imageAspectRatio >= canvasAspectRatio) {
            imgWidth = canvasSize;
            imgHeight = canvasSize / imageAspectRatio;
            offsetX = 0;
            offsetY = (canvasSize - imgHeight) / 2;
          } else {
            imgWidth = canvasSize * imageAspectRatio;
            imgHeight = canvasSize;
            offsetX = (canvasSize - imgWidth) / 2;
            offsetY = 0;
          }
    
          canvas.width = canvasSize;
          canvas.height = canvasSize;
    
          ctx = canvas.getContext("2d");
          ctx.drawImage(img, offsetX, offsetY, imgWidth, imgHeight);
    
          // get image data
          const imageData = ctx.getImageData(0, 0, canvasSize, canvasSize);
    
    
          // check if the image is already transparent
          let transparentPixels = 0;
          for (let i = 0; i < imageData.data.length; i += 4) {
            const alpha = imageData.data[i + 3];
            if (alpha === 0) {
              transparentPixels++;
            }
          }
          const transparentPercentage =
            (transparentPixels / (imageData.data.length / 4)) * 100;
          if (transparentPercentage >= 45) {
            // the image is already transparent, do nothing
            rembgEnabled = false;
          }
    
          // put the modified image data back onto the canvas
          ctx.putImageData(imageData, 0, 0);
    
          canvas.toBlob((blob) => {
            const reader = new FileReader();
            reader.onload = () => {
              base64data = reader.result.split(",")[1];
              originalImage = base64data;
              if (rembgEnabled) {
                document.querySelector("[data-processing-indicator]").classList.remove("dn");
                removebg(base64data);
              } else {
                document.querySelector("[data-original]").classList.remove("bg-main");
                document.querySelector("[data-processing-indicator]").classList.remove("dn");
                drawOnCanvasTwo(base64data);
                drawShadows();
              }
            };
            reader.readAsDataURL(blob);
          }, "image/png");
        }; // This is the closing brace for img.onload
    
        img.src = event.target.result;
      }; // This is the closing brace for reader.onload
    
      reader.readAsDataURL(file);
    } // This is the closing brace for the uploadFile function
    
    // if the image background is already removed put the image on the second canvas
    function drawOnCanvasTwo(base64data) {
      canvasTwo = document.getElementById("canvasTwo");
      ctxTwo = canvasTwo.getContext("2d");
    
      // create a new image with the base64 data
      const img = new Image();
      img.onload = () => {
        let ratio = 512 / img.width;
        canvasTwo.width = 512;
        canvasTwo.height = img.height * ratio;
    
        // Draw the image on the canvas
        ctxTwo.drawImage(img, 0, 0, canvasTwo.width, canvasTwo.height);
    
      };
      img.src = "data:image/png;base64," + base64data;
      rembgEnabled = true;
      
    //   
    // 
    
    }
</script>

<script>
let originalBtn = document.querySelector("[data-original]");
let noneBtn = document.querySelector("[data-none]");
let shadowBtn = document.querySelector("[data-shadow]");

let canvasOne = document.getElementById("canvasOne");
let canvasTwo = document.getElementById("canvasTwo");
let canvasThree = document.getElementById("canvasThree");

originalBtn.addEventListener("click", () => {
    console.log("clicking on original")
    originalBtn.classList.add("bg-main");
    shadowBtn.classList.remove("bg-main");
    noneBtn.classList.remove("bg-main");
    // 
    canvasOne.classList.remove("dn")
    canvasTwo.classList.add("dn");
    canvasThree.classList.add("dn");
})
noneBtn.addEventListener("click", () => {
    noneBtn.classList.add("bg-main");
    originalBtn.classList.remove("bg-main");
    shadowBtn.classList.remove("bg-main");
    // 
    canvasTwo.classList.remove("dn");
    canvasOne.classList.add("dn");
    canvasThree.classList.add("dn");
})
shadowBtn.addEventListener("click", () => {
    shadowBtn.classList.add("bg-main");
    originalBtn.classList.remove("bg-main");
    noneBtn.classList.remove("bg-main");
    // 
    canvasOne.classList.add("dn");
    canvasTwo.classList.add("dn");
    canvasThree.classList.remove("dn");
})
</script>


<!-- download function -CURRENT IMAGE- -->
    
<script>
function downloadBase64Image(base64data) {
  // Create a temporary link element
  const link = document.createElement('a');
  link.href = base64data;
  link.download = "uptechai-deliver.png";

  // Simulate a click on the link to trigger the download
  link.click();
}

const downloadBtn = document.querySelector("[data-download-btn]");

downloadBtn.addEventListener("click", () => {
    
    // Loop through all canvas and get the active one
    let canvas = document.querySelectorAll("[data-canva]");
    
    canvas.forEach(element => {
        if (!element.classList.contains("dn")) {
            // Create a temporary link element
              var link = document.createElement('a');
            
              // Set the href attribute to the data URL of the canvas image
              link.href = element.toDataURL();
            
              // Set the download attribute to the desired filename
              link.download = "uptechai-delivery";
            
              // Simulate a click on the link element to trigger the download
              link.click();
        }
    })
})
</script>


<script>
    document.querySelector("[data-generate-btn").addEventListener("click", () => {
        document.querySelector("[data-processing-indicator]").classList.remove("dn");
        drawShadows();
    })
</script>  
    
 
 
 
 
 
 
 
 
 
    <!--the style for the removing background spinner-->
    <style>
     .loading-container {
      position: relative;
      height: 100%;
    }
    
    #loading-div {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #fd3; 
      opacity: 1;
      animation: glow 1.5s infinite alternate;
    }
    
    @keyframes glow {
      0% {
        background-color: #fd3;
        opacity: 0.8;
      }
      100% {
        background-color: #fd3;
        opacity: 0.1;
      }
    }

    </style>
    <style>
    button[disabled] {
        opacity: 0.7;
        cursor: not-allowed;
    }
    button[disabled]:hover {
        box-shadow: none;
    }
    .aspect-ratio-1x1 {
        aspect-ratio: 1 / 1;
    }
    canvas {
        height: 512px!important;
        width: 512px!important;
    }
    #stage-parent {
        width: 512!important;
      }
      canvas[Attributes Style] {
        aspect-ratio: 512 / 512;
    }
    /* Style the dropdown */
    select {
      padding: 7px;
      font-size: 14px;
      border: none;
      border-radius: 4px;
      background-color: #fff;
      color: #333;
      cursor: pointer;
      font-weight: 400;
    }
    
    /* Style the dropdown arrow */
    select::-ms-expand {
      display: none;
    }
    
    select::-webkit-select-arrow {
      display: none;
    }
    
    select::after {
      content: "\25BC";
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      pointer-events: none;
    }
    
    /* Style the dropdown options */
    option {
      padding: 7px;
      font-size: 14px;
      background-color: #fff;
      color: #333;
    }
    .paidaccess {
      background: #fff;
      opacity: 0.4;
      position: relative;
      pointer-events: none;
    }
    .asset-btn {
        border: 2px solid #fff;
        border-radius: 4px;
        margin-right: 8px; 
        height: 120px;
        width: 120px;
        position: relative;
    }
    .asset-btn:hover {
        border: 3px solid #f8c237;
    }
    .dropzone-yellow {
        background: rgba(255, 221, 51, 0.3)!important;
    }
    input:focus {
      outline: #fd3;
    }
    .shimmer-box {
      background: linear-gradient(to right, rgba(240, 240, 240, 0.5) 0%, rgba(240, 240, 240, 0.9) 50%, rgba(240, 240, 240, 0.2) 100%);
      background-size: 200% 100%;
      animation: shimmerAnimation 2s infinite;
      margin-right: 16px;
      margin-bottom: 16px;
      width: 23%!important;
      max-width: 23%!important;
    }

    @keyframes shimmerAnimation {
      0% {
        background-position: 200% 0;
      }
      100% {
        background-position: -200% 0;
      }
    }
    .loading-bar {
      width: 100%;
      height: 4px;
      background-color: #f2f2f2;
    }

    .progress {
      position: absolute;
      top: 0;
      left: 0;
      width: 0%;
      height: 5px;
      background-color: #fd3;
      animation: progressAnimation 2s linear infinite;
    }

    @keyframes progressAnimation {
      0% {
        width: 0%;
      }
      50% {
        width: 100%;
        left: 0;
      }
      100% {
        width: 0%;
        left: 100%;
      }
    }
    .horizontal-slide {
        overflow-x: scroll;
    }
    .horizontal-slide::-webkit-scrollbar {
        height: 3px;
        background: lightgray;
    }
    .horizontal-slide::-webkit-scrollbar-thumb {
        height: 3px;
        background: darkgray;
    }
    .vertical-slide {
        overflow-y: scroll;
    }
    .vertical-slide::-webkit-scrollbar {
        display: none;
    }
    .prompt-phrase {
        width: fit-content;
        padding-left: 3px;
        white-space: nowrap;
        font-weight: 400;
    }
    </style>
</body>