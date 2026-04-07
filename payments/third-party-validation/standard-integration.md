---
title: Third Party Validation (TPV) on Razorpay Standard Integration
description: Know how to integrate TPV on Razorpay Standard Integration.
---

# Third Party Validation (TPV) on Razorpay Standard Integration

[Third-Party Validation (TPV)](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md) of bank accounts is a mandatory requirement for merchants in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. As per Securities and Exchange Board of India (SEBI) guidelines, transactions must be made by the customers **only** from those bank accounts, which are provided when they registered with your business. 

    
### Prerequisites

         Before you integrate TPV on Razorpay Standard integration, you should fulfill the following requirements:
         
         1. Set up your [Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md), if you have not done already.
         2. Contact your dedicated support POC to enable the TPV feature for your account.
         3. [Generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) required to authenticate API requests sent to Razorpay servers.
         4. Check the [best practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/best-practices.md).
        

## 1. Build Integration

In the TPV integration flow, Razorpay maps the customers' bank accounts to ensure that the payment is processed only from their registered bank accounts. Follow the steps given below:

    
### 1.1 Collect Investor Bank Account details

         You should collect the bank account details provided by the investor at the time of registration.
        

    
### 1.2 Create an Order

         Pass the investor bank account details to the `bank_account` array of the Orders API. You can choose to make the investor pay using a certain payment method or permit them to choose any of the supported payment method, that is, netbanking, UPI or debit card.

         
