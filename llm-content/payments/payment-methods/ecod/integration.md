---
title: Integrate eCOD
description: Integrate eCOD as a payment method.
---

# Integrate eCOD

eCOD runs on top of Razorpay’s Invoices system. An eCOD payment is basically made against an invoice.

## Integration Steps

Following are the two steps of integration:

1. Create an Invoice on your server.
2. Pass the `invoice_id` to Razorpay’s Android SDK.

## Payment Flow

The overall payment flow is explained below:

1. The delivery executive selects an order on your (merchant) app.
1. The delivery executive clicks on **Initiate Payment**.
3. Your app makes a request to your server.
4. Your server calls the create invoice request on Razorpay’s API.
5. Razorpay’s API returns an `invoice_id`. This is passed on to your app by your server.
6. Your app invokes Razorpay’s Android SDK and passes the `invoice_id`.
7. Razorpay’s SDK displays a UI for selecting payment mode.
8. The customer selects a payment mode.
9. After the payment is completed, Razorpay’s Android SDK passes back the control to your app with the result, success or failure.

### Create an Invoice (Server Side)

Step 4 described above involves creating an Invoice using Razorpay’s API. For creating an Invoice, you require the amount and the contact number of the customer. Know more about the [Invoice APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/invoices.md).

> **INFO**
>
> 
> **Mandatory Fields for eCOD**
> 
> For eCOD, you need to pass the following fields mandatorily to Create Invoice API:
> 
> - type: ecod
> - view_less: true
> Without these fields, the eCOD functionality may not work properly.
> 

After this step is complete, you get an `invoice_id`. This needs to be passed to your mobile app.

### Invoke Razorpay's Android SDK

Step 6 involves invoking Razorpay's Android SDK. The standard documentation for integration the android SDK apply here too and is available [here](https://github.com/razorpay/razorpay-android-sample-app/releases). You can use the latest SDK available.

In the JSON object options that you pass to the SDK, you must pass the following fields:

- invoice_id: ``
- ecod: true

Without these parameters, the eCOD checkout form will not display.

### Complete Payment

The delivery executive and the customer need to interact with the special eCOD checkout form displayed by the SDK. The customer has various options for completing the payment. In all the cases, after the payment is complete, the android SDK calls your app's onPaymentSuccess method and passes over the `payment_id`.

### Handle Link-Based Payment

If the customer chooses link-based payment, an SMS is automatically sent to the customer's phone. The customers can open this link on their phone or computer. After the payment is complete, the SDK detects that the payment is complete and calls your app's onPaymentSuccess method.

## Support

In case you have any issue integrating Payment Links, you can raise a ticket on our [Support Portal](https://razorpay.com/support).
