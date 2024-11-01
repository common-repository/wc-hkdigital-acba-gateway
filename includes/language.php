<?php

$overrideLocale = !empty(get_option('language_payment_acba_bank')) ? get_option('language_payment_acba_bank') : 'hy';
add_filter('plugin_locale','changeLanguageACBABank', 10, 2);

/**
 * change location event
 *
 * @param $locale
 * @param $domain
 * @return string
 */
function changeLanguageACBABank($locale, $domain)
{
    global $currentPluginDomainAcba;
    global $overrideLocale;
    if ($domain == $currentPluginDomainAcba) {
        $locale = $overrideLocale;
    }
    return $locale;
}