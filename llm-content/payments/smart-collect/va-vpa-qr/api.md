---
title: Smart Collect APIs
description: Razorpay Smart Collect APIs let you create Customer Identifiers, fetch payments made to a Customer Identifier and close Customer Identifiers. Find sample request and response here.
---

# Smart Collect APIs

The Smart Collect APIs enable you to create Customer Identifiers, fetch details of payments made and also close the Customer Identifiers.

## Prerequisite

Ensure you have read the [product document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr.md) before you proceed with the API integration.

### API Authentication

All Razorpay APIs are authenticated using `Basic Auth`. Basic auth requires the following:
- `[YOUR_KEY_ID]`
- `[YOUR_KEY_SECRET]`

Basic auth expects an `Authorization` header for each request in the `Basic base64token` format. Here, `base64token` is a base64 encoded string of `YOUR_KEY_ID:YOUR_KEY_SECRET`. 

> **WARN**
>
> 
> **Watch Out!**
> 
> The `Authorization` header value should strictly adhere to the format mentioned above. Invalid formats will result in authentication failures. 
> Few examples of **invalid** headers are: `BASIC base64token`, `basic base64token`, `Basic "base64token"` and `Basic $base64token`.
> 

### API Gateway

For most of the Razorpay APIs, the Gateway URL is `https://api.razorpay.com/v1`. You need to include this before each API endpoint to make API calls. However, certain APIs are on V2. Hence, the gateway URL may differ for certain APIs.

    
### Example

            

            - Use the URL `https://api.razorpay.com/v1/payments` to access payment resources.

            - Use the URL `https://api.razorpay.com/v2/accounts` to access Route (Linked Account)-related resources.

            

            
        

### Generate API Keys

Follow these steps to generate API keys:

  
   Watch this video to see how to generate API keys in the Test mode.

   
