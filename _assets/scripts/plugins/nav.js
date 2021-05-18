

/* Search toggle
------------------------------ */


document.getElementById('searchform-btn').addEventListener('click', function(event){
    event.preventDefault;

    if(document.getElementById('searchform').classList.contains('search-form-open')){
        document.getElementsByTagName('body')[0].classList.remove('search-form-open');
        document.getElementById('searchform').classList.remove('search-form-open');
    }else {
        document.getElementsByTagName('body')[0].classList.add('search-form-open');
        document.getElementById('searchform').classList.add('search-form-open');
    }
});
document.getElementById('searchform-field').addEventListener('change', function(){
    if(document.getElementById('searchform-field').value != ""){
        document.getElementById('searchform').classList.add('search-form-ready');
    }else {
        document.getElementById('searchform').classList.remove('search-form-ready');

    }
})



