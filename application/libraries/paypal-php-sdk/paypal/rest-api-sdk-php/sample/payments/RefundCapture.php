<?php
// # Refund Capture Sample
// This sample code demonstrates how you can
// process a refund on a Captured transaction.
// API used: /v1/payments/capture/{<captureID>}/refund
/** @var Capture $capture */
$capture = require 'AuthorizationCapture.php';

use PayPal\Api\Capture;
use PayPal\Api\Refund;
use PayPal\Api\RefundRequest;

// ### Refund
// Create a refund object indicating
// refund amount and call the refund method

$refundRequest = new RefundRequest();
$refundRequest->setAmount($amt);

try {
    // Create a new apiContext object so we send a new
    // PayPal-Request-Id (idempotency) header for this resource
    $apiContext = getApiContext($clientId, $clientSecret);

    $captureRefund = $capture->refundCapturedPayment($refundRequest, $apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Refund Capture", "Capture", null, $refundRequest, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
ResultPrinter::printResult("Refund Capture", "Capture", $captureRefund->getId(), $refundRequest, $captureRefund);
