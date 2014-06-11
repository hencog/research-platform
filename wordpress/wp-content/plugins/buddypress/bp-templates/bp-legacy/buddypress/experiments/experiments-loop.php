<?php

/**
 * BuddyPress - Experiments Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_experiments_loop' ); ?>

<?php if ( bp_has_experiments( bp_ajax_querystring( 'experiments' ) ) ) : ?>

	<div id="pag-top" class="pagination">

		<div class="pag-count" id="experiment-dir-count-top">

			<?php bp_experiments_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="experiment-dir-pag-top">

			<?php bp_experiments_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_experiments_list' ); ?>

	<ul id="experiments-list" class="item-list" role="main">
	<?php while ( bp_experiments() ) : bp_the_experiment(); ?>
	<div class="col-md-3 no-padding">
		<li <?php bp_experiment_class(); ?>>
			<a href="<?php bp_experiment_permalink(); ?>"><div class="dbs-item-avatar" style="background-image:url('<?php bp_experiment_avatar(); ?>')">
				<div class='dbs-item-desc'><?php bp_experiment_description_excerpt(); ?></div>
			</div></a>
			<div class="dbs-item-top"></div>
			<div class="dbs-item">
				<div class="dbs-item-title"><a href="<?php bp_experiment_permalink(); ?>"><?php bp_experiment_name(); ?></a></div>
				<div class="dbs-meta"><?php printf( __( 'active %s', 'buddypress' ), bp_get_experiment_last_active() ); ?></div>
				<?php do_action( 'bp_directory_experiments_item' ); ?>
				<div class="dbs-meta">
					<?php bp_experiment_member_count(); ?>
				</div>
			</div>
			<div class="clear"></div>
		</li>
	</div>
	<?php endwhile; ?>

	</ul>

	<?php do_action( 'bp_after_directory_experiments_list' ); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="experiment-dir-count-bottom">

			<?php bp_experiments_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="experiment-dir-pag-bottom">

			<?php bp_experiments_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( 'There were no experiments found.', 'buddypress' ); ?></p>
	</div>

<?php endif; ?>


<?php do_action( 'bp_after_experiments_loop' ); ?>
