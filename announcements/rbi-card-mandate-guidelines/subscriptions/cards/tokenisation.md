---
title: Cards Tokenisation
description: Frequently asked questions on tokenisation of cards.
---

# Cards Tokenisation

#### 1. What is tokenisation, and how does it impact the business?

Tokenisation is the process by which the original card number / Primary Account Number (PAN) is replaced with a surrogate value called a **token**.

This token will not be visible to the cardholder. It will be managed between the Token Requestor (TR) and Network.
As per the RBI guidelines ([link](https://www.rbi.org.in/Scripts/NotificationUser.aspx?Id=12211&Mode=0) and [link](https://rbidocs.rbi.org.in/rdocs/notification/PDFs/DPSSCOFTBA69C3B5B8CC4025AD089456DD857C5F.PDF)), from September 30 2022, businesses, Payment Gateways and Payment Aggregators are no longer allowed to store actual customer card details. Businesses must adopt a tokenisation solution to continue offering customers a saved card experience.  

Card networks and card issuers are the only parties that can save card details, and others can only have a tokenised card.

For one-time payment, this process of tokenising cards (i.e. saving cards with a surrogate value) is not mandatory, card holders as well as merchant may choose to not tokenise cards. But for subscription mandate creation, this step will be compulsory as for subsequent debit requests Razorpay currently uses saved cards, post-30th September,2022 network tokens will be used for subsequent debit requests.

#### 2. Is customer consent required for token creation?

Yes, customer consent and an additional authentication factor (AFA) are required to save a card or create a token. This can be the same 2FA used during the first transaction.

#### 3. Are there any additional efforts required by businesses to integrate?

**Standard Checkout**:
For Standard Checkout recurring merchants, there is no additional effort. No new API call needs to be used, Existing subscription APIs will handle network tokenisation from the back-end.

In case of standard checkout, Razorpay controls the customer facing UI and consent is already being collected from card holders mandatorily while creation of subscriptions.

**Custom and S2S Checkout**:
For subscription merchants on Custom & S2S Checkout, we expect merchants to collect card holder consent explicitly for tokenisation (sample UI is shared above). 

In all these cases, Razorpay will act as Token Requestor and handle network token creation  based on existing subscription APIs. 

#### 4. What all information can Payment Gateways, Payment Aggregators and other businesses save?

The businesses can save the last 4 digits of the card number and the card issuer's name for tracking and analytical purposes. Apart from this, they can save metadata such as the network name, issuer name and so on.

#### 5. What happens to the existing saved cards and the ongoing Subscriptions post September 30, 2022?

As per the RBI guidelines, Razorpay, as a PG, will have to purge the card data after September 30. However, the existing Subscriptions will continue to be active after September 30 as they are already tokenised. 

#### 6. Are there any changes in processing debits for Subscriptions using international cards?

No, there are no changes in processing debits for Subscriptions using international cards. The RBI guidelines apply only to domestic cards and not international cards.

#### 7. Can cardholders make changes to active Subscriptions?

Yes, cardholders can pause, resume and cancel active Subscriptions from the portal provided by the bank to manage them, just like how they can do now. You will get notifications through multiple webhooks when a cardholder initiates any such changes to the Subscriptions. You can also see these changes in the Dashboard.

#### 8. Are there any charges on businesses for tokenisation?

Tokenisation is compulsory for domestic card based subscriptions and the tokens are used for subsequent debits in the life cycle of any subscription. The cost for using tokenisation facility from Razorpay will be communicated to respective merchants. Please reach out to respective account managers or raise a ticket for any query related to tokenisation.
