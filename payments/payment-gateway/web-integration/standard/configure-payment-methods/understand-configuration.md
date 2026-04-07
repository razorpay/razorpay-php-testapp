---
title: Understand the Configuration
description: Understand the building blocks that are required to build a configuration of your choice.
---

# Understand the Configuration

Let us understand the building blocks that are required to build a configuration of your choice:

1. [Payment Methods](#payment-methods)
2. [Payment Instruments](#payment-instruments)
3. [Blocks](#blocks)
4. [Sequence](#sequence)
5. [Preferences](#preferences)

## Payment Methods

Before deciding the payment methods or payment instruments that you want to configure on the Checkout, refer to the [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md) supported by Razorpay.

## Payment Instruments

A payment instrument is a combination of the payment method and its associated properties. For example, a payment instrument can be an **AXIS Debit card**, where **card** is the payment method and the issuer (AXIS bank) is the associated **instrument**.

An instrument is a JSON object with a key named `method`. Each method and its associated properties are described in the sections below:

### Card

Payment instruments for the `method: card` are listed below:

Name | Type | Description | Values | Examples
---
issuers | array | List of issuers that are allowed | [Any bank code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-banks) | `issuers: ["HDFC", "ICIC"]`
---
networks | array | List networks that are allowed | [Any card network](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-card-networks) | `networks: ["Visa", "MasterCard"]`
---
types | array | List of card types that are allowed | [Any card type](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-cards) | `types: ["credit", "debit"]`

```js: JavaScript
// beginning of the code
....
card: { \\name for cards
    name: "Pay Via Cards"
    instruments: [
      {
        method: "card",
        issuers: ["HDFC"],
        networks: ["Visa"],
        types: ["debit","credit"]
      }
    ]
},
...
//rest of the code
```

### Netbanking

Payment instruments for the `method: netbanking` are listed below:

Name | Type | Description | Values | Examples
---
banks | array`` | List of all banks that are allowed | [Any bank code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-banks) | `banks: ["HDFC", "ICIC"]`

### Wallet

Payment instruments for the `method: wallet` are listed below:

Name | Type | Description | Values | Examples
---
wallets | string | Wallets to be allowed | [Any wallet code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-wallets) | `wallets: ["payzapp"]`

### UPI

Payment instruments for the  `method: upi` are listed below:

Name | Type | Description | Values | Examples
---
flows | string | Flows to show | [Any supported UPI flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-upi-flows) | `flows: [ "qr"]`
---
apps | string | Apps to show, for intent | [Any supported UPI apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-upi-apps) | `apps: ["google_pay", "phonepe"]`

### EMI

Payment instruments for the  `method: emi` are listed below:

Name | Type | Description | Values | Examples
---
issuers | array``  | Providers to be allowed | [Any EMI issuers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-emi-providers) | `issuers: ["HDFC, ICIC"]`
---
types | array``  | Providers to be allowed | Any [credit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-credit-card-emi-providers) and [debit](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-debit-card-emi-providers) card EMI type | `types: ["debit, credit"]`
---
iins | array`` | Providers to be allowed | [Any EMI IIN](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-emi-providers) | `iins: ["438600"]`

### Cardless EMI

Payment instruments for the  `method: cardless_emi` are listed below:

Name | Type | Description | Values | Examples
---
providers | string | Providers to be allowed | [Any Cardless EMI provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-cardless-emi-providers) | `providers: ["zestmoney"]`

### Pay Later

For the  method: `paylater`, the payment instruments are listed below:

Name | Type | Description | Values | Examples
---
providers | string | Providers to be allowed | [Any paylater provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-paylater-providers) | `providers: ["hdfc"]`

### Apps

For the method `app`, the payment instrument is listed below:

Name | Type | Description | Values | Examples
---
providers | string | Providers to be allowed | [Any app provider](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md#supported-apps) | `providers: ["cred"]`

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

## Blocks

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
    blocks: {
      highlighted: myPayments
    }
  }
};
```

Here, `highlighted` is the code associated with `myPayments`. Multiple blocks can be added to the config at the same time.

## Sequence

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
> 
> **Handy Tips**
> 
> Every block defined has to be present in the sequence. If you do not wish to reorder the methods and want to place your block, the sequence should contain `block.highlighted` with just one item in it.
> 

## Preferences

Using the `preferences` object, you can enhance the configuration of the Checkout. By setting this value, you can decide whether the default list of payment methods should be displayed or not.

Possible values are:

`true`
: Checkout will display the sequence of the payment methods configured by you alongside with the default order of payment methods available in the Checkout.

`false`
: Checkout will only show the sequence of the payment methods configured by you.

## Hide Payment Instruments

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

This is an `array` containing the `method` key used to hide either the payment method and/or the payment instrument associated with that payment method. For example, you can hide the methods, `card` and `Axis netbanking` on the Checkout.

```js: JavaScript
let cardInstrument = {
  method: "card"
};

let instrumentOfSomeBank = {
  method: "netbanking",
  banks: ["UTIB"]
};

let hiddenInstruments = [cardInstrument, instrumentOfSomeBank];
```

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Hiding any instrument using `hide` does not affect the similar instrument defined in `blocks`. So, if you want to hide `UTIB` bank from `netbanking` and have defined the same instrument in one of your blocks, Axis bank will still be displayed in that block.
> 

## Next Steps

[Display the Configuration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/display-configuration.md)

### Related Information

- [Supported Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md)
- [Sample Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/sample-code.md)
