---
title: GST Credit Checker on RazorpayX Vendor Payments
heading: Input Tax Credit Checker
description: RazorpayX automatically checks if your vendors have filed their GST, identify discrepancies in the filing and control your vendor payouts to recover previously lost credit dues.
---

# Input Tax Credit Checker

Enabling GST Input Credit allows RazorpayX to use GSTR-2A data and check if your vendors have reported GST correctly and reports if there are discrepancies. This helps you optimise your GST input claim.

> **WARN**
>
> 
> **Watch Out!**
> 
> This feature is available only for GST registered businesses. If you want to update your GSTIN on RazorpayX, [contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md).
> 

## Set up GST Input Credit

To set up the GST Input Credit integration:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to the profile icon at the top right and click **My Accounts & Settings** → **Integrations**.
3. Find **GST Input Credit** and click **Get Started**.
4. Log in to your [GST portal](https://gst.gov.in).

    
        
### GST Portal

            After logging in to the GST portal, perform the following steps:
            1. Click **My Profile** on the GST dashboard.
            2. Navigate to **Quick Links** → **Manage API Access**.
            3. Select **Yes** to **Enable API Request**.
            4. Select **30 days** from the **Duration** drop-down and click **Confirm**.
            

    
5. Select the **I have completed above steps** checkbox and click **Next**.
6. Your GSTIN is displayed. Enter the GSTIN portal **Username** and click **Generate OTP**.
    
7. Enter the OTP sent to your registered mobile number on the GSTIN portal and click **Next**.

As soon as you setup the GST credit checker, the data syncs for the current financial year. Post set up, the data syncs every 24 hours. You can also [manually refresh](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/gst-credit-checker.md#refresh-gstr-2a-data) the data. The integration lasts for 30 days at once. After 30 days, you must [**Re-authenticate**](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/gst-credit-checker.md#re-authenticate-gst-input-credit) for the system to access your GSTR-2A data. 

    
### Re-authenticate GST Input Credit

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          You will receive an email and a Dashboard notification when re-authentication is required. You can directly re-authenticate from the banner or email, or you can follow the steps given below.
>          

         To re-authenticate the GST Input Credit integration:

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
         2. Navigate to the profile icon at the top right and click **My Accounts & Settings** → **Integrations**.
         3. Find **GST Input Credit** and click **Re-authenticate**.
         4. Enter the GSTIN portal **Username** and click **Generate OTP**.
         5. Enter the OTP sent to your registered mobile number on the GSTIN portal and click **Next**.
 
         Your re-authentication is successful.
        

## GST Input Credit on Dashboard

You can view whether the vendor has reported GST for the respective invoice on the [RazorpayX Dashboard](https://x.razorpay.com/auth) → **Vendor Payments** → **Invoices**. The GSTR-2A coloumn displays the status.

To view more information, select the required invoice. The relevant information is available in the right-pane.

    
### Refresh GSTR-2A Data

         To refresh the GSTR-2A data on RazorpayX Dashboard:

         1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
         2. Navigate to the profile icon at the top right and click **My Accounts & Settings** → **Integrations**.
         3. Find **GST Input Credit** and click **Refresh**.
        

## Disable GST Input Credit

To disable the GST Input Credit integration:

1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
2. Navigate to the profile icon at the top right and click **My Accounts & Settings** → **Integrations**.
3. Find **GST Input Credit** and click **Disable**.
    
4. In the pop-up, click **Disable**.

This integration is disabled.

## Related Information

- [Invoices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/invoices.md)
