<?php get_header(); ?>
	
<section id="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="post" id="post-<?php the_ID(); ?>">
			
			<header>
			
				<h2><?php the_title(); ?></h2>
				<?php include (TEMPLATEPATH . '/_/inc/post-meta.php' ); ?>
	
			</header>
			
			<section class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</section>
			
			<?php comments_template(); ?>
			
		</article>
		
	<?php endwhile; endif; ?>
	
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
