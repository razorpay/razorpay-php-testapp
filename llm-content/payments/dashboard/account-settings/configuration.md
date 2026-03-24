---
title: Configuration
description: Manage notifications, Checkout themes, payment capture and more under the Configuration tab on the Razorpay Dashboard.
---

# Configuration

You can use the **Configuration** tab to perform the following operations:

- [Change Color on Checkout Page](#change-color-on-checkout-page)
- [Upload Company Logo](#upload-company-logo)
- [Select Default Language](#select-default-language)
- [Configure Email Address](#configure-e-mail-address)
- [Enable Flash Checkout](#enable-flash-checkout)
- [Manage Saved Cards](#manage-saved-cards)
- [Manage Fee Bearer Model](#manage-fee-bearer-model)
- [Enable International Payments](#enable-international-payments)
- [Manage Email Notifications](#manage-email-notifications)
- [Manage SMS Notifications](#manage-sms-notifications)
- [Manage WhatsApp Notifications](#manage-whatsapp-notifications)
- [Configure Payment Capture Settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/capture-settings.md)

## Change Color on Checkout Page

To change color on the Checkout page:

1. Log in to the Dashboard.
2. In the **Theme Color** field, enter the HEX code of your brand color. Alternatively, click on the color box and enter the RGB code.
3. Click **Save**.

## Upload Company Logo

1. Log in to the Dashboard.
2. Click **Choose File** to upload your company logo.

> **INFO**
>
> 
> **Handy Tips**
> 
> - The logo file size should not exceed 1MB.
> - Upload a square image of minimum dimensions 256x256 px.
> 

## Select Default Language
The customers can view the Checkout page in their preferred language.

If the customer does not specify a language, the default language will be used on the checkout page. To select the default checkout language:

1. Log in to the Dashboard. 
2. Use the drop-down list to view the language options.
3. Select the default language. For example, **English**.
4. Click **Save**.

![customise checkout theme](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dashboard-guide-settings-checkout-theme1.jpg.md)

## Configure Email Address
By default, the email address field is hidden on checkout. You can choose to configure the email address field based on your requirement.

   
### To configure email address:

       1. Log in to Dashboard.
       2. Navigate to **Account & Settings**
       3. Click **Branding** under the **Checkout settings** section.
       4. In the **Collect email address from users on Checkout page** field, you can select:
          - **No (Default)**: Customers will not be shown this field on checkout.
          - **As an optional field**: Customers can either enter their email address or choose to skip it.
          - **As a mandatory field**: Customers have to enter their email address to proceed.
        
            ![Email-less checkout configuration on Razorpay Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dashboard-emailess-checkout.jpg.md)
       5. Click **Save**.
      

Watch this video to see how to enable or disable Flash Checkout:

[Video: https://www.youtube.com/embed/sGSfOP5qtVw?si=nyQ1w-rubPqIycFn]

## Manage Saved Cards

Customers can manage their saved card details stored as tokens using our portal. 
- [Manage Global Saved Cards](https://razorpay.com/flashcheckout/manage/) by following the on-screen instructions.
- [Manage Local Saved Tokens](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/cards/features/saved-cards.md).

## Manage Fee Bearer Model
Razorpay charges nominal platform fee for every payment that passes through the Razorpay Payment Gateway. You can choose to charge a Convenience Fee to your customers for the use of technology infrastructure. Convenience Fees are seamlessly added at the Checkout without disrupting the checkout experience. If a refund is initiated, your customers receive the Convenience Fees along with the actual payment amount.

> **WARN**
>
> 
> **Watch Out!**
> 
> Changes made to the fee bearer model in test mode will automatically apply to live mode. For example, choosing to charge a convenience fee to your customers in test mode will also apply in live mode.
> 

   
### To manage fee bearer model:

       1. Log in to the Dashboard.
       2. Navigate to **Account & Settings**.
       3. Select the **Convenience Fee Model** option on the **Settings** → **Fee Bearer** section of the Dashboard.

       ![Customer pays the fee](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-customer-fee-bearer.jpg.md)
       Know more about the [Convenience Fee Model](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/configuration/convenience-fees.md).
      

## Enable International Payments

By default, you can accept payments in various [international currencies supported by Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

If you do not want to accept payments in currencies apart from INR (₹), you can turn it off using the toggle button. Watch this video to see how to enable international payments.

[Video: https://www.youtube.com/embed/lPvasqEJqK8]

## Manage Email Notifications
You can configure the email addresses to receive email notifications like payments received, daily payment reports and webhooks. You will also receive an email notification for both successful and failed settlements.

> **INFO**
>
> 
> **Handy Tips**
> 
> Settlement emails will be sent to the email addresses provided on the Dashboard. Know more about [Settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md).
> 

   
### To enable email notifications:

        1. Log in to the Dashboard.
        2. On the left navigation, click **Accounts & Settings**.
        3. Navigate to **Notification settings → Email**.
        4. Enter email addresses under **Email Notifications**. If you want to enter multiple email addresses, separate them by a comma. 
      

## Manage SMS Notifications

You can enable **SMS Notifications** to receive SMS notifications for successful and failed settlements.

   
### To enable SMS notifications:

       1. Log in to the Dashboard.
       2. Click **Accounts & Settings** and go to **Notification settings → SMS**.
       3. Enable **SMS Notifications**.

       
       ![Manage SMS Notifications](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/manage-sms-notifications.jpg.md)
       
       After SMS notifications are enabled, you start receiving notifications on the registered phone number. By default, this feature is set to **Enabled**. You can disable it using the toggle button.
      

## Manage WhatsApp Notifications
You can receive WhatsApp notifications regarding settlements, account configuration changes and more on your registered contact number. You can enable this feature during the sign up process or later from the Dashboard.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> This feature is available only to the owner user role. Know about the various [user roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/dashboard/account-settings/manage-team.md).
> 

   
### To enable WhatsApp notifications:

       1. Log in to the Dashboard.
       2. Click **Accounts & Settings** and go to **Notification settings → WhatsApp**.
       3. Enable **WhatsApp Notifications**.

       ![Manage WhatsApp Notifications](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/manage-whatsApp-notifications.jpg.md)

       After WhatsApp notifications are enabled, you start receiving notifications on the registered number. You can disable the WhatsApp notifications from the Dashboard.
