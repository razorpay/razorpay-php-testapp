---
title: 1. Emandate Registration
description: Know how to create an authorisation transaction with emandate as a payment method.
---

# 1. Emandate Registration

Emandate registration is a process of creating a payment checkout form for customers to make the authorisation transaction and register their Emandate. A token will be generated once a customer makes this transaction.

Using this authorisation transaction, we can authenticate the customer's Emandate and ensure that we can charge them recurring payments. The authorisation transaction can be created using:
1. Razorpay APIs
2. Registration Link

## 1.1 Using Razorpay APIs

### 1.1.1. Create a Customer
Razorpay links recurring tokens to customers via a unique identifier. You can generate this identifier using the Customer API.

You can create [customers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md) with basic information such as email and contact and use them for various Razorpay offerings. The following endpoint creates a customer.

/customers

```curl: Curl
curl -X POST https://api.razorpay.com/v1/customers \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9876543210",
  "fail_existing":"0",
  "notes":{
    "note_key_1": "November Rains.",
    "note_key_2": "Snow on the beach."
  }
}'
```json: Response
{
  "id": "cust_KhOZydVZbcThjW",
  "entity": "customer",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9876543210",
  "gstin": null,
  "notes": {
    "note_key_1": "November Rains.",
    "note_key_2": "Snow on the beach."
  },
  "created_at": 1668751317
}
```

#### Request Parameters

`name` _mandatory_
: `string` The name of the customer. For example, Gaurav Kumar.

`email` _mandatory_
: `string` The email ID of the customer. For example, gaurav.kumar@example.com.

`contact` _mandatory_
: `string` The phone number of the customer. For example, 9876543210.

`fail_existing` _optional_
: `string` The request throws an exception by default if a customer with the exact details already exists. You can pass an additional parameter `fail_existing` to get the existing customer's details in the response. Possible values:
     - `1` (default): If a customer with the same details already exists, throws an error.
     - `0`: If a customer with the same details already exists, fetches details of the existing customer.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

#### Response Parameters

`id`
: `string` The unique identifier of the customer. For example cust_1Aa00000000001.

`entity`
: `string` The name of the entity. Here, it is customer.

`name`
: `string` The name of the customer. For example, Gaurav Kumar.

`email`
: `string` The email ID of the customer. For example, gaurav.kumar@example.com.

`contact`
: `string` The phone number of the customer. For example, 9876543210.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

`created_at`
: `integer` A Unix timestamp, at which the customer was created.

### 1.1.2. Create an Order
You can use the Orders API to create a unique Razorpay `order_id` that is associated with the authorisation transaction. The following endpoint creates an order.

/orders

```curl: Emandate via Netbanking
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "amount": 100000,
  "currency": "INR",
  "payment_capture": true,
  "method": "emandate",
  "customer_id": "cust_KhOZydVZbcThjW",
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "token": {
    "auth_type": "netbanking",
    "max_amount": 9999900,
    "expire_at": 1692444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "33369611360",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001"
    }
  }
}'
```json: Response
{
  "id": "order_KmZIiMV6xHZOWO",
  "entity": "order",
  "amount": 100000,
  "amount_paid": 0,
  "amount_due": 100000,
  "currency": "INR",
  "receipt": "Receipt No. 1",
  "payments": {
    "entity": "collection",
    "count": 0,
    "items": []
  },
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "created_at": 1669880775,
  "token": {
    "method": "emandate",
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf."
    },
    "recurring_status": null,
    "failure_reason": null,
    "currency": "INR",
    "max_amount": 9999900,
    "auth_type": "netbanking",
    "expire_at": 1692444799,
    "bank_account": {
      "ifsc": "HDFC0000001",
      "bank_name": "HDFC Bank",
      "name": "Gaurav Kumar",
      "account_number": "33369611360",
      "account_type": "savings",
      "beneficiary_email": "gaurav.kumar@example.com",
      "beneficiary_mobile": "9876543210"
    },
    "first_payment_amount": 0
  }
}
```

