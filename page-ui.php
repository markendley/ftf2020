<?php get_header(); ?>





	
		<div class="row"  data-section="typography">
			<div class="col-lg-8 columns">	
				
				<div class="client-entry">
					<h1 class="h1">Heading Level 1</h1>
					<h2 class="h2">Heading Level 2</h2>
					<h3 class="h3">Heading Level 3</h3>
					<h4 class="h4">Heading Level 4</h4>
					<h5 class="h5">Heading Level 5</h5>
					<h6 class="h6">Heading Level 6</h6>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
		
		<button class="btn">Load more</button>

		<header class="archive-header">
			<h1>Search: <span class="text-color-red">Fox</span></h1>

			<ul class="tag-list btn-style-tags">
				<li><a href="">Tag</a></li>
				<li><a href="">Tag</a></li>
				<li><a href="">Tag</a></li>
			</ul>
			
		</header>
		

		<ul class="archive-list-style">
			<li><a href="" class="image-wrap">
					<img src="http://placehold.it/350x197" />
				</a>
				<h2><a href="">Trek Get Super Snazzy with New Custom Options – Project One</a></h2>
				<p class="search-meta">Posted on <a href="">ergfeg</a> in <a href="">fveg</a></p>
				<p>Trek Get Super Snazzy with New Custom Options – Project One</p>
				<ul class="tag-list p-style-tags">
					<li><a href="">Tag</a></li>
					<li><a href="">Tag</a></li>
					<li><a href="">Tag</a></li>
				</ul>
			</li>
			<li><a href="" class="image-wrap">
					<img src="http://placehold.it/350x197" />
				</a>
				<h2><a href="">Trek Get Super Snazzy with New Custom Options – Project One</a></h2>
				<p class="search-meta">Posted on <a href="">ergfeg</a> in <a href="">fveg</a></p>
				<p>Trek Get Super Snazzy with New Custom Options – Project One</p>
				<ul class="tag-list p-style-tags">
					<li><a href="">Tag</a></li>
					<li><a href="">Tag</a></li>
					<li><a href="">Tag</a></li>
				</ul>
			</li>
			<li><a href="" class="image-wrap">
					<img src="http://placehold.it/350x197" />
				</a>
				<h2><a href="">Trek Get Super Snazzy with New Custom Options – Project One</a></h2>
				<p class="search-meta">Posted on <a href="">ergfeg</a> in <a href="">fveg</a></p>
				<p>Trek Get Super Snazzy with New Custom Options – Project One</p>
				<ul class="tag-list p-style-tags">
					<li><a href="">Tag</a></li>
					<li><a href="">Tag</a></li>
					<li><a href="">Tag</a></li>
				</ul>
			</li>
		</ul>
		<a class="btn btn-wide">Load more</a>




<?php get_footer(); ?>
