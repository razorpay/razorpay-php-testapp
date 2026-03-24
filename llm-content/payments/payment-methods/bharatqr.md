---
title: BharatQR
description: Learn how to facilitate BharatQR-based payments on your mobile app using Razorpay.
---

# BharatQR

> **WARN**
>
> 
> **Watch Out!**
> 
> We have discontinued onboarding new users for BharatQR. The service is now limited to existing users only. If you are a new user, we encourage you to check out our alternative offering of [UPI QR Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/api/qr-codes#create-a-qr-code.md). 
> 

With the advent of digital payments, several businesses in India have moved from traditional methods such as NEFT and IMPS to more advanced solutions such as UPIs and wallets due to its scalability, mobile-friendliness, and quicker processing time.

Under this umbrella, BharatQR (BQR) seems to be the fastest mode for receiving payments. The BharatQR Code payments transfer mechanism has made the payments process much easier, encouraging cashless electronic payment transactions.

## What is BharatQR

BharatQR is a secured payment collection method that facilitates merchant-to-person (M2P) transactions through a QR code. Once the BQR codes are deployed at your stores, customers can pay using BQR-enabled mobile banking apps, selecting a preferred payment method without sharing any user credentials.

A QR (Quick Response) code is an information matrix in a machine-readable format containing the required details to accept payments from customers. BharatQR code accommodates information such as your name, contact address, business name, destination bank details and so on. This is how a sample QR code looks like:

![BharatQR Title Image](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/bharatqr.jpg.md)

## How it Works

BQR was built from the ground up keeping mobility around virtual account transactions at its core, thereby making it agnostic across various mobile devices and applications.

In a BQR-based payment setting, a customer uses a BQR-enabled mobile app to scan a BQR code deployed on the merchant store. Upon a successful scan, customer is redirected to a checkout page where they enter their card details and proceeds with the payment for the charged amount. Once the payment is complete, both merchant and customer are notified of the payment status. Once the payment is successfully authorized and captured it is settled to your bank account as per your settlement schedule.

![BharatQR workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/bharatqr-workflow.jpg.md)

The supported payment schemes include:
- UPI
- Credit/Debit cards
    - Mastercard
    - Visa
    - RuPay

@image bharatqr_2.gif

## Advantages

A BQR code is a 2-dimensional barcode but with the capability of carrying 10 times more information. Amongst its many advantages, a BQR payment:

- Requires less or no setup cost.
- Charges no additional cost. It is just a new mode of payment.
- Is as secure as a UPI payment. Card details are not exposed.
- Is interoperable across most payment apps such as MobiKwik, PhonePe and Google Pay.

## Use-cases

BQR-based payments are being widely adopted by merchants with physical stores as it makes accepting and receiving payments a lot quicker and easier for them. The adoption of BQR-based payments may also replace:

- Cash-on-delivery
- ID cards
- POS (Point of Sale) machines
- Paper receipts

## Getting started with Razorpay BharatQR

1. Contact your Sales POC or raise a request with [Razorpay Support](https://razorpay.com/support/#request) to activate BharatQR on your account.
2, Use Razorpay APIs to create a BharatQR.
3. Share the BharatQR with the customer who can make payments through Credit Card, Debit Card and UPI.
4. You can accept multiple payments via a single QR.
5. Close the BharatQR at any time to stop accepting payments.