```curl: Emandate via Debit Card
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "amount": 0,
  "currency": "INR",
  "payment_capture": true,
  "method": "emandate",
  "customer_id": "cust_KhOZydVZbcThjW",
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "token": {
    "auth_type": "debitcard",
    "max_amount": 9999900,
    "expire_at": 1692444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "33369611360",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001"
    }
  }
}'
```json: Response
{
  "id": "order_KmZOwLd9Roh8il",
  "entity": "order",
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "receipt": "Receipt No. 1",
  "payments": {
    "entity": "collection",
    "count": 0,
    "items": []
  },
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "created_at": 1669881129,
  "token": {
    "method": "emandate",
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf."
    },
    "recurring_status": null,
    "failure_reason": null,
    "currency": "INR",
    "max_amount": 9999900,
    "auth_type": "debitcard",
    "expire_at": 1692444799,
    "bank_account": {
      "ifsc": "HDFC0000001",
      "bank_name": "HDFC Bank",
      "name": "Gaurav Kumar",
      "account_number": "33369611360",
      "account_type": "savings",
      "beneficiary_email": "gaurav.kumar@example.com",
      "beneficiary_mobile": "9876543210"
    },
    "first_payment_amount": 0
  }
}
```

```curl: Emandate via Aadhaar
curl -X POST https://api.razorpay.com/v1/orders \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "amount": 0,
  "currency": "INR",
  "payment_capture": true,
  "method": "emandate",
  "customer_id": "cust_KhOZydVZbcThjW",
  "receipt": "Receipt No. 1",
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "token": {
    "auth_type": "aadhaar",
    "max_amount": 9999900,
    "expire_at": 1692444799,
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf."
    },
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "33369611360",
      "account_type": "savings",
      "ifsc_code": "HDFC0000001"
    }
  }
}'
```json: Response
{
  "id": "order_KmZQcRzcp2LroX",
  "entity": "order",
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "receipt": "Receipt No. 1",
  "payments": {
    "entity": "collection",
    "count": 0,
    "items": []
  },
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": {
    "notes_key_1": "Beam me up Scotty",
    "notes_key_2": "Engage"
  },
  "created_at": 1669881224,
  "token": {
    "method": "emandate",
    "notes": {
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf."
    },
    "recurring_status": null,
    "failure_reason": null,
    "currency": "INR",
    "max_amount": 9999900,
    "auth_type": "aadhaar",
    "expire_at": 1692444799,
    "bank_account": {
      "ifsc": "HDFC0000001",
      "bank_name": "HDFC Bank",
      "name": "Gaurav Kumar",
      "account_number": "33369611360",
      "account_type": "savings",
      "beneficiary_email": "gaurav.kumar@example.com",
      "beneficiary_mobile": "9876543210"
    },
    "first_payment_amount": 0
  }
}
```

#### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For emandate, the amount should be 0.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`payment_capture` _mandatory_
: `boolean` Determines whether tha payment status should be changed to captured automatically or not. Possible values:
    - `true`: Payments are captured automatically.
    - `false`: Payments are not captured automatically. You can manually capture payments using the Manually Capture Payments API.

`method` _mandatory_
: `string` The authorization method. Here, it is emandate.

`customer_id` _mandatory_
: `string` The unique identifier of the customer to be charged. For example, cust_D0cs04OIpPPU1F.

`receipt` _optional_
: `string` A user-entered unique identifier of the order. For example, rcptid #1. You must map this parameter to the order_id sent by Razorpay.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

