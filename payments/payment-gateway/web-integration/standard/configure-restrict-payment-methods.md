---
title: Standard Web Integration - Configurability of Payment Methods
description: Configure the payment methods of your choice on Razorpay Checkout.
---

# Standard Web Integration - Configurability of Payment Methods

Razorpay Standard Checkout hosts a variety of payment methods for customers to make payments. The order of these payment methods on the Checkout used to be fixed and could not be interchanged. There can be situations where you want certain payment methods to be shown more prominently or rearrange the order in which the payment methods are displayed on the Checkout.

Now, you can configure the payment methods of your choice on the Checkout to provide a highly personalized experience for your customers. This simple and accessible experience for them will increase your sales and success rates.

**Original Checkout** | **Customized Checkout**
---
 | 

## Use Cases

Razorpay allows you to configure the payment methods depending on your use case.

- Highlighting certain payment instruments on the Checkout.
For example **Google Pay** could be displayed outside the UPI block as a separate payment method. **HDFC Netbanking** could come out of the Netbanking container as a separate payment method. Similarly,  **OlaMoney** can be pulled out of the wallet block.

- Restricting the kind of network, issuer, BIN and card type, different properties of the card, to accept payments. 
For example, you can choose to accept payments only from **HDFC Visa Debit cards** on the Checkout.

- Removing a certain payment method or instrument. 
For example, **OlaMoney** can be removed as a payment method from wallets. The entire **Netbanking** block or a certain bank in Netbanking can be removed from the Checkout.

- Reordering of payment methods on the Checkout. 
You can choose to have **UPI** as the first section instead of **Cards** on the Checkout. Within the UPI block, you can again order the PSPs, according to your need.

- Grouping of payment instruments. 
For example, you can choose to group **Netbanking** and **UPI** payment methods of a bank as a block that will be labelled as **Pay via Bank** on the Checkout.

## Examples

**Highlight Instruments of a Certain Bank** | **Regroup Payment Methods** | **Remove UPI**
---
 |  | 

## Configuring Payment Methods

Depending on how you want to control the payment methods on the Checkout, there are different ways in which the configuration can be passed to the Checkout:

