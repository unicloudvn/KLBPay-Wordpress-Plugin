<?php
/**
 * Plugin Name: KLBPay Plugin
 * Description: This is a Kien Long Bank Pay plugin.
 * Version: 1.0
 * Author: Hoàng Khánh Sơn
 * Author Email: hoangkhanhson2000@gmail.com
 * Author URI: https://github.com/hoangkhanhson2000
 */
require 'vendor/autoload.php';

use src\KPayClient;
use src\KPayPacker;
use src\transaction\model\CustomerInfo;
use src\transaction\request\CreateTransactionRequest;
use src\transaction\request\QueryTransactionRequest;

add_filter('woocommerce_payment_gateways', 'klb_pay_add_gateway_class');
function klb_pay_add_gateway_class($gateways)
{
    $gateways[] = 'WC_KLB_Pay_Gateway';
    return $gateways;
}

// Initialize KLB Pay gateway class
add_action('plugins_loaded', 'klb_pay_init_gateway_class');
function klb_pay_init_gateway_class()
{
    class WC_KLB_Pay_Gateway extends WC_Payment_Gateway
    {
        public function __construct()
        {
            $this->id = 'klb_pay';
            $this->icon = plugins_url('assets/img/klb.png', __FILE__);
            $this->method_title = 'KLB Pay';
            $this->method_description = 'Thiết lập thanh toán đơn hàng qua cổng thanh toán KLB Pay';

            $this->has_fields = false;
            $this->supports = array('products');

            $this->init_form_fields();
            $this->init_settings();

            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');
            $this->enabled = $this->get_option('enabled');
            $this->icon = plugin_dir_url(__FILE__) . 'assets/img/klb.png';

            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
            add_action('woocommerce_api_wc_klb_pay_gateway', array($this, 'handle_klb_response'));
        }

        public function init_form_fields()
        {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'label' => 'Enable KLB Pay',
                    'type' => 'checkbox',
                    'default' => 'no',
                ),
                'title' => array(
                    'title' => 'Title',
                    'type' => 'text',
                    'description' => 'KLB Pay',
                    'default' => 'KLB Pay',
                    'desc_tip' => true,
                ),
                'description' => array(
                    'title' => 'Description',
                    'type' => 'textarea',
                    'description' => 'Pay with KLB Pay.',
                    'default' => 'Pay with KLB Pay.',
                ),
                'klb_host' => array(
                    'title' => 'Host',
                    'type' => 'text',
                    'description' => 'Enter the KLB Pay Host URL.',
                    'desc_tip' => true,
                    'default' => '',
                ),
                'klb_client_id' => array(
                    'title' => 'Client ID (Mã định danh)',
                    'type' => 'text',
                    'description' => 'Enter the client ID for KLB Pay integration.',
                    'desc_tip' => true,
                    'default' => '',
                ),
                'klb_secret_key' => array(
                    'title' => 'Secret Key (Key dùng để ký xác thực)',
                    'type' => 'text',
                    'description' => 'Enter the secret key for KLB Pay integration.',
                    'desc_tip' => true,
                    'default' => '',
                ),
                'klb_encrypt_key' => array(
                    'title' => 'Encrypt Key (Key dùng để mã hóa)',
                    'type' => 'text',
                    'description' => 'Enter the encrypt key for KLB Pay integration.',
                    'desc_tip' => true,
                    'default' => '',
                ),
                'klb_accept_time_diff' => array(
                    'title' => 'Accept Time Difference',
                    'type' => 'number',
                    'description' => 'Enter the accept time difference for KLB Pay integration.',
                    'default' => 1800,
                    'desc_tip' => true,
                ),
            );
        }

        public function get_icon()
        {
            $icon_html = '<img style="max-height: 35px;" src="' . $this->icon . '" alt="' . esc_attr__('KLB Pay acceptance mark', 'woocommerce') . '" />';
            return apply_filters('woocommerce_gateway_icon', $icon_html, $this->id);
        }

        public function process_payment($order_id)
        {
            $order = wc_get_order($order_id);

            if ($order && 'pending' === $order->get_status()) {
                // Tạo transaction KLB Pay tương tự như hàm process_order_before_payment
                $klb_client_id = $this->get_option('klb_client_id');
                $klb_encrypt_key = $this->get_option('klb_encrypt_key');
                $klb_secret_key = $this->get_option('klb_secret_key');
                $klb_accept_time_diff = $this->get_option('klb_accept_time_diff');
                $klb_host = $this->get_option('klb_host');

                $client = initClient($klb_client_id, $klb_encrypt_key, $klb_secret_key, $klb_host, $klb_accept_time_diff);

                $tnx_ref = $order_id;
                $desc = 'Payment for Order #' . $order_id;
                $timeout = 3600;
                $title = 'Payment for Order #' . $order_id;
                $language = 'vi';

                $customer_info = new CustomerInfo(
                    $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
                    $order->get_billing_email(),
                    $order->get_billing_phone(),
                    $order->get_billing_address_1() . ' ' . $order->get_billing_address_2() . ' ' . $order->get_billing_city()
                );

                $success_url = $this->get_return_url($order);
                $fail_url = $order->get_cancel_order_url();

                $request = new CreateTransactionRequest(
                    $tnx_ref,
                    $order->get_total(),
                    $desc,
                    $timeout,
                    $title,
                    $language,
                    $customer_info,
                    $success_url,
                    $fail_url,
                    5,
                    ""
                );

                try {
                    $response = $client->createTransaction($request);

                    $order->add_order_note('Redirecting to KLB Pay payment page.');
                    $order->set_transaction_id($response->getTransactionId());
                    $order->update_status('pending', __('Waiting for KLB Pay payment', 'klb-pay'));
                    $order->save();

                    wp_redirect($response->getUrl());
                    exit;
                } catch (Exception $e) {
                    error_log($e->getMessage());
                    wc_add_notice(__('An error occurred while processing your payment. Please try again later.', 'klb-pay'), 'error');
                    return;
                }
            }

            WC()->cart->empty_cart();
        }
    }
}

function initClient($client_id, $encrypt_key, $secret_key, $host, $accept_time_diff): KPayClient
{
    $k_pay_packer = new KPayPacker(
        $client_id,
        $encrypt_key,
        $secret_key,
        $accept_time_diff,
        $host
    );

    return new KPayClient($k_pay_packer);

}

function klb_check_transaction_on_order_complete($order_id)
{
    $order = wc_get_order($order_id);
    $order_trans_id = $order->get_transaction_id($order_id);
    if ($order && 'on-hold' !== $order->get_status()) {
        $klb_client_id = get_option('klb_client_id');
        $klb_encrypt_key = get_option('klb_encrypt_key');
        $klb_secret_key = get_option('klb_secret_key');
        $klb_accept_time_diff = get_option('klb_accept_time_diff');
        $klb_host = get_option('klb_host');
        $client = initClient($klb_client_id, $klb_encrypt_key, $klb_secret_key, $klb_host, $klb_accept_time_diff);
        try {
            $checkRequest = new QueryTransactionRequest($order_trans_id);
            $response = $client->checkTransaction($checkRequest);
            if ($response->getStatus() === 'Success') {
                $order->update_status('on-hold', __('Payment successful via KLB Pay', 'klb-pay'));
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
}

add_action('woocommerce_order_status_completed', 'klb_check_transaction_on_order_complete');

