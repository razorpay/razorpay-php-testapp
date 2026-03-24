---
title: Integrate with Razorpay OAuth | Technology Partners
heading: About OAuth
description: Use OAuth to integrate your applications and securely access Razorpay and RazorpayX client resources via token-based authentication.
---

# About OAuth

**OAuth** or **Open Authorisation** is an authorisation standard that allows you to access resources hosted by other web apps on behalf of a user. 

Razorpay OAuth is a token-based authentication method where you can obtain an access token with the consent of the user, without them having to compromise their API key secret. OAuth lets the user decide who can access what level of resources within their Razorpay account.

As Razorpay Technology Partners, you must use OAuth to securely access and manage the Razorpay accounts of businesses on your platform, without them having to share sensitive credentials. This contributes to better user experience.

#### Example

Assume you are a marketplace that signs up as Razorpay's Technology Partner -  **_Corpfy_**.

You onboard a sub-merchant that wants to sell clothes on your platform - **_Acme_**.

- You integrate with Razorpay OAuth after signing up.
- You create an application via Razorpay Partner Dashboard, to onboard _Acme_ as a sub-merchant.
    - During onboarding, you request _Acme_ to give you their account access.
    - On authorising, you can access the payments, refunds, disputes etcetra on _Acme_'s Razorpay account, but the security information however, remains safe with Razorpay.

After _Acme_ authorises you to access their account, a `code` is generated. You must use this code to generate `access_token` which you can use to trigger APIs on _Acme_'s behalf.

![oauth token process](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/oauth-process.jpg.md)

## Prerequisites

Sign up with Razorpay as a Technology Partner by reaching out to our [support team](https://razorpay.com/support/). You require this to register your application on the Dashboard.

## Video Tutorial

Watch this video to know how to integrate Razorpay OAuth as a Technology Partner.

[Video: https://www.youtube.com/embed/_qWjer8Rw8Q?si=L4XN-lPME7cGGgcF]

## Next Steps

1. [Build Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/integration-steps.md)
2. [Test Integration](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/test-integration.md)
3. [Go-live Checklist](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/go-live-checklist.md)

### Related Information

- [Revoke Access to Application](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth/revoke-access.md)
- [Track Onboarding Status](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/status.md)
