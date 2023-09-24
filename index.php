<?php
session_start();

if (!isset($_SESSION["credits"])) {
    $_SESSION["credits"] = 3;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Generate high-quality product photos for your e-commerce store. Our AI tool creates a background for your product based on your description. Start using now.">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Uptechai">
    <link rel="icon" type="image/png" href="production-images/favicon/favicon-500x500.png" sizes="32x32">
    <title>Uptechai - Create High-Quality product images</title>
    <link rel="stylesheet" media="all" href="styles/main.css">
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

    <script>
        window.global = window;
    </script>  
</head>
<body>
    <div id="app-page-root">
        <div class="flex flex-column justify-center">
            <!-- navbar  -->
            <?php 
            if (!isset($_SESSION["usrId"])) {
              include("templates/navbar.php");   
            } if (isset($_SESSION["usrId"])) {
                header("location: member");
            }
            ?>
            <div style="margin-top: 78px;">
                <div class="flex w-100 section justify-center items-center" style="min-height: calc(100vh - 78px);">
                    <div class="flex m_flex-row flex-column ph4" style="flex-direction: column; max-width: 1150px; justify-content: space-evenly;">
                        <!--  -->
                        <div class="flex flex-column m_w-40" style="width: 100%;">
                            <video preload="auto" class="w-100" style="height: auto; border-radius: 20px;" poster="https://uptechai.com/production-images/main/video-preview.mp4" loop autoplay muted playsinline>
                                <source src="https://uptechai.com/production-images/main/video-preview.mp4" type="video/mp4">
                            </video>
                            <div class="flex flex-column mt4">
                                <h1 class="headline" style="line-height: initial;">Replace Image Background</h1>
                                <p class="tbody-3 normal" style="font-weight: 600;">Remove Backgrounds, Enhance Lighting, and Add Shadows. 100% Automatically and <span class="small-underline">Free</span></p>
                                <!--<p class="tbody-2" style="font-weight: 600;">100% Automatically and <span class="thick-underline">Free</span></p>-->
                            </div>
                        </div>
                        <!--  -->
                        <div class="relative flex flex-column w-40 mt6">
                            <div class="w-100 flex flex-column justify-center items-center bg-white b-main b-dashed bw-1" style="border-radius: 20px; box-shadow: 0px 0px 56px rgba(70,70,70,.2);">
                                <button type="button" onclick="window.location.href = 'https://uptechai.com/upload';" class="tc justify-center btn-reset pa3 b tbody-1 m_mt6 mt4 m_mb3 mb2 white" style="border-radius: 35px; background: dodgerblue!important">Upload Image</button>
                                <p class="tbody-4 black-300 mb2">OR</p>
                                <div class="overflow-hidden flex flex-column"><p class="tbody-3 black-300 tc m_mb5 pb3 mb3">Drag & Drop a file</p></div>
                            </div>
                            <div class="max-w-md m_mt5 mt3">
                                <div class="flex flex-col gap-2 flex-row justify-between items-center">
                                    <div class="flex flex-row m_flex-column justify-center">
                                        <span class="b tbody-4 black-300 mr1">No image?</span>
                                        <span class="b tbody-4 black-300">Try one of these:</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <button onclick="window.location.href='https://uptechai.com/upload.php?img=one';" class="btn-reset ba br3 b-gray bw-2 hover mr3" style="height: 55px; width: 55px; overflow: hidden;" ondragstart="return false;"><picture><img class="" src="https://uptechai.com/production-images/sample-images/sample-one.png" alt="Example image" class="w-full h-auto" loading="lazy" draggable="false"></picture><!----></button>
                                        <button onclick="window.location.href='https://uptechai.com/upload.php?img=two';" class="btn-reset ba br3 b-gray bw-2 hover mr3" style="height: 55px; width: 55px; overflow: hidden;" ondragstart="return false;"><picture><img class="" src="https://uptechai.com/production-images/sample-images/sample-two.png" alt="Example image" class="w-full h-auto" loading="lazy" draggable="false"></picture><!----></button>
                                        <button onclick="window.location.href='https://uptechai.com/upload.php?img=three';" class="btn-reset ba br3 b-gray bw-2 hover" style="height: 55px; width: 55px; overflow: hidden;" ondragstart="return false;"><picture><img class="" src="https://uptechai.com/production-images/sample-images/sample-three.png" alt="Example image" class="w-full h-auto" loading="lazy" draggable="false"></picture><!----></button>
                                    </div>
                                </div>
                                <p class="tbody-6 black-300">
                                    By uploading an image or URL you agree to our
                                    <a target="_blank" class="text-typo-secondary underline" draggable="false" href="/tos"><span class="tbody-6">Terms of Service</span></a>.
                                    This site is protected by hCaptcha and its
                                    <a target="_blank" rel="noopener" class="text-typo-secondary underline" draggable="false" href="https://hcaptcha.com/privacy"><span class="tbody-6">Privacy Policy</span></a>
                                    and
                                    <a target="_blank" rel="noopener" class="text-typo-secondary underline" draggable="false" href="https://hcaptcha.com/terms"><span class="tbody-6">Terms of Service</span></a>
                                    apply.
                                </p>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
                
                <div id="video-preview">
                    <div class="relative w-100 flex justify-center" style="background: #ffe07d; background-color: var(--main-color)!important">
                        <div class="pv7 ph5 mw-80">
                            <p class="headline-semi mb2 b m_tc">More Than Just A Background Remover</p>
                            <div class="w-100 flex justify-center mb3">
                                <p class="tbody-3 black m_tc mw7">Create transparent backgrounds instantly and turn your images into captivating product photos using latest AI technology.</p>
                            </div>
                            <div class="bg-white flex pa3" style="overflow: hidden; border-radius: 20px;">
                                <div class="container">
      
                                      <div class="img-box" data-img-box style="max-height: 560px;">
                                           <img class="checkerboard" style="max-height: 560px; border-radius: 15px;" src="https://uptechai.com/production-images/main/preview-slider-base-1.png">
                                          <div class="flex flex-row">
                                              <div class="flex img-toggler h-100" style="z-index: 4; width: 50%;" data-imgToggler></div>
                                              <div class="flex img-wrap" data-img-wrap style="width: fit-content!important;">
                                                  <img style="max-width: initial;" class="h-100" data-topImage src="https://uptechai.com/production-images/main/preview-slider-top-1.png">
                                              </div>
                                          </div>
                                      </div>
                                      
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section flex flex-column justify-center items-center m_pv7">
                    <div class="m_db w-100 mt4 mb5 m_mb6" style="max-width: 900px;">
                        <div>
                            <p class="tbody-3 black-300 tc b">Over 20,000 creatives have already joined our community - will you?</p>
                        </div>
                        <div class="justify-between flex">
                            <div class="flex flex-column"><p class="black b mb0" style="font-size: 50px;">20,000+</p><p class="main-color tbody-4 tc">Creatives</p></div>
                            <div class="flex flex-column"><p class="black b mb0" style="font-size: 50px;">600,000+</p><p class="main-color tbody-4 tc">Generations</p></div>
                            <div class="flex flex-column"><p class="black b mb0" style="font-size: 50px;">900+</p><p class="main-color tbody-4 tc">Brands</p></div>
                        </div>
                    </div>
                    <div class="" style="max-width: 1000px;">
                        <div class="flex flex-wrap justify-between">
                            <!---->
                            <div class="inline-block bg-main m_w-30 mb4 pa4 shadow-300 bg-main br3" style="background: #fd3;">
                                <div class="flex flex-column h-100">
                                    <p class="black mb5 mt3 tbody-2 h-100">"We are thoroughly impressed with the AI technology and firmly believe it to be the top choice available in the market."</p>
                                    <div class="w-100 mb5 bg-black" style="height: 1px;"></div>
                                    <div class="flex flex-row gap-4">
                                        <img style="border-radius: 50%; height: 45px; width: 45px; background-color: lightblue;" img="" src="https://uptechai.com/production-images/main/customer-one.png" alt="Robert's profile photo">
                                        <div class="flex flex-column ml3"><span class="black tbody-5 b">Robert Davidson</span><span class="tbody-5 normal black" style="line-height: 1;">CEO</span></div></div></div></div>
                            <!---->
                            <div class="inline-block bg-main m_w-30 mb4 pa4 shadow-300 bg-main br3" style="background: #fd3;">
                                <div class="flex flex-column h-100">
                                    <p class="black mb5 mt3 tbody-2 h-100">"Just tried out this new AI product image generator and subscribed because it was awesome! 😎 I'll be using this A LOT!"</p>
                                    <div class="w-100 mb5 bg-black" style="height: 1px;"></div>
                                    <div class="flex flex-row gap-4">
                                        <img style="border-radius: 50%; height: 45px; width: 45px; background-color: lightblue;" img="" src="https://uptechai.com/production-images/main/customer-two.jpg" alt="Robert's profile photo">
                                        <div class="flex flex-column ml3"><span class="black tbody-5 b">Lisa Belford</span><span class="tbody-5 normal black" style="line-height: 1;">Senior Technology Manager</span></div></div></div></div>
                            <!---->
                            <div class="inline-block bg-main m_w-30 mb4 pa4 shadow-300 bg-main br3" style="background: #fd3;">
                                <div class="flex flex-column h-100">
                                    <p class="black mb5 mt3 tbody-2 h-100">"Uptechai has significantly eased my workload by 70%. My work efficiency has greatly improved as I no longer have to concern myself with product images."</p>
                                    <div class="w-100 mb5 bg-black" style="height: 1px;"></div>
                                    <div class="flex flex-row gap-4">
                                        <img style="border-radius: 50%; height: 45px; width: 45px; background-color: lightblue;" img="" src="https://uptechai.com/production-images/main/customer-three.jpg" alt="Davina's profile photo">
                                        <div class="flex flex-column ml3"><span class="black tbody-5 b">Davina McCartney</span><span class="tbody-5 normal black" style="line-height: 1;">Content Creator</span></div></div></div></div>
                            <!---->
                        </div>
                    </div>
                </div>
                <div>
                    <div class="relative w-100 flex justify-center" style="background: #ffe07d; background-color: var(--main-color)!important">
                        <div class="mw9 pv7 ph5">
                            <div class="m_grid flex" style="max-width: 1000px;">
                                <div class="m_w-50 flex flex-column br3" style="width: 100%">
                                    <p class="tbody-3 mb1 b">STEP 1</p>
                                    <p class="headline-semi black b">Upload standart image</p>
                                    <p class="tbody-3 black">Uptechai automatically removes the background from your images</p>
                                    <div class="bg-white br3"> 
                                        <img class="checkerboard" src="https://uptechai.com/production-images/main/preview-img-top-2.png" loading="lazy" >
                                    </div>
                                </div>
                                <div class="m_w-50 flex flex-column" style="width: 100%">
                                    <div class="bg-white h-100 br3 relative" loading="lazy" style="background-image: url(&quot;https://www.uptechai.com/production-images/main/preview-img-base-2.png&quot;); background-position: center; background-size: cover;"> 
                                        <div class="br3 h-100 w-100 flex justify-center" style="background: rgba(0,0,0,0.2);">
                                            <div class="flex flex-colummn w-100 h-100 items-center" style="margin-right: 100%; margin-left: 100%;">
                                                <div class="flex flex-column justify-center" style="">
                                                    <p class="headline-semi b tc white nowrap">Try it out!</p>
                                                    <button class="btn-fill br3 ph3 pv2"><a href="register" class=""><span class="black b tbody-3 nowrap">Get started</span></a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="tbody-3 mb1 b mt4">STEP 2</p>
                                    <p class="headline-semi black b">Download generated images</p>
                                    <p class="tbody-3 black mb0">Uptechai generates photos with perfect lighting, reflections and shadows</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="faq">
                    <div class="section flex justify-center w-100">
                        <div class="pv6 m_pv7 w-100" style="max-width: 1000px;">
                            <div class="m_grid flex m_flex-row items-center" style="flex-direction: column">
                                <div class="flex m_w-50 flex-column" style="width: 100%;">
                                    <p class="black b headline-semi">Frequently asked Questions</p>
                                    <div class="">
                                        <div class="pv3 bt b-gray-300">
                                            <div class="flex flex-row w-100 justify-between" data-clickToggle>
                                            <p class="b tbody-4 ma0 flex items-center">What is Uptechai?</p>
                                            <button class="toggle z--1">+</button>
                                            </div>
                                            <div class="answer">
                                            <p class="mb0">Uptechai is an AI tool that can quickly transform dull product images into eye-catching marketing materials. After removing the background of the uploaded images, the AI generates backgrounds and adjusts shadows and reflections to enhance the overall appearance.</p>
                                            </div>
                                        </div>
                                        <div class="pv3 bt b-gray-300">
                                            <div class="flex flex-row w-100 justify-between" data-clickToggle>
                                            <p class="b tbody-4 ma0 flex items-center">Do I need to worry about commercial usage?</p>
                                            <button class="toggle z--1">+</button>
                                            </div>
                                            <div class="answer">
                                                <p class="mb2">You can use the results created from Uptechai in whatever way you wish. Commercial usage is not a concern!</p>
                                            </div>
                                        </div>
                                        <div class="pv3 bt b-gray-300">
                                            <div class="flex flex-row w-100 justify-between" data-clickToggle>
                                            <p class="b tbody-4 ma0 flex items-center">Can Uptechai increase the image quality?</p>
                                            <button class="toggle z--1">+</button>
                                            </div>
                                            <div class="answer">
                                            <p class="mb0">Yes! For higher quality images, you can upscale using AI and download the images at a maximum resolution of 2048x2048 with our paid plans. This functionality will be available soon!</p>
                                            </div>
                                        </div>
                                        </div>
                                </div>
                                <div class="m_w-50 flex items-center justify-center" style="width: 100%;">
                                    <img src="/production-images/main/faq-img.png" loading="lazy" style="max-height: 350px;" alt="meta image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="section bg-main flex justify-center w-100">
                <div class="pv6 m_pv7 w-100" style="max-width: 1000px;">
                    <h2 class="headline-semi black b m_mb4 mb3">Blog</h2>
                    <!---->
                    <div class="flex flex-wrap w-100 items-center justify-between">
                        <a href="/blog/how-to-add-shadows-to-product-photos" class="flex flex-column bg-white ba b-gray-300 bw-3 pa5 w-30 m_w-100 hover" style="border-radius: 10px;">
                            <span class="black-300 tbody-3 normal mb3">Jun 15, 2023</span>
                            <p class="tbody-3 black b mb0">How to add shadows to product photos</p>
                        </a>
                        <a href="/blog/" class="flex flex-column bg-white ba b-gray-300 bw-3 pa5 w-30 m_w-100 hover" style="border-radius: 10px;">
                            <span class="black-300 tbody-3 normal mb3">Jun 15, 2023</span>
                            <p class="tbody-3 black b mb0">How to remove the background froma logo</p>
                        </a>
                        <a href="/blog/" class="flex flex-column bg-white ba b-gray-300 bw-3 pa5 w-30 m_w-100 hover" style="border-radius: 10px;">
                            <span class="black-300 tbody-3 normal mb3">Jun 15, 2023</span>
                            <p class="tbody-3 black b mb0">How to remove the background froma logo</p>
                        </a>
                    </div>
                </div>
            </div>
            <div id="cta">
                <div class="section" style="background: rgba(27, 27, 27);">
                    <div class="m_pv7 pv6 w-100 flex flex-column items-center">
                        <h1 class="white b tc" style="font-size:40px;">Any product. Any setting</h1>
                        <a class="btn-fill bg-main br3 ph3 pv2" href="register"><span class="black b tbody-3">Start using now</span></a>
                    </div>
                </div>
            </div>
            <?php
            include("templates/footer.php");
            ?>
        </div>
    </div>

    <script>
        const toggles = document.querySelectorAll('.toggle');
        const clickToggle = document.querySelectorAll('[data-clickToggle]');

        // toggles.forEach(toggle => {
        // toggle.addEventListener('click', () => {
        //     const answer = toggle.parentNode.parentNode.querySelector('.answer');
        //     toggle.classList.toggle('active');
        //     answer.classList.toggle('active');
        // });
        // });
        clickToggle.forEach(box => {
        box.addEventListener('click', () => {
            // const nextToggle = box.parentNode.parentNode.querySelector('.answer');
            // nextToggle.click();
            const answer = box.parentNode.querySelector('.answer');
            const toggle = box.parentNode.querySelector('.toggle');
            answer.classList.toggle('active');
            toggle.classList.toggle('active');
        });
        });
    </script>
    <script>
        const scrollToPri = document.getElementById('scrollToPri');
        const PriSection = document.getElementById('pricing');

        scrollToPri.addEventListener('click', () => {
            PriSection.scrollIntoView({ behavior: 'smooth' });
        });
    </script>
    <style>

.faq {
  margin: 30px 0;
}

.question {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f7f7f7;
  padding: 20px;
}

.answer {
  display: none;
  margin-top: 10px;
}
.answer.active {
  display: block;
}

.toggle {
  font-size: 20px;
  color: #999;
  border: none;
  background-color: transparent;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
}

.toggle:hover {
  color: #333;
}

.toggle.active {
    transform: rotate(45deg);
}
.thick-underline {
  text-decoration: none;
  position: relative;
}

.thick-underline::after {
  content: "";
  position: absolute;
  left: 0;
  border-radius: 4px;
  bottom: -4px;
  width: 100%;
  height: 6px;
  background-color: var(--main-color);
}
.small-underline {
  text-decoration: none;
  position: relative;
}

.small-underline::after {
  content: "";
  position: absolute;
  left: 0;
  border-radius: 3px;
  bottom: -2px;
  width: 100%;
  height: 4px;
  background-color: var(--main-color);
}
.hover:hover {
    border-color: var(--main-color)!important;
    transform: translateY(-5px);
}




.container {
    width: 100%;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 3px solid lightgray;
    overflow: hidden;
}
.img-box {
    /*width: 60%;*/
    margin: auto;
    line-height: 0;
    overflow: hidden;
    position: relative;
}
.img-wrap {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    overflow: hidden;
}

.img-toggler {
    position: absolute;
    left: 0;
    top: 0;
}

.img-toggler:after {
    content: "";
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%) translateX(50%);
    height: 30px;
    width: 30px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    border: 3px solid #fff;
    z-index: 4;
    cursor: ew-resize;
}
.img-toggler:hover::after {
  height: 39px!important;
  width: 39px!important;
}


    </style>
    <script>
