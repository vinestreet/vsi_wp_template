<?php get_header(); ?>
	
<section id="main">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<header>
			
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php include (TEMPLATEPATH . '/_/inc/post-meta.php' ); ?>
				
			</header>
			
			<section class="entry">
				
				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
				
				<?php the_tags( 'Tags: ', ', ', ''); ?>
			
			</section>
			
			<footer>
				
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
				Posted in <?php the_category(', ') ?> | 
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
			
			</footer>

			<?php comments_template(); ?>
			
		</article>

	<?php endwhile; endif; ?>
	
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>