---
title: Custom Checkout Parameters
description: List of parameters that need to be passed in Custom checkout.
---

# Custom Checkout Parameters

Given below are the checkout parameters that you must pass in the `razorpay.js` file.

## Default Parameters

@include checkout-parameters/custom

## Offers Parameters

Pass these parameters to send offer details to Google.

`additional_info` 
: `object` Offer details.
    
    `displayItems` _mandatory_
    : `array` Used to display the shopping cart information. Possible values:
        - `type`: For example, `SUBTOTAL`.
        - `price`: For example, `20.00`.

    `offerInfo` _mandatory_
    : `object` Used to share information regarding the offer.

        `offers` _mandatory_
        : `array` Detailed information about the offer.
            
            `redemptionCode` _mandatory_
            : `string` The discount code used by the customer. For example, `DISCOUNT10`.
