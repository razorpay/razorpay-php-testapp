---
title: Merchant Onboarding UI | Test Integration
heading: 2. Test Integration
description: Peruse this checklist to test if the integration is successful.
---

# 2. Test Integration

Given below is a checklist to test if the integration was successful:

1. When you click on the embedded link on your platform, you should be redirected to Razorpay onboarding and a welcome screen should be displayed.

2. If you have configured the colour theme, the welcome screen should reflect the same. 

3. If you see this message `Something went wrong! We could not process your request. Try Again.` instead of the welcome screen, it could be due to any of the reasons below: 
    - You do not have access to this feature. In this case, please reach out to Razorpay support to enable this feature.
    - Your integration is incomplete, you might have missed providing either the `partnerID` or the `redirectUrl` in the request. 

After testing the integration, you can go live with the changes.

### Related Information

- [Fetch Merchant Account Onboarding Status](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-ui/status.md)
