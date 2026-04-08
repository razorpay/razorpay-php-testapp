---
title: 3. Create Subsequent Payments
description: Create and charge subsequent payments using Razorpay APIs after the customer's selected payment method is authorised.
---

# 3. Create Subsequent Payments

You should perform the following steps to create and charge your customer subsequent payments:

1. [Create an order to charge the customer](#31-create-an-order-to-charge-the-customer)
1. [Create a recurring payment](#32-create-a-recurring-payment)

## 3.1. Create an Order to Charge the Customer

You have to create a new order every time you want to charge your customers. This order is different from the one created during the authorisation transaction.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use the notification object in the request if you want to control pre-debit notifications and recurring debits.
> 

The following endpoint creates an order.

/orders

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount":1000,
  "currency":"",
  "payment_capture":true,
  "receipt":"Receipt No. 1",
  "notification":{ 
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 1000);
orderRequest.put("currency", "");
orderRequest.put("payment_capture", true);
orderRequest.put("receipt", "Receipt No. 1");
JSONObject notification = new JSONObject();
notification.put("token_id","token_M7K2eFBU7vToaQ");
notification.put("payment_after","1634057114");
orderRequest.put("notification", notification);
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey… decaf.");
orderRequest.put("notes", notes);

Order order = razorpay.orders.create(orderRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => '123', 'amount' => 100, 'payment_capture' => true, 'currency' => '', 'notification'=> array('token_id'=> 'token_M7K2eFBU7vToaQ','payment_after'=> '1634057114'), 'notes'=> array('key1'=> 'value3','key2'=> 'value2')));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification": {
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
    'amount': 1000,
    'currency': '',
    'payment_capture': True,
    'receipt': 'Receipt No. 1',
    'notification': {'token_id': 'token_M7K2eFBU7vToaQ',
    'payment_after': 1634057114},
    'notes': {'notes_key_1': 'Tea, Earl Grey, Hot',
              'notes_key_2': 'Tea, Earl Grey... decaf.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 1000,
  "currency": "",
  "payment_capture": true,
  "receipt": "Receipt No. 1",
  "notification": {
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
}

Razorpay::Order.create(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "amount":1000,
  "currency":"",
  "payment_capture": true,
  "receipt":"Receipt No. 1",
  "notification": map[string]interface{}{
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114
  },
  "notes": map[string]interface{}{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf.",
  },
}
body, err := client.Order.Create(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 100);
orderRequest.Add("currency", "");
orderRequest.Add("receipt", "receipt#12b");
orderRequest.Add("payment_capture", true);
Dictionary notification = new Dictionary();
notification.Add("token_id", "token_M7K2eFBU7vToaQ");
notification.Add("payment_after", "1634057114");
orderRequest.Add("notification", notification);
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
orderRequest.Add("notes", notes);

Order order = client.Order.Create(orderRequest);

```

```json: Success Response
{
  "id":"order_1Aa00000000002",
  "entity":"order",
  "amount":1000,
  "amount_paid":0,
  "amount_due":1000,
  "currency":"",
  "receipt":"Receipt No. 1",
  "notification":{
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114,
    "id":"notification_00000000000001"
  },
  "offer_id":null,
  "status":"created",
  "attempts":0,
  "notes":{
    "notes_key_1":"Tea, Earl Grey, Hot",
    "notes_key_2":"Tea, Earl Grey… decaf."
  },
  "created_at":1579782776
}

```json: Failure Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"The id provided does not exist",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

### Request Parameters

`amount` _mandatory_
: `integer` Amount in currency subunits. For cards, the minimum value is `100` ().

`currency` _mandatory_
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`receipt` _optional_
: `string` A user-entered unique identifier for the order. For example, `Receipt No. 1`. You should map this parameter to the `order_id` sent by Razorpay.

`notification`
: `object` Details of the pre-debit notification. This object is optional. You should use it only if you want to control pre-debit notifications and debits. If you do not pass this object, we will automatically try to debit 25 hours after the pre-debit notification is delivered.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     We will not attempt any retry if the debit fails for tokens with the notification object in the created order. You should manually retry the debit attempt.
>     

    `token_id` _mandatory_
    : `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

    `payment_after` _optional_
    : `integer` UNIX timestamp post which the debit is supposed to happen. Defaults to 25 hours after the pre-debit notification is delivered.

`notes` _optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

`payment_capture` _mandatory_
: `boolean` Determines whether the payment status should be changed to `captured` automatically or not. Possible values:
    - `true`: Payments are captured automatically.
    - `false`: Payments are not captured automatically. You can manually capture payments using the [Manually Capture Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment).

### Response Parameters

`id`
: `string` A unique identifier of the order created. For example `order_1Aa00000000001`.

`entity`
: `string` The entity that has been created. Here it is `order`.

`amount`
: `integer` Amount in currency subunits.

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to pay.

`currency`
: `string` The 3-letter ISO currency code for the payment. Currently, we only support `INR`.

`receipt`
: `string` A user-entered unique identifier of the order. For example, `rcptid #1`.

`status`
: `string` The status of the order.

`notes`
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` The Unix timestamp at which the order was created.

### Error Response Parameters

Given below is a list of possible errors you may face while creating an Order.

Error | Cause | Solution
---
The api key provided is invalid | This error occurs when you enter the wrong API key or secret. | Make sure to enter the valid API key and secret.
---
The amount must be at least INR 1.00. | This error occurs when you enter an amount less than INR 1. | Make sure the entered amount is atleast INR 1.
---
The currency should be INR when method is upi | This error occurs when you enter a currency other than INR. | Make sure the currency is INR.
---

## 3.2. Create a Recurring Payment

Once you have generated an `order_id`, use it with the `token_id` to create a payment and charge the customer. The following endpoint creates a payment to charge the customer.

/payments/create/recurring

```cURL: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/recurring \
-H "Content-Type: application/json" \
-d '{
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject paymentRequest = new JSONObject();
paymentRequest.put("email", "gaurav.kumar@example.com");
paymentRequest.put("contact", "+919876543210");
paymentRequest.put("amount", 1000);
paymentRequest.put("currency", "");
paymentRequest.put("order_id", "order_1Aa00000000002");
paymentRequest.put("customer_id", "cust_1Aa00000000001");
paymentRequest.put("token", "token_1Aa00000000001");
paymentRequest.put("recurring", true);
paymentRequest.put("description", "Creating recurring payment for Gaurav Kumar");
JSONObject notes = new JSONObject();
paymentRequest.put("notes_key_1","Tea, Earl Grey, Hot");
paymentRequest.put("notes_key_2","Tea, Earl Grey… decaf.");

Payment payment = razorpay.payments.createRecurringPayment(paymentRequest);

```php: PHP
$api = new Api($key_id, $secret);

$api->payment->createRecurring(array('email'=>'gaurav.kumar@example.com','contact'=>'+919876543210','amount'=>100,'currency'=>'','order_id'=>'order_1Aa00000000002','customer_id'=>'cust_1Aa00000000001','token'=>'token_1Aa00000000001','recurring'=>true,'description'=>'Creating recurring payment for Gaurav Kumar'));

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.payments.createRecurringPayment({
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
})

```python: Python
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment.createRecurring({
    'email': 'gaurav.kumar@example.com',
    'contact': +919876543210,
    'amount': 1000,
    'currency': '',
    'order_id': "order_1Aa00000000002",
    'customer_id': "cust_1Aa00000000001",
    'token': 'token_1Aa00000000001',
    'recurring': True,
    'description': 'Creating recurring payment for Gaurav Kumar',
    'notes': {'note_key 1': 'Beam me up Scotty',
              'note_key 2': 'Tea. Earl Gray. Hot.'}
    })

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": {
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot."
  }
}
Razorpay::Payment.create_recurring_payment(para_attr)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data:= map[string]interface{}{
  "email": "gaurav.kumar@example.com",
  "contact": "+919876543210",
  "amount": 1000,
  "currency": "",
  "order_id": "order_1Aa00000000002",
  "customer_id": "cust_1Aa00000000001",
  "token": "token_1Aa00000000001",
  "recurring": true,
  "description": "Creating recurring payment for Gaurav Kumar",
  "notes": map[string]interface{}{
    "note_key 1": "Beam me up Scotty",
    "note_key 2": "Tea. Earl Gray. Hot.",
  },
}
body, err := Client.Payment.CreateRecurringPayment(data, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary paymentRequest = new Dictionary();
paymentRequest.Add("email", "gaurav.kumar@example.com");
paymentRequest.Add("contact", "+919876543210");
paymentRequest.Add("amount", 1000);
paymentRequest.Add("currency", "");
paymentRequest.Add("order_id", "order_MZ35KPxZaqxfXq");
paymentRequest.Add("customer_id", "cust_KUyah9o60OPhfj");
paymentRequest.Add("token", "token_MZ37MsnhLNH4tN");
paymentRequest.Add("recurring", true);
paymentRequest.Add("description", "Creating recurring payment for Gaurav Kumar");
Dictionary notes = new Dictionary();
notes.Add("notes_key_1", "Tea, Earl Grey, Hot");
notes.Add("notes_key_2", "Tea, Earl Grey… decaf.");
paymentRequest.Add("notes", notes);

Payment payment = client.Payment.CreateRecurringPayment(paymentRequest);
```

```json: Success Response
{
  "razorpay_payment_id" : "pay_1Aa00000000001"
}

```json: Failure Response
{
   "error":{
      "code":"BAD_REQUEST_ERROR",
      "description":"Amount exceeds maximum amount allowed",
      "source":"business",
      "step":"payment_initiation",
      "reason":"input_validation_failed",
      "metadata":{
         
      }
   }
}
```

> **INFO**
>
> 
> **UPI Payments**
> 
> - We recommend sending a pre-debit notification to the customer 48 hours before the debit date.
> - For UPI, it may take between 24-36 hours for the subsequent payment to reflect on your Dashboard.
> - This is because of the failure of pre-debit notification and/or any retries that we attempt for the payment.
> - Do not create another subsequent payment until you get the status of the previous one.
> 

> **WARN**
>
> 
> **UPI Payments**
> 
> - The subsequent payment may fail if there is late authorisation of an earlier payment.
> - For UPI, **do not** create subsequent payments on the last day of the cycle. This will cause the payment to fail.
> 

### Request Parameters

`amount` _mandatory_
: `integer` The amount you want to charge your customer. This should be the same as the order amount.

`order_id`_mandatory_
: `string` The unique identifier of the order created. For example, `order_1Aa00000000002`.

`customer_id` _mandatory_
: `string` The unique identifier of the customer you want to charge. For example, `cust_1Aa00000000002`.

`token` _mandatory_
: `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

`recurring` _mandatory_
: `boolean` Determines whether recurring payment is enabled or not.
    - `true`: Recurring payment is enabled.
    - `false`: Recurring payment is not enabled.

`notes`_optional_
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, `"note_key": "Beam me up Scotty”`.

### Response Parameters

`razorpay_payment_id`
: `string` The unique identifier of the payment that is created. For example, `pay_1Aa00000000001`.

`razorpay_order_id`
: `string` The unique identifier of the order that is created. For example, `order_1Aa00000000001`.

`razorpay_signature`
: `string` The signature generated by the Razorpay. For example, `9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d`

### Error Response Parameters

Given below is a list of possible errors you may face while creating a Recurring Payment.

    
### adequate_funds_not_available_blocked

         - **Description**: Sufficient unblocked funds not available in customer's account. Please ask customer to add fund and try again.
         - **Next Steps**: Please ask customer to add sufficient unblocked funds and try again.
        

    
### amount_does_not_match_mandate_amount

         
            
                Amount Mismatch - Mandate Amount
                
                 - **Description**: The payment failed as the amount does not match the amount provided at the time of mandate creation.
                 - **Next Steps**: Pass the transaction amount less than or equal to the mandate amount.
                

            
### Amount Mismatch - Payment Amount

                 - **Description**: The amount does not match with payment amount.
                 - **Next Steps**: Retry with correct amount.
                

         
        
    

    
### bad_request_error

         - **Description**: Invalid Mandate Sequence Number.
         - **Next Steps**: Retry after some time during the valid cycle.
        

    
### bank_account_invalid

         - **Description**: Payment failed because Account linked to VPA is invalid.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### bank_not_available

         - **Description**: Payment was unsuccessful as the bank linked to this UPI ID is temporarily unavailable. Any amount deducted will be refunded within 5-7 working days.
         - **Next Steps**: Retry after some time.
        

    
### bank_technical_error

         
            
                Bank Decline
                
                 - **Description**: Payment was unsuccessful as it was declined by your bank. Any amount deducted will be refunded within 5-7 working days.
                 - **Next Steps**: Retry after some time.
                

            
### Bank or Wallet Gateway Error

                 - **Description**: Payment processing failed due to error at bank or wallet gateway
                 - **Next Steps**: Retry after some time.
                

            
### Temporary Bank Issue

                 - **Description**: Payment was unsuccessful due to a temporary issue at your bank. Any amount deducted will be refunded within 5-7 working days.
                 - **Next Steps**: Retry after some time.
                

            
### General Temporary Issue

                 - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
                 - **Next Steps**: Retry after some time.
                

            
### Bank Services Halt

                 - **Description**: Payment was unsuccessful due to a temporary halt of services at this bank.
                 - **Next Steps**: Retry after some time.
                

         
        
    

    
### banks_hsm_is_down_remitter

         - **Description**: Remitter bank failed to process the transaction. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### credit_to_beneficiary_failed

         - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
         - **Next Steps**: Retry after some time.
        

    
### debit_declined

         - **Description**: Payment was unsuccessful as it was declined by remitter bank.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### debit_instrument_blocked

         - **Description**: Payment was unsuccessful as the account linked to this UPI ID is blocked. Try using another account.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### execution_day_rule_mismatch

         
            
                Execution Day Rule Mismatch
                
                 - **Description**: Day of debit does not match the debit execution rule for the payer. Please ensure execution day matches the execution rule.
                 - **Next Steps**: Please ensure execution day matches execution rule.
                

            
### Execution Day Rule Mismatch - Remitter

                 - **Description**: Day of debit does not match the debit execution rule for the payer. Please ensure execution day matches the execution rule.
                 - **Next Steps**: Please ensure execution day matches execution rule and try again.
                

         
        
    

    
### gateway_technical_error

         
            
                Bank or Wallet Gateway Error
                
                 - **Description**: Payment processing failed due to error at bank or wallet gateway.
                 - **Next Steps**: Retry after some time.
                

            
### Temporary Issue with Money Deduction

                 - **Description**: Payment was unsuccessful due to a temporary issue. If money got deducted, reach out to the seller.
                 - **Next Steps**: Retry after some time.
                

         
        
    

    
### id_value_must_be_present

         - **Description**: Failed to debit customer's bank account. Mandate details are incorrect.
         - **Next Steps**: Please try after sometime.
        

    
### insufficient_funds

         - **Description**: Transaction failed due to insufficient funds.
         - **Next Steps**: Ask the customer to add balance to their account and retry.
        

    
### invalid_response_from_gateway

         - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
         - **Next Steps**: Retry after some time.
        

    
### invalid_token

         - **Description**: Invalid Token.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### invalid_transaction_beneficiary

         - **Description**: Beneficiary address resolution failed. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### invalid_vpa

         - **Description**: You have entered an incorrect UPI ID. Please retry with the correct UPI ID.
         - **Next Steps**: Ask the customer to retry with a valid VPA.
        

    
### issuer_dispatch_failed

         - **Description**: Payment failed due to some issue at the issuer bank. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### limit_exceeded_remitting_bank

         - **Description**: Limit exceeded for remitter bank. Please ask customer to try with another bank account.
         - **Next Steps**: Please ask customer to try with another bank account.
        

    
### mandate_cancelled

         - **Description**: UPI mandate created for payment has been cancelled by user.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### mandate_current_cycle_allowed_debit_exceeds

         - **Description**: Mandate is already honoured.
         - **Next Steps**: Wait till next cycle for debiting the customer.
        

    
### mandate_debit_beyond_psp_amount_cap

         - **Description**: Debit amount is beyond payer PSP specified amount cap. Please reduce the amount and try again.
         - **Next Steps**: Please reduce the mandate amount to match customer PSP.
        

    
### mandate_expired

         - **Description**: UPI Mandate is expired.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### mandate_not_active

         - **Description**: UPI mandate is not active.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### mandate_paused

         - **Description**: UPI mandate is not active, it is paused by user.
         - **Next Steps**: Ask the customer to resume the mandate & retry.
        

    
### merchant_error_payee_psp

         - **Description**: VPA resolution into bank account details failed. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### mobile_number_invalid

         - **Description**: Registered Mobile number linked to the account has been changed or removed.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### mpin_not_set_by_customer

         - **Description**: UPI MPIN not set by customer. Please ask customer to set MPIN and try again.
         - **Next Steps**: Please ask customer to set MPIN and try again.
        

    
### nature_of_debit_not_allowed

         - **Description**: Nature of debit not allowed in customer's account. Please ask the customer to use a different bank account.
         - **Next Steps**: Please ask the customer to use a different bank account.
        

    
### no_financial_address_record_found

         - **Description**: No financial address record found for this vpa. Please ask customer to try with another bank account.
         - **Next Steps**: Please ask customer to try with other bank account.
        

    
### no_original_request_found

         - **Description**: No mandate details were found in the record during debit. Please try after some time.
         - **Next Steps**: Please try after some time.
        

    
### null_ack_processing_failure

         - **Description**: Processing failure at gateway. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### number_of_pin_tries_exceeded

         - **Description**: Customer has exceeded PIN retry limit. Please ask customer to create a new mandate and enter the right PIN.
         - **Next Steps**: Please ask customer to create a new mandate and enter the right PIN.
        

    
### payer_account_has_changed

         - **Description**: Payer account linked to the customer's VPA has changed. Please request the customer to either change it to the bank account used during mandate registration or register a new mandate for them.
         - **Next Steps**: Please request the customer to either change it to the bank account used during mandate registration or register a new mandate for them.
        

    
### payer_seqnum_validation_failure

         - **Description**: Payer sequence number length validation failed.
         - **Next Steps**: Please provide a valid payer sequence number (1-3 digits).
        

    
### payment_failed

         
            
                Temporary Issue with Refund
                
                 - **Description**: Payment was unsuccessful due to a temporary issue. If amount got deducted, it will be refunded within 5-7 working days.
                 - **Next Steps**: Retry after 1 hour.
                

            
### Try Another Bank Account

                 - **Description**: Payment failed. Please try again with another bank account.
                 - **Next Steps**: Retry after some time.
                

         
        
    

    
### payment_pending

         - **Description**: The status of your payment is pending. You can either wait or retry to pay successfully.
         - **Next Steps**: Retry after some time.
        

    
### payment_risk_check_failed

         - **Description**: Payment was unsuccessful as your account does not pass the risk checks done by your bank. Try using another account.
         - **Next Steps**: Retry after some time.
        

    
### payment_stopped_by_court_order

         - **Description**: Payment processing failure at remitter bank. Please ask customer to try with another bank account.
         - **Next Steps**: Please ask customer to try with another bank account.
        

    
### payment_timed_out

         - **Description**: Payment was unsuccessful as the bank linked to this UPI ID is not reachable at this time.
         - **Next Steps**: Retry after some time.
        

    
### per_transaction_limit_exceeded

         - **Description**: Customer bank per transaction limit exceeded. Please try again with a lower amount.
         - **Next Steps**: Please reduce transaction amount and try again.
        

    
### psp_bank_not_available

         - **Description**: Payer PSP / Bank not available. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### psp_not_available

         - **Description**: Payment was unsuccessful as the UPI app is not reachable at this time. Any amount deducted will be refunded within 5-7 working days.
         - **Next Steps**: Retry after some time.
        

    
### psp_timeout

         - **Description**: Payer PSP timed out. Please try again.
         - **Next Steps**: Please try again after some time.
        

    
### regid_details_must_be_present

         - **Description**: Gateway validation failure. Please try after sometime or create a new mandate.
         - **Next Steps**: Please try after sometime or create a new mandate.
        

    
### remitter_account_dormant

         - **Description**: Bank Account is closed.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### remitter_dispatch_failed

         - **Description**: Payment failed due to some issue at the customer's. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### request_timed_out

         - **Description**: Payment was unsuccessful due to a temporary issue. Any amount deducted will be refunded within 5-7 working days.
         - **Next Steps**: Retry after some time.
        

    
### response_not_received_within_tat

         - **Description**: VPA resolution into bank account details failed. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### seqnum_mismatch_payer_psp

         - **Description**: Sequence number mismatch between payer and payee PSP. Please try again after some time.
         - **Next Steps**: Please ask customer to try after sometime.
        

    
### suspected_fraud_decline

         - **Description**: Suspected fraud, transaction declined by customer's bank. Please try again after some time.
         - **Next Steps**: Please try after sometime.
        

    
### transaction_frequency_limit_exceeded

         - **Description**: Payment failed. Please try again with another bank account.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### transaction_limit_exceeded

         - **Description**: Payment failed because Transaction amount limit has exceeded
         - **Next Steps**: Reach out to the customer to collect the amount.
        

    
### transaction_not_allowed

         - **Description**: Payment was unsuccessful as it was declined by your bank. Reach out to your bank for more details. Try using another account.
         - **Next Steps**: Create a new mandate with the customer.
        

    
### transaction_not_permitted_cardholder

         - **Description**: Transaction not permitted for customer's account. Please ask customer to try with another bank account.
         - **Next Steps**: Please ask customer to try with another bank account.
        

    
### transaction_not_permitted_cardholder_beneficiary

         - **Description**: Transaction not permitted in beneficiary account. Please try again with another bank account.
         - **Next Steps**: Please try again with another bank account.
        

    
### transaction_not_permitted_to_vpa

         - **Description**: Transaction not permitted to payee VPA by the payer PSP. Please contact your bank to enable Autopay for this VPA.
         - **Next Steps**: Please contact your bank to enable autopay for this VPA.
        

    
### umn_does_not_exist_payer

         - **Description**: Mandate does not exist. Please create a new mandate.
         - **Next Steps**: Please ask customer to create new mandate.
        

    
### unable_to_process_beneficiary_bank

         - **Description**: Error processing request at beneficiary bank. Please try again after some time.
         - **Next Steps**: Please try again after some time.
        

    
### vpa_resolution_failed

         - **Description**: You have entered an incorrect UPI ID. Please retry with the correct UPI ID.
         - **Next Steps**: Retry after some time.
        

## 3.3. Fetch an Order With ID

Use this endpoint to retrieve details of a particular order as per the id.

/v1/orders/:id

```curl: Curl
curl -u : \
-X GET https://api.razorpay.com/v1/orders/:id

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String orderId = "order_1Aa00000000002";

Order order = razorpay.orders.fetch(orderId);

```Python: Python
# do easy_install razorpay or
#    pip install razorpay

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.fetch(orderId)

```php: PHP 
$api = new Api($key_id, $secret);

$api->order->fetch($orderId);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

orderId = "order_1Aa00000000002"

Razorpay::Order.fetch(orderId)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.fetch(orderId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Order.Fetch("", nil, nil)

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

string orderId = "order_1Aa00000000002";

Order order = client.Order.Fetch(orderId);
```

```json: Success
{
  "id":"order_DaaS6LOUAASb7Y",
  "entity":"order",
  "amount":2000,
  "amount_paid":0,
  "amount_due":2000,
  "currency":"",
  "receipt":null,
  "notification":{
    "token_id":"token_M7K2eFBU7vToaQ",
    "payment_after":1634057114,
    "id":"notification_00000000000001",
    "status":"delivered",
    "delivered_at":1634057113
  },
  "offer_id":"offer_JGQvQtvJmVDRIA",
  "offers":[
    "offer_JGQvQtvJmVDRIA"
  ],
  "status":"created",
  "attempts":0,
  "notes":[
    
  ],
  "created_at":1654776878
}
```json: Failure
{
  "error":{
    "code":"BAD_REQUEST_ERROR",
    "description":"The id provided does not exist",
    "source":"business",
    "step":"payment_initiation",
    "reason":"input_validation_failed",
    "metadata":{
      
    }
  }
}
```

### Path Parameter

`id` _mandatory_
: `string` Unique identifier of the order to be retrieved.

### Response Parameters

`id`
: `string` The unique identifier of the order.

`amount`
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

`entity`
: `string` Name of the entity. Here, it is `order`.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency`
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. Refer to the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).  

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`notification`
: `object` Details of the pre-debit notification. The notification object is populated in the response only if you have passed this while creating an order.

    `token_id`
    : `string` The `token_id` generated when the customer successfully completes the authorisation payment. Different payment instruments for the same customer have different `token_id`.

    `payment_after`
    : `integer` Unix timestamp post which the debit is supposed to happen.

    `id`
    : `string` Unique identifier of the notification.

    `delivered_at`
    : `integer` Indicates the unix timestamp when the notification was delivered.

`status`
: `string` The status of the order. Possible values:
  - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
  - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
  - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.
