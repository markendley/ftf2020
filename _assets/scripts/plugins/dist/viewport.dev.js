"use strict";

// Mobile's don't consider the Nav bar when calculating the ch
//https://css-tricks.com/the-trick-to-viewport-units-on-mobile/
function setHeights() {
  // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
  var vh = window.innerHeight * 0.01;
  var theBody = document.getElementsByTagName('body')[0]; // Then we set the value in the --vh custom property to the root of the document

  document.documentElement.style.setProperty('--vh', vh + 'px');
  theBody.classList.add('heightSet');
}

window.addEventListener('load', setHeights);
window.addEventListener('resize', setHeights);