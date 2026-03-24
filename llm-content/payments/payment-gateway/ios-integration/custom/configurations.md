---
title: Additional Configurations
description: Additional configurations available for Razorpay iOS Custom SDK.
---

# Additional Configurations

This section explains the additional configurations available for Razorpay iOS Custom SDK.

- [Change API Key](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/configurations/#change-api-key.md)
- [Card Utilities](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/configurations/#card-utilities.md)
- [Save Card Details](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/configurations/#save-card-details.md)
- [Fetch Logo](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/ios-integration/custom/configurations/#fetch-logos.md)

## Change API Key

Call the following function after the successful SDK initialization and change the API key:

```swift: Change API Key
razorpay.changeApiKey("rzp_new_key")
```

## Card Utilities

#### Fetch Card Network

The SDK provides a method to get the card network of the card. At least six digits of the card number are required to identify the network. The below method fetches the card network for a card. A minimum of 6 digits is required to identify the network.

```swift: Get Card Network
razorpay.getCardNetwork(fromCardNumber: "cardNumber")
```

 Possible values are:

 - `visa`
 - `mastercard`
 - `maestro16`
 - `amex`
 - `rupay`
 - `maestro` and
 - `diners`

 If the method cannot identify the network, it returns `unknown`.

#### Card Number Validation

The entered card number can be validated using the checksum-based method.

```swift: Card Number Validation
razorpay.isCardValid("cardNumber")
```

#### Fetch Card Number Length for Card Network

Use the below method to fetch the card number's length for a card network:

```swift: Fetch Card Number Length for Card Network
razorpay.getCardNetworkLength(ofNetwork: "network")
```

#### Save Card Details 

You can save the card details as **tokens** with Razorpay. On repeat visits, the customers can complete the payment quicker by just entering the `cvv` of the card.

To implement the `save cards` feature in your app:

1. [Create a Customer](#step-1-create-a-customer)
2. [Create a Token for the Card](#step-2-create-a-token)
3. [Fetch Card Tokens](#step-3-fetch-card-tokens)
4. [Create a Payment using the Token](#step-4-create-a-payment-using-the-token)

#### Step 1: Create a Customer 

Create a customer, whose card details should be saved, from the Dashboard or [Customers API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers.md).

/customers

```cURL: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/customers \
-H "Content-Type: application/json" \
-d '{
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "fail_existing": "0",
  "notes":{
    "landmark": "Razorpay Office Building",
    "location": "Bangalore"
  }
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject customerRequest = new JSONObject();
customerRequest.put("name","Gaurav Kumar");
customerRequest.put("contact","+919000090000");
customerRequest.put("email","gaurav.kumar@example.com");
customerRequest.put("fail_existing", "0");
JSONObject notes = new JSONObject();
notes.put("notes_key_1","Tea, Earl Grey, Hot");
notes.put("notes_key_2","Tea, Earl Grey... decaf.");
customerRequest.put("notes",notes);

Customer customer = razorpay.customers.create(customerRequest);

```Python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.customer.create({
  "name": "Gaurav Kumar",
  "contact": +919000090000,
  "email": "gaurav.kumar@example.com",
  "fail_existing": "0",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey... decaf."
  }
})

```php: PHP
$api = new Api($key_id, $secret);

$api->order->create([
  "name" => "Gaurav Kumar",
  "contact" => +919000090000,
  "email" => "gaurav.kumar@example.com",
  "fail_existing" => "0",
  "notes" => array(
     "notes_key_1" => "Tea, Earl Grey, Hot",
     "notes_key_2" => "Tea, Earl Grey... decaf.",
  ),
]);

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();

options.Add("name", "Gaurav Kumar"); 
options.Add("contact", "9123456780"); 
options.Add("email", "gaurav.kumar@example.com"); 
options.Add("fail_existing", "0"); 

Customer customer = Customer.Create(options);

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

Razorpay::Customer.create({
  "name": "Gaurav Kumar",
  "contact": 9123456780,
  "email": "gaurav.kumar@example.com",
  "fail_existing": "0",
  "gstin": "29XAbbA4369J1PA",
  "notes": {
    "notes_key_1": "Tea, Earl Grey, Hot",
    "notes_key_2": "Tea, Earl Grey… decaf."
  }
})

```javascript: Node.js
var instance = new Razorpay({
  key_id: "YOUR_KEY_ID",
  key_secret: "YOUR_SECRET",
});

instance.orders.create({
  name: "Gaurav Kumar",
  contact: "+919000090000",
  email: "gaurav.kumar@example.com",
  fail_existing: "0",
  notes: {
    notes_key_1: "Tea, Earl Grey, Hot",
    notes_key_2: "Tea, Earl Grey... decaf.",
  },
});

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
    "name": "Gaurav Kumar",
    "contact": +919000090000,
    "email": "gaurav.kumar@example.com",
    "fail_existing": "0",
    "notes": map[string]interface{}{
      "notes_key_1": "Tea, Earl Grey, Hot",
      "notes_key_2": "Tea, Earl Grey... decaf.",
  },
}

body, err := client.Customer.Create(data, nil)

```json: Response
{
  "id": "cust_1Aa00000000001",
  "entity": "customer",
  "name": "Gaurav Kumar",
  "email": "gaurav.kumar@example.com",
  "contact": "9000090000",
  "gstin": null,
  "notes": {
    "landmark": "Razorpay Office Building",
    "location": "Bangalore"
  }
  "created_at": 1234567890
}
```

#### Step 2: Create a Token

Use the following code to create a token. 

```swift: Swift
internal func showPaymentForm(){
  let options: [String:Any] = [
    "amount": "100",
    "currency": "INR",
    "order_id": "order_4xbQrmEoA5WJ0G",
    "method": "card",
    "card[name]": "Gaurav Kumar",
    "card[number]": "4386289407660153",
    "card[expiry_month]": "9",
    "card[expiry_year]": "20",
    "card[cvv]": "123",
    "customer_id": "cust_1Aa00000000001",
    "save": "1",
    // And the remaining fields
    ]
  razorpay.open(options)
}
```

For saving the card details on the Checkout, send the following parameters in the `options` dictionary: 

`customer_id`
: `NSString` Unique identifier of the customer. Obtained from the response of the [previous step](#step-1-create-a-customer).

`save`
: `NSString` Specifies if the card details should be stored as tokens. Possible values are:
  - `1`: Saves the card details.
  - `0` (default): Does not save the card details. 

> **WARN**
>
> 
> **Watch Out!**
> 
> - CVV is not required by default for tokenised cards across all networks.
> - CVV is optional for tokenised card payments. Do not pass dummy CVV values.
> - To implement this change, skip passing the `cvv` parameter entirely, or pass a `null` or empty value in the CVV field.
> - We recommend removing the CVV field from your checkout UI/UX for tokenised cards.
> - If CVV is still collected for tokenised cards and the customer enters a CVV, pass the entered CVV value to Razorpay.        
> 

We save the card details entered by the customer as tokens in Razorpay.

#### Step 3: Fetch Card Tokens

You can fetch all tokens generated for a customer by sending a request to the Fetch Tokens API.

/customers/:customer_id/tokens

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
    -X GET https://api.razorpay.com/v1/customers/:cust_1Aa00000000001/tokens
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
        "name" : "Gaurav Kumar",
        "last4" : 1111, 
        "network" : "Visa",
        "expiry_month" : 12,
        "expiry_year" : 2021,
        "emi" : true, 
        "issuer" : "HDFC"
      },
      "used_at" : 1473765044,
      "created_at" : 1473765044
    },
    {
      "id" : "token_4zwefDSCC829ma", 
      "entity" : "token", 
      "method" : "card", 
      "card" : {
        "entity": "card",
        "name": " Gaurav Kumar",
        "network": "MasterCard",
        "international": false,
        "expiry_month": 9,
        "expiry_year": 2020,
        "last4" : 1111, 
        "emi": false
      },
      "used_at": null,
      "created_at" : 1473765043
    }
  ] 
}
```

All the tokens (saved card details) returned in the response can be shown to the customer when payment creation.

#### Step 4: Create a Payment using the Token

On a repeat visit, the customer selects a card from the list of saved cards and completes the payment by entering the `cvv` of the card. Send the `customer_id`, and `token_id`(associated with the saved card) attributes along with `cvv` in the payment request:

```swift: Swift
internal func showPaymentForm(){
  let options: [String:Any] = [
    "amount": "100", 
        "currency": "INR",
        "order_id": "order_4xbXrmEoB5WApy",
        "method": "card",
        "customer_id": "cust_1Aa00000000001",
        "token": "token_4zwefDSCC829ma",
        "card[cvv]": "123",
          // And the remaining fields
    ]
  razorpay.open(options)
}
```

## Fetch Logos

#### Fetch Bank Logo URL

Use the below method to fetch the bank logo URL. Here `bankCode` is the code of the bank. This should be available in the response received in the `onPaymentMethodsReceived` callback.

```swift: Fetch Bank Logo URL
razorpay.getBankLogo(havingBankCode: "bankCode")
``` 

#### Fetch Wallet Logo URL

Use the below method to fetch the wallet logo URL:

```swift: Fetch Wallet Logo URL
razorpay.getWalletLogo(havingWalletName: "name")
```

#### Fetch Wallet Square Logo URL

Use the below method to fetch the wallet square image logo URL:
 
```swift: Fetch Wallet Square Logo URL
razorpay.getWalletSqLogo(havingWalletName: "name")
```
