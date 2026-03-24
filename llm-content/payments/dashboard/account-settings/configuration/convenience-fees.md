---
title: Collect Convenience Fees from Customers
description: Collect convenience fees from your customers for using your technology and infrastructure.
---

# Collect Convenience Fees from Customers

For every payment done using Razorpay, we levy a nominal platform fees. You can choose to charge a Convenience Fee to your customers for the use of technology infrastructure. Convenience Fees are seamlessly added at Razorpay Checkout without disrupting the checkout experience for your customers. In case a refund is initiated, your customers receive the Convenience Fees along with the actual payment amount.

![Fees breakup](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-fee-breakup-v2.jpg.md)

> **WARN**
>
> 
> **Watch Out!**
> 
> Changes made to the fee bearer model in test mode will automatically apply to live mode. For example, choosing to charge a convenience fee to your customers in test mode will also apply in live mode.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> - This feature is currently supported for specific business cases only. You can contact our [Support team](https://razorpay.com/support) to get this feature activated on your account.
> - **INR** is the only supported currency. This feature is not available for international payments.
> - This feature is **not available** for:
>     - Smart Collect (via VA, VPA and QR Codes)
>     - Route
>     - Subscriptions (via Emandate, Paper NACH)
>     - Invoices
> 

## How it Works

Given below is the workflow:

1. Log in to the Dashboard.
2. You select the **Convenience Fee Model** option on the **Settings** → **Fee Bearer** section of the Dashboard.
    
    ![Customer pays the fee](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-customer-fee-bearer.jpg.md)
    
3. The customer selects an item on your website/Payment Link/Payment Page and clicks the pay button.
    
    ![Customer clicks pay button](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-payment-page.jpg.md)
    
4. The checkout pop-up page is displayed.
5. The customer selects the payment mode and clicks the **Pay** button.
6. The **Fees Breakup** page containing the Convenience Fee appears, and the customer clicks **Continue and pay**.
    
    ![Fees breakup](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/dashboard-guide-settings-fee-bearer-fee-breakup-v2.jpg.md)
    
7. The customer is redirected to the bank page with the total amount, including the Convenience Fee.

> **INFO**
>
> 
> **Handy Tips**
> 
> Convenience Fees are collected in a similar fashion at Custom UI Checkout.
> 

## Reports

Convenience Fees reflect on all the reports in the same format as on the checkout. The charge is added to the total amount in the reports. Reports can be generated from the Dashboard under the **Reports** tab.

## Communication

You should inform the customers about the Convenience Fees. We do not notify the customer of the Convenience Fees except at checkout. In the Razorpay Payment Acknowledgement email on successful payment, the Convenience Fees are added to the total amount.

> **WARN**
>
> 
> **Watch Out!**
> 
> The email does not contain the payment breakup to indicate the Convenience Fees separately but is added to the total amount.
>
