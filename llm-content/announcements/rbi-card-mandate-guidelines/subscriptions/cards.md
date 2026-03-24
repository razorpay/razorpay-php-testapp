---
title: Cards Go Live on Subscriptions
description: Check the banks that are going live on cards, existing mandates management and action to be taken by businesses to process Subscriptions on card mandates.
---

# Cards Go Live on Subscriptions

The [RBI issued a new circular](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/rbi-card-mandate-guidelines/subscriptions.md) on 31 March 2021 for banks to authorise mandates and collect recurring payments on credit, debit, and prepaid cards. According to the circular, all issuing banks must comply with the new guidelines. As a result, Cards as a payment method has been at a standstill since April 2021 and has impacted the entire recurring ecosystem.

Certain banks have now complied with the new RBI guidelines and going live on Cards for Subscriptions. The following FAQs provide more information about such banks and our efforts to help businesses process Subscriptions and Recurring Payments without any issues.

## FAQs

Given below are some of the frequently asked questions.

#### 1. Which banks are live on the cards, and what does this mean for businesses?

Businesses like yours can onboard customers and process recurring payments through debit, credit and prepaid cards of the following banks from October 1, 2021. Customers can now sign up for Subscription plans using their card details easily.

Refer to the [list of banks that support cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps/#cards.md).

> **WARN**
>
> 
> **Watch Out!**
> 
> Please contact our support team if you are facing difficulties with card payments from any of the major banks on the above list.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> We support Visa and Mastercard cards of all major banks.
> 

#### 2. What happens when a customer tries to use the card details of banks that are not live?

If a customer tries to enter card details of banks that are not live, an error message saying `Card does not support recurring payments` will be displayed, as shown below.

![](/docs/assets/images/cards-mandatehq-error-sub.jpg)

#### 3. Will the existing subscription plans continue to work post September 30, 2021? 

We will migrate existing Subscription plans of City Union Bank (CUB), OneCard and Karur Vysya Bank by September 30, 2021. Wel will continue to process debits on such Subscription plans even after September 30, 2021. For banks that will go live after September 30, 2021, we will migrate the Subscription plans of such banks as and when they go live.

> **WARN**
>
> 
> **Watch Out!**
> 
> All of the Subscriptions that will be migrated are credit card based Subscriptions as debit cards of these banks were not enabled before.
> 

#### 4. What happens to debits of Subscriptions plans of banks that are not live by September 30, 2021?

> **INFO**
>
> 
> 
> All the Subscription plans of banks that are not live will be moved to the `pending` state on their respective billing dates starting from October 1, 2021. We will notify your customers through email with the following options to activate the Subscription again: 

> 
> **Option 1:** Update with new card details of banks that are live.

> 
> **Option 2:** Use UPI as the alternate payment method and register to re-activate the subscription.

> 
> **Alternate Approach** - Register for a new Subscription

> 
> In case you wish to reach out to your customers to sign up for new Subscriptions, you can do the following:
> 1. Cancel all card-based Subscriptions, and the status will be moved to the `cancelled` state.
> 2. Notify your customers about the cancelled Subscriptions and send new subscription links, and request them to register afresh using UPI or the cards of banks that are live.
> 
> Refer to the [Subscriptions document](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions.md) for more information.
> 
> 

#### 5. Are there any changes in turnaround time (TAT) for processing debits on Subscriptions?

Starting October 1, 2021, we will initiate the debit on every Subscription 24 hours in advance. The respective banks will send a pre-debit notification to the customer’s registered mobile number or email ID. If the cutomer does not pause or cancel the Subscription, then the debit will be processed, and you will get the notification through a webhook or in the Dashboard. A sample pre-debit notification is given below for your reference:

![](/docs/assets/images/cards-mandatehq-pre-debit.jpg)

#### 6. Are there any changes in APIs for processing card-based Subscriptions?

No, there are no changes in APIs to process card-based Subscriptions.

#### 7. Is there a maximum monetary limit for processing card-based Subscriptions?

For plans upto maximum amount of ₹15,000, debits will be processed without any intervention from customers.

For plans above ₹15,000 an Additional Factor Authentication (AFA) is required from customers for every subsequent debit.

#### 8. What is the new flow to process card-based Subscriptions under the new RBI guidelines?

> **INFO**
>
> 
> **Note:**
> 
> All the steps mentioned below will be taken care of by Razorpay and banks. No additional effort is required from businesses and customers.
> 

To process debits of amounts below ₹15,000:
1. Razorpay will initiate the debit 36 hours before the actual debit date.
2. Bank will send a pre-debit notification SMS to the customer immediately.
3. The amount will be debited 36 hours after the notification provided the customer does not pause or cancel the Subscription.

To process debits of amounts above ₹15,000:
1. Razorpay will initiate the debit 36 hours before the actual debit date.
2. Bank will send a notification with a link for Additional Factor Authentication (AFA) to the customer immediately. The AFA link will be active for 72 hours.
3. The amount will be debited once the customer provides AFA.

The short animation below shows the customer side flow of giving consent through the AFA link.

![](/docs/assets/images/cards-mandatehq.gif)

#### 9. Are there any changes in processing debits for Subscriptions using international cards?

No, there are no changes in processing debits for Subscriptions using international cards. The RBI guidelines apply only to domestic cards and not international cards.

#### 10. Can cardholders make changes to active Subscriptions?

Yes, cardholders can pause, resume and cancel active Subscriptions from the portal provided by the bank to manage them. You will get notifications through multiple webhooks when a cardholder initiates any such changes to the Subscriptions. You can also see these changes in the Dashboard.

#### 11. Is it possible to skip the MandateHQ summary screen that appears before the bank page while making a transaction?

Yes, you can skip the MandateHQ summary screen by enabling **Skip Mandate Summary Page for Cards** option from the Dashboard.

![](/docs/assets/images/skip_mandate_cards_rp.jpg)
