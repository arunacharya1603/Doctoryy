<?php

include 

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./index.css" />
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
    <div class="searchpage" id="searchPage" data-animate-on-scroll>
      <div class="hero-section">
        <nav class="top-header">
          <a class="doctory" data-animate-on-scroll>
            <span>Do</span>
            <span class="ct">ct</span>
            <span>ory</span>
          </a>
          <div class="top-container"></div>
          <div class="navigation-right">
            <div class="navigation-menu">
              <a href="cover-frame.html"><button class="home">Home</button></a>
              <button class="about">About</button>
              <a href="search.html"> <button class="search">Search</button></a>
            </div>
            <div class="account-section">
              <img
                class="hamburger-menu-icon"
                alt=""
                src="./public/notification.svg"
              />

              <button class="notification-bell" autofocus>
                <img class="vector-icon" alt="" src="./public/vector.svg" />

                <img class="vector-icon1" alt="" src="./public/vector1.svg" />

                <div class="notification-bell-child"></div>
              </button>
            </div>
          </div>
        </nav>
        <div class="search-section">
          <div class="banner-gradient"></div>
          <img
            class="banner-background"
            alt=""
            src="./public/banner--background@2x.png"
          />

            <button class="livechat">
              <div class="livechat-child"></div>
              <div class="live-chat">Live Chat</div>
              <img
                class="outline-live-help-white-24dp-1-icon"
                alt=""
                src="./public/outline-live-help-white-24dp-1@2x.png"
              />
            </button>
    
          <div class="we-found-the">
            We found the following doctors for you.
          </div>
          <div class="doctorname1">
            <div class="doctorname1-child"></div>
            <div class="doctors-name">Doctor’s Name</div>
            <i class="doctors-information">Doctor’s Information</i>
            <div class="doctorname1-item"></div>
          </div>
          <div class="doctorname2">
            <div class="doctorname1-child"></div>
            <div class="doctors-name">Doctor’s Name</div>
            <i class="doctors-information">Doctor’s Information</i>
            <div class="doctorname1-item"></div>
          </div>
          <div class="doctorname3">
            <div class="doctorname1-child"></div>
            <div class="doctors-name">Doctor’s Name</div>
            <i class="doctors-information">Doctor’s Information</i>
            <div class="doctorname1-item"></div>
          </div>
        </div>
      </div>
    </div>
   

    <script>
      var searchPage = document.getElementById("searchPage");
      if (searchPage) {
        searchPage.addEventListener("click", function () {
          var anchor = document.querySelector("[data-scroll-to='homepage']");
          if (anchor) {
            anchor.scrollIntoView({ block: "start" });
          }
        });
      }

      var scrollAnimElements = document.querySelectorAll(
        "[data-animate-on-scroll]"
      );
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
