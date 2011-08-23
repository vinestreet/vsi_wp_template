<?php get_header(); ?>

<section id="main">

	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>

		<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				
				<header>
				
					<h2><?php the_title(); ?></h2>
					<?php include (TEMPLATEPATH . '/_/inc/post-meta.php' ); ?>
					
				</header>
				
				<section class="entry">

					<?php the_excerpt(); ?>

				</section>

			</article>

		<?php endwhile; ?>

		<?php include (TEMPLATEPATH . '/_/inc/nav.php' ); ?>

	<?php else : ?>

		<h2>No posts found.</h2>

	<?php endif; ?>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
