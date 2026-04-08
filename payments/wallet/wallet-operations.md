---
title: Wallet Operations
description: Learn about the different Razorpay Wallet operations, such as loading a wallet, accepting payments from a wallet, initiating refunds and sending cashbacks to a wallet
---

# Wallet Operations

> **WARN**
>
> 
> **Watch Out!**
> 
> We have discontinued support for this product, effective April 2023. As a result, we will not be onboarding new users for this product anymore.
> 

This section details the following wallet operations with an amount of ₹ 500 as an example:

- [Load a Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/wallet-operations.md#load-a-wallet): Customer wants to add ₹ 500 to the wallet.
- [Accept Payments from a Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/wallet-operations.md#accept-payments-from-a-wallet): Customer wants to pay ₹ 500 from the wallet.
- [Refund to a Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/wallet-operations.md#refund-to-a-wallet): Merchant wants to refund ₹ 500 to a wallet.
- [Send Cashback to a Wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/wallet-operations.md#send-cashback-to-a-wallet): Merchant wants to send ₹ 500 as a cashback to a wallet.
- [Make a Payout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/wallet-operations.md#make-a-payout)

## Prerequisites

- [Set up your Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md).
- [Generate API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) from Razorpay Dashoboard.
- [Create a Customer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#create-a-customer).

## Load a Wallet

When a customer adds funds or money into the wallet, it is called loading a wallet. A wallet is created only when a customer adds funds or money into the wallet for the first time.

Follow the below steps for loading a wallet:

1. Customer proceeds to [Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md#checkout-form) from the normal payment flow for an amount, say ₹ 500, using the selected payment mode (**Net Banking**/**Debit card**/**Credit card**/**UPI**).
2. You authenticate the customer in your backend and make a [capture payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) request for the payment made and the amount gets credited to your account.
3. You make a [transfer payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#transfer-a-payment) request of ₹ 500 to the customer’s wallet.
4. Customer’s wallet gets credited with ₹ 500 and your account gets debited with the same amount.
5. Razorpay sends a ‘success information’ response which you may show to your customer.

The following image illustrates the flow of funds while loading a wallet:

Reloading the wallet at the time of checkout will have the same flow. This usually happens when the customer finds out that there is insufficient balance in the wallet at the time of making a payment.

Refer to the [API Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#transfer-a-payment) to see the APIs with the examples that are used in this operation.

## Accept Payments from a Wallet

Follow the below steps for accepting payment from a wallet:

1. The customer initiates payment of ₹ 500 for an order from the wallet.
2. You authenticate the customer in your backend and make a [create payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#create-a-payment-to-a-customer-s-wallet) request with the `customer_id`.
3. You make a [capture payment](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) request for the payment of ₹ 500.
4. ₹ 500 gets debited from the customer’s wallet and your account gets credited with the same amount.

The following image illustrates the flow of funds when a payment is made from a wallet:

Refer to the [API reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#create-a-payment-to-a-customer-s-wallet) to see the APIs with the examples that are used in this operation.

## Refund to a Wallet

Follow the below steps to refund to a wallet when payment is made from a wallet:

1. You make a [Refund to wallet](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#refund-to-a-wallet) request for a payment of ₹ 500 with the `payment_id`.
2. Customer’s wallet gets credited with ₹ 500 and your account gets debited with the same amount.

**Handy Tips**
 
Refunds are always made against a payment. While making a refund, the customer (payee) is identified using the `payment_id` that is generated at the time of payment.

The following image illustrates the flow of refund made to a wallet:

Refer to the [API Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#refund-to-a-wallet) to see the APIs with the examples that are used in this operation.

## Send Cashback to a Wallet

Follow the below steps to send cashback to a wallet:

1. You make a [direct transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#direct-transfer) request of ₹ 500 with the `customer_id`.
1. Customer’s wallet gets credited with ₹ 500 and your account gets debited with the same amount.

The following image illustrates the flow of cashback to a wallet:

> **INFO**
>
> 
> **Handy Tips**
>  
> As per RBI Domestic Money Transfer (DMT) guidelines, you can transfer a maximum of ₹ 25000 to other wallets in a calendar month.
> 

Refer to the [API Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#direct-transfer) to see the APIs with the examples that are used in this operation.

## Make a Payout

Payouts allow customers to transfer funds directly from their wallets to any of the linked bank accounts.

If there are no bank accounts linked to a customer, send an API request to Razorpay with the bank account details to link the bank account to a customer. This allows Razorpay to tie the bank account with the particular Customer Id and thereby process a fund transfer initiated towards that account.

Refer to the [API Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/wallet/api-reference.md#payout-from-customer-s-wallet) to make a payout.
