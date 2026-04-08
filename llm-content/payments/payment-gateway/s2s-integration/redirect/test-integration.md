---
title: 2. Test Integration
description: Steps to test if the integration was successful.
---

# 2. Test Integration

You can make test payments using one of the payment methods configured at the Checkout.

- No money is deducted from the customer's account as this is a simulated transaction. 
- Ensure you have entered the API Keys generated in the Test Mode in the Checkout code.

Following are the payment methods supported as configured at Razorpay Checkout. 

## Netbanking

You can select any of the listed banks. After choosing a bank, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the bank login portals.

## UPI

You can enter one of the following UPI IDs:

- `success@razorpay`: To make the payment successful. 
- `failure@razorpay`: To fail the payment.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can use **Test Mode** to test UPI payments, and **Live Mode** for UPI Intent and QR payments.
> 

## Wallet

You can select any of the listed wallets. After choosing a wallet, Razorpay will redirect to a mock page where you can make the payment `success` or a `failure`. Since this is Test Mode, we will not redirect you to the wallet login portals.

## Cards

You can use one of the test cards to make transactions in the Test Mode. Use any valid expiration date in the future and any random CVV to create a successful payment.

Card Network | Domestic / International | Card Number | CVV & Expiry Date
---
Mastercard | Domestic |  5267 3181 8797 5449 | Use a random CVV and any future date ^^^^
---
Visa | Domestic | 4386 2894 0766 0153 |
---
Mastercard | International | 5555 5555 5555 4444
5105 1051 0510 5100
5104 0600 0000 0008 |
---
Visa | International | 4012 8888 8888 1881 |

### Test Cards

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

#### Error Scenarios

Use these test cards to simulate payment errors. See the [complete list](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md#error-scenario-test-cards) of error test cards with detailed scenarios.
Check the following lists: 
- [Supported Card Networks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards.md).
- [Cards Error Codes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/errors/payments/cards.md).

## Next Steps

[Step 3: Go-Live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/json/v2/go-live-checklist.md)

## Next Steps

[Step 3: Go-live Checklist](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/redirect/go-live-checklist.md)
