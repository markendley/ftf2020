
//@prepros-append modernizr.js
//@prepros-append touchstates.js
//@prepros-append viewport.js
//@prepros-append ajaxloadedposts.js
//@prepros-append ajaxchimp.js
//@prepros-append nav.js





/* Youtube
------------------------------ */

jQuery('.article-content iframe[src*="youtube"]').wrap('<div class="videowrap"></div>');
jQuery('.article-content iframe[src*="vimeo"]').wrap('<div class="videowrap"></div>');



/* Full screen image
------------------------------ */


if(document.querySelectorAll('.full-screen').length > 0){
    window.addEventListener('load', function(){

        var fullscreenimage = document.querySelectorAll('.full-screen');

        for (i = 0; i < fullscreenimage.length; i++) {
            var container = fullscreenimage[i].parentNode;
            var imageSrc = fullscreenimage[i].getAttribute('data-src');

            container.setAttribute('style', 'background-image:url('+imageSrc+')');
            container.classList.add('full-screen-container');

            if(fullscreenimage[i].classList.contains('parallax')){
                var container = fullscreenimage[i].parentNode;
                container.classList.add('parallax')
            }
        }
    });
}

/* Article Jump to section
------------------------------ */

function slugify(str)
{
    str = str.replace(/^\s+|\s+$/g, '');

    // Make the string lowercase
    str = str.toLowerCase();

    // Remove accents, swap ñ for n, etc
    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆÍÌÎÏŇÑÓÖÒÔÕØŘŔŠŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇíìîïňñóöòôõøðřŕšťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to   = "AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    // Remove invalid chars
    str = str.replace(/[^a-z0-9 -]/g, '') 
    // Collapse whitespace and replace by -
    .replace(/\s+/g, '-') 
    // Collapse dashes
    .replace(/-+/g, '-'); 


    return str;


}





if(document.getElementById('jump-to-section-nav')){
    
    window.addEventListener('load', function(){

        var headings = document.querySelectorAll('.article-content h2');
        var nav = document.getElementById('jump-to-section-nav');
        var offset = document.querySelectorAll('.main-header')[0].offsetHeight;

        for (i = 0; i < headings.length; i++) {



            if(headings[i].innerHTML != ""){

            


                var slug = slugify( headings[i].innerHTML );

                
                headings[i].setAttribute('id', slug);
                headings[i].classList.add('anchored-header');


                var li = document.createElement('li');
                li.innerHTML = '<a href="#'+slug+'" class="scrollto">'+headings[i].innerHTML+'</a>';

                nav.appendChild(li);
            }

        }

        runscrollto();

    });

}




/* Related posts
------------------------------ */

if(document.getElementById('related')){



    window.addEventListener("load", function() {


        var fired = false;

        function actioner(){
            document.getElementById('related').classList.add('show');
            document.getElementById('related').classList.add('open');

            fired = true;					  	

        }



        window.addEventListener("scroll", function(){

            if (window.scrollY >= (document.body.scrollHeight / 2) && fired === false) {
                actioner();

            }
        })



    });

}


/* Toggle
------------------------------ */

if(document.querySelectorAll('.toggle-parent').length > 0){

    var btns = document.querySelectorAll('.toggle-parent');
    
    for (i = 0; i < btns.length; i++) {
        btns[i].addEventListener('click', function(){

            var thePArent = this.parentNode;

            if(thePArent.classList.contains('open')){
                thePArent.classList.remove('open')
            }else{
                thePArent.classList.add('open')
            }
        })
    }
}











    /* Modal
    ---------------------------------- */


    jQuery(document).ready(function(){

        jQuery('.modal').on('click', function(){
            jQuery('.modal').fadeOut();
            jQuery('.modal div').attr('style', '');
        });
    });

    jQuery('.gallery-icon a').each(function(){
        var childSrc = jQuery(this).find('img').attr('src');

        var newHref = childSrc.substring(0, childSrc.lastIndexOf('-')) + childSrc.substring(childSrc.lastIndexOf('.'));

        jQuery(this).attr('href', newHref);

        jQuery(this).on('click', function(e){
            e.preventDefault();

            var theHref = jQuery(this).attr('href');

            jQuery('.modal div').attr('style', 'background-image:url(' + theHref + ')');

            jQuery('.modal').fadeIn();
        });

    });