"use strict";

if (document.querySelectorAll('.pagination').length > 0) {
  document.querySelectorAll('.pagination')[0].classList.add('hidden');
  var pg_num = 1;
  jQuery('.loadmore').click(function (e) {
    e.preventDefault();
    pg_num++;
    var page = window.location.href;
    var url = page + 'page/' + pg_num + '/';
    jQuery('.loadmore').html('Loading...');
    jQuery('.post-container').last().after('<div class="post-container"><div>');
    jQuery('.post-container').last().load(url + ' .post-container', function () {
      jQuery('.loadmore').html('Load more');
    });
  });
}

jQuery('.loadmore-search').click(function (e) {
  e.preventDefault();
  pg_num++;
  var fullurl = window.location.href;
  var fullurllosethesearchterm = fullurl.substr(0, fullurl.indexOf('?'));
  var searchTerm = fullurl.substr(fullurl.indexOf('?'), fullurl.length);
  var page = fullurllosethesearchterm;
  var url = page + 'page/' + pg_num + '/' + searchTerm;
  jQuery('.loadmore-search').html('Loading...');
  jQuery('.post-container').last().after('<div class="post-container"><div>');
  jQuery('.post-container').last().load(url + ' .post-container', function () {
    jQuery('.loadmore-search').html('Load more');
  });
});