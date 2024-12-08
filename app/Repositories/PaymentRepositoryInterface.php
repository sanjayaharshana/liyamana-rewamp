<?php

namespace App\Repositories;

interface PaymentRepositoryInterface
{
    public function makePayment($orderId);
    public function getPaymentStatus($paymentId);
}
