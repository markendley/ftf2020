


/*

“surface” - the surface (the screen or trackpad
"touch point" - point of contact between the screen the surface.



touch start - when you put your finger on it

touch end - when you remove your finger from it, use THIS one!

touch move - when the user swipes on it

can’t use click all the time - becasue there is a delay between the actual tap and the firing o th click event!



*/




/* Make Safari on iOS apply the active state by default, by adding a touchstart event listener to the document body or to each element. */

window.onload = function() {
	if(/iP(hone|ad)/.test(window.navigator.userAgent)) {
		document.body.addEventListener('touchstart', function() {}, false);
    }
};
