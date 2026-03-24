---
title: FPX
description: Steps to integrate S2S JSON API and accept payments using FPX.
---

# FPX

Financial Process Exchange (FPX) is an online banking payment method that allows end users to pay money directly from their bank account for all online transactions.

## Integration Steps

Follow the steps below to Razorpay Curlec S2S JSON API and accept payments using FPX.

**1.1** [Generate List of Banks Supporting FPX](#11-generate-the-list-of-banks-supporting-fpx)

**1.2** [Create an Order](#12-create-an-order)

**1.3** [Create a Payment](#13-create-a-payment)

**1.4** [Handle Payment Success and Error Events](#14-handle-payment-success-and-error-events)

**1.5** [Integrate Payments Rainy Day Kit](#15-integrate-payments-rainy-day-kit)

**1.6** [Fetch Payment Details and Verify Payment Status](#16-fetch-payment-details-and-verify-payment-status)

### 1.1 Generate the List of Banks Supporting FPX

The first step is identifying and getting the list of banks with their respective codes to integrate correctly. Razorpay Curlec uses its bank codes to correctly identify a bank entity in the system.

> **INFO**
>
> 
> **Handy Tips**
> 
> FPX transactions are of two categories: B2B and B2C. We follow a nomenclature of suffixing `_C` as a parameter if the transaction is of a corporate type.
> 

Use this endpoint to get the list of Banks and their respective codes:

```curl: Request 
curl --location --request GET 'https://api.razorpay.com/v1/methods?key_id={MERCHANT_API_KEY}'

```json: Response
{
   "entity": "methods",
   "fpx": {
       "PHBM": "Affin Bank",
       "PHBM_C": "AFFINMAX",
       "MFBB_C": "Alliance Bank (Business)",
       "MFBB": "Alliance Bank (Personal)",
       "ARBK": "AmBank",
       "ARBK_C": "AmBank",
       "AGOB": "AGRONet",
       "AGOB_C": "AGRONetBIZ",
       "BNPA_C": "BNP Paribas",
       "BIMB_C": "Bank Islam",
       "BIMB": "Bank Islam",
       "BKRM_C": "i-bizRakyat",
       "BKRM": "Bank Rakyat",
       "BMMB_C": "Bank Muamalat",
       "BMMB": "Bank Muamalat",
       "BKCH": "Bank Of China",
       "BSNA": "BSN",
       "CIBB_C": "CIMB Bank",
       "CIBB": "CIMB Clicks",
       "CITI_C": "Citibank Corporate Banking",
       "DEUT_C": "Deutsche Bank",
       "HSBC_C": "HSBC Bank",
       "HSBC": "HSBC Bank",
       "HLBB_C": "Hong Leong Bank",
       "HLBB": "Hong Leong Bank",
       "KFHO_C": "KFH",
       "KFHO": "KFH",
       "MBBE_C": "Maybank2E",
       "MBBE": "Maybank2E",
       "MB2U": "Maybank2U",
       "OCBC_C": "OCBC Bank",
       "OCBC": "OCBC Bank",
       "PBBE_C": "Public Bank",
       "PBBE": "Public Bank",
       "PBBN_C": "PB Enterprise",
       "RHBB_C": "RHB Bank",
       "RHBB": "RHB Bank",
       "SCBL_C": "Standard Chartered",
       "SCBL": "Standard Chartered",
       "UOVB": "UOB Bank",
       "UOVB_C": "UOB Regional"
   }
}
```

### 1.2 Create an Order

To process a payment, create a Razorpay Curlec Order to correspond with the order in your system. Send the order request parameters to the following endpoint:

@include integration-steps/order-creation

### 1.3 Create a Payment

Once an order is created, your next step is to create a payment. The following API will create a payment with `fpx` as the payment method:

/payments/create/json

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "content-type: application/json" \
-d '{
   "amount": 200,
   "currency": "MYR",
   "order_id": "order_LSA6ny1sGKAp0C",
   "email": "nur.aisyah@example.com",
   "contact": "+60123456789",
   "method": "fpx",
   "bank": "MB2U",
   "callback_url": "https://merchant_callback_url.."
}'

```json: Response
{
   "razorpay_payment_id": "pay_LUtJxInEqa0oAA",
   "next": [
       {
           "action": "redirect",
           "url": "https://api.razorpay.com/v1/payments/LUtJxInEqa0oAA/authenticate"
       }
   ]
}
```

### Request Parameters

The payment request for each of the supported payment methods will slightly vary. Know more about the [relevant payment request fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md).

### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. Possible values:
      - `redirect` : Use this URL to redirect customer to submit the OTP on the bank page.
    
    `url`
    : `string`  URL to be used for the action indicated. 

The Payment API will return the payment id along with the authentication URL to which the user has to be redirected. You may choose to store the Payment id on your server to help us enquire about the status and other accounting purposes if required.

You may now choose to redirect the user to the authentication URL that you have received in the response.

### 1.4 Handle Payment Success and Error Events

Once the payment is completed by the customer, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

#### Success Callback

If the payment made by the customer is successful, the following fields are sent:

- `razorpay_payment_id`
- `razorpay_order_id`
- `razorpay_signature`

```json: Callback Example
{
  "razorpay_payment_id": "pay_LUtJxInEqa0oAA&",
  "razorpay_order_id": "order_LUtJ52zWwapfqs&",
  "razorpay_signature": "e617a6c035cb39feb6cd16358d83a4e3d30b11d9e8e2181e6ef442da1d41df20"
}
```

#### Failure Callback

If the payment has failed, the callback will contain details of the error. Refer to [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#errors) for details.

### 1.5 Integrate Payments Rainy Day Kit

@include rainy-day/section

### 1.6 Fetch Payment Details and Verify Payment Status 

After receiving the `razorpay_payment_id` through the `callback_url`, use this endpoint to fetch the payment details:

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/pay_LUuOjDOkeb63gS \

```json: Response
{
   "id": "pay_LUuOjDOkeb63gS",
   "entity": "payment",
   "amount": 100,
   "currency": "MYR",
   "base_amount": 100,
   "status": "captured",
   "order_id": "order_LUuObyEK6ix6TZ",
   "invoice_id": null,
   "international": false,
   "method": "fpx",
   "amount_refunded": 0,
   "refund_status": null,
   "captured": true,
   "description": null,
   "card_id": null,
   "bank": "MB2U",
   "wallet": null,
   "vpa": null,
   "email": "nur.aisyah@example.com",
   "contact": "+6012345678",
   "notes": {
       "notes_key_1": "Nasi Lemak"
   },
   "fee": 0,
   "tax": 0,
   "error_code": null,
   "error_description": null,
   "error_source": null,
   "error_step": null,
   "error_reason": null,
   "acquirer_data": {},
   "created_at": 1679562035
}
```

@include integration-steps/verify-payment-status

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