`token`
: Details related to the authorization such as max amount and bank account information.

    `auth_type` _optional_
    : `string` Emandate type used to make the authorisation payment. Possible values:
        - `netbanking`
        - `debitcard`
        - `aadhaar`

    `max_amount` _optional_
    : `integer` The maximum amount in paise a customer can be charged in a transaction. Know about the [maximum and default values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/faqs.md#2-what-is-the-maximum-amount-which-can).

    `expire_at` _optional_
    : `integer` The Unix timestamp to indicate till when you can use the token (authorization on the payment method) to charge the customer subsequent payments. The default value is 10 years for emandate. This value can range from the current date to 31-12-2099 (4102444799).
    
    `notes` _optional_
    : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

    `bank_account`
    : Customer's bank account details that should be pre-filled on the checkout.

        `account_number` _optional_
        : `string` Customer's bank account number.

        `account_type` _optional_
        : `string` Customer's bank account type. Possible values:
            - `savings` (default)
            - `current`

        `ifsc_code` _optional_
        : `string` Customer's bank IFSC. For example UTIB0000001.

        `beneficiary_name` _optional_
        : `string` Name of the beneficiary. For example, Gaurav Kumar.

#### Response Parameters

`id`
: `string` A unique identifier of the order created. For example order_1Aa00000000001.

`entity`
: `string` The entity that has been created. Here it is order.

`amount`
: `integer` Amount in currency subunits. For emandate, the amount should be 0.

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to be paid.

`currency`
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`receipt`
: `string` A user-entered unique identifier of the order. For example, rcptid #1. You must map this parameter to the order_id sent by Razorpay.

`status`
: `string` The status of the order.

`notes`
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` The Unix timestamp at which the order was created.

`token`
: Details related to the authorization such as max amount and bank account information.

    `auth_type`
    : `string` Emandate type used to make the authorisation payment. Possible values:
        - `netbanking`
        - `debitcard`
        - `aadhaar`

    `max_amount`
    : `integer` The maximum amount in paise a customer can be charged in a transaction. Know about the [maximum and default values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/faqs.md#2-what-is-the-maximum-amount-which-can).

    `expire_at`
    : `integer` The Unix timestamp to indicate till when you can use the token (authorization on the payment method) to charge the customer subsequent payments. The default value is 10 years for emandate. This value can range from the current date to 31-12-2099 (4102444799).

    `notes`
    : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

    `bank_account`
    : Customer's bank account details that should be pre-filled on the checkout.

        `account_number`
        : `string` Customer's bank account number.

        `account_type`
        : `string` Customer's bank account type. Possible values:
            - `savings` (default)
            - `current`

        `ifsc_code`
        : `string` Customer's bank IFSC. For example, UTIB0000001.

        `beneficiary_name`
        : `string` Name of the beneficiary. For example, Gaurav Kumar.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can register a customer's mandate and charge them the first recurring payment as part of the same transaction. Know more about how to [charge first payment automatically after emandate registration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/emandate/auto-debit.md).
> 

### 1.1.3. Create an Authorisation Payment
Create a payment checkout form for customers to make authorisation transaction and register their mandate. You can use the Handler Function or Callback URL.

Handler Function | Callback URL
---
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server. | When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL.

```javascript: Checkout with Handler Function
 Pay 
   
  
    var options = {
      "key": "[YOUR_KEY_ID]",
      "order_id": "order_1Aa00000000001",
      "customer_id": "cust_1Aa00000000001",
      "recurring": "1",
      "handler": function (response) {
        alert(response.razorpay_payment_id);
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature);
      },
      "notes": {
        "note_key 1": "Beam me up Scotty",
        "note_key 2": "Tea. Earl Gray. Hot."
      },
      "theme": {
        "color": "#F37254"
      }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
      rzp1.open();
      e.preventDefault();
    }
  

```javascript: Checkout with Callback URL
 Pay 
   
  
    var options = {
      "key": "[YOUR_KEY_ID]",
      "order_id": "order_1Aa00000000001",
      "customer_id": "cust_1Aa00000000001",
      "recurring": "1",
      "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
      "notes": {
        "note_key 1": "Beam me up Scotty",
        "note_key 2": "Tea. Earl Gray. Hot."
      },
      "theme": {
        "color": "#F37254"
      }
    };
    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button1').onclick = function (e) {
      rzp1.open();
      e.preventDefault();
    }
  
```

#### 1.1.3.1. Additional Checkout Fields
You should send the following additional parameters along with the existing checkout options as a part of the authorisation transaction.

`customer_id` _mandatory_
: `string` Unique identifier of the customer created in the first step.

`order_id` _mandatory_
: `string` Unique identifier of the order created in the second step.

`account_id` _mandatory_
: `string` Unique identifier of the submerchant.

`recurring` _mandatory_
: `string` Indicates whether the recurring should be enabled or not. Possible values:
    - 1: Recurring is enabled.
    - 0: Recurring is not enabled.
    - preferred: Use this when you want to support recurring payments and one-time payment in the same flow.

## 1.2. Using Registration Link
Registration Link is an alternate way of creating an authorisation transaction. You can create a registration link using the API or Dashboard.

> **INFO**
>
> 
> **Handy Tips**
> 
> You do not have to create a customer if you choose the registration link method for creating an authorisation transaction.
> 

When you create a registration link, an [invoice](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/invoices.md) is automatically issued to the customer. They can use this invoice to make the authorisation payment.

A registration link should always have an order amount (in paise) the customer will be charged when making the authorisation payment. This amount should be 0 in the case of emandate.

### 1.2.1. Create a Registration Link
The following endpoint creates a registration link.

/subscription_registration/auth_links

