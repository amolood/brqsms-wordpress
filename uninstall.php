<?php
/**
 * BrqSMS uninstall handler.
 *
 * Runs only when the plugin is deleted from the WordPress admin.
 * It removes the plugin's own settings and transients. It intentionally does
 * NOT delete user accounts or user verification meta, so removing the plugin
 * never destroys customer data.
 */

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

global $wpdb;

// Remove plugin options (site options and, for multisite, network options).
$option_like = $wpdb->esc_like('dig_') . '%';
$option_like2 = $wpdb->esc_like('digit_') . '%';
$option_like3 = $wpdb->esc_like('digits_') . '%';

$wpdb->query(
    $wpdb->prepare(
        "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s OR option_name LIKE %s",
        $option_like,
        $option_like2,
        $option_like3
    )
);

// Remove transients created by the plugin.
$wpdb->query(
    $wpdb->prepare(
        "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s OR option_name LIKE %s",
        $wpdb->esc_like('_transient_dig') . '%',
        $wpdb->esc_like('_transient_timeout_dig') . '%'
    )
);

// Multisite: clean network-level options too.
if (is_multisite() && isset($wpdb->sitemeta)) {
    $wpdb->query(
        $wpdb->prepare(
            "DELETE FROM {$wpdb->sitemeta} WHERE meta_key LIKE %s OR meta_key LIKE %s OR meta_key LIKE %s",
            $option_like,
            $option_like2,
            $option_like3
        )
    );
}
