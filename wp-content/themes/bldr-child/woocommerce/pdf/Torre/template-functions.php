<?php
/**
 * Use this file for all your template filters and actions.
 * Requires WooCommerce PDF Invoices & Packing Slips 1.4.13 or higher
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


add_filter( 'wpo_wcpdf_paper_orientation', 'wcpdf_torre_landscape', 10, 2 );
function wcpdf_torre_landscape($paper_orientation, $template_type) {
    // use $template type ( 'invoice' or 'packing-slip') to set paper oriention for only one document type.
    $paper_orientation = 'portrait';
	// if ($template_type == 'invoice') {
	//     $paper_orientation = 'landscape';
	// }
    return $paper_orientation;
}


add_action( 'wpo_wcpdf_after_billing_address', 'wpo_wcpdf_nif_address', 10, 2 );
function wpo_wcpdf_nif_address ($template_type, $order) {
    if ($template_type == 'invoice') {
        ?>
        <div class="nif">
            <?php echo _('NIF:'); echo "&nbsp;"; echo $order->get_meta('_billing_nif'); ?>
        </div>
        <?php
    }
}

add_action( 'wpo_wcpdf_after_document', 'wpo_torre_wcpdf_after_document', 10, 2 );
function wpo_torre_wcpdf_after_document ($template_type, $order) {
    if ($template_type == 'invoice') {
        ?>
        <div class="close-document">
            <?php // echo("fin del documento"); ?>
        </div>
        <?php
    }
}

