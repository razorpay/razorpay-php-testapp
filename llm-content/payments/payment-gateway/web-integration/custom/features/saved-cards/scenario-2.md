---
title: Razorpay Seeks Customer Consent on Behalf of Business
description: Procedure to follow if you want Razorpay to collect customer consent.
---

# Razorpay Seeks Customer Consent on Behalf of Business

If you do not intend to collect customer consent to save card details on your UI and want Razorpay to collect the consent, follow the steps below.

## New Card Workflow

New cards are cards that have previously not been saved with Razorpay. Follow the steps given below to make changes in the integration code:

## Step 1: Create a Customer

You can create customers using the [Create a Customer API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md). The `customer_id` received in the response should be passed in the Create Payment request.

## Step 2: Create Payment

Use the following code to **Create a Payment**.

```js: Custom Checkout

  Pay
  
       var razorpay = new Razorpay({
        key: "",
        image: "https://i.imgur.com/n5tjHFD.jpg",
        name: "",
       });
       var data = {
        amount: 6666,
        currency: "",
        email: "",
        order_id: "order_ISsp1ekSCHgoAw",
        contact: ,
        notes: {
          address: "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
        },
        customer_id: "cust_1Aa00000000001",
        save: 1,
        method: "card",
        card[number]: '4242424242424242',
        card[expiry_month]: '11',
        card[expiry_year]: '23',
        card[cvv]: '123',
        card[name]: ''
       };

       document.getElementById("rzp-button1").onclick = function(){
        razorpay.createPayment(data);
        razorpay.on("payment.success", function(resp) {
          alert(resp.razorpay_payment_id)
          });
        razorpay.on("payment.error", function(resp){alert(resp.error.description)});
}

```

#### Request Parameters

`save` _mandatory_
: `integer` Determines whether Razorpay should save customer card details as tokens with the card network. Possible values:
  - `1`: Razorpay should save customer card details as tokens with the card network.
  - `0`: Razorpay should not save the card details.
  
`card` _mandatory_
: The details of the card that should be entered while making the payment.

    `number` 
    : `string` Unformatted card number.

    `name`
    : `string` The name of the cardholder.

    `expiry_month`
    : `string` Expiry month for card in MM format.

    `expiry_year`
    : `string` Expiry year for card in YY format.

    `cvv`
    : `string` The card's CVV number.

    
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>      - CVV is not required by default for tokenised cards across all networks.
>      - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>      - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>      - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>      - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.         
>     

    

`customer_id` _mandatory_
: `string` Unique identifier of the customer. This can be obtained from the response of the previous step.

## Step 3: Fetch all Tokens of Customer

Fetch all tokens created for a customer using the API given below.

/customers/:customer_id/tokens

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X GET https://api.razorpay.com/v1/customers/:customer_id/tokens
```php: PHP
$api = new Api($key_id, $secret);
$api->customer->fetch($customerId)->tokens()->all();
```python: Python 
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.all(customerId)
```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })
instance.customers.fetchTokens(customerId)
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

Razorpay::Customer.fetch(customerId).fetchTokens
```java: Java 
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_DtHaBuooGHTuyZ";

