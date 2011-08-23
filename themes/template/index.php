<?php get_header(); ?>

<section id="main">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<header>
			
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php include (TEMPLATEPATH . '/_/inc/post-meta.php' ); ?>
			
			</header>
			
			<section class="entry">
			
				<?php the_content(); ?>
				
			</section>

			<footer>
				
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
				Posted in <?php the_category(', ') ?> | 
				<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
			
			</footer>

		</article>

	<?php endwhile; ?>

	<?php else : ?>

		<h2>Not Found</h2>

	<?php endif; ?>

</section>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
