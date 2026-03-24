---
title: Bajaj Finserv No Cost EMIs
description: Let your customers avail No Cost EMIs offered by Bajaj Finserv.
---

# Bajaj Finserv No Cost EMIs

Offer No Cost EMIs by Bajaj Finserv to your customers. No Cost EMIs are offered as an upfront discount to your customers. The interest levied on the EMIs is waived off. After the customer makes the purchase, they are charged as per the credit card billing cycle or payment terms agreed with Bajaj Finserv.

## Prerequisites

- The customer should be a registered user of the EMI card provider, **Bajaj Finserv**.
- Generate API keys from the [Dashboard](https://razorpay.com/dashboard). A combination of `key_id` and `key_secret` is required to authenticate API request sent to Razorpay servers.

## How it Works

For the customers to avail No Cost EMIs on the Razorpay Standard Checkout, follow the detailed steps as explained below:

  
### Step 1: Create No Cost EMI Offers

     Raise a request with the[ Razorpay Support team ](https://razorpay.com/support/#request)to create the relevant No Cost EMIs you want to display on the Checkout. Get the appropriate `offer_id` created for each EMI plan.
    

  
### Step 2: Associate Offer with an Order

            Obtain the `offer_id`. Let us say, `offer_ANZoaxsOww2X53`, from our Support team. Create an order for the transaction amount for which the created offer should be applied.

        /orders
        
        ```curl: Curl
        curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
        -X POST https://api.razorpay.com/v1/orders \
        -H "Content-Type: application/json" \
        -d '{
          "amount": 1000000,
          "currency": "INR",
          "discount": true,
          "offers": [
            "offer_ANZoaxsOww2X53"
          ]
        }'
        ```java: Java
        RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

              ArrayList Offer = new ArrayList();
                Offer.add("offer_JTUADI4ZWBGWur");

                JSONObject orderRequest = new JSONObject();
                orderRequest.put("amount", 1000000); // amount in the smallest currency unit
                orderRequest.put("currency", "INR");
                orderRequest.put("discount", true);
                orderRequest.put("offers", Offer);

                Order order = razorpayclient.orders.create(orderRequest);
                System.out.print(order);
        ```python: Python
        import razorpay
        client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

        client.order.create({
          "amount": 1000000,
          "currency": "INR",
          "receipt": "receipt#1",
          "discount": true,
          "offers": [
            "offer_ANZoaxsOww2X53"
          ]
        })
        ```php: PHP
        $api = new Api($key_id, $secret);

        $api->order->create(array('amount' => 1000000, 'currency' => 'INR', 'discount' => '1', 'offers'=> array('offer_JTUADI4ZWBGWur')));
        ```ruby: Ruby 
        require "razorpay"
        Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

        order = Razorpay::Order.create amount: 50000, currency: 'INR', discount: '1', receipt: 'receipt#1',  offers: [
            'offer_ANZoaxsOww2X53"'
        ]
        ```js: Node.js
        var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

        instance.orders.create({
          amount: 1000000,
          currency: "INR",
          receipt: "receipt#1",
          discount: true,
          offers: [
            "offer_ANZoaxsOww2X53"
          ]
        })
        ```go: Go
        import ( razorpay "github.com/razorpay/razorpay-go" )
        client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

        data := map[string]interface{}{
        "amount": 50000,
        "currency": "INR",
        "receipt": "receipt#1",
          "offers": []interface{}{
          "offer_JTUADI4ZWBGWur",
          },
        }
        body, err := client.Order.Create(data, nil)

        ```json: Response
        {
          "id": "order_CjyoZFRpB8r0AH",
          "entity": "order",
          "amount": 1000000,
          "amount_paid": 0,
          "amount_due": 1000000,
          "currency": "INR",
          "receipt": null,
          "offer_id": "offer_ANZoaxsOww2X53",
          "offers": [
            "offer_ANZoaxsOww2X53"
          ],
          "status": "created",
          "attempts": 0,
          "notes": [],
          "created_at": 1561018912
        }
        ```

        `amount` _mandatory_
        : `integer` Amount, in currency subunits, for which the order is created. For example, if the order is to be created for ₹30,000, enter the value 3000000 (in paise).

        `currency` _mandatory_
        : `string` ISO code of the currency associated with the order amount.

        `notes` _optional_
        : `json object` Key-value pair that can be used to store additional information about the entity. Maximum 15 key-value pairs, 256 characters (maximum) each. For example, `"note_key": "Beam me up Scotty”`.

        `offers` _mandatory_
        : `array` Unique identifier of the offer. 
 Pass the `offer_id` obtained from Razorpay Support team.

        `discount`_optional_
        : `boolean` Indicates if a discount is to be applied by Razorpay or not. Possible values:

            - `true`: Discount is applied.
            - `false`: Discount is not applied.
    

    
### Step 3: Trigger Checkout

     The `order_id` obtained in the previous step can be passed to the Checkout page as follows:

      Copy-paste the parameters as `options`  in your code:

      ```html: Checkout with Callback URL (JavaScript)
      Pay
      
      
      var options = {
          "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
          "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          "currency": "INR",
          "name": "Acme Corp",
          "description": "Test Transaction",
          "image": "https://example.com/your_logo",
          "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
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
      
      ```html: Checkout with Handler Functions (JavaScript)
      Pay
      
      
      var options = {
          "key": "YOUR_KEY_ID", // Enter the Key ID generated from the Dashboard
          "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
          "currency": "INR",
          "name": "Acme Corp",
          "description": "Test Transaction",
          "image": "https://example.com/your_logo",
          "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
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
      
```
    

## How Customers Avail Offers on Checkout

The customers can complete the payment as follows:

1. On the Razorpay Checkout, customers enter the required details and select **EMI** as the payment method.
    ![Standard checkout with bajaj finserv.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bajaj-finserv-emi-new-amount.jpg.md)

2. They can select **Cardless and Others**.
    ![Bajaj FinServ displayed in Cardless and Others section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bajaj-finserv-new-select-new.jpg.md)

3. Customers select the EMI tenure and click **Continue**.
    ![Select an EMI Plan and Select Plan.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bajaj-finserv-new-plan-select.jpg.md)

4. They enter the details of Bajaj Finserv-issued card and click **Continue**.
    ![details of Bajaj Finserv-issued card.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/bajaj-finserv-new-card-details.jpg.md)

After the successful payment, Razorpay redirects customers to your application or website. Customers' monthly statements will reflect the EMI amount with interest charged by the bank. You can check the status of the payment from the Dashboard.

### FAQs

See: [No Cost EMI FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/faqs.md#no-cost-emi).
