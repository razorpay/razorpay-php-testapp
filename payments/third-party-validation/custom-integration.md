---
title: Third-Party Validation (TPV) - Custom Integration
description: Know how Razorpay performs Third-Party Validation (TPV) of your investors' bank accounts in real-time using Razorpay Custom Integration.
---

# Third-Party Validation (TPV) - Custom Integration

Third-Party Validation (TPV) of bank accounts is a mandatory requirement for merchants in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. As per Securities and Exchange Board of India (SEBI) guidelines, transactions must be made by the investors **only** from those bank accounts provided when they registered with your business.

With Razorpay, you can comply with the SEBI guidelines for online payment collections by offering TPV integrations with [major banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/custom-integration/bank-list.md) at Checkout. Investors can make payments using netbanking, debit card or UPI. UPI supports both collect and intent flows at Razorpay Custom Integration checkout.
 
 to get this feature activated on your Razorpay account.

  
### Prerequisites

     - Contact our [Support Team](https://razorpay.com/support/#raise-a-request) to get this feature enabled for your account.
     - Keep the API key (combination of `Key_Id` and `Key_Secret`) handy for integration. 
     - [Generate API Keys from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) if not done already.
     - Configure the [payment capture settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md) on the Dashboard.
    

## 1. Integration Flow

In TPV integration flow, Razorpay maps the investors' bank accounts to ensure that the payment is processed only from their registered bank accounts. Follow the steps given below:

  
### 1.1 Collect Investor Bank Account details

     Collect the bank account details provided by the investor at the time of registration.
    

  
### 1.2 Create an Order

     Pass the bank account details to the `bank_account` array of the Orders API:

     /orders

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

           $api->order->create(array('amount' => 100, 'method' => 'netbanking', 'currency' => 'INR', bank_account => array(  'account_number' => '765432123456789', 'name' => 'Gaurav Kumar', 'ifsc' => 'HDFC0000053')));

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
         
         

     

     #### Request Parameters

     Create a request payload using the following attributes:

     `amount` _mandatory_
: `integer` The transaction amount expressed in paise (currency supported is INR). For example, for an actual amount of ₹1, the value of this field should be `100`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. You can create orders in **INR** only.

`receipt` _optional_
: `string` Receipt number that corresponds to this order, set for your internal reference. Maximum length is 40 characters.

`notes` _optional_
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`method` _mandatory_
: `string` The payment method used to make the payment. If this parameter is not passed, investors will be able to make payments using both netbanking and UPI payment methods. Possible values:
  - `netbanking`: Investors can make payments only using netbanking.
  - `card`: Investors can make payments using debit card.
  - `upi`: Investors can make payments only using UPI.

`bank_account` _mandatory_
: `object` Details of the bank account that the investor has provided at the time of registration.

    `account_number`  _mandatory_
    : `string` The bank account number from which the investor should make the payment. For example, `765432123456789` Payments will not be processed for an incorrect account number.

    `name` _mandatory_
    : `string` The name linked to the bank account. For example, `Gaurav Kumar`.

    `ifsc` _mandatory_
    : `string` The bank IFSC. For example, `HDFC0000053`.
    
  
  
### 1.3 Fetch Payment Methods

     When creating a custom checkout form for TPV, you can ensure that only the netbanking, debit card and UPI methods are displayed to the investor.

     Use the sample code given below to fetch all payment methods available to you.

     ```js: Request
     var razorpay = new Razorpay({
       key: '',
         // logo, displayed in the popup
       image: 'https://cdn.razorpay.com/logos/Du3F12cJXffdFe_large.jpg',
     });
     razorpay.once('ready', function(response) {
       console.log(response.methods);
     })
     ```js: Response
     {
       "methods": {
         "entity": "methods",
         "card": true,
         "debit_card": true,
         "credit_card": true,
         "prepaid_card": true,
         "card_networks": {
           "AMEX": 0,
           "DICL": 1,
           "MC": 1,
           "MAES": 1,
           "VISA": 1,
           "JCB": 1,
           "RUPAY": 1,
           "BAJAJ": 0
         },
         "amex": false,
         "netbanking": {
           ...
           ...
           "HDFC": "HDFC Bank",
           "ICIC": "ICICI Bank"
           ...
           ...
         },
         "wallet": {
           "payzapp": true
         },
         "emi": true,
         "upi": true,
         "cardless_emi": [],
         "paylater": [],
         "emi_subvention": "customer",
         "emi_options": {
           ...
           ...
           "ICIC": [
             {
               "duration": 3,
               "interest": 13,
               "subvention": "customer",
               "min_amount": 150000
             },
             {
               "duration": 6,
               "interest": 13,
               "subvention": "customer",
               "min_amount": 150000
             }
             ...// rest of the emi plans
           ],
           "HDFC": [
             {
               "duration": 12,
               "interest": 14,
               "subvention": "customer",
               "min_amount": 300000
             },
             {
               "duration": 18,
               "interest": 15,
               "subvention": "customer",
               "min_amount": 300000
             }
             ...
             ...// rest of the emi plans
           ]
         }
       }
     }
     ```

     Know more about the various [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md).
    

  
### 1.4 Invoke Checkout and Pass Order Id and Other Options

     
      
        1.4.1 Include the JavaScript code in your Webpage
        

         Include the following script, preferably in the `` section of your page:

         ```html: Index HTML
         
         ```

         
> **INFO**
>
> 
>          **Include the Javascript, Not the Library**
> 
>          Include the script from `https://checkout.razorpay.com/v1/razorpay.js` instead of serving a copy from your own server. This allows new updates and bug fixes to the library to get automatically served to your application.
> 
>          We always maintain backward compatibility with our code.
>          

        

      
### 1.4.2 Instantiate Razorpay Custom Checkout

         #### Single Instance on a Page

         ```js: Invoke a Single Instance
         var razorpay = new Razorpay({
           key: '',
             // logo, displayed in the payment processing popup
           image: 'https://i.imgur.com/n5tjHFD.jpg',
         });
         ```

         #### Multiple Instances on Same Page

         If you need multiple Razorpay instances on the same page, you can globally set some of the options:

         ```js: Invoke Multiple Instances
         Razorpay.configure({
           key: '',
             // logo, displayed in the payment processing popup
           image: 'https://i.imgur.com/n5tjHFD.jpg',
         })
         new Razorpay({}); // will inherit key and image from above.
         ```
        

      
### 1.4.3 Submit Payment Details

         After the order is created and the investor's payment details are obtained, the information should be sent to Razorpay to complete the payment. The data that needs to be submitted depends upon the payment method selected by the investor.

         You can do this by invoking the `createPayment` method:

         ```js: Netbanking - Handler function
         var data = {
           amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
           currency: "INR",// Default is INR. 
           email: 'gaurav.kumar@example.com',
           contact: '9123456780',
           notes: {
             address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
           },
           order_id: 'order_Dd3Wbag7QXDuuL', // Order ID generated in Step 1
           method: 'netbanking',
           bank: 'HDFC'
         };
   
         var btn = document.querySelector('#btn');
         btn.addEventListener('click', function(){ // has to be placed within user initiated context, such as click, in order for popup to open.
           razorpay.createPayment(data);

           razorpay.on('payment.success', function(resp) {
             alert(resp.razorpay_payment_id),
             alert(resp.razorpay_order_id),
             alert(resp.razorpay_signature)}); // will pass payment ID, order ID, and Razorpay signature to success handler.

           razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error  handler
  
         })
         ```js: Netbanking - Callback URL
         var data = {
           callback_url: 'https://www.examplecallbackurl.com/',
           amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
           currency: "INR",// Default is INR. We support more than 90 currencies.
           email: 'gaurav.kumar@example.com',
           contact: '9123456780',
           notes: {
             address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
           },
           order_id: 'order_CuEzONfnOI86Ab',// Order ID generated in Step 1
           method: 'netbanking',
           bank: 'HDFC'
         };

         var btn = document.querySelector('#btn');
         btn.addEventListener('click', function(){ // has to be placed within user initiated context, such as click, in order for popup to open.
           razorpay.createPayment(data);

         })
         ```js: UPI - Handler function
         var data = {
           amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
           currency: "INR",// Default is INR. We support more than 90 currencies.
           email: 'gaurav.kumar@example.com',
           contact: '9123456780',
           notes: {
             address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
           },
           order_id: 'order_Dd3Wbag7QXDuuL',//Order ID generated in Step 1
           method: 'upi',
           vpa: 'gaurav.kumar@exampleupi'
         };

         var btn = document.querySelector('#btn');
         btn.addEventListener('click', function(){ // has to be placed within user initiated context, such as click, in order for popup to open.
           razorpay.createPayment(data);

           razorpay.on('payment.success', function(resp) {
             alert(resp.razorpay_payment_id),
             alert(resp.razorpay_order_id),
             alert(resp.razorpay_signature)}); // will pass payment ID, order ID, and Razorpay signature to success handler.

           razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler

         })
         ```js: UPI - Callback URL
         var data = {
           callback_url: 'https://www.examplecallbackurl.com/',
           amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
           currency: 'INR',// Default is INR. We support more than 90 currencies.
           email: 'gaurav.kumar@example.com',
           contact: '9123456780',
           notes: {
             address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
           },
           order_id: 'order_CuEzONfnOI86Ab',// Order ID generated in Step 1
           method: 'upi',
           vpa: 'gaurav.kumar@exampleupi'
         };

         var btn = document.querySelector('#btn');
         btn.addEventListener('click', function(){ // has to be placed within user initiated context, such as click, in order for popup to open.
           razorpay.createPayment(data);

         })
         ```js: Debit Card - Handler function
         var data = {
           amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
           currency: "INR",// Default is INR. 
           email: 'gaurav.kumar@example.com',
           contact: '9123456780',
           notes: {
             address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
           },
           order_id: 'order_GAWRjlWkVcRh0V', // Order ID generated in Step 1
           method: 'card',
           card[name]: 'Gaurav Kumar',
           card[number]: '4386289407660153',
           card[cvv]: '566',
           card[expiry_month]: '10',
           card[expiry_year]: '30'
         };

         var btn = document.querySelector('#btn');
         btn.addEventListener('click', function(){ // has to be placed within user initiated context, such as click, in order for popup to open.
           razorpay.createPayment(data);

           razorpay.on('payment.success', function(resp) {
             alert(resp.razorpay_payment_id),
             alert(resp.razorpay_order_id),
             alert(resp.razorpay_signature)}); // will pass payment ID, order ID, and Razorpay signature to success handler.
  
           razorpay.on('payment.error', function(resp){alert(resp.error.description)}); // will pass error object to error handler

         })
         ```js: Debit Card - Callback URL
         var data = {
           callback_url: 'https://www.examplecallbackurl.com/',
           amount: 1000, // in currency subunits. Here 1000 = 1000 paise, which equals to ₹10
           currency: "INR",// Default is INR. We support more than 90 currencies.
           email: 'gaurav.kumar@example.com', 
           contact: '9123456780',
           notes: {
             address: 'Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru',
           },
           order_id: 'order_GAWRjlWkVcRh0V',// Order ID generated in Step 1
           method: 'card',
           card[name]: 'Gaurav Kumar',
           card[number]: '4386289407660153',
           card[cvv]: '566',
           card[expiry_month]: '10',
           card[expiry_year]: '30'
         };

         var btn = document.querySelector('#btn');
         btn.addEventListener('click', function(){ // has to be placed within user initiated context, such as click, in order for popup to open.
           razorpay.createPayment(data);

         })
         The `createPayment` method should be called within an event listener triggered by user action to prevent the pop-up from being blocked. For example:

         ```js
         $('button').click( function (){ razorpay.createPayment(...) })
         ```

         
> **INFO**
>
> 
>          **Handler Function Vs. Callback URL**
> 
>          - **Handler Function**:
>            
When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Checkout Form. You need to collect these and send them to your server.
>          - **Callback URL**:
>            
When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the Callback URL.
>          

        

     
    
  
  
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
    

    
  
  
### 1.6 Verify the Signature

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
    

    
  

### Related Information

- [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) (Recommended)
- [Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors.md) (Recommended)
- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Payment States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md)
- [Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md)
- [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
