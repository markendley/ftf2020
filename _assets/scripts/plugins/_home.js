
//@prepros-append modernizr.js
//@prepros-append touchstates.js
//@prepros-append viewport.js
//@prepros-append ajaxloadedposts.js
//@prepros-append ajaxchimp.js
//@prepros-append nav.js










/* scroll to
------------------------------ */

if(document.querySelectorAll('.scrollto').length > 0){

    document.addEventListener("DOMContentLoaded", function(){
        var scrollLinks = document.querySelectorAll('.scrollto');
        
        
        
        for( i = 0; i < scrollLinks.length; i++ ){
            scrollLinks[i].addEventListener('click', function(event){
                
                var link = this.getAttribute('href');

                var offset = document.querySelectorAll('.main-header')[0].offsetHeight;

                var windowVerticalPos = document.querySelectorAll(link)[0].offsetTop;
                var targetPos = windowVerticalPos - offset;
                
                event.preventDefault();



                jQuery('html, body').animate({
                    scrollTop: jQuery(link).offset().top - offset
                }, 500);





            });
                
        };	
        
        
    });
}









/* Video
------------------------------ */

if(document.querySelectorAll('.video-thumbnails a').length){

    var videobtns = document.querySelectorAll('.video-thumbnails a');

    for (i = 0; i < videobtns.length; i++) {
        videobtns[i].addEventListener('click', function(e){
            e.preventDefault();

            var newVideo = this.getAttribute('data-video');
            var newContent = this.getAttribute('data-content');
            
            console.log();

            document.querySelectorAll('.mainvideo iframe')[0].setAttribute('src', newVideo);
            document.querySelectorAll('.mainvideo p')[0].setAttribute('src', newContent);


            // videobtns[0].getAttribute('data-video')
            // videobtns[0].getAttribute('data-content')

        })
    
    }
}










/* click and drag
------------------------------ */


if(document.querySelector('.reviewclickanddragvideothumbs')){


    const slider = document.querySelector('.reviewclickanddragvideothumbs');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
    console.log(walk);
    });

}






if(document.querySelector('.featuresclickanddrag')){


    const slider = document.querySelector('.featuresclickanddrag');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
    console.log(walk);
    });

}


if(document.querySelector('.reviewclickanddrag')){


    const slider = document.querySelector('.reviewclickanddrag');
    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
    });
    slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
    });
    slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;
    console.log(walk);
    });

}
