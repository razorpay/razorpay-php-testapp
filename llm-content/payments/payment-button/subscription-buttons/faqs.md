---
title: Subscription Button | FAQs
heading: FAQs
description: Find answers to frequently asked questions about Razorpay Subscription Button.
---

# FAQs

Here are some frequently asked questions about Subscription Button.

## General

#### 1. How can I enable Subscription Buttons?

To access Subscriptions Buttons feature, you must:
- Ensure the Subscriptions product is available for your account.
- Raise a request with [Support team](https://razorpay.com/support/) to enable Subscriptions Button.
     
#### 2. Does this Subscription Buttons support only subscriptions?

This will support both Recurring and One-time payments. We support only cards for recurring payments and all payment methods for  one-time payments.

#### 3. Can I generate a custom receipt on every charge?

Currently, we do not support customized receipt. However, you can generate a subscription receipt on every charge.

#### 4. How can I download reports?

Currently, we support only one-time payments reports as a CSV file. Follow these steps to download:
1. Navigate to Payment Button on the Dashboard.
1. Click the **Subscription Buttons** tab, and then click the required button. The button details view appears.
1. Scroll down, and then click **One-Time Payments** tab.
1. Click **Export All (CSV)**.

#### 5. Can I update and modify Subscriptions

Yes, you can update and modify all Subscriptions.

#### 6. Can I set up a one-time payment subscription button?

You cannot setup a one-time payment subscription button. For one-time payment, please use [Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md).

## Try it Out

#### 1. Where can I try out the Button Code?

You can test the Button Code by [adding the code to this page](https://cdn.razorpay.com/static/widget/test-payment-button.html).

## Supported Platforms

#### 1. Can I embed the Subscription Button on my mobile app?

You will be able to embed the button on mobile apps, provided:
- The app-development platform supports JS.
- The app is able to make the Button open in a WebView.

## Customize Button

#### 1. How can I add my business logo on the Checkout modal that appears once the button is clicked?

To make your your business logo appear on the Checkout modal:
1. In the Dashboard, navigate to **Settings**.
2. Under **Account Settings**, in the **Your Logo** section, click **Choose File**.
3. Upload the logo file. Ensure that the logo is a square image of minimum dimensions 256x256 px. Maximum file size allowed is 1MB.

#### 2. How can I make the Subscription Button and Checkout elements reflect my brand colors?

You can make the Subscription Button and Checkout elements appear in your brand colours. To do this:
1. In the Dashboard, navigate to **Settings**.
2. Under **Account Settings**, in the **Theme Color** section, enter the HEX code for your brand. For example, `#6822CC`.
3. Click **Save Changes**.

Once this is done, during button creation ensure that in the **Button Details** section, you select **Brand Color** in **Button Theme** field.

## Embed Code

#### 1. How to embed the Subscription Button on my website?

You can embed the subscription button on your website to collect payments from your customers.
To do this:
1. Go to Dashboard → **Payment Button**.
2. Click **Subscription Buttons** tab.
3. In the list that appears, navigate to the relevant button and copy the button code.
4. In your website code, paste this code on the page where you want the subscription button to appear.

## Payments and Payment Methods

#### 1. How do I track the payments made by customers? When will the amount be settled to my account?

You can view the payments as and when they are made in the [Transactions Details View](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button/view-reports.md) of the Subscription Button.

You will receive the payments in your bank account as per the settlement cycle. By default, this is T+2 for domestic payments and T+7 for international payments.

#### 2. What payment methods can customers use to make payments? Can I display additional payment methods?

Currently, we support only Cards for Recurring Payments.
For one-time payments, all the payment methods enabled for your account are displayed on the Checkout.
- Cards
- Netbanking
- UPI
- Wallets

Raise a request on the Dashboard to display more [payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/payment-methods.md#request-for-payment-methods-and-support) on Checkout.

#### 3. Is UPI Autopay payment method supported for Subscription Button?

Currently, we do not support UPI Autopay for Subscription Button.

#### 4. What is the maximum payment amount allowed per transaction on a Subscription Button?

By default, a customer can make a maximum payment of ₹5,00,000. This can be raised by raising a request with [Razorpay Support](https://razorpay.com/support/#request).

#### 5. Can I accept payments in international currency?

You can accept payments in international currency using Subscription Button. Refer to the [list of supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies). Follow these steps:
1. Raise a request with [Razorpay Support](https://razorpay.com/support/#request) to enable international payments for your account.
2. While creating the Subscription Button, click the currency drop-down in the amount field and select the required currency.

> **INFO**
>
> 
> **One Currency per Button**
> 
> You can set only one currency for amount fields on a Subscription Button. If you attempt to configure the second amount field with a different currency, a message appears on the screen highlighting that more than one currency cannot be applied.
>
