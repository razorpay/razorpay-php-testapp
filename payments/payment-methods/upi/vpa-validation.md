---
title: Validate VPA
description: Validate a customer's virtual payment address(VPA) used for making UPI collect payments.
---

# Validate VPA

In UPI collect flow, the customers enter Virtual Payment Address (VPA) to make the payment. You can confirm the validity of VPA by sending an API request to Razorpay.

> **WARN**
>
> 
> **UPI Collect Flow Deprecated**
> 
> According to NPCI guidelines, the UPI Collect flow is being deprecated effective 28 February 2026. Customers can no longer make payments or register UPI mandates by manually entering VPA/UPI id/mobile numbers.
> 
> **Exemptions:** UPI Collect will continue to be supported for:
> - MCC 6012 & 6211 (IPO and secondary market transactions).
> - iOS mobile app and mobile web transactions.
> - UPI Mandates (execute/modify/revoke operations only)
> - eRupi vouchers.
> - PACB businesses (cross-border/international payments).
> 
> **Action Required:**
> - If you are a new Razorpay user, use [UPI Intent](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi/upi-intent.md). 
> - If you are an existing Razorpay user not covered by exemptions, you must migrate to UPI Intent or UPI QR code to continue accepting UPI payments. For detailed migration steps, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/standard-integration.md).
> 

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
>       UPI Collect is deprecated effective 28 February 2026. This tab is applicable only for exempted businesses. If you are not covered by the exemptions, refer to the [migration documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/announcements/upi-collect-migration/standard-integration.md) to switch to UPI Intent.
>       

  
  
    `vpa`
    : `string` The virtual payment address (VPA) sent as the request attribute. In this case, `gauravkumar@exampleupi`.

    `success`
    : `boolean` Indicates whether the VPA exists. Possible values:
      - `true`: The VPA exists.
      - `false`: The VPA does not exist.

    `customer_name`
    : `string` The name linked to the VPA. For example, `Gaurav Kumar`. Appears only when the value of `success` is `true`.
