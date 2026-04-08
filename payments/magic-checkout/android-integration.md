---
title: Integrate Razorpay Magic Checkout on Android App
heading: Integrate Magic Checkout on Android App
description: Steps to integrate Magic Checkout on your Android app using the Razorpay Android Standard SDK.
---

# Integrate Magic Checkout on Android App

Follow these steps to integrate the Razorpay Magic Checkout on your Android application.

#### Prerequisites

- Create a Razorpay account.
- Generate [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings.md#api-keys) from the Dashboard. To go live with the integration and start accepting real payments, generate Live Mode API Keys and replace them in the integration.

  - **1. Build Integration**:  Integrate with Android App.

  - **2. Test Integration**: Test the integration by making a test payment.

  - **3. Go-live Checklist**: Check the go-live checklist.

## 1. Build Integration

  
### 1.1 Enable/Disable Magic Checkout and Cash on Delivery

     
       
         Raise a request with your Razorpay SPOC to get this feature enabled on your account.
         Once this feature is enabled, the customer address saving and coupon features are enabled. 
       
       
         Raise a request with our [Support team](https://razorpay.com/support/) to enable this feature for your account.
       
     
    

  
### 1.2 Create Promotions and Shipping Info API Endpoints

     Follow the steps given below to create promotions and shipping info API endpoints: 
     
     
> **WARN**
>
> 
>      **Watch Out!**
>      
>      Ensure that the URLs are publicly accessible, require no authentication and are hosted on your server.
>      

     
     1. Log in to the Dashboard and navigate to **Magic Checkout**.  
     2. In the **Platform Setup**, select **Custom E-Commerce Platform** from the drop-down list and click **Next**.
         
     3. In the **Setup & Settings** section, click **Checkout Settings**. 
     4. In the **Coupon Settings** section, enter the following:
        1. **URL for get promotions**: The API URL should return a list of promotions applicable to the specified order_id and customer. Magic Checkout uses this endpoint to fetch these promotions from your server and display them to your customers in the checkout modal.
        2. **URL for apply promotions**: The API URL validates the promotion code applied by the customer and should return the discount amount. Magic Checkout uses this endpoint to apply promotions via your server.
     5. Click **Save settings**.
        
     6. Navigate to **Shipping Setup**.
     7. Select **API** as the Shipping Service type from the drop-down list.
     8. Enter the **URL for shipping info**. The API URL should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses. Magic Checkout uses this endpoint to retrieve shipping information from your server. 
     9. Click **Save Settings**.
        
    

  
### 1.3 Install Razorpay Android Standard SDK

     To install the SDK in your Android project, add the following code to your project's top-level build.gradle file. This provides access to the SDK library.
     ```json: dependencies
     repositories {
         mavenCentral()
     }

     dependencies {
         implementation 'com.razorpay:checkout:1.6.41'
     }
     ```
    

  
### 1.4 Initialise Razorpay Android Standard SDK

     Use the `setKeyId()` method of the Checkout class to dynamically add your API key id. You can generate your API keys from the [Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/api-keys.md#generate-api-keys).

     To ensure the Checkout form loads quickly, call the `preload()` method early in your payment flow. The time taken to load resources may vary based on your network bandwidth.
     
     ```java: Java
     public class PaymentActivity extends Activity {

         // ...

         @Override
         public void onCreate(Bundle savedInstanceState) {
             super.onCreate(savedInstanceState);

             /**
             * Preload payment resources
             */
             Checkout.preload(getApplicationContext());

             // ...

             checkout.setKeyID("");

             // ...
         }
     }
     ```kotlin: kotlin
     class PaymentActivity: Activity(), PaymentResultWithDataListener, ExternalWalletListener {
         // .....
         override fun onCreate(savedInstanceState: Bundle?) {
             super.onCreate(savedInstanceState)
             setContentView(R.layout.activity_payment)
             /*
             * To ensure faster loading of the Checkout form,
             * call this method as early as possible in your checkout flow
             * */
             Checkout.preload(applicationContext)
             val co = Checkout()
             // apart from setting it in AndroidManifest.xml, keyId can also be set
             // programmatically during runtime
             co.setKeyID("rzp_live_XXXXXXXXXXXXXX")
         }
         //......
     }
     ```

     
> **WARN**
>
> 
> 
>      **Watch Out!**
> 
>      It is recommended to send the API Key ID from your server-side as app-related metadata fetch. Do not add API Keys in the `AndroidManifest` file.
>      

    

  
### 1.5 Create an Order

     You can create an order using the following API and send the additional information required for Magic Checkout. Pass the `order_id` received in response to the checkout code.

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "line_items_total": 50000,  // Mandatory for Magic Checkout
  "line_items": [
    {
      "sku": "1g234",
      "variant_id": "12r34",
      "price": 50000,
      "offer_price": 50000,
      "quantity": 1,
      "name": "Product Name"
      // ... other line item details
    }
  ]
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 50000);
orderRequest.put("currency", "INR");
orderRequest.put("receipt", "receipt#1");
orderRequest.put("line_items_total", 50000); // Mandatory for Magic Checkout

JSONArray lineItems = new JSONArray();
JSONObject item = new JSONObject();
item.put("sku", "1g234");
item.put("variant_id", "12r34");
item.put("price", 50000);
item.put("offer_price", 50000);
item.put("quantity", 1);
item.put("name", "Product Name");
// ... other line item details
lineItems.put(item);
orderRequest.put("line_items", lineItems);

Order order = razorpay.orders.create(orderRequest);
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

data = {
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "line_items_total": 50000,  # Mandatory for Magic Checkout
  "line_items": [
    {
      "sku": "1g234",
      "variant_id": "12r34",
      "price": 50000,
      "offer_price": 50000,
      "quantity": 1,
      "name": "Product Name"
      # ... other line item details
    }
  ]
}

client.order.create(data)
```go: Go
import (
  razorpay "github.com/razorpay/razorpay-go"
)

client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "line_items_total": 50000, // Mandatory for Magic Checkout
  "line_items": []interface{}{
    map[string]interface{}{
      "sku": "1g234",
      "variant_id": "12r34",
      "price": 50000,
      "offer_price": 50000,
      "quantity": 1,
      "name": "Product Name",
      // ... other line item details
    },
  },
}

body, err := client.Order.Create(para_attr, nil)
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array(
  'amount' => 50000,
  'currency' => 'INR',
  'receipt' => 'receipt#1',
  'line_items_total' => 50000, // Mandatory for Magic Checkout
  'line_items' => array(
    0 => array(
      'sku' => '1g234',
      'variant_id' => '12r34',
      'price' => 50000,
      'offer_price' => 50000,
      'quantity' => 1,
      'name' => 'Product Name',
      // ... other line item details
    ),
  ),
));
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

para_attr = {
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "line_items_total": 50000, # Mandatory for Magic Checkout
  "line_items": [
    {
      "sku": "1g234",
      "variant_id": "12r34",
      "price": 50000,
      "offer_price": 50000,
      "quantity": 1,
      "name": "Product Name"
      # ... other line item details
    }
  ]
}

Razorpay::Order.create(para_attr)
```javascript: Node.js
var instance = new Razorpay({
  key_id: 'YOUR_KEY_ID',
  key_secret: 'YOUR_SECRET'
})

var data = {
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "line_items_total": 50000, // Mandatory for Magic Checkout
  "line_items": [
    {
      "sku": "1g234",
      "variant_id": "12r34",
      "price": 50000,
      "offer_price": 50000,
      "quantity": 1,
      "name": "Product Name"
      // ... other line item details
    }
  ]
}

instance.orders.create(data);
```csharp: .Net
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary orderRequest = new Dictionary();
orderRequest.Add("amount", 50000);
orderRequest.Add("currency", "INR");
orderRequest.Add("receipt", "receipt#1");
orderRequest.Add("line_items_total", 50000); // Mandatory for Magic Checkout

List lineItem = new List();
Dictionary lineItems = new Dictionary();
lineItems.Add("sku", "1g234");
lineItems.Add("variant_id", "12r34");
lineItems.Add("price", 50000);
lineItems.Add("offer_price", 50000);
lineItems.Add("quantity", 1);
lineItems.Add("name", "Product Name");
// ... other line item details
lineItem.Add(lineItems);
orderRequest.Add("line_items", lineItem);

Order order = client.Order.Create(orderRequest);
```
```json: Response
{
  "id": "order_EKwxwAgItmmXdp",
  "entity": "order",
  "amount": 50000,
  "amount_paid": 0,
  "amount_due": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": null,
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1582628071,
  "line_items_total": 50000
}
```

    
        Request Parameters
        
`amount` _mandatory_
: `integer` The transaction amount, expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the transaction should be made. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Default is `INR`. Length must be of 3 characters.

`receipt` _mandatory_
: `string` Your receipt id for this order should be passed here. Maximum length of 40 characters.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

`line_items_total` _mandatory_
: `integer` Total of `offer_price` for all line items added to the cart, in paise. For example, if a shoe worth ₹8,000 and a shirt worth ₹10,000 are added, the `line_item_total` will be `1800000`. This amount is post-tax.

  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   To ensure the order is considered as a Magic Checkout order, you must pass this parameter. Otherwise, it will default to Standard Checkout order and customers will view the Standard Checkout UI instead of Magic Checkout. Know more about [Razorpay Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md).
>   

`line_items` _mandatory_
: `array` This will have the details about the specific items added to the cart.

  `sku` _mandatory_
  : `string` Unique product id defined by you. It can be alphanumeric.

  `variant_id` _mandatory_
  : `string` Unique variant id defined by you. It can be alphanumeric.

  `price` _mandatory_
  : `integer` Price of the product in paise.

  `offer_price` _mandatory_
  : `integer` Final price charged to the customer in paise, after applying any adjustments, such as product discounts.

    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     If no discount is applied, `price` and `offer_price` will be the same.
>     

  `quantity` _mandatory_
  : `integer` Number of units added in the cart.

  `name` _mandatory_
  : `string` Name of the product.

  `description` _mandatory_
  : `string` Description of the product.

  `weight` _optional_
  : `integer` Weight of the product in grams.

  `dimensions` _optional_
  : `object` The dimensions of the product.

    `length` _optional_
    : `string` The length of the product in centimeters.

    `width` _optional_
    : `string` The width of the product in centimeters.

    `height` _optional_
    : `string` The height of the product in centimeters.

  `image_url` _mandatory_
  : `string` The URL of the product image. This parameter is mandatory if you want to display product images on our iframe.

  `product_url` _optional_
  : `string` URL of the product's listing page.

  `notes` _optional_
  : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.
        

    
### Response Parameters

`id`
: `string` The unique identifier of the order.

`amount` 
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is 299, then pass `29900` in this field. 

`partial_payment`
: `boolean` Indicates whether the customer can make a partial payment. Possible values:
  - `true`: The customer can make partial payments.
  - `false` (default): The customer cannot make partial payments.

`amount_paid`
: `integer` The amount paid against the order.

`amount_due`
: `integer` The amount pending against the order.

`currency` 
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters. 

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`status`
: `string` The status of the order. Possible values:
  - `created`: When you create an order it is in the `created` state. It stays in this state till a payment is attempted on it.
  - `attempted`: An order moves from `created` to `attempted` state when a payment is first attempted on it. It remains in the `attempted` state till one payment associated with that order is captured.
  - `paid`: After the successful capture of the payment, the order moves to the `paid` state. No further payment requests are permitted once the order moves to the `paid` state. The order stays in the `paid` state even if the payment associated with the order is refunded.

`attempts`
: `integer` The number of payment attempts, successful and failed, that have been made against this order.

`notes`
: `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty"`.

`created_at`
: `integer` Indicates the Unix timestamp when this order was created.

`line_items_total`
: `integer` Total of `offer_price` for all line items added to the cart, in paise.
        

    
### Error Response Parameters

        The error response parameters are available in the [API Reference Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
        

    
### Pre-discount Handling

        Line items total should equal the sum of individual item prices after your discounts are applied. When applying discounts, reduce both `amount` and `line_items_total` by the same amount:
        ```json: Example
        {
          "amount": 45000,           // ₹500 - ₹50 discount = ₹450
          "line_items_total": 45000, // Must match the discounted amount
          "currency": "INR",
          "receipt": "receipt#1",
          "notes": {
            "prediscount_applied": "5000"  // Track discount in paise
          },
          "line_items": [
            // ... your line items with original prices
          ]
        }
        ```
        
        
> **INFO**
>
> 
>         **Handy Tips**
>         
>         Magic Checkout automatically handles all discount calculations on the UI. The system detects differences in checkout amounts and adjusts accordingly.
>         

        

    
  
  
### 1.6 Interact with Shipping Info API

     This API should return shipping serviceability, COD serviceability, shipping fees and COD fees for a given list of customer addresses.

     /your-server-url/shipping-info-api-path

     ```curl: Request
     {
        "order_id": "SomeReceiptValue", // This is the receipt field set in the Razorpay order
        "razorpay_order_id": "EKwxwAgItmmXdp", // This is the RZP order created without the `order_` prefix
        "email": "", // Email field will be set if the customer enters an email
        "contact": "+919900000000", // Customer phone number with country code
        "addresses": [{
          "id": "0", 
          "zipcode": "560060",
          "state_code": "KA",
          "country": "IN"
        }]
     }

     ```json: Response
     {
       "addresses": [
         {
           "id": "0",
           "zipcode": "560000",
           "state_code": "KA",
           "country": "IN",
           "shipping_methods": [
             {
               "id": "1",
               "description": "Free shipping",
               "name": "Delivery within 5 days",
               "serviceable": true,
               "shipping_fee": 1000, // in paise. Here 1000 = 1000 paise, which equals to ₹10
               "cod": true,
               "cod_fee": 1000 // in paise. Here 1000 = 1000 paise, which equals to ₹10
             },
             {
               "id": "2",
               "description": "Standard Delivery",
               "name": "Delivered on the same day",
               "serviceable": true,
               "shipping_fee": 1000, // in paise. Here 1000 = 1000 paise, which equals to ₹10
               "cod": false,
               "cod_fee": 0 // in paise. Here 1000 = 1000 paise, which equals to ₹10
             }
           ]
         }
       ]
     }
     ```
     
      
        Request Parameters
        
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#15-create-an-order).

`razorpay_order_id` _mandatory_
: `string` Unique identifier for the order returned by Checkout.

`email` _optional_
: `string` Customer's email address.

`contact` _mandatory_
: `string` Customer's phone number.

`addresses` _mandatory_
: `array` Customer's address details.

  `id` _mandatory_
  : `string` Unique identifier of the customer's address.

  `zipcode` _mandatory_
  : `string` Customer's ZIP code.

  `state_code` _optional_
  : `string` The code of the state where the customer resides.

  `country` _mandatory_
  : `string` Country where the customer resides. The length cannot exceed 2 characters.
        

      
### Response Parameters

`addresses` _mandatory_
: `array` Customer's address details.

  `id` _mandatory_
  : `string` Unique identifier of the customer's address.

  `zipcode` _mandatory_
  : `string` Customer's ZIP code.

  `country` _mandatory_
  : `string` Country where the customer resides. The length cannot exceed 2 characters.

  `shipping_methods` _mandatory_
  : `array` Details regarding the shipping methods.

    `id` _mandatory_
    : `string` Unique identifier of the shipping method.

    `description`
    : `integer` Brief description of the shipping method.

    `name` _mandatory_
    : `string` Name of the shipping method.

    `serviceable` _mandatory_
    : `boolean` Indicates whether you deliver orders to the  zipcode entered by the customer. This is based on the ZIP codes you have added in the serviceability setting on the Razorpay Dashboard. Possible values:
        - `true`: Orders can be delivered to the added ZIP codes.
        - `false`: Orders cannot be delivered to the added ZIP codes.

    `shipping_fee` _mandatory_
    : `integer` Shipping charge in paise applicable to be paid by the customer.

    `cod` _mandatory_
    : `boolean` Indicates whether you support cash on delivery on this order.
        - `true`: COD payment method is supported.
        - `false`: COD payment method is not supported.

    `cod_fee` _mandatory_ : `integer` Cash on Delivery fee charged in paise. This amount is based on the COD settings configured in your Razorpay Dashboard.

    
> **INFO**
>
> 
>     **Handy Tips**
>     
>     If the `cod` field is false, set the `cod_fee` field to 0.
>     

        

     
    
  
  
### 1.7 Interact with Get Promotions API

     This API should return the list of promotions applicable for the given `order_id` and customer.

     /your-server-url/create-promotions-api-path

     ```curl: Request
     {
       "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
       "contact": "+919000090000", 
       "email": ""
     }'
     ```json: Response
     {
        "promotions": [
          {
            "code": "10%OFF",
            "summary": "10% off on total cart value",
            "description": "10% on total cart value upto ₹300"
          },
          {
            "code": "500OFF",
            "summary": "₹500 off on total cart value",
            "description": "₹500 off on a minimum cart value of ₹1500"
          }
        ]
      }
     ```
     
      
        Request Parameters
        
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#15-create-an-order).

`contact` _optional_
: `string` Customer's phone number.

`email` _optional_
: `string` Customer's email address.
        

      
### Response Parameters

`promotions` _mandatory_
: `array` Details of the promotions created.

  `code` _mandatory_
  : `string` Unique identifier of the promotion.

  `summary` _mandatory_
  : `string` Summary about the promotion. For example, 10% off on total cart value.

  `description` _optional_
  : `string` Brief description of the promotion. For example, 10% on total cart value upto ₹300.
        

      
### 1.7.1 Interact with Apply Promotions API

         This API should validate the promotion code applied by the customer and return the discount amount.

         /your-server-url/create-promotions-api-path

         ```curl: Request
         {
           "order_id": "SomeReceiptValue", // this is the receipt field set in Razorpay order
           "contact": "+919000090000",
           "email": "",
           "code": "500OFF"
           }'

         ```json: Success Response
         {
           "promotion": {
           "reference_id": "3rvff", 
           "type": "offer",
           "code": "500OFF", 
           "value": 50000, 
           "value_type": "fixed_amount", 
           "description": "New Year Sale Offer"
           } 
         }
         ```json: Failure Response
         {
          "failure_code": "LOGIN_REQUIRED",
          "failure_reason": “promotion Code has expired" 
         }
         ```

         
           
             Request Parameters
             
`order_id` _mandatory_
: `string` Unique identifier of the order created [previously](#15-create-an-order).

`contact` _optional_
: `string` Customer's phone number.

`email` _optional_
: `string` Customer's email address.

`code` _mandatory_
: `string` Promotion code used to avail discount on checkout.
             

           
### Response Parameters

`promotion` _mandatory_
: `object` Used to pass all offer or discount-related information, including promotion code discount, method discount and so on.

  `reference_id` _mandatory_
  : `string` Identifier of the offer you create. 

  `code` _optional_
  : `string` Promotion code used to avail discount on checkout.

  `type` _optional_
  : `string` Type of offer. Possible values: 
    - `coupon`: A discount applied by customers during checkout. For example, customers can use a coupon like `Diwali Sale 500 Off` to get ₹500 off the total cart value.
    - `offer`: A promotion you create for your customers. For example, you create an offer `Buy 4 t-shirts and get 2 free`. In this case, when customers add 4 t-shirts to their cart, the 2 additional t-shirts will be automatically added for free.

  `value` _optional_
  : `integer` The offer value that needs to be applied in paise. For example, if you want to offer a discount of ₹500, enter 50000.

  `value_type` _optional_
  : `string` The type of value like:
    - `fixed_amount`: A fixed amount discount value in the currency of the order. For example, ₹500.
    - `percentage`: A percentage discount value. For example, 10%.
    - `BXGY`: Buy X and Get Y. For example, if you buy 2 t-shirts, you a get a cap for free or at a discounted value.

     
> **INFO**
>
> 
>      **Handy Tips**
>      
>      Regardless of the `value_type`, the amount specified in the `value` parameter is applied as-is. For example, if `value_type` is percentage and the `value` is 5000, 5000 is considered in currency subunits (paise).
>      

     
  `description` _optional_
  : `string` Description of the promotion applied. For example, `New Year Sale Offer`.
             

           
### Error Code, Description and Next Steps

              
              Code | Description | Next Steps
              ---
              INVALID_PROMOTION | The specified promotion code is not recognised or does not exist in the system. | Please verify the code and try again.
              ---
              LOGIN_REQUIRED | 	This coupon is specifically assigned to a registered customer. | To redeem it, the customer must log in to their account and authenticate their identity.
              ---
              REQUIREMENT_NOT_MET | The current cart conditions do not meet the requirements for this promotion to be valid. For example, the promotion may require a minimum cart value of ₹1,000, but the cart total is ₹800. | Review the promotion's terms and adjust the cart contents accordingly.
              
             

         
        
      
     
    
  

  
### 1.8 Initiate Payment and Display Checkout Form

     Create an instance of the `Checkout` and pass the payment details and options as a `JSONObject`. Ensure that you add the `order_id` generated in [Step 5](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/android-integration.md#15-create-an-order).

     ```java: Java
     public void startPayment() {
     checkout.setKeyID("");
     /**
      * Instantiate Checkout
      */
     Checkout checkout = new Checkout();

     /**
      * Set your logo here
      */
     checkout.setImage(R.drawable.logo);

     /**
      * Reference to current activity
      */
     final Activity activity = this;

     /**
      * Pass your payment options to the Razorpay Checkout as a JSONObject
      */
     try {
         JSONObject options = new JSONObject();

         options.put("name", "");
         options.put("description", "Reference No. #123456");
         options.put("image", "http://example.com/image/rzp.jpg");
         options.put("order_id", "order_DBJOWzybf0sJbb");//from response of step 3.
         options.put("theme.color", "#3399cc");
         options.put("currency", "");
         options.put("amount", "50000");//pass amount in currency subunits
         options.put("prefill.email", "");
         options.put("prefill.contact","");
         c
         JSONObject retryObj = new JSONObject();
         retryObj.put("enabled", true);
         retryObj.put("max_count", 4);
         options.put("retry", retryObj);

         checkout.open(activity, options);

     } catch(Exception e) {
         Log.e(TAG, "Error in starting Razorpay Checkout", e);
     }
     }
     ```java: Kotlin
     private fun startPayment() {
             /*
             *  You need to pass the current activity to let Razorpay create CheckoutActivity
             * */
             val activity:Activity = this
             val co = Checkout()

             try {
                 val options = JSONObject()
                 options.put("name","Razorpay Corp")
                 options.put("description","Demoing Charges")
                 //You can omit the image option to fetch the image from the Dashboard
                 options.put("image","http://example.com/image/rzp.jpg")
                 options.put("theme.color", "#3399cc");
                 options.put("currency","");
                 options.put("order_id", "order_DBJOWzybfXXXX");
                 options.put("amount","50000")//pass amount in currency subunits

                 val retryObj = new JSONObject();
                 retryObj.put("enabled", true);
                 retryObj.put("max_count", 4);
                 options.put("retry", retryObj);

                 val prefill = JSONObject()
                 prefill.put("email","")
                 prefill.put("contact","9876543210")
                 options.put("one_click_checkout",true) // magic checkout
                 options.put("show_coupons", true) // magic checkout

                 options.put("prefill",prefill)
                 co.open(activity,options)
             }catch (e: Exception){
                 Toast.makeText(activity,"Error in payment: "+ e.message,Toast.LENGTH_LONG).show()
                 e.printStackTrace()
             }
         }
     ```
     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      When you paste the checkout options given above, the following error message appears: '`TAG` has private access in `androidx.fragment.app.FragmentActivity`'. You can resolve this by adding the following code:
> 
>      ```java: Resolve TAG has private access
>      public class MainActivity extends AppCompatActivity implements PaymentResultListener {
>      private static final String TAG = MainActivity.class.getSimpleName();
>      ```
>      

     `Checkout.open()` launches the Checkout form where the customer completes the payment and returns the payment result via appropriate callbacks on the `PaymentResultListener`.

     **Payment Options in JSONObject**:
     All available options in the `Standard Web Checkout` are also available in Android.

     
        
            Checkout Options
            
             `key` _mandatory_
: `string` API key id generated from the Dashboard.

`amount` _mandatory_
: `integer` The amount to be paid by the customer in currency subunits. For example, if the amount is , enter `50000`.

`currency` _mandatory_
: `string` The currency in which the payment should be made by the customer. Length must be of 3 characters.

`name` _mandatory_
: `string` Your Business/Enterprise name shown on the Checkout form. For example, **Acme Corp**.

`description` _optional_
: `string` Description of the purchase item shown on the Checkout form. It should start with an alphanumeric character.

`image` _optional_
: `string` Link to an image (usually your business logo) shown on the Checkout form. Can also be a **base64** string if you are not loading the image from a network.

`order_id` _mandatory_
: `string` Order id generated via [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`prefill`
: `object` You can prefill the following details at Checkout.

   
> **INFO**
>
> 
>    **Boost Conversions and Minimise Drop-offs**
> 
>    - Autofill customer contact details, especially phone number to ease form completion. Include customer’s phone number in the `contact` parameter of the JSON request's `prefill` object. Format: +(country code)(phone number). Example: "contact": "+919000090000".   
>    - This is not applicable if you do not collect customer contact details on your website before checkout, have Shopify stores or use any of the no-code apps.
> 
>    

   `name` _optional_
   : `string` Cardholder's name to be prefilled if customer is to make card payments on Checkout. For example, **Gaurav Kumar**.

   `email` _optional_
   : `string` Email address of the customer.

   `contact` _optional_
   : `string` Phone number of the customer. The expected format of the phone number is `+ {country code}{phone number}`. If the country code is not specified, `91` will be used as the default value. This is particularly important while prefilling `contact` of customers with phone numbers issued outside India. **Examples**:
       - +14155552671 (a valid non-Indian number)
       - +919977665544 (a valid Indian number). 
If 9977665544 is entered, `+91` is added to it as +919977665544.

   `method` _optional_
   : `string` Pre-selection of the payment method for the customer. Will only work if `contact` and `email` are also prefilled. Possible values:
       
       - `card`

       - `netbanking`

       - `wallet`

       - `upi`

       - `cod`

       

`notes` _optional_
: `object` Set of key-value pairs that can be used to store additional information about the payment. It can hold a maximum of 15 key-value pairs, each 256 characters long (maximum).

`show_coupons` _optional_
: `boolean` Determines whether to show the coupons to customer on the checkout. Possible values:
  - `true` (default): Enables the Coupon feature.
  - `false`: Disables the Coupon feature.

`theme`
: `object` Thematic options to modify the appearance of Checkout.

   `color` _optional_
   : `string` Enter your brand colour's HEX code to alter the text, payment method icons and CTA (call-to-action) button colour of the Checkout form.

   `backdrop_color` _optional_
   : `string` Enter a HEX code to change the Checkout's backdrop colour.

`modal`
: `object` Options to handle the Checkout modal.

   `backdropclose` _optional_
   : `boolean` Indicates whether clicking the translucent blank space outside the Checkout form should close the form. Possible values:
       - `true`: Closes the form when your customer clicks outside the checkout form.
       - `false` (default): Does not close the form when customer clicks outside the checkout form.

   `escape` _optional_
   : `boolean` Indicates whether pressing the **escape** key should close the Checkout form. Possible values:
       - `true` (default): Closes the form when the customer presses the **escape** key.
       - `false`: Does not close the form when the customer presses the **escape** key.

   `handleback` _optional_
   : `boolean` Determines whether Checkout must behave similar to the browser when back button is pressed. Possible values:
       - `true` (default): Checkout behaves similarly to the browser. That is, when the browser's back button is pressed, the Checkout also simulates a back press. This happens as long as the Checkout modal is open.
       - `false`: Checkout does not simulate a back press when browser's back button is pressed.

   `confirm_close` _optional_
   : `boolean` Determines whether a confirmation dialog box should be shown if customers attempts to close Checkout. Possible values:
       - `true`: Confirmation dialog box is shown.
       - `false` (default): Confirmation dialog box is not shown.
  
   `ondismiss` _optional_
   : `function` Used to track the status of Checkout. You can pass a modal object with `ondismiss: function()\{\}` as options. This function is called when the modal is closed by the user. If `retry` is `false`, the `ondismiss` function is triggered when checkout closes, even after a failure.

   `animation` _optional_
   : `boolean` Shows an animation before loading of Checkout. Possible values:
       - `true`(default): Animation appears.
       - `false`: Animation does not appear.

`callback_url` _optional_
: `string` Customers will be redirected to this URL on successful payment. Ensure that the domain of the Callback URL is allowlisted.

`redirect` _optional_
: `boolean` Determines whether to post a response to the event handler post payment completion or redirect to Callback URL. `callback_url` must be passed while using this parameter. Possible values:
   - `true`: Customer is redirected to the specified callback URL in case of payment failure.
   - `false` (default): Customer is shown the Checkout popup to retry the payment with the suggested next best option.

`customer_id` _optional_
: `string` Unique identifier of customer. Used for:
   - [Local saved cards feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md#manage-saved-cards).
   - Static bank account details on Checkout in case of [Bank Transfer payment method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md).

`remember_customer` _optional_
: `boolean` Determines whether to allow saving of cards. Can also be configured via the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/checkout-features.md#flash-checkout). Possible values:
   - `true`: Enables card saving feature.
   - `false` (default): Disables card saving feature.

`timeout` _optional_
: `integer` Sets a timeout on Checkout, in seconds. After the specified time limit, the customer will not be able to use Checkout.

    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     Some browsers may pause `JavaScript` timers when the user switches tabs, especially in power saver mode. This can cause the checkout session to stay active beyond the set timeout duration.
>     

`readonly`
: `object` Marks fields as read-only.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as read-only. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as read-only. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.
      
   `name` _optional_
   : `boolean` Used to set the `name` field as read-only. Possible values:
       - `true`: Customer will not be able to edit this field.
       - `false` (default): Customer will be able to edit this field.

`hidden`
: `object` Hides the contact details.

   `contact` _optional_
   : `boolean` Used to set the `contact` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

   `email` _optional_
   : `boolean` Used to set the `email` field as optional. Possible values:
       - `true`: Customer will not be able to view this field.
       - `false` (default): Customer will be able to view this field.

`send_sms_hash` _optional_
: `boolean` Used to auto-read OTP for cards and netbanking pages. Applicable from Android SDK version 1.5.9 and above. Possible values:
   - `true`: OTP is auto-read.
   - `false` (default): OTP is not auto-read.

`allow_rotation` _optional_
: `boolean` Used to rotate payment page as per screen orientation. Applicable from Android SDK version 1.6.4 and above. Possible values:
   - `true`: Payment page can be rotated.
   - `false` (default): Payment page cannot be rotated.

`retry` _optional_
: `object` Parameters that enable retry of payment on the checkout.

   `enabled`
   : `boolean` Determines whether the customers can retry payments on the checkout. Possible values:
       - `true` (default): Enables customers to retry payments.
       - `false`: Disables customers from retrying the payment.
  
   `max_count`
   : `integer` The number of times the customer can retry the payment. We recommend you to set this to 4. Having a larger number here can cause loops to occur.
       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        Web Integration does not support the `max_count` parameter. It is applicable only in Android and iOS SDKs.
>        

  
`config` _optional_
: `object` Parameters that enable checkout configuration.
  
   `display`
   : `object` Child parameter that enables configuration of checkout display language.

       `language`
       : `string` The language in which checkout should be displayed. Possible values:
           - `en`: English
           - `ben`: Bengali
           - `hi`: Hindi
           - `mar`: Marathi
           - `guj`: Gujarati
           - `tam`: Tamil
           - `tel`: Telugu

             
> **INFO**
>
> 
>              **Handy Tips**
> 
>              If you call the payment start method inside a fragment, ensure that the `fragment`'s parent `activity` implements the `PaymentResultListener` interface.
>              

            

     
    
  

  
### 1.9 Handle Success and Error Events

     You have the option to implement `PaymentResultListener` or `PaymentResultWithDataListener` to receive callbacks for the payment result.

     - `PaymentResultListener` provides only `payment_id` as the payment result.
     - `PaymentResultWithDataListener` provides additional payment data such as email and contact of the customer, along with the `order_id`, `payment_id`, `signature` and more.

     Use the code below to import the function in your `.java` file. This should be added at the beginning of the file.

     ```java: PaymentResultListener
     import com.razorpay.PaymentResultListener
     ```java: PaymentResultWithDataListener
     import com.razorpay.PaymentResultWithDataListener;
     ```

     Given below are the sample codes for implementation:

     ```java: Java - PaymentResultListener
     public class PaymentActivity extends Activity implements PaymentResultListener {
     // ...

     @Override
     public void onPaymentSuccess(String razorpayPaymentID) {
         /**
         * Add your logic here for a successful payment response
         */
     }

     @Override
     public void onPaymentError(int code, String response) {
         /**
         * Add your logic here for a failed payment response
         */
     }
     }
     ```kotlin: Kotlin - PaymentResultListener
     class PaymentActivity: Activity(), PaymentResultListener {
     // ...
         override fun onPaymentError(errorCode: Int, response: String?) {
         /**
         * Add your logic here for a failed payment response
         */
         }

         override fun onPaymentSuccess(razorpayPaymentId: String?) {
         /**
         * Add your logic here for a successful payment response
         */
         }

     ```

     ```java: Java - PaymentResultWithDataListener
     public class PaymentActivity extends Activity implements PaymentResultWithDataListener {
     // ...
     @Override
     public void onPaymentSuccess(String razorpayPaymentID, PaymentData paymentData) {
         /**
         * Add your logic here for a successful payment response
         */
     }
     @Override
     public void onPaymentError(int code, String response) {
         /**
         * Add your logic here for a failed payment response
         */
     }
     }
     ```kotlin: Kotlin - PaymentResultWithDataListener
     class PaymentActivity: Activity(), PaymentResultWithDataListener {
     // ...
         override fun onPaymentError(errorCode: Int, response: String?) {
         /**
         * Add your logic here for a failed payment response
         */
         }
         override fun onPaymentSuccess(razorpayPaymentId: String?, PaymentData: PaymentData) {
         /**
         * Add your logic here for a successful payment response
         */
         }
     ```

     
> **WARN**
>
> 
> 
>      **Watch Out!**
> 
>      - Razorpay's payment process takes place in a new activity. Since there are two activities involved, your activity can get corrupted or destroyed if the device is low on memory. These two methods should not depend on any variables not set through your life cycle hooks.
>      - It is recommended that you test everything by enabling "Don't Keep Activities" in **Developer Options** under **Settings**.
>      

     
        
            Error Codes
            
             The error codes are returned in the `onPaymentError` method:

             
             Error_Code | Description
             ---
             `Checkout.NETWORK_ERROR` | There was a network error, for example, loss of internet connectivity.
             ---
             `Checkout.INVALID_OPTIONS` | An issue with options passed in `checkout.open`.
             ---
             `Checkout.PAYMENT_CANCELED` | The user canceled the payment.
             ---
             `Checkout.TLS_ERROR` | The device does not support TLS v1.1 or TLS v1.2.
             
            

        
### 1.9.1 Erase User Data from SDK

             The SDK stores customer-specific data such as email, contact number, and user-session cookies if the customer wants to make another payment in the same session. You can delete such sensitive information before another customer logs into the app.

             To erase customer data from the app, you can call the following method anywhere in your app.

             ```java: Erase Customer Data
             Checkout.clearUserData(Context)
             ```
            

     
    
  
  
### 1.10 Store Fields in Your Server

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
    

    
   
  
### 1.11 Verify Payment Signature

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
    

    
   
  
### 1.12 Verify Payment Status

      
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
    

        

    
   
  
### 1.13 Perform Post Payment Processing

     Based on the response, you can handle post-payment processing on your end. 

> **WARN**
>
> 
> **Timeout Handling**
> 
> If no API call is made within 45 seconds, our background job will assume there is a network drop off and will proceed to place the order on Shopify automatically.
> 

    
        Fetch an Order
        
         Use the Fetch Orders API to retrieve order details, including customer information, address, shipping method and promotions of a particular order:

          v1/orders/:id 

         ```curl: Curl
         curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]\
         -X GET https://api.razorpay.com/v1/orders/order_R1yDkxyIuKXXXX \
         ```java: Java
         RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
         import com.razorpay.Order;
         import com.razorpay.RazorpayClient;
         import com.razorpay.RazorpayException;
         try {
           Order order = razorpay.Orders.fetch("");
         } catch (RazorpayException e) {
           // Handle Exception
           System.out.println(e.getMessage());
         }
         ```Python: Python
         # do easy_install razorpay or
         #    pip install razorpay

         import razorpay
         razorpay.Client(auth=("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]"))

         order_id = 
         resp = client.order.fetch(order_id)
         ```php: PHP 
         $api = new Api($key_id, $secret);

         $api->order->fetch($orderId);
         ```ruby: Ruby
         require "razorpay"
         Razorpay.setup('key_id', 'key_secret')

         order = Razorpay::Order.fetch('order_R1yDkxyIuKXXXX')
         ```javascript: Node.js
         var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

         instance.orders.fetch(orderId)
         ```go: Go
         import ( razorpay "github.com/razorpay/razorpay-go" )
         client := razorpay.NewClient("", "")

         body, err := client.Order.Fetch("", nil, nil)
         ```
         ```json: Response: COD Orders
         {
           "id": "order_R1yDkxyIuKXXXX",
           "entity": "order",
           "amount": 507000,
           "amount_paid": 0,
           "amount_due": 507000,
           "currency": "INR",
           "receipt": "#30567",
           "offers": [
               "offer_QXwkRH1bOvXXXX",
               "offer_QXwoP07qnHXXXX",
               "offer_QYrcJ29gBCXXXX",
               "offer_QZDsVyMNzDXXXX",
               "offer_QtfwFTZYkGXXXX",
               "offer_Qtg3UsQyZaXXXX"
           ],
           "status": "placed",
           "attempts": 0,
           "notes": {
               "cart_id": "hWN2Am4BGnQrizKE3hzeQaXc?key=2b3cad31",
               "storefront_id": "gid://shopify/Cart/hf5Q?key=14bbbce35b8",
               "shopify_order_id": "6302119854247"
           },
           "created_at": 1756045901,
           "description": null,
           "checkout": null,
           "promotions": [
               {
                   "code": "orderOff",
                   "type": "cart_value",
                   "value": 10000,
                   "description": "order off",
                   "reference_id": "offer_ORnSr9d2eAXXXX"
               }
           ],
           "cod_fee": 5000,
           "shipping_fee": 7000,
           "customer_details": {
               "contact": "+919100000000",
               "email": "gaurav.kumar@example.com",
               "shipping_address": {
                   "city": "Bengaluru",
                   "contact": "+919100000000",
                   "country": "in",
                   "line1": "Houseno:24",
                   "line2": "Andree Road, Bheemanna Garden, Shanti Nagar",
                   "name": "Gaurav Kumar",
                   "state": "KARNATAKA",
                   "tag": "Home",
                   "type": "shipping_address",
                   "zipcode": "560001"
               },
               "billing_address": {
                   "city": "Bengaluru",
                   "contact": "+919100000000",
                   "country": "in",
                   "line1": "Houseno:24",
                   "line2": "Andree Road, Bheemanna Garden, Shanti Nagar",
                   "name": "Gaurav Kumar",
                   "state": "KARNATAKA",
                   "tag": "Home",
                   "type": "shipping_address",
                   "zipcode": "560001"
               }
           },
           "line_items_total": 600000,
           "tax_details": {
               "total_tax": 4128,
               "taxes_included": true
           }
         }
         ```json: Response: Prepaid Orders
         {
           "id": "order_R1yDkxyIuKXXXX",
           "entity": "order",
           "amount": 100700,
           "amount_paid": 100700,
           "amount_due": 0,
           "currency": "INR",
           "receipt": "#30414",
           "offers": [
               "offer_QXwkRH1bOvXXXX",
               "offer_QXwoP07qnHXXXX",
               "offer_QYrcJ29gBCXXXX",
               "offer_QZDsVyMNzDXXXX",
               "offer_QtfwFTZYkGXXXX",
               "offer_Qtg3UsQyZaXXXX"
           ],
           "status": "paid",
           "attempts": 1,
           "notes": {
               "cart_id": "hWN1TcwL?key=1a3a5a7c",
               "storefront_id": "gid://shopify/Cart/hIkey=af7c7800",
               "flits_cart_token": "hWcwL?key=1a3741dc_8740f5_175447",
               "shopify_order_id": "6266036191399"
           },
           "created_at": 1754466155,
           "description": null,
           "checkout": null,
           "promotions": [
               {
               "code": "orderOff",
               "type": "cart_value",
               "value": 10000,
               "description": "order off",
               "reference_id": "offer_ORnSr9d2eAXXXX"
               }
           ],
           "cod_fee": 0,
           "shipping_fee": 700,
           "customer_details": {
               "billing_address": {
               "city": "South West Delhi",
               "contact": "+919000090000",
               "country": "in",
               "id": "Qb3BljuFFoXXXX",
               "line1": "12",
               "line2": "Qutab Garh, Rama Krishna Puram",
               "name": "Gaurav Kumar",
               "state": "Delhi",
               "tag": "Home",
               "type": "billing_address",
               "zipcode": "110057"
               },
               "contact": "+919000090000",
               "email": "gaurav.kumar@example.com",
               "shipping_address": {
               "city": "South West Delhi",
               "contact": "+919000090000",
               "country": "in",
               "id": "Qb3BljuFFoXXXX",
               "line1": "12",
               "line2": "Qutab Garh, Rama Krishna Puram",
               "name": "Gaurav Kumar",
               "state": "Delhi",
               "tag": "Home",
               "type": "shipping_address",
               "zipcode": "110057"
               }
           },
           "line_items_total": 110000,
           "tax_details": {
               "total_tax": 0,
               "taxes_included": true
           }
         }
         ```

         Know more about the [Orders API.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md)

         
> **INFO**
>
> 
>          **Order Status**
> 
>          Check the order status for the following:
> 
>          - Prepaid orders: `paid`. 
>          - COD orders: `placed`.
>          

         
            
                Path Parameter
                
`id` _mandatory_
: `string` Unique identifier of the order to be retrieved.
                

            
### Response Parameters

`id`
: `string` Unique identifier of the order. For example, `order_R1yDkxyIuKXXXX`.

`entity`
: `string` Type of entity. Value is `order`.

`amount`
: `integer` Total order amount in the smallest currency unit (paise). 

`amount_paid`
: `integer` Amount paid towards the order in paise. For prepaid orders, this shows the actual amount paid. For COD orders, this is `0` until payment is collected.

`amount_due`
: `integer` Outstanding amount due in paise. For prepaid orders, this shows any remaining balance. For COD orders, this equals the `amount` field until payment is collected.

`currency`
: `string` The 3-letter ISO currency code. For example, `INR`.

`receipt`
: `string` Receipt identifier for internal reference. For example, `#30567`.

`offers`
: `array` Array of offer IDs applied to the order. 

`status`
: `string` Current status of the order. Possible values:
    - `placed`: Order placed but payment pending (COD orders).
    - `paid`: Order placed and payment completed (prepaid orders).
    - `cancelled`: Order cancelled.
    - `refunded`: Order refunded.

`attempts`
: `integer` Number of payment attempts made for this order. For example, `1`.

`notes`
: `object` Custom notes added to the order containing integration-specific data.

    `cart_id`
    : `string` Shopping cart identifier.

    `storefront_id`
    : `string` Storefront system identifier.

    `shopify_order_id`
    : `string` Shopify order reference.

    `flits_cart_token`
    : `string` Flits integration token (optional).

`created_at`
: `integer` Unix timestamp indicating when the order was created. For example, `1756045901`.

`description`
: `string|null` Order description. Returns `null` if no description is provided.

`checkout`
: `string|null` Checkout identifier. Returns `null` if not applicable.

`promotions`
: `array` Array of promotion objects applied to the order.

    `code`
    : `string` Promotion code used. For example, `orderOff`.

    `type`
    : `string` Type of promotion. For example, `cart_value`.

    `value`
    : `integer` Discount value in paise. For example, `10000` for ₹100.

    `description`
    : `string` Human-readable promotion description.

    `reference_id`
    : `string` Internal reference for the promotion.

`cod_fee`
: `integer` Cash on Delivery charges in paise. For COD orders, this contains the fee amount (for example, `5000` for ₹50). For prepaid orders, this is `0`.

`shipping_fee`
: `integer` Shipping charges in paise. For example, `700` for ₹7.

`customer_details`
: `object` Customer information.

    `contact`
    : `string` Customer's phone number.

    `email`
    : `string` Customer's email address.

    `shipping_address`
    : `object` Complete shipping address information.

        `city`
        : `string` City name.
        
        `contact`
        : `string` Contact number for delivery.
        
        `country`
        : `string` Country code. For example, `in`.
        
        `id`
        : `string` Address identifier (optional).
        
        `line1`
        : `string` Address line 1.
        
        `line2`
        : `string` Address line 2.
        
        `name`
        : `string` Recipient name.
        
        `state`
        : `string` State name.
        
        `tag`
        : `string` Address tag. For example, `Home`.
        
        `type`
        : `string` Address type. Value is `shipping_address`.
        
        `zipcode`
        : `string` Postal code.

    `billing_address`
    : `object` Complete billing address information.

        `city`
        : `string` City name.
        
        `contact`
        : `string` Contact number for billing.
        
        `country`
        : `string` Country code. For example, `in`.
        
        `id`
        : `string` Address identifier (optional).
        
        `line1`
        : `string` Address line 1.
        
        `line2`
        : `string` Address line 2.
        
        `name`
        : `string` Account holder name.
        
        `state`
        : `string` State name.
        
        `tag`
        : `string` Address tag. For example, `Home`.
        
        `type`
        : `string` Address type. Value is `billing_address`.
        
        `zipcode`
        : `string` Postal code.

`line_items_total`
: `integer` Total value of line items in paise before adding shipping fees and COD fees, after applying promotions. For example, `60000` for ₹600.

`tax_details`
: `object` Tax information.

    `total_tax`
    : `integer` Total tax amount in paise. For example, `4128`.

    `taxes_included`
    : `boolean` Indicates whether taxes are included in the item prices. Possible values:
      - `true`: Taxes are included in item prices.
      - `false`: Taxes are separate from item prices.

         
        
    
    
### Fetch a Payment

         Use the Fetch Payments API to retrieve comprehensive payment details, including transaction status, payment method, customer information, settlement details, and the associated order information for a specific payment:

          v1/payments/:id 

         ```curl: Curl
         curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
         -X GET https://api.razorpay.com/v1/payments/pay_R1yFlWQar3XXXX

         ```java: Java
         RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

         String paymentId = "pay_R1yFlWQar3XXXX";

         Payment payment = razorpay.payments.fetch(paymentId);

         ```python: Python
         import razorpay
         client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

         client.payment.fetch(paymentId)

         ```go: Go
         import ( razorpay "github.com/razorpay/razorpay-go" )
         client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

         paymentId := "pay_R1yFlWQar3XXXX"

         body, err := client.Payment.Fetch(paymentId, nil, nil)

         ```php: PHP
         $api = new Api($key_id, $secret);

         $api->payment->fetch($paymentId);

         ```ruby: Ruby
         require "razorpay"
         Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

         paymentId = "pay_R1yFlWQar3XXXX"

         Razorpay::Payment.fetch(paymentId)

         ```javascript: Node.js
         var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

         instance.payments.fetch(paymentId)

         ```csharp: .NET
         RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
         Payment payment = client.Payment.Fetch(paymentId);
         ```

         ```json: Response: COD Orders
         {
           "id": "pay_R1yFlWQar3XXXX",
           "entity": "payment",
           "amount": 55700,
           "currency": "INR",
           "status": "pending",
           "order_id": "order_R1yDkxyIuKXXXX",
           "invoice_id": null,
           "international": false,
           "method": "cod",
           "amount_refunded": 0,
           "refund_status": null,
           "captured": false,
           "description": null,
           "card_id": null,
           "bank": null,
           "wallet": null,
           "vpa": null,
           "email": "gaurav.kumar@example.com",
           "contact": "+919100000000",
           "notes": {
             "cart_id": "hWN2QaXc?key=2b3cad31",
             "storefront_id": "gid://shopify/Cart/h?key=14bbf59ce35b8"
           },
           "fee": null,
           "tax": null,
           "error_code": null,
           "error_description": null,
           "error_source": null,
           "error_step": null,
           "error_reason": null,
           "acquirer_data": {},
           "created_at": 1756046099,
           "receiver_type": null
         }
         ```json: Response: Prepaid Orders
         {
           "id": "pay_R1yFlWQar3XXXX",
           "entity": "payment",
           "amount": 90630,
           "currency": "INR",
           "status": "captured",
           "order_id": "order_R1yDkxyIuKXXXX",
           "invoice_id": null,
           "international": false,
           "method": "upi",
           "amount_refunded": 0,
           "refund_status": null,
           "captured": true,
           "description": null,
           "card_id": null,
           "bank": null,
           "wallet": null,
           "vpa": "gaurav.kumar@exampleupi",
           "email": "gaurav.kumar@example.com",
           "contact": "+919000090000",
           "notes": {
             "cart_id": "hWNsVrcwL?key=1a3a457ddc",
             "storefront_id": "gid://shopify/Cart/hWv3e8?key=af707",
             "flits_cart_token": "hWrcwL?key=1a3a5a70f5_17547",
             "optimizer_provider_name": "razorpay"
           },
           "fee": 0,
           "tax": 0,
           "error_code": null,
           "error_description": null,
           "error_source": null,
           "error_step": null,
           "error_reason": null,
           "acquirer_data": {
             "rrn": "727947422583",
             "upi_transaction_id": "1F723677C679EF578A95"
           },
           "created_at": 1754466271,
           "receiver_type": null,
           "upi": {
             "vpa": "gaurav.kumar@exampleupi"
           }
         }
         ```

         Know more about the [Payments API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md).
         
            
                Path Parameter
                
`id` _mandatory_
: `string` Unique identifier of the payment to be retrieved.
                

            
### Response Parameters

`id`
: `string` Unique identifier of the payment. For example, `pay_R1yFlWQar3XXXX`.

`entity`
: `string` Type of entity. Value is `payment`.

`amount`
: `integer` Payment amount in the smallest currency unit (paise). For COD payments, this includes the COD fee (for example, `55700` for ₹557). For prepaid payments, this equals the captured amount (for example, `90630` for ₹906.30).

`currency`
: `string` The 3-letter ISO currency code. For example, `INR`.

`status`
: `string` Current status of the payment. Possible values:
  - `pending`: Payment pending collection (COD orders).
  - `captured`: Payment successfully captured (prepaid orders).
  - `authorized`: Payment authorized but not captured.
  - `failed`: Payment attempt failed.

`order_id`
: `string` Unique identifier of the associated order. For example, `order_R1yDkxyIuKXXXX`.

`invoice_id`
: `string|null` Unique identifier of the associated invoice. Returns `null` if no invoice is linked.

`international`
: `boolean` Indicates whether this is an international payment. Possible values:
  - `true`: International payment.
  - `false`: Domestic payment.

`method`
: `string` Payment method used. Possible values include:
  - `cod`
  - `upi`
  - `card`
  - `netbanking`
  - `wallet`

`amount_refunded`
: `integer` Amount refunded in paise. For example, `0` indicates no refund has been processed.

`refund_status`
: `string|null` Current refund status. Returns `null` if no refund is applicable. Possible values:
  - `partial`: Partial refund processed.
  - `full`: Full refund processed.

`captured`
: `boolean` Indicates whether the payment has been captured. Possible values:
  - `true`: Payment has been captured.
  - `false`: Payment has not been captured.

`description`
: `string|null` Payment description. Returns `null` if no description is provided.

`card_id`
: `string|null` Unique identifier of the card used for payment. Returns `null` for non-card payments.

`bank`
: `string|null` Bank identifier for netbanking payments. Returns `null` for other payment methods.

`wallet`
: `string|null` Wallet provider identifier. Returns `null` for non-wallet payments.

`vpa`
: `string|null` Virtual Payment Address for UPI payments. For example, `gaurav.kumar@exampleupi`. Returns `null` for non-UPI payments.

`email`
: `string` Customer's email address.

`contact`
: `string` Customer's phone number.

`notes`
: `object` Custom notes added to the payment containing integration-specific data.

  `cart_id`
  : `string` Shopping cart identifier.
  
  `storefront_id`
  : `string` Storefront system identifier.
  
  `flits_cart_token`
  : `string` Flits integration token (optional).
  
  `optimizer_provider_name`
  : `string` Payment optimizer provider name (optional).

`fee`
: `integer|null` Processing fee charged in paise. For example, `0` indicates no fee. Returns `null` for COD payments.

`tax`
: `integer|null` Tax amount on processing fee in paise. For example, `0` indicates no tax. Returns `null` for COD payments.

`error_code`
: `string|null` Error code if payment failed. Returns `null` for successful payments.

`error_description`
: `string|null` Human-readable error description. Returns `null` for successful payments.

`error_source`
: `string|null` Source of the error. Returns `null` for successful payments.

`error_step`
: `string|null` Step at which error occurred. Returns `null` for successful payments.

`error_reason`
: `string|null` Reason for the error. Returns `null` for successful payments.

`acquirer_data`
: `object` Data from the payment acquirer.

  `rrn`
  : `string` Retrieval Reference Number from the acquirer (optional).
  
  `upi_transaction_id`
  : `string` UPI transaction identifier from the acquirer (optional).

`created_at`
: `integer` Unix timestamp indicating when the payment was created. For example, `1756046099`.

`receiver_type`
: `string|null` Type of receiver for the payment. Returns `null` if not applicable.

`upi`
: `object` UPI-specific payment details (only present for UPI payments).

  `vpa`
  : `string` Virtual Payment Address used for the UPI payment.
                

         
        
    

    
  
 

## 2. Test Integration

After the integration is complete, a **Pay** button appears on your webpage/app. 

Click the button and make a test transaction to ensure the integration is working as expected. You can start accepting actual payments from your customers once the test transaction is successful.

You can make test payments using one of the payment methods configured at the Checkout.

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

    
### Supported Payment Methods

        Following are all the payment modes that the customer can use to complete the payment on the Checkout. Some of them are available by default, while others may require approval from us. Raise a request from the Dashboard to enable such payment methods.

        
        Payment Method | Code | Availability
        ---
        [Cash on Delivery](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cod.md)  | `cod` | Requires [Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cod.md#prerequisites).
        ---
        [Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `debit` | ✓
        ---
        [Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md) | `credit` | ✓
        ---
        [Netbanking](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md) | `netbanking`| ✓
        ---
        [UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md) | `upi` | ✓
        ---
        EMI - [Credit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/credit-card-emi.md), [Debit Card EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md) and [No Cost EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/no-cost-emi.md) | `emi` | ✓
        ---
        [Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md) | `wallet` | ✓
        ---
        [Cardless EMI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md) | `cardless_emi` | Requires [Approval](https://razorpay.com/support).
        ---
        [Bank Transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md) | `bank_transfer` | Requires [Approval](https://razorpay.com/support) and Integration.
        ---
        [Pay Later](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md)| `paylater` | Requires [Approval](https://razorpay.com/support).
        

        ### Netbanking

        You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

        Check the list of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/netbanking.md#supported-banks).

        ### UPI

        You can enter one of the following UPI IDs:

        - `success@razorpay`: To make the payment successful. 
        - `failure@razorpay`: To fail the payment.

        Check the following lists: 
            - [Supported UPI Flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).
            - [UPI Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/upi.md).

        
> **INFO**
>
> 
> 
>         **Handy Tips**
> 
>         You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
>         

        ### Cards

        You can use the following test cards to test transactions for your integration in Test Mode.

        #### Domestic Cards

        Use the following test cards for Indian payments:

         
         Network | Card Number | CVV & Expiry Date
         ---
         Visa  | 4100 2800 0000 1007 | Use a random CVV and any future date ^^^^^
         ---
         Mastercard | 5500 6700 0000 1002 | 
         ---
         RuPay | 6527 6589 0000 1005 | 
         ---
         Diners | 3608 280009 1007 | 
         ---
         Amex | 3402 560004 01007 | 
         

        Check the following lists: 
            - [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
            - [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).
            - [Test Error Scenarios](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards).

        #### International Cards

        Use the following test cards to test international payments. Use any valid expiration date in the future in the MM/YY format and any random CVV to create a successful payment.

        
        Card Network | Card Number | CVV & Expiry Date
        ---
        Mastercard | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 | Use a random CVV and any future date ^^
        ---
        Visa | 4012 8888 8888 1881 |
        

        ### Wallet

        You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the wallet login portals.

        Check the list of [supported wallets](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).
        

## 3. Go-live Checklist

Check the go-live checklist for Razorpay Magic Checkout integration. Consider these steps before taking the integration live.

    
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

         After payment is `authorized`, you need to capture it to settle the amount to your bank account as per the settlement schedule. Payments that are not captured are auto-refunded after a fixed time.

> **WARN**
>
> 
> 
> **Watch Out**
> 
> - You should deliver the products or services to your customers only after the payment is captured. Razorpay automatically refunds all the uncaptured payments.
> - You can track the payment status using our [Fetch a Payment API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#fetch-a-payment) or webhooks.
> 

  
    Authorized payments can be automatically captured. You can auto-capture all payments [using global settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md#auto-capture-all-payments) on the Razorpay Dashboard. Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Payment capture settings work only if you have integrated with Orders API on your server side. Know more about the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders/create.md).
>     

  
  
    Each authorized payment can also be captured individually. You can manually capture payments using [Payment Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments). Know more about [capture settings for payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md).
  

        

    
### 3.3 Set Up Webhooks

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

        

## Related Information

[Android Standard Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/android-integration/standard.md)