List customer = instance.customers.fetchTokens(customerId);
```go: Go 
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.All("", nil, nil)

```json: Response
{
  "entity" : "collection",
  "count" : 2,
  "items" : [
    {
      "id" : "token_4lsdksD31GaZ09",
      "entity" : "token",
      "method" : "card",
      "card" : {
        "entity" : "card",
        "last4" : 1111,
        "network" : "Visa",
        "emi" : true,
        "issuer" : "HDFC",
        "international": false,
        "sub_type": "consumer",
        "token_iin": "453335",
        "type": "credit"
      },
      "used_at" : 1473765044,
      "created_at" : 1473765044,
      "status": "active",
      "compliant_with_tokenisation_guidelines": true  // This is for Indian Cards only
    },
    {
      "id" : "token_4lsdksD31GaZ08",
      "entity" : "token",
      "method" : "card",
      "card" : {
        "entity" : "card",
        "last4" : 1111,
        "network" : "Visa",
        "emi" : true,
        "issuer" : "HDFC",
        "international": false,
        "sub_type": "consumer",
        "token_iin": "453325",
        "type": "credit"
      },
      "used_at" : 1473765044,
      "created_at" : 1473765044,
      "status": "active",
      "compliant_with_tokenisation_guidelines": true  // This is for Indian Cards only
    }
  ]
}
```

#### Path Parameter

`customer_id`
: `string` Unique identifier of the customer.

#### Response Parameters

`id`
: `string` The unique identifier of the Razorpay token. 

`entity`
: `string` The name of the entity. Here, it is `token`.

`method`
: `string` The type of saved instrument. In the current use case, the value is `card`.

`card`
: `object` The customer card details.

    `last4`
    : `string` The last 4 digits of the tokenised card.

    `network`
    : `string` The card network. Possible values: 
      - `Visa`
      - `RuPay`
      - `MasterCard`
      - `American Express`
      - `Diners Club`
      - `Maestro`
      - `JCB`
      - `Union Pay`

    `issuer`
    : `string` The 4-character issuer code unique to each issuing bank in India. For example, `HDFC`, `SBIN` and so on.

    `type`
    : `string` The type of card. Possible values:
      - `credit`
      - `debit`
      - `prepaid`
  
    `international`
    : `boolean` Indicates whether the card is international (issued outside India) or domestic. Possible values:
      - `true`: The card is international.
      - `false`: The card is domestic.

    
    `emi`
    : `boolean` Indicates whether the card is eligible for EMI payments or not. Possible values:
      - `true`: The card is eligible for EMI payments.
      - `false`: The card is not eligible for EMI payments.
    

    `sub_type`
    : `string` The card sub_type for the given IIN. Pricing of card payment may change on the basis of card type. Possible values:
      - `consumer`
      - `business`
      - `unknown`

`compliant_with_tokenisation_guidelines`
: `boolean` Indicates whether the token is compliant with the RBI guidelines. Possible values:
  - `true`: The token is compliant with RBI guidelines.
  - `false`: The token is not compliant with RBI guidelines.

`status`
: `string` The overall status for the token. Possible values:
  - `initiated`: The token attains this state after Razorpay has received the tokenisation request and is working with token service providers for creating the token.
  - `active`: The token attains this state if the token is activated for at least one of the token service providers.
  - `suspended`: The token attains this state if: 
- The token is not activated for any one of the token service providers. 
- The token is suspended for at least one of the token service providers.
  - `deactivated`: The token attains this state if the token is not active/suspended for any one of the token service providers and is deactivated for at least one token service provider. Know about the complete list of [token states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor/token-lifecycle.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> You can convert a token BIN received in response to an **actual BIN** using [token APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor/apis.md).
> 

## Step 4: Fetch Card Properties of an Existing Token

Use this API to retrieve card details such as network, issuer and so on for a given token.

/customers/:customer_id/tokens/:token_id

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X GET https://api.razorpay.com/v1/customers/:customer_id/tokens/:token_id

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_DtHaBuooGHTuyZ";

String tokenId = "token_HouA2OQR5Z2jTL";

Customer customer = razorpay.customers.fetchToken(customerId, tokenId)

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.fetch(customerId, tokenId)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->fetch($tokenId);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

tokenId = "token_Hxe0skTXLeg9pF"

Razorpay::Customer.fetch(customerId).fetchToken(tokenId)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.fetchToken(customerId, tokenId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.Fetch("", "", nil, nil)

```json: Response
{
  "id": "token_4lsdksD31GaZ09",
  "entity": "token",
  "method": "card",
  "card": {
    "entity": "card",
    "last4": 0153,
    "network": "Visa",
    "emi": true,
    "issuer": "HDFC",
    "international": false,
    "sub_type": "consumer",
    "token_iin": "453335",
    "type": "credit"
  },
  "used_at": 1473765044,
  "created_at": 1473765044,
  "status": "active",
  "compliant_with_tokenisation_guidelines": true  // This is for Indian Cards only
}
```

#### Path Parameter

`customer_id`
: `string` Unique identifier of the customer.

`token_id`
: `string` Unique identifier of the token.

#### Response Parameters

`id`
: `string` The unique identifier of the Razorpay token. 

`entity`
: `string` The name of the entity. Here, it is `token`.

`method`
: `string` The type of saved instrument. In the current use case, the value is `card`.

`card`
: `object` The customer card details.

    `last4`
    : `string` The last 4 digits of the tokenised card.

    `network`
    : `string` The card network. Possible values: 
      - `Visa`
      - `RuPay`
      - `MasterCard`
      - `American Express`
      - `Diners Club`
      - `Maestro`
      - `JCB`
      - `Union Pay`

    `issuer`
    : `string` The 4-character issuer code unique to each issuing bank in India. For example, `HDFC`, `SBIN` and so on.

    `type`
    : `string` The type of card. Possible values:
      - `credit`
      - `debit`
      - `prepaid`
  
    `international`
    : `boolean` Indicates whether the card is international (issued outside India) or domestic. Possible values:
      - `true`: The card is international.
      - `false`: The card is domestic.

    
    `emi`
    : `boolean` Indicates whether the card is eligible for EMI payments or not. Possible values:
      - `true`: The card is eligible for EMI payments.
      - `false`: The card is not eligible for EMI payments.
    

    `sub_type`
    : `string` The card sub_type for the given IIN. Pricing of card payment may change on the basis of card type. Possible values:
      - `consumer`
      - `business`
      - `unknown`

`compliant_with_tokenisation_guidelines`
: `boolean` Indicates whether the token is compliant with the RBI guidelines. Possible values:
  - `true`: The token is compliant with RBI guidelines.
  - `false`: The token is not compliant with RBI guidelines.

`status`
: `string` The overall status for the token. Possible values:
  - `initiated`: The token attains this state after Razorpay has received the tokenisation request and is working with token service providers for creating the token.
  - `active`: The token attains this state if the token is activated for at least one of the token service providers.
  - `suspended`: The token attains this state if: 
- The token is not activated for any one of the token service providers. 
- The token is suspended for at least one of the token service providers.
  - `deactivated`: The token attains this state if the token is not active/suspended for any one of the token service providers and is deactivated for at least one token service provider. Know about the complete list of [token states](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/merchant-requestor/token-lifecycle.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> You can convert a token BIN received in response to an **actual BIN** using [token APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/token-hq/razorpay-requestor/apis.md).
> 

## Step 5: Create Payments using Saved Card

After the card is saved, customers can quickly complete the payment for every subsequent online transaction by entering only the `cvv`. If Razorpay should save the card details, pass the following additional parameters to the Checkout form.

```js: Custom Checkout

  Pay
  
       var razorpay = new Razorpay({
        key: "",
        image: "https://i.imgur.com/n5tjHFD.jpg",
        name: "",
       });
       var data = {
        amount: 6666,
        currency: "",
        email: "",
        order_id: "order_ISsp1ekSCHgoAW",
        contact: 9123456780,
        notes: {
          address: "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
        },
        customer_id: "cust_1Aa00000000001",
        token: "token_4zwefDSCC829ma",
        method: "card",
        card[cvv]: '123'
       };

       document.getElementById("rzp-button1").onclick = function(){
        razorpay.createPayment(data);
        razorpay.on("payment.success", function(resp) {
          alert(resp.razorpay_payment_id)
          });
        razorpay.on("payment.error", function(resp){alert(resp.error.description)});
}

