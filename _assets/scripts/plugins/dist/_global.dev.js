"use strict";

//@prepros-append modernizr.js
//@prepros-append touchstates.js
//@prepros-append viewport.js
//@prepros-append ajaxloadedposts.js
//@prepros-append ajaxchimp.js

/* Search toggle
------------------------------ */
document.getElementById('searchform-btn').addEventListener('click', function (event) {
  event.preventDefault;

  if (document.getElementById('searchform').classList.contains('search-form-open')) {
    document.getElementsByTagName('body')[0].classList.remove('search-form-open');
    document.getElementById('searchform').classList.remove('search-form-open');
  } else {
    document.getElementsByTagName('body')[0].classList.add('search-form-open');
    document.getElementById('searchform').classList.add('search-form-open');
  }
});
document.getElementById('searchform-field').addEventListener('change', function () {
  if (document.getElementById('searchform-field').value != "") {
    document.getElementById('searchform').classList.add('search-form-ready');
  } else {
    document.getElementById('searchform').classList.remove('search-form-ready');
  }
});
/* Youtube
------------------------------ */

jQuery('.article-content iframe[src*="youtube"]').wrap('<div class="videowrap"></div>');
/* Scroll event
------------------------------ */

if (document.getElementById('related')) {
  window.addEventListener("load", function () {
    var fired = false;

    function actioner() {
      document.getElementById('related').classList.add('show');
      document.getElementById('related').classList.add('open');
      fired = true;
    }

    window.addEventListener("scroll", function () {
      if (window.scrollY >= document.body.scrollHeight / 2 && fired === false) {
        actioner();
      }
    });
  });
}
/* Toggle
------------------------------ */


if (document.querySelectorAll('.toggle-parent').length > 0) {
  var btns = document.querySelectorAll('.toggle-parent');

  for (i = 0; i < btns.length; i++) {
    btns[i].addEventListener('click', function () {
      var thePArent = this.parentNode;

      if (thePArent.classList.contains('open')) {
        thePArent.classList.remove('open');
      } else {
        thePArent.classList.add('open');
      }
    });
  }
}
/* Video
------------------------------ */


if (document.querySelectorAll('.video-thumbnails a').length) {
  var videobtns = document.querySelectorAll('.video-thumbnails a');

  for (i = 0; i < videobtns.length; i++) {
    videobtns[i].addEventListener('click', function (e) {
      e.preventDefault();
      var newVideo = this.getAttribute('data-video');
      var newContent = this.getAttribute('data-content');
      console.log();
      document.querySelectorAll('.mainvideo iframe')[0].setAttribute('src', newVideo);
      document.querySelectorAll('.mainvideo p')[0].setAttribute('src', newContent); // videobtns[0].getAttribute('data-video')
      // videobtns[0].getAttribute('data-content')
    });
  }
}
/* click and drag
------------------------------ */


if (document.querySelector('.featuresclickanddrag')) {
  var slider = document.querySelector('.featuresclickanddrag');
  var isDown = false;
  var startX;
  var scrollLeft;
  slider.addEventListener('mousedown', function (e) {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener('mouseleave', function () {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mouseup', function () {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mousemove', function (e) {
    if (!isDown) return;
    e.preventDefault();
    var x = e.pageX - slider.offsetLeft;
    var walk = (x - startX) * 3; //scroll-fast

    slider.scrollLeft = scrollLeft - walk;
    console.log(walk);
  });
}

if (document.querySelector('.reviewclickanddrag')) {
  var _slider = document.querySelector('.reviewclickanddrag');

  var _isDown = false;

  var _startX;

  var _scrollLeft;

  _slider.addEventListener('mousedown', function (e) {
    _isDown = true;

    _slider.classList.add('active');

    _startX = e.pageX - _slider.offsetLeft;
    _scrollLeft = _slider.scrollLeft;
  });

  _slider.addEventListener('mouseleave', function () {
    _isDown = false;

    _slider.classList.remove('active');
  });

  _slider.addEventListener('mouseup', function () {
    _isDown = false;

    _slider.classList.remove('active');
  });

  _slider.addEventListener('mousemove', function (e) {
    if (!_isDown) return;
    e.preventDefault();
    var x = e.pageX - _slider.offsetLeft;
    var walk = (x - _startX) * 3; //scroll-fast

    _slider.scrollLeft = _scrollLeft - walk;
    console.log(walk);
  });
}
/* Video thumbnails
------------------------------ */


if (document.querySelector('.reviewclickanddragvideothumbs')) {
  var _slider2 = document.querySelector('.reviewclickanddragvideothumbs');

  var _isDown2 = false;

  var _startX2;

  var _scrollLeft2;

  _slider2.addEventListener('mousedown', function (e) {
    _isDown2 = true;

    _slider2.classList.add('active');

    _startX2 = e.pageX - _slider2.offsetLeft;
    _scrollLeft2 = _slider2.scrollLeft;
  });

  _slider2.addEventListener('mouseleave', function () {
    _isDown2 = false;

    _slider2.classList.remove('active');
  });

  _slider2.addEventListener('mouseup', function () {
    _isDown2 = false;

    _slider2.classList.remove('active');
  });

  _slider2.addEventListener('mousemove', function (e) {
    if (!_isDown2) return;
    e.preventDefault();
    var x = e.pageX - _slider2.offsetLeft;
    var walk = (x - _startX2) * 3; //scroll-fast

    _slider2.scrollLeft = _scrollLeft2 - walk;
    console.log(walk);
  });
}