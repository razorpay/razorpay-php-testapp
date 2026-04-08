---
title: eCOD
description: The delivery executives can collect payment digitally from the customers with Razorpay eCOD. You can integrate eCOD with all payment methods including UPI and link-based payments.
---

# eCOD

Using eCOD your delivery executives can accept digital payments from your customers instead of cash.

## Prerequisites

Following are the prerequisites for integrating eCOD:

- You should have an app for delivery executives.
- Delivery executives should have internet access on their device.
- eCOD is available as an Android SDK that can be embedded in your delivery app. The SDK handles the entire user interface for collecting payments through the various payment modes.

## Supported Payment Methods

eCOD supports all payment modes: card, netbanking, wallets and UPI. These modes can be divided into two categories:

- [On Delivery App Methods](#on-delivery-app-methods): The customer need not open any link.
- [Link-Based Methods](#link-based-methods): The customer can use these payment modes on their device using a special link.

### On Delivery App Methods

Following are the Delivery App Methods:

- [Wallet Payments](#wallet-payments): For wallet payments, if a customer has enough balance in the wallet, the payment can be made using OTP.
- [UPI Payments](#upi-payments)

#### Wallet Payments

The wallet payment flow is explained below:

1. The delivery executive shows the wallet list to the customer on the phone (delivery executive's phone).
2. A customer selects a wallet and enters the phone number.
3. The customer receives an SMS (customer's phone) from the wallet provider.
4. The customer enters the OTP on the delivery executive’s phone.
5. The payment is complete!

> **INFO**
>
> 
> **No Internet Connection Required**
> 
> This payment method does not require any internet connection at the customer’s end.
> 

#### UPI Payments

UPI payments work through Collect request. Following is the UPI payment flow:

1. The delivery executive selects UPI on the phone (delivery executive's phone).
2. The customer provides their VPA (Virtual payment address).
3. The customer receives a collect request on the phone (customer's phone).
4. The customer approves the collect request using MPIN.
5. The aayment is complete!

> **INFO**
>
> 
> **UPI Payments Require Internet Connection**
> 
> This payment method requires the customer to have VPA configured and working internet as UPI payments do not work without internet.
> 

### Link-Based Methods

Following are the link-based methods:

- Debit/Credit Cards
- Netbanking
- Wallets
- UPI

While wallets and UPI-based payments can also be made using the delivery executive’s device, card and netbanking payment methods are only available using a special link.

Following is the payment flow for link-based payments:

1. The customers notify the delivery executive that they want to make a payment on their device.
2. The delivery executive selects **Link Payments** on the phone (delivery executive's device).
3. The customer receives an SMS with a link. This link is a short link and is also visible on the delivery executive’s device in text as well as a QR format.
4. The customer can open the link on a computer or mobile.
5. The standard Razorpay Checkout form opens up using which the customer can pay using Card, Netbanking, Wallets or UPI.
6. The delivery executive receives a payment notification after the payment is complete.

> **INFO**
>
> 
> **Razorpay SDK Includes the User Interface (UI)**
> 
> In all of the above payment methods, link-based and on-delivery app methods, the delivery executive interacts with a Razorpay developed user interface (UI).
>
