<?php
$page_one 	= get_theme_mod( 'team_members_page_one', '' );
$page_two 	= get_theme_mod( 'team_members_page_two', '' );
$page_three = get_theme_mod( 'team_members_page_three', '' ); 

$page_array = array();
$has_page = false;
if( !empty( $page_one ) ){
	$has_page = true;
	$page_array['page_one'] = array(
		'ID' => $page_one,
	);
}
if( !empty( $page_two ) ){
	$has_page = true;
	$page_array['page_two'] = array(
		'ID' => $page_two,
	);
}
if( !empty( $page_three ) ){
	$has_page = true;
	$page_array['page_three'] = array(
		'ID' => $page_three,
	);
}

if( !get_theme_mod( 'disable_team_members_section', true ) && $has_page ){ ?>
	<section class="section-teams-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $page_array as $each_page ){ ?>
					<div class="col-md-6 col-lg-4">
						<article class="teams-content-wrap">
							<figure class= "featured-image">
								<?php echo get_the_post_thumbnail( $each_page[ 'ID' ], 'bosa-420-300' ); ?>
							</figure>

							<div class="entry-content">
								<h3 class="entry-title">
									<a href="<?php echo get_permalink( $each_page[ 'ID' ] ); ?>">
										<?php echo get_the_title( $each_page[ 'ID' ] ); ?>
									</a>
								</h3>	
								<div class="entry-text">
									<?php 
									$excerpt = get_the_excerpt( $each_page[ 'ID' ] );
									$result  = wp_trim_words( $excerpt, 10, '' );
									echo $result;
									?>
								</div>
								<div class="button-container">
									<a href="<?php echo get_permalink( $each_page[ 'ID' ] ); ?>" class="button-text">
										<?php echo esc_html__( 'Continue reading', 'bosa-travel-tour' ); ?>
										<i class="fas fa-arrow-right"></i>
									</a>
								</div>
							</div>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>