[Video: https://www.youtube.com/embed/VOn8JlGPG2I?si=WTAbAeLB3Hnp1n3r]

  

  
   Watch this video to see how to generate API keys in the Live mode.

   
[Video: https://www.youtube.com/embed/Cer8UfBGX_E?si=Libr1RXoFSEDfY1c]

  

1. Log in to your Dashboard with the appropriate credentials.
2. Select the mode (**Test** or **Live**) for which you want to generate the API key. 
    - **Test Mode**: The test mode is a simulation mode that you can use to test your integration flow. **Your customers will not be able to make payments in this mode**. 
    - **Live Mode**: When your integration is complete, switch to live mode and generate live mode API keys. In the integration, **replace test mode keys with live mode keys to accept customer payments**.
3. Navigate to **Account & Settings** → **API Keys** (under **Website and app settings**) → **Generate Key** to generate key for the selected mode.

> **WARN**
>
> 
> **Watch Out!**
> 
> - After generating the keys from the Dashboard, download and save them securely. You can use only one set of API keys. If you do not remember your API keys, you must [regenerate them](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#regenerate-api-keys) from the Dashboard and update them wherever the previous keys were used for payment gateway integrations. 
> - API Keys are universal; that is, they are applicable to all websites and apps that you have whitelisted for your Merchant ID.
> - **Do not share your API Key secret** with anyone or on any public platforms. **This can pose security threats to your Razorpay account**.
> - Once you generate the API Keys, only the **Key Id** is visible on the Dashboard, **not the Key secret**, as it can pose security threats to your Razorpay account.
> - Use the **Live API Keys** to accept live payments and the **Test API Keys** for test transactions.
> 

## Customer Identifiers Workflow

To start accepting payments using Customer Identifiers, you must:
- [Create a customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) (optional)
- [Create a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/api/create.md)
- Share Customer Identifier details with customer
- [Setup webhooks to receive payment notifications](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/va-vpa-qr/notification.md) (optional)

## Smart Collect Entity

`id`
: `string` The unique identifier of the virtual account.

`name`
: `string` The `merchant billing label` as it appears on the Dashboard.

`entity`
: `string` Indicates the type of entity. Here, it is `virtual account`.

`status`
: `string` Indicates whether the virtual account is in `active` or `closed` state.

`description`
: `string` A brief description about the virtual account.

`amount_paid`
: `integer` The amount paid by the customer into the virtual account.

`notes`
: `json object` Any custom notes you might want to add to the virtual account can be entered here. Refer [Notes section of the API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to learn more.

`customer_id`
: `string` Unique identifier of the customer the virtual account is linked with. Refer the [Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) section to learn more.

`receivers`
: `json object` Configuration of desired receivers for the virtual account.

  `id`
  : `string` The unique identifier of the virtual bank account or virtual UPI ID. Sample IDs for:

    
 - virtual bank account - `ba_Di5gbQsGn0QSz3` 
 - virtual UPI ID - `vpa_CkTmLXqVYPkbxx` 
 - virtual qr code - `qr_F7BtWoRgpM7eOn`.

  `entity`
  : `string` Name of the entity. Possible values are 
 - `bank_account` 
 - `vpa` 
 - `qr_code`

  `ifsc`
  : `string` The IFSC for the virtual bank account created. For example, `RAZR0000001`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `bank_name`
  : `string` The bank associated with the virtual bank account. For example, `RBL Bank`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `account_number`
  : `string` The unique account number provided by the bank. For example, `1112220061746877`. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `name`
  : `string` The `merchant billing label` as it appears on the Dashboard. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `notes`
  : `json object` Any custom notes you might want to add to the virtual bank account or virtual UPI ID can be entered here. Refer [Notes section of the API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) to learn more. This parameter appears in the response only when `bank_account` is passed as the receiver `type`.

  `username`
  : `string` The UPI ID consists of the username and the bank handle. The `username` consists of the `namespace` (assigned by the bank to Razorpay), the `merchant prefix` (which can be customised by you) and the `descriptor` (which you provide to identify the customer). The unique identifier which forms the first half of the virtual UPI ID. For example, `rpy.payto00000gaurikumari`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

  `handle`
  : `string` The bank name that forms the second half of the virtual UPI ID.  For example, `icici`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

  `address`
  : `string` The UPI ID that combines the `username` and the `handle` with the `@` symbol. For example, `rpy.payto00000gaurikumari@icici`. This parameter appears in the response only when `vpa` is passed as the receiver `type`.

  `reference`
  : `string` The reference number. This parameter appears in the response only when `qr_code` is passed as the receiver `type`.

  `short_url`
  : `string` The URL to download the QR code. For example, `https://rzp.io/i/y0hrZw2`. This parameter appears in the response only when `qr_code` is passed as the receiver `type`.

`close_by`
: `integer` UNIX timestamp at which the virtual account is scheduled to be automatically closed. The time must be at least 15 minutes after current time. The date range can be set till `2147483647` in UNIX timestamp format (equivalent to Tuesday, January 19, 2038 8:44:07 AM GMT+05:30).

> **INFO**
>
> **Note**:
Any request beyond `2147483647` UNIX timestamp will fail.

`closed_at`
: `integer` UNIX timestamp at which the virtual account is automatically closed.

`created_at`
: `integer` UNIX timestamp at which the virtual account was created.

```json: Sample Entity
{
  "id":"va_CaVE4QbyJvQRdk",
  "name":"Acme Corp",
  "entity":"virtual_account",
  "status":"active",
  "description":"Virtual Account created for Gaurav Kumar",
  "notes":{
    "flat no":"105"
  },
  "amount_paid":0,
  "customer_id":"cust_805c8oBQdBGPwS",
  "receivers":[
    {
      "id": "ba_DzXNNxY8yQu5iV",
      "entity": "bank_account",
      "ifsc":"RATN0VAAPIS",
      "bank_name": "RBL Bank",
      "name": "Acme Corp",
      "notes": [],
      "account_number": "2223333230231378"
    },
    {
      "id":"vpa_CkTmLXqVYPkbxx",
      "entity":"vpa",
      "username":"rpy.payto00000gaurikumari",
      "handle":"icici",
      "address":"rpy.payto00000gaurikumari@icici"
    },
    {
      "id": "qr_F7BtWoRgpM7eOn",
      "entity": "qr_code",
      "reference": "F7BtWoRgpM7eOn",
      "short_url": "https://rzp.io/i/y0hrZw2",
    }
  ],
  "close_by": 1581615838,
  "closed_at": null,
  "created_at": 1577962694
}
```
