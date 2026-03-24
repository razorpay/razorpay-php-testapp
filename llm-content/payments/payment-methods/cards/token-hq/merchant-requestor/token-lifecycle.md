---
title: Token Lifecycle
description: Know about the different states attained by tokens.
---

# Token Lifecycle

A token goes through various states in its lifecycle.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Status will be available for the service provider token and the overall token entity.
> - The status of overall token entity is derived from the individual service provider tokens.
> - You may choose to consume one of them based on your integration.
> 
> 

Given below is a diagram representing the token lifecycle:

![Token Lifecycle](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cards-token-hq-token-lifecycle.jpg.md)

## Overall Token States

A token can have following statuses:

Status | Description
---
**initiated** | This is the token's primary state. This status indicates that Razorpay is working with token service providers to create the token. It may take a few seconds for the token to move to the `active` state.
---
**active** | The token reaches the `active` state when the token is successfully created and activated by a token service provider, that is, card networks. A token in `active` status can be used for payment processing.
---
**suspended** | The status changes to `suspended` when the token is suspended temporarily by the card issuing bank or network. A suspended token may become active later. A suspended token cannot be used for payment processing.
---
**failed** | The token status will be `failed` when Razorpay fails to create the token with the token service providers due to: 
• The card not being eligible. 
• The issue not being supported. 
• An invalid card number.
---
**deactivated** | Status will be `deactivated` when: 
• The token has expired. 
• The token is deactivated by the bank. 
 A deactivated token cannot become active again, and cannot be used for payment processing.
