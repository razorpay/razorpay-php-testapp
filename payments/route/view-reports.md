---
title: Route | View Reports
heading: View Reports
description: Generate Razorpay Route reports for transfers, reversals and a combined report for all transactions for linked accounts.
---

# View Reports

You can export reports related to all fund movements between your account and your Linked Accounts using the Dashboard and APIs. 

## Settlement Reports

The settlement recon API generates a detailed report of all the settlements made towards your account. You can use this report to verify transactions and reconcile payments. These reports can be exported for each Linked Account. You can also generate a consolidated report containing transactions for all the Linked Accounts.

Know more about [generating settlement reports using APIs.](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/settlements.md#settlement-recon)

## Transfers and Reversals Reports

You can fetch reports of all transfer and reversal operations that occurred on your account.

  
   Watch this video to see how to generate the Transfers report.
   

  
   Watch this video to see how to generate the Reversals report.
   

    
### To view the transfers report:

          1. Log in to the Dashboard and click **Reports**.
          2. Select **Transfers** from the **Select Report Type** drop-down list.
          3. Select the relevant **Period** from the **Select Period** drop-down list. The following options are available:
                - **Today**
                - **Yesterday**
                - **Last 7 Days**
                - **Last Month**
                - **Daily** - Select a date.
                - **Monthly** - Select a month.
                - **Custom** - Select the start and end date. You can also select a time.
         4. Select the file format from the **Select Format** drop-down list. You can choose CSV, XLSX or XLS formats.
         5. Click **Generate Report** or get it emailed to your registered email address by selecting the **Email Report To** check box.

         Following is a report sample:

         
        

    
### To view the reversals report:

          
        1. Log in to the Dashboard and click **Reports** under **PAYMENT PRODUCTS**.
        2. Select **Reversals** from the **Select Report Type** drop-down list.
        3. Select the relevant **Period** from the **Select Period** drop-down list. The following options are available:
            - **Today**
            - **Yesterday**
            - **Last 7 Days**
            - **Last Month**
            - **Daily** - Select a date.
            - **Monthly** - Select a month.
            - **Custom** - Select a start and end date. You can also select a time.
        4. Select the file format from **Select Format** drop-down list. You can choose CSV, XLSX or XLS formats.
        5. Click **Generate Report** or get it emailed to your registered email address by selecting the **Email Report To** check box.

        Following is a report sample:

        
        

### Related Information
- [Route](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route.md)
- [Linked Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/linked-account.md)
- [Transfer Funds to Linked Accounts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/transfer-funds-to-linked-accounts.md)
- [Initiate Refund](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/linked-account/initiate-refund.md)
