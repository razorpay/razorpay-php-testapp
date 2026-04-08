---
title: Set Up RazorpayX-Tally Integration
heading: Set Up Tally Integration
description: Download, start and set up the RazorpayX-Tally Integration.
---

# Set Up Tally Integration

Start the RazorpayX-Tally Integration via your [RazorpayX Dashboard](https://x.razorpay.com/). To install and set up your integration, you must: 
1. [Download the plugin](#download-plugin). 
2. [Locate the file path and install the integration](#install-and-set-up). 
3. [Configure your Tally Application](#configure-integration). 

After setup, change or modify the settings in your Tally application to make the [four flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally.md#four-flows) of the integration work seamlessly.

Watch the video below for the instructions or read along. 

You can also watch the [RazorpayX - Tally Integration video in Hindi](https://youtu.be/pyID2TsAV4U). 

## Download Plugin 

To start the integration, download the plugin from the [RazorpayX Dashboard](https://x.razorpay.com/auth). The `RazorpayX.tcp` file is compatible with TallyPrime or Tally.ERP 9 (from version 6 and upwards) on your Windows device. 

You can find the integration options in four places on the Dashboard. 

- **Banner on RazorpayX Home Page**: 

   On the [RazorpayX Dashboard](https://x.razorpay.com/auth), click **GET STARTED →** in the **Introducing Smart Bank Statement Sync** to download the plugin.

- **Banner on Vendor Payments Dashboard**: 

   Click **GET STARTED →** in the **Sync Vendor Payment with your Accounting Software Today!** banner on your RazorpayX Vendor Payments Dashboard. 

- **Accounting Integration Button**: 

   In the Vendor Payments Overview page, click the grey **ACCOUNTING INTEGRATIONS** button next to the **+ INVOICE** button.

- **Integrations in Account Settings**: 

   On the [RazorpayX Dashboard](https://x.razorpay.com/auth):
      1. Navigate to the user icon at the top right of the page.
      1. Click **My Account & Settings**. 
      1. Go to **Integrations** in the left menu. 
      1. Click the Tally icon button under **ACCOUNTING TOOL INTEGRATION** to download the plugin. 
         

Start integrating RazorpayX with Tally by yourself or invite your Finance Team to do it. Know more about [managing teams and user roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/manage-teams.md) in RazorpayX. 

## Set Up Integration 

After you have downloaded the file, begin the setup process explained below. 

## Install and Set Up

> **INFO**
>
> 
> **Handy Tips**
> 
> If you use Tally on the cloud, ask your Tally administrator to install the `RazorpayX.tcp` file. 
> 

### Install Integration

After you download the `RazorpayX.tcp` file, locate where you have downloaded it.
1. On your Windows device, right click on the `.tcp` file and click **Properties**.
    
2. In the **Security** tab of the **Properties** window, note the path against the **Object name**.

### Set Up Integration

You or your team can set up the integration in the following way:

1. Open Tally to show the **Gateway of Tally** page.
1. Go to **F1: Help** → **TDLs & AddOns** → **F4:Manage Local TDLs**. 
   
1. In the **TDL Configuration screen**: 
   - Click **Specify Path** in the **Specify File Path** pop-up page. 
   - Paste the path noted [during installation](#install-integration). 
   You can also **Select from Drive**. 
1. Enter **Yes** against Load TDL. 

Once the TDL loads, you can view the author and the summary of your actions. For more information on the setup process, refer [How to Setup TDL and Add-ons in Tally Prime](https://www.labhsoftware.in/2020/12/10/setup-tdls-and-add-ons-in-tally-prime/).

#### Post Set Up

After the setup process, you can see:

- **RazorpayX** in the **Gateway of Tally** page.
- Under **F1:Help** to the top-right of the page:
   - **R:RazorpayX Settings**.
   - **X:RazorpayX Sync**.
      

You have completed the setup. Check how to [configure the system](#configure-integration). 

## Configure Integration 

See how you can configure the integration. 

### Prerequisites 

Before you configure the system, keep your merchant id and the Administrator/Finance role/Owner's email id available. To find your merchant id:
1. Log in to the [RazorpayX Dashboard](https://x.razorpay.com/auth).
1. Navigate to the user icon drop-down to the top right corner of the page. 

You can find your merchant id above **My Account & Settings**.

> **WARN**
>
> 
> **Watch Out!**
> 
> For security purposes, you must re-login once every 7 days. Use the OTP you receive at your administrator/finance role/owner's email address to authorise access and ensure Tally data security. 
> 

### Configure Application

To configure your application:
1. Go to **R:RazorpayX Settings**. The **RazorpayX Configuration (in Developer Mode)** page appears.  
1. Select **Yes** against **Enable RazorpayX Integration**.
    
1. Enter your RazorpayX merchant id noted in [prerequisites](#prerequisites).
1. Under the RazorpayX admin login id, enter the finance/owner/admin role's email id. You receive the OTP required for Tally account authentication here.
1. Select a time when you are not using the Tally application. Tally automatically syncs the payment and reconciliation entries to RazorpayX in this time frame. You cannot use your Tally application during this time.

You have now partially configured your the RazorpayX-Tally Integration. 

### Enable Flows

To fully configure the application, enable and disable the settings as per the [four flows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally.md#four-flows) applicable to your business. 
- If you choose to [bring bills](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/bring-bills.md) to Tally from RazorpayX, enable it at this step. 
- You can change the settings to sync [Purchase Vouchers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/sync-purchase-vouchers.md) and [Payment Vouchers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/sync-payment-vouchers.md) entries in Tally and RazorpayX. Select **Yes** against only one of them at a time. 
- Additionally, choose how you want to sync these invoices: 
   - When receiving the invoices.
   - At the time of payment of invoices. 
   
   Select **Yes** for only one of these.

### Related Information

- Keyboard shortcuts in [Tally Prime](https://help.tallysolutions.com/tally-prime/keyboard-shortcuts/keyboard-shortcuts-tally-prime/)
- [Create RazorpayX Ledger](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/tally-epayments/set-up.md)
