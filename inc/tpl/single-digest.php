<?php
 /*
 *	Template Name: Single
 */
 

 
get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="digest-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<div class="entry-content"><?php the_content(); ?></div>
					<?php
						$digest_items = get_post_meta( get_the_ID(), 'digest_items', true );
						if(isset($digest_items) and !empty($digest_items))
							foreach($digest_items as $item):
								echo '<div class="digest-item '.$item['type'].'" style="border:1px solid red;margin:10px;">';
								echo '<div class="item item__title"><h4><a href="'.$item['url'].'" target="_blank">'.$item['title'].'</a></h4></div>';
								if(!empty($item['thumbnail'])) { echo '<div class="item item__thumbnail"><img src="'.$item['thumbnail'].'" /></div>'; }
								echo '<div class="item item__description">'.$item['description'].'</div>';
								echo '<div class="item item__provider"><a href="'.$item['provider_url'].'" target="_blank">'.$item['provider_name'].'</a></div>';
								echo '</div>';
								echo WP_Digests::Markdown($item['comment']);
							endforeach;
					?>
				</article>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php wp_reset_query(); ?>
<?php get_sidebar( 'content' ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>