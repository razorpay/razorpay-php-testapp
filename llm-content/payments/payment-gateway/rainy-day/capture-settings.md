---
title: Rainy Day | Payment Capture Settings
heading: About Payment Capture Settings
description: Configure auto-capture settings for individual payments using APIs and at an account level using the Razorpay Dashboard.
---

# About Payment Capture Settings

When a customer makes an online payment, it usually flows through different states. Know more about [payment states](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md#payment-life-cycle).

By default, once your customer completes a payment, it is automatically moved to the `captured` state. 

However, the payment can remain in the `authorized` state in the following scenarios:

- **Late authorization** 

  Due to external factors such as network issues or technical errors, Razorpay may not immediately receive payment status from the bank. In this case, Razorpay polls the APIs intermittently for 3 days to check the status. If we receive the payment status as successful, the payment is moved to the `authorized` state. Know more about [ late authorization](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/late-authorisation.md).
- **Specific business use case** 

  Some businesses such as those in the Ecommerce industry, may retain the payment in the `authorized` state and later move them to the `captured` state.

> **WARN**
>
> 
> **Watch Out!**
> 
> - For **Direct Settlement** merchants, payments will be auto-captured irrespective of the configuration.
> - You must ensure that all payments in the authorized state are moved to the captured state within 3 days of creation. This is mandatory because payments that are not captured within this period will be refunded automatically to customers.
> 

You can configure **Payment Capture settings** on the Dashboard. You can choose to:
  - [Auto-capture all payments](#auto-capture-all-payments)
  - [Auto-capture with set timeouts](#auto-capture-with-custom-timeouts)
  - [Manually capture timeout](#manual-capture-timeout)

## Payment Capture Settings

> **INFO**
>
> 
> **Handy Tips**
> 
> - Only the Razorpay account owner can configure payment capture settings on the Dashboard.
> - Payment Capture settings are applicable only for payments created using the Orders API.
> 

Option | Description
---
Auto-capture all payments | All payments `authorized` within 3 days from the time of creation are auto-captured.
---
Auto-capture timeouts | - Allows you to define custom auto-capture timeout.
-  The minimum value is 12 minutes.
- The maximum value (default) is 3 days.

---
Manual capture timeout | - Allows you to define custom manual capture timeout.
- The minimum value is 12 minutes.
-  The maximum value (default) is 3 days.

---
Auto-refund speed | Payments in the `authorized` state are auto-refunded after the timeout. The available option is **Normal Refund** where the payment is refunded to your customer in 5-7 working days. The refund speed selected here is only applicable to payments that are auto-refunded.

 account owner can configure payment capture settings on the Dashboard.
- Payment Capture settings are applicable only for payments created using the Orders API.

Option | Description
---
Auto-capture all payments | All payments `authorized` within 3 days from the time of creation are auto-captured.
---
Auto-capture timeouts | - Allows you to define custom auto-capture timeout.
-  The minimum value is 12 minutes.
- The maximum value (default) is 3 days.

---
Auto-refund speed | Payments in the `authorized` state are auto-refunded after the timeout. The available option is **Normal Refund** where the payment is refunded to your customer in 5-7 working days. The refund speed selected here is only applicable to payments that are auto-refunded.

## Auto-capture all Payments

You can use this setting to capture all `authorized` payments automatically. This eliminates the time and effort spent manually capturing payments. **This is the default setting for all customers.**

 
![ Auto-capture all payments process flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-capture-auto-capture-all-payments.jpg.md)

Watch this video to know how to set up the **Automatic Capture** option.

[Video: https://www.youtube.com/embed/1u0X1k6mh-U]

 

    
### To auto-capture all `authorized` payments:

         1. Log in to the Dashboard.
         2. Navigate to the **Account & Settings** option and scroll to the **Payments Capture** option.
         3. Click the **Change** button next to **Automatic Capture**.
         4. Under **Automatic Capture**, click the drop-down and select the time period in the **Capture all payments authorised within** field. For example, 3 days.
         5. Click **Next**.
         6. Select **Refund Automatically** and click **Next**.
         7. Select Normal Refund as the **Refund Speed**.
         8. Click **Save**.
        

## Auto-Capture with Custom Timeouts

Once the payment is `created`, you can:
 - Auto-capture payments that are `authorized` within a certain time period, and
 - Manually capture payments that are `authorized` after that time period.

You can do this by setting up custom timeouts for automatic and manual capture.

### Auto-capture Timeout

Let us say you only want to auto-capture payments that are `authorized` within 3 days from creation.

---
Capture Settings | - Select **Automatic Capture** 
- Automatic capture timeout = 3 days.

---
Payments auto-refunded | If payments are `authorized` after 3 days.

 

![Auto Capture Timeout process flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-capture-auto-capture-timeout.jpg.md)

Watch this video to see how to set up the **Automatic Capture with Timeout** option.

[Video: https://www.youtube.com/embed/_pll_tqFGhY?si=Kvl9jk4KoibLTQFb]

### Auto-capture + Manual Capture Timeouts

Let us say you want to:
  - Auto-capture payments that are `authorized` within 2 days from creation.
  - Manually capture payments that are `authorized` within 3 days from creation.

---
Capture Settings | - Select **Automatic Capture** 
- Automatic capture timeout = 2 days.
- Manual capture timeout = 3 days.

---
Payments auto-refunded if | - Payments not `captured` by you within 3 days.
-  Payments are `authorized` after 3 days.

![Auto and Manual Capture Timeout process flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-capture-auto-capture-and-manual-capture-timeouts.jpg.md)

Watch this video to see how to set up the **Automatic and Manual Capture with Timeout** option.

[Video: https://www.youtube.com/embed/6vyGZ8vOqno?si=wqvPQNV4d9Cw-x_m]

  
### To configure capture settings:

     1. Log in to your Dashboard.
     2. Navigate to the **Account & Settings** option and scroll to the **Payments Capture** option.
     3. Click the **Change** button next to **Automatic Capture**.
     4. Under **Automatic Capture**, click the drop-down and select the time period in the **Capture all payments authorised within** field. For example, 2 days.
     5. Click **Next**.
     6. Select **Capture manually via dashboard or API**.
     7. Click the drop-down and select the time period in the **Capture payments manually authorised within** field. For example, 3 days.
     8. Click **Next**.
     9. Select Normal Refund as the **Refund Speed**.
     10. Click **Save**.
    

## Manually Capture all Payments

You can use this setting to capture `authorized` payments manually.

> **WARN**
>
> 
> **Watch Out!**
> 
> Manual capture of payments is not supported on [bank transfer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/bank-transfer.md). All bank transfer payments are auto-captured.
> 

### Manual Capture Timeout

Let us say you only want to manually capture payments that are `authorized` within 3 days from creation. To do this, you should set the manual capture timeout as 3 days.

---
Capture Settings | - Select **Manual Capture** 
- Manual capture timeout = 3 days.

---
Payments auto-refunded if | - Payments not `captured` by you within 3 days.
-  Payments are `authorized` after 3 days.

 

![Manual Capture Timeout process flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-capture-manual-capture-only.jpg.md)

Watch this video to set up the **Manual Capture** option.

[Video: https://www.youtube.com/embed/zBcK1KIed30?si=F06RpJcegPNBI8ND]

 

    
### To set up the manual capture:

         1. Log in to the Dashboard.
         2. Navigate to the **Account & Settings** option and scroll to the **Payments Capture** option.
         3. Click the **Change** button next to **Automatic Capture**.
         4. Select the **Manual Capture** option.
         5. Set the manual capture timeout to 3 days and click **Next**.
         6. Select Normal Refund as the **Refund Speed**.
         7. Click **Save**.
        

You can manually capture payments in the `authorized` state using our [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manual-capture-of-payments). All payments that are not captured within the manual timeout period will be auto-refunded.

## Configure Payment Capture Settings using Orders API

Capture values passed in the [Orders API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings/api.md) take precedence over the Payment Capture settings configured on the Dashboard. You can use this to change the capture settings for individual payments.

### Related Information

- [How Payment Gateway Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/how-it-works.md)
- [Payment States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments.md)
- [Refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md)
- Manually capture payments in the `authorized` state using the [Capture API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments.md#capture-a-payment) or from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/dashboard.md#manually-capture-payments)
- [Set up and Subscribe to Webhook events](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payments.md)
