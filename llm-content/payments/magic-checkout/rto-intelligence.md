---
title: Razorpay RTO Intelligence
heading: RTO Intelligence
description: Reduce RTOs with the API-based solution to assess RTO risk for your orders and take necessary actions.
---

# RTO Intelligence

With Razorpay Magic Checkout, you can lower RTO (Return To Origin) rates by assessing the likelihood of RTO for incoming orders in real time. Based on the data, you can make decisions during order placement, such as disabling the COD option. Additionally, you can use post-order data to determine whether to ship the order or take further action.

> **INFO**
>
> 
> **Handy Tips**
> 
> This is an on-demand feature. Write to us at [magic-checkout-support@razorpay.com](mailto:magic-checkout-support@razorpay.com) to get this feature enabled on your account.
> 

## Use Cases

Here are some examples of how you can leverage RTO Intelligence.

- **Custom Checkout Experience** 

Businesses with custom-built stores and a dedicated checkout experience can greatly benefit from Magic Checkout. They can opt for RTO intelligence as it is a separate offering, allowing them to maintain complete control of the checkout process while effectively addressing their RTO challenges.

- **Website or App** 

Businesses operating exclusively through websites, apps, or both can benefit substantially from RTO Intelligence. Smaller businesses with limited engineering resources can easily use RTO Intelligence, an API-based solution requiring minimal integration.

- **Logistics Partners and Aggregators** 

These partners are essential for order fulfilment, processing a high volume of orders daily, and collecting customer data. While they have access to this data, they may need more expertise to build their own RTO solutions. This is where RTO Intelligence can help them enhance their capabilities.

## Prerequisites

