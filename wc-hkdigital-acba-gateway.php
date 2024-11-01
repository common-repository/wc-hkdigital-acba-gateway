<?php
/*
Plugin Name: Payment Gateway for ACBA BANK
Plugin URI: #
Description: Pay with ACBA BANK payment system. Please note that the payment will be made in Armenian Dram.
Version: 1.1.5
Author: HK Digital Agency LLC
Author URI: https://hkdigital.am
License: GPLv2 or later
*/


/*
 *
 * Սույն հավելման(plugin) պարունակությունը պաշպանված է հեղինակային և հարակից իրավունքների մասին Հայաստանի Հանրապետության օրենսդրությամբ:
 * Արգելվում է պարունակության  վերարտադրումը, տարածումը, նկարազարդումը, հարմարեցումը և այլ ձևերով վերափոխումը,
 * ինչպես նաև այլ եղանակներով օգտագործումը, եթե մինչև նման օգտագործումը ձեռք չի բերվել ԷՅՋԿԱ ԴԻՋԻՏԱԼ ԷՋԵՆՍԻ ՍՊԸ-ի թույլտվությունը:
 *
 */

$currentPluginDomainAcba = 'wc-hkdigital-acba-gateway';
$apiUrlAcba = 'https://plugins.hkdigital.am/api/';
$pluginDirUrlAcba = plugin_dir_url(__FILE__);
$pluginBaseNameAcba = dirname(plugin_basename(__FILE__));
if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
$pluginDataAcba = get_plugin_data(__FILE__);


/**
 *
 * @param $gateways
 * @return array
 */
function hkdAddACBABankGatewayClass($gateways)
{
    $gateways[] = 'WC_HKD_Acba_Arca_Gateway';
    return $gateways;
}
add_filter('woocommerce_payment_gateways', 'hkdAddACBABankGatewayClass');

include dirname(__FILE__) . '/console/command.php';
include dirname(__FILE__) . '/includes/thankyou.php';

if (is_admin()) {
    include dirname(__FILE__) . '/includes/request.php';
    include dirname(__FILE__) . '/includes/language.php';
    include dirname(__FILE__) . '/includes/activate.php';
}

include dirname(__FILE__) . '/includes/errorCodes.php';
include dirname(__FILE__) . '/includes/main.php';


add_action('plugin_action_links_' . plugin_basename(__FILE__), 'hkd_acba_gateway_setting_link');

function hkd_acba_gateway_setting_link($links)
{
    $links = array_merge(array(
        '<a href="' . esc_url(admin_url('/admin.php')) . '?page=wc-settings&tab=checkout&section=hkd_acba_credit_agricole">' . __('Settings', 'wc-hkdigital-acba-gateway') . '</a>'
    ), $links);
    return $links;
}
