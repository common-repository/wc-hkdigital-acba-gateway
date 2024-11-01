<?php

// Add 30 minute cron job

/**
 * Remove the specified resource from storage.
 *
 * @param $schedules
 * @return array
 */
function cronSchedulesForACBABank($schedules)
{
    if (!isset($schedules["30min"])) {
        $schedules["30min"] = array(
            'interval' => 30 * 60,
            'display' => __('Once every 30 minutes'));
    }
    return $schedules;
}
add_filter('cron_schedules', 'cronSchedulesForACBABank');

function initHKDACBAPlugin()
{
    if (!wp_next_scheduled('cronCheckOrder')) {
        wp_schedule_event(time(), '30min', 'cronCheckOrder');
    }
    add_rewrite_endpoint('cards', EP_PERMALINK | EP_PAGES, 'cards');
    flush_rewrite_rules();
}
add_action('init', 'initHKDACBAPlugin');