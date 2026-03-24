---
title: Payment Methods | Bank Transfer
heading: Bank Transfer
description: Offer bank transfer as a payment method to customers at Razorpay Checkout.
---

# Bank Transfer

Accept payments from customers using online bank transfers at Razorpay Checkout.

![Checkout screen with Bank Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/pm-checkout-bank-transfer.jpg.md)

  
### On-Demand Feature - Raise a Request

     

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

    

> **WARN**
>
> 
> **Watch Out!**
> 
> Bank transfer downloads are not supported by default on webviews. This feature is only available on web and native SDKs. 
> 

## How it Works

1. Customer selects bank transfer as the payment method on Checkout.
2. A Customer Identifier is created with bank account number and IFSC details and displayed to customer.
3. Customer copies these details and make a netbanking payment from their online banking portal.

These Customer Identifiers are linked to the bank account you have registered with Razorpay. The money will be settled to your account as per the settlement schedule. 

You can choose:

- [**Method 1: Create New Customer Identifier Per Order**](#method-1-create-new-customer-identifier-per-order)
- [**Method 2: Create New Customer Identifier Per Customer**](#method-2-create-new-customer-identifier-per-customer)

> **WARN**
>
> 
> **Watch Out!**
> 
> All bank transfer payments are auto-captured. [Manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#manually-capture-payments) of payments is not supported.
> 

## Method 1: Create New Customer Identifier Per Order

This creates a new Customer Identifier per order, every time a customer selects bank transfer as the payment method on Checkout.

#### Integration

The bank transfer payment method will appear for the [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md) and products such as Payment Links and Payment Pages.

> **INFO**
>
> 
> **Payment Links and Payment Pages**
> 
> No additional integration is required if you are using Payment Links and Payment Pages. Raise a request with our [Support Team](https://razorpay.com/support/#request) to activate the feature on your account.
> 

Apart from enabling this feature on your account, complete the following steps to integrate this feature on your Razorpay Standard Integration:

  
### Step 1: Track Checkout Modal Using `ondismiss` Function

     If you have integrated with [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md), you must implement the `ondismiss` function to track the lifecycle of the Checkout modal. This displays the `close` icon, which the customer can use to exit the Checkout.

      
> **INFO**
>
> 
>       **Handy Tips**
> 
>       If you are using [Android SDK](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard.md), you can rely on the "payment cancelled by user" error response to track the lifecycle of the Checkout modal.
>       

      ```js: ondismiss function
      "modal": {
              "ondismiss": function(){
                  console.log(data);
              }
        }
      ```
    

  
### Step 2: Attach Event Listeners to `Razorpay` Instance

     For bank transfer payments, Checkout will not give a success or a failure callback. You must attach event listeners to the `Razorpay` instance to track if and when the customer has selected the bank transfer payment method.

        ```js: Event Listener
        var rzp = new Razorpay(options);
        rzp.on('payment.submit', function (data) {
          if (data.method === 'bank_transfer') {
            // User has selected Bank Transfer
          }
        });
      ```
    

  
### Step 3: Subscribe to Webhook Event

   You must subscribe to the `virtual_account.credited` webhook event on the Dashboard to receive notifications whenever customers make payments using bank transfers. Know how to [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md).

        **Sample Payload**

        ```json: virtual_account.credited
        {
          "entity": "event",
          "account_id": "acc_BFQ7uQEaa7j2z7",
          "event": "virtual_account.credited",
          "contains": [
            "payment",
            "virtual_account",
            "bank_transfer"
          ],
          "payload": {
            "payment": {
              "entity": {
                "id": "pay_DETA2KrOlhqQzF",
                "entity": "payment",
                "amount": 50000,
                "currency": "INR",
                "status": "captured",
                "order_id": "order_DBJOWzybf0sJbb",
                "invoice_id": null,
                "international": false,
                "method": "bank_transfer",
                "amount_refunded": 0,
                "amount_transferred": 0,
                "refund_status": null,
                "captured": true,
                "description": "NA",
                "card_id": null,
                "bank": null,
                "wallet": null,
                "vpa": null,
                "email": "gaurav.kumar@example.com",
                "contact": "+919000090000",
                "customer_id": "cust_1Aa00000000004",
                "notes": [],
                "fee": 731,
                "tax": 112,
                "error_code": null,
                "error_description": null,
                "created_at": 1567675983
              }
            },
            "virtual_account": {
              "entity": {
                "id": "va_DET8z3wBxfPB5L",
                "name": "Acme Corp",
                "entity": "virtual_account",
                "status": "active",
                "description": "Virtual Account to test webhook",
                "amount_expected": null,
                "notes": {
                  "Important": "Notes for Internal Reference"
                },
                "amount_paid": 50000,
                "customer_id": "cust_1Aa00000000004",
                "close_by": null,
                "closed_at": null,
                "created_at": 1567675923,
                "receivers": [
                  {
                    "id": "ba_DET8z5Z5ghv4hW",
                    "entity": "bank_account",
                    "ifsc": "RATN0VAAPIS",
                    "bank_name": "RBL Bank",
                    "name": "Acme Corp",
                    "account_number": "1112220006712324"
                  }
                ]
              }
            },
            "bank_transfer": {
              "entity": {
                "id": "bt_DETA2KSUJ3uCM9",
                "entity": "bank_transfer",
                "payment_id": "pay_DETA2KrOlhqQzF",
                "mode": "NEFT",
                "bank_reference": "156767598340",
                "amount": 50000,
                "payer_bank_account": {
                  "id": "ba_DETA2UuuKtKLR1",
                  "entity": "bank_account",
                  "ifsc": "KKBK0000007",
                  "bank_name": "Kotak Mahindra Bank",
                  "name": "Gaurav Kumar",
                  "account_number": "765432123456789"
                },
                "virtual_account_id": "va_DET8z3wBxfPB5L"
              }
            }
          },
          "created_at": 1567675983
        }
        ```
  

## Method 2: Create New Customer Identifier Per Customer

This ensures that each customer will be allocated a unique Customer Identifier, whenever they use the bank transfer method on Checkout. This method requires specific integration steps, which are mentioned in the following section.

#### Integration

The bank transfer payment method will appear for the [Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md) and products such as Payment Links and Payment Pages.

> **INFO**
>
> 
> **Payment Links and Payment Pages**
> 
> No additional integration is required if you are using Payment Links and Payment Pages. Raise a request with our [Support Team](https://razorpay.com/support/#request) to activate the feature on your account.
> 

Apart from enabling this feature on your account, you must implement the following steps in your payment gateway integration:

  
### Step 1: Create a Customer

     You must create a customer using the Customers API. You can also do this using the Dashboard.

     Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer

     
      
        Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer-req
      
      
        Razorpay identifies a customer by a unique customer identifier generated at the time of creation. This allows Razorpay to take action on a particular customer on behalf of the merchant for example, send an invoice, set recurring payments, and others./create-customer-res

        Pass the `customer_id` available in the response to Checkout.
      
     
    

  
### Step 2: Create an Order

     @include integration-steps/order-creation
    

  
### Step 3: Pass `customer_id` and `order_id` to Checkout

    You must pass the `customer_id` and `order_id` generated in the previous steps to Checkout, as shown below:

      ```js: Standard Checkout
      Pay
      
      
      var options = {
          "key": "", // Enter the Key ID generated from the Dashboard
          "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          "currency": "INR",
          "name": "Acme Corp",
          "description": "Test Transaction",
          "image": "https://cdn.razorpay.com/logos/BUVypPrCFaKDu3_large.jpg",
          "order_id": "order_DBJOWzybf0sJbb",
          "customer_id": "cust_1Aa00000000004",
          "handler": function (response){
              alert(response.razorpay_payment_id);
              alert(response.razorpay_order_id);
              alert(response.razorpay_signature)
          },
          "theme": {
              "color": "#3399cc"
          }
      };
      var rzp1 = new Razorpay(options);
      document.getElementById('rzp-button1').onclick = function(e){
          rzp1.open();
          e.preventDefault();
      }
      
      ```
    

  
### Step 4: Track Checkout Modal Using `ondismiss` Function

   (Only if you are using [Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md#manual))

    If you have integrated with Razorpay Standard Checkout, you must implement the `ondismiss` function to track the lifecyle of the Checkout modal. This displays the `close` icon, which the customer can use to exit the Checkout.

      ```js: ondismiss function
      "modal": {
              "ondismiss": function(){
                  console.log(data);
              }
        }
      ``` 
   

  
### Step 5: Attach Event Listeners to `Razorpay` Instance *[Optional]*

    For bank transfer payments, Checkout will not give a success or a failure callback. You must attach event listeners to the `Razorpay` instance to track if and when the customer has selected the bank transfer payment method.

      ```js: Event Listener
      var rzp = new Razorpay(options);
      rzp.on('payment.submit', function (data) {
        if (data.method === 'bank_transfer') {
          // User has selected Bank Transfer
        }
      });
      ```
   

  
### Step 6: Subscribe to Webhook Event

    You must subscribe to the `virtual_account.credited` webhook event on the Dashboard to receive notifications whenever customers make payments using bank transfers. Know how to [setup webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md#set-up-webhooks).

    **Sample Payload**

    ```json: virtual_account.credited
    {
      "entity": "event",
      "account_id": "acc_BFQ7uQEaa7j2z7",
      "event": "virtual_account.credited",
      "contains": [
        "payment",
        "virtual_account",
        "bank_transfer"
      ],
      "payload": {
        "payment": {
          "entity": {
            "id": "pay_DETA2KrOlhqQzF",
            "entity": "payment",
            "amount": 50000,
            "currency": "INR",
            "status": "captured",
            "order_id": "order_DBJOWzybf0sJbb",
            "invoice_id": null,
            "international": false,
            "method": "bank_transfer",
            "amount_refunded": 0,
            "amount_transferred": 0,
            "refund_status": null,
            "captured": true,
            "description": "NA",
            "card_id": null,
            "bank": null,
            "wallet": null,
            "vpa": null,
            "email": "gaurav.kumar@example.com",
            "contact": "+919000090000",
            "customer_id": "cust_1Aa00000000004",
            "notes": [],
            "fee": 731,
            "tax": 112,
            "error_code": null,
            "error_description": null,
            "created_at": 1567675983
          }
        },
        "virtual_account": {
          "entity": {
            "id": "va_DET8z3wBxfPB5L",
            "name": "Acme Corp",
            "entity": "virtual_account",
            "status": "active",
            "description": "Virtual Account to test webhook",
            "amount_expected": null,
            "notes": {
              "Important": "Notes for Internal Reference"
            },
            "amount_paid": 50000,
            "customer_id": "cust_1Aa00000000004",
            "close_by": null,
            "closed_at": null,
            "created_at": 1567675923,
            "receivers": [
              {
                "id": "ba_DET8z5Z5ghv4hW",
                "entity": "bank_account",
                "ifsc": "RATN0VAAPIS",
                "bank_name": "RBL Bank",
                "name": "Acme Corp",
                "account_number": "1112220006712324"
              }
            ]
          }
        },
        "bank_transfer": {
          "entity": {
            "id": "bt_DETA2KSUJ3uCM9",
            "entity": "bank_transfer",
            "payment_id": "pay_DETA2KrOlhqQzF",
            "mode": "NEFT",
            "bank_reference": "156767598340",
            "amount": 50000,
            "payer_bank_account": {
              "id": "ba_DETA2UuuKtKLR1",
              "entity": "bank_account",
              "ifsc": "KKBK0000007",
              "bank_name": "Kotak Mahindra Bank",
              "name": "Gaurav Kumar",
              "account_number": "765432123456789"
            },
            "virtual_account_id": "va_DET8z3wBxfPB5L"
          }
        }
      },
      "created_at": 1567675983
    }
    ```
  
 

### Related Information

- [Hosted Integration for Bank Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer/hosted-integration.md)
- [Custom Integration for Bank Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer/custom-integration.md)