```curl: Emandate with Netbanking
curl -X POST https://api.razorpay.com/v1/subscription_registration/auth_links \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780"
  },
  "type": "link",
  "amount": 0,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": {
    "method": "emandate",
    "auth_type": "netbanking",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'
```json: Response
{
  "id": "inv_FHrY6tDtVP2dHg",
  "entity": "invoice",
  "receipt": "Receipt no. 25",
  "invoice_number": "Receipt no. 25",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrY6tiC2y7NNN",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1880480689,
  "issued_at": 1595491063,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491063,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 0,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "test registration link",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/DxEcNtR",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491063,
  "idempotency_key": null
}
```

```curl: Emandate via Debit Card
curl -X POST https://api.razorpay.com/v1/subscription_registration/auth_links \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '{
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780"
  },
  "type": "link",
  "amount": 0,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": {
    "method": "emandate",
    "auth_type": "debitcard",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'
```json: Response
{
  "id": "inv_FHrZAOeCuB9HtK",
  "entity": "invoice",
  "receipt": "Receipt no. 26",
  "invoice_number": "Receipt no. 26",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrZAPOStKd4xS",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1880480689,
  "issued_at": 1595491123,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491123,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 0,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "test registration link",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/RllVOmA",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491123,
  "idempotency_key": null
}
```

```curl: Emandate via Aadhaar
curl -X POST https://api.razorpay.com/v1/subscription_registration/auth_links \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn" \
-H "Content-Type: application/json" \
-d '
{
  "customer": {
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780"
  },
  "type": "link",
  "amount": 0,
  "currency": "INR",
  "description": "12 p.m. Meals",
  "subscription_registration": {
    "method": "emandate",
    "auth_type": "aadhaar",
    "expire_at": 1580480689,
    "max_amount": 50000,
    "bank_account": {
      "beneficiary_name": "Gaurav Kumar",
      "account_number": "11214311215411",
      "account_type": "savings",
      "ifsc_code": "HDFC0001233"
    }
  },
  "receipt": "Receipt no. 1",
  "expire_by": 1880480689,
  "sms_notify": true,
  "email_notify": true,
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'
```json: Response
{
  "id": "inv_FHrZAOeCuB9HtK",
  "entity": "invoice",
  "receipt": "Receipt no. 26",
  "invoice_number": "Receipt no. 26",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrZAPOStKd4xS",
  "line_items": [],
  "payment_id": null,
  "status": "issued",
  "expire_by": 1880480689,
  "issued_at": 1595491123,
  "paid_at": null,
  "cancelled_at": null,
  "expired_at": null,
  "sms_status": "pending",
  "email_status": "pending",
  "date": 1595491123,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 0,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 0,
  "amount_paid": 0,
  "amount_due": 0,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "test registration link",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/RllVOmA",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491123,
  "idempotency_key": null
}
```

#### Request Parameters

`customer`
: Details of the customer to whom the registration link is sent.

  `name` _mandatory_
  : `string` Customer's name.

  `email` _mandatory_
  : `string` Customer's email address.

  `contact` _mandatory_
  : `integer` Customer's contact number.

`type` _mandatory_
: `string` In this case, the value is link.

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, only INR is supported.

`amount` _mandatory_
: `integer` The payment amount in the smallest currency sub-unit.

`description` _mandatory_
: `string` A description that appears on the hosted page. For example, 12:30 p.m. Thali meals (Gaurav Kumar).

`subscription_registration`
: Details of the authorisation payment.

  `method` _mandatory_
  : `string` The authorization method. Here, it is emandate.

  `auth_type` _optional_
  : `string` Possible values:
      - `netbanking`
      - `debitcard`
      - `aadhaar`

  `max_amount` _optional_
  : `integer` The maximum amount, in paise, a customer can be charged in a transaction. Know about [maximum and default values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/faqs.md#2-what-is-the-maximum-amount-which-can).

  `expire_at` _optional_
  : `integer` The Unix timestamp indicates till when you can use the token (authorization on the payment method) to charge the customer their subsequent payments. The default value is 10 years for emandate. This value can range from the current date to 31-12-2099 (4101580799).

  `bank_account`
  : The customer's bank account details.

    `beneficiary_name` _optional_
    : `string` Name on the beneficiary. For example Gaurav Kumar.

    `account_number` _optional_
    : `string` Customer's bank account number. For example 11214311215411.

    `account_type` _optional_
    : `string` Customer's bank account type. Possible values:
        - `savings` (default)
        - `current`
  
    `ifsc_code` _optional_
    : `string` Customer's bank IFSC. For example HDFC0000001.

`sms_notify` _optional_
: `boolean` Indicates if SMS notifications are to be sent by Razorpay. Possible values:
  - `true` (default) : Notifications are sent by Razorpay.
  - `false`: Notifications are not sent by Razorpay.

`email_notify` _optional_
: `boolean` Indicates if email notifications are to be sent by Razorpay. Possible values:
  - `true` (default): Notifications are sent by Razorpay.
  - `false`: Notifications are not sent by Razorpay.

`expire_by` _optional_
: `integer` The Unix timestamp indicates the expiry of the registration link.

`receipt` _optional_
: `string` A unique identifier entered by you for the order. For example, Receipt No. 1. You must map this parameter to the order_id sent by Razorpay.

`notes` _optional_
: `object` This is a key-value pair that is used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, "note_key": "Beam me up Scotty”.

#### Response Parameters

`id`
: `string` The unique identifier of the invoice.

`entity`
: `string` The entity that has been created. Here, it is invoice.

`receipt`
: `string` A user-entered unique identifier of the invoice.

`invoice_number`
: `string` Unique number you added for internal reference.

`customer_id`
: `string` The unique identifier of the customer. For example, cust_BMB3EwbqnqZ2EI.

`customer_details`
: Details of the customer.

  `id`
  : `string` The unique identifier associated with the customer to whom the invoice has been issued.

  `name`
  : `string` The customer's name.

  `email`
  : `string` The customer's email address.

  `contact`
  : `integer` The customer's phone number.

  `billing_address`
  : `string` Details of the customer's billing address.

  `shipping_address`
  : `string` Details of the customer's shipping address.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`line_items`
: `string` Details of the line item that is billed in the invoice. Maximum of 50 line items are allowed.

`payment_id`
: `string` Unique identifier of a payment made against the invoice.

`status`
: `string` The status of the invoice. Possible values:
  - `draft`
  - `issued`
  - `partially_paid`
  - `paid`
  - `cancelled`
  - `expired`
  - `deleted`

`expire_by`
: `integer` The Unix timestamp at which the invoice will expire.

`issued_at`
: `integer` The Unix timestamp at which the invoice was issued to the customer.

`paid_at`
: `integer` The Unix timestamp at which the payment was made.

`cancelled_at`
: `integer` The Unix timestamp at which the invoice was cancelled.

`expired_at`
: `integer` The Unix timestamp at which the invoice expired.

`sms_status`
: `string` The delivery status of the SMS notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`email_status`
: `string` The delivery status of the email notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`date`
: `integer` Timestamp, in Unix format, that indicates the issue date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Maximum of 2048 characters.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is ₹299.95, pass the value as 29995.

`amount_paid`
: `integer` Amount paid by the customer against the invoice.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the invoice. You should mandatorily pass this parameter if you are accepting international payments.

`description`
: `string` A brief description of the invoice.

`notes`
: `object` Any custom notes added to the invoice. Maximum of 2048 characters.

`short_url`
: `string` The short URL that is generated. This is the link that can be shared with the customer to receive payments.

`type`
: `string` Here, it is invoice.

`comment`
: `string` Any comments to be added in the invoice. Maximum of 2048 characters.

### 1.2.2 Send/Resend Notifications
The following endpoint sends/resends notifications with the short URL to the customer:

/invoices/:id/notify_by/:medium

```curl: Curl
curl -X POST https://api.razorpay.com/v1/invoices/inv_FHrfRupD2ouKIt/notify_by/sms \
u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
```json: Response
{
  "success": true
}
```

