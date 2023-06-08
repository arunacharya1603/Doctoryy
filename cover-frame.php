<?php
  $conn = new mysqli('localhost', 'root', '', 'doctor');
 
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./cover-frame.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Baloo Bhai:wght@400&display=swap"
    />
  </head>
  <body>
    <div class="cover-frame">
      <div class="cover-frame-child"></div>
      <div
        class="homepage"
        data-scroll-to="homepage"
        id="homepage"
        data-animate-on-scroll
      >
        <div class="hero-section1">
          <nav class="top-header1">
            <a class="doctory1" data-animate-on-scroll>
              <span>Do</span>
              <span class="ct1">ct</span>
              <span>ory</span>
            </a>
            <div class="top-container1"></div>
            <div class="navigation-right1">
              <div class="navigation-menu1">
                <a href="cover-frame.html"><button class="home1" autofocus >Home</button></a>
                <button class="about1" autofocus >About</button>
              <a href="search.html"> <button  class="search1" autofocus >Search</button></a> 
              </div>
              <div class="account-section1">
              <button class="notification-bell" autofocus>
                  <img class="vector-icon" alt="" src="./public/vector.svg" />
                  <div class="notification-bell-child"></div>
                </button>
              </div>
            </div>
          </nav>
          <div class="search-section1">
            <div class="banner-gradient1"></div>
            <img
              class="banner-background1"
              alt=""
              src="./public/banner--background@2x.png"
            />

            <div class="search-container">
              <div class="title">
                <div class="find-a-doctor" data-animate-on-scroll>
                  Find a doctor you can build long relationship with is good for
                  your health.
                </div>
                <div class="what-if-one" data-animate-on-scroll>
                  What if one website can find the doctor just you are looking
                  for? Doctory can help you find the doctor based on confidence
                  not by chance!
                </div>
              </div>
              <form class="search-form" action="search-page3.php" method="post">
                <div class="inputs-row">
             




  <div class="form-group inputs-row">
   
  <input placeholder="Enter your problem and Date!" class="form-control" id="description" name="description" rows="3" style="
    display: flex;
    position: relative;
    top: -11px;
    left: 4px;
    width: 615px;
    height: 40px;
    font-size: 20px;
"></input>
  </div>
  <button type="submit" class="btn btn-primary" style="
    display: flex;
    position: absolute;
    top: 5px;
    left: 669px;
    align-items: center;
    justify-content: center;
    width: 189px;
    height: 40px;
    
    
"><span>Submit</span></button>
                  </div>
                </div>
                <div class="button-group">
                </div>
              </form>
            
            </div>
            <button class="livechat1">
              <div class="livechat-item"></div>
              <div class="live-chat1">Live Chat</div>
              <img
              class="outline-live-help-white-24dp-1-icon"
              alt=""
              src="./public/outline-live-help-white-24dp-1@2x.png"
            />
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      var homepage = document.getElementById("homepage");
      if (homepage) {
        homepage.addEventListener("click", function () {
          var anchor = document.querySelector("[data-scroll-to='homepage']");
          if (anchor) {
            anchor.scrollIntoView({ block: "start" });
          }
        });
      }
      
      var scrollAnimElements = document.querySelectorAll("[data-animate-on-scroll]");
      var observer = new IntersectionObserver(
        (entries) => {
          for (const entry of entries) {
            if (entry.isIntersecting || entry.intersectionRatio > 0) {
              const targetElement = entry.target;
              targetElement.classList.add("animate");
              observer.unobserve(targetElement);
            }
          }
        },
        {
          threshold: 0.15,
        }
      );
      
      for (let i = 0; i < scrollAnimElements.length; i++) {
        observer.observe(scrollAnimElements[i]);
      }
      </script>
  </body>
</html>
