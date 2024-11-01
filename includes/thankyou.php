<?php

add_action('woocommerce_thankyou', 'woocomerceShowErrorMessage', 4);

/**
 * woocomerce Show Error Message Thank you page
 *
 * @param $order_id
 * @return bool
 */
function woocomerceShowErrorMessage($order_id)
{
    $order = wc_get_order($order_id);
    if ($order->has_status('failed')) {
        $orderFailedMessage = get_post_meta($order_id, 'FailedMessageACBA', true);
        if($orderFailedMessage) {
            echo '<div class="hkd-alert hkd-alert-danger" style="color: #a94442;background-color: #f2dede;border-color: #ebccd1;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;">
                    <strong>Error!</strong>  ' . $orderFailedMessage . '
             </div>';
        }
    }
    return true;
}