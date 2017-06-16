<?php
/**
 * Template Name: Our Team
 * 
 * The template for displaying the Our Team page.
 *
 * @package Evans_Lake_Theme
 */

get_header(); ?>

<div class="hero-image"><?php the_post_thumbnail( 'full' ); ?></div>
<div id="primary" class="content-area container">
	<div class="sub-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary', 
			'menu_id' => 'primary-menu',
			'submenu' => get_the_title($post->post_parent)
		) ); ?>
	</div>
	<?php 
		evans_lake_breadcrumbs(); 
		$our_team_ID = get_the_ID();
	?>
	
		<!--Query for Staff Member Custom Posts-->
		<?php 
			$args = array(
				'post_type'=> 'staffmember',
				'post_count'=> 50,
				'posts_per_page'=> 50
			);

			$all_staff = get_posts($args);

			// Create Sorting Arrays
			$summers = [];
			$fulltimes = [];
			$directors = [];
			$executives = [];
		?>

		<!--Get Staff Type by Staff Member Post-->
		<?php 
			if ( !empty($all_staff) && !is_wp_error($all_staff)) {
				foreach ( $all_staff as $post ) {
					$staff_term_obj = get_the_terms($post, 'stafftype');
					$staff_term_slug = $staff_term_obj[0]->slug;

					// Sort Staff Member by Staff Type
					switch ($staff_term_slug){
						case 'summer':
							array_push($summers, $post);
							break;
						case 'director':
							array_push($directors, $post);
							break;
						case 'executive':
							array_push($executives, $post);
							break;
						case 'fulltime':
							array_push($fulltimes, $post);
							break;
					}
				}
			}
		?>
		<section class="fulltime staff-container">
			<?php foreach ($fulltimes as $staff_member) : ?>
				<div class="fulltime staff-member">

					<?php $image_URL = CFS()->get( 's_img',  $staff_member->ID ); ?>
					<div class="image" style="background-image: url( '<?php echo $image_URL; ?>' )">
					</div>

					<div class="content">
						<span class="name">
							<?php $type = CFS()->get( 's_name',  $staff_member->ID ); ?>
						</span>
						<span class="role">
							<?php echo CFS()->get( 's_role',  $staff_member->ID,  array( 'format' => 'raw' ) ); ?>
						</span>
						<span class="email">
							<?php echo CFS()->get( 's_email',  $staff_member->ID ); ?>
						</span>
						<span class="tel-1">
							<?php 
								if ( CFS()->get( 's_tel_1_is_mobile',  $staff_member->ID ) ) {
									echo "M: ";
								} 
								else {
									echo "T: ";
								}; 
								echo CFS()->get( 's_tel_1',  $staff_member->ID ); 
							?>
						</span>
							<span class="tel-2">
							<?php 
								if ( CFS()->get( 's_tel_2_is_mobile',  $staff_member->ID ) ) {
									echo "M: ";
								} 
								else {
									echo "T: ";
								}; 
								echo CFS()->get( 's_tel_2',  $staff_member->ID ); 
							?>
						</span>
						<span class="year-started">
							<?php echo CFS()->get( 's_year_started',  $staff_member->ID ); ?>
						</span>

						<button class="staff orange-button">View Bio</button>
						<span class="bio">
						<!--Bio should be hidden until button above is clicked-->
							<?php echo CFS()->get( 's_bio',  $staff_member->ID ); ?>
						</span>
					</div> <!--Content-->
				</div> <!--Single Fulltime Staff Member-->
			<?php endforeach; ?>
		</section> <!--Staff Fulltime Member Section-->
		<section class="board-container">
			<h3>Board of Directors</h3>
			<?php echo CFS()->get( 'desc_board', $our_page_ID ); ?>
			<section class="executives staff-container">
				<h3>Executives</h3>
				<div class="executive-columns">
					<span class="name">Name</span>
					<span class="role">Role</span>
					<span class="email">Contact</span>
				</div>
				<?php foreach ($executives as $staff_member) : ?>
					<div class="executives staff-member">

						<span class="name">
							<?php $type = CFS()->get( 's_name',  $staff_member->ID ); ?>
						</span>

						<span class="role">
							<?php echo CFS()->get( 's_role',  $staff_member->ID,  array( 'format' => 'raw' ) ); ?>
						</span>

						<span class="email">
							<?php echo "mailto: ", CFS()->get( 's_email',  $staff_member->ID ); ?>
						</span>

					</div> <!--Single Executive Staff Member-->
				<?php endforeach; ?>
			</section> <!--Executive Staff Member Section-->
		

			<section class="directors staff-container">
				<?php foreach ($directors as $staff_member) : ?>
					<!--Directors-->
				<?php endforeach; ?>
			</section>
		</section> <!--Board of Directors Container-->

		<section class="summer staff-container">
			<?php foreach ($summers as $staff_member) : ?>
				<!--Summer Staff-->
			<?php endforeach; ?>
		</section>

	</main><!-- #main -->
</div><!-- #primary -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>


		<div>
			<div class="staff fulltime">
				<section class="staff-member fulltime">
					<span class="name">
						<?php $type = CFS()->get( 's_name',  $staff_member->ID ); ?>
					</span>
					<br><br>
					<span class="role">
						<?php echo CFS()->get( 's_role',  $staff_member->ID,  array( 'format' => 'raw' ) ); ?>
					</span>
					<span class="image">
						<?php echo CFS()->get( 's_img',  $staff_member->ID ); ?>
					</span>
					
					<span class="email">
						<?php echo CFS()->get( 's_email',  $staff_member->ID ); ?>
					</span>
					<span class="tel-1">
						<?php echo CFS()->get( 's_tel_1',  $staff_member->ID ); ?>
					</span>
					<span class="tel-1-is-mobile">
						<?php echo CFS()->get( 's_tel_1_is_mobile',  $staff_member->ID ); ?>
					</span>
					<span class="tel-2">
						<?php echo CFS()->get( 's_tel_2',  $staff_member->ID ); ?>
					</span>
					<span class="tel-2-is-mobile">
						<?php echo CFS()->get( 's_tel_2_is_mobile',  $staff_member->ID ); ?>
					</span>
					<span class="year-started">
						<?php echo CFS()->get( 's_year_started',  $staff_member->ID ); ?>
					</span>
					<span class="bio">
						<?php echo CFS()->get( 's_bio',  $staff_member->ID ); ?>
					</span>
				</section>
			</div>
		</div>