---
title: Send Reminders
description: Enable or disable reminders for Payment Links.
---

# Send Reminders

You can send your customers automated SMS and email reminders for Payment Links. Setting reminders helps you to:

- Increase the number of paid Payment Links.
- Reduce cost and manual effort required to collect payments.
- Reduce the number of days taken by your customer to make the payment.

## Types of Reminders

Following are the various types of reminders you can set for Payment Links:

- [For all Payment Links](#set-reminders-for-all-payment-links): This is an account-level setting for all Payment Links where the Payment Link reminder is sent at similar time intervals. For example, 2 days after creation or 3 days before expiry.
- [For an individual Payment Link](#set-reminders-for-individual-payment-links): Enable reminders for specific Payment Links.
- [For Payment Links created using bulk upload](#set-reminders-for-bulk-payment-links): Enable reminders for Payment Links created using bulk upload.

## Set Reminders for All Payment Links

This is an account-level setting. If enabled, all Payment Links have the same reminder configurations.

  
### To set reminders for all Payment Links:

     1. Log in to the Dashboard.
     2. Navigate to **Account & Settings** → **Payments and refunds** → **Reminders**.
     3. Enable the **Payment Links Reminders** toggle.
     4. Configure reminders for links with and without an expiry date. You can set a maximum of 3 reminders.
     5. Select the channel to send the reminders — SMS, email, or both.

     
    

> **WARN**
>
> 
> **Watch Out!**
> 
> Customers will receive the reminder email or SMS only if their contact and email details were provided when the Payment Link was created. Know more about [creating Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md).
> 

  
### Payment Links With Expiry Date

     If you have set an expiry date for the Payment Link, you can configure a maximum of three reminders based on the expiry date. For example, if you have issued a Payment Link with an `expiry date of 30 Nov 2024`, you can set three reminders:

      
      Expiry Date | Reminders to be sent
      ---
      30 Nov 2024 | 3 days before expiry date - `27 Nov 2024` 
 2 days before expiry date - `28 Nov 2024` 
 1 day before expiry date - `29 Nov 2024`
      

      
    

  
### Payment Links Without Expiry Date

     If you have not set any expiry date for the Payment Link, you can configure a maximum of three reminders to be sent after the issued date. For example, if you have `issued a Payment Link on 25 Nov 2024`, you can set three reminders:

      
      Issued Date | Reminders to be sent
      ---
      25 Nov 2024 | 3 days after issued date - `28 Nov 2024` 
 7 days after issued date - `02 Dec 2024` 
 10 days after issued date - `05 Dec 2024`
      

      
    

## Advanced Settings

Select the **Channels** through which the reminders must be sent. Available channel options are SMS and email.

> **INFO**
>
> 
> **Handy Tips**
> 
> Reminders are sent only between 11AM–12PM and 3PM–5PM.
> 

## Set Reminders For Individual Payment Links

You can enable or disable reminders for individual Payment Links.

  
### During Payment Link Creation

     To enable reminders while creating a Payment Link:
     1. Log in to the Dashboard.
     1. Navigate to **Payment Links**.
     1. Click **+ Create Payment Link**.
     1. Enter the necessary details such as **Amount** and **Payment For**.
     1. Enable the **Send auto reminders** option.
     1. Click **Create Payment Link** to create the Payment Link.

     
     
     

     
    

  
### After Payment Link is Issued

     You can edit the Payment Link and enable or disable reminders after issuing it.

     To enable or disable reminders by editing a Payment Link:
     1. Log in to the Dashboard.
     1. Navigate to **Payment Links**.
     1. Click the Payment Link for which you want to enable or disable reminders. The details of the Payment Link appear on the right pane.
     1. Enable or disable the **Send auto reminders** option.

     
     
     

     
    

## Set Reminders For Bulk Payment Links

You can set reminders for Payment Links when creating them via bulk upload.

> **INFO**
>
> 
> **Handy Tips**
> 
> By default, reminders are not enabled during batch creation of Payment Links.
> 

Know more about enabling or disabling reminders when creating [Payment Links using Bulk Upload](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/batch.md#:~:text=Send%20auto%20reminders).

## Send Reminders Using API

You can send reminders for Payment Links to customers using the API. Reminders are enabled by default during Payment Link creation.

- `reminder_enable` parameter in [Create a Standard Payment Link API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/create-standard.md)
- `reminder_enable` parameter in [Create a UPI Payment Link API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/create-upi.md)

#### Related Information

- [How Payment Links Work](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/how-it-works.md)
- [Payment Link States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/states.md)
- [Create a Payment Link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/create.md)
- [Payment Links APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links.md)
- [FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links/faqs.md)