```

#### Request Parameters

`customer_id`
: `string` Unique identifier of the customer.

`token`
: `string` Unique identifier of the token saved with the card network.

`card[cvv]`
: `string` CVV of the card. 
  
  
> **INFO**
>
> 
>   **Handy Tips**
> 
>    - CVV is not required by default for tokenised cards across all networks.
>    - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
>    - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
>    - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
>    - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.         
>   

  

## Step 6: Delete Tokens

If the customers want to remove the saved cards from their respective accounts, you can use the following API to delete the tokens:

/customers/:customer_id/tokens/:token_id

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X DELETE https://api.razorpay.com/v1/customers/cust_1Aa00000000001/tokens/token_4zwefDSCC829ma

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

String customerId = "cust_DtHaBuooGHTuyZ";

String tokenId = "token_HouA2OQR5Z2jTL";

Customer customer = razorpay.customers.deleteToken(customerId, tokenId);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.token.delete(customerId, tokenId)

```php: PHP
$api = new Api($key_id, $secret);

$api->customer->fetch($customerId)->tokens()->delete($tokenId);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

customerId = "cust_1Aa00000000004"

tokenId = "token_Hxe0skTXLeg9pF"

Razorpay::fetch(customerId).deleteToken(tokenId)

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.customers.deleteToken(customerId, tokenId)

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

body, err := client.Token.Delete("", "", nil, nil)

```json: Response
{
    "deleted": true
}
```

#### Path Parameters

`customer_id`
: `string` Unique identifier of the customer.

`token`
: `string` Token of the saved method that needs to be deleted.

## Delete Saved Card Details

Customers can delete their card details. Check this [demo](https://razorpay.com/flashcheckout/manage/) and follow the on-screen instructions.

## Existing Saved Card

Existing cards are cards whose details have been previously saved with Razorpay on Razorpay servers. 

Existing card details will be saved as network tokens by Razorpay only if:
1. The `Collect Consent from Customers` feature is enabled on the Dashboard.
2. The customer provides their consent on the Razorpay webpage. If the customer does not consent, the card details will not be saved.