Scenario | Action Needed
---
[Pay Using Specific Payment Method](#scenario-1-method-parameter-is-passed) |Pass the `method` parameter.
---
[Pay Using Any Method (Netbanking/UPI/Debit Card)](#scenario-2-method-parameter-is-not-passed) | Do not pass the `method` parameter.

/orders

  
    Scenario 1: Method Parameter is Passed
    
    The investor needs to pay using the payment method specified by you in the order. For example, if you want the investor to pay using UPI, you must pass `method=upi`.

  
    Netbanking
    
     Given below is the sample code when the `method` is `netbanking`.

     
     ```curl: Curl
     curl -u : \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d '{
       "amount": 500,
       "method": "netbanking",
       "receipt": "BILL13375649",
       "currency": "INR",
       "bank_account": {
         "account_number": "765432123456789",
         "name": "Gaurav Kumar",
         "ifsc": "HDFC0000053"
      }
     }'
     ```java: Java 
     RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

       ArrayList Offer = new ArrayList();
        Offer.add("offer_JTUADI4ZWBGWur");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("receipt", "BILL13375649");
        orderRequest.put("method", "netbanking");
   
       JSONObject bank_account = new JSONObject();
       bank_account.put("account_number", "765432123456789");
       bank_account.put("name", "Gaurav Kumar");
       bank_account.put("ifsc, "HDFC0000053");
       orderRequest.put("bank_account", bank_account);

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
        
       
       ```python: Python 
       import razorpay
       client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

       client.order.create({
       {
         "amount": 500,
         "method": "netbanking",
         "receipt": "BILL13375649",
         "currency": "INR",
         "bank_account": {
           "account_number": "765432123456789",
           "name": "Gaurav Kumar",
           "ifsc": "HDFC0000053"
        }
       })

       ```php: PHP 
       $api = new Api($key_id, $secret);

       $api->order->create(array('amount' => 100, 'method' => 'netbanking', 'currency' => 'INR', bank_account => array( 'account_number' => '765432123456789', 'name' => 'Gaurav Kumar', 'ifsc' => 'HDFC0000053')));

       ```csharp: .NET 
       RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

       Dictionary options = new Dictionary();
       options.Add("amount", 50000); // amount in the smallest currency unit
       options.Add("receipt", "receipt#1");
       options.Add("method", "netbanking");
       options.Add("currency", "INR");
       bank_account.account_number="765432123456789";
       bank_account.name="Gaurav Kumar";
       bank_account.ifsc="HDFC0000053";

       options.Add("bank_account", bank_account);

       Order order = client.Order.Create(options);

       ```ruby: Ruby 
       require "razorpay"
       Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

       order = Razorpay::Order.create amount: 50000, currency: 'INR', method: 'netbanking', receipt: 'receipt#1',   bank_account: { account_number: '765432123456789', name: 'Gaurav Kumar', ifsc: 'HDFC0000053'}

       ```js: Node.js 
       var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

       instance.orders.create({
         amount: 50000,
         currency: "INR",
         method: "netbanking",
         receipt: "receipt#1",
         bank_account: {
           account_number: "765432123456789",
           name: "Gaurav Kumar",
           ifsc: "HDFC0000053"
          }
       })

       ```go: Go 
       import ( razorpay "github.com/razorpay/razorpay-go" )
       client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

       data := map[string]interface{}{
         "amount": 50000,
         "currency": "INR",
         "method": "netbanking",
         "receipt": "receipt#1",
         "bank_account": {
           "account_number": "765432123456789",
           "name": "Gaurav Kumar",
           "ifsc": "HDFC0000053"
        }
       }
       body, err := client.Order.Create(data, nil)

       ```json: Response
       {
        "id": "order_GAWN9beXgaqRyO",
        "entity": "order",
        "amount": 500,
        "amount_paid": 0,
        "amount_due": 500,
        "currency": "INR",
        "receipt": "BILL13375649",
        "offer_id": null,
        "status": "created",
        "attempts": 0,
        "notes": [],
        "created_at": 1573044247
       }
       ```
       
       

    

  
### Debit Card

     Given below is the sample code when the `method` is `card`.

    
     ```curl: Curl 
     curl -u : \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d '{
       "amount": 500,
       "method": "card",
       "receipt": "BILL13375649",
       "currency": "INR",
       "bank_account": {
         "account_number": "765432123456789",
         "name": "Gaurav Kumar",
         "ifsc": "HDFC0000053"
      }
     }'

     ```java: Java 
     RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

       ArrayList Offer = new ArrayList();
        Offer.add("offer_JTUADI4ZWBGWur");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("receipt", "BILL13375649");
        orderRequest.put("method", "card");
   
       JSONObject bank_account = new JSONObject();
       bank_account.put("account_number", "765432123456789");
       bank_account.put("name", "Gaurav Kumar");
       bank_account.put("ifsc, "HDFC0000053");
       orderRequest.put("bank_account", bank_account);

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
       
     ```python: Python 
     import razorpay
     client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

     client.order.create({
     {
       "amount": 500,
       "method": "card",
       "receipt": "BILL13375649",
       "currency": "INR",
       "bank_account": {
         "account_number": "765432123456789",
         "name": "Gaurav Kumar",
         "ifsc": "HDFC0000053"
        }
      }
     })

     ```php: PHP 
     $api = new Api($key_id, $secret);

     $api->order->create(array('amount' => 100, 'currency' => 'INR', 'method' => 'card', bank_account => array( 'account_number' => '765432123456789', 'name' => 'Gaurav Kumar', 'ifsc' => 'HDFC0000053')));

     ```csharp: .NET 
     RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

     Dictionary options = new Dictionary();
     options.Add("amount", 50000); // amount in the smallest currency unit
     options.Add("receipt", "receipt#1");
     options.Add("currency", "INR");
     options.Add("method", "card");
     bank_account.account_number="765432123456789";
     bank_account.name="Gaurav Kumar";
     bank_account.ifsc="HDFC0000053";

     options.Add("bank_account", bank_account);

     Order order = client.Order.Create(options);
     
     ```ruby: Ruby 
     require "razorpay"
      Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

      order = Razorpay::Order.create amount: 50000, currency: 'INR', method: 'card', receipt: 'receipt#1',   bank_account: { account_number: '765432123456789', name: 'Gaurav Kumar', ifsc: 'HDFC0000053'}

     ```js: Node.js 
     var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

     instance.orders.create({
       amount: 50000,
       currency: "INR",
       method: "card",
       receipt: "receipt#1",
       bank_account: {
         account_number: "765432123456789",
         name: "Gaurav Kumar",
         ifsc: "HDFC0000053"
       }
     })

     ```go: Go 
     import ( razorpay "github.com/razorpay/razorpay-go" )
     client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

     data := map[string]interface{}{
       "amount": 50000,
       "currency": "INR",
       "method": "card",
       "receipt": "receipt#1",
       "bank_account": {
         "account_number": "765432123456789",
         "name": "Gaurav Kumar",
         "ifsc": "HDFC0000053"
       }
     }
     body, err := client.Order.Create(data, nil)

     ```json: Response
     {
       "id": "order_GAWN9beXgaqRyO",
       "entity": "order",
       "amount": 500,
       "amount_paid": 0,
       "amount_due": 500,
       "currency": "INR",
       "receipt": "BILL13375649",
       "offer_id": null,
       "status": "created",
       "attempts": 0,
       "notes": [],
       "created_at": 1573044247
     }
     ```
     

     
    

  
### UPI

     Given below is the sample code when the `method` is `upi`.
     
     ```curl: Curl
     curl -u : \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d '{
       "amount": 500,
       "method": "upi",
       "receipt": "BILL13375649",
       "currency": "INR",
       "bank_account": {
         "account_number": "765432123456789",
         "name": "Gaurav Kumar",
         "ifsc": "HDFC0000053"
       }
     }'

     ```java: Java 
     RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

       ArrayList Offer = new ArrayList();
        Offer.add("offer_JTUADI4ZWBGWur");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("receipt", "BILL13375649");
        orderRequest.put("method", "upi");
   
       JSONObject bank_account = new JSONObject();
       bank_account.put("account_number", "765432123456789");
       bank_account.put("name", "Gaurav Kumar");
       bank_account.put("ifsc", "HDFC0000053");
       orderRequest.put("bank_account", bank_account);

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
     
     ```python: Python 
     import razorpay
     client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

     client.order.create({
     {
       "amount": 500,
       "method": "upi",
       "receipt": "BILL13375649",
       "currency": "INR",
       "bank_account": {
         "account_number": "765432123456789",
         "name": "Gaurav Kumar",
         "ifsc": "HDFC0000053"
       }
     })
     ```php: PHP 
     $api = new Api($key_id, $secret);

     $api->order->create(array('amount' => 100, 'method' => 'upi', 'currency' => 'INR', bank_account => array( 'account_number' => '765432123456789', 'name' => 'Gaurav Kumar', 'ifsc' => 'HDFC0000053')));
     ```csharp: .NET 
     RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

     Dictionary options = new Dictionary();
     options.Add("amount", 50000); // amount in the smallest currency unit
     options.Add("receipt", "receipt#1");
     options.Add("currency", "INR");
     options.Add("method", "upi");
     bank_account.account_number="765432123456789";
     bank_account.name="Gaurav Kumar";
     bank_account.ifsc="HDFC0000053";

     options.Add("bank_account", bank_account);

     Order order = client.Order.Create(options);

     
     ```ruby: Ruby 
     require "razorpay"
     Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

     order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1', method: 'upi',  bank_account: { account_number: '765432123456789', name: 'Gaurav Kumar', ifsc: 'HDFC0000053'}
     ```js: Node.js 
     var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

     instance.orders.create({
       amount: 50000,
       currency: "INR",
       receipt: "receipt#1",
       method: 'upi',
       bank_account: {
         account_number: "765432123456789",
         name: "Gaurav Kumar",
         ifsc: "HDFC0000053"
       }
     })

     
     ```go: Go 
     import ( razorpay "github.com/razorpay/razorpay-go" )
     client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

     data := map[string]interface{}{
       "amount": 50000,
       "currency": "INR",
       "receipt": "receipt#1",
       "method": "upi",
       "bank_account": {
         "account_number": "765432123456789",
         "name": "Gaurav Kumar",
         "ifsc": "HDFC0000053"
       }
     }
     body, err := client.Order.Create(data)
     ```json: Response
     {
       "id": "order_GAWRjlWkVcRh0V",
       "entity": "order",
       "amount": 500,
       "amount_paid": 0,
       "amount_due": 500,
       "currency": "INR",
       "receipt": "BILL13375649",
       "offer_id": null,
       "status": "created",
       "attempts": 0,
       "notes": [],
        "created_at": 1573044206
     }
     ```
     

     
     
    

### Scenario 2: Method Parameter is Not Passed

     If you want the investor to select any of the payment method, do not pass the `method` field. This way, they can choose netbanking, debit card or UPI to make the payment, as per their convenience.

     

     ```curl: Curl 
     curl -u : \
     -X POST https://api.razorpay.com/v1/orders \
     -H "Content-Type: application/json" \
     -d '{
        "amount": 500,
        "receipt": "BILL13375649",
        "currency": "INR",
        "bank_account": {
            "account_number": "765432123456789",
            "name": "Gaurav Kumar",
            "ifsc": "HDFC0000053"
        }
     }'

     ```java: Java
     RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        ArrayList Offer = new ArrayList();
        Offer.add("offer_JTUADI4ZWBGWur");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("receipt", "BILL13375649");

        JSONObject bank_account = new JSONObject();
        bank_account.put("account_number", "765432123456789");
        bank_account.put("name", "Gaurav Kumar");
        bank_account.put("ifsc, "HDFC0000053");
        orderRequest.put("bank_account", bank_account);

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);

     ```python: Python
     import razorpay
     client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

     client.order.create({
     {
      "amount": 500,
      "receipt": "BILL13375649",
      "currency": "INR",
      "bank_account": {
        "account_number": "765432123456789",
        "name": "Gaurav Kumar",
        "ifsc": "HDFC0000053"
       }
     }
     })

     ```go: Go 
     import ( razorpay "github.com/razorpay/razorpay-go" )
     client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

     data := map[string]interface{}{
        "amount": 50000,
        "currency": "INR",
        "receipt": "receipt#1",
        "bank_account": {
          "account_number": "765432123456789",
          "name": "Gaurav Kumar",
          "ifsc": "HDFC0000053"
        }
      }
     body, err := client.Order.Create(data, nil) 

     ```php: PHP
     $api = new Api($key_id, $secret);

     $api->order->create(array('amount' => 100, 'currency' => 'INR', bank_account => array( 'account_number' => '765432123456789', 'name' => 'Gaurav Kumar', 'ifsc' => 'HDFC0000053')));

     ```ruby: Ruby
     require "razorpay"
     Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

     order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1',   bank_account: { account_number: '765432123456789', name: 'Gaurav Kumar', ifsc: 'HDFC0000053'}

     ```js: Node.js 
     var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

     instance.orders.create({
        amount: 50000,
        currency: "INR",
        receipt: "receipt#1",
        bank_account: {
          account_number: "765432123456789",
          name: "Gaurav Kumar",
          ifsc: "HDFC0000053"
        }
     })

     ```csharp: .NET 
     RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

     Dictionary options = new Dictionary();
     options.Add("amount", 50000); // amount in the smallest currency unit
     options.Add("receipt", "receipt#1");
     options.Add("currency", "INR");
     bank_account.account_number="765432123456789";
     bank_account.name="Gaurav Kumar";
     bank_account.ifsc="HDFC0000053";

     options.Add("bank_account", bank_account);

     Order order = client.Order.Create(options);

     ```json: Response
     {
       "id": "order_GAWN9beXgaqRyO",
       "entity": "order",
       "amount": 500,
       "amount_paid": 0,
       "amount_due": 500,
       "currency": "INR",
       "receipt": "BILL13375649",
       "offer_id": null,
       "status": "created",
       "attempts": 0,
       "notes": [],
       "created_at": 1573044247
    }
    ```
    

    
  

         #### Request and Response Parameters

         Create a request payload using the following attributes:

         
    
        
`amount` _mandatory_
: `integer` The transaction amount expressed in paise (currency supported is INR). For example, for an actual amount of ₹1, the value of this field should be `100`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. You can create Orders in **INR** only.

`receipt` _optional_
: `string` Receipt number that corresponds to this Order, set for your internal reference. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`method` _mandatory_
: `string` The payment method used to make the payment. If this parameter is not passed, investors will be able to make payments using both netbanking and UPI payment methods. Possible values:
  - `netbanking`: Investors can make payments only using netbanking.
  - `card`: Investors can make payments using debit card.
  - `upi`: Investors can make payments only using UPI.

`bank_account`
: Details of the bank account that the investor has provided at the time of registration.

    `account_number`  _mandatory_
    : `string` The bank account number from which the investor should make the payment. For example, `765432123456789` Payments will not be processed for an incorrect account number.

    `name` _mandatory_
    : `string` The name linked to the bank account. For example, `Gaurav Kumar`.

    `ifsc` _mandatory_
    : `string` The bank IFSC. For example, `HDFC0000053`.

    
    

`id`
: `string` Unique identifier of the payment.

`entity`
: `string` Indicates the type of entity. Here, it is order.

`amount`
: `integer` The payment amount represented in the smallest unit of the currency passed. For example, amount = 100 translates to 100 paise, that is ₹1 (default currency is INR).

`amount_paid`
: `integer` The amount that has been paid.

`amount_due`
: `integer` The amount that is yet to be paid.

`currency`
: `string` The 3-letter ISO currency code for the payment. Currently, we only support INR.

`receipt`
: `string` A unique identifier of the order entered by the user. For example, `BILL13375649`.

`status`
: `string` The status of the order.

`notes`
: `object` Key-value pair you can use to store additional information about the entity. Maximum of 15 key-value pairs, 256 characters each. For example, "note_key": "Beam me up Scotty”.

`created_at`
: `integer` The Unix timestamp at which the order was created.

`offer_id` 
: `string` Unique identifier of the offer.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.
    

        
    
    
### 1.3 Add Checkout Code

         Send the `order_id` obtained in the response of the previous step along with the other Checkout attributes to trigger Razorpay Checkout. 

         Following are two sample codes for Checkout:
         
             
                 -  On successful payment, your web page is displayed to the user. 
-  On payment failure, the customer is notified of the reason for failure and requested to retry the payment.

             
             
                 -  On successful payment, the customer is redirected to the specified URL. For example, a payment success page. 
-  On payment failure, the customer is requested to retry payment at Checkout.

             
         

         Copy-paste the form parameters as `options` in your HTML code:
 
         ```html: Checkout with Handler Function
         Pay
         
         
         var options = {
             "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
             "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
             "currency": "INR",
             "name": "Acme Corp",
             "description": "Test Transaction",
             "image": "https://example.com/your_logo",
             "order_id": "order_Dd3Wbag7QXDuuL", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
             "handler": function (response){
                 alert(response.razorpay_payment_id);
                 alert(response.razorpay_order_id);
                 alert(response.razorpay_signature)
             },
             "prefill": {
                 "name": "Gaurav Kumar",
                 "email": "gaurav.kumar@example.com",
                 "contact": "9000090000"
             },
             "notes": {
                 "address": "Razorpay Corporate Office"
             },
             "theme": {
                 "color": "#3399cc"
             }
         };
         var rzp1 = new Razorpay(options);
         rzp1.on('payment.failed', function (response){
                 alert(response.error.code);
                 alert(response.error.description);
                 alert(response.error.source);
                 alert(response.error.step);
                 alert(response.error.reason);
                 alert(response.error.metadata.order_id);
                 alert(response.error.metadata.payment_id);
         });
         document.getElementById('rzp-button1').onclick = function(e){
             rzp1.open();
             e.preventDefault();
         }
         
         ```html: Checkout with Callback URL
         Pay
         
         
         var options = {
             "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
             "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
             "currency": "INR",
             "name": "Acme Corp",
             "description": "Test Transaction",
             "image": "https://example.com/your_logo",
             "order_id": "order_Dd3Wbag7QXDuuL", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
             "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
             "prefill": {
                 "name": "Gaurav Kumar",
                 "email": "gaurav.kumar@example.com",
                 "contact": "9000090000"
             },
             "notes": {
                 "address": "Razorpay Corporate Office"
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

         Know more about the[Checkout Form Fields](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/integration-steps.md#checkout-options).

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          - The open method of the Razorpay object (`rzp1.open()`) should be invoked by your site's JavaScript. This may or may not be a user-driven action such as a click.
>          - UPI Intent Apps will appear on the standard checkout if the method is `upi` in the Orders API.
>          

        

    
### 1.4 Handle Payment Success and Failure

         The way you handle payment success and failure scenarios depends on the Checkout sample code you opted for in the previous step.

         #### Checkout with Handler Function
 
         If you used **Sample Code with Handler Function**:
 
         
             
                 Investor sees your application web page, and the Checkout returns the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`). You need to collect these and send them to your server.
 
                 ```js: Success Handling Code
                 "handler": function (response){
                 alert(response.razorpay_payment_id);
                 alert(response.razorpay_order_id);
                 alert(response.razorpay_signature)}
                 ```
             
             
                 On payment failure, the investor is notified about the reason for failure and requested to retry the payment.
 
                 ```js: Failure Handling Code
                 rzp1.on('payment.failed', function (response){
                 alert(response.error.code);
                 alert(response.error.description);
                 alert(response.error.source);
                 alert(response.error.step);
                 alert(response.error.reason);
                 alert(response.error.metadata.order_id);
                 alert(response.error.metadata.payment_id);
                 }
                 ```

                 Know more about[the error parameters.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md#response-parameters)
             
         

         #### Checkout with Callback URL
 
         If you used the **Sample Code with the Callback URL**:

         
             
                 When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`,`razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL. Only successful authorisations are auto-submitted.
             
             
                 In case of failed payments, the Checkout Form is displayed again for payment retry.
             
         
        

    
### 1.5 Store Fields in Your Server

         A successful payment returns the following fields to the Checkout form.

  
    Success Callback
    
- You need to store these fields in your server.
- You can confirm the authenticity of these details by verifying the signature in the next step.

```json: Success Callback
{
  "razorpay_payment_id": "pay_29QQoUBi66xm2f",
  "razorpay_order_id": "order_9A33XWu170gUtm",
  "razorpay_signature": "9ef4dffbfd84f1318f6739a3ce19f9d85851857ae648f114332d8401e0949a3d"
}
```

`razorpay_payment_id`
: `string` Unique identifier for the payment returned by Checkout **only** for successful payments.

`razorpay_order_id`
: `string` Unique identifier for the order returned by Checkout.

`razorpay_signature`
: `string` Signature returned by the Checkout. This is used to verify the payment.
    

        
    
    
### 1.6 Verify Signature

         This is a mandatory step to confirm the authenticity of the details returned to the Checkout form for successful payments.

  
    To verify the `razorpay_signature` returned to you by the Checkout form:
    
     1. Create a signature in your server using the following attributes:
        - `order_id`: Retrieve the `order_id` from your server. Do not use the `razorpay_order_id` returned by Checkout.
        - `razorpay_payment_id`: Returned by Checkout.
        - `key_secret`: Available in your server. The `key_secret` that was generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     2. Use the SHA256 algorithm, the `razorpay_payment_id` and the `order_id` to construct a HMAC hex digest as shown below:

         ```html: HMAC Hex Digest
         generated_signature = hmac_sha256(order_id + "|" + razorpay_payment_id, secret);

           if (generated_signature == razorpay_signature) {
             payment is successful
           }
         ```
         
     3. If the signature you generate on your server matches the `razorpay_signature` returned to you by the Checkout form, the payment received is from an authentic source.
    

  
### Generate Signature on Your Server

Given below is the sample code for payment signature verification:

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String secret = "EnLs21M47BllR3X8PSFtjtbd";

JSONObject options = new JSONObject();
options.put("razorpay_order_id", "order_IEIaMR65cu6nz3");
options.put("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.put("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f");

boolean status =  Utils.verifyPaymentSignature(options, secret);

```php: PHP
$api = new Api($key_id, $secret);

$api->utility->verifyPaymentSignature(array('razorpay_order_id' => $razorpayOrderId, 'razorpay_payment_id' => $razorpayPaymentId, 'razorpay_signature' => $razorpaySignature));

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

payment_response = {
       razorpay_order_id: 'order_IEIaMR65cu6nz3',
       razorpay_payment_id: 'pay_IH4NVgf4Dreq1l',
       razorpay_signature: '0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f'
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
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("razorpay_order_id", "order_IEIaMR65");
options.Add("razorpay_payment_id", "pay_IH4NVgf4Dreq1l");
options.Add("razorpay_signature", "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50");

Utils.verifyPaymentSignature(options);

```nodejs: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

var { validatePaymentVerification, validateWebhookSignature } = require('./dist/utils/razorpay-utils');
validatePaymentVerification({"order_id": razorpayOrderId, "payment_id": razorpayPaymentId }, signature, secret);

```Go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

params := map[string]interface{}{
 "razorpay_order_id": "order_IEIaMR65cu6nz3",
 "razorpay_payment_id": "pay_IH4NVgf4Dreq1l",
}

signature := "0d4e745a1838664ad6c9c9902212a32d627d68e917290b0ad5f08ff4561bc50f";
secret := "EnLs21M47BllR3X8PSFtjtbd";
utils.VerifyPaymentSignature(params, signature, secret)
```

    

  
### Post Signature Verification

After you have completed the integration, you can [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md), make test payments, replace the test key with the live key and integrate with other [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md).
    

        
    

## 2. Test Integration

After the integration is complete, a **Pay** button will appear on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test is successful.

You can make test payments using netbanking, card or UPI payment methods configured at the Checkout.

> **WARN**
>
> 
> **Watch Out!**
> 
> This is a mock payment page that uses your test API keys, test card and payment details. 
> - Ensure you have entered only your [Test Mode API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys) in the Checkout code. 
> - Test mode features a mock bank page with **Success** and **Failure** buttons to replicate the live payment experience.
> - No real money is deducted due to the usage of test API keys. This is a simulated transaction.
> 

## 3. Go-Live

Consider these steps before taking the integration live.

    
### 3.1 Accept Live Payments

         Perform an end-to-end simulation of funds flow in the Test Mode. Once confident that the integration is working as expected, switch to the Live Mode and start accepting payments from customers.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you are switching your test API keys with API keys generated in Live Mode.
> 

To generate API Keys in Live Mode on your Razorpay Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        

    
### 3.2 Payment Capture

         After payment is `authorised`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

         
> **WARN**
>
> 
> 
>          **Watch Out**
> 
>          - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
>          - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
>          

         #### How to Capture Payments

         - **Auto-capture payments (recommended)**
         
Authorised payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Dashboard.
         
> **WARN**
>
> 
>          **Watch Out!**
> 
>          Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md#create-an-order).
>          

         - **Manually capture payments**
         
Each authorised payment can also be captured individually. You can manually capture payments using:
             - [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment)
             - [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments)

         Know more about [Capture Settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
        

         Dashboard:

1. Log in to the Razorpay Dashboard and switch to **Live Mode** on the menu.
1. Navigate to **Account & Settings** → **API Keys** → **Generate Key** to generate the API Key for Live Mode.
1. Download the keys and save them securely.
1. Replace the Test API Key with the Live Key in the Checkout code and start accepting actual payments.

        
    
    
### 3.2 Set Up Webhooks

         Ensure you have [set up webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md) in the live mode and configured the events for which you want to receive notifications.

         
> **WARN**
>
> 
>          **Implementation Considerations**
> 
>          Webhooks are the primary and most efficient method for event notifications. They are delivered asynchronously in near real-time. For critical user-facing flows that need instant confirmation (like showing "Payment Successful" immediately), supplement webhooks with API verification.
> 
>          **Recommended approach** 

>          - Rely on webhooks for all automation, which can be asynchronous.
>          - If a critical user-facing flow requires instant status, but the webhook notification has not arrived within the time mandated by your business needs, perform an immediate API Fetch call ([Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/fetch-with-id.md), [Orders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/fetch-with-id.md) and [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/refunds/fetch-specific-refund-payment.md)) to verify the status.
>          

        

    
      

### Related Information

- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) (Recommended)
- [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) (Recommended)
- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Payment States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md)
- [Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md)
- [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
