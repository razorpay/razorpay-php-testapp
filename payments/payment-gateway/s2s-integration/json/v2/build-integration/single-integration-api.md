---
title: Single Integration API
description: Create Order and Payments in a single API call.
---

# Single Integration API

You can now create an order along with a payment using a single API for netbanking, cards and UPI. Given below are details and examples for all three payment methods followed by steps to integrate S2S JSON API and accept payments using [netbanking](#netbanking), [cards](#cards) and [UPI](#upi).

  
### Netbanking

     
     Create an **order** along with **payment** using the consolidated order and payment API. This single API call combines order and payment creation, resulting in a more efficient and faster transaction process.

     Create a order along with payment by:
     - Making a single API call to Razorpay, combining order and payment creation.
     - Authenticating using the provided credentials, ensuring access to the consolidated payment API.
     - Manually integrating the API sample codes on your server.

     Use the following API to create an order along with payment using `netbanking` as the payment method:

     ```curl: Curl
     curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d '{
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "partial_payment": true,
      "customer_id": "cust_E9penp7VGhT5yt",
      "transfers": [
        {
          "account": "acc_IRQWUleX4BqvYn",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore North",
            "name": "Gaurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": true,
          "on_hold_until": 1671222870
        },
        {
          "account": "acc_IROu8Nod6PXPtZ",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore South",
            "name": "Saurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": false
        }
      ],
      "products": [],
      "bank_account": {
        "account_number": "765432123456789",
        "name": "Gaurav Kumar",
        "ifsc": "HDFC0000053"
      },
      "payment_config": {
      "capture": "automatic",
      "capture_options": {
          "automatic_expiry_period": 12,
          "manual_expiry_period": 7200,
          "refund_speed": "optimum"
        }
      },
      "payment": {
        "amount": 100,
        "email": "gaurav.kumar@example.com",
        "contact": "9123456789",
        "ip": "192.168.0.103",
        "method": "netbanking",
        "bank": "HDFC",
        "description": "Test payment",
        "notes": {
          "note_key": "value1"
        }
      },
      "user_agent": "Mozilla/5.0"
     }

     ```java: Java
     import org.json.JSONObject;
     import com.razorpay.Payment;
     import com.razorpay.RazorpayClient;
     import com.razorpay.RazorpayException;

     RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
     JSONObject orderRequest = new JSONObject();
     orderRequest.put("amount", 50000);
     orderRequest.put("currency", "INR");
     orderRequest.put("receipt", "receipt#1");
     JSONObject notes = new JSONObject();
     notes.put("key1", "value3");
     notes.put("key2", "value2");
     orderRequest.put("notes", notes);
     orderRequest.put("partial_payment", true);
     orderRequest.put("customer_id", "cust_E9penp7VGhT5yt");
     JSONArray transfer = new JSONArray();

     JSONObject transferAccount1 = new JSONObject();
     transferAccount1.put("account", "acc_IRQWUleX4BqvYn");
     transferAccount1.put("amount", 1000);
     transferAccount1.put("currency", "INR");
     JSONObject transferAccountNotes1 = new JSONObject();
     transferAccountNotes1.put("branch", "Acme Corp Bangalore North");
     transferAccountNotes1.put("name", "Gaurav Kumar");
     transferAccount1.put("notes", transferAccountNotes1);

     JSONArray transferAccountLinkedAccountNotes = new JSONArray();
     transferAccountLinkedAccountNotes.put("branch");
     transferAccount1.put("linked_account_notes", transferAccountLinkedAccountNotes);
     transferAccount1.put("on_hold", true);
     transferAccount1.put("on_hold_until", 1671222870);
     transfer.put(transferAccount1);

     JSONObject transferAccount2 = new JSONObject();
     transferAccount2.put("account", "acc_IROu8Nod6PXPtZ");
     transferAccount2.put("amount", 1000);
     transferAccount2.put("currency", "INR");
     JSONObject transferAccountNotes2 = new JSONObject();
     transferAccountNotes2.put("branch", "Acme Corp Bangalore South");
     transferAccountNotes2.put("name", "Saurav Kumar");
     transferAccount2.put("notes", transferAccountNotes2);
     JSONArray transferAccountLinkedAccountNotes2 = new JSONArray();
     transferAccountLinkedAccountNotes2.put("branch");
     transferAccount2.put("linked_account_notes", transferAccountLinkedAccountNotes2);
     transferAccount2.put("on_hold", false);
     transfer.put(transferAccount2);
     orderRequest.put("transfers", transfer);

     JSONArray products = new JSONArray();
     orderRequest.put("products", products);

     JSONObject bankAccount = new JSONObject();
     bankAccount.put("account_number", "765432123456789");
     bankAccount.put("name", "Gaurav Kumar");
     bankAccount.put("ifsc", "HDFC0000053");
     orderRequest.put("bank_account", bankAccount);
     JSONObject paymentConfig = new JSONObject();
     paymentConfig.put("capture", "automatic");
     JSONObject paymentConfigCaptureOptions = new JSONObject();
     paymentConfigCaptureOptions.put("automatic_expiry_period", 12);
     paymentConfigCaptureOptions.put("manual_expiry_period", 7200);
     paymentConfigCaptureOptions.put("refund_speed", "optimum");
     paymentConfig.put("capture_options", paymentConfigCaptureOptions);
     orderRequest.put("payment_config", paymentConfig);
     JSONObject payment = new JSONObject();
     payment.put("amount", 100);
     payment.put("email", "gaurav.kumar@example.com");
     payment.put("contact", "9123456789");
     payment.put("ip", "192.168.0.103");
     payment.put("method", "netbanking");
     payment.put("bank", "HDFC");
     payment.put("description", "Test payment");
     JSONObject paymentNotes = new JSONObject();
     paymentNotes.put("note_key", "value1");
     payment.put("notes", paymentNotes);
     orderRequest.put("payment", payment);
     orderRequest.put("user_agent", "Mozilla/5.0");

     Order order = instance.orders.create(orderRequest);

     ```javascript: Node.js
     var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })
     var data = {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
     },
     "partial_payment": true,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": true,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Saurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": false
       }
     ],
     "products": [],
     "bank_account": {
       "account_number": "765432123456789",
       "name": "Gaurav Kumar",
       "ifsc": "HDFC0000053"
     },
     "payment_config": {
     "capture": "automatic",
     "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9123456789",
       "ip": "192.168.0.103",
       "method": "netbanking",
       "bank": "HDFC",
       "description": "Test payment",
       "notes": {
       "note_key": "value1"
       }
     },
     "user_agent": "Mozilla/5.0"
     }
      
     instance.orders.create(data);

     ```python: Python
     import razorpay
     client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))
     client.order.create({
     "amount": 50000,
     "currency": "INR",
     "receipt": "receipt#1",
     "notes": {
       "key1": "value3",
       "key2": "value2"
     },
     "partial_payment": true,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": True,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Saurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": False
       }
     ],
     "products": [],
     "bank_account": {
       "account_number": "765432123456789",
       "name": "Gaurav Kumar",
       "ifsc": "HDFC0000053"
     },
     "payment_config": {
     "capture": "automatic",
     "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9123456789",
       "ip": "192.168.0.103",
       "method": "netbanking",
       "bank": "HDFC",
       "description": "Test payment",
       "notes": {
       "note_key": "value1"
       }
     },
     "user_agent": "Mozilla/5.0"
     })

     ```ruby: Ruby
     require "razorpay"
     Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')
     para_attr = {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
     },
     "partial_payment": 1,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": 1,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Saurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": 0
       }
     ],
     "products": [],
     "bank_account": {
       "account_number": "765432123456789",
       "name": "Gaurav Kumar",
       "ifsc": "HDFC0000053"
     },
     "payment_config": {
     "capture": "automatic",
     "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9123456789",
       "ip": "192.168.0.103",
       "method": "netbanking",
       "bank": "HDFC",
       "description": "Test payment",
       "notes": {
       "note_key": "value1"
       }
     },
     "user_agent": "Mozilla/5.0"
     }

     Razorpay::Order.create(para_attr)

     ```php: PHP
     $api = new Api($key_id, $secret);
     $api->order->create(array('amount'=>50000,'currency'=>'INR','receipt'=>'receipt#1','notes'=>array('key1'=>'value3','key2'=>'value2',),'partial_payment'=>true,'customer_id'=>'cust_E9penp7VGhT5yt','transfers'=>array(array('account'=>'acc_IRQWUleX4BqvYn','amount'=>1000,'currency'=>'INR','notes'=>array('branch'=>'Acme Corp Bangalore North','name'=>'Gaurav Kumar',),'linked_account_notes'=>array('branch',),'on_hold'=>true,'on_hold_until'=>1671222870,),array('account'=>'acc_IROu8Nod6PXPtZ','amount'=>1000,'currency'=>'INR','notes'=>array('branch'=>'Acme Corp Bangalore South','name'=>'Saurav Kumar',),'linked_account_notes'=>array('branch',),'on_hold'=>false,),),'products'=>array(),'bank_account'=>array('account_number'=>'765432123456789','name'=>'Gaurav Kumar','ifsc'=>'HDFC0000053',),'payment_config'=>array('capture'=>'automatic','capture_options'=>array('automatic_expiry_period'=>12,'manual_expiry_period'=>7200,'refund_speed'=>'optimum',),),'payment'=>array('amount'=>100,'email'=>'gaurav.kumar@example.com','contact'=>'9123456789','ip'=>'192.168.0.103','method'=>'netbanking','bank'=>'HDFC','description'=>'Test payment','notes'=>array('note_key'=>'value1',),),'user_agent'=>'Mozilla/5.0',));
     ```

     ```json: Success
     {
       "id": "order_EKwxwAgItmmXdp",
       "status": "attempted",
       "receipt": "receipt#1",
       "notes": {
         "key1": "value3",
         "key2": "value2"
       },
       "created_at": 1582628071,
       "amount": 50000,
       "amount_paid": 0,
       "amount_due": 50000,
       "currency": "INR",
       "offer_id": null,
       "attempts": 1,
       "transfers": [],
       "payment_workflow": {
          "id": "pay_FVmAstJWfsD3SO",
          "next": [
            {
              "action": "redirect",
              "url": "https://api.razorpay.com/v1/payments/FVptEs3cSWX1fs/authorize"
            },
          ]
        }
      }
      
      
     ```json: Failure
     {
       "error": {
         "code": "BAD_REQUEST_ERROR",
         "description": "The amount must be at least INR 1.00",
         "source": "business",
         "step": "order_create",
         "reason": "input_validation_failed",
         "metadata": {},
         "field": "amount"
        }
      }
     ```

     #### Request Parameters

     `amount` _mandatory_
     : `integer` The amount for which the order was created in currency subunits. For example, for an amount of ₹295.00, enter 29500. The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

    `currency` _mandatory_
     : `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

     `receipt` _optional_
     : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

     `partial_payment` _optional_
     : `boolean` Indicates whether the customer can make a partial payment. Possible values:
        - `true`: The customer can make partial payments.
        - `false` (default): The customer cannot make partial payments.

     `first_payment_min_amount` _optional_
     : `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of ₹7,000 is to be received from the customer in two installments of #1 - ₹5,000, #2 - ₹2,000, then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

     `customer_id` _optional_
     : `string` Unique identifier of the customer.

     `transfers` _optional_
     : `json object` Details regarding the transfer.

        `account`
          : `string` The recipient account ID for fund transfer.

        `amount` _optional_
          : `string` The amount of the transfer.

        `currency` _mandatory_
          : `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

        `notes` _optional_
          : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

      `linked_account_notes` _optional_
     : `string` Notes associated with the linked account.  

      `on_hold` _mandatory_
      : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
          - `true`: Puts the settlement on hold.
          - `false`: Releases the settlement.

      `on_hold_until` _mandatory_
     : `integer` Timestamp until which the transfer amount is on hold.

     `bank_account` _optional_
     : `json object` Details of the bank account that the customer provides at the time of registration.

        `account_number` _optional_
        : `string` Account number of the customers bank account.

        `name` _optional_
        : `string` The name associated with the bank account.

        `ifsc` _optional_
        : `string` The IFSC code of the bank.

    `payment_config` _optional_
    : `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

      `capture` _mandatory_
      : `string` Option to automatically capture payment. Possible values:
        - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
        - `manual`: You have to manually capture payments using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments).

      `capture_options` _optional_
      : `array` Use this array to determine the expiry period for automatic and [manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

          `automatic_expiry_period` _mandatory if capture = automatic_
          : `integer` Time in minutes till when payments in the `authorized` state should be auto-captured.
            Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

          `manual_expiry_period` _optional_ 
          : `integer` Time in minutes till when you can manually capture payments in the `authorized` state.
            - Must be equal to or greater than the `automatic_expiry_period` value.
            - Default value `7200` minutes.
            - Maximum value `7200` minutes.
            - Payments in the `authorized` state after the `manual_expiry_period` are auto-refunded.

          `refund_speed` _mandatory_
          : `string` Refund speed for payments that were not captured (automatically or manually). Possible values:
            - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Learn more about instant refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#how-instant-refunds-work).
            - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#setting-the-default-speed-of-refunds).

    `payment` _mandatory_
        : `object` Details of the payment.

        `amount` _optional_
        : `integer` The amount for which the order was created in currency subunits. For example, for an amount of ₹295.00, enter 29500. The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

        `email` _mandatory_
        : `string` Email address of the customer.

        `contact` _mandatory_
        : `integer` Contact number of the customer.

        `ip` _mandatory_
        : `string` The customer's IP address.

        `method` _mandatory_
        : `string` Name of the payment method (example, netbanking, cards and upi).

        `bank` _mandatory_
        : `string` Name of the bank.

        `description` _mandatory_
        : `string` Description of the payment.
     
  Descriptions for the response parameters are present in the [Response parameter table](#response-parameters). 

    

  
### Cards

     
     
     
> **WARN**
>
> 
>      **Watch Out!**
>      
>      The request body will differ from those created by other PSPs for tokens created on Razorpay.
>      

     

     The following API will create a payment with `cards` as the payment method:
    
     ```curl: With Card Number
     curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "partial_payment": true,
      "customer_id": "cust_E9penp7VGhT5yt",
      "transfers": [
        {
          "account": "acc_IRQWUleX4BqvYn",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore North",
            "name": "Gaurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": true,
          "on_hold_until": 1671222870
        },
        {
          "account": "acc_IROu8Nod6PXPtZ",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore South",
            "name": "Gaurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": false
        }
      ],
      "products": [],
      "payment_config": {
        "capture": "automatic",
        "capture_options": {
          "automatic_expiry_period": 12,
          "manual_expiry_period": 7200,
          "refund_speed": "optimum"
        }
      },
      "payment": {
        "amount": 100,
        "email": "gaurav.kumar@example.com",
        "contact": "9090909090",
        "method": "card",
        "notes": {
          "key1": "value3",
          "key2": "value2"
        },
        "card": {
          "number": "4386289407660153",
          "name": "Gaurav",
          "expiry_month": "11",
          "expiry_year": "30",
          "cvv": "100"
        },
        "authentication": {
          "authentication_channel": "browser"
        },
        "browser": {
          "java_enabled": false,
          "javascript_enabled": false,
          "timezone_offset": 11,
          "color_depth": 23,
          "screen_width": 23,
          "screen_height": 100
        },
        "ip": "105.106.107.108",
        "referer": "https://merchansite.com/example/paybill"
      },
      "user_agent": "Mozilla/5.0"
     } 

    ```curl: With Token Created on Razorpay
     curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "partial_payment": true,
      "customer_id": "cust_E9penp7VGhT5yt",
      "transfers": [
        {
          "account": "acc_IRQWUleX4BqvYn",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore North",
            "name": "Gaurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": true,
          "on_hold_until": 1671222870
        },
        {
          "account": "acc_IROu8Nod6PXPtZ",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore South",
            "name": "Gaurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": false
        }
      ],
      "products": [],
      "payment_config": {
        "capture": "automatic",
        "capture_options": {
          "automatic_expiry_period": 12,
          "manual_expiry_period": 7200,
          "refund_speed": "optimum"
        }
      },
      "payment": {
        "amount": 100,
        "email": "gaurav.kumar@example.com",
        "contact": "9090909090",
        "method": "card",
        "notes": {
          "key1": "value3",
          "key2": "value2"
        },
        "token": "token_IJr7WSRFECVBSX",
        "card": {
          "cvv": "100"
        },
        "authentication": {
          "authentication_channel": "browser"
        },
        "browser": {
          "java_enabled": false,
          "javascript_enabled": false,
          "timezone_offset": 11,
          "color_depth": 23,
          "screen_width": 23,
          "screen_height": 100
        },
        "ip": "105.106.107.108",
        "referer": "https://merchansite.com/example/paybill"
      },
      "user_agent": "Mozilla/5.0"
     }

     ```java: Java
     import org.json.JSONObject;
     import com.razorpay.Payment;
     import com.razorpay.RazorpayClient;
     import com.razorpay.RazorpayException;

     RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
     JSONObject orderRequest = new JSONObject();
     orderRequest.put("amount", 50000);
     orderRequest.put("currency", "INR");
     orderRequest.put("receipt", "receipt#1");
     JSONObject notes = new JSONObject();
     notes.put("key1", "value3");
     notes.put("key2", "value2");
     orderRequest.put("notes", notes);
     orderRequest.put("partial_payment", true);
     orderRequest.put("customer_id", "cust_E9penp7VGhT5yt");
     JSONArray transfer = new JSONArray();

     JSONObject transferAccount1 = new JSONObject();
     transferAccount1.put("account", "acc_IRQWUleX4BqvYn");
     transferAccount1.put("amount", 1000);
     transferAccount1.put("currency", "INR");
     JSONObject transferAccountNotes1 = new JSONObject();
     transferAccountNotes1.put("branch", "Acme Corp Bangalore North");
     transferAccountNotes1.put("name", "Gaurav Kumar");
     transferAccount1.put("notes", transferAccountNotes1);

     JSONArray transferAccountLinkedAccountNotes = new JSONArray();
     transferAccountLinkedAccountNotes.put("branch");
     transferAccount1.put("linked_account_notes", transferAccountLinkedAccountNotes);
     transferAccount1.put("on_hold", true);
     transferAccount1.put("on_hold_until", 1671222870);
     transfer.put(transferAccount1);

     JSONObject transferAccount2 = new JSONObject();
     transferAccount2.put("account", "acc_IROu8Nod6PXPtZ");
     transferAccount2.put("amount", 1000);
     transferAccount2.put("currency", "INR");
     JSONObject transferAccountNotes2 = new JSONObject();
     transferAccountNotes2.put("branch", "Acme Corp Bangalore South");
     transferAccountNotes2.put("name", "Saurav Kumar");
     transferAccount2.put("notes", transferAccountNotes2);
     JSONArray transferAccountLinkedAccountNotes2 = new JSONArray();
     transferAccountLinkedAccountNotes2.put("branch");
     transferAccount2.put("linked_account_notes", transferAccountLinkedAccountNotes2);
     transferAccount2.put("on_hold", false);
     transfer.put(transferAccount2);
     orderRequest.put("transfers", transfer);

     JSONArray products = new JSONArray();
     orderRequest.put("products", products);

     JSONObject paymentConfig = new JSONObject();
     paymentConfig.put("capture", "automatic");
     JSONObject paymentConfigCaptureOptions = new JSONObject();
     paymentConfigCaptureOptions.put("automatic_expiry_period", 12);
     paymentConfigCaptureOptions.put("manual_expiry_period", 7200);
     paymentConfigCaptureOptions.put("refund_speed", "optimum");
     paymentConfig.put("capture_options", paymentConfigCaptureOptions);
     orderRequest.put("payment_config", paymentConfig);
     JSONObject payment = new JSONObject();
     payment.put("amount", 100);
     payment.put("email", "gaurav.kumar@example.com");
     payment.put("contact", "9090909090");
     payment.put("method", "card");
     JSONObject paymentNotes = new JSONObject();
     paymentNotes.put("key1", "value3");
     paymentNotes.put("key2", "value2");
     payment.put("notes", paymentNotes);
     JSONObject paymentCard = new JSONObject();
     paymentCard.put("number", "4386289407660153");
     paymentCard.put("name", "Gaurav");
     paymentCard.put("expiry_month", "11");
     paymentCard.put("expiry_year", "30");
     paymentCard.put("cvv", "100");
     payment.put("card", paymentCard);
     JSONObject paymentAuthentication = new JSONObject();
     paymentAuthentication.put("authentication_channel", "browser");
     payment.put("authentication", paymentAuthentication);
     JSONObject paymentBrowser = new JSONObject();
     paymentBrowser.put("java_enabled", false);
     paymentBrowser.put("javascript_enabled", false);
     paymentBrowser.put("timezone_offset", 11);
     paymentBrowser.put("color_depth", 23);
     paymentBrowser.put("screen_width", 23);
     paymentBrowser.put("screen_height", 100);
     payment.put("browser", paymentBrowser);
     payment.put("ip", "105.106.107.108");
     payment.put("referer", "https://merchansite.com/example/paybill");
     orderRequest.put("payment", payment);
     orderRequest.put("user_agent", "Mozilla/5.0");

     Order order = instance.orders.create(orderRequest);

     ```javascript: Node.js
     var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })
     var data = {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
     },
     "partial_payment": true,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": true,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": false
       }
     ],
     "products": [],
     "payment_config": {
       "capture": "automatic",
       "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9090909090",
       "method": "card",
       "notes": {
       "key1": "value3",
       "key2": "value2"
       },
       "card": {
       "number": "4386289407660153",
       "name": "Gaurav",
       "expiry_month": "11",
       "expiry_year": "30",
       "cvv": "100"
       },
       "authentication": {
       "authentication_channel": "browser"
       },
       "browser": {
       "java_enabled": false,
       "javascript_enabled": false,
       "timezone_offset": 11,
       "color_depth": 23,
       "screen_width": 23,
       "screen_height": 100
       },
       "ip": "105.106.107.108",
       "referer": "https://merchansite.com/example/paybill"
     },
     "user_agent": "Mozilla/5.0"
     }
        
     instance.orders.create(data);

     ```python: Python
     import razorpay
     client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))
     client.order.create({
     "amount": 50000,
     "currency": "INR",
     "receipt": "receipt#1",
     "notes": {
       "key1": "value3",
       "key2": "value2"
     },
     "partial_payment": true,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": True,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": False
       }
     ],
     "products": [],
     "payment_config": {
       "capture": "automatic",
       "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9090909090",
       "method": "card",
       "notes": {
       "key1": "value3",
       "key2": "value2"
       },
       "card": {
       "number": "4386289407660153",
       "name": "Gaurav",
       "expiry_month": "11",
       "expiry_year": "30",
       "cvv": "100"
       },
       "authentication": {
       "authentication_channel": "browser"
       },
       "browser": {
       "java_enabled": false,
       "javascript_enabled": false,
       "timezone_offset": 11,
       "color_depth": 23,
       "screen_width": 23,
       "screen_height": 100
       },
       "ip": "105.106.107.108",
       "referer": "https://merchansite.com/example/paybill"
     },
     "user_agent": "Mozilla/5.0"
     })

     ```ruby: Ruby
     require "razorpay"
     Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')
     para_attr = {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
     },
     "partial_payment": 1,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": 1,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": 0
       }
     ],
     "products": [],
     "payment_config": {
       "capture": "automatic",
       "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9090909090",
       "method": "card",
       "notes": {
       "key1": "value3",
       "key2": "value2"
       },
       "card": {
       "number": "4386289407660153",
       "name": "Gaurav",
       "expiry_month": "11",
       "expiry_year": "30",
       "cvv": "100"
       },
       "authentication": {
       "authentication_channel": "browser"
       },
       "browser": {
       "java_enabled": false,
       "javascript_enabled": false,
       "timezone_offset": 11,
       "color_depth": 23,
       "screen_width": 23,
       "screen_height": 100
       },
       "ip": "105.106.107.108",
       "referer": "https://merchansite.com/example/paybill"
     },
     "user_agent": "Mozilla/5.0"
     }

     Razorpay::Order.create(para_attr)

     ```php: PHP
     $api = new Api($key_id, $secret);
     $api->order->create(array('amount'=>50000,'currency'=>'INR','receipt'=>'receipt#1','notes'=>array('key1'=>'value3','key2'=>'value2',),'partial_payment'=>true,'customer_id'=>'cust_E9penp7VGhT5yt','transfers'=>array(array('account'=>'acc_IRQWUleX4BqvYn','amount'=>1000,'currency'=>'INR','notes'=>array('branch'=>'Acme Corp Bangalore North','name'=>'Gaurav Kumar',),'linked_account_notes'=>array('branch',),'on_hold'=>true,'on_hold_until'=>1671222870,),array('account'=>'acc_IROu8Nod6PXPtZ','amount'=>1000,'currency'=>'INR','notes'=>array('branch'=>'Acme Corp Bangalore South','name'=>'Gaurav Kumar',),'linked_account_notes'=>array('branch',),'on_hold'=>false,),),'products'=>array(),'payment_config'=>array('capture'=>'automatic','capture_options'=>array('automatic_expiry_period'=>12,'manual_expiry_period'=>7200,'refund_speed'=>'optimum',),),'payment'=>array('amount'=>100,'email'=>'gaurav.kumar@example.com','contact'=>'9090909090','method'=>'card','notes'=>array('key1'=>'value3','key2'=>'value2',),'card'=>array('number'=>'4386289407660153','name'=>'Gaurav','expiry_month'=>'11','expiry_year'=>'30','cvv'=>'100',),'authentication'=>array('authentication_channel'=>'browser',),'browser'=>array('java_enabled'=>false,'javascript_enabled'=>false,'timezone_offset'=>11,'color_depth'=>23,'screen_width'=>23,'screen_height'=>100,),'ip'=>'105.106.107.108','referer'=>'https://merchansite.com/example/paybill',),'user_agent'=>'Mozilla/5.0',));
    ```

    ```json: Success
     {
      "id": "order_EKwxwAgItmmXdp",
      "status": "attempted",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "created_at": 1582628071,
      "amount": 50000,
      "amount_paid": 0,
      "amount_due": 50000,
      "currency": "INR",
      "offer_id": null,
      "attempts": 1,
      "transfers": [],
      "payment_workflow": {
        "id": "pay_FVmAstJWfsD3SO",
        "next": [
          {
            "action": "redirect",
            "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/authorize"
          },
          {
            "action": "otp_generate",
            "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
          }
        ]
      }
     }

     ```json: Failure
     {
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The amount must be at least INR 1.00",
        "source": "business",
        "step": "order_create",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "amount"
      }
     }
     ```

     #### Request Parameters

     `amount` _mandatory_
     : `integer` The amount for which the order was created in currency subunits. For example, for an amount of ₹295.00, enter 29500. The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

     `currency` _mandatory_
     : `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

     `receipt` _optional_
     : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

     `partial_payment` _optional_
     : `boolean` Indicates whether the customer can make a partial payment. Possible values:
        - `true`: The customer can make partial payments.
        - `false` (default): The customer cannot make partial payments.

     `first_payment_min_amount` _optional_
     : `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of ₹7,000 is to be received from the customer in two installments of #1 - ₹5,000, #2 - ₹2,000, then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

     `customer_id` _optional_
     : `string` Unique identifier of the customer.

     `transfers` _optional_
     : `json object` Details regarding the transfer.

        `account`
          : `string` The recipient account ID for fund transfer.

        `amount` _optional_
          : `string` The amount of the transfer.

        `currency` _mandatory_
          : `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

        `notes` _optional_
          : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

      `linked_account_notes` _optional_
      : `string` Notes associated with the linked account.  

      `on_hold` _mandatory_
      : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
          - `true`: Puts the settlement on hold.
          - `false`: Releases the settlement.

      `on_hold_until` _mandatory_
      : `string` Timestamp until which the transfer amount is on hold.

    `payment_config` _optional_
    : `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

        `capture` _mandatory_
        : `string` Option to automatically capture payment. Possible values:
          - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
          - `manual`: You have to manually capture payments using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments).

        `capture_options` _optional_
        : `array` Use this array to determine the expiry period for automatic and [manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

            `automatic_expiry_period` _mandatory if capture = automatic_
            : `integer` Time in minutes till when payments in the `authorized` state should be auto-captured.
              Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

            `manual_expiry_period` _optional_ 
            : `integer` Time in minutes till when you can manually capture payments in the `authorized` state.
              - Must be equal to or greater than the `automatic_expiry_period` value.
              - Default value `7200` minutes.
              - Maximum value `7200` minutes.
              - Payments in the `authorized` state after the `manual_expiry_period` are auto-refunded.

            `refund_speed` _mandatory_
            : `string` Refund speed for payments that were not captured (automatically or manually). Possible values:
              - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Learn more about instant refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#how-instant-refunds-work).
              - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#setting-the-default-speed-of-refunds).

    `payment` _mandatory_
        : `object` Details of the payment.

        `amount` _optional_
        : `integer` The amount for which the order was created in currency subunits. For example, for an amount of ₹295.00, enter 29500. The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

        `email` _mandatory_
        : `string` Email address of the customer.

        `contact` _mandatory_
        : `integer` Contact number of the customer.

        `method` _mandatory_
        : `string` Name of the payment method (example, netbanking, cards and upi).

        `card` _mandatory_
        : `object` Details of the payment.

          `number` _mandatory_
          : `integer` Details associated with the card.

          `expiry_month` _mandatory_
          : `string` Expiry month for the card in MM format.

          `name` _mandatory_
          : `string` Name of the cardholder.

          `expiry_year` _mandatory_
          : `string` Expiry year for the card in YY format.

          `cvv` _mandatory_
          : `integer` CVV printed on the back of the card.

        `ip` _mandatory_
        : `string` The customer's IP address.

        `referrer` _optional_
        : `string` Referrer header passed by the client's browser.

        `user-agent` _mandatory_
        : `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.

        `authentication` _mandatory_
        : `object` Details of the authentication method used for the payment.

          `authentication_channel` _mandatory_
          : `string` Specifies the channel through which authentication is performed. In this example, it's set to browser.

        `browser` _mandatory_
        : `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

          `java_enabled` _mandatory_
          : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object.

          `javascript_enabled` _mandatory_
          : `boolean` Indicates whether the customer's browser can execute JavaScript.Obtained from the `navigator` HTML DOM object.

          `timezone_offset` _mandatory_
          : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

          `color_depth` _mandatory_
          : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

          `screen_width` _mandatory_
          : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

          `screen_height` _mandatory_
          : `integer`  Obtained from the `navigator` HTML DOM object.

        

    Descriptions for the response parameters are present in the [Response parameter table](#response-parameters).

    

  
### UPI

    The following API will create a payment with `UPI` as the payment method:

    ```curl: Curl
     curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "partial_payment": true,
      "customer_id": "cust_E9penp7VGhT5yt",
      "transfers": [
        {
          "account": "acc_IRQWUleX4BqvYn",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore North",
            "name": "Gaurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": true,
          "on_hold_until": 1671222870
        },
        {
          "account": "acc_IROu8Nod6PXPtZ",
          "amount": 1000,
          "currency": "INR",
          "notes": {
            "branch": "Acme Corp Bangalore South",
            "name": "Gaurav Kumar"
          },
          "linked_account_notes": [
            "branch"
          ],
          "on_hold": false
        }
      ],
      "products": [],
      "bank_account": {
        "account_number": "765432123456789",
        "name": "Gaurav Kumar",
        "ifsc": "HDFC0000053"
      },
      "payment_config": {
        "capture": "automatic",
        "capture_options": {
          "automatic_expiry_period": 12,
          "manual_expiry_period": 7200,
          "refund_speed": "optimum"
        }
      },
      "payment": {
        "amount": 100,
        "email": "gaurav.kumar@example.com",
        "contact": "9090909090",
        "method": "upi",
        "upi": {
          "flow": "collect",
          "vpa": "gauravkumar@okhdfcbank"
        },
        "ip": "192.168.0.103",
        "referer": "http",
        "user_agent": "Mozilla/5.0",
        "description": "Test payment",
        "notes": {
          "note_key": "value1"
        }
      },
      "user_agent": "Mozilla/5.0"
     }

     ```java: Java
     import org.json.JSONObject;
     import com.razorpay.Payment;
     import com.razorpay.RazorpayClient;
     import com.razorpay.RazorpayException;
     JSONObject orderRequest = new JSONObject();
     orderRequest.put("amount", 50000);
     orderRequest.put("currency", "INR");
     orderRequest.put("receipt", "receipt#1");
     JSONObject notes = new JSONObject();
     notes.put("key1", "value3");
     notes.put("key2", "value2");
     orderRequest.put("notes", notes);
     orderRequest.put("partial_payment", true);
     orderRequest.put("customer_id", "cust_E9penp7VGhT5yt");
     JSONArray transfer = new JSONArray();

     JSONObject transferAccount1 = new JSONObject();
     transferAccount1.put("account", "acc_IRQWUleX4BqvYn");
     transferAccount1.put("amount", 1000);
     transferAccount1.put("currency", "INR");
     JSONObject transferAccountNotes1 = new JSONObject();
     transferAccountNotes1.put("branch", "Acme Corp Bangalore North");
     transferAccountNotes1.put("name", "Gaurav Kumar");
     transferAccount1.put("notes", transferAccountNotes1);

     JSONArray transferAccountLinkedAccountNotes = new JSONArray();
     transferAccountLinkedAccountNotes.put("branch");
     transferAccount1.put("linked_account_notes", transferAccountLinkedAccountNotes);
     transferAccount1.put("on_hold", true);
     transferAccount1.put("on_hold_until", 1671222870);
     transfer.put(transferAccount1);

     JSONObject transferAccount2 = new JSONObject();
     transferAccount2.put("account", "acc_IROu8Nod6PXPtZ");
     transferAccount2.put("amount", 1000);
     transferAccount2.put("currency", "INR");
     JSONObject transferAccountNotes2 = new JSONObject();
     transferAccountNotes2.put("branch", "Acme Corp Bangalore South");
     transferAccountNotes2.put("name", "Saurav Kumar");
     transferAccount2.put("notes", transferAccountNotes2);
     JSONArray transferAccountLinkedAccountNotes2 = new JSONArray();
     transferAccountLinkedAccountNotes2.put("branch");
     transferAccount2.put("linked_account_notes", transferAccountLinkedAccountNotes2);
     transferAccount2.put("on_hold", false);
     transfer.put(transferAccount2);
     orderRequest.put("transfers", transfer);

     JSONArray products = new JSONArray();
     orderRequest.put("products", products);

     JSONObject bankAccount = new JSONObject();
     bankAccount.put("account_number", "765432123456789");
     bankAccount.put("name", "Gaurav Kumar");
     bankAccount.put("ifsc", "HDFC0000053");
     orderRequest.put("bank_account", bankAccount);
     JSONObject paymentConfig = new JSONObject();
     paymentConfig.put("capture", "automatic");
     JSONObject paymentConfigCaptureOptions = new JSONObject();
     paymentConfigCaptureOptions.put("automatic_expiry_period", 12);
     paymentConfigCaptureOptions.put("manual_expiry_period", 7200);
     paymentConfigCaptureOptions.put("refund_speed", "optimum");
     paymentConfig.put("capture_options", paymentConfigCaptureOptions);
     orderRequest.put("payment_config", paymentConfig);
     JSONObject payment = new JSONObject();
     payment.put("amount", 100);
     payment.put("email", "gaurav.kumar@example.com");
     payment.put("contact", "9123456789");
     payment.put("ip", "192.168.0.103");
     payment.put("method", "upi");
     JSONObject upi = new JSONObject();
     upi.put("flow","collect");
     upi.put("vpa","gauravkumar@okhdfcbank");
     payment.put("upi", upi);
     payment.put("referer", "http");
     payment.put("description", "Test payment");
     JSONObject paymentNotes = new JSONObject();
     paymentNotes.put("note_key", "value1");
     payment.put("notes", paymentNotes);
     orderRequest.put("payment", payment);
     orderRequest.put("user_agent", "Mozilla/5.0");

     Order order = instance.orders.create(orderRequest);

     ```javascript: Node.js
     var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })
     var data = {
      "amount": 50000,
      "currency": "INR",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
     },
     "partial_payment": true,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": true,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": false
       }
     ],
     "products": [],
     "bank_account": {
       "account_number": "765432123456789",
       "name": "Gaurav Kumar",
       "ifsc": "HDFC0000053"
     },
     "payment_config": {
       "capture": "automatic",
       "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9090909090",
       "method": "upi",
       "upi": {
       "flow": "collect",
       "vpa": "gauravkumar@okhdfcbank"
       },
       "ip": "192.168.0.103",
       "referer": "http",
       "user_agent": "Mozilla/5.0",
       "description": "Test payment",
       "notes": {
       "note_key": "value1"
       }
     },
     "user_agent": "Mozilla/5.0"
     }
      
     instance.orders.create(data);

     ```python: Python
     import razorpay
     client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))
     client.order.create({
     "amount": 50000,
     "currency": "INR",
     "receipt": "receipt#1",
     "notes": {
       "key1": "value3",
       "key2": "value2"
     },
     "partial_payment": true,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
       {
       "account": "acc_IRQWUleX4BqvYn",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore North",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": True,
       "on_hold_until": 1671222870
       },
       {
       "account": "acc_IROu8Nod6PXPtZ",
       "amount": 1000,
       "currency": "INR",
       "notes": {
         "branch": "Acme Corp Bangalore South",
         "name": "Gaurav Kumar"
       },
       "linked_account_notes": [
         "branch"
       ],
       "on_hold": False
       }
     ],
     "products": [],
     "bank_account": {
       "account_number": "765432123456789",
       "name": "Gaurav Kumar",
       "ifsc": "HDFC0000053"
     },
     "payment_config": {
       "capture": "automatic",
       "capture_options": {
       "automatic_expiry_period": 12,
       "manual_expiry_period": 7200,
       "refund_speed": "optimum"
       }
     },
     "payment": {
       "amount": 100,
       "email": "gaurav.kumar@example.com",
       "contact": "9090909090",
       "method": "upi",
       "upi": {
       "flow": "collect",
       "vpa": "gauravkumar@okhdfcbank"
       },
       "ip": "192.168.0.103",
       "referer": "http",
       "user_agent": "Mozilla/5.0",
       "description": "Test payment",
       "notes": {
       "note_key": "value1"
       }
     },
     "user_agent": "Mozilla/5.0"
     })

     ```ruby: Ruby
     require "razorpay"
     Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

     para_attr = {
     "amount": 50000,
     "currency": "INR",
     "receipt": "receipt#1",
     "notes": {
         "key1": "value3",
         "key2": "value2"
     },
     "partial_payment": 1,
     "customer_id": "cust_E9penp7VGhT5yt",
     "transfers": [
         {
             "account": "acc_IRQWUleX4BqvYn",
             "amount": 1000,
             "currency": "INR",
             "notes": {
                 "branch": "Acme Corp Bangalore North",
                 "name": "Gaurav Kumar"
             },
             "linked_account_notes": ["branch"],
             "on_hold": 1,
             "on_hold_until": 1671222870
         },
         {
             "account": "acc_IROu8Nod6PXPtZ",
             "amount": 1000,
             "currency": "INR",
             "notes": {
                 "branch": "Acme Corp Bangalore South",
                 "name": "Gaurav Kumar"
             },
             "linked_account_notes": ["branch"],
             "on_hold": 0
         }
       ],
       "products": [],
       "bank_account": {
           "account_number": "765432123456789",
           "name": "Gaurav Kumar",
           "ifsc": "HDFC0000053"
       },
       "payment_config": {
           "capture": "automatic",
           "capture_options": {
               "automatic_expiry_period": 12,
               "manual_expiry_period": 7200,
               "refund_speed": "optimum"
           }
       },
       "payment": {
           "amount": 100,
           "email": "gaurav.kumar@example.com",
           "contact": "9090909090",
           "method": "upi",
           "upi": {
               "flow": "collect",
               "vpa": "gauravkumar@okhdfcbank"
           },
           "ip": "192.168.0.103",
           "referer": "http",
           "user_agent": "Mozilla/5.0",
           "description": "Test payment",
           "notes": {
               "note_key": "value1"
           }
       },
       "user_agent": "Mozilla/5.0"
       }

       Razorpay::Order.create(para_attr)

     ```php: PHP
     $api = new Api($key_id, $secret);
     $api->order->create(array('amount'=>50000,'currency'=>'INR','receipt'=>'receipt#1','notes'=>array('key1'=>'value3','key2'=>'value2',),'partial_payment'=>true,'customer_id'=>'cust_E9penp7VGhT5yt','transfers'=>array(array('account'=>'acc_IRQWUleX4BqvYn','amount'=>1000,'currency'=>'INR','notes'=>array('branch'=>'Acme Corp Bangalore North','name'=>'Gaurav Kumar',),'linked_account_notes'=>array('branch',),'on_hold'=>true,'on_hold_until'=>1671222870,),1=>array('account'=>'acc_IROu8Nod6PXPtZ','amount'=>1000,'currency'=>'INR','notes'=>array('branch'=>'Acme Corp Bangalore South','name'=>'Gaurav Kumar',),'linked_account_notes'=>array('branch',),'on_hold'=>false,),),'products'=>array(),'bank_account'=>array('account_number'=>'765432123456789','name'=>'Gaurav Kumar','ifsc'=>'HDFC0000053',),'payment_config'=>array('capture'=>'automatic','capture_options'=>array('automatic_expiry_period'=>12,'manual_expiry_period'=>7200,'refund_speed'=>'optimum',),),'payment'=>array('amount'=>100,'email'=>'gaurav.kumar@example.com','contact'=>'9090909090','method'=>'upi','upi'=>array('flow'=>'collect','vpa'=>'gauravkumar@okhdfcbank',),'ip'=>'192.168.0.103','referer'=>'http','user_agent'=>'Mozilla/5.0','description'=>'Test payment','notes'=>array('note_key'=>'value1',),),'user_agent'=>'Mozilla/5.0',));
    ```

    ```json: Success
     {
      "id": "order_EKwxwAgItmmXdp",
      "status": "attempted",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "created_at": 1582628071,
      "amount": 50000,
      "amount_paid": 0,
      "amount_due": 50000,
      "currency": "INR",
      "offer_id": null,
      "attempts": 1,
      "transfers": [],
      "payment_workflow": {
        "id": "pay_FVmAstJWfsD3SO",
        "next": [
          {
            "action": "poll",
            "url": "https://api.razorpay.com/v1/payments/pay_ERGVHAXaLNV1y5"
          }
        ]
      }
     }

     ```json: Failure
     {
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The amount must be at least INR 1.00",
        "source": "business",
        "step": "order_create",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "amount"
      }
     }

     ```

     #### Request Parameters

     `amount` _mandatory_
     : `integer` The amount for which the order was created in currency subunits. For example, for an amount of ₹295.00, enter 29500. The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

    `currency` _mandatory_
     : `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

     `receipt` _optional_
     : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

     `partial_payment` _optional_
     : `boolean` Indicates whether the customer can make a partial payment. Possible values:
        - `true`: The customer can make partial payments.
        - `false` (default): The customer cannot make partial payments.

     `first_payment_min_amount` _optional_
     : `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of ₹7,000 is to be received from the customer in two installments of #1 - ₹5,000, #2 - ₹2,000, then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

     `customer_id` _optional_
     : `string` Unique identifier of the customer.

     `transfers` _optional_
     : `json object` Details regarding the transfer.

        `account`
          : `string` The recipient account ID for fund transfer.

        `amount` _optional_
          : `string` The amount of the transfer.

        `currency` _mandatory_
          : `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

        `notes` _optional_
          : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

      `linked_account_notes` _optional_
     : `string` Notes associated with the linked account.  

      `on_hold` _mandatory_
     : `boolean` Indicates whether the account settlement for transfer is on hold. Possible values:
          - `true`: Puts the settlement on hold.
          - `false`: Releases the settlement.

      `on_hold_until` _mandatory_
     : `string` Timestamp until which the transfer amount is on hold.

     `bank_account` _optional_
     : `json object` Details of the bank account that the customer provides at the time of registration.

        `account_number` _optional_
        : `string` Account number of the customers bank account.

        `name` _optional_
        : `string` The name associated with the bank account.

        `ifsc` _optional_
        : `string` The IFSC code of the bank.

     `payment_config` _optional_
     : `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

        `capture` _mandatory_
        : `string` Option to automatically capture payment. Possible values:
          - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
          - `manual`: You have to manually capture payments using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments).

        `capture_options` _optional_
        : `array` Use this array to determine the expiry period for automatic and [manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

            `automatic_expiry_period` _mandatory if capture = automatic_
            : `integer` Time in minutes till when payments in the `authorized` state should be auto-captured.
              Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

            `manual_expiry_period` _optional_ 
            : `integer` Time in minutes till when you can manually capture payments in the `authorized` state.
              - Must be equal to or greater than the `automatic_expiry_period` value.
              - Default value `7200` minutes.
              - Maximum value `7200` minutes.
              - Payments in the `authorized` state after the `manual_expiry_period` are auto-refunded.

            `refund_speed` _mandatory_
            : `string` Refund speed for payments that were not captured (automatically or manually). Possible values:
              - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Learn more about instant refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#how-instant-refunds-work).
              - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#setting-the-default-speed-of-refunds).

    `payment` _mandatory_
        : `object` Details of the payment.

        `amount` _optional_
        : `integer` The amount for which the order was created in currency subunits. For example, for an amount of . The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

        `email` _mandatory_
        : `string` Email address of the customer. The maximum length supported is 40 characters.

        `contact` _mandatory_
        : `integer` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

        `ip` _mandatory_
        : `string` The customer's IP address.

        `method` _mandatory_
        : `string` Name of the payment method (example, netbanking, cards and upi).

        `bank` _mandatory_
        : `string` Name of the bank.

        `description` _mandatory_
        : `string` Description of the payment.

        `referrer` _optional_
        : `string` Referrer header passed by the client's browser.

        `upi` _mandatory_
        : `json object` Details of the UPI payment received. Only applicable if method is upi.

          `flow`
          : `string` The type of UPI flow. Possible value in_app.

          `vpa`
          : `string` The customer's VPA (Virtual Payment Address) or UPI id used to make the payment. For example, gauravkumar@exampleupi.

        `user_agent` _optional_
        : `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.   
 
      Descriptions for the response parameters are present in the [Response parameter table](#response-parameters).
    

  
### Response Parameters

     
     #### Response Parameters

     If the payment request is valid, the response contains the following fields.

     `receipt`
     : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

     `status`
     : `string` Status of the order. Possible values:
        - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
        - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
        - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

     `id`
     : `string` The unique identifier of the order.
     
     `amount`
     : `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295.00, enter `29500`.

     `created_at`
     : `integer` Indicates the Unix timestamp when this order was created.

     `amount_paid`
     : `integer` Indicates the amount paid for the order.

     `amount_due`
     : `integer` Indicates the amount due for the order.

     `currency`
     : `string` The currency in which the transaction was made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

     `offer_id`
     : `string` The unique identifier of the created offer.

     `attempts`
     : `string` The number of payment attempts, successful and failed, that have been made against this order.

     `transfers`
     : `string` Details regarding the transfer.

     `notes`
     : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each.

     `payment_workflow`
     : `array` Details regarding the payment.

        `id`
        : `string` Unique identifier of the payment.

        `next`
        : `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

          `action`
          : `string` An indication of the next step available to you to continue the payment process. Possible values:
          - `otp_generate`: Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
          - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.
    
          `url`
          : `string` URL endpoint where Razorpay will submit the final payment status.
    

> **WARN**
>
> 
> **Watch Out!**
> 
> After completing the initial step for your preferred payment method mentioned above, follow these common steps given below, applicable for all payment methods.
> 

> **WARN**
>
> 
> **Watch Out!**
> 
> The steps given below are common for all payment methods.
> 

 Length must be of 3 characters.

     `receipt` _optional_
     : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

     `partial_payment` _optional_
     : `boolean` Indicates whether the customer can make a partial payment. Possible values:
        - `true`: The customer can make partial payments.
        - `false` (default): The customer cannot make partial payments.

     `first_payment_min_amount` _optional_
     : `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of , is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

     `customer_id` _optional_
     : `string` Unique identifier of the customer.

     `payment_config` _optional_
     : `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

        `capture` _mandatory_
        : `string` Option to automatically capture payment. Possible values:
          - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
          - `manual`: You have to manually capture payments using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments).

        `capture_options` _optional_
        : `array` Use this array to determine the expiry period for automatic and [manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

           `automatic_expiry_period` _mandatory if capture = automatic_
           : `integer` Time in minutes till when payments in the `authorized` state should be auto-captured.
             Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

           `manual_expiry_period` _optional_ 
           : `integer` Time in minutes till when you can manually capture payments in the `authorized` state.
             - Must be equal to or greater than the `automatic_expiry_period` value.
             - Default value `7200` minutes.
             - Maximum value `7200` minutes.
             - Payments in the `authorized` state after the `manual_expiry_period` are auto-refunded.

           `refund_speed` _mandatory_
           : `string` Refund speed for payments that were not captured (automatically or manually). Possible values:
             - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Learn more about instant refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#how-instant-refunds-work).
             - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#setting-the-default-speed-of-refunds).

     `payment` _mandatory_
     : `object` Details of the payment.

       `amount` _optional_
       : `integer` The amount for which the order was created in currency subunits. For example, for an amount of . The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

       `email` _mandatory_
       : `string` Email address of the customer. The maximum length supported is 40 characters.

       `contact` _mandatory_
       : `integer` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

       `ip` _mandatory_
       : `string` The customer's IP address.

       `method` _mandatory_
       : `string` Name of the payment method. For example, `card`.

         `card` _mandatory_
         : `object` Details associated with the card.

             `number`
             : `string` Unformatted card number.

             `name`
             : `string` Name of the cardholder.

             `expiry_month`
             : `string` Expiry month for the card in MM format.

             `expiry_year`
             : `string` Expiry year for the card in YY format.

             `cvv`
             : `string` CVV printed on the back of the card.

       `referrer` _optional_
       : `string` Referrer header passed by the client's browser.

       `user_agent` _optional_
       : `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.   
  
       Descriptions for the response parameters are present in the [Response parameter table](#response-parameters).
    
  
  
### ACH Direct Debit

     The following API will create a payment with `ach` as the payment method:
    
     ```curl: Request
     curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
     -X POST https://api.razorpay.com/v1/payments/create/json \
     -H "content-type: application/json" \
     -d '{
       "amount": 50000,
       "currency": "",
       "receipt": "receipt#1",
       "notes": {
         "key1": "value3",
         "key2": "value2"
       },
       "partial_payment": true,
       "customer_id": "cust_E9penp7VGhT5yt",
       "products": [],
       "payment_config": {
         "capture": "automatic",
         "capture_options": {
           "automatic_expiry_period": 12,
           "manual_expiry_period": 7200,
           "refund_speed": "optimum"
         }
       },
       "payment": {
         "amount": 50000,
         "email": "gaurav.kumar@example.com",
         "contact": "+919876543210",
         "method": "ach",
         "notes": {
           "key1": "value3",
           "key2": "value2"
         },
         "bank_account": {
           "account_number": "000000001234",
           "name": "Gaurav Kumar",
           "bank_code": "122105278",
           "bank_code_category": "routing_number",
           "account_type": "personal_savings"
         },
         "billing_address": {
           "line1": "Block",
           "line2": "Street",
           "city": "San Jose",
           "state": "California",
           "postal_code": "33154"
         }
       }
     }'
     ```
     ```json: Response
     {
        "razorpay_payment_id": "pay_29QQoUBi66xm2f",
        "razorpay_order_id": "order_GAWN9beXgaqRyO",
        "razorpay_signature": "9ef4dffbfd84f1318f6ae648f114332d8401e0949a3d"
     }
     ```json: Failure - Account number
     {
       "error": {
         "code": "BAD_REQUEST_ERROR",
         "description": "You entered an account number which is invalid or not found please try again",
         "source": "customer",
         "step": "validation",
         "reason": "invalid_account_number"
       }
     }
     ```json: Failure - Bank Code
     {
       "error": {
         "code": "BAD_REQUEST_ERROR",
         "description": "You entered a bank code which is invalid or not found please try again",
         "source": "customer",
         "step": "validation",
         "reason": "invalid_bank_code"
       }
     }
     ```json: Failure - Account Type
     {
       "error": {
         "code": "BAD_REQUEST_ERROR",
         "description": "You entered an account type which is invalid please try again",
         "source": "customer",
         "step": "validation",
         "reason": "invalid_account_type"
       }
     }
     ```
     
     #### Request Parameters

     `amount` _mandatory_
     : `integer` The amount for which the order was created in currency subunits. For example, for an amount of , enter `29900`. The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

     `currency` _mandatory_
     : `string` The currency in which the transaction should be made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

     `receipt` _optional_
     : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

     `partial_payment` _optional_
     : `boolean` Indicates whether the customer can make a partial payment. Possible values:
        - `true`: The customer can make partial payments.
        - `false` (default): The customer cannot make partial payments.

     `first_payment_min_amount` _optional_
     : `integer` Minimum amount that must be paid by the customer as the first partial payment. For example, if an amount of , is to be received from the customer in two installments of #1 - , #2 - , then you can set this value as `500000`. This parameter should be passed only if `partial_payment` is `true`.

     `customer_id` _optional_
     : `string` Unique identifier of the customer.

     `payment_config` _optional_
     : `array` Payment capture settings for the payment. The options sent here override the [account level auto-capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) configured using the Dashboard.

        `capture` _mandatory_
        : `string` Option to automatically capture payment. Possible values:
          - `automatic`: Payments are auto-captured according to the configurations specified in the `capture_options` array.
          - `manual`: You have to manually capture payments using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments).

        `capture_options` _optional_
        : `array` Use this array to determine the expiry period for automatic and [manual capture](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) of payments and the refund speed in the case of non-capture.

           `automatic_expiry_period` _mandatory if capture = automatic_
           : `integer` Time in minutes till when payments in the `authorized` state should be auto-captured.
             Minimum value `12` minutes. This parameter is mandatory only if the value of `capture` parameter is `automatic`.

           `manual_expiry_period` _optional_ 
           : `integer` Time in minutes till when you can manually capture payments in the `authorized` state.
             - Must be equal to or greater than the `automatic_expiry_period` value.
             - Default value `7200` minutes.
             - Maximum value `7200` minutes.
             - Payments in the `authorized` state after the `manual_expiry_period` are auto-refunded.

           `refund_speed` _mandatory_
           : `string` Refund speed for payments that were not captured (automatically or manually). Possible values:
             - `optimum`: We try to process the refund instantly. We charge a small fee for this. If it is not possible to process an instant refund, we will process a normal refund in 5-7 working days. [Learn more about instant refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#how-instant-refunds-work).
             - `normal`: The refund is processed in 5-7 working days.

If no value is passed, the refund is processed using the [default speed set on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md#setting-the-default-speed-of-refunds).

     `payment` _mandatory_
     : `object` Details of the payment.

       `amount` _optional_
       : `integer` The amount for which the order was created in currency subunits. For example, for an amount of , enter `29900`. The same amount will be used for the payment creation. For the partial payment scenario, we will use the amount specified in the payment request object in case.

       `email` _mandatory_
       : `string` Email address of the customer. The maximum length supported is 40 characters.

       `contact` _mandatory_
       : `integer` Phone number of the customer. The maximum length supported is 15 characters, inclusive of country code.

       `ip` _mandatory_
       : `string` The customer's IP address.

       `method` _mandatory_
       : `string` Name of the payment method. For example, `ach`.

             `bank_account` _mandatory_
             : `object` Bank account details.

                 `account_number` _mandatory_
                 : `string` Customer's bank account number.
                 
                 `name` _mandatory_
                 : `string` Account holder's name as per bank records.
                 
                 `bank_code` _mandatory_
                 : `string` The ACH routing number of the bank account.
                 
                 `bank_code_category` _mandatory_
                 : `string` The category of bank code. Must be `routing_number` for ACH payments.
                 
                 `account_type` _mandatory_
                 : `string` Type of bank account. Possible values:
                   - `personal_savings`: Individual savings account.
                   - `personal_checking`: Individual current account.
                   - `business_savings`: Business savings account.
                   - `business_checking`: Business current account.

             `billing_address` _optional_
             : `json object` This will have details about the billing address of the customer/user.

               `line1` _optional_
               : `string` Address Line 1 of the address.

               `line2` _optional_
               : `string` Address Line 2 of the address.

               `city` _optional_
               : `string` City of the address. For example, `San Jose`.

               `state` _optional_
               : `string` Name of the state. For example, `California`.

               `postal_code` _optional_
               : `string` Postal code of the state. For example, `33514`.

       `referrer` _optional_
       : `string` Referrer header passed by the client's browser.

       `user_agent` _optional_
       : `string` The User-Agent header of the user's browser. The default value will be passed by Razorpay if not provided by you.   
  
       Descriptions for the response parameters are present in the [Response parameter table](#response-parameters).
    

  
### Response Parameters

     
     #### Response Parameters

     If the payment request is valid, the response contains the following fields.

     `receipt`
     : `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

     `status`
     : `string` Status of the order. Possible values:
        - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
        - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
        - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

     `id`
     : `string` The unique identifier of the order.
     
     `amount`
     : `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29900`.

     `created_at`
     : `integer` Indicates the Unix timestamp when this order was created.

     `amount_paid`
     : `integer` Indicates the amount paid for the order.

     `amount_due`
     : `integer` Indicates the amount due for the order.

     `currency`
     : `string` The currency in which the transaction was made.  See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Length must be of 3 characters.

     `offer_id`
     : `string` The unique identifier of the created offer.

     `attempts`
     : `string` The number of payment attempts, successful and failed, that have been made against this order.

     `transfers`
     : `string` Details regarding the transfer.

     `notes`
     : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each.

     `payment_workflow`
     : `array` Details regarding the payment.

        `id`
        : `string` Unique identifier of the payment.

        `next`
        : `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

          `action`
          : `string` An indication of the next step available to you to continue the payment process. Possible values:
          - `otp_generate`: Use this URL to allow the customer to generate OTP and complete the payment on your webpage.
          - `redirect`: Use this URL to redirect the customer to submit the OTP on the bank page.
    
          `url`
          : `string` URL endpoint where Razorpay will submit the final payment status.
    

  
### 1.1 Handle Payment Success and Error Events

     Once a customer completes the payment, a `POST` request is made to the `callback_url` provided in the payment request. The data contained in this request will depend on whether the payment was a **success** or a **failure**.

     #### Success Callback

     If the payment made by the customer is successful, the following fields are sent:

     - `razorpay_payment_id`
     - `razorpay_order_id`
     - `razorpay_signature`

     ```json: Callback Example
     {
       "razorpay_payment_id": "pay_29QQoUBi66xm2f",
       "razorpay_order_id": "order_9A33XWu170gUtm",
       "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
     }
     ```

     #### Failure Callback
     If the payment has failed, the callback will contain details of the error. Refer to [Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) for details.

     Given below is a sample error code you will receive when the order fails.

     ```json: Order Create Failure Example

     {
        "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The amount must be at least INR 1.00",
        "source": "business",
        "step": "order_create",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "amount"
         }
     }
     ```

    Given below is a sample error code you will receive when the payment fails.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     You can use the order id present in the metadata for additional payment attempts on the order without creating a new one.
>     

    

     ```json: Payment Create Failure Example

     {
        "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "Authentication failed due to incorrect OTP",
        "field": null,
        "source": "customer",
        "step": "payment_authentication",
        "reason": "invalid_otp",
        "metadata": {
            "order_id": "order_EKwxwAgItmmXdp"
         }
       }
     }
     ```
    The following error occurs when the order was processed, payment was created in Razorpay but failed at gateway level.
    

     ```json: Gateway Processing Error Example
    
     {
        "error": {
        "code": "GATEWAY_ERROR",
        "description": "Authentication failed due to incorrect OTP",
        "field": null,
        "source": "customer",
        "step": "payment_authentication",
        "reason": "gateway failure",
        "metadata": {
        "order_id": "order_EKwxwAgItmmXdp",
        "payment_id": "pay_TKwxwAgItmmXdp"
         }
       }
     }
     ```

     

  
### 1.2 Retry/Re-Attempt Request

     Use the following sample code example to make a retry request using `Order id` and `Receipt` in the request.

     ```json: Order ID in request
     curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d{
      "id": "order_EKwxwAgItmmXdp",
      "payment": {
        "amount": 100,
        "currency": "",
        "method": "card",
        "card": {
          "number": "4628 9499 7226 2986",
          "name": "Gaurav Kumar",
          "expiry_month": "11",
          "expiry_year": "30",
          "cvv": "100"
        },
        "notes": {
          "key1": "value3",
          "key2": "value2"
        }
      }
     }
    
    
    ```json: Receipt in request
     curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d{
      "amount": 50000,
      "currency": "",
      "receipt": "receipt#1",
      "payment": {
        "method": "card",
        "card": {
          "number": "4628 9499 7226 2986",
          "name": "Gaurav Kumar",
          "expiry_month": "11",
          "expiry_year": "30",
          "cvv": "100"
        },
        "authentication": {
          "authentication_channel": "browser"
        },
        "browser": {
          "java_enabled": false,
          "javascript_enabled": false,
          "timezone_offset": 11,
          "color_depth": 23,
          "screen_width": 23,
          "screen_height": 100
        },
        "ip": "105.106.107.108",
        "referer": "https://merchansite.com/example/paybill",
        "notes": {
          "key1": "value3",
          "key2": "value2"
        }
      }
    }
    ```

    ```json: Success
     {
      "id": "order_EKwxwAgItmmXdp",
      "status": "attempted",
      "receipt": "receipt#1",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "created_at": 1582628071,
      "amount": 50000,
      "amount_paid": 0,
      "amount_due": 50000,
      "currency": "",
      "offer_id": null,
      "attempts": 1,
      "transfers": [],
      "payment_workflow": {
        "id": "pay_FVmAstJWfsD3SO",
        "next": [
          {
            "action": "redirect",
            "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/authorize"
          },
          {
            "action": "otp_generate",
            "url": "https://api.razorpay.com/v1/payments/pay_FVmAstJWfsD3SO/otp_generate?track_id=FVmAtLUe9XZSGM&key_id="
          }
        ]
      }
     }

     ```json: Failure
     {
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The amount must be at least INR 1.00",
        "source": "business",
        "step": "order_create",
        "reason": "input_validation_failed",
        "metadata": {},
        "field": "amount"
      }
     }
     ```
    

  
### 1.3 Verify Payment Signature

     Signature verification is a mandatory step to ensure that the callback is sent by Razorpay. The `razorpay_signature` contained in the callback can be regenerated by your system and verified as follows.

     Create a string to be hashed using the `razorpay_payment_id` contained in the callback and the Order ID generated in the first step, separated by a `|`. Hash this string using SHA256 and your API Secret.

     ```
     generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

     if (generated_signature == razorpay_signature) {
         payment is successful
     }
     ```

     #### Generate Signature on your Server

     ```java: Java
/**
* This class defines common routines for generating
* authentication signatures for Razorpay Webhook requests.
*/
public class Signature
{
    private static final String HMAC_SHA256_ALGORITHM = "HmacSHA256";
    /**
    * Computes RFC 2104-compliant HMAC signature.
    * * @param data
    * The data to be signed.
    * @param key
    * The signing key.
    * @return
    * The Base64-encoded RFC 2104-compliant HMAC signature.
    * @throws
    * java.security.SignatureException when signature generation fails
    */
    public static String calculateRFC2104HMAC(String data, String secret)
    throws java.security.SignatureException
    {
        String result;
        try {

            // get an hmac_sha256 key from the raw secret bytes
            SecretKeySpec signingKey = new SecretKeySpec(secret.getBytes(), HMAC_SHA256_ALGORITHM);

            // get an hmac_sha256 Mac instance and initialize with the signing key
            Mac mac = Mac.getInstance(HMAC_SHA256_ALGORITHM);
            mac.init(signingKey);

            // compute the hmac on input data bytes
            byte[] rawHmac = mac.doFinal(data.getBytes());

            // base64-encode the hmac
            result = DatatypeConverter.printHexBinary(rawHmac).toLowerCase();

        } catch (Exception e) {
            throw new SignatureException("Failed to generate HMAC : " + e.getMessage());
        }
        return result;
    }
}

```php: PHP
use Razorpay\Api\Api;
$api = new Api($key_id, $key_secret);
$attributes  = array('razorpay_signature'  => '23233',  'razorpay_payment_id'  => '332' ,  'razorpay_order_id' => '12122');
$order  = $api->utility->verifyPaymentSignature($attributes)

```ruby: Ruby
require 'razorpay'
Razorpay.setup('key_id', 'key_secret')
payment_response = {
  'razorpay_order_id': '12122',
  'razorpay_payment_id': '332',
  'razorpay_signature': '23233'
}

Razorpay::Utility.verify_payment_signature(payment_response)

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.utility.verify_payment_signature({
   'razorpay_order_id': razorpay_order_id,
   'razorpay_payment_id': razorpay_payment_id,
   'razorpay_signature': razorpay_signature
   })

```c: .NET
 Dictionary attributes = new Dictionary();

            attributes.Add("razorpay_payment_id", paymentId);
            attributes.Add("razorpay_order_id", Request.Form["razorpay_order_id"]);
            attributes.Add("razorpay_signature", Request.Form["razorpay_signature"]);

            Utils.verifyPaymentSignature(attributes);
```nodejs: Node.js
var { validatePaymentVerification } = require('./dist/utils/razorpay-utils');

validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);
```Go: Go
import (
	"crypto/hmac"
	"crypto/sha256"
	"crypto/subtle"
	"encoding/hex"
	"fmt"
)

func main()  {
	signature := "477d1cdb3f8122a7b0963704b9bcbf294f65a03841a5f1d7a4f3ed8cd1810f9b"
	secret := "qp3zKxwLZxbMORJgEVWi3Gou"
	data := "order_J2AeF1ZpvfqRGH|pay_J2AfAxNHgqqBiI"
	//fmt.Printf("Secret: %s Data: %s\n", secret, data)
	
	// Create a new HMAC by defining the hash type and the key (as byte array)
	h := hmac.New(sha256.New, []byte(secret))
	
	// Write Data to it
	_, err := h.Write([]byte(data))
	
	if err != nil {
		panic(err)
	}
	
	// Get result and encode as hexadecimal string
	sha := hex.EncodeToString(h.Sum(nil))
	
	fmt.Printf("Result: %s\n", sha)
	
	if subtle.ConstantTimeCompare([]byte(sha), []byte(signature)) == 1 {
		fmt.Println("Works")
	}
}
```
    

  
### 1.4 Integrate Payments Rainy Day Kit

     

Use Payments Rainy Day kit to overcome payments exceptions such as:
- [Late Authorisation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md)
- [Payment Downtime](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime.md)
- [Payment Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md)

    

  
### 1.5 Verify Payment Status

     
> **INFO**
>
> 
> **Handy Tips**
> 
> On the Razorpay Dashboard, ensure that the payment status is `captured`. Refer to the payment capture settings page to know how to [capture payments automatically](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
> 

    
        You can track the payment status in three ways:
        

    
        To verify the payment status from the Razorpay Dashboard:

        1. Log in to the Razorpay Dashboard and navigate to **Transactions** → **Payments**.
        2. Check if a **Payment Id** has been generated and note the status. In case of a successful payment, the status is marked as **Captured**.
        
    
    
        You can use Razorpay webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL. Know how to [set up webhooks.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)

        #### Example
        If you have subscribed to the `order.paid` webhook event, you will receive a notification every time a customer pays you for an order.
    
    
        [Poll Payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-all-payments.md) to check the payment status.
    

        

    
  

## Next Steps

[Step 2: Test Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/test-integration.md)
