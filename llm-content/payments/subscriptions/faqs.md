---
title: Payments | Subscriptions - FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about Razorpay Subscriptions and Subscription links.
---

# Frequently Asked Questions (FAQs)

## General

  
### 1. How does two-factor authentication (2FA) work with Subscriptions?

     The first transaction needs to go through the 2FA process. Further charges can be made automatically, without 2FA.

     

     Methods | Authorisation
     ---
     Debit cards | OTP/3D secure
     ---
     Credit cards | OTP/3D secure
     ---
     UPI | UPI PIN
     ---
     Emandate | NetBanking
     ---
     
    

  
### 2. One of my customers received the following SMS from their bank: `Your trx is debited to xxxx Bank CREDIT Card for Rs. xx.xx. This is not an authenticated trx as per RBI Mandate effective 1 May 12.` What is this?

     Some customers may receive such messages from the bank for subscription transactions. However, there is no need to worry about it as this communication is for information only. We assure you that all transactions on Razorpay are authorised as per RBI compliance.
    

  
### 3. How long can a Subscription remain active?

     We support Subscriptions for a maximum duration of 100 years. The number of billing cycles depends if the subscription is billed daily, weekly, monthly or yearly.
    

  
### 4. Which ecommerce plugins support Subscriptions?

     The plugins that support subscriptions are Woocommerce, Magento and OpenCart.
    

  
