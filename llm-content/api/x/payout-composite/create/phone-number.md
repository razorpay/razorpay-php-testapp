---
title: Create a Payout to a Mobile Number Using Composite API
description: Create a Payout to Mobile Number using the Composite API.
---

# Create a Payout to a Mobile Number Using Composite API

## Create a Payout to a Mobile Number Using the Composite API

Use this endpoint to create a payout to a mobile number using Composite Payout API.

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> - Ensure you [allowlist IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) and pass the [idempotency key](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payout-idempotency/make-request.md) to make a successful payout.
> - You can send payouts to VPA (UPI) linked mobile numbers only.
> 
> 

@include rzpx/payouts/composite-bank-intro

@include rzpx/payouts/composite-payout-phone-code

### Parameters

@include rzpx/payouts/composite-payout-phone-req

### Parameters

@include rzpx/payouts/composite-payout-phone-res

### Errors

  
No linked account details found
* code: 400
* description: No linked VPA (UPI) found for the entered mobile number.
* solution: Enter a mobile number which is linked to a VPA.

Account holder name not matching with bank provided name
* code: 400
* description: Account holder name is not matching with the name fetched from the bank.
* solution: `account_holder_name` is optional. Enter this only if you are sure of the name linked to the phone number, as per bank records. System will validate the name only if entered.

Mobile number should be 10-digit long
* code: 400
* description: Entered mobile number is not 10-digit long.
* solution: Enter the correct 10-digit mobile number, without country code.

We are facing trouble fetching account details. Please try again shortly
* code: 500
* description: Server error. Unable to fetch account details from the server.
* solution: This is due to the NPCI mapper API being unresponsive. Retry the request after sometime.
