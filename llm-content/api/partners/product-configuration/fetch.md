---
title: Fetch a Product Configuration | Sub-Merchant Onboarding APIs
heading: Fetch a Product Configuration
description: Fetch a Product Configuration using Razorpay Partners APIs.
---

# Fetch a Product Configuration

## Fetch a Product Configuration

Use this endpoint to retrieve the details of a product for a given sub-merchant's account. Know about the [various error responses](@/Applications/MAMP/htdocs/new-docs/llm-content/api/partners/errors.md) for this API.

### Request

```Curl: Curl
curl -X GET https://api.razorpay.com/v2/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9e/ \
-u  \

```java: Java

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String accountId = "acc_GP4lfNA0iIMn5B";

String productId = "acc_prd_HEgNpywUFctQ9e";

Account product = instance.product.fetch(accountId, productId);

```php: PHP
$api = new Api(null, null, "");

$accountId = "acc_GP4lfNA0iIMn5B";
$productId = "acc_prd_HEgNpywUFctQ9e";

$products = $api->account->fetch($accountId)->products();

$products->fetch($productId);

```javascript: Node.js

const instance = new Razorpay({
  oauthToken: ""
);

const accountId = "acc_GP4lfNA0iIMn5B";

const productId = "acc_prd_HEgNpywUFctQ9e";

instance.products.fetch(accountId, productId);

```ruby: Ruby
require "razorpay"
Razorpay.setup('ACCESS_TOKEN')
accountId = "acc_GP4lfNA0iIMn5B"

productId = "acc_prd_HEgNpywUFctQ9e"

Razorpay::Product.fetch(accountId, productId)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[ACCESS_TOKEN]");

string accountId = "acc_Z6t7VFTb9xHeOs";

string productId = "acc_prd_Z6t7VFTb9xHeOs";

Product product = client.Product.Fetch(accountId, productId)
```

### Response

```json: PG Success
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
      "flash_checkout": true
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
  "requested_at": 1625478849
}

```json: PL Success
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
      "flash_checkout": true
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
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9f",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "settlements.account_number",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9f",
      "status": "required",
      "reason_code": "field_missing"
    },
    {
      "field_reference": "settlements.ifsc_code",
      "resolution_url": "/accounts/acc_HQVlm3bnPmccC0/products/acc_prd_HEgNpywUFctQ9f",
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
  "id": "acc_prd_HEgNpywUFctQ9f",
  "account_id": "acc_HQVlm3bnPmccC0",
  "product_name": "payment_links",
  "activation_status": "needs_clarification",
  "requested_at": 1625478849
}
```

### Parameters

`account_id` _mandatory_
: `string` The unique identifier of a sub-merchant account generated by Razorpay. For example, `acc_HQVlm3bnPmccC0`.

`id` _mandatory_
: `string` The unique identifier of a product generated by Razorpay. For example, `acc_prd_HEgNpywUFctQ9e`.

### Parameters

`id`
: `string` The unique identifier of a product generated by Razorpay for a sub-merchant account. This id is used to fetch or update a product.

`product_name`
: `string` The product(s) to be configured. Possible values:
  - `payment_gateway`
  - `payment_links`

`tnc`
: `object` It consists of the configuration for the accepted terms and conditions by the merchant for the requested product. If the terms and conditions are accepted by the user for the requested product, it would consist of the following fields:

    `id`
    : `string` The unique identifier representing the acceptance of terms and conditions for a product by a user.

    `accepted`
    : `boolean` The flag that represents whether the terms and conditions are accepted by the user.
        - `true`: Terms and conditions are accepted by user.
        - `false`: Terms and conditions are not accepted by user.

    `accepted_at`
    : `integer` The Unix timestamp at which the terms and conditions were accepted by the user for the requested product.

`activation_status`
: `string` The status of the [product activation](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/product-activation.md).
  - `requested`
  - `needs_clarification`
  - `under_review`
  - `activated`
  - `suspended`

`configuration`
: `object` The following are the possible configurations:

    `payment_methods`
    : `object` The payment methods configured, such as, netbanking, UPI, Wallet and EMI.

        `upi`
        : `object` The UPI type payment method.

            `status`
            : `string` The status of UPI payment method.

            `instrument`
            : `array` The list of UPI instruments requested or enabled. 

        `netbanking`
        : `object` The netbanking type payment method.

            `status`
            : `string` The status of the netbanking payment method.
        
            `instrument`
            : `array` The netbanking instrument object.

                `type`
                : `string` The type of netbanking payment method. Possible values:

                    - Retail

                    - Corporate 

                `bank`
                : `array` The list of netbanking banks requested or enabled. Refer the [Appendix](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/appendix/#netbanking-bank-codes.md) page for netbanking bank codes.

        `wallet`
        : `object` The Wallet type payment method.

            `status`
            : `string` The status of the Wallet payment method.

            `instrument`
            : `array` The list of Wallet instruments requested or enabled.

        `emi`
        : `string` The EMI type payment method.

            `status`
            : `string` The status of EMI payment method.

            `instrument`
            : `array` The EMI instrument object.
        
                `type`
                : `string` The type of EMI payment method. Possible values:
                    - `card_emi`
                    - `cardless_emi`

                `partner`
                : `array` The list of EMI partners requested or enabled. Possible values:
                    - For `card_emi`: `debit` and `credit`.
                    - For `cardless_emi`: `zestmoney` and `earlysalary`.

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

    `payment_capture`
    : `object` The payment capture settings object.

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
        : `string` The name of the beneficiary associated with the bank account. This API parameter is needed complete the KYC process. However, it is optional for this API.

    `refund`
    : `object` This denotes the payment refund settings.

        `default_refund_speed`
        : `string` Speed at which the refund is to be processed. Possible values:
           - normal: Indicates that the refund will be processed at the normal speed. By default, the refund will take 5-7 working days.
           - optimum: Indicates that the refund will be processed at an optimal speed based on Razorpay's internal fund transfer logic. That is:
              - If the refund can be processed instantly, Razorpay will initiate the process irrespective of the payment method used to make the payment.
              - If an instant refund is not made, Razorpay will initiate a refund that is processed at the normal speed. For example, payments made using debit cards, netbanking or unsupported credit cards.

    `checkout`
    : `object` The checkout form of the payment capture.

        `theme_color`
        : `string` The theme color for sub-merchant's checkout page
        
        `logo`
        : `string` The logo of the sub-merchant's business on the checkout page.

        `flash_checkout`
        : `boolean` The flagging options **Enable** or **Disable** for Razorpay's Flash Checkout to securely save the card details of your customers.

    `notifications`
    : `object` This denotes the notifications settings.

        `email`
        : `string` The email addresses that will receive notifications regarding payments, settlements, daily payment reports, webhooks, and so on.

        `whatsapp`
        : `boolean` The WhatsApp notifications you receive regarding payments, settlements, daily payment reports, webhooks, etc.

        `sms`
        : `boolean` The SMS notifications you receive regarding payments, settlements, daily payment reports, webhooks, etc. This attribute will be set to `false`.

`requested_configuration`
: `object` The configuration of the product requested by the user that is yet to be set as active.

`active_configuration`
: `object` The configuration of the product that has been set as active.

`requirements`
: `object` The list of requirements to be enabled for this product or some of the configurations under this product.

    `field_reference`
    : `string` The field which is in issue or missing. The JSON key path in resolution URL.

    `resolution_url`
    : `string` The URL to address the requirement. The API endpoint to be used for updating missing fields or documents.

    `status`
    : `string` The status of the requirement.

    `reason_code`
    : `string` The reason code for showing in the requirement. Description will be sent only when reason code is "". Possible values:
      - `field_missing`
      - `needs_clarification`
      - `document_missing`
      
    `description`
    : `string` This parameter is displayed when the reason_code is `needs_clarification`.

`requested_at`
: `integer` The Unix timestamp at which the product configuration is requested.
