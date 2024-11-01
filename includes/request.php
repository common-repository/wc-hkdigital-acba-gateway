<?php


if (isset($_POST['woocommerce_hkd_acba_credit_agricole_language_payment_acba_bank'])) {
    $language = $_POST['woocommerce_hkd_acba_credit_agricole_language_payment_acba_bank'];
    if ($language === 'hy' || $language === 'ru_RU' || $language === 'en_US')
        update_option('language_payment_acba_bank', $language);
}