- Pass the configuration in the `options` parameter of the Checkout code at the run time. 
 This is useful when you want to modify the order of the payment methods for a particular set of payments while rendering the Checkout. See the [sample code](#sample-code) for details.

- Create a global setting of the payments as a **Configuration ID** and pass these values while creating the Order.
This is useful when you want to fix the order of the payment methods on all the Checkout renderences.

> **INFO**
>
> **Note:**
Contact our [Support Team](https://razorpay.com/support/#raise-a-request) for more details about the Configuration ID.

## Understanding the Configuration

Let us understand the building blocks that are required to build a configuration of your choice:

1. [Payment Methods](#payment-methods)
2. [Payment Instruments](#payment-instruments)
3. [Blocks](#blocks)
4. [Sequence](#sequence)
5. [Preferences](#preferences)

### Payment Methods

Before deciding the payment methods or payment instruments that you want to configure on the Checkout, refer to the [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md) supported by Razorpay.

### Payment Instruments

A payment instrument is a combination of the payment method and its associated properties. For example, a payment instrument can be an **AXIS Debit card**, where **card** is the payment method and the issuer (AXIS bank) is the associated **instrument**.

An instrument is a JSON object with a key named `method`. Each method and its associated properties are described in the sections below:

#### Card

Payment instruments for the `method: card` are listed below:

name | type | description | values | examples
---
issuers | array | List of issuers that are allowed | [Any bank code](#supported-banks) | issuers: ["HDFC", "ICIC"]
---
networks | array | List networks that are allowed | [Any card network](#supported-card-networks) | `networks: ["Visa", "MasterCard"]`
---
types | array | List of card types that are allowed | [Any card type](#supported-card-types) | `types: ["credit"]`

```js: JavaScript
// beginning of the code
....
card: { \\name for cards
    name: "Pay Via Cards"
    instruments: [
      {
        method: "card",
        issuers: ["UTIB"],
        networks: ["MasterCard"],
        types: ["debit","credit"]
      }
    ]
},
...
//rest of the code
```

#### Netbanking

Payment instruments for the `method: netbanking` are listed below:

name | type | description | values | examples
---
banks | array`` | List of all banks that are allowed | [Any bank code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md#supported-banks) | `banks: ["HDFC", "ICIC"]`

#### Wallet

Payment instruments for the `method: wallet` are listed below:

name | type | description | values | examples
---
wallets | string | Wallets to be allowed | [Any wallet code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md#supported-wallets) | `wallets: ["olamoney"]`

#### UPI

Payment instruments for the  `method: upi` are listed below:

name | type | description | values | examples
---
flows | string | Flows to show | [Any supported UPI flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md#supported-upi-flows) | `flows: [ "qr"]`
---
apps | string | Apps to show, for intent | [Any supported UPI apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md#supported-upi-apps) | `apps: ["google_pay", "phonepe"]`

#### Cardless EMI

Payment instruments for the  `method: cardless_emi` are listed below:

name | type | description | values | examples
---
providers | string | Providers to be allowed | [Any Cardless EMI provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md#supported-cardless-emi-providers) | `providers: ["zestmoney"]`

#### PayLater

For the  method: `paylater`, the payment instruments are listed below:

name | type | description | values | examples
---
providers | string | Providers to be allowed | [Any paylater provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md#supported-paylater-providers) | `providers: ["hdfc"]`

#### Apps

For the method `app`, the payment instrument is listed below:

name | type | description | values | examples
---
providers | string | Providers to be allowed | [Any app provider](#supported-apps) | `providers: ["cred"]`

```js: JavaScript
// beginning of the code
....
{
  "custom": {
    "name": "Pay with Apps",
    "instruments": [
      {
        "method": "app",
        "providers": [
          "cred"
        ]
      }
    ]
  }
}
...
//rest of the code
```

### Blocks

A block is a collection of one or more payment instruments. Each block has a `name` and `code` associated as shown below:

```js: JavaScript
// Block creation
let myPayments = {
  name: "My Custom Block",
  instruments: ["gpay"]
};
// Usage in config
let config = {
  display: {
    block: {
      highlighted: myPayments
    }
  }
};
```

Here, `highlighted` is the code associated with `myPayments`. Multiple blocks can be added to the config at the same time.

### Sequence

You can specify the `sequence`, that is the order, in which the payment methods should be displayed on the Checkout.

A sequence is an `array` of strings, where each string is the name of the payment method or a `block`.

In a sequence, you can include any block using the `block.${code}` format. The block with code **highlighted** should be represented as `block.highlighted` as shown below:

```js: JavaScript
let sequence = ["block.highlighted", "upi", "netbanking"];
```

The above sequence will place the code `highlighted` first followed by the payment methods `upi` and `netbanking` in that particular order.

> **INFO**
>
> 
> **Important**
> 
> Every block defined has to be present in the sequence. If you do not wish to reorder the methods and want to place your block, the sequence should contain `block.highlighted` with just one item in it.
> 

## Preferences

Using the `preferences` object, you can enhance the configuration of the Checkout. By setting this value, you can decide whether the default list of payment methods should be displayed or not.

Possible values are:

`true`
: Checkout will display the sequence of the payment methods configured by you alongside the default order of payment methods available in the Checkout.

`false`
: Checkout will only show the sequence of the payment methods configured by you.

### Hide Payment Instruments

You can also hide or remove certain instruments from the Checkout.

This is an `array` containing the `method` key used to hide either the payment method and/or the payment instrument associated with that payment method. For example, you can hide the methods, `card` and `HDFC netbanking` on the Checkout.

```js: JavaScript
let cardInstrument = {
  method: "card"
};

let instrumentOfSomeBank = {
  method: "netbanking",
  banks: ["HDFC"]
};

let hiddenInstruments = [cardInstrument, instrumentOfSomeBank];
```

> **INFO**
>
> 
> **Note**
> 
> Hiding any instrument using `hide` does not affect the similar instrument defined in `blocks`. So, if you want to hide `HDFC` bank from `netbanking` and have defined the same instrument in one of your blocks,  HDFC bank will still be displayed in that block.
> 

## Building the Configuration

This section contains details about the `display` configuration and the `restrictions` configuration.

### Display Configuration

Using the `display` config, you can put together all the modules, that is, `blocks`, `sequence`, `preferences`, `hide` instruments as shown below:

The `display` config can be passed in the Checkout options or in the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md) request using the `checkout_config_id` parameter.

> **INFO**
>
> 
> **Handy Tips**
> 
> Contact our [Support Team](https://razorpay.com/support/#raise-a-request) to get your `checkout_config_id` parameter.
> 

```js: display config
let config = {
  display: {
    blocks: {
      code: {
        name: "The name of the block", // The title of the block
        instruments: [instrument, instrument] // The list of instruments
      },

      anotherCode: {
        name: "Another block",
        instruments: [instrument]
      }
    },

    hide: [
      {
        method: "method"
      }
    ],

    sequence: ["block.code"], // The sequence in which blocks and methods should be shown

    preferences: {
      show_default_blocks: true // Should Checkout show its default blocks?
    }
  }
};
```js: JavaScript Checkout options
// beginning of the Checkout code
.....

let options = {
  key: "",
  amount: 60000,
  currency: "INR",

  config: {
    display: {
      // The display config
    }
  }
};

let razorpay = new Razorpay(options);

razorpay.open();
....
//rest of the Checkout code
```curl: Orders Sample Request
curl -u : \
-X POST https://api.razorpay.com/v1/orders \
-H "content-type: application/json" \
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco",
  "notes": {
    "reference_no": "IBFA10106201500002"
    }
}'
```

### Restrictions Configuration

Using the `display` config, you can reorder, highlight or hide instruments and methods, and display the modules on the Checkout, whereas using the `restrictions` config you can accept payments using only certain instruments.

For example, if you want to accept payments only from specific cards such as Rupay or Diners Card/only HDFC or Axis Bank Cards/Cards of a particular BIN.

To restrict the payments, it is recommended to use `restrictions` config.

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> 
> 

 to get this feature activated on your account.

The `restrictions` config must be sent in Orders API request as shown below:

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]
-X POST https://api.razorpay.com/v1/orders
-H "content-type: application/json"
-d '{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
}'
```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
 })
```php: PHP
$api = new Api($key_id, $secret);

$api->order->create(array('receipt' => 'receipt#1', 'amount' => 50000, 'currency' => 'INR', 'checkout_config_id' => 'config_Ep0eOCwdSfgkco'));

```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("checkout_config_id", "config_Ep0eOCwdSfgkco");
Order order = client.Order.Create(options);

```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "INR",
  receipt: "receipt#1",
  checkout_config_id: "config_Ep0eOCwdSfgkco"
})

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

data := map[string]interface{}{
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "checkout_config_id": "config_Ep0eOCwdSfgkco"
}
body, err := client.Order.Create(data, nil)

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1', checkout_config_id: 'config_Ep0eOCwdSfgkco'

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

JSONObject orderRequest = new JSONObject();
orderRequest.put("amount", 50000); // amount in the smallest currency unit
orderRequest.put("currency", "INR");
orderRequest.put("receipt", "receipt#1");
orderRequest.put("checkout_config_id", "config_Ep0eOCwdSfgkco");

Order order = razorpay.orders.create(orderRequest);
```

[Learn more about Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

#### Sample Code

Let us assume you want to list all the payment methods offered by `HDFC` bank, allow card payments for `ICICI` bank only and hide `upi` payment method from the Checkout. You can do so using the code given below:

```html: Checkout Code

** Own Checkout

  var options = {
    "key": "", // Enter the Key ID generated from the Dashboard
    "amount": "1000",
    "currency": "INR",
    "description": "Acme Corp",
    "image": "http://example.com/image/rzp.jpg",
    "prefill":
    {
      "email": "gaurav.kumar@example.com",
      "contact": +919900000000,
    },
    config: {
      display: {
        blocks: {
          hdfc: { //name for HDFC block
            name: "Pay using HDFC Bank",
            instruments: [
              {
                method: "card",
                issuers: ["HDFC"]
              },
              {
                method: "netbanking",
                banks: ["HDFC"]
              },
            ]
          },
          other: { //  name for other block
            name: "Other Payment modes",
            instruments: [
              {
                method: "card",
                issuers: ["ICIC"]
              },
              {
                method: 'netbanking',
              }
            ]
          }
        },
        hide: [
          {
          method: "upi"
          }
        ],
        sequence: ["block.hdfc", "block.other"],
        preferences: {
          show_default_blocks: false // Should Checkout show its default blocks?
        }
      }
    },
    "handler": function (response) {
      alert(response.razorpay_payment_id);
    },
    "modal": {
      "ondismiss": function () {
        if (confirm("Are you sure, you want to close the form?")) {
          txt = "You pressed OK!";
          console.log("Checkout form closed by the user");
        } else {
          txt = "You pressed Cancel!";
          console.log("Complete the Payment")
        }
      }
    }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    rzp1.open();
    e.preventDefault();
  }

```

## Reference

All the supported payment methods and instruments are listed below:

## Supported Cards

Any card issued by the following banks:

**Bank Name** | **Code**
---
AU Small Finance Bank | `AUBL`
---
Aditya Birla Idea Payments Bank | `ABPB`
---
Airtel Payments Bank | `AIRP` 
---
Allahabad Bank | `ALLA` 
---
Andhra Bank | `ANDB` 
---
Andhra Bank Corporate Banking | `ANDB_C` 
---
Axis Bank | `UTIB` 
---
Bandhan Bank | `BDBL` 
---
Bank of Bahrein and Kuwait | `BBKM` 
---
Bank of Baroda Retail Banking | `BARB_R` 
---
Bank of India | `BKID` 
---
Bank of Maharashtra | `MAHB` 
--- 
Bassein Catholic Co-operative Bank | `BACB` 
---
Canara Bank | `CNRB` 
---
Catholic Syrian Bank | `CSBK` 
---
Central Bank of India | `CBIN` 
---
City Union Bank | `CIUB` 
---
Corporation Bank | `CORP` 
---
Cosmos Co-operative Bank | `COSB` 
---
DCB Bank | `DCBL` 
---
Dena Bank | `BKDN` 
---
Deutsche Bank | `DEUT` 
---
Development Bank of Singapore | `DBSS` 
---
Dhanlaxmi Bank | `DLXB` 
---
Dhanlaxmi Bank Corporate Banking | `DLXB_C` 
---
ESAF Small Finance Bank | `ESAF`
---
Equitas Small Finance Bank | `ESFB` 
---
Federal Bank | `FDRL` 
---
HDFC Bank | `HDFC` 
---
ICICI Bank | `ICIC` 
---
IDBI | `IBKL` 
---
IDBI Corporate Banking | `IBKL_C` 
---
IDFC FIRST Bank | `IDFB` 
---
Indian Bank | `IDIB` 
---
Indian Overseas Bank | `IOBA` 
---
Indusind Bank | `INDB` 
---
Jammu and Kashmir Bank | `JAKA`
---
Janata Sahakari Bank (Pune) | `JSBP` 
---
Kalupur Commercial Co-operative Bank | `KCCB` 
---
Kalyan Janata Sahakari Bank | `KJSB` 
---
Karnataka Bank | `KARB` 
---
Karur Vysya Bank | `KVBL` 
---
Kotak Mahindra Bank | `KKBK` 
---
Lakshmi Vilas Bank Corporate Banking | `LAVB_C` 
---
Lakshmi Vilas Bank Retail Banking | `LAVB_R` 
---
Mehsana Urban Co-operative Bank | `MSNU` 
---
NKGSB Co-operative Bank | `NKGS` 
---
North East Small Finance Bank | `NESF` 
---
PNB (Erstwhile-Oriental Bank of Commerce) | `ORBC` 
---
PNB (Erstwhile-United Bank of India) | `UTBI` 
---
Punjab & Sind Bank | `PSIB` 
---
Punjab National Bank Retail Banking | `PUNB_R` 
---
RBL Bank | `RATN` 
---
RBL Bank Corporate Banking | `RATN_C` 
---
Saraswat Co-operative Bank | `SRCB` 
---
Shamrao Vithal Bank Corporate Banking | `SVCB_C` 
---
Shamrao Vithal Co-operative Bank | `SVCB` 
---
South Indian Bank | `SIBL` 
---
Standard Chartered Bank | `SCBL` 
---
State Bank of Bikaner and Jaipur | `SBBJ` 
---
State Bank of Hyderabad | `SBHY` 
---
State Bank of India | `SBIN`
---
State Bank of Mysore | `SBMY`
---
State Bank of Patiala | `STBP` 
---
State Bank of Travancore | `SBTR`
---
Suryoday Small Finance Bank | `SURY` 
---
Syndicate Bank | `SYNB` 
---
Tamilnadu Mercantile Bank | `TMBL` 
---
Tamilnadu State Apex Co-operative Bank | `TNSC` 
---
Thane Bharat Sahakari Bank | `TBSB` 
---
Thane Janata Sahakari Bank | `TJSB` 
---
UCO Bank | `UCBA`
---
Union Bank of India | `UBIN` 
---
Varachha Co-operative Bank | `VARA`
---
Vijaya Bank | `VIJB` 
---
Yes Bank | `YESB`
--- 
Yes Bank Corporate Banking | `YESB_C`
---
Zoroastrian Co-operative Bank | `ZCBL` 

### Supported Card Types

- `credit` for credit cards
- `debit` for debit cards

### Supported Card Networks

**Card Network Name** | **Code**
---
American Express | `American Express`
---
Diners Club | `Diners Club`
---
Maestro | `Maestro`
---
MasterCard | `MasterCard`
---
RuPay | `RuPay`
---
Visa | `Visa`
---
Bajaj Finserv | `Bajaj Finserv`
---

## Supported Banks

**Bank Name** | **Code**
---
AU Small Finance Bank | `AUBL`
---
Aditya Birla Idea Payments Bank | `ABPB`
---
Airtel Payments Bank | `AIRP`
---
Allahabad Bank | `ALLA`
---
Andhra Bank | `ANDB`
---
Andhra Bank Corporate Banking | `ANDB_C`
---
Axis Bank | `UTIB` 
---
Bandhan Bank | `BDBL` 
---
Bank of Bahrain and Kuwait | `BBKM` 
---
Bank of Baroda Retail Banking | `BARB_R` 
---
Bank of India | `BKID` 
---
Bank of Maharashtra | `MAHB` 
--- 
Bassein Catholic Co-operative Bank | `BACB` 
---
Canara Bank | `CNRB` 
---
Catholic Syrian Bank | `CSBK` 
---
Central Bank of India | `CBIN` 
---
City Union Bank | `CIUB` 
---
Corporation Bank | `CORP` 
---
Cosmos Co-operative Bank | `COSB` 
---
DCB Bank | `DCBL` 
---
Dena Bank | `BKDN` 
---
Deutsche Bank | `DEUT` 
---
Development Bank of Singapore | `DBSS` 
---
Dhanlaxmi Bank | `DLXB` 
---
Dhanlaxmi Bank Corporate Banking | `DLXB_C` 
---
ESAF Small Finance Bank | `ESAF`
---
Equitas Small Finance Bank | `ESFB` 
---
Federal Bank | `FDRL` 
---
HDFC Bank | `HDFC` 
---
ICICI Bank | `ICIC` 
---
IDBI | `IBKL` 
---
IDBI Corporate Banking | `IBKL_C` 
---
IDFC FIRST Bank | `IDFB` 
---
Indian Bank | `IDIB` 
---
Indian Overseas Bank | `IOBA` 
---
Indusind Bank | `INDB` 
---
Jammu and Kashmir Bank | `JAKA`
---
Janata Sahakari Bank (Pune) | `JSBP` 
---
Kalupur Commercial Co-operative Bank | `KCCB` 
---
Kalyan Janata Sahakari Bank | `KJSB` 
---
Karnataka Bank | `KARB` 
---
Karur Vysya Bank | `KVBL` 
---
Kotak Mahindra Bank | `KKBK` 
---
Lakshmi Vilas Bank Corporate Banking | `LAVB_C` 
---
Lakshmi Vilas Bank Retail Banking | `LAVB_R` 
---
Mehsana Urban Co-operative Bank | `MSNU` 
---
NKGSB Co-operative Bank | `NKGS` 
---
North East Small Finance Bank | `NESF` 
---
PNB (Erstwhile-Oriental Bank of Commerce) | `ORBC` 
---
PNB (Erstwhile-United Bank of India) | `UTBI` 
---
Punjab & Sind Bank | `PSIB` 
---
Punjab National Bank Retail Banking | `PUNB_R` 
---
RBL Bank | `RATN` 
---
RBL Bank Corporate Banking | `RATN_C` 
---
Saraswat Co-operative Bank | `SRCB` 
---
Shamrao Vithal Bank Corporate Banking | `SVCB_C` 
---
Shamrao Vithal Co-operative Bank | `SVCB` 
---
South Indian Bank | `SIBL` 
---
Standard Chartered Bank | `SCBL` 
---
State Bank of Bikaner and Jaipur | `SBBJ` 
---
State Bank of Hyderabad | `SBHY` 
---
State Bank of India | `SBIN`
---
State Bank of Mysore | `SBMY`
---
State Bank of Patiala | `STBP` 
---
State Bank of Travancore | `SBTR`
---
Suryoday Small Finance Bank | `SURY` 
---
Syndicate Bank | `SYNB` 
---
Tamilnadu Mercantile Bank | `TMBL` 
---
Tamilnadu State Apex Co-operative Bank | `TNSC` 
---
Thane Bharat Sahakari Bank | `TBSB` 
---
Thane Janata Sahakari Bank | `TJSB` 
---
UCO Bank | `UCBA`
---
Union Bank of India | `UBIN` 
---
Varachha Co-operative Bank | `VARA`
---
Vijaya Bank | `VIJB` 
---
Yes Bank | `YESB`
--- 
Yes Bank Corporate Banking | `YESB_C`
---
Zoroastrian Co-operative Bank | `ZCBL` 

## Supported Wallets

**Wallet provider** | **Wallet Code**
---
PhonePe | `phonepe`
---
Mobikwik | `mobikwik`
---
PayZapp | `payzapp`
---
Ola Money | `olamoney`
---
Airtel Money | `airtelmoney`
---
Amazon Pay | `amazonpay`
---
JioMoney | `jiomoney`
---
PayPal | `paypal`

## Supported UPI Apps

App Name | Package Name
---
Google Pay | `com.google.android.apps.nbu.paisa.user`
---
BHIM | `in.org.npci.upiapp`
---
BHIM UCO | `com.lcode.ucoupi`
---
BHIM IOB | `com.euronet.iobupi`
---
BHIM CSB | `com.lcode.csbupi`
---
PhonePe | `com.phonepe.app`
---
Paytm | `net.one97.paytm`
---
ICICI iMobile | `com.csam.icici.bank.imobile`
---
ICICI Pocket | `com.icicibank.pockets`
---
SBI | `com.sbi.upi`
---
Axis Pay | `com.upi.axispay`
---
Axis | `com.axis.mobile`
---
Samsung Pay | `com.samsung.android.spay`
---
HDFC Bank | `com.snapwork.hdfc`
---
PayZapp | `com.hdfcbank.payzapp`
---
Bank of Baroda | `com.bankofbaroda.upi`
---
Freecharge | `com.freecharge.android`
---
KVB | `com.mycompany.kvb`
---
JK UPI | `com.fss.jnkpsp`
---
IDFC | `com.fss.idfcpsp`
---
IDFC First | `com.idfcfirstbank.optimus`
---
Yes Bank | `com.YesBank`
---
YesBank Iris | `in.irisbyyes.app`
---
Microsoft Kaizala | `com.microsoft.mobile.polymer`
---
Lotza | `com.upi.federalbank.org.lotza`
---
Fed Mobile | `com.fedmobile`
---
IndusInd Pay | `com.mgs.induspsp`
---
IndusInd Mobile | `com.fss.indus`
---
Indus Indie | `com.indusind.indie`
---
Wizely | `ai.wizely.android`
---
Amazon | `in.amazon.mShop.android.shopping`
---
RBL MoBank | `com.rblbank.mobank`
---
CRED | `com.dreamplug.androidapp`
---
Finserve | `in.bajajfinservmarkets.app`
---
Fampay | `com.fampay.in`
---
Mobikwik | `com.mobikwik_new`
---
PNB Bank | `com.mgs.pnbupi`
---
PNB One | `com.Version1`
---
Digibank | `com.dbs.in.digitalbank`
---
Jupiter | `money.jupiter`
---
Navi | `com.naviapp`
---
Slice | `indwin.c3.shareapp`
---
Tata Neu | `com.tatadigital.tcp`
---
Groww | `com.nextbillion.groww`
---
Shriram One | `com.shriram.one`
---
Fave | `com.pinelabs.fave`
---
Ultracash | `com.ultracash.payment.customer`
---
Timepay | `com.npst.timepay.society`
---
Goibibo | `com.goibibo`
---
Kotak | `com.msf.kbank.mobile`
---
Kotak811 | `com.kotak811mobilebankingapp.instantsavingsupiscanandpayrecharge`
---
DakPay | `com.fss.ippbpsp`
---
India Post | `com.iexceed.appzillon.ippbMB`
---
Canara | `com.canarabank.mobility`
---
MyJio | `com.jio.myjio`
---
IndOASIS | `com.IndianBank.IndOASIS`
---
Tvam | `com.atyati.tvamapp`
---
PopClub | `com.popclub.android`
---
Vyom | `com.infrasoft.uboi`
---
Super Money | `money.super.payments`
---
Omnicard | `com.eroute.omnicard`
---
AU0101 | `com.ausmallfinancebank.amb`
---
Cent Mobile | `com.infrasofttech.CentralBank`
---
Kiwi | `in.gokiwi.kiwitpap`
---
Digi Khata | `com.paypointz.wallet`
---
Moneyview | `com.whizdm.moneyview.loans`

### Supported UPI flows

Given below are the supported UPI flows: 

- `collect` for flow via VPA
- `intent` for flow via UPI apps
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     The supported UPI apps for intent on android mobile web are **Google Pay** and **PhonePe**.
>     

- `qr` for flow via UPI QR

## Supported PayLater Providers

**Provider name** | **Provider Code**
---
LazyPay | `lazypay`
---
PayPal | `paypal`

> **INFO**
>
> 
> **Handy Tips**
> 
> - PayPal now supports the Pay Later feature. You should enable both [PayPal](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets/paypal.md#to-enable-paypal) and the Pay Later options under Account & Settings → Pay Later (under Payment methods) on the Dashboard to enable the Pay Later feature.
> 

## Supported Cardless EMI Providers

Banks | Provider Code 
---
ICICI Bank | `icic` 
---
IDFC Bank | `idfb` 
---
HDFC Bank | `hdfc` 
---
Kotak Bank| `kkbk` 
---
axio | `walnut369` 
---
Fibe | `earlysalary` 
---
ZestMoney | `zestmoney` 

> **INFO**
>
> 
> **Handy Tips**
> 
> Know the standard interest rates charged by:
> - [Banks/Partners](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/faqs.md#1-what-are-the-standard-interest-rates-charged)
> - [Pay Later Providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/faqs.md#2-what-are-the-standard-interest-rates-charged)
> 

## Supported Apps

**App** | **Code**
---
CRED Pay | `cred`
