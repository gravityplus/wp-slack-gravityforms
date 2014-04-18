<?php
/**
 * Plugin Name: Slack Gravity Forms
 * Plugin URI: http://gedex.web.id/wp-slack-gravityforms/
 * Description: This plugin allows you to send notifications to Slack channels whenever new submission entries, for Gravity Forms, are received.
 * Version: 0.1.0
 * Author: Akeda Bagus
 * Author URI: http://gedex.web.id
 * Text Domain: slack
 * Domain Path: /languages
 * License: GPL v2 or later
 * Requires at least: 3.6
 * Tested up to: 3.8
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

/**
 * Adds new event that send notification to Slack channel
 * whenever new submission entries are received.
 *
 * @param  array $events
 * @return array
 *
 * @filter slack_get_events
 */
function wp_slack_gform_after_submission( $events ) {
	$events['gform_after_submission'] = array(
		// Action in Gravity Forms to hook in to get the message.
		'action' => 'gform_after_submission',

		// Description appears in integration setting.
		'description' => __( 'When new submission entry, for Gravity Forms, received', 'slack' ),

		// Message to deliver to channel. Returns false will prevent
		// notification delivery.
		'message' => function( $entry, $form ) {

			$admin_url = add_query_arg(
				array(
					'page' => 'gf_entries',
					'view' => 'entry',
					'id'   => $entry['form_id'],
					'lid'  => $entry['id'],
				),
				admin_url( 'admin.php' )
			);

			return apply_filters( 'slack_gform_after_submission_message',
				sprintf(
					__( 'New submission for *<%s|%s>* form on *%s*. *<%s|See entry>*.', 'slack' ),

					$entry['source_url'],
					$form['title'],
					$entry['date_created'],
					$admin_url
				),

				$entry,
				$form
			);
		}
	);

	return $events;
}
add_filter( 'slack_get_events', 'wp_slack_gform_after_submission' );
