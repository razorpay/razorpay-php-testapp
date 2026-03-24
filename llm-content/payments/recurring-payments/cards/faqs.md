---
title: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Recurring Payments using cards.
---

# Frequently Asked Questions (FAQs)

### 1. Which banks have enabled Recurring Payments through Cards?

       Refer to the [list of banks that support cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/cards/supported-banks.md).
       
> **WARN**
>
> 
>        **Watch Out!**
> 
>        Please contact our support team if you are facing difficulties with card payments from any of the major banks on the above list.
>        

       
> **INFO**
>
> 
>        **Handy Tips**
> 
>        We support Visa and Mastercard cards of all major banks.
>        

       Watch this video to see how a customer registers for Recurring Payments using Cards.

       ![](/docs/assets/images/end_customer_card_registration.gif)
      

   
### 2. What happens when a customer tries to use the card details of banks that are not yet available for Recurring Payments?

       If a customer enters card details of banks that are not available for Recurring Payments, an error message is displayed as `Card does not support recurring payments.`

       ![](/docs/assets/images/cards-mandatehq-error.jpg)
      

   
### 3. Will the existing card tokens continue to work post September 30, 2021?

      We will migrate existing credit card tokens of OneCard bank by September 30, 2021. Therefore, you can continue to process recurring payments on such mandates even after September 30, 2021. As and when more banks become available for Recurring Payments using Cards, we will migrate the existing mandates of such banks.

      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       All of the tokens that will be migrated are credit card based tokens as debit cards were not enabled to process Recurring Payments before.
>       

      

   
### 4. Can we continue to process recurring payments through card tokens of banks that are not yet available for Recurring Payments on Cards?

       All the card tokens of the banks that are not yet available for Recurring Payments on cards are put in a `paused` state. You cannot debit these mandates. Please contact your customers and register new mandates using other methods such as UPI or Emandate. Know more about other [Recurring Payments methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments.md). Alternatively, use [Payment Links](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-links.md) from the Dashboard or Razorpay [Mobile App](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/mobile-app.md) and collect payment from customers on the due date.
      

   
### 5. How do I know the token status?

       You can go to the **Reports section** in your Dashboard and download the token report to know the status of all your tokens to take appropriate action.

       To download the token report:

       1. Log in to the Dashboard and click the **Reports** from the left menu.
       2. Select **Token Report** from the **Select Report Type** drop-down list.
       3. Select the relevant **Period** from the **Select Period** drop-down list.
       4. Select the file format from the **Select Format** drop-down list. You can choose CSV, XLSX or XLS formats.
       5. Click **Generate Report** to download or get it emailed to your registered email address by selecting the **Email Report To** check box.

       Watch this video to see how to check the token status.

       ![](/docs/assets/images/check_token_report.gif)
      

   
