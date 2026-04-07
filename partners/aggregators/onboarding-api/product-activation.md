---
title: Product Activation Status
description: View the product activation status for your sub-merchant (Razorpay Partnership).
---

# Product Activation Status

Product Activation Status is the current status of the product for the account that the account that partners create for their customers. It notifies the partner about what stage of processing the product requested for the account is in.

## Product Activation Flow

Given below is the complete end-to-end flow explaining the transition among statuses:

Once the partner creates an account and fills in the necessary business, stakeholder and bank details, the partner has to request specific products for the merchant using the [Request Product Configuration API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/partners/product-configuration/request.md). 

As a part of the response to this request, as well as any request containing the [Product Configuration entity](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/partners/product-configuration.md#product-configuration-entity), the `activation status` parameter informs the partner about the product's activation status.

## Product Activation States

The table below lists the various Product Activation states with a brief description of each state:

Status | Description 
---
Requested | This state represents that the requested details have been submitted, awaiting the next step of processing.
---
Needs Clarification | The product configuration API will tell the merchant about fields where we need clarification. 
---
Under Review | Razorpay's support team is verifying the details submitted. 
---
Activated | Indicates that the product is fully activated.
---
Suspended | Indicates that the product has been suspended.

### Related Information

- [Partners](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners.md)
- [About Aggregators](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators.md)
- [Sub-Merchant Onboarding APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
- [Sub-Merchant Onboarding APIs Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/workflow.md)
- [List of Partner APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api.md)
- [Subscribe to Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/partners/aggregators/onboarding-api/webhooks.md)