let ImgBox = document.querySelector("[data-img-box]");
let imgWrap = document.querySelector("[data-img-wrap]");
let topImage = document.querySelector("[data-topImage]");
let togglerBox = document.querySelector("[data-imgToggler]");

const defaultWidth = 50;

imgWrap.style.width = defaultWidth + "%";
togglerBox.style.width = defaultWidth + "%";

function updateWidth(e) {
    let leftSpace = ImgBox.offsetLeft;
    let boxWidth = (e.pageX - leftSpace) + "px";
    imgWrap.style.width = boxWidth;
    togglerBox.style.width = boxWidth;
}

ImgBox.addEventListener('mousedown', function(e) {
    e.preventDefault();
    ImgBox.addEventListener('mousemove', updateWidth);
});

ImgBox.addEventListener('touchstart', function(e) {
    e.preventDefault();
    var touch = e.touches[0];
    ImgBox.addEventListener('touchmove', function(e) {
        e.preventDefault();
        var touch = e.touches[0];
        updateWidth(touch);
    }, false);
});

document.addEventListener('mouseup', function() {
    ImgBox.removeEventListener('mousemove', updateWidth);
});

document.addEventListener('touchend', function() {
    ImgBox.removeEventListener('touchmove', updateWidth);
});

</script>
</body>
</html>

<!-- image creation api  -->
<!-- https://deepai.org/apis -->


<!-- https://webflow.com/templates/html/pixelit-x-designer-website-template -->