#### Path Parameters

`id` _mandatory_
: `string` The unique identifier of the invoice linked to the registration link for which you want to send the notification. For example, `inv_FHrfRupD2ouKIt`.

`medium` _mandatory_
: `string` Determines through which medium you want to resend the notification. Possible values:
  - `sms`
  - `email`

#### Response Parameters

`success`
: `boolean` Indicates whether the notifications were sent successfully. Possible values:
  - `true`: The notifications were successfully sent via SMS, email or both.
  - `false`: The notifications were not sent.

### 1.2.3 Cancel a Registration Link
The following endpoint cancels a registration link.

/invoices/:id/cancel

```curl: Curl
curl -X POST https://api.razorpay.com/v1/invoices/inv_FHrfRupD2ouKIt/cancel \
-u [YOUR_PARTNER_KEY_ID]:[YOUR_PARTNER_KEY_SECRET]\
-H "X-Razorpay-Account: acc_KBrJAIEqre5ucn"
```json: Response
{
  "id": "inv_FHrfRupD2ouKIt",
  "entity": "invoice",
  "receipt": "Receipt No. 1",
  "invoice_number": "Receipt No. 1",
  "customer_id": "cust_BMB3EwbqnqZ2EI",
  "customer_details": {
    "id": "cust_BMB3EwbqnqZ2EI",
    "name": "Gaurav Kumar",
    "email": "gaurav.kumar@example.com",
    "contact": "9123456780",
    "gstin": null,
    "billing_address": null,
    "shipping_address": null,
    "customer_name": "Gaurav Kumar",
    "customer_email": "gaurav.kumar@example.com",
    "customer_contact": "9123456780"
  },
  "order_id": "order_FHrfRw4TZU5Q2L",
  "line_items": [],
  "payment_id": null,
  "status": "cancelled",
  "expire_by": 4102444799,
  "issued_at": 1595491479,
  "paid_at": null,
  "cancelled_at": 1595491488,
  "expired_at": null,
  "sms_status": "sent",
  "email_status": "sent",
  "date": 1595491479,
  "terms": null,
  "partial_payment": false,
  "gross_amount": 100,
  "tax_amount": 0,
  "taxable_amount": 0,
  "amount": 100,
  "amount_paid": 0,
  "amount_due": 100,
  "currency": "INR",
  "currency_symbol": "₹",
  "description": "Registration Link for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  },
  "comment": null,
  "short_url": "https://rzp.io/i/QlfexTj",
  "view_less": true,
  "billing_start": null,
  "billing_end": null,
  "type": "link",
  "group_taxes_discounts": false,
  "created_at": 1595491480,
  "idempotency_key": null
}
```

#### Path Parameter

`id` _mandatory_
: `string` The unique identifier for the invoice linked to the registration link that you want to cancel. For example, inv_1Aa00000000001.

#### Response Parameters

`id`
: `string` The unique identifier of the invoice.

`entity`
: `string` The entity that has been created. Here, it is invoice.

`receipt`
: `string` A user-entered unique identifier of the invoice.

`invoice_number`
: `string` Unique number you added for internal reference.

`customer_id`
: `string` The unique identifier of the customer. For example, cust_BMB3EwbqnqZ2EI.

`customer_details`
: Details of the customer.

  `id`
  : `string` The unique identifier associated with the customer to whom the invoice has been issued.

  `name`
  : `string` The customer's name.

  `email`
  : `string` The customer's email address.

  `contact`
  : `integer` The customer's phone number.

  `billing_address`
  : `string` Details of the customer's billing address.

  `shipping_address`
  : `string` Details of the customer's shipping address.

`order_id`
: `string` The unique identifier of the order associated with the invoice.

`line_items`
: `string` Details of the line item that is billed in the invoice. Maximum of 50 line items are allowed.

`payment_id`
: `string` Unique identifier of a payment made against the invoice.

`status`
: `string` The status of the invoice. Possible values:
  - `draft`
  - `issued`
  - `partially_paid`
  - `paid`
  - `cancelled`
  - `expired`
  - `deleted`

`expire_by`
: `integer` The Unix timestamp at which the invoice will expire.

`issued_at`
: `integer` The Unix timestamp at which the invoice was issued to the customer.

`paid_at`
: `integer` The Unix timestamp at which the payment was made.

`cancelled_at`
: `integer` The Unix timestamp at which the invoice was cancelled.

`expired_at`
: `integer` The Unix timestamp at which the invoice expired.

`sms_status`
: `string` The delivery status of the SMS notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`email_status`
: `string` The delivery status of the email notification for the invoice sent to the customer. Possible values:
  - `pending`
  - `sent`

`date`
: `integer` Timestamp, in Unix format, that indicates the issue date of the invoice.

`terms`
: `string` Any terms to be included in the invoice. Maximum of 2048 characters.

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment on the invoice. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount`
: `integer` Amount to be paid using the invoice. Must be in the smallest unit of the currency. For example, if the amount to be received from the customer is ₹299.95, pass the value as 29995.

`amount_paid`
: `integer` Amount paid by the customer against the invoice.

`amount_due`
: `integer` The remaining amount to be paid by the customer for the issued invoice.

`currency`
: `string` The currency associated with the invoice. You should mandatorily pass this parameter if you are accepting international payments.

`description`
: `string` A brief description of the invoice.

`notes`
: `object` Any custom notes added to the invoice. Maximum of 2048 characters.

`short_url`
: `string` The short URL that is generated. This is the link that can be shared with the customer to receive payments.

`type`
: `string` Here, it is invoice.

`comment`
: `string` Any comments to be added in the invoice. Maximum of 2048 characters

> **WARN**
>
> 
> **Watch Out!**
> 
> You can only cancel a registration link that is in the issued state.
>
