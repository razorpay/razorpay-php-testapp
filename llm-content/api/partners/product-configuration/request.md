---
title: Request a Product Configuration | Sub-Merchant Onboarding APIs
heading: Request a Product Configuration
description: Request a Product Configuration for Payment Gateway using Razorpay Partners APIs.
---

# Request a Product Configuration

## Request a Product Configuration | Payment Gateway

Use this endpoint to request a product configuration for Payment Gateway or Payment Links. You can even accept terms and conditions for the requested product using these APIs. Know about the [various error responses](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/errors.md) for this API.

### Request

```Curl: Curl
curl -X POST https://api.razorpay.com/v2/accounts/acc_HQVlm3bnPmccC0/products \
-u  \
-H "Content-Type: application/json" \
-d '{
  "product_name": "payment_gateway",
  "tnc_accepted": true,
  "ip": "233.233.233.234"
}'

```java: Java

RazorpayClient razorpay = new RazorpayClient("[ACCESS_TOKEN]");

String accountId = "acc_GP4lfNA0iIMn5B";

JSONObject productRequest = new JSONObject();
productRequest.put("product_name","payment_gateway");
productRequest.put("tnc_accepted",true);
productRequest.put("ip","233.233.233.234");

Account product = instance.product.requestProductConfiguration(accountId, productRequest);

```php: PHP
$api = new Api(null, null, "");

$accountId = "acc_GP4lfNA0iIMn5B";

$products = $api->account->fetch($accountId)->products();

$products->requestProductConfiguration(array(
 "product_name" => "payment_gateway",
 "tnc_accepted" => true,
 "ip" => "233.233.233.234"
));

```javascript: Node.js

