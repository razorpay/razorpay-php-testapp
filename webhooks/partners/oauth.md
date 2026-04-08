---
title: Partners OAuth Webhook Events
description: List of Partners OAuth webhook events along with sample payloads.
---

# Partners OAuth Webhook Events

Razorpay OAuth is a token-based authentication method where you can obtain an access token with the consent of the user, without them having to compromise their API key secret. OAuth lets the user decide who can access what level of resources within their Razorpay account.

## List of OAuth Webhook Events

The table below lists the webhook events available for OAuth partners.

Event Name | Description
---
`account.app.authorization_revoked` | Triggered when the sub-merchant revokes access to the partner application.

## Sample Payloads

Given below is the sample payload for the Partners Oauth webhook event.

### Account App Authorization Revoked

```json: account.app.authorization_revoked
{
  "event": "account.app.authorization_revoked",
  "account_id": "acc_Dhk2qDbmu6FwZH", // merchant account id
  "contains": [],
  "created_at": 1678282666
}
```

> **WARN**
>
> 
> **Watch Out!**
> 
> - If you have changed your webhook secret, remember to use the old secret for webhook signature validation while retrying older requests. Using the new secret will lead to a signature mismatch.
> 
> - While generating a signature at your end, ensure that the webhook body is passed as an argument in the **raw webhook request body**. **Do not parse or cast the webhook request body**.
>
