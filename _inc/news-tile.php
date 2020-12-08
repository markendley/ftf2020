<li class="<?php if(!has_post_thumbnail(  )){ echo 'no-image'; }?>">
    <a href="<?php the_permalink() ?>" class="image-wrap">
        <?php 
        if(has_post_thumbnail(  )){
            the_post_thumbnail( 'category-thumb'); 
        }else { ?>
            <img src="<?php echo get_template_directory_uri(  ); ?>/_assets/images/placeholder-400x230.png" alt="placeholder" />
        <?php }?>
    </a>
    <h2 class="heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
</li>