const instance = new Razorpay({
  oauthToken: "",

const accountId = "acc_Q8BdU0uPXXXpqI";

instance.products.requestProductConfiguration(accountId, {
  "product_name" : "payment_gateway",
  "tnc_accepted" : true,
  "ip" : "233.233.233.234"
});

```ruby: Ruby
require "razorpay"
Razorpay.setup('ACCESS_TOKEN')
accountId = "acc_GP4lfNA0iIMn5B"

Razorpay::Product.request_product_configuration(accountId, {
  "product_name": "payment_gateway",
  "tnc_accepted": true,
  "ip": "233.233.233.234"
})

```csharp: .NET
RazorpayClient client = new RazorpayClient("[ACCESS_TOKEN]");
string accountId = "acc_Z6t7VFTb9xHeOs";

Dictionary productRequest = new Dictionary();
productRequest.Add("product_name", "payment_gateway");
productRequest.Add("tnc_accepted", true);
productRequest.Add("ip", "233.233.233.234");

Product product = client.Product.Create(productRequest);

```

### Response

```json: Success
{
  "requested_configuration": {
    "payment_methods": []
  },
  "active_configuration": {
    "payment_capture": {
      "mode": "automatic",
      "refund_speed": "normal",
      "automatic_expiry_period": 7200
    },
    "settlements": {
      "account_number": null,
      "ifsc_code": null,
      "beneficiary_name": null
    },
    "checkout": {
      "theme_color": "#FFFFFF",
      "flash_checkout": true,
      "logo": "https://example.com/your_logo"
    },
    "refund": {
      "default_refund_speed": "normal"
    },
    "notifications": {
      "whatsapp": true,
      "sms": false,
      "email": [
        "b963e252-1201-45b0-9c39-c53eceb0cfd6_load@gmail.com"
      ]
    },
    "payment_methods": {
      "netbanking": {
        "enabled": true,
        "instrument": [
          {
            "type": "retail",
            "bank": [
              "hdfc",
              "sbin",
              "utib",
              "icic",
              "scbl",
              "yesb"
            ]
          }
        ]
      },
      "wallet": {
        "enabled": true,
        "instrument": [
          "airtelmoney",
          "jiomoney",
          "olamoney",
          "payzapp",
          "mobikwik"
        ]
      },
      "upi": {
        "enabled": true,
        "instrument": [
          "upi"
        ]
      }
    }
  },
  "requirements": [
    {
      "field_reference": "individual_proof_of_address",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/stakeholders/{stakeholderId}/documents",
      "status": "required",
      "reason_code": "document_missing"
    },
    {
      "field_reference": "individual_proof_of_identification",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/stakeholders/{stakeholderId}/documents",
      "status": "required",
      "reason_code": "document_missing"
    },
    {
      "field_reference": "business_proof_of_identification",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/documents",
      "status": "required",
      "reason_code": "document_missing"
    },
    {
      "field_reference": "settlements.beneficiary_name",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9e",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "settlements.account_number",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9e",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "settlements.ifsc_code",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9e",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "contact_name",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "name",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/stakeholders",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "customer_facing_business_name",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "kyc.pan",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/stakeholders",
      "status": "required",
      "reason_code": "field_missing"
    }
  ],
  "tnc":{
    "id": "tnc_IgohZaDBHRGjPv",
    "accepted": true,
    "accepted_at": 1641550798
  },
  "id": "acc_prd_HEgNpywUFctQ9e",
  "account_id": "acc_HQVlm3bnPmccC0",
  "product_name": "payment_gateway",
  "activation_status": "needs_clarification",
  "requested_at": 162547884
}
```

### Parameters

`account_id` 
: `string` The unique identifier of the sub-merchant account generated by Razorpay. For example, `acc_HQVlm3bnPmccC0`. This id is used to fetch or update a product. The product is created for this sub-merchant account id.

### Parameters

`product_name` _mandatory_
: `string` The product(s) to be configured. Possible values:
  - `payment_gateway`
  - `payment_links`

`tnc_accepted` _optional_
: `boolean` Pass this parameter to accept terms and conditions. Send this parameter along with the `ip` parameter when the `tnc` is accepted. Possible value is `true` which indicates acceptance of terms and conditions.
 
`ip` _optional_
: `string` The IP address of the merchant while accepting the terms and conditions. Send this parameter along with the `tnc_accepted` parameter when the `tnc` is accepted.

### Parameters

`requested_configuration`
: `object` The configuration of the product requested by the user that is yet to be set as active.

`tnc`
: `object` It consists of the configuration for the accepted terms and conditions by the merchant for the requested product. If the terms and conditions are accepted by the user for the requested product, it would consist of following fields:

    `id`
    : `string` The unique identifier representing the acceptance of terms and conditions for a product by a user.

    `accepted`
    : `boolean` The flag that represents whether the terms and conditions were accepted by the user.
        - `true`: Terms and conditions are accepted by user.
        - `false`: Terms and conditions are not accepted by user.

    `accepted_at`
    : `integer` The Unix timestamp at which the terms and conditions were accepted by the user for the requested product.

`active_configuration`
: `object` The configuration of the product that has been set as active.

    `payment_capture`
    : `object` The Payment Capture Settings Object

        `mode`
        : `string` The mode through which payment capture is done. Possible values:
            - `automatic`: Payments are auto-captured (default)
            - `manual`: You have to manually capture payments using our Capture API or from the Partner's Dashboard.

        `automatic_expiry`
        : `numeric` This denotes the time in minutes when the payment is in the authorized state. This is auto-captured.
        
        `manual_expiry`
        : `numeric` This denotes the time in minutes until you can manually capture payments in the authorized state.
            - Must be equal to or greater than the `automatic_expire_period` value.
            - The default and the maximum value is 7200 minutes.
            - The payments in the authorized state after the `manual_expiry_period` are auto-refunded.        

    `settlements`
    : `object` The Settlement settings object.
    
        `account_number`
        : `string` The bank account number to which settlements are made. Account details can be found on the Dashboard. For example, 7878780080316316.

        `ifsc_code`
        : `string` The IFSC associated with the bank account. For example, `RATN0VAAPIS`.

        `beneficiary_name`
        : `string` The name of the beneficiary associated with the bank account.

    `checkout`
    : `object` The checkout form of the payment capture.

        `theme_color`
        : `string` The theme color for sub-merchant's checkout page.
        
        `logo`
        : `string` The logo of the sub-merchant's business on the checkout page.

        `flash_checkout`
        : `boolean` The flagging options **Enable** or **Disable** for Razorpay's Flash Checkout to securely save the card details of your customers.

    `refund`
    : `object` This denotes the payment refund settings.

        `default_refund_speed`
        : `string` Speed at which the refund is to be processed. Possible values:
           - normal: Indicates that the refund will be processed via the normal speed. By default, the refund will take 5-7 working days.
           - optimum: Indicates that the refund will be processed at an optimal speed based on Razorpay's internal fund transfer logic. That is:
            - If the refund can be processed instantly, Razorpay will initiate the process irrespective of the payment method used to make the payment.
            - If an instant refund is not made, Razorpay will initiate a refund that is processed at the normal speed. For example, payments made using debit cards, netbanking or unsupported credit cards.

    `notifications`
    : `object` This denotes the notifications settings.

        `email`
        : `string` The email addresses that will receive notifications regarding payments, settlements, daily payment reports, webhooks, and so on.

        `whatsapp`
        : `boolean` The WhatsApp notifications you receive regarding payments, settlements, daily payment reports, webhooks, etc.

        `sms`
        : `boolean` The SMS notifications you receive regarding payments, settlements, daily payment reports, webhooks, etc. This attribute will be set to `false`.

    `payment_methods`
    : `object` Details of the payment method you want to enable for the product.

        `netbanking`
        : `object` The payment method to be enabled.

            `enabled`
            : `boolean` Enables or disables the payment method. Possible values:
              - `true`: Enables the `netbanking` payment method.
              - `false`: Does not enable the `netbanking` payment method.

            `instrument`
            : `object` Details regarding the bank.
        
                `type`
                : `string` The type of bank. Possible values are `retail` and `corporate`.
        
                `bank`
                : `string` The bank code. Refer to the [list of bank codes](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/appendix#netbanking-bank-codes.md).

        `card`
        : `object` The payment method to be enabled.

            `enabled`
            : `boolean` Enables or disables the payment method. Possible values:
            - `true`: Enables the `card` payment method.
            - `false`: Does not enable the `card` payment method.

            `instrument`
            : `object` Details regarding the card.
          
                `type`
                : `string` Possible value is `domestic`.
          
                `issuer`
                : `string` The card issuer. Possible values:
                - `amex`
                - `dicl`
                - `maestro`
                - `mastercard`        
                - `rupay`
                - `visa`

        `wallet`
        : `object` The payment method to be enabled. 

            `enabled`
            : `boolean` Enables or disables the payment method. Possible values:
                - `true`: Enables the `wallet` payment method.
                - `false`: Does not enable the `wallet` payment method.

            `instrument`
            : `string` The wallet issuer. Possible values:
                - `airtelmoney`
                - `amazonpay`
                - `jiomoney`
                - `mobiwik`
                - `mpesa`
                - `olamoney`
                - `paytm`
                - `payzapp`
                - `payumoney`
                - `phonepe`
                - `phonepeswitch`
                - `sbibuddy`

        `upi`
        : `object` The payment method to be enabled. 

            `enabled`
            : `boolean` Enables or disables the payment method. Possible values:
              - `true`: Enables the `upi` payment method.
              - `false`: Does not enable the `upi` payment method.

            `instrument`
            : `string` The UPI service provider. Possible values:
                - `google_pay`
                - `upi`

        `paylater`
        : `object` The payment method to be enabled. 

            `enabled`
            : `boolean` Enables or disables the payment method. Possible values:
                - `true`: Enables the `paylater` payment method.
                - `false`: Does not enable the `paylater` payment method.

            `instrument`
            : `string` The Paylater service provider. Possible values:
                - `epaylater`
                - `getsimpl`

        `emi`
        : `object` The payment method to be enabled. 

            `enabled`
            : `boolean` Enables or disables the payment method. Possible values:
                - `true`: Enables the `paylater` payment method.
                - `false`: Does not enable the `paylater` payment method.

            `instrument`
            : `object` The EMI instrument object.
          
                `type`
                : `string` The type of EMI payment method. Possible values:
                    - `card_emi`
                    - `cardless_emi`

                `partner`
                : `string` The list of EMI partners requested or enabled. Possible values:
                  - For `card_emi`: `debit` and `credit`.
                  - For `cardless_emi`: `zestmoney` and `earlysalary`.
                 
`requirements`
: `object` The list of requirements to be enabled for this product or some of the configurations under this product. It is classified into two types: - Required document: field_reference: "proof_type.document_type". For example: `business_proof_of_identification.business_pan_url`. The sub-merchant needs to upload the `business_pan_url` document to get the requirement fulfilled.
- Selected required document: field_reference : "proof_type". For example: `individual_proof_of_address`. The sub-merchant can upload ONE of the following groups, that is, submit [`aadhar_front` ,`aadhar_back`] or [`voter_id_front`, `voter_id_back`] or [`passport_front`, `passport_back`]. Once all the documents of any ONE of the groups are uploaded, the requirement gets fulfilled.

    `field_reference`
    : `string` The field which is in issue or missing. The JSON key path in resolution URL.

    `resolution_url`
    : `string` The URL to address the requirement. The API endpoint to be used for updating missing fields or documents.

    `status`
    : `string` The status of the requirement.

    `reason_code`
    : `string` The reason code for showing in the requirement. Possible values:
      - `field_missing`
      - `needs_clarification`
      - `document_missing`

`id` 
: `string` The unique identifier of the sub-merchant product account generated by Razorpay. For example, `acc_prd_HEgNpywUFctQ9e`. The product is created for this sub-merchant account id.

`account_id` 
: `string` The unique identifier of the sub-merchant generated by Razorpay. For example, `acc_HQVlm3bnPmccC0`.

`product_name` 
: `string` The product(s) to be configured. Possible values:
  - `payment_gateway`
  - `payment_links`

`activation_status`
: `string` The status of the [product activation](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/product-activation.md).
  - `requested`
  - `needs_clarification`
  - `under_review`
  - `activated`
  - `suspended`

`requested_at`
: `integer` The Unix timestamp at which the product configuration has been requested.
