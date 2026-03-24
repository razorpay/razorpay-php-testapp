---
title: Validate VPA
description: Validate a customer's virtual payment address(VPA) used for making UPI collect payments.
---

# Validate VPA

In UPI collect flow, the customers enter Virtual Payment Address (VPA) to make the payment. You can confirm the validity of VPA by sending an API request to Razorpay.

@include payment-methods/upi-collect-deprecated/standard

### API Sample Code

/payments/validate/vpa

```curl: Request
curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payments/validate/vpa \
-H "Content-Type: application/json" \
-d '{
      "vpa": "gauravkumar@exampleupi"
}'
```json: Response
{
  "vpa": "gauravkumar@exampleupi",
  "success": true,
  "customer_name": "Gaurav Kumar"
}
```

  
    `vpa` _mandatory_
    : `string` The virtual payment address (VPA) you want to validate. For example, `gauravkumar@exampleupi`.

      
> **WARN**
>
> 
>       **Deprecation Notice**
> 
>       UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [ migration documentation](@/Applications/MAMP/htdocs/new-docs/llm-content/announcements/upi-collect-migration/standard-integration.md) to switch to UPI Intent.
>       

  
  
    `vpa`
    : `string` The virtual payment address (VPA) sent as the request attribute. In this case, `gauravkumar@exampleupi`.

    `success`
    : `boolean` Indicates whether the VPA exists. Possible values:
      - `true`: The VPA exists.
      - `false`: The VPA does not exist.

    `customer_name`
    : `string` The name linked to the VPA. For example, `Gaurav Kumar`. Appears only when the value of `success` is `true`.
