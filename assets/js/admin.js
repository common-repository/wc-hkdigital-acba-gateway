var $ = jQuery;
$(document).ready(function () {

    setTimeout(function () {
        checkCheckboxes();
    },1500)

    $(document).on('change', '#woocommerce_hkd_acba_credit_agricole_save_card', function () {
        checkCheckboxes();
    });

    $(document).on('mouseover', '.woocommerce-help-tip', function () {
        let parentId = $(this).parent().attr('for');
        console.log(parentId);
        if (parentId === 'woocommerce_hkd_acba_credit_agricole_save_card_button_text') {
            $('#tiptip_content').css({
                'width': '300px'
            }).addClass('tiptip_content_changed_style').html('<img src="'+ myScriptACBA.pluginsUrl + 'assets/images/bindingnew.jpg" width="300">');
        } else if(parentId === 'woocommerce_hkd_acba_credit_agricole_save_card_header') {
            $('#tiptip_content').css({
                'width': '300px'
            }).addClass('tiptip_content_changed_style').html('<img src="'+ myScriptACBA.pluginsUrl + 'assets/images/payment.jpg" width="300">');
        }else if(parentId === 'woocommerce_hkd_acba_credit_agricole_save_card_use_new_card'){
            $('#tiptip_content').css({
                'width': '300px'
            }).addClass('tiptip_content_changed_style').html('<img src="'+ myScriptACBA.pluginsUrl + 'assets/images/newcard.jpg" width="300">');
        }else{
            $('#tiptip_content').removeClass('tiptip_content_changed_style').css({'max-width': '150px'});
        }
    });

    function checkCheckboxes() {
        $('.hiddenValue').parents('tr').hide();
        let saveCardMode = $('#woocommerce_hkd_acba_credit_agricole_save_card').is(':checked');
        if (saveCardMode) {
            $('.saveCardInfo').parents('tr').show();
        } else {
            $('.saveCardInfo').parents('tr').hide();
        }
    }
});
