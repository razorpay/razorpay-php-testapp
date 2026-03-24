---
title: Methods API
description: Fetch the payment methods configured for your account using Razorpay APIs.
---

# Methods API

You can configure payment methods of your choice for collecting payments from your customers.

## Fetch Payment Methods

To fetch a list of payment methods enabled for your account, send the following request:

/methods

```curl: Curl
curl -u  \
-X GET https://api.razorpay.com/v1/methods \

```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]");

Methods response = instance.payments.get("methods", null);

```python: Python
import razorpay
client = razorpay.Client(auth=("YOUR_ID"))

client.payment.fetchPaymentMethods()

```php: PHP
$api = new Api($key_id);

$api->payment->fetchPaymentMethods();

```csharp: .NET
RazorpayClient client = new RazorpayClient(your_key_id);

Method methods = client.Method.Fetch();

```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID')

Razorpay::PaymentMethods.all()

```javascript: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID' })

instance.payments.fetchPaymentMethods();

```go: Go
import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID")

body, err := client.Payment.FetchMethods(nil, nil)

```json: Response
{
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
    "card_subtype": {
        "consumer": 1,
        "business": 0
    },
    "amex": false,
    "netbanking": {
        "AUBL": "AU Small Finance Bank",
        "ABPB": "Aditya Birla Idea Payments Bank",
        "AIRP": "Airtel Payments Bank",
        "ALLA": "Allahabad Bank",
        "ANDB": "Andhra Bank",
        "ANDB_C": "Andhra Bank - Corporate Banking",
        "UTIB": "Axis Bank",
        "BDBL": "Bandhan Bank",
        "BBKM": "Bank of Bahrein and Kuwait",
        "BARB_R": "Bank of Baroda - Retail Banking",
        "BKID": "Bank of India",
        "MAHB": "Bank of Maharashtra",
        "BACB": "Bassein Catholic Co-operative Bank",
        "CSBK": "CSB Bank",
        "CNRB": "Canara Bank",
        "CBIN": "Central Bank of India",
        "CIUB": "City Union Bank",
        "CORP": "Corporation Bank",
        "COSB": "Cosmos Co-operative Bank",
        "DCBL": "DCB Bank",
        "BKDN": "Dena Bank",
        "DEUT": "Deutsche Bank",
        "DBSS": "Development Bank of Singapore",
        "DLXB": "Dhanlaxmi Bank",
        "DLXB_C": "Dhanlaxmi Bank - Corporate Banking",
        "ESAF": "ESAF Small Finance Bank",
        "ESFB": "Equitas Small Finance Bank",
        "FDRL": "Federal Bank",
        "HDFC": "HDFC Bank",
        "ICIC": "ICICI Bank",
        "IBKL": "IDBI",
        "IBKL_C": "IDBI - Corporate Banking",
        "IDFB": "IDFC FIRST Bank",
        "IDIB": "Indian Bank",
        "IOBA": "Indian Overseas Bank",
        "INDB": "Indusind Bank",
        "JAKA": "Jammu and Kashmir Bank",
        "JSBP": "Janata Sahakari Bank (Pune)",
        "KCCB": "Kalupur Commercial Co-operative Bank",
        "KJSB": "Kalyan Janata Sahakari Bank",
        "KARB": "Karnataka Bank",
        "KVBL": "Karur Vysya Bank",
        "KKBK": "Kotak Mahindra Bank",
        "LAVB_C": "Lakshmi Vilas Bank - Corporate Banking",
        "LAVB_R": "Lakshmi Vilas Bank - Retail Banking",
        "MSNU": "Mehsana Urban Co-operative Bank",
        "NKGS": "NKGSB Co-operative Bank",
        "NESF": "North East Small Finance Bank",
        "ORBC": "Oriental Bank of Commerce",
        "PMCB": "Punjab & Maharashtra Co-operative Bank",
        "PSIB": "Punjab & Sind Bank",
        "PUNB_R": "Punjab National Bank - Retail Banking",
        "RATN": "RBL Bank",
        "RATN_C": "RBL Bank - Corporate Banking",
        "SRCB": "Saraswat Co-operative Bank",
        "SVCB_C": "Shamrao Vithal Bank - Corporate Banking",
        "SVCB": "Shamrao Vithal Co-operative Bank",
        "SIBL": "South Indian Bank",
        "SCBL": "Standard Chartered Bank",
        "SBBJ": "State Bank of Bikaner and Jaipur",
        "SBHY": "State Bank of Hyderabad",
        "SBIN": "State Bank of India",
        "SBMY": "State Bank of Mysore",
        "STBP": "State Bank of Patiala",
        "SBTR": "State Bank of Travancore",
        "SURY": "Suryoday Small Finance Bank",
        "SYNB": "Syndicate Bank",
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
    "emi_plans": {
        "KKBK": {
            "min_amount": 300000,
            "plans": {
                "3": 12,
                "6": 12,
                "9": 14,
                "12": 14,
                "18": 15,
                "24": 15
            }
        },
        "UTIB": {
            "min_amount": 300000,
            "plans": {
                "3": 13,
                "6": 13,
                "9": 14,
                "12": 14,
                "18": 15,
                "24": 15
            }
        },
        "INDB": {
            "min_amount": 200000,
            "plans": {
                "3": 13,
                "6": 13,
                "9": 13,
                "12": 13,
                "18": 15,
                "24": 15
            }
        },
        "RATN": {
            "min_amount": 100000,
            "plans": {
                "3": 13,
                "6": 13,
                "9": 13,
                "12": 13,
                "18": 13,
                "24": 13
            }
        },
        "ICIC": {
            "min_amount": 150000,
            "plans": {
                "3": 12.99,
                "6": 13.99,
                "9": 13.99,
                "12": 13.99,
                "24": 14.99,
                "18": 14.99
            }
        },
        "AMEX": {
            "min_amount": 500000,
            "plans": {
                "3": 12,
                "6": 12,
                "9": 12,
                "12": 12,
                "18": 12,
                "24": 12
            }
        },
        "HDFC": {
            "min_amount": 300000,
            "plans": {
                "12": 14,
                "18": 15,
                "24": 15,
                "3": 13,
                "6": 13,
                "9": 14
            }
        },
        "SCBL": {
            "min_amount": 250000,
            "plans": {
                "3": 13,
                "6": 13,
                "9": 14,
                "12": 14
            }
        },
        "YESB": {
            "min_amount": 250000,
            "plans": {
                "3": 12,
                "6": 12,
                "9": 13,
                "12": 13,
                "18": 14,
                "24": 15
            }
        },
        "BARB": {
            "min_amount": 250000,
            "plans": {
                "3": 13,
                "6": 13,
                "9": 13,
                "12": 13,
                "18": 15,
                "24": 15
            }
        }
    },
    "emi_options": {
        "KKBK": [
            {
                "duration": 3,
                "interest": 12,
                "subvention": "customer",
                "min_amount": 300000
            },
            ...
        ],
        "UTIB": [
            {
                "duration": 3,
                "interest": 12,
                "subvention": "customer",
                "min_amount": 300000
            },
            ...
        ],
        "INDB": [
            {
                "duration": 3,
                "interest": 13,
                "subvention": "customer",
                "min_amount": 200000
            },
            ...
        ],
        "RATN": [
            {
                "duration": 3,
                "interest": 13,
                "subvention": "customer",
                "min_amount": 100000
            },
            ...
        ],
        "ICIC": [
            {
                "duration": 3,
                "interest": 13,
                "subvention": "customer",
                "min_amount": 150000
            },
            ...
        ],
        "AMEX": [
            {
                "duration": 3,
                "interest": 12,
                "subvention": "customer",
                "min_amount": 500000
            },
            ...
        ],
        "HDFC": [
            {
                "duration": 12,
                "interest": 14,
                "subvention": "customer",
                "min_amount": 300000
            },
            ...
        ],
        "SCBL": [
            {
                "duration": 3,
                "interest": 13,
                "subvention": "customer",
                "min_amount": 250000
            },
            ...
        ],
        "YESB": [
            {
                "duration": 3,
                "interest": 12,
                "subvention": "customer",
                "min_amount": 250000
            },
           ...
        ],
        "BARB": [
            {
                "duration": 3,
                "interest": 13,
                "subvention": "customer",
                "min_amount": 250000
            },
           ...
        ]
    },
    "recurring": {
        "card": {
            "credit": [
                "MasterCard",
                "Visa"
            ]
        }
    },
    "upi_intent": true
}
```

### Next Steps

Now that you know the available payment methods, you can start creating payment requests using the [sample payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md) for the payment methods of your choice.

To get additional payment methods enabled for your account, contact our [Support team](https://razorpay.com/support/#request).