- Create a [Razorpay account](https://dashboard.razorpay.com/signup).
- Generate the [API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from the Dashboard. You can use the **Test Mode** keys for testing and later switch to **Live Mode**, generate the [Live API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#live-mode-api-keys) and replace it with the test keys.

## Integration Steps

Perform the following integration steps:

1. [Create an Order](#step-1-create-an-order).

2. [View RTO/Risk Reasons](#step-2-view-rto-risk-reasons).

3. [Update Fulfilment Details](#step-3-update-fulfilment-details).

### Step 1: Create an Order

You can create an order using the following API and send the additional information required for Magic Checkout.

Pass the `order_id` received in response in the subsequent API calls as the identifier of the order.

/orders

  
    ```curl: Curl
    curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X POST https://api.razorpay.com/v1/orders \
    -H "content-type: application/json" \
    -d '{
      "amount": 50000,
      "currency": "",
      "receipt": "receipt#22",
      "notes": {
          "key1": "value3",
          "key2": "value2"
      },
      "rto_review": true,
      "line_items": [
          {
              "type": "e-commerce",
              "sku": "1g234",
              "variant_id": "12r34",
              "price": "3900",
              "offer_price": "3800",
              "tax_amount": 0,
              "quantity": 1,
              "name": "TEST",
              "description": "TEST",
              "weight": "1700",
              "dimensions": {
                  "length": "1700",
                  "width": "1700",
                  "height": "1700"
              },
              "image_url": "https://unsplash.com/s/photos/new-wallpaper",
              "product_url": "https://unsplash.com/s/photos/new-wallpaper",
              "notes": {}
          }
      ],
      "line_items_total": "1200",
      "shipping_fee": 100,
      "cod_fee": 100,
      "customer_details": {
          "name": "",
          "contact": "+919000090000",
          "email": "",
          "shipping_address": {
              "name": "",
              "line1": "84th floor, Millennium Tower",
              "line2": "2nd main",
              "zipcode": "560000",
              "contact": "+919000090000",
              "city": "Bangalore",
              "state": "Karnataka",
              "country": "IND",
              "tag": "home",
              "landmark": "XYZ Hospital"
          },
          "billing_address": {
              "name": "",
              "line1": "84th floor, Millennium Tower",
              "line2": "2nd main",
              "zipcode": "560000",
              "contact": "+919000090000",
              "city": "Bangalore",
              "state": "Karnataka",
              "country": "IND",
              "tag": "home",
              "landmark": "XYZ Hospital"
          }
      },
      "promotions": [{
          "reference_id": "reference",
          "code": "code",
          "type": "discount",
          "value": 20,
          "value_type": "flat",
          "description": "description"
      }],
      "device_details": {
          "ip": "127.0.0.1",
          "user_agent": "abc"
      }
    }'

    ```java: Java
    RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

    JSONObject paymentRequest = new JSONObject();
    paymentRequest.put("amount", 50000);
    paymentRequest.put("currency", "");
    paymentRequest.put("receipt", "receipt#22");

    JSONObject notes = new JSONObject();
    notes.put("note_key", "value1");
    paymentRequest.put("notes", notes);

    paymentRequest.put("rto_review", true);

    List lines = new ArrayList<>();
    JSONObject lineItems = new JSONObject();
    lineItems.put("type", "e-commerce");
    lineItems.put("sku", "1g234");
    lineItems.put("variant_id", "12r34");
    lineItems.put("price", "3900");
    lineItems.put("offer_price", "3800");
    lineItems.put("tax_amount", "0");
    lineItems.put("quantity", "1");
    lineItems.put("name", "TEST");
    lineItems.put("description", "TEST");
    lineItems.put("weight", "1700");

    JSONObject dimensions = new JSONObject();
    dimensions.put("length", "1700");
    dimensions.put("width", "1700");
    dimensions.put("height", "1700");
    lineItems.put("dimensions", dimensions);

    lineItems.put("image_url", "https://unsplash.com/s/photos/new-wallpaper");
    lineItems.put("product_url", "https://unsplash.com/s/photos/new-wallpaper");

    JSONObject lineItemsNotes = new JSONObject();
    lineItems.put("notes", lineItemsNotes);

    lines.add(lineItems);
    paymentRequest.put("line_items", lines);

    paymentRequest.put("line_items_total", "1200");
    paymentRequest.put("shipping_fee", "100");
    paymentRequest.put("cod_fee", "100");

    JSONObject customerDetails = new JSONObject();
    customerDetails.put("name", "");
    customerDetails.put("email", "");
    customerDetails.put("contact", "+919000090000");

    JSONObject shippingAddress = new JSONObject();
    shippingAddress.put("name", "");
    shippingAddress.put("line1", "84th floor, Millennium Tower");
    shippingAddress.put("line2", "2nd main");
    shippingAddress.put("zipcode", "560000");
    shippingAddress.put("contact", "+919000090000");
    shippingAddress.put("city", "Bangalore");
    shippingAddress.put("state", "Karnataka");
    shippingAddress.put("tag", "home");
    shippingAddress.put("landmark", "XYZ Hospital");

    JSONObject billingAddress = new JSONObject();
    billingAddress.put("name", "");
    billingAddress.put("line1", "84th floor, Millennium Tower");
    billingAddress.put("line2", "2nd main");
    billingAddress.put("zipcode", "560000");
    billingAddress.put("contact", "+919000090000");
    billingAddress.put("city", "Bangalore");
    billingAddress.put("state", "Karnataka");
    billingAddress.put("tag", "home");
    billingAddress.put("landmark", "XYZ Hospital");

    customerDetails.put("shipping_address", shippingAddress);
    customerDetails.put("billing_address", billingAddress);

    paymentRequest.put("customer_details", customerDetails);

    List promotions = new ArrayList<>();

    JSONObject promotionItems = new JSONObject();
    promotionItems.put("reference_id", "reference");
    promotionItems.put("code", "code");
    promotionItems.put("type", "discount");
    promotionItems.put("value", "20");
    promotionItems.put("value_type", "flat");
    promotionItems.put("description", "description");

    promotions.add(promotionItems);
    paymentRequest.put("promotions", promotions);

    JSONObject deviceDetails = new JSONObject();
    deviceDetails.put("ip", "127.0.0.1");
    deviceDetails.put("user_agent", "abc");
    paymentRequest.put("device_details", deviceDetails);

    Order order = instance.orders.create(paymentRequest);

    ```python: Python
    import razorpay
    client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

    client.order.create({
      "amount": 50000,
      "currency": "",
      "receipt": "receipt#22",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "rto_review": true,
      "line_items": [
        {
          "type": "e-commerce",
          "sku": "1g234",
          "variant_id": "12r34",
          "price": "3900",
          "offer_price": "3800",
          "tax_amount": 0,
          "quantity": 1,
          "name": "TEST",
          "description": "TEST",
          "weight": "1700",
          "dimensions": {
            "length": "1700",
            "width": "1700",
            "height": "1700"
          },
          "image_url": "https://unsplash.com/s/photos/new-wallpaper",
          "product_url": "https://unsplash.com/s/photos/new-wallpaper",
          "notes": {}
        }
      ],
      "line_items_total": "1200",
      "shipping_fee": 100,
      "cod_fee": 100,
      "customer_details": {
        "name": "",
        "contact": "+919000090000",
        "email": "",
        "shipping_address": {
          "name": "",
          "line1": "84th floor, Millennium Tower",
          "line2": "2nd main",
          "zipcode": "560000",
          "contact": "+919000090000",
          "city": "Bangalore",
          "state": "Karnataka",
          "country": "IND",
          "tag": "home",
          "landmark": "XYZ Hospital"
        },
        "billing_address": {
          "name": "",
          "line1": "84th floor, Millennium Tower",
          "line2": "2nd main",
          "zipcode": "560000",
          "contact": "+919000090000",
          "city": "Bangalore",
          "state": "Karnataka",
          "country": "IND",
          "tag": "home",
          "landmark": "XYZ Hospital"
        }
      },
      "promotions": [
        {
          "reference_id": "reference",
          "code": "code",
          "type": "discount",
          "value": 20,
          "value_type": "flat",
          "description": "description"
        }
      ],
      "device_details": {
        "ip": "127.0.0.1",
        "user_agent": "abc"
      }
    })

    ```go: Go
    import ( razorpay "github.com/razorpay/razorpay-go" )
    client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

    para_attr := map[string]interface{}{
      "amount":    50000,
      "currency":  "",
      "receipt":   "receipt#22",
      "notes": map[string]interface{}{
        "key1": "value3",
        "key2": "value2",
      },
      "rto_review": true,
      "line_items": []interface{}{
        map[string]interface{}{
          "type":        "e-commerce",
          "sku":         "1g234",
          "variant_id":  "12r34",
          "price":       "3900",
          "offer_price": "3800",
          "tax_amount":  0,
          "quantity":    1,
          "name":        "TEST",
          "description": "TEST",
          "weight":      "1700",
          "dimensions": map[string]interface{}{
            "length": "1700",
            "width":  "1700",
            "height": "1700",
          },
          "image_url":  "https://unsplash.com/s/photos/new-wallpaper",
          "product_url": "https://unsplash.com/s/photos/new-wallpaper",
          "notes": map[string]interface{}{},
        },
      },
      "line_items_total": "1200",
      "shipping_fee":     100,
      "cod_fee":          100,
      "customer_details": map[string]interface{}{
        "name":    "",
        "contact": "+919000090000",
        "email":   "",
        "shipping_address": map[string]interface{}{
          "name":     "",
          "line1":    "84th floor, Millennium Tower",
          "line2":    "2nd main",
          "zipcode":  "560000",
          "contact":  "+919000090000",
          "city":     "Bangalore",
          "state":    "Karnataka",
          "country":  "IND",
          "tag":      "home",
          "landmark": "XYZ Hospital",
        },
        "billing_address": map[string]interface{}{
          "name":     "",
          "line1":    "84th floor, Millennium Tower",
          "line2":    "2nd main",
          "zipcode":  "560000",
          "contact":  "+919000090000",
          "city":     "Bangalore",
          "state":    "Karnataka",
          "country":  "IND",
          "tag":      "home",
          "landmark": "XYZ Hospital",
        },
      },
      "promotions": []interface{}{
        map[string]interface{}{
          "reference_id": "reference",
          "code":         "code",
          "type":         "discount",
          "value":        20,
          "value_type":   "flat",
          "description":  "description",
        },
      },
      "device_details": map[string]interface{}{
        "ip":         "127.0.0.1",
        "user_agent": "abc",
      },
    }

    body, err := client.Order.Create(para_attr, nil)

    ```php: PHP
    $api = new Api($key_id, $secret);

    $api->order->create(array(
      'amount' => 50000,
      'currency' => '',
      'receipt' => 'receipt#22',
      'notes' => array(
          'key1' => 'value3',
          'key2' => 'value2',
      ),
      'rto_review' => true,
      'line_items' => array(
          0 => array(
              'type' => 'e-commerce',
              'sku' => '1g234',
              'variant_id' => '12r34',
              'price' => '3900',
              'offer_price' => '3800',
              'tax_amount' => 0,
              'quantity' => 1,
              'name' => 'TEST',
              'description' => 'TEST',
              'weight' => '1700',
              'dimensions' => array(
                  'length' => '1700',
                  'width' => '1700',
                  'height' => '1700',
              ),
              'image_url' => 'https://unsplash.com/s/photos/new-wallpaper',
              'product_url' => 'https://unsplash.com/s/photos/new-wallpaper',
              'notes' => array(),
          ),
      ),
      'line_items_total' => '1200',
      'shipping_fee' => 100,
      'cod_fee' => 100,
      'customer_details' => array(
          'name' => '',
          'contact' => '+919000090000',
          'email' => '',
          'shipping_address' => array(
              'name' => '',
              'line1' => '84th floor, Millennium Tower',
              'line2' => '2nd main',
              'zipcode' => '560000',
              'contact' => '+919000090000',
              'city' => 'Bangalore',
              'state' => 'Karnataka',
              'country' => 'IND',
              'tag' => 'home',
              'landmark' => 'XYZ Hospital',
          ),
          'billing_address' => array(
              'name' => '',
              'line1' => '84th floor, Millennium Tower',
              'line2' => '2nd main',
              'zipcode' => '560000',
              'contact' => '+919000090000',
              'city' => 'Bangalore',
              'state' => 'Karnataka',
              'country' => 'IND',
              'tag' => 'home',
              'landmark' => 'XYZ Hospital',
          ),
      ),
      'promotions' => array(
          0 => array(
              'reference_id' => 'reference',
              'code' => 'code',
              'type' => 'discount',
              'value' => 20,
              'value_type' => 'flat',
              'description' => 'description',
          ),
      ),
      'device_details' => array(
          'ip' => '127.0.0.1',
          'user_agent' => 'abc',
      ),
    ));

    ```ruby: Ruby
    require "razorpay"
    Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

    para_attr = {
      "amount": 50000,
      "currency": "",
      "receipt": "receipt#22",
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "rto_review": true,
      "line_items": [
        {
          "type": "e-commerce",
          "sku": "1g234",
          "variant_id": "12r34",
          "price": "3900",
          "offer_price": "3800",
          "tax_amount": 0,
          "quantity": 1,
          "name": "TEST",
          "description": "TEST",
          "weight": "1700",
          "dimensions": {
            "length": "1700",
            "width": "1700",
            "height": "1700"
          },
          "image_url": "https://unsplash.com/s/photos/new-wallpaper",
          "product_url": "https://unsplash.com/s/photos/new-wallpaper",
          "notes": {}
        }
      ],
      "line_items_total": "1200",
      "shipping_fee": 100,
      "cod_fee": 100,
      "customer_details": {
        "name": "",
        "contact": "+919000090000",
        "email": "",
        "shipping_address": {
          "name": "",
          "line1": "84th floor, Millennium Tower",
          "line2": "2nd main",
          "zipcode": "560000",
          "contact": "+919000090000",
          "city": "Bangalore",
          "state": "Karnataka",
          "country": "IND",
          "tag": "home",
          "landmark": "XYZ Hospital"
        },
        "billing_address": {
          "name": "",
          "line1": "84th floor, Millennium Tower",
          "line2": "2nd main",
          "zipcode": "560000",
          "contact": "+919000090000",
          "city": "Bangalore",
          "state": "Karnataka",
          "country": "IND",
          "tag": "home",
          "landmark": "XYZ Hospital"
        }
      },
      "promotions": [{
        "reference_id": "reference",
        "code": "code",
        "type": "discount",
        "value": 20,
        "value_type": "flat",
        "description": "description"
      }],
      "device_details": {
        "ip": "127.0.0.1",
        "user_agent": "abc"
      }
    }

    Razorpay::Order.create(para_attr)

    ```javascript: Node.JS
    var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

    instance.orders.create({
      "amount": 50000,
      "currency": "",
      "receipt": "receipt#22",
      "notes": {
          "key1": "value3",
          "key2": "value2"
      },
      "rto_review": true,
      "line_items": [
          {
              "type": "e-commerce",
              "sku": "1g234",
              "variant_id": "12r34",
              "price": "3900",
              "offer_price": "3800",
              "tax_amount": 0,
              "quantity": 1,
              "name": "TEST",
              "description": "TEST",
              "weight": "1700",
              "dimensions": {
                  "length": "1700",
                  "width": "1700",
                  "height": "1700"
              },
              "image_url": "https://unsplash.com/s/photos/new-wallpaper",
              "product_url": "https://unsplash.com/s/photos/new-wallpaper",
              "notes": {}
          }
      ],
      "line_items_total": "1200",
      "shipping_fee": 100,
      "cod_fee": 100,
      "customer_details": {
          "name": "",
          "contact": "+919000090000",
          "email": "",
          "shipping_address": {
              "name": "",
              "line1": "84th floor, Millennium Tower",
              "line2": "2nd main",
              "zipcode": "560000",
              "contact": "+919000090000",
              "city": "Bangalore",
              "state": "Karnataka",
              "country": "IND",
              "tag": "home",
              "landmark": "XYZ Hospital"
          },
          "billing_address": {
              "name": "",
              "line1": "84th floor, Millennium Tower",
              "line2": "2nd main",
              "zipcode": "560000",
              "contact": "+919000090000",
              "city": "Bangalore",
              "state": "Karnataka",
              "country": "IND",
              "tag": "home",
              "landmark": "XYZ Hospital"
          }
      },
      "promotions": [{
          "reference_id": "reference",
          "code": "code",
          "type": "discount",
          "value": 20,
          "value_type": "flat",
          "description": "description"
      }],
      "device_details": {
          "ip": "127.0.0.1",
          "user_agent": "abc"
      }
    });

    ```csharp: .NET
    RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

    Dictionary paymentRequest = new Dictionary();
    paymentRequest.Add("amount", 50000);
    paymentRequest.Add("currency", "");
    paymentRequest.Add("receipt", "receipt#22");

    Dictionary notes = new Dictionary();
    notes.Add("note_key", "value1");
    paymentRequest.Add("notes", notes);

    paymentRequest.Add("rto_review", true);
    List lines = new List();
    Dictionary lineItems = new Dictionary();
    lineItems.Add("type", "e-commerce");
    lineItems.Add("sku", "1g234");
    lineItems.Add("variant_id", "12r34");
    lineItems.Add("price", "3900");
    lineItems.Add("offer_price", "3800");
    lineItems.Add("tax_amount", "0");
    lineItems.Add("quantity", "1");
    lineItems.Add("name", "TEST");
    lineItems.Add("description", "TEST");
    lineItems.Add("weight", "1700");

    Dictionary dimensions = new Dictionary();
    dimensions.Add("length", "1700");
    dimensions.Add("width", "1700");
    dimensions.Add("height", "1700");

    lineItems.Add("image_url", "https://unsplash.com/s/photos/new-wallpaper");
    lineItems.Add("product_url", "https://unsplash.com/s/photos/new-wallpaper");

    Dictionary lineItemsNotes = new Dictionary();
    lineItems.Add("notes", lineItemsNotes);

    lines.Add(lineItems);
    paymentRequest.Add("line_items", lines);

    paymentRequest.Add("line_items_total", "1200");
    paymentRequest.Add("shipping_fee", "100");
    paymentRequest.Add("cod_fee", "100");

    Dictionary customerDetails = new Dictionary();
    customerDetails.Add("name", "");
    customerDetails.Add("email", "");
    customerDetails.Add("contact", "+919000090000");

    Dictionary shippingAddress = new Dictionary();
    shippingAddress.Add("name", "");
    shippingAddress.Add("line1", "84th floor, Millennium Tower");
    shippingAddress.Add("line2", "2nd main");
    shippingAddress.Add("zipcode", "560000");
    shippingAddress.Add("contact", "+919000090000");
    shippingAddress.Add("city", "Bangalore");
    shippingAddress.Add("state", "Karnataka");
    shippingAddress.Add("tag", "home");
    shippingAddress.Add("landmark", "XYZ Hospital");

    Dictionary billingAddress = new Dictionary();
    billingAddress.Add("name", "");
    billingAddress.Add("line1", "84th floor, Millennium Tower");
    billingAddress.Add("line2", "2nd main");
    billingAddress.Add("zipcode", "560000");
    billingAddress.Add("contact", "+919000090000");
    billingAddress.Add("city", "Bangalore");
    billingAddress.Add("state", "Karnataka");
    billingAddress.Add("tag", "home");
    billingAddress.Add("landmark", "XYZ Hospital");

    customerDetails.Add("shipping_address", shippingAddress);
    customerDetails.Add("billing_address", billingAddress);

    paymentRequest.Add("customer_details", customerDetails);

    List promotions = new List();

    Dictionary promotionItems = new Dictionary();
    promotionItems.Add("reference_id", "reference");
    promotionItems.Add("code", "code");
    promotionItems.Add("type", "discount");
    promotionItems.Add("value", "20");
    promotionItems.Add("value_type", "flat");
    promotionItems.Add("description", "description");

    promotions.Add(promotionItems);
    paymentRequest.Add("promotions", promotions);

    Dictionary deviceDetails = new Dictionary();
    deviceDetails.Add("ip", "127.0.0.1");
    deviceDetails.Add("user_agent", "abc");
    paymentRequest.Add("device_details", deviceDetails);

    Order order = client.Order.Create(paymentRequest);
    ```
  
  
    ```json: Success Response
    {
      "amount": 50000,
      "amount_due": 50000,
      "amount_paid": 0,
      "attempts": 0,
      "cod_fee": 100,
      "created_at": 1717661191,
      "currency": "",
      "customer_details": [
        {
          "billing_address": {
            "city": "Bangalore",
            "contact": "+919000090000",
            "country": "IND",
            "landmark": "XYZ Hospital",
            "latitude": null,
            "line1": "84th floor, Millennium Tower",
            "line2": "2nd main",
            "longitude": null,
            "name": "",
            "state": "Karnataka",
            "tag": "home",
            "zipcode": "560000"
          },
          "contact": "+919000090000",
          "email": "",
          "insights": null,
          "name": "",
          "shipping_address": {
            "city": "Bangalore",
            "contact": "+919000090000",
            "country": "IND",
            "landmark": "XYZ Hospital",
            "latitude": null,
            "line1": "84th floor, Millennium Tower",
            "line2": "2nd main",
            "longitude": null,
            "name": "",
            "state": "Karnataka",
            "tag": "home",
            "zipcode": "560000"
          }
        }
      ],
      "entity": "order",
      "id": "order_OJP3jaTBAermFF",
      "line_items_total": 1200,
      "notes": {
        "key1": "value3",
        "key2": "value2"
      },
      "offers": [
        "offer_NouLRGh19nXXXX",
        "offer_M9ImgsqpDJnAAA",
      ],
      "promotions": [],
      "receipt": "receipt#22",
      "shipping_fee": 100,
      "status": "created"
    }
    ```json: Failure Response
    {
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The api key provided is invalid",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
      }
    }
    ```
  

  
### Request Parameters

`amount` _mandatory_
: `integer` The transaction amount expressed in the currency subunit, such as paise (in case of INR). For example, for an actual amount of ₹299.35, the value of this field should be `29935`.

`currency` _mandatory_
: `string` The currency in which the customer makes the transaction. See the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). The default is `INR`, and the length must be 3 characters.

`receipt` _mandatory_
: `string` Your receipt id for this order should be passed here. Maximum length of 40 characters.

`notes` _optional_
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`rto_review` _mandatory_
: `boolean` Identifier to mark the order eligible for RTO risk prediction. Possible values: 
  - `true`: You can get RTO risk prediction using the [orders/rto_review](#step-2-view-rtorisk-reasons) API.
  - `false` (default): You can choose not to get RTO risk prediction for the order.
      
      
> **WARN**
>
> 
>       **Watch Out!**
>       
>       If you choose not to get RTO risk prediction for the order, that is, mark the `rto_review` parameter as false, then the `line_items_total` parameter will be optional.
>       
   

`line_items` _optional_
: `array` This will have the details about the specific items added to the cart. 

    `type` _optional_
    : `string` Defines the category type. Possible values:
        - `mutual_funds`: For mutual funds. 
        - `e-commerce`: For all other businesses.

    `sku`  _optional_
    : `string` Unique alphanumeric product id defined by you.
    
    `variant_id` _optional_
    : `string` Unique alphanumeric variant id defined by you.

    `price` _optional_
    : `integer` Price of the product in paise. 

    `offer_price` _optional_
    : `integer` Price charged to the customer in paise. This is after any adjustment, such as product discount.

    `tax_amount` _optional_
    : `integer` The tax levied on the product.

    `quantity` _optional_
    : `integer` Number of units added in the cart.

    `name` _optional_
    : `string` Name of the product.

    `description` _optional_
    : `string` Description of the product. 

    `weight` _optional_
    : `integer` Weight of the product in grams. 

    `dimensions` _optional_
    : `object` The dimensions of the product.

        `length` _optional_
        : `string`  The length of the product in centimeters.   

        `width` _optional_
        : `string`  The width of the product in centimeters.  

        `height` _optional_
        : `string`  The height of the product in centimeters.  

    `product_url` _optional_
    : `string` URL of the product's listing page.
    
    `image_url` _optional_
    : `string` URL of the product image.

    `notes` _optional_
    : `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`line_items_total` _mandatory_
: `integer` Sum of `offer_price` for all line items added in the cart in paise. For example, if a bag worth ₹8,000 and a shoe worth ₹10,000 are added to the cart, the `line_item_total` will be `180000`. This is post-tax. 

`shipping_fee` _optional_
: `integer` Shipping fee charged on the line items in paise. 

`cod_fee` _optional_
: `integer` COD fee charged on the line items in paise. 

`promotions` _optional_
: `array` Used to pass all offer or discount-related information, including coupon code discount, method discount and so on.

    `reference_id` _mandatory_
    : `string` Id of the Offer. 

    `code` _mandatory_
    : `string` Coupon code used to avail discount.

    `type` _mandatory_
    : `string` Type of Offer. Possible values: 
      - `coupon`
      - `offer`

    `value`  _mandatory_
    : `decimal` The offer value that needs to be applied. In the case of `fixed_amount`, it is a flat discount. For example, ₹500. In the case of `percentage`, it is a percentage value. For example, 10%.

    `value_type` _mandatory_
    : `string` The type of value. Possible values:
      - `fixed_amount`: A fixed amount discount value in the currency of the order. For example, ₹500.
      - `percentage`: A percentage discount value. For example, 10%.

    `description` _optional_
    : `string` Description of the promotion applied. For example, `New Year Sale Offer`.

`customer_details` _optional_
: `object` Details of the customer. 

    `name` _optional_
    : `string` Customer's name. Alphanumeric values with period (.), apostrophe (') and parentheses are allowed. The name must be between 3-50 characters in length. For example, Gaurav Kumar.

    `contact` _optional_
    : `string` The customer's phone number. Maximum length of 15 characters, including the country code. For example, +919000090000.

    `email` _optional_
    : `string` The customer's email address. Maximum length of 64 characters. For example, `gaurav.kumar@example.com`. 

    `shipping_address` _optional_
    : Details of the customer's shipping address.

        `name` _optional_
        : `string` The customer's name.

        `line1` _optional_
        : `string` The first line of the customer's address.

        `line2` _optional_
        : `string` The second line of the customer's address.

        `zipcode` _optional_
        : `string` The customer's ZIP code.

        `contact` _optional_
        : `string` The customer's email address. Maximum length of 64 characters. For example, `gaurav.kumar@example.com`. 

        `city` _optional_
        : `string` The name of the city. For example, `Bengaluru`.

        `state` _optional_
        : `string` The name of the state. For example, `Karnataka`.

        `country` _optional_
        : `string` ISO 3 country code of the shipping address. For example, `IND`.

        `tag` _optional_
        : `string` Address tags are additional short descriptors commonly used for filtering and searching. Maximum length of 40 characters. For example, `Home`, `Office`, and so on.

        `landmark` _optional_
        : `string` Nearest landmark to the delivery address. 

    `billing_address` _mandatory_
    : Details of the customer's billing address.

        `name` _mandatory_
        : `string` The customer's name.

        `line1` _mandatory_
        : `string` The first line of the customer's address.

        `line2` _mandatory_
        : `string` The second line of the customer's address.

        `zipcode` _mandatory_
        : `string` The customer's ZIP code.

        `contact` _mandatory_
        : `string` The customer's email address. Maximum length of 64 characters. For example, `gaurav.kumar@example.com`. 

        `city` _mandatory_
        : `string` The name of the city. For example, `Bengaluru`.

        `state` _mandatory_
        : `string` The name of the state. For example, `Karnataka`.

        `country` _mandatory_
        : `string` ISO 3 country code of the billing address. For example, `IND`.

        `tag` _optional_
        : `string` Address tags are additional short descriptors commonly used for filtering and searching. Maximum length of 40 characters. For example, `Home`, `Office`, and so on.

        `landmark` _optional_
        : `string` Nearest landmark to the delivery address. 

`device_details` _optional_
: `object` Details of the customer. 

    `ip` _optional_
    : `string` Public IP Address of the device used to place the order.

    `user_agent` _optional_
    : `string` The user-agent header of the customer's browser.
    

  
### Response Parameters

`amount` 
: `integer` The amount for which the order was created, in currency subunits. For example, for an amount of ₹295, enter `29500`.

`amount_due` 
: `integer` The amount pending against the order.

`amount_paid` 
: `string` The amount paid by the customer.

`attempts` 
: `integer` The number of payment attempts, successful and failed, that have been made against this order. For example, `1`.

`cod_fee` 
: `integer` COD fee charged on the line items in paise. 

`created_at`
: `string` The Unix timestamp when the order was created.

`currency` 
: `string` A 3 letter ISO code for the currency you want to accept the payment. For example, INR. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

`customer_details` 
: `object` Details of the customer. 

    `contact` 
    : `string` The customer's phone number. Maximum length of 15 characters, including the country code. For example, +919000090000.

    `email` 
    : `string` The customer's email address. Maximum length of 64 characters. For example, `gaurav.kumar@example.com`. 

    `insights`
    : `json object` Additional customer details including past transaction data.

    `name` 
    : `string` Customer's name. Alphanumeric values with period (.), apostrophe (') and parentheses are allowed. The name must be between 3-50 characters in length. For example, Gaurav Kumar.

    `shipping_address` 
    : Details of the customer's shipping address.

        `city` 
        : `string` The name of the city. For example, `Bengaluru`.

        `contact` 
        : `string` The customer's email address. Maximum length of 64 characters. For example, `gaurav.kumar@example.com`. 

        `country` 
        : `string` ISO 3 country code of the shipping address. For example, `IND`.

        `landmark` 
        : `string` Nearest landmark to the delivery address. 

        `latitude`
        : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

        `line1` 
        : `string` The first line of the customer's address.

        `line2` 
        : `string` The second line of the customer's address.

        `longitude`
        : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

        `name` 
        : `string` The customer's name.

        `state` 
        : `string` The name of the state. For example, `Karnataka`.

        `tag` 
        : `string` Address tags are additional short descriptors commonly used for filtering and searching. Maximum length of 40 characters. For example, `Home`, `Office`, and so on.

        `zipcode` 
        : `string` The customer's ZIP code.

    `billing_address` 
    : Details of the customer's billing address.

        `city` 
        : `string` The name of the city. For example, `Bengaluru`.

        `contact` 
        : `string` The customer's email address. Maximum length of 64 characters. For example, `gaurav.kumar@example.com`. 

        `country` 
        : `string` ISO 3 country code of the billing address. For example, `IND`.

        `landmark` 
        : `string` Nearest landmark to the delivery address. 

        `latitude`
        : `float` Latitude of the position expressed in decimal degrees (WSG 84), for example, 6.244203. A positive value denotes the northern hemisphere or the equator, and a negative value denotes the southern hemisphere. The number of digits represents the precision of the coordinate.

        `line1` 
        : `string` The first line of the customer's address.

        `line2` 
        : `string` The second line of the customer's address.

        `longitude`
        : `float` Longitude of the position expressed in decimal degrees (WSG 84), for example, -75.581211. A positive value denotes east longitude or the prime meridian, and a negative value denotes west longitude. The number of digits represents the precision of the coordinate.

        `name` 
        : `string` The customer's name.

        `state` 
        : `string` The name of the state. For example, `Karnataka`.

        `tag` 
        : `string` Address tags are additional short descriptors commonly used for filtering and searching. Maximum length of 40 characters. For example, `Home`, `Office`, and so on.

        `zipcode` 
        : `string` The customer's ZIP code.

`entity` 
: `integer` Indicates the type of entity. Here, it is `order`.

`id`
: `string` The unique identifier of the order.

`line_items_total` 
: `integer` Sum of `offer_price` for all line items added in the cart in paise. For example, if a bag worth ₹8,000 and a shoe worth ₹10,000 are added to the cart, the `line_item_total` will be `180000`. This is post-tax. 

`notes` 
: `object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

`offers`
: `array` Offers enabled on your account.

`promotions` 
: `array` Used to pass all offer or discount-related information, including coupon code discount, method discount and so on.

    `reference_id` 
    : `string` Id of the Offer. 

    `code` 
    : `string` Coupon code used to avail discount.

    `type` 
    : `string` Type of Offer. Possible values: 
      - `coupon`
      - `offer`

    `value`  _mandatory_
    : `decimal` The offer value that is applied. In the case of `fixed_amount`, it is a flat discount. For example, ₹500. In the case of `percentage`, it is a percentage value. For example, 10%.

    `value_type` _mandatory_
    : `string` The type of value. Possible values:
      - `fixed_amount`: A fixed amount discount value in the currency of the order. For example, ₹500.
      - `percentage`: A percentage discount value. For example, 10%.

    `description` 
    : `string` Description of the promotion applied. For example, `New Year Sale Offer`.

`receipt` 
: `string` Receipt number that corresponds to this order. The maximum length of 40 characters and has to be unique.

`shipping_fee` 
: `integer` Shipping fee charged on the line items in paise. 

`status`
: `integer` The status of the order. Possible values:
    - `created`: When you create an order, it is in the created state. It stays in this state till a payment is attempted on it.
    - `attempted`: An order moves from created to attempted state when a payment is first attempted. It remains in this state till the payment associated with the order is captured.
    - `paid`: After successfully capturing the payment, the order moves to the paid state. The order stays in the paid state even if the payment associated with the order is refunded.
    

## Step 2: View RTO/Risk Reasons

You can use the `order_id` obtained in the [previous step](#step-1-create-an-order) to view the RTO risk and reasons why a particular order is risky. This information can be consumed to:
- Disable COD as a payment method for a customer.
- Take necessary action on the order, like calling up the customer post-order placement to verify if they are a genuine customer.

> **WARN**
>
> 
> **Watch Out!**
> 
> In the path parameter, do not include `order_`; add only the id returned. For example, if the order id is `order_EKwxwAgItXXXX`, include only `EKwxwAgItXXXX` in the path parameter.
> 

/orders/:order_id/rto_review

  
    ```curl: Curl
    curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X POST https://api.razorpay.com/v1/orders/EKwxwAgItXXXX/rto_review \
    -H "content-type: application/json" \
    -d 

    ```java: Java
    RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

    String orderId = "order_EKwxwAgItXXXX";

    Order order = instance.orders.viewRtoReview(orderId);

    ```python: Python
    import razorpay
    client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

    orderId = "order_EKwxwAgItXXXX";

    client.order.viewRtoReview(orderId)

    ```go: Go
    import ( razorpay "github.com/razorpay/razorpay-go" )
    client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

    orderId = "order_EKwxwAgItXXXX"

    body, err := client.Order.ViewRtoReview(TestOrderID, nil, nil)

    ```php: PHP
    $api = new Api($key_id, $secret);

    $orderId = "order_EKwxwAgItXXXX";

    $api->order->fetch($orderId)->viewRtoReview();

    ```ruby: Ruby
    require "razorpay"
    Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

    orderId = "order_EKwxwAgItXXXX"

    Razorpay::Order.view_rto(orderId)

    ```javascript: Node.JS
    var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

    var orderId = "order_EKwxwAgItXXXX";

    instance.orders.viewRtoReview(orderId);

    ```csharp: .NET
    RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

    string orderId = "order_EKwxwAgItXXXX";

    Order order = client.Order.Fetch(orderId).ViewRtoReview();
    ```
  
  
    ```json: Success Response
    {
      "risk_tier": "high",
      "rto_reasons": [
        {
          "reason": "short_shipping_address",
          "description": "Short shipping address",
          "bucket": "address"
        },
        {
          "reason": "address_pincode_state_mismatch",
          "description": "Incorrect pincode state entered",
          "bucket": "address"
        }
      ]
    }
    ```json: Failure Response
    {
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The api key provided is invalid",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
      }
    }
    ```
  

  
### Path Parameter

`order_id`  _mandatory_
: `string` The unique identifier of an order to access the `rto_review` information.
    

  
### Response Parameters

`risk_tier` 
: `string` Determines how risky the order is. Possible values:
  - `high`
  - `medium`
  - `low`

`rto_reasons` 
: `array` Top 5 reasons for risky orders in descending order of importance. [Refer to the list of possible reasons](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/magic-checkout/rto-intelligence/appendix.md) for risky orders.

    `reason` 
    : `string` Id of the Offer. 

    `description` 
    : `string` A unique identifier for the RTO reason.

    `bucket` 
    : `string` Categorises the reason into a specific group. For example, both reasons in the code are categorised under the address bucket.
    

  
### Error Response Parameters

     Given below is the list of errors for RTO review.
           
          
              INVALID_ARGUMENT 
              
                - **Error**: input_validation_failed
                - **Description**: The id provided does not exist.
                - **Error Status**: 400
                - **Source**: business
                - **Step**: rto_review
                - **Next Steps**: Try with the id shared back during order creation response (/v1/orders)
              

          
### INVALID_ARGUMENT

                - **Error**: input_validation_failed
                - **Description**: order_id: the length must be exactly 14
                - **Error Status**: 400
                - **Source**: business
                - **Step**: rto_review
                - **Next Steps**: Invalid order_id cannot be mapped back to an existing order. Try with the id shared back during order creation response (v1/orders)
              

          
### INVALID_ARGUMENT

                - **Error**: input_validation_failed
                - **Description**: Mandatory field shipping_address not present
                - **Error Status**: 400
                - **Source**: business
                - **Step**: rto_review
                - **Next Steps**: Shipping address was not shared in order_create API (/v1/orders). Please try creating an order again with all the mandatory details.
              

          
### INTERNAL

                - **Error**: NA
                - **Description**: We are facing some trouble completing your request at the moment. Please try again shortly.
                - **Error Status**: 500
                - **Source**: business
                - **Step**: rto_review
                - **Next Steps**: Please try in a while.
              

      
    
  

### Step 3: Update the Fulfillment Details

Use the code below to update the Fulfilment details of the order and payment method used.

> **WARN**
>
> 
> **Watch Out!**
> 
> You must update the payment method details if you are not a [Razorpay Payment Gateway](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway.md) user.
> 

/orders/:order_id/fulfillment

  
    ```curl: Curl
    curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X POST https://api.razorpay.com/v1/orders/EKwxwAgItXXXX/fulfillment \
    -H "content-type: application/json" \
    -d '{
      "payment_method": "upi",
      "shipping": {
        "waybill": "123456789",
        "status": "rto",
        "provider": "Bluedart"
      }
    }'

    ```java: Java
    RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

    String orderId = "order_EKwxwAgItXXXX";

    JSONObject request = new JSONObject();
    JSONObject shipping = new JSONObject();
    shipping.put("waybill", "123456789");
    shipping.put("status", "rto");
    shipping.put("provider", "Bluedart");

    request.put("payment_method","upi");
    request.put("shipping","shipping");

    Order order = instance.orders.editFulfillment(orderId, request);

    ```python: Python
    import razorpay
    client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

    orderId = "order_EKwxwAgItXXXX";

    request = {
      "payment_method": "upi",
      "shipping": {
          "waybill": "123456789",
          "status": "rto",
          "provider": "Bluedart"
      }
    }

    client.order.editFulfillment(orderId, request)

    ```go: Go
    import ( razorpay "github.com/razorpay/razorpay-go" )
    client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

    orderId = "order_EKwxwAgItXXXX"

    params := map[string]interface{}{
      "payment_method": "upi",
      "shipping": map[string]interface{}{
        "waybill":  "123456789",
        "status":   "rto",
        "provider": "Bluedart",
      },
    }

    body, err := client.Order.EditFulfillment(orderId, params, nil)

    ```php: PHP
    $api = new Api($key_id, $secret);

    $orderId = "order_EKwxwAgItXXXX";

    $data = array(
            'payment_method' => 'upi',
            'shipping' => array(
                'waybill' => '123456789',
                'status' => 'rto',
                'provider' => 'Bluedart'
              )
            )

    $api->order->fetch($orderId)->editFulfillment($data);

    ```ruby: Ruby
    require "razorpay"
    Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

    order_id = "order_EKwxwAgItXXXX"

    para_attr = {
      "payment_method": "upi",
      "shipping": {
        "waybill": "123456789",
        "status": "rto",
        "provider": "Bluedart"
      }
    }

    Razorpay::Order.edit_fulfillment(order_id, para_attr)

    ```javascript: Node.JS
    var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

    var orderId = "order_EKwxwAgItXXXX";

    var data = {
      "payment_method": "upi",
      "shipping": {
        "waybill": "123456789",
        "status": "rto",
        "provider": "Bluedart"
      }
    }

    instance.orders.editFulfillment(orderId, data);

    ```csharp: .NET
    RazorpayClient client = new RazorpayClient(your_key_id, your_secret);

    string orderId = "order_EKwxwAgItXXXX";

    Dictionary param = new Dictionary();
    Dictionary shipping = new Dictionary();
    param.Add("payment_method", "upi");
    shipping.Add("waybill","12345678");
    shipping.Add("status","rto");
    shipping.Add("provider","Bluedart");
    param.Add("shipping", shipping);

    Order order = client.Order.Fetch(orderId).EditFulFillment(param);
    ```
  
  
    ```json: Success Response
    {
      "entity": "order.fulfillment",
      "order_id": "EKwxwAgItXXXX",
      "payment_method": "upi",
      "shipping": {
        "waybill": "123456789",
        "status": "rto",
        "provider": "Bluedart"
      }
    }
    ```json: Failure Response
    {
      "error": {
        "code": "BAD_REQUEST_ERROR",
        "description": "The api key provided is invalid",
        "source": "NA",
        "step": "NA",
        "reason": "NA",
        "metadata": {}
      }
    }
    ```
  

  
### Path Parameter

`order_id`  _mandatory_
: `string` The unique identifier of an order to access the fulfillment information.
    

  
### Request Parameters

`payment_method`  _optional_
: `string` Payment Method opted by the customer to complete the payment. Possible values: 
  - `upi`
  - `card`
  - `wallet`
  - `netbanking`
  - `cod`
  - `emi`
  - `cardless_emi`
  - `paylater`
  - `recurring`
  - `other`

  
> **WARN**
>
> 
>   **Watch Out!**
>   
>   This is a mandatory field if the payment object is present in the API.
>   

`shipping` _optional_
: `object` Contains the shipping data.

  `waybill` _mandatory_
  : `string` AWB number of the order. It is null if `enable_tracking` is set to false.

  `status` 
  : `string` Fulfillment status of the shipment. Possible values: 
    - `rto`: Order returned to the origin or in the process of returning to origin.
    - `delivered`: Order delivered successfully.
    - `cancelled`: Order canceled before or after shipping.
    - `lost`: Order lost during or before transit.
    - `returned`: Order returned by the customer post delivery.
    - `partially_delivered`: Delivered a part of the multi-package product.
    - `created`: Order in transit or yet to be shipped.

  `provider` 
  : `string` Name of the shipping provider used for shipment.
    

  
### Error Response Parameters

     Given below is the the list of errors for fulfillment details.
      
          
              INVALID_ARGUMENT 
              
              - **Error**: input_validation_failed
              - **Description**: The id provided does not exist.
              - **Error Status**: 400
              - **Source**: business
              - **Step**: fulfillment_updates
              - **Next Steps**: Try with another id shared as a response to (/v1/orders)
              

          
### INVALID_ARGUMENT

              - **Error**: input_validation_failed
              - **Description**: Mandatory fields are missing in payment object: ["order_id"]
              - **Error Status**: 400
              - **Source**: business
              - **Step**: fulfillment_updates
              - **Next Steps**: Please send order_id in the URL to get RTO reviews for that order.
              

          
### INVALID_ARGUMENT

              - **Error**: input_validation_failed
              - **Description**: shipping_status: invalid shipping status entered, please pass a valid shipping status.
              - **Error Status**: 400
              - **Source**: business
              - **Step**: fulfillment_updates
              - **Next Steps**: Please pass a valid shipping status.
              

          
### INTERNAL

              - **Error**: NA
              - **Description**: We are facing some trouble completing your request at the moment. Please try again shortly.
              - **Error Status**: 500
              - **Source**: business
              - **Step**: NA
              - **Next Steps**: Please try in a while.
