<?php

// namespace Oliverhtet\Wavemoney;
namespace Oliverhtet\Wavemoney;

class WavemoneyPayment
{
    public function processPayment($data){
        $validation_data = $this->validatePaymentData($data);
        $transaction = $this->processPaymentTransaction($validation_data);

    }
    private function processPaymentTransaction($data){
        return $data;
    }
    private function validatePaymentData($data)
    {

        $validationErrors = [];

        if (!isset($data['time_to_live_in_seconds']) || !is_numeric($data['time_to_live_in_seconds'])) {
            $validationErrors['time_to_live_in_seconds'] = "Time to Live must be a numeric value.";
        }

        if (!isset($data['merchant_name']) || empty($data['merchant_name'])) {
            $validationErrors['merchant_name'] = "Merchant Name is required.";
        }

        if (!isset($data['merchant_id']) || empty($data['merchant_id'])) {
            $validationErrors['merchant_id'] = "Merchant ID is required.";
        }

        if (!empty($validationErrors)) {
            return ['errors' => $validationErrors];
        }

        return $data;
    }
    
}