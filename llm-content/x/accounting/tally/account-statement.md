---
title: Tally Account Statement Integration with RazorpayX
heading: Tally Account Statement Integration
description: Integrate and sync your RazorpayX account statements with Tally with RazorpayX for reconciliation.
---

# Tally Account Statement Integration

### Sync Account Statements

         You can integrate your RazorpayX Account Statement with Tally to sync payment information from RazorpayX and reconcile. After integration, all the transaction data on the RazorpayX bank statement flows into your accounting software, saving you time and effort. 

        - Account Statement can be synced with both RazorpayX Lite and Current Account. 
        - It updates automatically at the given time, every day.
        - It passes all the required context you need to categorise your transaction.

            
            Term | Description
            ---
            App | The app used to make the payment. Possible values:
-  `payout`
- `VP`: Vendor Payments
- `TP`: Tax Payments
- `PL`: Payout Links

            ---
            TaxType | The tax category imposed on the payout. Possible values:
-  `advance_tax`
- `gst`
- `tds`

            ---
            Cpin | It is a Common Portal Identification Number. It is a 14 digit unique number to identify the challan.
            ---
            Purpose | The purpose for which the expense was incurred.
            ---
            Sub-total | The invoice amount before GST, Cess and other taxes.
            ---
            Invoice number | The invoice number your entered while creating the invoice.
            ---
            Invoice date | The invoice date you entered while creating the invoice.
            ---
            CGST+SGST/ IGST | The CGST+SGST/ IGST amount on the invoice.
            ---
            TDS | The TDS amount on the invoice. Tax deduction at source (TDS) means collecting tax on income in the form of salary, rent, asset sales, dividends.
            ---
            TDS Slab | The interest rates based on the amount. 
            ---
            TDS Name | The TDS Category chosen on the invoice.
            ---
            RzpDesc | The RazorpayX description passed while creating the entity.
            ---
            Payout ID | The unique Payout ID recorded on RazorpayX.
            ---
            Account Number |The beneficiary bank account number.
            ---
            IFSC | The beneficiary bank IFSC.
            ---
            Payee | Name of the beneficiary to which the payment was made.
            ---
            VPA | The virtual payment address used to send or receive money without an IFSC code or bank account number.
            ---
            Notes | Additional Notes.
            

            Navigate to **Account Statement** → **Automate Accounting** on the Dashboard and **Select** the software of your choice. 

            ![Accounting Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-account-statement-integrate-softwares.jpg.md)
        

Integrate your RazorpayX Account Statement with your Tally application to sync payment information and reconcile. 

Once the integration is successful, all the transaction data on the RazorpayX bank statement will automatically flow into Tally, saving you time and effort. It works with both your RazorpayX Lite and Current Accounts.

The [smart bank statement sync](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/bank-statement-sync.md) feature is available as part of the [Tally Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally.md). With this integration, you can understand your transactions in a business perspective, rather than just a banking perspective.

The account statements is synced every day at **6:00 am** and **8:00 pm**.

## Prerequisites

See [RazorpayX-Tally Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/vendor-payments/tally/set-up.md). 

## Sync RazorpayX Account Statement with Tally

1. Open Tally on your system.
2. Click **F1** → **TDLs & Add-ons** → **Manage Local TDS**.
    ![image title](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-tally-integration-1.png.md)
3. Go to file name, click **Specify Path** and paste the file path.
4. Select TCP file and type **YES** under **Load TDL** to enable it. Press enter.
5. Go back to the Gateway of Tally home screen. On your right, you will see 2 more options, **RazorpayX Settings** and **RazorpayX Sync**.
6. Click **RazorpayX Settings** and Enable RazorpayX Integration by entering **YES**. Under authentication settings, enter your MID (log in to Dashboard and click on profile to find yours) and enter your registered email ID.
    ![image title](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-tally-integration-2.png.md)

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     Only the Admin account's details must be shared on Tally for the integration to work. Other team members's account details will not be accepted. We will send an OTP to the registered ID once a week to authenticate the admin.
>     

7. Enable **Sync all transaction from RazorpayX to the Bank Ledger** by selecting **YES**. You can also enable **Invoice Sync Settings** by selecting **YES**, if you have an existing vendor payment integration.
8. Click **Accept settings**.
9. An OTP is sent to your email. Enter the OTP for verification.

This completes the integration. To select a ledger for the flow of transaction, follow the steps below:

1. Upon successful integration, a pop-up saying **Map RazorpayX Bank Account to Bank Ledger** will appear on the screen which displays details of all the RazorpayX Accounts you have.  
2. Under the Creation Method, you can either choose **Create New** or **Map to Existing** Ledgers and then under the Tally Bank Ledger, you can either select the existing Tally Bank Ledger or **Create New**. All your transaction details will flow into whichever ledger you select.

    ![image title](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-tally-integration-3.png.md)
3. Press Enter.

## Test feature

After completing the above integration steps, try creating a Payout on RazorpayX.

1. While entering the Payout Details, under Payout Purpose, you will be able to see additional payout purposes specific to a business’ expenses. This lets you add a reason behind a particular transaction. 
2. Proceed and create a payout by clicking on Pay.
3. Now, go to Tally after the next scheduled sync (at **6:00 am or 8:00 pm**) and navigate to Gateway of Tally. Under Utilities, click on RazorpayX and then click on RazorpayX Bank Statement. Select the Bank Account Ledger for which you want to view the statement, i.e. the account used to create the recent payout.
4. You will be able to see all the bank transaction entries. Click on the entry for which you made the payment recently. 
5. Under Narration at the bottom, you will be able to find all the details associated with the transaction, which you would have to manually share with your finance team. 
6. You can convert this voucher into a payment entry, a receipt or a journal entry. After this, you approve it and that voucher will be posted to your Tally.

Using this feature, you will be able to categorize your transactions into specific expense ledgers very quickly and make your reconciliation and compliance very smooth.
