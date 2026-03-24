---
title: Integrating Offers in Server-to-Server (S2S)
description: Integrate Offers in your payment flow while making direct API calls to Razorpay server.
---

# Integrating Offers in Server-to-Server (S2S)

You can integrate offers with your payment flows while integrating directly with our APIs. This is particularly useful, if you are a business that is **not PCI-compliant** and would like to avail the offers that the issuer of network might provide. In such cases, validations must be done once the payment creation request is sent. Razorpay gives you the flexibility to design offers such that you can decide whether to pass the payments or not based on the set validations while creating the offers.

## Prerequisites

Generate the API keys to start your integration. The keys are required for authenticating API requests with our servers.

Log in to the Dashboard to generate the API keys, if you have not done earlier. For making the direct API calls, you need the `Key_Secret` as well.

## Workflow

1. [Create Offers from Dashboard](#step-1-create-offers).
2. [Fetch all Offers](#step-2-fetch-all-offers).
3. [Create Orders to include the Offers in the payment request](#step-3-create-an-order).
4. [Validate Offers](#step-4-validate-offers).
5. [Fetch Orders](#step-5-fetch-orders).
6. [Create a Payment](#step-6-create-a-payment).
7. [Verify the Payment](#step-7-verify-the-payment).

### Step 1: Create Offers

[Create an offer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md) from the Dashboard.

![](/docs/assets/images/offers-offers-description.jpg)

### Step 2: Fetch all Offers

Use the following API to retrieve a list of active offers based on specific input parameters such as order details, payment methods or customer details.

/v1/engage/offers/list

```cURL: Curl

curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/engage/offers/list \
-H "Content-Type: application/json" \
-d '{
  "offers": [
    "offer_Pzu0Cma1qtTezH",
    "offer_PyIKlYOGXRxHsC"
  ],
  "order_id": "SDEA5645",
  "order": {
    "amount": "5000",
    "currency": "INR",
    "customer": {
      "contact": "9000090000",
      "email": "gaurav.kumar@example.com"
    }
  },
  "payment_instruments": [
    {
      "method": "card",
      "iins": [
        "123456"
      ],
      "card_tokens": [
        "tkn_89876654365"
      ]
    }
  ]
}'

```

```json: Success
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "entity": "offer",
      "id": "offer_PyIKlYOGXRxHsC",
      "name": "SummerSale2024",
      "display_name": "Summer Sale 2024",
      "description": "Get amazing discounts on summer essentials!",
      "status": "inactive",
      "inactivation_reason": "on_demand",
      "currency": "INR",
      "ends_at": 1727745600,
      "starts_at": 1719828000,
      "schedules": [
        {
          "period": "daily",
          "interval": [1, 3],
          "starts_at": 1719828000,
          "ends_at": 1727745600
        }
      ],
      "terms_condition": {
        "description": "Limited time offer. Terms and conditions apply.",
        "url": "https://example.com/terms-and-conditions"
      },
      "applicable_channels": [
        "online",
        "offline"
      ],
      "funding": {
        "type": "cofunded",
        "split": [
          {
            "bearer": "business",
            "type": "percentage",
            "value": 5000
          },
          {
            "bearer": "issuer",
            "type": "percentage",
            "value": 5000
          }
        ]
      },
      "benefits_types": [
        "instant_discount"
      ],
      "usage_limits": [
        {
          "on": "customer_id",
          "limit_type": "count",
          "limit_value": 1,
          "frequency_type": "monthly",
          "frequency_value": "3"
        }
      ],
      "rules": [
        {
          "filters": {
            "includes": {
              "order": {
                "min_amount": 50,
                "max_amount": 1000,
                "applies_to": "cart"
              },
              "payment_instruments": [
                {
                  "method": "card",
                  "card": {
                    "saved": true,
                    "international": false,
                    "issuers": ["HDFC"],
                    "types": ["credit", "debit"],
                    "networks": ["Visa", "Mastercard"],
                    "categories": ["Platinum"],
                    "iins": ["411111", "422222"],
                    "subtype": ["consumer"],
                    "cobranding_partners": ["onecard", "fimoney"],
                    "token": [],
                    "number": "1234567812345678"
                  },
                  "upi": {
                    "apps": ["gpay", "cred"],
                    "vpa": ["xyz@okaxis"],
                    "payer_account_types": ["bank", "wallet"],
                    "flow": ["collect", "intent"]
                  },
                  "bank_account": {
                    "account_numbers": [],
                    "ifscs": [],
                    "names": []
                  },
                  "emi": {
                    "emi_duration": [3, 6]
                  },
                  "wallet": {
                    "providers": [3, 6]
                  },
                  "netbanking": {
                    "banks": ["HDFC"]
                  }
                }
              ]
            },
            "excludes": {
              "order": {},
              "payment_instrument": {}
            }
          },
          "benefits": [
            {
              "offer_type": "instant_discount",
              "limit_type": "flat",
              "unit": "percentage",
              "value": 1020,
              "max_discount": 5000,
              "calculated_benefit_value": 50
            },
            {
              "offer_type": "cashback",
              "limit_type": "flat",
              "unit": "percentage",
              "value": 1020,
              "max_discount": 5000,
              "calculated_benefit_value": 50
            },
            {
              "offer_type": "already_discounted",
              "limit_type": "flat",
              "unit": "percentage",
              "value": 1020,
              "max_discount": 5000,
              "calculated_benefit_value": 50
            },
            {
              "offer_type": "low_cost_emi",
              "limit_type": "flat",
              "unit": "percentage",
              "value": 1020,
              "max_discount": 5000,
              "tenures": [],
              "calculated_benefit_value": 50
            },
            {
              "offer_type": "no_cost_emi",
              "limit_type": "flat",
              "unit": "percentage",
              "value": 1020,
              "max_discount": 5000,
              "tenures": [],
              "calculated_benefit_value": 50
            }
          ]
        }
      ],
      "display_config": {
        "offer_display_priority": 1,
        "should_validate": true,
        "is_hidden": false,
        "auto_apply": true
      }
    }
  ]
}

```json: Failure
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

`offers` _optional_
: `array` List of Offer ids to fetch. Can fetch a maximum of 20 offers per request.

`order_id` _optional_
: `string` Unique Razorpay `order_id` for which Offers are being fetched.

`order` _optional_
: `object` Order details for cases where `order_id` is not passed.

    `amount` _optional_
    : `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

    `currency` _optional_
    : `string` Currency code. Here it is, `INR`. Currently, only `INR` is supported.

    `customer` _optional_
    : `object` Customer details.

        `contact` _optional_
        : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919123456780`.

        `email` _optional_
        : `string` Customer's email address

`payment_instruments` _optional_
: `object` Details of payment instruments.

    `method` _optional_
    : `string` Payment method. For example, `card`, `upi`, `emi`, `netbanking`.

    `iins` _optional_
    : `integer` List of Issuer Identification Numbers (IINs). Only 6-digit IINs are supported.

    `card_tokens` _optional_
    : `array` Card tokens associated with the payment instrument.

    `count` _optional_
    : `integer` Number of Offers to fetch. Default: `10`. Maximum: `50`.

    `skip` _optional_
    : `integer` Number of Offers to skip.
    

  
### Response Parameters

`entity`
: `string` Represents the type of collection.

`count`
: `integer` Number of offers to be fetched.

`items`
: `array` List of offer objects.

    `entity`
    : `string` The entity being created. Here, it is `offer`.

    `id`
    : `string` The unique identifier of the offer.

    `name`
    : `string` Internal name of the offer.

    `display_name`
    : `string` Display name of the offer visible to customers.

    `description`
    : `string` Description of the offer.

    `status`
    : `enum` Current status of the offer. Possible values:
        - `created`
        - `active`
        - `inactive`

    `inactivation_reason`
    : `enum` Reason for inactivation. Possible values:
        - `expired`
        - `exhausted`
        - `on_demand`

    `currency`
    : `string` The currency in which the payment should be made by the customer. For example, `INR`.

    `starts_at`
    : `integer` Start time of the offer in UNIX timestamp.

    `ends_at`
    : `integer` End time of the offer in UNIX timestamp.

    `schedules` 
    : `object` List of schedule objects defining the cadence of the offer.

        `period`
        : `enum` Frequency of the offer activation. Possible values:
            - `daily`
            - `weekly`
            - `fortnightly`
            - `monthly`
            - `yearly`

        `interval`
        : `integer` Specifies the repeating pattern in terms of the period. Possible values:
            - `1-7` 
            - `1-31` 
            - `1-12`

        `starts_at` 
        : `integer` Start time of the schedule in UNIX timestamp.

        `ends_at` 
        : `integer` End time of the schedule in UNIX timestamp.

    `terms_condition`
    : `string` Terms and conditions of the offer.

        `description`
        : `string` Additional description about the offer.

        `url`
        : `string` URL linking to the full terms and conditions of the offer.

    `applicable_channels`
    : `enum` Specifies where the offer is applicable. Possible values:  
        - `online`  
        - `offline`

    `funding`
    : `object` Defines how the offer is funded and distributed amongst stakeholders.

        `type` 
        : `string` Specifies whether the offer is fully funded or co-funded. Possible values:  
            - `full`  
            - `cofunded`

        `split` 
        : `array` List of funding contributions from different entities.

            `bearer` 
            : `string` Defines the entity responsible for bearing the offer cost. Possible values:  
                - `business` 
                - `issuer`  
                - `network` 
                - `cobranding_partner`
                - `app`

            `type` 
            : `string` Specifies the type of funding applied. Possible values:  
                - `fixed`
                - `percentage`

            `value` 
            : `integer` Defines the funding amount or percentage contributed. For example: `50` for 50%. 

    `benefits_types`
    : `enum` List of benefit types. Possible values:
        - `instant_discount`
        - `cashback`
        - `no_cost_emi`
        - `low_cost_emi`

    `usage_limits`
    : `object` Defines the restrictions on offer usage across offer, customer and payment instrument.

        `on`
        : `enum` Level at which the usage limit applies. Possible values:
            - `offer`
            - `mobile number`
            - `card number`
            - `email`
            - `phone`
            - `customer id`

        `limit_type`
        : `enum` Type of usage limit. Possible values:
            - `COUNT`
            - `BUDGET`

        `limit_value`
        : `integer` Value corresponding to the limit. For example, `1` for single use.

        `frequency_type`
        : `enum` Frequency for the usage limit. Possible values:
            - `daily`
            - `weekly`
            - `monthly`
            - `yearly`

        `frequency_value`
        : `string` Value corresponding to the frequency type. Possible values:
            - `1-7` for daily
            - `1-31` for monthly
            - `1-12` for yearly

    `rules`
    : `object` Defines the validations and the benefits for an offer.

        `filters`
        : `object` Criteria for transactions to qualify for the offer. Possible values:
            - `min_amount`
            - `min_amount`
            - `applies_to`
            - `line_items`

            `includes`
            : `object` Criteria that qualify transactions for the offer.

                `order`
                : `object` Order-specific filters such as `min_amount` or `max_amount`.

                    `min_amount`
                    : `integer` Minimum order amount required to apply the offer. Amount is in the smallest currency sub-unit.

                    `max_amount`
                    : `integer` Maximum order amount eligible for the offer. Amount is in the smallest currency sub-unit.

                    `applies_to`
                    : `enum` Specifies what the offer applies to. Possible values:
                        - `cart`
                        - `products`

                `payment_instruments`
                : `object` Filters on payment methods and instruments. For example, `issuer`, `apps` or `vpa`.

                    `method`
                    : `string` Payment method. For example, `card`, `upi`, `emi`, `netbanking`.

                    `card`
                    : `object` Details associated with the card. Required if the payment method is `card`.

                        `saved`
                        : `boolean` Indicates if the offer promotes card tokenisation. Possible values:
                          - `true`
                          - `false`

                        `international`
                        : `boolean` Specifies if the card is international.

                        `issuers`
                        : `string` List of eligible card issuers For example, `HDFC`, `ICICI`, `SBI`.

                        `types`
                        : `enum` Type of card. Possible values:
                            - `debit`
                            - `credit`
                            - `prepaid`

                        `networks`
                        : `enum` Card networks. Possible values:
                            - `visa`
                            - `amex`
                            - `mastercard`
                            - `bajaj`
                            - `maestro`
                            - `rupay`
                            - `diners`

                        `categories`
                        : `string` Specifies the category of the card. For example: `Platinum`, `Infinia`.
                        
                        `iins`
                        : `integer` List of Issuer Identification Numbers (IINs). Only 6-digit IINs are supported.

                        `subtype`
                        : `enum` Specifies the subtype of the card. Possible values: 
                            - `consumer` 
                            - `business`

                        `cobranding_partners`
                        : `enum` List of co-branding partners associated with the card. For example: `onecard`, `flipkart`, `swiggy`.
                        
                        `tokens`
                        : `string` Card tokens for tokenized payments.

                        `number`
                        : `string` Reference number to fetch offers based on the card number.

                    `upi`
                    : `object` Contains details specific to UPI payments.

                        `psp`
                        : `enum` List of supported UPI apps. For example, `gpay`, `cred`.

                        `vpa_handle`
                        : `enum` List of supported VPA handles. For example: `xyz@okaxis`.

                        `payer_account_types`
                        : `string` Types of payer accounts. Possible values:
                            - `credit_card`
                            - `bank_account`
                            - `credit_line`
                            - `wallet`

                        `flow`
                        : `enum` Specifies the UPI payment flow. Possible values: 
                            - `collect`
                            - `intent`.

                    `bank_account`
                    : `object` Details related to bank account payments.

                        `account_numbers`
                        : `string` List of allowed account numbers.

                        `ifscs`
                        : `string` List of allowed IFSC codes.

                        `names`
                        : `string` List of allowed account holder names.

                    `emi`
                    : `object` Details of EMI payment method.

                        `emi_duration`
                        : `integer` List of available EMI durations in months. For example: `3`, `6`.

                    `wallet`
                    : `object` Details of wallet payment method. 

                        `providers`
                        : `string` List of supported wallet providers. For example, [Wallet providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).

                    `netbanking`
                    : `object` Details of net banking payment method.
                    
                        `banks`
                        : `enum` List of supported banks for net banking. For example: `HDFC`. 

            `excludes`
            : `object` Criteria that disqualify transactions for the offer.

                `orders`
                : `object` Specific exclusions on order details like `min_amount` or `max_amount`.

                `payment_instruments`
                : `object` Specific exclusions for payment instruments. For example, issuer, apps or VPA.tokens.
                
        `benefits`
        : `object` The details of the benefits of the offer.

            `offer_type`
            : `enum` Type of benefit provided. Possible values:
                - `instant_discount`
                - `cashback`
                - `already_discounted`
                - `low_cost_emi`
                - `no_cost_emi`

            `limit_type`
            : `enum` Type of benefit. Possible values: 
                - `flat`
                - `up_to`

            `unit`
            : `enum` Unit of the benefit. Possible values: 
                - `percentage`
                - `absolute`

            `value`
            : `integer` Value of the benefit. Amount is in the smallest currency sub-unit.

            `max_discount`
            : `integer` Maximum discount applicable for the benefit. Amount is in the smallest currency sub-unit.

            `calculated_benefit_value`
            : `integer` Actual benefit value applied to the transaction. Amount is in the smallest currency sub-unit.

    `display_config` 
    : `object` Contains configurations to control how the offer is displayed and validated.

        `offer_display_priority`
        : `integer` Determines the priority level for displaying the offer. A lower value indicates a higher priority. For example: `1`.

        `should_validate` 
        : `boolean` Specifies if additional customer-specific validation is required for the offer. Possible values:
          - `true`
          - `false`

        `is_hidden` 
        : `boolean` 	Determines whether the offer should be visible to customers in the checkout UI. Possible values:

          - `true` : The offer is hidden from the checkout UI. It can still be applied programmatically or automatically based on conditions.
          - `false` : The offer is visible and may be shown in the checkout UI for users to apply.

        `auto_apply`
        : `boolean` Specifies whether the offer should be automatically applied during checkout without requiring user action. Possible values:

          - `true` : The offer is auto-applied if it meets the eligibility criteria.
          - `false` : The offer requires the customer to explicitly select or input the offer/voucher during checkout.
    

  
### Error Response Parameters

Error | Cause | Solution
---
The Offer id does not exist. | The offer id passed in the request is invalid or does not exist. | Retry with a valid inquiry parameter.
---
The Offer id is invalid. | The offer id provided is not in a valid format. | Retry with a valid offer id.
---
The number of offers passed in the request must be less than 20. | The request contains more than the allowed limit of 20 offer ids. | Retry with an optimal length of offer IDs (1–20).
---
`offers` must be of type array. | The `offers` parameter in the request is not an array. | Pass the `offers` parameter as an array in the request.
---
The `order_id` does not exist. | The `order_id` provided in the request does not exist. | Retry with a valid `order_id`.
---
The `order_id` is invalid. | The `order_id` passed in the request is invalid or in an incorrect format. | Retry with a valid `order_id`.
---
Currency is required if the order amount is greater than 0. | The `currency` field is missing in the request when the order amount is greater than 0. | Provide a valid `currency` code (e.g., `INR`) in the request.
---
The `amount` must be at least 1.00 unit. | The order `amount` provided is less than the minimum allowed value of 1.00. | Retry with a valid order `amount` of at least 1.00 unit.
---
Contact number is required. | The `contact` number field is missing in the request. | Provide a valid `contact` number in the request.
---
The `contact` number can only contain digits and the + symbol. | The `contact` number contains invalid characters. | Retry with a valid `contact` number containing only digits and the + symbol.
---
The `contact` number should be at least 8 digits, including the country code. | The `contact` number provided is less than 8 digits. | Retry with a valid `contact` number of at least 8 digits, including the country code.
---
The `amount` is required. | The `amount` field is missing in the request. | Provide a valid `amount` in the request.
---
The `customer_id` is invalid. | The `customer_id` provided in the request is invalid. | Retry with a valid `customer_id`.
---
The `customer_id` does not exist. | The `customer_id` provided in the request does not exist. | Retry with a valid `customer_id`.
---
The `method` is invalid. | The payment method provided in the instruments array is invalid. | Provide a valid payment method in the instruments array.
---
The `provider` is invalid. | The `provider` specified in the instruments array is invalid. | Provide a valid `provider` in the instruments array.
---
The `issuer` is invalid. | The `issuer` provided in the instruments array is invalid. | Provide a valid `issuer` in the instruments array.
---
The card type is invalid. | The card type provided in the instruments array is invalid. | Provide a valid card type in the instruments array.
---
The `method` is not enabled for you. | The payment method is not enabled for your account. | Ensure the payment `method` is enabled for your account.
---
The `provider` is not enabled for you. | The provider is not enabled for your account. | Ensure the provider is enabled for your account.
---

    

### Step 3: Create an Order

After generating offers from the Dashboard, pass the `offer_id` in the order request attributes to the following endpoint:

/orders

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/orders \
-H "Content-Type: application/json" \
-d '{
  "amount": 1000,
  "currency": "INR",
  "offer_id": "offer_DtEhEm3XslgfXE"
}'
```java: Java
RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

        JSONObject orderRequest = new JSONObject();
        orderRequest.put("amount", 1000); // amount in the smallest currency unit
        orderRequest.put("currency", "INR");
        orderRequest.put("offers", "offer_DtEhEm3XslgfXE");

        Order order = razorpayclient.orders.create(orderRequest);
        System.out.print(order);
```python: Python 
import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.order.create({
  "amount": 50000,
  "currency": "INR",
  "receipt": "receipt#1",
  "offer_id": "offer_ANZoaxsOww2X53"
})
```php: PHP 
$api = new Api($key_id, $secret);

$api->order->create(array('amount' => 100, 'currency' => 'INR', 'offer_id'=> 'offer_JTUADI4ZWBGWur'));
```csharp: .NET
RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");

Dictionary options = new Dictionary();
options.Add("amount", 50000); // amount in the smallest currency unit
options.Add("receipt", "receipt#1");
options.Add("currency", "INR");
options.Add("offer_id", "offer_JTUADI4ZWBGWur");
Order order = client.Order.Create(options);
```ruby: Ruby
require "razorpay"
Razorpay.setup('YOUR_KEY_ID', 'YOUR_SECRET')

order = Razorpay::Order.create amount: 50000, currency: 'INR', receipt: 'receipt#1', offer_id: 'offer_ANZoaxsOww2X53'
```js: Node.js
var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.orders.create({
  amount: 50000,
  currency: "INR",
  receipt: "receipt#1",
  offer_id: "offer_ANZoaxsOww2X53"
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
```

```json: Success
{
  "id": "order_DtEkng132N71M8",
  "entity": "order",
  "amount": 1000,
  "amount_paid": 0,
  "amount_due": 1000,
  "currency": "INR",
  "receipt": null,
  "order_id": "order_CjyltuCttYiMe8",
  "offer_id": "offer_DtEhEm3XslgfXE",
  "offers": [
    "offer_DtEhEm3XslgfXE"
  ],
  "status": "created",
  "attempts": 0,
  "notes": [],
  "created_at": 1576577191
}

```json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "The amount must be at least INR 1.00",
    "source": "business",
    "step": "payment_initiation",
    "reason": "input_validation_failed",
    "metadata": {},
    "field": "amount"
  }
}
```

  
### Request Parameters

`amount` _mandatory_
: `string` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is 299, then pass `29900` in this field.

`currency` _mandatory_
: `integer` Currency code for the currency in which you want to accept the payment. For example, `INR`.

`offer_id` 
: `string` Unique identifier of the offer.
    

  
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
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`order_id`
: `json object` Collection of offers entity.

`offer_id`
: `string` Unique identifier of the offer.

`offers`
: `array` Unique identifier of the offer.

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
    

### Step 4: Validate Offers

Validate the applicability of an offer based on input details like order, customer or instrument data to ensure it is eligible for use.

/v1/engage/offers/validate

```cURL: Curl

curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/engage/offers/validate \
-H "Content-Type: application/json" \
-d '{
  "offers": [
    "offer_Pzu0Cma1qtTezH",
    "offer_PyIKlYOGXRxHsC"
  ],
  "order_id": "SDEA5645",
  "order": {
    "amount": "5000",
    "currency": "INR",
    "customer": {
      "contact": "9000090000",
      "email": "gaurav.kumar@example.com"
    }
  },
  "payment_instruments": [
    {
      "method": "card",
      "iins": [
        "123456"
      ],
      "card_tokens": [
        "tkn_89876654365"
      ]
    }
  ]
}'
```

```json: Success
{
  "valid_offers": {
    "entity": "collections",
    "count": 1,
    "items": [
      {
        "entity": "offer",
        "id": "offer_123456789",
        "name": "SummerSale2024",
        "validity": {
          "valid": true
        },
        "display_name": "Summer Sale 2024",
        "description": "Get amazing discounts on summer essentials!",
        "status": "inactive",
        "inactivation_reason": "on_demand",
        "currency": "INR",
        "ends_at": 1727745600,
        "starts_at": 1719828000,
        "schedules": [
          {
            "period": "daily",
            "interval": [1, 3],
            "starts_at": 1719828000,
            "ends_at": 1727745600
          }
        ],
        "terms_condition": {
          "description": "Limited time offer. Terms and conditions apply.",
          "url": "https://example.com/terms-and-conditions"
        },
        "applicable_channels": ["online", "offline"],
        "funding": {
          "type": "cofunded",
          "split": [
            {
              "bearer": "business",
              "type": "percentage",
              "value": 5000
            },
            {
              "bearer": "issuer",
              "type": "percentage",
              "value": 5000
            }
          ]
        },
        "benefits_types": ["instant_discount"],
        "usage_limits": [
          {
            "on": "customer_id",
            "limit_type": "count",
            "limit_value": 1,
            "frequency_type": "monthly",
            "frequency_value": "3"
          }
        ],
        "rules": [
          {
            "filters": {
              "includes": {
                "order": {
                  "min_amount": 50,
                  "max_amount": 1000,
                  "applies_to": "cart"
                },
                "payment_instruments": [
                  {
                    "method": "card",
                    "card": {
                      "saved": true,
                      "international": false,
                      "issuers": ["HDFC"],
                      "types": ["credit", "debit"],
                      "networks": ["Visa", "Mastercard"],
                      "categories": ["Platinum"],
                      "iins": ["411111", "422222"],
                      "subtype": ["consumer"],
                      "cobranding_partners": ["onecard", "fimoney"],
                      "token": [],
                      "number": "1234567812345678"
                    },
                    "upi": {
                      "apps": ["gpay", "cred"],
                      "vpa": ["xyz@okaxis"],
                      "payer_account_types": ["bank", "wallet"],
                      "flow": ["collect", "intent"]
                    },
                    "bank_account": {
                      "account_numbers": [],
                      "ifscs": [],
                      "names": []
                    },
                    "emi": {
                      "emi_duration": [3, 6]
                    },
                    "wallet": {
                      "providers": [3, 6]
                    },
                    "netbanking": {
                      "banks": ["HDFC"]
                    }
                  }
                ]
              },
              "excludes": {
                "order": {},
                "payment_instrument": {}
              }
            },
            "benefits": [
              {
                "offer_type": "instant_discount",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "cashback",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "already_discounted",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "low_cost_emi",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "tenures": [],
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "no_cost_emi",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "tenures": [],
                "calculated_benefit_value": 50
              }
            ]
          }
        ],
        "display_config": {
          "offer_display_priority": 1,
          "should_validate": true,
          "is_hidden": false,
          "auto_apply": true
        }
      }
    ]
  },
  "invalid_offers": {
    "entity": "collections",
    "count": 1,
    "items": [
      {
        "entity": "offer",
        "id": "offer_123456789",
        "name": "SummerSale2024",
        "validity": {
          "valid": false,
          "reason": "invalid_order_amount",
          "description": "The offer is not applicable on this order amount"
        },
        "display_name": "Summer Sale 2024",
        "description": "Get amazing discounts on summer essentials!",
        "status": "inactive",
        "inactivation_reason": "on_demand",
        "currency": "INR",
        "ends_at": 1727745600,
        "starts_at": 1719828000,
        "schedules": [
          {
            "period": "daily",
            "interval": [1, 3],
            "starts_at": 1719828000,
            "ends_at": 1727745600
          }
        ],
        "terms_condition": {
          "description": "Limited time offer. Terms and conditions apply.",
          "url": "https://example.com/terms-and-conditions"
        },
        "applicable_channels": ["online", "offline"],
        "funding": {
          "type": "cofunded",
          "split": [
            {
              "bearer": "business",
              "type": "percentage",
              "value": 5000
            },
            {
              "bearer": "issuer",
              "type": "percentage",
              "value": 5000
            }
          ]
        },
        "benefits_types": ["instant_discount"],
        "usage_limits": [
          {
            "on": "customer_id",
            "limit_type": "count",
            "limit_value": 1,
            "frequency_type": "monthly",
            "frequency_value": "3"
          }
        ],
        "rules": [
          {
            "filters": {
              "includes": {
                "order": {
                  "min_amount": 50,
                  "max_amount": 1000,
                  "applies_to": "cart"
                },
                "payment_instruments": [
                  {
                    "method": "card",
                    "card": {
                      "saved": true,
                      "international": false,
                      "issuers": ["HDFC"],
                      "types": ["credit", "debit"],
                      "networks": ["Visa", "Mastercard"],
                      "categories": ["Platinum"],
                      "iins": ["411111", "422222"],
                      "subtype": ["consumer"],
                      "cobranding_partners": ["onecard", "fimoney"],
                      "token": [],
                      "number": "1234567812345678"
                    },
                    "upi": {
                      "apps": ["gpay", "cred"],
                      "vpa": ["xyz@okaxis"],
                      "payer_account_types": ["bank", "wallet"],
                      "flow": ["collect", "intent"]
                    },
                    "bank_account": {
                      "account_numbers": [],
                      "ifscs": [],
                      "names": []
                    },
                    "emi": {
                      "emi_duration": [3, 6]
                    },
                    "wallet": {
                      "providers": [3, 6]
                    },
                    "netbanking": {
                      "banks": ["HDFC"]
                    }
                  }
                ]
              },
              "excludes": {
                "order": {},
                "payment_instrument": {}
              }
            },
            "benefits": [
              {
                "offer_type": "instant_discount",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "cashback",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "already_discounted",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "low_cost_emi",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "tenures": [],
                "calculated_benefit_value": 50
              },
              {
                "offer_type": "no_cost_emi",
                "limit_type": "flat",
                "unit": "percentage",
                "value": 1020,
                "max_discount": 5000,
                "tenures": [],
                "calculated_benefit_value": 50
              }
            ]
          }
        ],
        "display_config": {
          "offer_display_priority": 1,
          "should_validate": true,
          "is_hidden": false,
          "auto_apply": true
        }
      }
    ]
  }
}

```json: Failure
{
  "offers": {
    "entity": "collection",
    "count": 1,
    "items": [
      {
        "entity": "offer",
        "id": "offer_PV5EjKswORXuEF",
        "validity": {
          "is_valid": false,
          "reason": "expired",
          "description": "Offer has expired"
        }
      }
    ]
  }
}
```

  
### Request Parameters

`offers` _mandatory_
: `array` Array of Offer id to fetch. Maximum: 20 Offers per request.

`order_id` _optional_
: `string` Unique Razorpay `order_id` for which Offers are being fetched.

`order` _optional_
: `object` Order details for cases where `order_id` is not passed.

    `amount` _optional_
    : `integer` The amount for which the order was created, in currency subunits. For example, for an amount of , enter `29500`.

    `currency` _optional_
    : `string` Currency code. Here it is, `INR`. Currently, only `INR` is supported.

    `customer` _optional_
    : `object` Customer details.

        `contact` _optional_
        : `string` The customer's phone number. A maximum length of 15 characters including country code. For example, `+919123456780`.

        `email` _optional_
        : `string` Customer's email address

`payment_instruments` _mandatory_
: `object` Details of payment instruments.

    `method` _optional_
    : `string` Payment method. For example, `card`, `upi`, `emi`, `netbanking`.

    `iins` _optional_
    : `integer` List of Issuer Identification Numbers (IINs). Only 6-digit IINs are supported.

    `card_tokens` _optional_
    : `array` Card tokens associated with the payment instrument.

    `count` _optional_
    : `integer` Number of Offers to fetch. Default: `10`. Maximum: `50`.

    `skip` _optional_
    : `integer` Number of Offers to skip.
    

  
### Response Parameters

`valid_offers`
: `array` List of applicable offers.

  `entity`
  : `string` Represents the type of collection.

  `count`
  : `integer` Number of valid offers.

  `items`
  : `array` List of valid offer objects.

    `entity`
    : `string` The entity being created. Here, it is `offer`.

    `id`
    : `string` The unique identifier of the offer.

    `name`
    : `string` Internal name of the offer.

    `validity`
    : `object` Object containing offer validity details.

      `valid`
      : `boolean` Indicates whether the offer is valid. Possible values:
          - `true`: Offer is valid.
          - `false`: Offer is invalid.

    `display_name`
    : `string` Display name of the offer visible to customers.

    `description`
    : `string` Description of the offer.

    `status`
    : `enum` Current status of the offer. Possible values:
        - `created`
        - `active`
        - `inactive`

    `inactivation_reason`
    : `enum` Reason for inactivation. Possible values:
        - `expired`
        - `exhausted`
        - `on_demand`

    `currency`
    : `string` The currency in which the payment should be made by the customer. For example, `INR`. See the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

    `starts_at`
    : `integer` Start time of the offer in UNIX timestamp.

    `ends_at`
    : `integer` End time of the offer in UNIX timestamp.

    `schedules` 
    : `object` List of schedule objects defining the cadence of the offer.

        `period`
        : `enum` Frequency of the offer activation. Possible values:
            - `daily`
            - `weekly`
            - `fortnightly`
            - `monthly`
            - `yearly`

        `interval`
        : `integer` Specifies the repeating pattern in terms of the period. Possible values:
            - `1-7` 
            - `1-31` 
            - `1-12`

        `starts_at` 
        : `integer` Start time of the schedule in UNIX timestamp.

        `ends_at` 
        : `integer` End time of the schedule in UNIX timestamp.

    `terms_condition`
    : `string` Terms and conditions of the offer.

        `description`
        : `string` Additional description about the offer.

        `url`
        : `string` URL linking to the full terms and conditions of the offer.

    `applicable_channels`
    : `enum` Specifies where the offer is applicable. Possible values:  
        - `online`  
        - `offline`

    `funding`
    : `object` Defines how the offer is funded and distributed amongst stakeholders.

        `type` 
        : `string` Specifies whether the offer is fully funded or co-funded. Possible values:  
            - `full`  
            - `cofunded`

        `split` 
        : `array` List of funding contributions from different entities.

            `bearer` 
            : `string` Defines the entity responsible for bearing the offer cost. Possible values:  
                - `business` 
                - `issuer`  
                - `network` 
                - `cobranding_partner`
                - `app`

            `type` 
            : `string` Specifies the type of funding applied. Possible values:  
                - `fixed`
                - `percentage`

            `value` 
            : `integer` Defines the funding amount or percentage contributed. For example: `50` for 50%. 

    `benefits_types`
    : `enum` List of benefit types. Possible values:
        - `instant_discount`
        - `cashback`
        - `no_cost_emi`
        - `low_cost_emi`

    `usage_limits`
    : `object` Defines the restrictions on offer usage across offer, customer, payment instrument.

        `on`
        : `enum` Level at which the usage limit applies. Possible values:
            - `offer`
            - `mobile number`
            - `card number`
            - `email`
            - `phone`
            - `customer id`

        `limit_type`
        : `enum` Type of usage limit. Possible values:
            - `COUNT`
            - `BUDGET`

        `limit_value`
        : `integer` Value corresponding to the limit. For example, `1` for single use.

        `frequency_type`
        : `enum` Frequency for the usage limit. Possible values:
            - `daily`
            - `weekly`
            - `monthly`
            - `yearly`

        `frequency_value`
        : `string` Value corresponding to the frequency type. Possible values:
            - `1-7` for daily
            - `1-31` for monthly
            - `1-12` for yearly

    `rules`
    : `object` Defines the validations and the benefits for an offer.

        `filters`
        : `object` Criteria for transactions to qualify for the offer. Possible values:
            - `min_amount`
            - `min_amount`
            - `applies_to`
            - `line_items`

            `includes`
            : `object` Criteria that qualify transactions for the offer.

                `order`
                : `object` Order-specific filters such as `min_amount` or `max_amount`.

                    `min_amount`
                    : `integer` Minimum order amount required to apply the offer. Amount is in the smallest currency sub-unit.

                    `max_amount`
                    : `integer` Maximum order amount eligible for the offer. Amount is in the smallest currency sub-unit.

                    `applies_to`
                    : `enum` Specifies what the offer applies to. Possible values:
                        - `cart`
                        - `products`

                `payment_instruments`
                : `object` Filters on payment methods and instruments. For example, `issuer`, `apps` or `vpa`.

                    `method`
                    : `string` Payment method. For example, `card`, `upi`, `emi`, `netbanking`.

                    `card`
                    : `object` Details associated with the card. Required if the payment method is `card`.

                        `saved`
                        : `boolean` Indicates if the offer promotes card tokenisation. Possible values:
                          - `true`
                          - `false`

                        `international`
                        : `boolean` Specifies if the card is international.

                        `issuers`
                        : `string` List of eligible card issuers For example, `HDFC`, `ICICI`, `SBI`.

                        `types`
                        : `enum` Type of card. Possible values:
                            - `debit`
                            - `credit`
                            - `prepaid`

                        `networks`
                        : `enum` Card networks. Possible values:
                            - `visa`
                            - `amex`
                            - `mastercard`
                            - `bajaj`
                            - `maestro`
                            - `rupay`
                            - `diners`

                        `categories`
                        : `string` Specifies the category of the card. For example: `Platinum`, `Infinia`.
                        
                        `iins`
                        : `integer` List of Issuer Identification Numbers (IINs). Only 6-digit IINs are supported.

                        `subtype`
                        : `enum` Specifies the subtype of the card. Possible values: 
                            - `consumer` 
                            - `business`

                        `cobranding_partners`
                        : `enum` List of co-branding partners associated with the card. For example: `onecard`, `flipkart`, `swiggy`.
                        
                        `tokens`
                        : `string` Card tokens for tokenized payments.

                        `number`
                        : `string` Reference number to fetch offers based on the card number.

                    `upi`
                    : `object` Contains details specific to UPI payments.

                        `psp`
                        : `enum` List of supported UPI apps. For example, `gpay`, `cred`.

                        `vpa_handle`
                        : `enum` List of supported VPA handles. For example: `xyz@okaxis`.

                        `payer_account_types`
                        : `string` Types of payer accounts. Possible values:
                            - `credit_card`
                            - `bank_account`
                            - `credit_line`
                            - `wallet`

                        `flow`
                        : `enum` Specifies the UPI payment flow. Possible values: 
                            - `collect`
                            - `intent`.

                    `bank_account`
                    : `object` Details related to bank account payments.

                        `account_numbers`
                        : `string` List of allowed account numbers.

                        `ifscs`
                        : `string` List of allowed IFSC codes.

                        `names`
                        : `string` List of allowed account holder names.

                    `emi`
                    : `object` Details of EMI payment method.

                        `emi_duration`
                        : `integer` List of available EMI durations in months. For example: `3`, `6`.

                    `wallet`
                    : `object` Details of wallet payment method. 

                        `providers`
                        : `string` List of supported wallet providers. For example, [Wallet providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/wallets.md#supported-wallets).

                    `netbanking`
                    : `object` Details of net banking payment method.
                    
                        `banks`
                        : `enum` List of supported banks for net banking. For example: `HDFC`. 

            `excludes`
            : `object` Criteria that disqualify transactions for the offer.

                `orders`
                : `object` Specific exclusions on order details like `min_amount` or `max_amount`.

                `payment_instruments`
                : `object` Specific exclusions for payment instruments. For example, issuer, apps or VPA.tokens.
                
        `benefits`
        : `object` The details of the benefits of the offer.

            `offer_type`
            : `enum` Type of benefit provided. Possible values:
                - `instant_discount`
                - `cashback`
                - `already_discounted`
                - `low_cost_emi`
                - `no_cost_emi`

            `limit_type`
            : `enum` Type of benefit. Possible values: 
                - `flat`
                - `up_to`

            `unit`
            : `enum` Unit of the benefit. Possible values: 
                - `percentage`
                - `absolute`

            `value`
            : `integer` Value of the benefit. Amount is in the smallest currency sub-unit.

            `max_discount`
            : `integer` Maximum discount applicable for the benefit. Amount is in the smallest currency sub-unit.

            `calculated_benefit_value`
            : `integer` Actual benefit value applied to the transaction. Amount is in the smallest currency sub-unit.

    `display_config` 
    : `object` Contains configurations to control how the offer is displayed and validated.

        `offer_display_priority`
        : `integer` Determines the priority level for displaying the offer. A lower value indicates a higher priority. For example: `1`.

        `should_validate` 
        : `boolean` Specifies if additional customer-specific validation is required for the offer. Possible values:
          - `true`
          - `false`

        `is_hidden` 
        : `boolean` 	Determines whether the offer should be visible to customers in the checkout UI. Possible values:

          - `true` : The offer is hidden from the checkout UI. It can still be applied programmatically or automatically based on conditions.
          - `false` : The offer is visible and may be shown in the checkout UI for users to apply.

        `auto_apply`
        : `boolean` Specifies whether the offer should be automatically applied during checkout without requiring user action. Possible values:

          - `true` : The offer is auto-applied if it meets the eligibility criteria.
          - `false` : The offer requires the customer to explicitly select or input the offer/voucher during checkout.

`invalid_offers`
: `array` List of offers that are not applicable.

  `entity`
  : `string` Represents the type of collection.

  `count`
  : `integer` Number of invalid offers.

  `items`
  : `array` List of invalid offer objects. 
    

  
### Error Response Parameters

Error | Cause | Solution
---
Invalid offer id. | The offer id provided in the request is invalid. | Retry with a valid offer id.
---
Missing voucher code. | The voucher code is missing in the request. | Retry with a valid voucher code.
---
Missing user id. | The user id is missing in the request. | Retry with a valid user ID.
---
Missing user type. | The user type is missing in the request. | Retry with a valid user type.
---
Invalid user type. | The user type provided in the request is invalid. | Retry with a valid user type.
---
No active Offers found. | No active Offers are available for the provided details. | Retry with a valid voucher code and contact.
---
Missing fact: customer. | The request is missing customer fact values. | Retry with valid customer fact values.
---
Missing fact: card number. | The request is missing a required card number. | Retry with a valid card number.
---
Missing fact: email. | The request is missing a required email address. | Retry with a valid email address.
---

    

### Step 5: Fetch Orders

Fetches the details of a specific order using the `order_id`. When the `expand[]=offers` query parameter is included, this API also returns detailed information about the offers applied to the order.

/v1/orders/:id/?expand[]=offers

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET]\
-X GET https://api.razorpay.com/v1/orders/:id/?expand[]=offers
```

``` json: Success
{
  "id": "order_LesrAVQhpn0Byh",
  "entity": "order",
  "amount": 1000,
  "amount_paid": 900,
  "amount_due": 0,
  "currency": "INR",
  "receipt": "receipt#1",
  "offers_applied": {
    "entity": "collection",
    "count": 1,
    "items": [
      {
        "entity": "offers",
        "id": "offer_LesXV0iK2XmTaw",
        "status": "redeemed",
        "benefits": [
          {
            "offer_type": "instant_discount",
            "limit_type": "flat",
            "unit": "percentage",
            "value": 1020,
            "max_discount": 5000,
            "calculated_benefit_value": 50
          }
        ]
      }
    ]
  },
  "customer": {
    "contact": "+91999999999",
    "email": "anon@gmail.com"
  },
  "status": "paid",
  "attempts": 1,
  "notes": [],
  "created_at": 1681740008
}
```

  
### Query Parameter

`expand[]` _optional_
: `string` Use `expand[]=offers` to include the `offers_applied` object in the response. 
    

  
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
: `string` ISO code for the currency in which you want to accept the payment. The default length is 3 characters.

`receipt`
: `string` Receipt number that corresponds to this order. Can have a maximum length of 40 characters and has to be unique.

`offers_applied`
: `json object` Collection of offers entity.

  `entity`
  : `string` Represents the type of collection.

  `count`
  : `integer` Number of offers to be fetched.

  `items`
  : `array` List of offer objects.

     `entity`
     : `string` Represents the type of collection. Here it is `offers`.

     `id`
     : `string` Unique identifier of the offer.

     `status`
     : `string` The status of the offer.

     `benefits`
     : `object` The details of the benefits of the offer.

          `offer_type`
          : `enum` Type of benefit provided. Possible values:
              - `instant_discount`
              - `cashback`
              - `already_discounted`
              - `low_cost_emi`
              - `no_cost_emi`
              - `voucher`

          `limit_type`
          : `enum` Type of benefit. Possible values: 
              - `flat`
              - `up_to`

          `unit`
          : `enum` Unit of the benefit. Possible values: 
              - `percentage`
              - `absolute`

          `value`
          : `integer` Value of the benefit. Amount is in the smallest currency sub-unit.

          `max_discount`
          : `integer` Maximum discount applicable for the benefit. Amount is in the smallest currency sub-unit.

          `calculated_benefit_value`
          : `integer` Actual benefit value applied to the transaction. Amount is in the smallest currency sub-unit.

`customer`
: `string` Details of the customer.

  `contact`
  : `string` The customer's phone number. For example, `+919000090000`.

  `email`
  : `string` The customer's email address. For example, `gaurav.kumar@example.com`.

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
    

### Step 6: Create a Payment

Send the following attributes required to create a payment at the following endpoint:

/payments/create/json

#### Sample Code

```curl: Curl
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/create/json \
-H "Content-Type: application/json" \
-d'{
  "amount": 1000,
  "currency": "INR",
  "contact": 9000090000,
  "email": "gaurav.kumar@example.com",
  "order_id": "order_CjyltuCttYiMe8",
  "offer_id": "offer_DtEhEm3XslgfXE",
  "method": "netbanking",
  "bank": "UTIB"
}'

```json: Success
{
  "razorpay_payment_id": "pay_OsfBn07R1sgSXQ",
  "next": [
    {
      "action": "redirect",
      "url": "https://api.razorpay.com/v1/payments/OsfBn07R1sgSXQ/authenticate"
    }
  ]
}
``` json: Failure
{
  "error": {
    "code": "BAD_REQUEST_ERROR",
    "description": "Offer Maximum Usage limit exceeded"
  }
}
```

  
### Request Parameters

`key_id` _mandatory_
: `string` The Key id that you have generated from the **API Keys** tab in the Dashboard.

`amount` _mandatory_
: `integer` Payment amount in the smallest currency sub-unit. For example, if the amount to be charged is , then pass `29900` in this field.

`currency` _mandatory_
: `string` Currency code for the currency in which you want to accept the payment. For example, `INR`.

`order_id` _mandatory_
: `string` Unique identifier of the Order.
 Know more about [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/orders.md).

`offer_id` 
: `string` Unique identifier of the offer.

`ip` _mandatory_
: `string` Customer's IP address.

`email` _mandatory_
: `string` Email address of the customer. Maximum length supported is 40 characters. 

`contact` _mandatory_
: `string`  Phone number of the customer. Maximum length supported is 15 characters, inclusive of country code. 

`authentication` _optional_
: `object` Details of the authentication channel.

    `authentication_channel`
    : `string` The authentication channel for the payment. Possible values:
      - `browser` (default)
      - `app`

`browser` _mandatory_
: `object` Information regarding the customer's browser. This parameter need not be passed when `authentication_channel=app`.

    `java_enabled`
    : `boolean` Indicates whether the customer's browser supports Java. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser supports Java.
        - `false`: Customer's browser does not support Java.

    `javascript_enabled`
    : `boolean` Indicates whether the customer's browser can execute JavaScript. Obtained from the `navigator` HTML DOM object. Possible values:
        - `true`: Customer's browser can execute JavaScript.
        - `false`: Customer's browser cannot execute JavaScript.

    `timezone_offset`
    : `integer` Time difference between UTC time and the cardholder's browser local time. Obtained from the `getTimezoneOffset()` method applied to the `Date` object.

    `screen_width`
    : `integer` Total width of the payer's screen in pixels. Obtained from the `screen.width` HTML DOM property.

    `screen_height`
    : `integer` Obtained from the `navigator` HTML DOM object.

    `color_depth`
    : `integer` Obtained from the payer's browser using the `screen.colorDepth` HTML DOM property.

    `language`
    : `string` Obtained from the payer's browser using the `navigator.language` HTML DOM property. Maximum limit of 8 characters.

`method` _mandatory_
: `string` Name of the payment method. Possible values are: 
    - `card` 
    - `netbanking`
    - `wallet`
    - `emi`
    - `upi`
    - `cardless_emi`
    - `paylater`

`card`
:  Details associated with the card. Required if the payment method is `card`.

    `number` _mandatory_
    : `string` Unformatted card number. Required if the method is `card`.

    `name` _mandatory_
    : `string` Name of the cardholder. Required if the method is `card`.

    `expiry_month` _mandatory_
    : `integer` Expiry month for card in `MM` format. Required if the method is `card`.

    `expiry_year` _mandatory_
    : `string` Expiry year for card in `YY` format. Required if the method is `card`.

    `cvv` _mandatory_
    : `string` CVV printed on the back of card. Required if the method is `card`.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     - CVV is not required by default for Visa and Amex tokenised cards.
>     - To enable CVV-less flow for Rupay and Mastercard, contact our [support team](https://razorpay.com/support/#request).
>     - CVV is mandatory for Diners tokenised cards.
>     - CVV is an optional field. Skip passing the `cvv` parameter to Razorpay to implement this change.    
>     

`bank`
: `string` Bank code of the bank used for the payment. Required if the method is `netbanking`.

`bank_account`
: The details of the bank account that should be passed in the request. Required if the method is `emandate`.

    `account_number` _mandatory_
    : `string` Bank account number used to initiate the payment.

    `ifsc` _mandatory_
    : `string` IFSC of the bank used to initiate the payment.

    `name` _mandatory_
    : `string` Name associated with the bank account used to initiate the payment.

`emi_duration`
: `string` The EMI duration in months. Required if the method is `emi`.

`vpa`
: `string` Virtual payment address of the customer. Required if the method is `upi`.

`wallet`
: `string` Wallet code for the wallet used for the payment. Required if the method is `wallet`.

`notes` _optional_
: `object` Key-value object used for passing tracking info. Refer to [Notes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/understand.md#notes) for more details.

`callback_url` _optional_
: `string` URL endpoint where Razorpay will submit the final payment status.

`referrer` _optional_
: `string` Referrer header passed by the client's browser.

`user_agent` _optional_
: `string` Customer user-agent. 
    

  
### Response Parameters

If the payment request is valid, the response contains the following fields.

`razorpay_payment_id`
: `string` Unique identifier of the payment. Present for all responses.

`next`
: `array` A list of action objects available to you to continue the payment process. Present when the payment requires further processing.

    `action`
    : `string` An indication of the next step available to you to continue the payment process. The value here is `redirect`. Use this URL to redirect customer to the bank page.

    `url`
    : `string`  URL to be used for the action indicated. 
    

  
### Response Types

`2OO OK`
: In this case, the response contains `200 OK` code and the HTML content that needs to be opened in the customer's browser. This HTML content contains form-fields, which will be automatically posted to the redirect URL for the customer to complete the payment.

`400 Bad Request`
: This can happen when erroneous parameters are passed in the request. For example, when the limit set in Offers is exceeded:

Know more about the [error codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#error-codes).

The HTML form returned in the response should be opened in the customer's browser. The customer completes the payment on the displayed page.
    

### Step 7: Verify the Payment

Once the customer completes the payment, a `POST` request is sent to the `callback_url` provided in the [payment create request](#step-3-create-a-payment). The data contained in the `POST` request depends on the **success** or **failure** of the payment made by the customer.

## Next Steps

After the customer has availed the offers and made the payment on the Checkout, you can track the status of the payments:

- From the Dashboard.
- By [configuring webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md).
- By polling our [payment APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api.md#fetch-payments-based-on-orders).

### Related Information

- [About Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers.md)
- [Create Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md)
- [Tutorial - How to Create Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/tutorial.md)
