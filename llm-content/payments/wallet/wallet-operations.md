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

- [Load a Wallet](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/wallet-operations#load-a-wallet.md): Customer wants to add ₹ 500 to the wallet.
- [Accept Payments from a Wallet](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/wallet-operations/#accept-payments-from-a-wallet.md): Customer wants to pay ₹ 500 from the wallet.
- [Refund to a Wallet](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/wallet-operations/#refund-to-a-wallet.md): Merchant wants to refund ₹ 500 to a wallet.
- [Send Cashback to a Wallet](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/wallet-operations/#send-cashback-to-a-wallet.md): Merchant wants to send ₹ 500 as a cashback to a wallet.
- [Make a Payout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/wallet-operations/#make-a-payout.md)

## Prerequisites

- [Set up your Razorpay account](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up.md).
- [Generate API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md) from Razorpay Dashoboard.
- [Create a Customer](@/Applications/MAMP/htdocs/new-docs/llm-content/api/customers/#create-a-customer.md).

## Load a Wallet

When a customer adds funds or money into the wallet, it is called loading a wallet. A wallet is created only when a customer adds funds or money into the wallet for the first time.

Follow the below steps for loading a wallet:

1. Customer proceeds to [Checkout](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/#checkout-form.md) from the normal payment flow for an amount, say ₹ 500, using the selected payment mode (**Net Banking**/**Debit card**/**Credit card**/**UPI**).
2. You authenticate the customer in your backend and make a [capture payment](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#capture-a-payment.md) request for the payment made and the amount gets credited to your account.
3. You make a [transfer payment](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference/#transfer-a-payment.md) request of ₹ 500 to the customer’s wallet.
4. Customer’s wallet gets credited with ₹ 500 and your account gets debited with the same amount.
5. Razorpay sends a ‘success information’ response which you may show to your customer.

The following image illustrates the flow of funds while loading a wallet:

![Load Wallet](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/loading-wallet.jpg.md)

Reloading the wallet at the time of checkout will have the same flow. This usually happens when the customer finds out that there is insufficient balance in the wallet at the time of making a payment.

Refer to the [API Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference/#transfer-a-payment.md) to see the APIs with the examples that are used in this operation.

## Accept Payments from a Wallet

Follow the below steps for accepting payment from a wallet:

1. The customer initiates payment of ₹ 500 for an order from the wallet.
2. You authenticate the customer in your backend and make a [create payment](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference#create-a-payment-to-a-customer-s-wallet.md) request with the `customer_id`.
3. You make a [capture payment](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#capture-a-payment.md) request for the payment of ₹ 500.
4. ₹ 500 gets debited from the customer’s wallet and your account gets credited with the same amount.

The following image illustrates the flow of funds when a payment is made from a wallet:

![Accept Payments](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/accept-payments-wallet.jpg.md)

Refer to the [API reference](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference/#create-a-payment-to-a-customer-s-wallet.md) to see the APIs with the examples that are used in this operation.

## Refund to a Wallet

Follow the below steps to refund to a wallet when payment is made from a wallet:

1. You make a [Refund to wallet](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference/#refund-to-a-wallet.md) request for a payment of ₹ 500 with the `payment_id`.
2. Customer’s wallet gets credited with ₹ 500 and your account gets debited with the same amount.

**Handy Tips**
 
Refunds are always made against a payment. While making a refund, the customer (payee) is identified using the `payment_id` that is generated at the time of payment.

The following image illustrates the flow of refund made to a wallet:

![Refund](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/refund-to-wallet.jpg.md)

Refer to the [API Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference/#refund-to-a-wallet.md) to see the APIs with the examples that are used in this operation.

## Send Cashback to a Wallet

Follow the below steps to send cashback to a wallet:

1. You make a [direct transfer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference#direct-transfer.md) request of ₹ 500 with the `customer_id`.
1. Customer’s wallet gets credited with ₹ 500 and your account gets debited with the same amount.

The following image illustrates the flow of cashback to a wallet:

![Cashback](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cashback-wallet.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
>  
> As per RBI Domestic Money Transfer (DMT) guidelines, you can transfer a maximum of ₹ 25000 to other wallets in a calendar month.
> 

Refer to the [API Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference/#direct-transfer.md) to see the APIs with the examples that are used in this operation.

## Make a Payout

Payouts allow customers to transfer funds directly from their wallets to any of the linked bank accounts.

If there are no bank accounts linked to a customer, send an API request to Razorpay with the bank account details to link the bank account to a customer. This allows Razorpay to tie the bank account with the particular Customer Id and thereby process a fund transfer initiated towards that account.

Refer to the [API Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/wallet/api-reference/#payout-from-customer-s-wallet.md) to make a payout.