### 6. Are there any changes in the APIs for processing card-based mandates?

       There are no changes in the existing integration flow. However, we have added a few optional token parameters to the **Create Order API**. If these parameters are not passed in the request, the default values are assumed. Know more about [Recurring Payments APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction/#112-create-an-order.md).
      

   
### 7. Are there any changes in turnaround time (TAT) for registering mandates and for processing debits?

       1. Raise the debit request 36 hours in advance for processing debits on registered mandates. 
       2. A pre-debit notification will be sent to the customer’s registered mobile number or email id. 
       3. If they do not pause or cancel the mandate, the recurring debit will be processed and you will get the notification through a webhook or in the Dashboard. 

       Following is a sample of pre-debit notification:

       ![](/docs/assets/images/cards-mandatehq-pre-debit.jpg)
      

   
### 8. Is there a maximum monetary limit for processing card-based mandates?

       - You can register mandates up to a maximum of ₹15,000 without any intervention from customers and process subsequent payments.
       - If you fall under the following merchant category codes, you can increase the limit to ₹1,00,000 by making changes to your API request, without any intervention from customers and process subsequent payments:
         - Mutual Funds: 6211
         - Insurance: 6300, 6529, 5960
         - Credit Card Bill Payment: 6012, 5413
       - For others to register and process mandates of amounts greater than ₹15,000, an Additional Factor Authentication (AFA) is required from customers for every subsequent debit.
      

   
### 9. What is the new flow to process subsequent debits using cards under the new RBI guidelines?

       
> **INFO**
>
> 
> 
>        **Handy Tips**
> 
>        Businesses should initiate the debit. The banks and Razorpay take action on the rest of the process.
>        

       To process subsequent debits **below ₹15,000**:
       1. Businesses initiate the debit for an amount less than ₹15,000.
       2. Bank will send a pre-debit notification SMS to the customer immediately.
       3. The amount will be debited 36 hours after the notification.

       ![](/docs/assets/images/cards-mandatehq-pre-debit.jpg)

       To process subsequent debits above ₹15,000 (upto ₹1,00,000 for [certain merchant categories](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/cards/faqs/#8-is-there-a-maximum-monetary-limit-for.md)):
       1. Businesses initiate the debit.
       2. Bank will send a notification with a link for Additional Factor Authentication (AFA) to the customer immediately. The AFA link will be active for 72 hours.
       3. The amount will be debited as soon as the customer provides AFA.

       Watch this video to see how the customers provide their consent through the AFA link.

       ![](/docs/assets/images/cards-mandatehq.gif)
      

   
### 10. Are there any changes in processing recurring payments on international cards?

       No, there are no changes in processing recurring payments on international cards. The RBI guidelines apply only to domestic cards and not international cards.
      

   
### 11. For card mandates, how long does it take for the token status to move from the `initiated` state to the `confirmed` state?

       
       For card mandates, the status is updated in real-time.

       

       Method | Bank | TAT Guidelines
       ---
       Cards | All Banks | Real-time
       ---
       
      

   
### 12. For card mandates, how long does it take a subsequent charge to move from the `created` state to the `authorized` state?

       In the case of cards, the status update takes 36 to 72 hours.
      

   
### 13. What is the TAT for processing debits of cards mandates?

       - For processing debits **below ₹15,000**, the TAT is 24 hours after raising the debit request, subject to the customer not pausing or cancelling the mandate.
       - For processing debits **above ₹15,000** (upto ₹1,00,000 for [certain merchant categories](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/cards/faqs/#8-is-there-a-maximum-monetary-limit-for.md)), the amount will be debited as soon as the customer provides consent through AFA, which has a validity of 72 hours.
      

   
### 14. Can cardholders make changes to registered card tokens? How are businesses notified of such changes?

       Yes, cardholders can pause, resume and cancel card tokens from the portal provided by the bank to manage them. You will get notifications through multiple webhooks when a cardholder initiates any such changes to the card tokens. You can also see these changes on the Dashboard.
      

   
### 15. Can I cancel a card mandate?

       Yes. You can use the cancel a card mandate by deleting the token. Tokens can be deleted:
       - [From the Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/create/#delete-the-token.md)
       - [Using APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/recurring-payments/cards/tokens#23-delete-tokens.md)
      

   
### 16. Is it possible to skip the MandateHQ summary screen that appears before the bank page while making a transaction?

       Yes, you can skip the MandateHQ summary screen by enabling **Skip Mandate Summary Page for Cards** option from the Dashboard.

       To enable the option:

       1. Log in to the Dashboard and click **Account & Settings** in the left menu.
       2. Click **Skip mandate summary page** under **Checkout settings**.
          ![](/docs/assets/images/flash_checkout_settings.jpg)
       3. Enable the **Skip Mandate Summary Page for Cards** option.
          ![](/docs/assets/images/skip_mandate_cards_rp.jpg)
      

   
### 17. What types of cards are supported for Recurring Payments?

       - Credit cards from the following networks, issued by any bank in India:
            - Mastercard
            - Visa
            - RuPay
       - Debit cards on the Mastercard and Visa networks, issued by the following banks:
            - ICICI Bank
            - Kotak Mahindra Bank
            - Citibank
            - Canara Bank
      

   
### 18. How do I enable Rupay Card support to collect recurring payments?

     We are doing a beta rollout for recurring payments via Rupay cards. This beta phase will include an on-demand enablement. You should reach out to your POCs to get this enabled.

     Also, alternatively, we will choose a set of merchants to enable this feature and inform them through the POCs.
    

  
### 19. Is any additional integration required to enable RuPay?

     No. If you have already integrated Razorpay Subscriptions or CAW for Visa and Mastercard cards, no additional changes or integrations are required to enable RuPay cards. This applies to all cases, whether you are integrated on Standard Checkout, Custom Checkout or S2S (server-to-server integrations).
    

  
### 20. What banks support recurring payments via RuPay cards?

     RuPay SI requires payment processors/aggregators and banks to work with NPCI to enable the support. NPCI is continuously working with more banks to support recurring payments on RuPay cards. Refer to the [Supported Banks and Apps](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps/#cards.md) document for the list of supported banks.
    

  
### 21. Are the 2021 RBI guidelines for recurring payments on cards applicable to RuPay cards?

     Yes. The 2021 RBI guidelines apply to all cards issued in India across network schemes, including RuPay cards.
    

  
### 22. Is tokenisation of cards required for RuPay SI flows?

     Yes. The card needs to be tokenised during the mandate registration to process subsequent payments on the respective mandate. In all cases, Razorpay will act as an on-behalf token requestor for the business while tokenising the card with the RuPay network.
    

  
### 23. Are there any differences in functionalities/use cases supported via RuPay compared to Visa and Mastercard cards?

     Yes. As SI on RuPay is NPCI's new product, they continuously work to cover an exhaustive set of use cases from an ecosystem standpoint. However, RuPay card recurring is supported for all businesses' extensive and fundamental use cases. Below are the use cases not supported currently:
     - **Mandate registration with saved card**: This is live for NPCI and Razorpay.
     - **Debits greater than 15K**: Initial or subsequent debits greater than 15,000 INR are not allowed for RuPay card recurring transactions. NPCI is working to enable this shortly.
     - **Pre-debit Notification with the same amount on a given mandate**: Currently, NPCI does not support the functionality of raising multiple pre-debits with the same amount simultaneously on a mandate. After a pre-debit notification for a given amount is raised on a mandate, the next pre-debit with the same amount will override the previous pre-debit notification. Hence, the next pre-debit with the same amount should only be raised after the debit is successfully done against the previous pre-debit notification or after the previous pre-debit notification expires(T+3 days to expire, where T is the debit date specified).
    

## Payment retries

    
### 1. Can I retry a failed payment?

         Payment re-tries are not automated. You can manually re-initiate the payment for the same order id in case of a failed payment after 36 hours of initiating the previous payment. 
        

    
### 2. How many times can I retry a payment?

         You can manually re-initiate a payment for the same order id, repeatedly, every 36 hours, until the payment is successful.
