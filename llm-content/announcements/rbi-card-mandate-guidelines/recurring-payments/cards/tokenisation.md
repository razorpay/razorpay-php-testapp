---
title: Cards Tokenisation
description: Frequently asked questions on tokenisation of cards.
---

# Cards Tokenisation

#### 1. What is tokenisation, and how does it impact the business?

Tokenisation is the process by which the original card number / Primary Account Number (PAN) is replaced with a surrogate value called a **token**.

This token will not be visible to the cardholder. It will be managed between the Token Requestor (TR) and Network.
As per the RBI guidelines ([link](https://www.rbi.org.in/Scripts/NotificationUser.aspx?Id=12211&Mode=0) and [link](https://rbidocs.rbi.org.in/rdocs/notification/PDFs/DPSSCOFTBA69C3B5B8CC4025AD089456DD857C5F.PDF)), starting from September 30 2022, Businesses, Payment Gateways and Payment Aggregators are no longer allowed to store actual customer card details. Businesses must adopt a tokenisation solution to continue offering customers a saved card experience.  

Card networks and card issuers are the only parties that can save card details, and others can only have a tokenised card.

#### 2. How is the existing recurring token different from the new token?

This token terminology should not be confused with the existing concept of recurring tokens. Henceforth, we will call the current subscriptions as `recurring tokens` and new surrogate value tokens (for saved cards) as `network tokens`.

For a one-time payment the process of tokenising cards is not mandatory. Cardholders and businesses may choose not to tokenise cards. However, this step is compulsory for recurring mandate creation as Razorpay currently uses saved cards for subsequent debit requests. Post September 30, 2022, network tokens will be used for subsequent debit requests.

#### 3. Is customer consent required for token creation?

Yes, customer consent and an additional authentication factor (AFA) are required to save a card or create a token. This can be the same AFA used during the first transaction (2FA needs to be changed to AFA).

#### 4. Are there any additional efforts required by businesses to integrate?

**Standard Checkout**:
No additional effort is required for businesses that have integrated using the Standard Checkout method. Existing recurring mandate creation APIs will handle network tokenisation from the back-end.

In the case of standard checkout, Razorpay controls the customer-facing UI, and consent is already taken from cardholders mandatorily while registering mandates.

This is how explicit consent is collected from the card holders -

**Custom and S2S Checkout**:
Businesses that have integrated using the Custom & S2S Checkout method, are expected to collect cardholder consent explicitly for tokenisation. The Razorpay Checkout UI shown above can be used as an example. Please check the respective API docs for checking how collected consent is passed to Razorpay.

In all these cases, Razorpay will act as a Token Requestor and handle network token creation based on existing recurring mandate creation APIs.

#### 5. What all information can Payment Gateways, Payment Aggregators and other businesses save?

The businesses can save the last 4 digits of the card number and the card issuer's name for tracking and analytical purposes. Apart from this, they can save metadata such as the network name, issuer name and so on.

#### 6. What happens to the existing saved cards and the ongoing subscriptions post September 30, 2022?

As per the RBI guidelines, Razorpay, as a PG, will have to purge the card data after September 30. However, the existing subscriptions will continue to be active after September 30 as they are already tokenised. 

#### 7. Are there any changes in processing debits for Subscriptions using international cards?

No, there are no changes in processing debits for Subscriptions using international cards. The RBI guidelines apply only to domestic cards and not international cards.

#### 8. Are there any charges on businesses for tokenisation?

Yes. Tokenisation is compulsory for domestic recurring card mandates, and the tokens are used for subsequent debits in the life cycle of any recurring mandate. Razorpay will communicate the cost of using tokenisation facilities to respective businesses. Please reach out to your respective account managers or log in to the Dashboard to raise a ticket for any query related to tokenisation.
