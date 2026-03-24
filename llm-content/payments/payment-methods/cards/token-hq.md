---
title: Tokenisation FAQs
description: Tokenisation and the 2021 RBI guidelines.
---

# Tokenisation FAQs

Given below are FAQs on the Tokenisation guidelines issued by RBI that businesses must adopt by Sep 2022:

#### 1. What is Tokenisation?

Tokenisation is the process by which the original card number / Primary Account Number (PAN) is replaced with a surrogate value called a `token`.

#### 2. Will the token be visible to the cardholder?

No, the `token` will not be visible to the cardholder. It will be managed between the Token Requestor(TR) and Network.

#### 3. Who can save the cards as per the new guidelines?

Card networks and Card issuers are the only parties that can now save plain text cards. All other parties (Payment Acquirers (PA), Payment Gateway (PG), acquiring banks and businesses) can only have a tokenised card. They cannot save a plain text card.

#### 4. Is customer consent required for token creation?

Yes, customer consent and additional factor of authentication (AFA) are required for saving a card/creating a token. This can be the same 2FA used during the first transaction.

#### 5. What fields can be saved by businesses, PAs & PGs?

The last 4 digits of the actual card number and a card issuer name can be stored by entities for tracking/analytical purposes. Apart from this, metadata such as network name, issuer name and so on can continue being stored.

#### 6. Will customers be allowed to view and delete saved card tokens?

Issuing banks are expected to provide a portal where customers can view and delete the list of cards saved online across all businesses. Businesses are also expected to provide an interface for their customers to view and delete saved cards.

#### 7. Are the Saved Card feature and Tokenisation feature the same?
Yes. As per the RBI guidelines, saved cards will be tokenised with networks and issuers to ensure compliance.

#### 8. Why have card transactions significantly decreased for my business?
It is possible that you have not integrated with our **TokenHQ** APIs, an RBI-compliant solution that allows your customers to make saved card payments.

#### 9. Is Razorpay compliant with RBI guidelines on all networks?
Yes, Razorpay is now compliant with RBI guidelines on all networks.

#### 10. How has the token-creation success rate been at Razorpay?
Razorpay’s **TokenHQ** has a record success rate of >99% for token creation across all networks.

#### 11. I am a Razorpay merchant and my account got activated. When will my customer be able to save the cards on checkout?
While the **TokenHQ** solution will be instantly enabled for your account, the onboarding process and turnaround time are different for each network. Our support team will start the onboarding process as soon as your account is activated.

#### 12. How has the token-based payment processing success rate at Razorpay?
Razorpay’s **TokenHQ** has a record success rate of ~80-83% for token-based payment processing across all networks.

#### 13. Why are my customers not able to see any of their saved cards on the Razorpay checkout?
In light of the new tokenisation guidelines, these saved cards of the customers are no longer compliant to be stored with us. Our **TokenHQ** product is an RBI-compliant solution that will help customers save their cards across networks.

#### 14. I am not able to see card details in the Payment API response. Why?
As part of the RBI guidelines, sensitive card information that includes card number, BIN/IIN, cardholder name, expiry details of the card are no longer compliant to be shared from Oct 1, 2022.

#### 15. I am a Razorpay merchant. What changes should I make to adopt the RBI tokenisation guideline?
Once the onboarding process with each network is complete, using **TokenHQ** APIs, your customers will be able to save cards on your platform.

#### 16. Will refunds be impacted?
- There will be no impact on refunds with normal speed. 

- Since aggregators like ourselves are only allowed to store card data up to a maximum of T+4 days, Instant Refunds will be possible until Razorpay settles the payment amount with the merchant, up to a maximum of 4 days from the date of transaction.

- Instant Refunds for payments with tokenised cards will be possible for VISA Debit Cards only, and refunds for all other card payments will be made via Razorpay’s normal refunds.

#### 17. We were relying on Razorpay APIs for card transactions and are worried that these flows will break. What changes must I expect?
Several APIs are impacted due to the guidelines. Based on your integration with Razorpay, the following APIs are altered to return dummy values instead of sensitive card information.
1. [Fetch All Saved Cards for A Customer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards/scenario-1/#33-fetch-all-tokens-of-customer.md).
2. [Fetch A Specific Saved Card for a Customer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards/scenario-1/#34-fetch-card-properties-of-an-existing-token.md).
3. [Fetch Card Properties of Individual Token](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards/scenario-1/#34-fetch-card-properties-of-an-existing-token.md).
4. [Fetch all tokens of a customer](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards/scenario-1/#33-fetch-all-tokens-of-customer.md).
5. [Individual Token API](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards/scenario-1/#34-fetch-card-properties-of-an-existing-token.md).
6. [Fetch expanded card details of a payment](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/custom/features/saved-cards/scenario-1/#34-fetch-card-properties-of-an-existing-token.md).
7. [Fetch card details of a payment](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/#fetch-card-details-of-a-payment.md).

#### 18. Why am I unable to do Instant Refunds for the majority of cards?
- Since aggregators  like  ourselves  are  only  allowed  to  store  card data  up  to  a  maximum  of  T+4  days,  Instant Refunds  for  guest checkout transactions will be possible up to a maximum of 4 days from the date of transaction.
- Instant  Refunds  for  payments  with  tokenized  cards  will  be possible  for  VISA  Debit  Cards  only. Refunds  for  all  other  card payments will be made via Razorpay’s [normal refunds](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/normal.md).

#### 19. What would be the refund timeline post tokenisation? Normal refunds have no restrictions on the timeline.
As per the RBI circular, Razorpay can have the card data upto T+4 or settlement date (whichever is earlier). By this logic, Instant Refunds will be possible up to a maximum of 4 days from the date of transaction.
For tokenised cards, Instant Refunds will be available only for VISA debit cards.

#### 20. In some cases, I am unable to access Instant Refunds after 4 days. Why?
Since aggregators like ourselves are only allowed to store card data up to a maximum of T+4 days, Instant Refunds will be possible up to a maximum of 4 days from the date of transaction.
You can still provide refunds to your customers using [normal refunds.](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/refunds/normal.md)

#### 21. What changes must I expect in my reports?
For all the [standard reports](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/dashboard/reports.md) downloaded from the Dashboard, and the custom reports configured by your support POC, the changes will be as follows. These will be applicable for both older reports as well as newer reports getting generated.
- Cardholder name will be returned as the blank string "".
- Instead of the entire card number, only the last four digits will be shared.
- For international cards, reports will continue to show the complete cardholder name and card number.