### 5. The order status remains "Pending Payment", even after a successful Razorpay payment. Why is WooCommerce not updating my subscription payments?

     Follow the links given below to integrate with WooCommerce Subscription plugin:
     - [Subscriptions plugin for WooCommerce](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/woocommerce.md)
     - [Subscriptions plugin for WooCommerce Build Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/woocommerce/build-integration.md)

     If you have already followed the integration steps in the above links and the problem still persists, Reach out to our [Support team](https://razorpay.com/support/) with the versions of both Razorpay and WooCommerce plugin that you are currently using.
    

  
### 6. Is WooCommerce Subscriptions plugin dependent on the Razorpay WooCommerce plugin? What are the compatible versions?

     Yes, the WooCommerce Subscriptions plugin depends on the Razorpay WooCommerce plugin. The WooCommerce Subscriptions plugin is fully compatible with Razorpay WooCommerce plugin equal to or greater than v2.4, including the latest v3.0 release. Know more about [plugin dependencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/plugins/woocommerce.md#plugin-dependencies).
    

  
### 7. Why am I unable to use Add-ons?

     You are unable to use the Add-Ons feature since it is deprecated.
    

## Plans

  
### 1. Can I update or delete a Plan?

     No. You cannot update or delete a Plan. You should create a new Plan. Alternatively, you can duplicate and modify an existing Plan  as per your requirements.

     To duplicate a Plan:
     1. Log in to the Dashboard and click **Subscriptions** under **PAYMENT PRODUCTS** in the left menu.
     2. Go to **Plans** and click on the required **Plan Id**.
     3. Click the **Duplicate Plan** icon in the top-right corner of the pop-up, as shown in the screenshot below.
        ![Plan duplicate option on Subscription plan duplicate page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/subscription_plan_duplicate.jpg.md)
     4. Edit the plan details as required and click **Create Plan**.
    

## Capture Payments

  
### 1. Do I need to capture the authorisation payment used to validate a customer's card or UPI ID?  

     No. You do not need to capture the  token authorisation payment used to validate a customer's card or UPI ID. This amount is auto-refunded to the customer.
    

  
### 2. Do I need to capture the Subscription payments made by customers?

     No. You do not need to capture payments made for a Subscription. Upfront amount and subsequent charges are auto-captured.

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      The payment will not be captured if you cancel the Subscription before it gets authorised.
>      

    

## Update Subscriptions

  
### 1. Can I update the plan amount or duration of Subscription when it is live?

     Yes. You can update details such as the plan amount, duration and quantity of a Subscription, even if it is live. Refer to the [Update Subscription section](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/update.md) for more details.

     
> **WARN**
>
> 
>      **Watch Out!**
>    
>      You can only update a Subscription authorised using cards and not via UPI and Emandate.
>      

    

  
### 2. When can I update a Subscription?

     You can only update a Subscription when it is in `authenticated` and `active` states. There is no state change when you update a Subscription. Know about [Updating a Subscription](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/update.md).

     
     
> **WARN**
>
> 
>      **Watch Out!**
>    
>      You can only update a Subscription authorised using cards and not via UPI and Emandate.
>      

     
    

## Pause Subscriptions

  
### 1. Who can pause a Subscription?

     This depends on the payment method used for the subscription. Given below is payment method-wise information on who can pause subscription.
     
     
     Method | Business | Customer
     ---
     Debit Cards | ✓ | x
     ---
     Credit Cards | ✓ | x
     ---
     UPI | ✓ | ✓
     ---
     Emandate | ✓ | x
     ---
     

     
> **WARN**
>
> 
>      **Watch Out!**
>    
>      For UPI Subscriptions, you cannot resume a Subscription paused by your customer. If your customer pauses a Subscription, only they can resume it.
>      

    

  
### 2. Can all Subscriptions be paused?

     Subscriptions in the `active` state can be paused. You cannot pause a Subscription in any other state. Refer to the [life cycle](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md) section for more details.
    

  
### 3. How can I pause a Subscription?

     You can pause a Subscription:
     - [From the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/pause-resume-cancel.md#pause-subscription-via-the-dashboard).
     - [Using APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#pause-a-subscription).
    

  
### 4. How can my customer pause a Subscription?

     Your customer can pause Subscriptions authorised via UPI from their UPI app.
    

## Resume Subscriptions

  
### 1. Who can resume a Subscription?

     

     This depends on the payment method used for the subscription. Given below is payment method-wise information on who can resume a subscription.

     Method | Merchant | Customer
     ---
     Debit Cards | ✓ | x
     ---
     Credit Cards | ✓ | x
     ---
     UPI | ✓ | ✓
     ---
     Emandate | ✓ | x
     ---
     

     
> **WARN**
>
> 
>      **Watch Out!**
>    
>      For UPI Subscriptions, you cannot resume a Subscription paused by your customer. If your customer pauses a Subscription, only they can resume it.
>      

    

  
### 2. How can I resume a Subscription?

     You can resume a Subscription:
     - [From the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/pause-resume-cancel.md#resume-subscription-via-the-dashboard).
     - [Using APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#resume-a-subscription).
    

  
### 3. Can I resume a Subscription paused by my customer?

     No. You cannot resume a Subscription paused by your customer. Only your customer can resume such Subscriptions.
    

  
### 4. How can my customer resume a Subscription?

     Your customer can resume Subscriptions authorised via UPI from their UPI app.
    

## Cancel Subscriptions

  
### 1. Can I cancel a Subscription?

     Yes. You can cancel a Subscription:
     - [From the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/pause-resume-cancel.md).
     - [Using APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/subscriptions.md#cancel-a-subscription).
    

  
### 2. Can my customer cancel a Subscription?

     Your customer can cancel only those subscriptions authorised via UPI from their UPI app. They should refer to their respective app's documentation for steps to cancel subscriptions.
    

  
### 3. How can I know when my customer cancels a Subscription?

     You can set up the [subscription.cancelled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/subscriptions.md#subscription-cancelled) webhook event to get a notification when your customer cancels their Subscription. Know more about [subscribing to a webhook event](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/subscribe-to-webhooks.md).
    

## Payment Methods

  
### 1. What payment methods are available for Subscriptions?

     The following payment methods are available for Subscriptions:
     - Credit Cards
     - Debit Cards
      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       Bank downtime can affect success rates when processing recurring payments via debit cards.
>       

     - UPI (early access)
     - Emandate (limited access)
    

  
### 2. I want to enable customers to make payments through UPI only. How can I configure payment methods?

     Follow these steps to enable or disable payment methods (Cards and UPI):
     1. Log in to the Dashboard.
     2. Navigate to **Subscriptions** → **Settings**.
     3. Configure the payment methods:
        - **Card**: Enable this to accept recurring payments via cards for your subscriptions in any of our supported international currencies.
        - **UPI**: Enable this to accept UPI payments when recurring charge is less than ₹15,000. Only INR is supported.
        - **eMandates (NetBanking)**: Enable this to accept recurring payments via Emandate (NetBanking) for your subscriptions. Only INR is supported.
    

  
### 3. Which banks and apps support UPI Subscriptions?

     **Supported Applications**

     Below are the UPI applications and their handles that support UPI Autopay:

     **Frequently Used Applications**

     Below are some of the frequently used UPI applications and their handles:

     

     Applications | Handles  ₹ 15,000
     ---
     PhonePe | @ybl, @ibl and @axl | N/A
     ---
     GooglePay | @okhdfcbank, @okicici and @okaxis | @okhdfcbank, @okicici and @okaxis
     ---
     Paytm | @paytm | @paytm
     ---
     BHIM | @upi | N/A
     ---
     Amazon Pay | @apl and @yapl | @apl and @yapl
     ---
     IndusInd Bank App | @indus | N/A
     

     **Other Applications**

     Below are the other UPI applications and their handles:

     

     Applications | Handles 
     ---
     BHIM Axis Pay | @axisbank and @sliceaxis
     ---
     Bhim Baroda Pay | @barodampay
     ---
     BHIM BOI UPI | @boi
     ---
     BHIM DLB UPI | @dlb
     ---
     BHIM IndusPay | @indus
     ---
     Canara Bank | @cnrb
     ---
     iMobile Pay | @icici
     ---
     NSDL Payments Bank | @nsdl
     ---
     DakPay | @postbank
     ---
     MobiKwik | @ikwik
     ---
     Digibank | @dbs
     ---
     PayZapp | @pz
     

     **Supported Banks** 

     Refer to the [list of banks that support UPI Autopay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/supported-banks.md#supported-banks).
    

  
### 4. Which are the intent-supported PSP apps?

     The below table gives information about the frequently used intent-supported PSP apps on different platforms and checkout integrations.

     **Standard Checkout Integration**

     

     PSP Apps | mWeb | Android SDK | iOS SDK
     ---
     GPay | x | ✓ | ✓
     ---
     PhonePe | ✓ | ✓ | ✓
     ---
     Paytm | ✓ | ✓ | ✓
     ---
     Amazon Pay | x | x | x
     ---
     BHIM | x | ✓ | x
     ---
     

     **Custom Checkout Integration**

     

     PSP Apps | mWeb | Android SDK | iOS SDK
     ---
     GPay | ✓ | ✓ | x
     ---
     PhonePe | ✓ | ✓ | x
     ---
     Paytm | ✓ | ✓ | x
     ---
     Amazon Pay | x | ✓ | x
     ---
     BHIM | x | ✓ | x
     ---
     

     **S2S Checkout Integration**

     
     PSP Apps | mWeb | Android SDK | iOS SDK
     ---
     GPay | ✓ | ✓ | x
     ---
     PhonePe | ✓ | ✓ | x
     ---
     Paytm | ✓ | ✓ | x
     ---
     Amazon Pay | ✓ | ✓ | x
     ---
     BHIM | ✓ | ✓ | x
     ---
     

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      - You should contact our [Support team](https://razorpay.com/support/#request) to enable UPI Intent on standard checkout. Watch this video on how to get it enabled.
>      ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
>      - UPI Intent is not supported for @okaxis handle.
>      

    

  
### 5. How do I enable or disable payment methods for Subscriptions?

     Contact our [support team](https://razorpay.com/support/) to enable or disable a payment method for Subscriptions. This cannot be done from the Dashboard.
    

  
### 6. What do I do if a payment method is not available on my account?

     Contact our [support team](https://razorpay.com/support/) if a payment method is not available for Subscriptions on your account.
    

## Cards

  
### 1. Which banks are live on the cards, and what does this mean for businesses?

     Businesses like yours can onboard customers and process recurring payments through debit, credit and prepaid cards of the following banks from October 1, 2021. Customers can now sign up for Subscription plans using their card details easily.

     Refer to the [list of banks that support cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md#cards).

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      Please contact our support team if you are facing difficulties with card payments from any of the major banks on the above list.
>      

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      We support Visa, Mastercard and RuPay cards from all major banks.
>      

    

  
### 2. What happens when a customer tries to use the card details of banks that are not live?

     If a customer tries to enter card details of banks that are not live, an error message saying `Card does not support recurring payments` will be displayed, as shown below.

     ![Error message when card does not support recurring payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-mandatehq-error-sub.jpg.md)
    

  
### 3. Will the existing subscription plans continue to work post September 30, 2021?

     We will migrate existing Subscription plans of City Union Bank (CUB), OneCard and Karur Vysya Bank by September 30, 2021. Wel will continue to process debits on such Subscription plans even after September 30, 2021. For banks that will go live after September 30, 2021, we will migrate the Subscription plans of such banks as and when they go live.

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      All of the Subscriptions that will be migrated are credit card based Subscriptions as debit cards of these banks were not enabled before.
>      

    

  
### 4. What happens to debits of Subscriptions plans of banks that are not live by September 30, 2021?

     All the Subscription plans of banks that are not live will be moved to the `pending` state on their respective billing dates starting from October 1, 2021. We will notify your customers through email with the following options to activate the Subscription again: 

     **Option 1:** Update with new card details of banks that are live.

     **Option 2:** Use UPI as the alternate payment method and register to re-activate the subscription.

     **Alternate Approach** - Register for a new Subscription

     In case you wish to reach out to your customers to sign up for new Subscriptions, you can do the following:
     1. Cancel all card-based Subscriptions, and the status will be moved to the `cancelled` state.
     2. Notify your customers about the cancelled Subscriptions and send new subscription links, and request them to register afresh using UPI or the cards of banks that are live.

     Refer to the [Subscriptions document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md) for more information.
    

  
### 5. Are there any changes in turnaround time (TAT) for processing debits on Subscriptions?

     Starting October 1, 2021, we will initiate the debit on every Subscription 24 hours in advance. The respective banks will send a pre-debit notification to the customer’s registered mobile number or email ID. If the customer does not pause or cancel the Subscription, then the debit will be processed, and you will get the notification through a webhook or in the Dashboard. A sample pre-debit notification is given below for your reference:

     ![Sample pre-debit notification](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-mandatehq-pre-debit.jpg.md)
    

  
### 6. Are there any changes in APIs for processing card-based Subscriptions?

     No, there are no changes in APIs to process card-based Subscriptions.
    

  
### 7. Is there a maximum monetary limit for processing card-based Subscriptions?

     For plans up to a maximum of ₹15,000, debits are processed without any intervention from customers.
      
     If you fall under the following merchant category codes, you can process plans up to ₹1,00,000 without any intervention from customers:
        - Mutual Funds: 6211
        - Insurance: 6300, 6529, 5960
        - Credit Card Bill Payment: 6012, 5413

     For all other businesses, plans above ₹15,000 require an Additional Factor Authentication (AFA) from customers for every subsequent debit of the Subscription plan.
    

  
### 8. What is the new flow to process card-based Subscriptions under the new RBI guidelines?

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      All the steps mentioned below will be taken care of by Razorpay and banks. No additional effort is required from businesses and customers.
>      

     To process debits of amounts below ₹15,000:
     1. Razorpay will initiate the debit 36 hours before the actual debit date.
     2. Bank will send a pre-debit notification SMS to the customer immediately.
     3. The amount will be debited 36 hours after the notification provided the customer does not pause or cancel the Subscription.

     To process debits of amounts above ₹15,000 (upto ₹1,00,000 for [certain merchant categories](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md#supported-mccs)):
     1. Razorpay will initiate the debit 36 hours before the actual debit date.
     2. Bank will send a notification with a link for Additional Factor Authentication (AFA) to the customer immediately. The AFA link will be active for 72 hours.
     3. The amount will be debited once the customer provides AFA.

     The short animation below shows the customer side flow of giving consent through the AFA link.

     ![Customer flow for consent through AFA link](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/cards-mandatehq.gif.md)
    

  
### 9. Are there any changes in processing debits for Subscriptions using international cards?

     No, there are no changes in processing debits for Subscriptions using international cards. The RBI guidelines apply only to domestic cards and not international cards.
    

  
### 10. Can cardholders make changes to active Subscriptions?

     Yes, cardholders can pause, resume and cancel active Subscriptions from the portal provided by the bank to manage them. You will get notifications through multiple webhooks when a cardholder initiates any such changes to the Subscriptions. You can also see these changes in the Dashboard.
    

  
### 11. What types of cards do Subscriptions support?

     - **Credit cards** from the following card networks issued by any bank in India.
        - Mastercard
        - Visa
        - RuPay
     - **Debit cards** on Mastercard, Visa and RuPay network issued by the following banks.
        - ICICI Bank
        - Kotak Mahindra Bank
        - Citibank
        - Canara Bank
    

  
### 12. How do Subscriptions on Credit Cards work in India?

     Subscriptions are allowed on the following network credit cards provided the customer authorises the first transaction using 2FA authentication or 3D Secure.
     - American Express
     - MasterCard
     - Visa
     - RuPay
    

  
### 13. How do Subscriptions work on Debit Cards work in India?

     Subscriptions are allowed on Mastercard, Visa and RuPay network cards issued by the following banks provided the customer authorises the first transaction using two-factor authentication or 3D Secure.
     - Citibank
     - Canara Bank
     - ICICI Bank
     - Kotak Mahindra Bank
    

  
### 14. When is Card shown as a payment method on the checkout?

     Cards are always shown as a payment method for subscriptions.

     

     Method | Condition | Checkout
     ---
     Card | Plan amount + upfront amount  ₹2,000. | ✓
     ---
     Card | Authentication amount + upfront amount > ₹2,000. | ✓
     ---
     
    

  
### 15. Can I disable cards as a payment method on the checkout?

     Yes. You can disable cards as a payment method using the **Settings** feature on the **Subscriptions** tab.
    

  
### 16. How long does it take to process card payments?

     

     Method | Payment | TAT Guidelines
     ---
     Card | authorisation payment | Real-time.
     ---
     Card | Subsequent charge | Real-time.
     ---
     
    

  
### 17. Are all Subscription frequencies allowed when using Card as a payment method for Subscriptions?

     Yes. All the Subscription frequencies are allowed when using Card as a payment method for Subscriptions.
    

  
### 18. Are there any restrictions when using Card as a payment method for Subscriptions?

     No. There are no restrictions when using Card as a payment method for Subscriptions.
    

  
### 20. Can I display the MandateHQ summary screen before the bank page while making a transaction?

     Yes, you can display the MandateHQ summary screen by enabling the **Show Mandate Summary Page for Cards** option from the Dashboard.

     To enable the option:

     1. Log in to the Dashboard and click **Account & Settings** in the left menu.
     2. Click **Mandate summary page** under **Checkout settings**.
        ![Mandate summary page option under Checkout settings](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/mandate_settings.jpg.md)
     3. Enable the **Show Mandate Summary Page for Cards** option.
        ![Enable show Mandate Summary Page for cards option](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/show_mandate_cards_rp.jpg.md)
    

  
### 21. How do I enable Rupay Card support to collect recurring payments?

     We are doing a beta rollout for recurring payments via Rupay cards. This beta phase will include an on-demand enablement. You should reach out to your POCs to get this enabled.

     Also alternatively, we will choose a set of merchants to enable this feature and inform them through the POCs.
    

  
### 22. Is any additional integration required to enable RuPay?

     No. If you have already integrated Razorpay Subscriptions or CAW for Visa and Mastercard cards, no additional changes or integrations are required to enable RuPay cards. This applies to all cases, whether you are integrated on Standard Checkout, Custom Checkout, or S2S (server-to-server integrations).
    

  
### 23. What banks support recurring payments via RuPay cards?

     RuPay SI requires payment processors/aggregators and banks to work with NPCI to enable the support. NPCI is continuously working with more banks to support recurring payments on RuPay cards. Refer to the [Supported Banks and Apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md#cards) document for the list of supported banks.
    

  
### 24. Are the 2021 RBI guidelines for recurring payments on cards applicable to RuPay cards?

     Yes. The 2021 RBI guidelines apply to all cards issued in India across network schemes, including RuPay cards.
    

  
### 25. Is tokenisation of cards required for RuPay SI flows?

     Yes. The card needs to be tokenised during the mandate registration to process subsequent payments on the respective mandate. In all cases, Razorpay will act as an on-behalf token requestor for the business while tokenising the card with the RuPay network.
    

  
### 26. Are there any differences in functionalities/use cases supported via RuPay compared to Visa and Mastercard cards?

     Yes. As SI on RuPay is NPCI's new product, they continuously work to cover an exhaustive set of use cases from an ecosystem standpoint. However, RuPay card recurring is supported for all businesses' extensive and fundamental use cases. Below are the use cases not supported currently:
     - **Mandate registration with saved card**: This is live for NPCI and Razorpay.
     - **Debits greater than 15K**: Initial or subsequent debits greater than 15,000 INR are not allowed for RuPay card recurring transactions. NPCI is working to enable this shortly.
     - **Pre-debit Notification with the same amount on a given mandate**: Currently, NPCI does not support the functionality of raising multiple pre-debits with the same amount simultaneously on a mandate. After a pre-debit notification for a given amount is raised on a mandate, the next pre-debit with the same amount will override the previous pre-debit notification. Hence, the next pre-debit with the same amount should only be raised after the debit is successfully done against the previous pre-debit notification or after the previous pre-debit notification expires(T+3 days to expire, where T is the debit date specified).
    

## UPI

  
### 1. I have already integrated with Razorpay Subscriptions. Do I need to make changes to my Integration to accept UPI payments for Subscriptions?

     There are no changes to the existing APIs. However, there is a new API to pause Subscriptions that you will have to add to your integration.
    

  
### 2. Which banks and apps support UPI Subscriptions?

     **Supported Applications**

     Below are the UPI applications and their handles that support UPI Autopay:

     **Frequently Used Applications**

     Below are some of the frequently used UPI applications and their handles:

     

     Applications | Handles  ₹ 15,000
     ---
     PhonePe | @ybl, @ibl and @axl | N/A
     ---
     GooglePay | @okhdfcbank, @okicici and @okaxis | @okhdfcbank, @okicici and @okaxis
     ---
     Paytm | @paytm | @paytm
     ---
     BHIM | @upi | N/A
     ---
     Amazon Pay | @apl and @yapl | @apl and @yapl
     ---
     IndusInd Bank App | @indus | N/A
     

     **Other Applications**

     Below are the other UPI applications and their handles:

     

     Applications | Handles 
     ---
     BHIM Axis Pay | @axisbank and @sliceaxis
     ---
     Bhim Baroda Pay | @barodampay
     ---
     BHIM BOI UPI | @boi
     ---
     BHIM DLB UPI | @dlb
     ---
     BHIM IndusPay | @indus
     ---
     Canara Bank | @cnrb
     ---
     iMobile Pay | @icici
     ---
     NSDL Payments Bank | @nsdl
     ---
     DakPay | @postbank
     ---
     MobiKwik | @ikwik
     ---
     Digibank | @dbs
     ---
     PayZapp | @pz
     

     **Supported Banks** 

     Refer to the [list of banks that support UPI Autopay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/supported-banks.md#supported-banks).
    

  
### 3. Which are the intent-supported PSP apps?

     The below table gives information about the frequently used intent-supported PSP apps on different platforms and checkout integrations.

     
      
      
      PSP Apps | mWeb | Android SDK | iOS SDK
      ---
      GPay | x | ✓ | ✓
      ---
      PhonePe | ✓ | ✓ | ✓
      ---
      Paytm | ✓ | ✓ | ✓
      ---
      Amazon Pay | x | x | x
      ---
      BHIM | x | ✓ | x
      ---
      
      
      
      
      PSP Apps | mWeb | Android SDK | iOS SDK
      ---
      GPay | ✓ | ✓ | x
      ---
      PhonePe | ✓ | ✓ | x
      ---
      Paytm | ✓ | ✓ | x
      ---
      Amazon Pay | x | ✓ | x
      ---
      BHIM | x | ✓ | x
      ---
      
      
      
     
     PSP Apps | mWeb | Android SDK | iOS SDK
     ---
     GPay | ✓ | ✓ | x
     ---
     PhonePe | ✓ | ✓ | x
     ---
     Paytm | ✓ | ✓ | x
     ---
     Amazon Pay | ✓ | ✓ | x
     ---
     BHIM | ✓ | ✓ | x
     ---
     
     
     

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      - You should contact our [Support team](https://razorpay.com/support/#request) to enable UPI Intent on standard checkout. Watch this video on how to get it enabled.
>         ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
>      - UPI Intent is not supported for @okaxis handle.
>      

    

  
### 4. Is there a limit on the debit amount in UPI?

     For UPI, the maximum amount for any one transaction is ₹1,00,000, and for BFSI (Banking, Financial Services and Insurance) merchants, it is ₹2,00,000.
    

  
### 5. When is UPI shown as a payment method on the checkout?

     UPI is shown on the checkout in the following cases:

     

     Method | Condition | Checkout
     ---
     UPI | Plan amount + upfront amount  ₹15,000. | x
     ---
     UPI | Authentication amount + upfront amount > ₹15,000. | x
     ---
     
    

  
### 6. How long does it take to process UPI payments?

     

     Method | Payment Type | TAT Guidelines
     ---
     UPI | Authorisation Payment | Real-time.
     ---
     UPI | Subsequent Charge | All UPI Autopay auto-debits are processed and completed by 9:00 PM IST on the scheduled debit date. *****
     

     ***** Due to [payment retries](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/payment-retries.md#retry-model-for-upi), this may extend to T+1.
    

  
### 7. Can I disable UPI as a payment method on the checkout?

     Yes. You can disable UPI as a payment method using the **Settings** feature on the **Subscriptions** tab.
    

  
### 8. Can I update a Subscription authorised via UPI?

     No. Currently, you cannot update a Subscription authorised via UPI.
    

  
### 9. Can I create an additional charge for a Subscription authorised via UPI?

     No. Currently, this is not possible.
    

  
### 10. Can I pause a Subscription authorised via UPI?

     Yes. You can pause a Subscription authorised via UPI.
    

  
### 11. Can I cancel a Subscription authorised via UPI?

     Yes. You can cancel a Subscription authorised via UPI.
    

  
### 12. Can my customer update a Subscription authorised via UPI?

     No. Currently, it is not possible to update a Subscription authorised via UPI.
    

  
### 13. Can my customer cancel a Subscription authorised via UPI?

     Yes. Customers can manage, modify or cancel their mandates anytime directly from their UPI app ([Google Pay](https://support.google.com/pay/india/answer/10840624?hl=en-IN#zippy=%2Cunable-to-cancel-revoke-or-find-the-option-to-cancel-autopay%2Cfind-your-mandate-in-google-pay%2Ccant-find-autopay-section%2Crevoke-or-cancel-a-mandate), [Paytm](https://paytm.com/faqs/upi/how-to-cancel-upi-mandate), PhonePe and so on) or by contacting your business. Once cancelled, no further payments are processed.
    

  
### 14. Can my customer pause a Subscription authorised via UPI?

     Yes. Your customers can pause a Subscription authorised via UPI from their UPI app.
    

  
### 15. Can I charge UPI payments in international currencies?

     No. Currently, UPI only supports `INR` payments.
    

  
### 16. Can my customers use UPI as the payment method for Subscriptions?

     Yes, your customer can use UPI as a payment method for Subscriptions.
    

  
### 17. Are all subscription frequencies allowed for UPI Subscriptions?

     Yes, all frequencies are allowed when using UPI as a payment method.
    

  
### 18. Are there any restrictions when using UPI as the payment method for Subscriptions?

     Yes. The maximum transaction amount allowed is ₹15,000 when using UPI as a payment method for Subscriptions.

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      For certain MCCs, the maximum amount limit for one transaction is ₹1,00,000. Refer to the [the list of supported MCCs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md#supported-mccs), issuing banks and PSP applications.
>      

    

  
### 19. What is the supported amount limit on PSP applications?

     

     PSP apps | Mandate Maximum Amount  ₹15,000
     ---
     PhonePe | Yes | No
     ---
     GooglePay - okhdfcbank | Yes | Yes
     ---
     GooglePay - okaxis | Yes | Yes
     ---
     GooglePay - okicici | Yes | Yes
     ---
     GooglePay - oksbi | Yes | Yes
     ---
     BHIM | Yes | No
     ---
     Paytm | Yes | Yes
     ---
     Amazon Pay | Yes | Yes

     
    

  
### 20. Is QR Code supported for UPI Autopay?

     Yes, [QR Code](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/qr-codes.md) is supported on Standard Checkout to collect Subscription payments. The customers can scan the QR using any PSP app and make the payment.
    

  
### 21. I am getting an error message `Payment Failed. Please contact the site admin.` during the authentication transaction. Why?

     This error occurs when the amount of a plan exceeds the pricing plan configured to the business account for UPI. Ensure the minimum amount is greater than or equal to the configured pricing plan for UPI.
    

  
### 22. Can I charge a UPI handle manually?

     No. You cannot charge a UPI handle manually.
    

  
### 23. Can I restrict my customers from pausing and cancelling the mandate?

     Yes, you can restrict your customers from pausing and cancelling the mandate by enabling OC125 functionality. After enabling, the **Pause** and **Cancel** mandate buttons are not available on PSP apps as shown in the image below.

     ![Checkout with OC125 Enabled](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/upi_oc125.jpg.md)

     This functionality is supported only for lending businesses. Please contact our [Support team](https://razorpay.com/support/#request) for more information.
    

  
### 24. Which are the intent-supported PSP apps for TPV?

     The below table gives information about the frequently used intent-supported PSP apps for TPV on different platforms and checkout integrations.

     
        
        
        PSP Apps | mWeb | Android SDK | iOS SDK
        ---
        GPay | ✓ | ✓ | ✓
        ---
        PhonePe | ✓ | ✓ | x
        ---
        Paytm | ✓ | ✓ | ✓
        ---
        Amazon Pay | x | ✓ | x
        ---
        BHIM | x | ✓ | x
        ---
        
        
        
        
        PSP Apps | mWeb | Android SDK | iOS SDK
        ---
        GPay | ✓ | ✓ | ✓
        ---
        PhonePe | ✓ | ✓ | x
        ---
        Paytm | ✓ | ✓ | ✓
        ---
        Amazon Pay | x | ✓ | x
        ---
        BHIM | x | ✓ | x
        ---
        
        
        
        
        PSP Apps | mWeb | Android SDK | iOS SDK
        ---
        GPay | ✓ | ✓ | x
        ---
        PhonePe | ✓ | ✓ | x
        ---
        Paytm | ✓ | ✓ | x
        ---
        Amazon Pay | ✓ | ✓ | x
        ---
        BHIM | ✓ | ✓ | x
        ---
        
        
      

     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      - You should contact our [Support team](https://razorpay.com/support/#request) to enable PSP apps other than PhonePe and Paytm on Standard Checkout for UPI TPV. Watch this video on how to get it enabled.
>       ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
>      - UPI Intent TPV is not supported for @okaxis handle.
>      

    

## Emandate

  
### 1. What is Emandate?

     Similar to Cards, Emandate is a digital payment service that can be used to set up recurring payments for Subscriptions on your bank account. With Emandate, you can provide standard instructions to your issuing bank, allowing them to debit the mentioned amount from your bank account automatically.
    

  
### 2. How do I enable Emandate as a payment method on the checkout?

     Emandate is automatically enabled for you on the **Settings** page, and hence there are no additional steps required to enable it.
    

  
### 3. Can I disable Emandate as a payment method on the checkout?

     Yes. You can disable Emandate as a payment method from the **Settings** page on the **Subscriptions** tab.
    

  
### 4. Which banks have enabled Subscription through Emandate?

     Currently, Subscription through Emandate is available for a few banks. Refer to the [Supported Banks and Apps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md) page for more information.
    

  
### 5. Is there a maximum amount limit per debit request for Emandate?

     You can set the maximum amount while initiating registrations for your customers. The maximum amount varies depending on the authentication mode using which customers want to set up the mandate.

     If you do not set a limit for the mandate, the maximum limit defaults to ₹1,00,00,000 for Emandates.

      **For Emandates via NPCI**

      The following table lists the auth types and their maximum limit allowed for Emandates via NPCI.

      
      **Auth Type** | **Maximum Allowed Limit** | Default Allowed limit(if no max amount mentioned)
      ---
      Netbanking | ₹1,00,00,000 | ₹1,00,00,000
      ---
      Debit Card | ₹1,00,00,000 | ₹1,00,00,000
      ---
      Aadhaar | ₹1,00,00,000 | ₹1,00,00,000
      

      **For Emandates - Direct bank integration (SBI, ICICI, Axis)**

      The following table lists the auth types and their maximum limit allowed for Emandates - Direct bank integration (SBI, ICICI, Axis).

      
      **Auth Type** | **Maximum Allowed Limit** | Default Allowed limit(if no max amount mentioned)
      ---
      Netbanking | ₹1,00,00,000 | ₹1,00,00,000
      

      **For Emandates - Direct bank integration (HDFC)**

      The following table lists the auth types and their maximum limit allowed for Emandates - Direct bank integration (HDFC).

      
      **Auth Type** | **Maximum Allowed Limit** | Default Allowed limit(if no max amount mentioned)
      ---
      Netbanking | ₹1,00,000 | ₹1,00,000
      
    

  
### 6. The Subscription state is still `created` and not `active`, even after paying the registration payment. Why?

     The Subscription changes to `active` when both registration and subsequent payments are made. This is a bank constraint as the payment and registration cannot happen on the same day. The update on this may take T+1 days. If the payment still fails, the Subscription remains in the `created` state.
    

  
### 7. Does the charge happen on bank holidays?

     No. If the charge day (T) is a bank holiday, we will charge on T-1 days. Similarly, if the charge day (T) and the previous day (T-1) are bank holidays, we will charge on T-3 days. This process will not affect your charge cycle for the subsequent months.
    

  
### 8. Can my customer pause or cancel a Subscription that is authorised via Emandate?

     No, your customer cannot pause or cancel a Subscription that is authorised via Emandate. However, they can directly contact the bank and cancel a Subscription, and the subsequent payment will fail for such Subscriptions.
    

  
### 9. The payment was supposed to happen on Day T. However, I have neither got a payment update nor the Subscription status changed to `subscription.pending`. Why?

     Occasionally Emandate payment may get delayed from the bank side. You would get an update in 1 to 2 days, and the Subscription status will be changed accordingly.
    

  
### 10. How can I modify or edit a mandate that has already been created?

     You cannot modify or edit a mandate that has already been created. In this case, you need to create a new mandate for the user if any changes need to be made.
    

  
### 11. Which authentication type is supported for the Aadhaar based authentication?

     Razorpay supports eSign as an [authentication type](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md#emandate) for the Aadhaar authentication.
    

## Offers

  
### 1. When can I link an offer to a Subscription?

     You can link an offer to a Subscription when creating the Subscription of after it has gone live.

     know more about [Subscription Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers.md).
    

  
### 2. Do I have to link an offer to a Subscription when creating the Subscription?

     You can link an offer to a Subscription when creating the Subscription of after it has gone live.
    

  
### 3. How do I link an offer to a Subscription?

     You can link an offer to a Subscription either using our APIs or from the Dashboard.

     Know more about [Subscription Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers.md).
    

  
### 4. Can I link an offer to a Subscription using APIs?

     You can link an offer to a Subscription either using our APIs or from the Dashboard.

     Know more about [Subscription Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers.md).
    

  
### 5. Can I link an offer to a Subscription from the Dashboard?

     You can link an offer to a Subscription either using our APIs or from the Dashboard.

     Know more about [Subscription Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers.md).
    

  
### 6. Can I link an offer to a Subscription after it has gone live?

     Yes. You can [link an offer to a Subscription after it has gone live](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/offers/link.md#link-offer-to-an-existing-subscription).
    

  
### 7. Can I upgrade a Subscription when it has an offer linked to it?

     Yes. You can upgrade a Subscription even it has an offer linked to it. However, you cannot downgrade a Subscription when an offer is linked to it.

     To downgrade the Subscription, you will have to remove the offer linked to it, downgrade the Subscription and then reapply the offer to it.
    

  
### 8. Can I downgrade a Subscription when it has an offer linked to it?

     No. You cannot downgrade a Subscription when an offer is linked to it.

     To downgrade the Subscription, you will have to remove the offer linked to it, downgrade the Subscription and then reapply the offer to it.
    

  
### 9. What state should the Subscription be in to link an offer to it?

     To link an offer to a Subscription it should be in the active state.
    

  
### 10. What state should a subscription be in to remove an offer to it?

     You can remove an offer linked to a Subscription in any state. Do remember that invoices generated after the offer is removed will be charged in full.
    

## International Payments

  
### 1. Can I accept Subscription payments in currencies other than INR?

     Yes. You can accept Subscription payments in any of the [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).

     
> **INFO**
>
> 
>      **Handy Tips**
>    
>      Only card payments support international currencies. UPI payments do not support international currencies.
>      

    

  
### 2. In what currency are international payments settled?

     Settlements are always made in `INR`. The payment is converted using the exchange rate at the time of payment creation.

     Refer to our [International Payments page](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md) for more details.
