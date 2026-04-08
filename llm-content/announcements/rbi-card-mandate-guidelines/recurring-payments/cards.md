---
title: Cards Go Live on Recurring Payments
description: Check the banks that are going live on cards, existing mandates management and action to be taken by businesses to process recurring payments on card mandates.
---

# Cards Go Live on Recurring Payments

The [RBI issued a new circular](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/rbi-card-mandate-guidelines/recurring-payments.md) on March 31, 2021 for banks to authorise mandates and collect recurring payments on credit, debit, and prepaid cards. According to the circular, all issuing banks must comply with the new guidelines. As a result, Cards as a payment method has been at a standstill since April 2021.

Certain banks have now complied with the new RBI guidelines and can use Cards as a payment method to process recurring payments. The following FAQs provide more information about such banks and our efforts to help businesses process recurring payments without any issues.

## FAQs

Given below are some of the frequently asked questions.

#### 1. Which banks have enabled Recurring Payments through Cards?

Refer to the [list of banks that support cards](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/cards/supported-banks.md).

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

Watch this video to see how a customer registers for Recurring Payments using Cards.

![](/docs/assets/images/end_customer_card_registration.gif)

#### 2. What happens when a customer tries to use the card details of banks that are not live?

If a customer tries to enter card details of banks that are not live, an error message saying `Card does not support recurring payments.` will be displayed, as shown below.

![](/docs/assets/images/cards-mandatehq-error.jpg)

#### 3. Will the existing card tokens continue to work post September 30, 2021?

We will migrate existing credit card tokens of OneCard bank by September 30, 2021. Therefore, you can continue to process recurring payments on such mandates even after September 30, 2021. As and when more banks become available for Recurring Payments using Cards, we will migrate the existing mandates of such banks.

> **WARN**
>
> 
> **Watch Out!**
> 
> All of the card tokens that will be migrated are credit card tokens as debit cards of these banks were not enabled for recurring before.
> 

#### 4. Can we continue to process recurring payments through card tokens of banks that are yet to go live?

> **INFO**
>
> 
> All the card tokens of banks that are not live will be in `paused` state from October 1, 2021. You will not be able to debit these mandates. Do reach out to your customers in advance and register new mandates using alternate payment methods such as UPI or Emandate.
> 

> Refer to the [Recurring Payments document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md) for more information on payment methods.
> 

> Alternatively, you can also use Payment Links from the Dashboard or mobile application and collect payment from customers on the due date.
> 

> Refer to the [Payment Link document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md) for more information.
> 

#### 5. How can I get to know the status of tokens?

You can go to the **Reports section** in your Dashboard and download the token report on October 1, 2021 to know the status of all your tokens to take appropriate action.

To download the token report:

1. Log in to the Dashboard and click the **Reports** from the left menu.
2. Select **Token Report** from the **Select Report Type** drop-down list.
3. Select the relevant **Period** from the **Select Period** drop-down list.
4. Select the file format from the **Select Format** drop-down list. You can choose CSV, XLSX or XLS formats.
5. Click **Generate Report** to download or get it emailed to your registered email address by selecting the **Email Report To** check box.

Watch the animation below for steps to check token status.

![](/docs/assets/images/check_token_report.gif)

#### 6. Are there any changes in the APIs for processing card-based mandates?

There are no changes in the existing integration flow. However, we have added a few optional token parameters to the **Create Order API**. If these parameters are not passed in the request, then the default values are assumed.

Refer to the [Recurring Payments API document](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/create-authorization-transaction.md#112-create-an-order) for more information on changes.

#### 7. Are there any changes in turnaround time (TAT) for registering mandates and for processing debits?

Starting October 1, 2021, you will have to raise the debit request 24 hours in advance for processing debits on registered mandates. A pre-debit notification will be sent to the customer’s registered mobile number or email ID. If they do not pause or cancel the mandate, then the recurring debit will be processed, and you will get the notification through a webhook or in the Dashboard. A sample pre-debit notification is given below for your reference:

![](/docs/assets/images/cards-mandatehq-pre-debit.jpg)

#### 8. Is there a maximum monetary limit for processing card-based mandates?

You can register mandates up to a maximum of ₹15,000 without any intervention from customers and process subsequent payments.

To register and process mandates of amounts greater than ₹15,000, an Additional Factor Authentication (AFA) is required from customers for every subsequent debit.

#### 9. What is the new flow to process subsequent debits using cards under the new RBI guidelines?

> **INFO**
>
> 
> **Note:**
> 
> Businesses to only initiate the debit, and the rest will be taken care of by banks and Razorpay.
> 

To process subsequent debits below ₹15,000:
1. Businesses initiate the debit for an amount less than ₹15,000.
2. Bank will send a pre-debit notification SMS to the customer immediately.
3. The amount will be debited 36 hours after the notification.

![](/docs/assets/images/cards-mandatehq-pre-debit.jpg)

To process subsequent debits above ₹15,000:
1. Businesses initiate the debit for an amount greater than ₹15,000.
2. Bank will send a notification with a link for Additional Factor Authentication (AFA) to the customer immediately. The AFA link will be active for 72 hours.
3. The amount will be debited as soon as the customer provides AFA.

The short animation below shows the customer side flow of giving consent through the AFA link.

![](/docs/assets/images/cards-mandatehq.gif)

#### 10. Are there any changes in processing recurring payments on international cards?

No, there are no changes in processing recurring payments on international cards. The RBI guidelines apply only to domestic cards and not international cards.

#### 11. For card tokens, what is the turnaround time (TAT) for mandate registration?

For card tokens, the mandate registration happens in real-time.

#### 12. What is the TAT for processing debits of cards mandates?

For processing debits below ₹15,000, the TAT is 24 hours after raising the debit request, subject to the customer not pausing or cancelling the mandate.

For processing debits above ₹15,000, the amount will be debited as soon as the customer provides consent through AFA, which has a validity of 72 hours.

#### 13. Can cardholders make changes to registered card tokens? How are businesses notified of such changes?

Yes, cardholders can pause, resume and cancel card tokens from the portal provided by the bank to manage them. You will get notifications through multiple webhooks when a cardholder initiates any such changes to the card tokens. You can also see these changes in the Dashboard.

#### 14. Can businesses cancel card tokens?

Yes, businesses can cancel card tokens by deleting them. Tokens can be deleted either from the [dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/create.md#delete-the-token) or using [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/cards/tokens.md#23-delete-tokens).

#### 15. Is it possible to skip the MandateHQ summary screen that appears before the bank page while making a transaction?

Yes, you can skip the MandateHQ summary screen by enabling **Skip Mandate Summary Page for Cards** option from the Dashboard.

![](/docs/assets/images/skip_mandate_cards_rp.jpg)
