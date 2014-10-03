<?php
 /*
 *	Template Name: Single
 */
 
get_header(); ?>
<div id="main-content" class="main-content">
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
			<div class="page-header">
				<h1 class="page-title"><?php echo __('Digests', 'wp-digests'); ?></h1>
			</div>
		
			<?php $digests = array( 'post_type' => 'digest' ); $loop = new WP_Query( $digests ); ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
				<article id="digest-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					</header>
					<div class="entry-content"><?php the_content(); ?></div>
					<?php
						// echo esc_html( get_post_meta( get_the_ID(), '_digest_tag_name', true ) );
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