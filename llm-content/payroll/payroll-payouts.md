---
title: Make Payroll Payouts and transfer funds to Payroll account as an Admin in RazorpayX Payroll
heading: Fund Transfer & Payroll Payouts
description: Transfer funds and make payroll payouts in RazorpayX Payroll.
---

# Fund Transfer & Payroll Payouts

After you log in to your [Payroll Dashboard](https://payroll.razorpay.com/dashboard) as an admin, add balance to your account to start making payroll payouts. You can also create and assign [user roles](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/user-roles-workflows.md) and [create Approval Workflows](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/approval-workflow.md) to permit or restrict access.

## Transfer Funds

To execute payroll, you must add funds to your Payroll account. Ensure you add funds well before time to prevent payment delays.

To transfer funds to your Payroll account:

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Click **UPDATE BALANCE** in the right pane. 
2. On the **Money Transfer** page, follow the instructions to wire money to the details listed on-screen. 
    - Funds can only be transferred electronically via your bank's internet banking portal/app. 
    - Other methods like cheque/UPI are **not supported**. 
3. Once you initiate the transfer, your Payroll balance gets updated within 24 hours. You also receive an email confirmation once we receive the funds.

    
> **WARN**
>
> 
>     **Watch Out!**
> 
>     It takes up to 24 hours to update your Payroll account balance. Ensure you transfer funds well ahead of time.
>     

> **INFO**
>
> 
> **Handy Tips**
> 
> Explore the RazorpayX - Current Account [integration with Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/current-account.md) to simplify money transfer and fund management. 
> 

    
### Fund Transfer Best Practices

         Ensure the following before you attempt updating your balance: 
         - You update account balance at least **24 hours before** the payroll execution date. 

            For example, your payroll execution date is October 31. In that case, you must add the required funds by October 30.
         - You are transferring funds from a **whitelisted account**. 

            Whitelisting your bank account via Source Account Validation (SAV) is critical to ensure secure and successful fund transfers. 
            
            [Contact support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/plans.md#contact-support) to initiate SAV for your organisation.
         - You transfer funds via IMPS. 

            IMPS is a reliable payment mode that is available 24/7 on all non-working days and bank holidays. Know more about the [default payment mode](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/payroll-payouts.md#modify-default-payout-mode).
        

    
### Fund Credit Not Updated

         Balance updates can be delayed if: 
            - Funds are transferred using NEFT/RTGS during non-banking or bank holidays.
            - There is an error in the beneficiary details in the bank account number/IFSC.

            If you have transferred funds to Payroll and your balance does not reflect the amount, raise a [support ticket](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/plans.md). Include the funds transfer's receipt that shows the following details:
            - Beneficiary account details.
            - Date/Time of transfer.
            - Amount transferred.
            - UTR number.
        

    
### Track Fund Transfer History

         You can view your fund loading history in **ADMIN OPTIONS** → **Reports** → **Ledger** on the Payroll Dashboard.
        

    
### Transfer from YesBank to Axis

         Payroll processes account balance updates via Axis bank and you are required to transfer funds to the account details displayed on the **Money Transfer** page. 

         If you transferred funds to your YesBank payee (Payroll's former bank account), we automatically return those funds to your Axis Bank account. You need not take any action here.

         However, ensure you [transfer funds](#transfer-funds) to the new Axis Bank account. You can find your account details on the **Money Transfer** page.
        

If you have any queries, raise a [support request](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/support.md#razorpayx-payroll).

## Make Payroll Payouts 

Payroll payouts happen after you [execute payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/run-payroll.md#execute-payroll). Following are some options and best practices available to you when making payroll payouts. 

    
### Modify Default Payout Mode

         Payroll by default uses IMPS for any payout. IMPS is available 24/7 and works on all days, irrespective of whether it is a bank holiday or a weekend. 

            However, the payment mode switches to NEFT automatically in the following cases:
            - If the payment amount is more than ₹2,00,000.
            - If the organisation has overridden the default settings.
            - If your employee has chosen NEFT transfers under their [Payments Information](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/employees.md) setup.

            If a money transfer has been made using NEFT when NEFT is unavailable, the transfer remains in the **Pending** status until NEFT is available again. 
        

    
### Modify Payment Narration

         When initiating the payout, we pass your company's name in the narration and cannot control what is else displayed on the beneficiary's account statement.

            To improve your payment narration, switch your payment method to NEFT by navigating to **Settings** → **Payments & Compliance**. This improves the narration issues with some beneficiary banks.

            You can also sign up for a [Current Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/account-types/current-account.md) powered by RazorpayX and [integrate it with Payroll](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/integrations/current-account.md). When you transfer money using your Current Account, the salary and contractor payments are routed through an existing account under your company's name.
        

    
### Check Payment Status

         Payroll administrators can check the status of payments on the Dashboard. 

            1. Log in to the Payroll Dashboard.
            1. Navigate to **Reports** → **Ledger** and view the report. 

            Here you can find an entry for the salary/contractor payment you have made through Payroll.

                ![Role of an Administrator - Reports](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/x-xpayroll-role-of-administrator.jpg.md)

            You can identify a failed payment in the following ways:
            - The entry is not in the Ledger. This means that no payment was made through Payroll.
            - The entry is present. In such cases, check the status column:

                

                **Status** | **Description**
                ---
                **Pending** | The payment has not yet been completed by Payroll.
                ---
                **In Progress** | The payment has been made, but Payroll is awaiting confirmation from the bank that it is completed. This occurs when: 
- Payment was made during non-banking hours/bank holiday.
- There are bank server issues.

                ---
                **Success** | Payment has been made, and the bank has confirmed that it has been completed.
                ---
                **Failed** | The payment could not be completed for some reason. 

                

            Whenever a [payment fails](#payment-failure-reasons), Payroll automatically sends an email to all the administrators of that organisation and the affected [employee/contractor](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#differences-between-employee-and-contractor) with the required information. 
        

    
### Fund Credit Timelines

         Following are the fund credit timelines for: 

            
            Fund Transfer Type | Timeline
            ---
            Account Balance Update | 24 hours
            ---
            Salary Credit | 24 hours
            

            Transfer funds in time to ensure timely credit to bank accounts.
        

    
### No Credit After Payment Success

         If the payment status is **Success** but the beneficiary has not received the funds, wait until 3 working days for the transfer to complete. 
            - This happens rarely due to issues within the banking system. 
            - After 3 days, you either receive the funds or the payment fails, post which you can retry the payment.
        

    
### Payment Failure Reasons

         A Payment can fail for several reasons such as:
            - Account information errors. Either the bank account number or IFSC was invalid. 
            - Issue with the sender/recipient bank.
            - Issue with NPCI.
            - Unknown problem somewhere in the banking system.

            When a payment fails, you can either: 
            - Retry the payment with the link sent to your registered email. 

                The organisation's administrators and the recipient receive an automated email from Payroll when a payment fails. It has the payment details, reason for failure, troubleshooting steps and a link to retry the payment.
            - Check in **Reports** → **Ledger** to re-attempt the payment. 

            You need not make a new payment in case of failure. You can re-attempt the same payment.
        

## Invoices

Invoices are generated against payouts and charges in Payroll. To find your invoices: 

1. Log in to the [Payroll Dashboard](https://payroll.razorpay.com/dashboard). 
1. Go to **Reports** → **Ledger**. 
1. Filter the results using **Type** : **Razorpay Charges**.

All the invoices are hyperlinked sent to the admin's email. Check your spam folder if it is not visible in your primary inbox. 

    
### Manage Invoice Failure

         As per government regulations, GSTIN invoices must be registered at the GSP portal from January 1, 2021. This is to validate your GSTIN with the place of supply. If they do not match, Payroll does not generate an e-invoice.

            To resolve this, you can either: 
            - Update your GSTIN to reach your place of supply. 
            - Remove your GSTIN and get a regular invoice. You cannot claim any GST credit using these invoices.
        

    
### Make Subscription Invoice Payment

         Subscription invoice payments are made to RazorpayX Payroll. To pay a subscription invoice: 

            1. Log in to the Payroll Dashboard.
            1. Navigate to **Reminders** on the Home page and click on the invoice reminder. 
            1. Review the invoice opened and click **PAY INVOICE**. Ensure you have sufficient balance in your account. 
            1. Complete the payment by clicking PAY in the **Pay Invoice?** pop-up modal.  

            You can view your payment details in **Reports** → **Ledger**. Select the filter **Type** as **Razorpay Charges**.
        

## Contractor Payments 

When you pay [contractors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/administrator.md#differences-between-employee-and-contractor/) on the Payroll Dashboard, charges for the payments are not immediately deducted. You instead receive a consolidated monthly invoice for all the payments. 

Payroll customers are charged for each contractor payment made. You must authorise the contractor payment using the OTP received at your registered email address/authenticator app.

> **INFO**
>
> 
> **Handy Tips**
> 
> For contractor payments, the due date is calculated on the basis of invoice and payment date, whichever is earlier.
> 

### Related Information

- [Account Setup Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/quickstart.md)
- [Statutory Compliance](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payroll/statutory-compliance.md)
