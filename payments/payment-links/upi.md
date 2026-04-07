---
title: Create UPI Payment Link with Razorpay
heading: UPI Payment Links
description: Check how to create UPI Payment Link to accept UPI payments.
---

# UPI Payment Links

You can send the UPI Payment Links as URLs to your customers to accept UPI payments. When the customers click on the URL, a list of UPI apps installed on their mobile device is displayed. Customers can select the UPI app of their choice to complete the payment. You can also use [Standard Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/standard.md) to receive payments using payment methods such as netbanking, cards and UPI.

> **INFO**
>
> 
> **Handy Tips**
> 
> - This feature works only on Android mobile devices.
> - UPI Payment Links will work only in **Live Mode**.
> - **Enable Partial Payments** feature is not applicable for UPI Payment Links.
> 

## Advantages

- UPI is a popular payment method that helps customers to make quick payments.
- Customers do not have to enter card details, netbanking login details, thus avoiding manual errors and failed payments.
- UPI payments have a high success rate compared to other payment methods.

## Supported Features

UPI Payment Links support the following features: [Reminders](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/reminders.md) and [Batch Upload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/batch.md).

## Payment Link States

Know about the different [UPI Payment Link states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/states.md#upi-payment-links).

## Create

## UPI Apps Preinstalled/Not Installed

  
    Watch this video to see how the UPI Payment Link works when your customers have UPI apps installed on their devices.
    
  
  
    Watch this video to see how the UPI Payment Link works when your customers do not have UPI apps installed on their devices.
    

    Your customer can install any UPI app and try again to make the payment.
  

### Paid, Expired or Cancelled Payment Links

When customers attempt payment for paid, expired or cancelled Payment Links, the respective statuses are displayed. They are not allowed to make payments using such links.

#### Related Information

- [How Payment Links Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/how-it-works.md)
- [Payment Links States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/states.md)
- [Standard Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/standard.md)
- [Create a Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md)
- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/faqs.md)
