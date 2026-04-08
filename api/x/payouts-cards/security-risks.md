---
title: Security Risks - PCI DSS Non-Compliance
description: Check the security risks involved when using a public API to create a Fund Account for a Contact's card. Understand the benefits of being  PCI-DSS compliant.
---

# Security Risks - PCI DSS Non-Compliance

> **WARN**
>
> 
> **Watch Out!**
> 
> - You must ensure that no two fund accounts have the same `fund_account_id`. The below mentioned security risks can be avoided if this is ensured.
> - If you are **not** PCI DSS compliant, ensure card details do not pass through or are saved on your server.
> 

There are security risks involved when using public APIs. When using a public API in the front end to create a fund account using a customer's card, there is a possibility that a malicious user can tamper with the response data before it reaches you.

The malicious user could have full control over the request and/or response and make changes to the data. They could change the contact's card number sent by you in the request to another card number.

They could also create a fund account with their details on your website or app. When you try to create a fund account for your contact, they could replace the `fund_account_id` returned by Razorpay with the `fund_account_id` linked to their account. This means you could end up making payouts to the malicious user instead of the intended contact.

It is advised you take all required precautions when making public API calls. Ensure you store the `fund_account_id` returned by Razorpay in your database and make payouts only to fund account ids and card numbers you recognize.

If the data is tampered in anyway, the liability lies on malicious user as it is considered a malicious attempt by the user.

> **INFO**
>
> 
> **Handy Tips**
> 
> We highly recommend you get PCI DSS compliance and make private API calls that are authenticated using your API Key. This helps reduce risks related to security.
>
