<?php
/**
* 
* @package bddex
* @author theme-x
* @link https://x-theme.com/
*
* Template Name: Doctor
* Template Post Type: team
*
*/

global $bddex;
$team_html = get_post_meta( $post->ID, 'team_html', true );
$team_css = get_post_meta( $post->ID, 'team_css', true );
$team_php = get_post_meta( $post->ID, 'team_php', true );
$team_js = get_post_meta( $post->ID, 'team_js', true );

$team_html_percentage = get_post_meta( $post->ID, 'team_html_percentage', true );
$team_css_percentage = get_post_meta( $post->ID, 'team_css_percentage', true );
$team_php_percentage = get_post_meta( $post->ID, 'team_php_percentage', true );
$team_js_percentage = get_post_meta( $post->ID, 'team_js_percentage', true );

$team_fb = get_post_meta( $post->ID, 'team_fb', true );
$team_tw = get_post_meta( $post->ID, 'team_tw', true );
$team_gp = get_post_meta( $post->ID, 'team_gp', true );
$team_ln = get_post_meta( $post->ID, 'team_ln', true );
$team_in = get_post_meta( $post->ID, 'team_in', true );

$hire_me = get_post_meta( $post->ID, 'hire_me', true );
$hour_rate = get_post_meta( $post->ID, 'hour_rate', true );

get_header();
if ($bddex['sub-header-switch']) {
    bddex_sub_header();
} 

?>
	
<div class="container space-content">
  	<div class="row">
  		<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<div class="col-lg-5 col-md-5 col-sm-6 team-single-left">
			<?php the_post_thumbnail('bddex-team-profile-img'); ?>
			<div class="team_profile">
			<?php if (!empty($team_fb || $team_tw || $team_gp || $team_ln || $team_in) ) : ?>
				<?php if (!empty($hire_me)) : ?>
							
                            <a href="<?php echo esc_url($hire_me); ?>" class="appointment"><?php echo wp_kses_post($bddex['team_btn']); ?></a>
                            <?php endif; ?>

			<div class="team-social-box">
				<ul class="team-social">
							<?php if (!empty($team_fb)) : ?>
							<li><a href="<?php echo esc_url($team_fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php endif; ?>
							<?php if (!empty($team_tw)) : ?>
							<li><a href="<?php echo esc_url($team_tw); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php endif; ?>
							<?php if (!empty($team_gp)) : ?>
							<li><a href="<?php echo esc_url($team_gp); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
							<?php endif; ?>
							<?php if (!empty($team_ln)) : ?>
							<li><a href="<?php echo esc_url($team_ln); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?php endif; ?>
							<?php if (!empty($team_in)) : ?>
							<li><a href="<?php echo esc_url($team_in); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<?php endif; ?>
				</ul>
			</div>
			<?php endif; ?>	<!-- Social media -->
		</div>
		</div> <!-- left column end -->

		<div class="col-lg-7 col-md-7 col-sm-6">
			<header class="team-title">
				<h2><?php the_title(); ?></h2>
				<?php global $post; $team_cat = get_the_term_list( $post->ID,'team-category', '', '<br> ', '');
                      if (!empty($team_cat)) echo '<p class="team-category">', strip_tags($team_cat) ,'</p>'; ?>  
			</header>

			<div class="team-content"><?php the_content(); ?></div>
			<?php if($bddex['team_skill']): ?><!-- skills start-->
			<div class="team-skills doctor"> 
				<?php if (!empty($team_html || $team_html_percentage || $team_css || $team_css_percentage || $team_php || $team_php_percentage || $team_js || $team_js_percentage) ) : ?>		
				<?php if (!empty($team_html || $team_html_percentage)) : ?>
			<div class="team_text">
				<span class="team_text_left"><?php printf(esc_html__('%s ', 'avas'),$team_html.'&nbsp;'); ?></span>
				<?php printf(esc_html__('%s', 'avas'),$team_html_percentage); ?>
			</div>
			<?php endif; ?>

			<?php if (!empty($team_css || $team_css_percentage)) : ?>
			<div class="team_text">
				<span class="team_text_left"><?php printf(esc_html__('%s ', 'avas'),$team_css.'&nbsp;'); ?></span>
				<?php printf(esc_html__('%s', 'avas'),$team_css_percentage); ?>
			</div>
			<?php endif; ?>

			<?php if (!empty($team_php || $team_php_percentage)) : ?>
			<div class="team_text">
				<span class="team_text_left"><?php printf(esc_html__('%s ', 'avas'),$team_php.'&nbsp;'); ?></span>
				<?php printf(esc_html__('%s', 'avas'),$team_php_percentage); ?>
			</div>
			<?php endif; ?>

			<?php if (!empty($team_js || $team_js_percentage)) : ?>
			<div class="team_text">
				<span class="team_text_left"><?php printf(esc_html__('%s ', 'avas'),$team_js.'&nbsp;'); ?></span>
				<?php printf(esc_html__('%s', 'avas'),$team_js_percentage); ?>
			</div>
			<?php endif; ?>
			<?php endif; ?>
			</div> 
			<?php endif; ?><!-- skills end -->
			<?php if($bddex['project_experience']): ?>
			<h4 class="eng-skill-exp"><?php esc_html_e('Project Experience', 'avas'); ?></h4>
			<?php bddex_project_exp(); ?> <!-- project -->
			<?php endif; ?>			
		</div> <!-- right column end -->
			<?php  bddex_pagination(); ?> <!-- pagination -->
    <?php endwhile;	?>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
    </div> <!--/ end row -->
</div>

<?php get_footer();