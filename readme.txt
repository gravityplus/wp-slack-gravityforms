=== Slack Gravity Forms ===
Contributors:      akeda
Donate link:       http://goo.gl/DELyuR
Tags:              slack, api, chat, notification, gf, gravity, forms
Requires at least: 3.6
Tested up to:      3.8.1
Stable tag:        trunk
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

Send notifications to Slack channels whenever new submission entries, for Gravity Forms, are received.

== Description ==

This plugin is an extension to [Slack plugin](http://wordpress.org/plugins/slack) that allows you to send notifications to Slack channels whenever new submission entries, for Gravity Forms, are received.

The new event will be shown on integration setting with text **When new submission entry, for Gravity Forms, received**. If checked then notification will be delivered once submission entries are received.

You can alter the message with `slack_gform_after_submission_message` filter. The filter receives following parameters (ordered by position):

* `$message` &mdash; Default message to send to Slack
* `$entry` &mdash; The entry that was just created
* `$form` &mdash; The current form

See [Gravity Forms documentation](http://www.gravityhelp.com/documentation/page/Gform_after_submission).

**Development of this plugin is done on [GitHub](https://github.com/gedex/wp-slack-gravityforms). Pull requests are always welcome**.

== Installation ==

1. You need to install and activate both Gravity Forms and [Slack](http://wordpress.org/plugins/slack) plugins first.
1. Then upload **Slack Gravity Forms** plugin to your blog's `wp-content/plugins/` directory and activate.
1. You will see new event type with text **When new submission entry, for Gravity Forms, received** in integration setting. If checked then notification will be delivered once submission entries are received.

== Screenshots ==

1. Event option in integration setting
1. Your channel get notified whenever new submission entries are received.

== Changelog ==

= 0.1.0 =
Initial release
