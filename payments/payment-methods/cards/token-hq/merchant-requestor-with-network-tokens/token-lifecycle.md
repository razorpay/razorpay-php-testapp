---
title: Token Lifecycle
description: Know about the different states attained by tokens.
---

# Token Lifecycle

There are two types of tokens - service provider token and overall token.

> **INFO**
>
> 
> **Handy Tips**
> 
> 
> - Status will be available for the service provider token and the overall token entity.
> - The status of overall token entity is derived from the individual service provider tokens.
> - You may choose to consume one of them based upon your integration.
> 
> 

Given below is a diagram representing the token lifecycle:

## Token States for Service Provider Token

A service provider token will not have the `initiated` state. This is because the service provider token is created only when a token is successfully created.

Status | Description
---
**active** | The service_provider_token will have active status when the token is successfully created with token_service_providers (card networks). A service_provider_token in `active` status can be used for payment processing.
---
**suspended** | The service_provider_token status changes to `suspended` when the token is suspended temporarily by the card issuing bank or network. A suspended token may be activated again by the token provider. A suspended token cannot be used for payment processing.
---
**failed** | Razorpay failed to create the token with token service provider due to: 
• The card not being eligible. 
• The issue not being supported. 
• An invalid card number.
---
**deactivated** | The service provider token status will change to `deactivated` due to following reasons: 
• service_provider_token has been deleted 
• service_provider_token has expired 
• service_provider_token is deactivated by bank. 
 
 The exact reason for deactivation will be provided in the `status_reason` parameter. Possible values for status_reason are: 
• expired 
• deactivated_by_bank 
A deactivated token cannot become active again and cannot be used for payment processing.

## Overall Token States

A token can have following statuses:

Status | Description
---
**initiated** | This is the token's primary state. This status indicates that Razorpay is working with token service providers to create the token. It may take a few seconds for the token to move to the `active` state.
---
**active** | The token reaches the `active` state if the status of the service_provider_token is active for at least one of the token service providers.
---
**suspended** | The token status changes to `suspended`: 
• If status is not `active` for all the token service providers. 
• If the token is in `suspended` state for at least one of the token service providers. 
A `suspended` token cannot be used for payment processing.
---
**failed** | The token status will be `failed` when the status is failed for all service providers.
---
**deactivated** | Status will be `deactivated` when: 
• Status is not active or suspended for all the token service providers. 
• Status of the token is deactivated for at least one of the token service providers. 
 A deactivated token cannot be used for payment processing.
