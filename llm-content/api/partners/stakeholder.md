---
title: Stakeholder APIs
description: Use the Stakeholder APIs to add stakeholders for an account.
---

# Stakeholder APIs

You can use the Stakeholder APIs to add a stakeholder for an account. Each stakeholder will have their KYC. A stakeholder can be a signatory or an owner of the business.

Fork the Razorpay Postman Public Workspace and try the Stakeholder APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/#api-authentication.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-d1f55eac-11ca-49b6-92cc-2fb96ceb0f5e)

### Related Guides

[Sub-merchant Onboarding APIs](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
[Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/partners.md)

### Endpoints

  - **post** `/v2/accounts/:account_id/stakeholders` - Create a Stakeholder: 
    Creates a stakeholder.
  

  - **get** `/v2/accounts/:account_id/stakeholders/:stakeholder_id` - Fetch a Stakeholder With ID: 
    Retrieves the details of a stakeholder.
  

  - **get** `/v2/accounts/:account_id/stakeholders` - Fetch All Stakeholders: 
    Retrieves the details of all stakeholders.
  

  - **patch** `/v2/accounts/:account_id/stakeholders/:stakeholder_id` - Update a Stakeholder: 
    Updates a stakeholder.
