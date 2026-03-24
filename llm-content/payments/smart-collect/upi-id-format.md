---
title: Virtual UPI ID Format
description: Indicates the format in which the created UPI ID will appear.
---

# Virtual UPI ID Format

Using Smart Collect, you can create unique UPI IDs to be shared with your customers. The structure and components of these are explained below.

A UPI ID comprises of the following:
- Username

    The username comprises of the prefix, the merchant identifier and the descriptor. For example,`rpy.payto00000gaurikumari@icici` consists of:
    - Prefix  

    Static information. Value is `rpy`.
    - Merchant Prefix  
`payto00000` is the standard merchant prefix. You can opt for a custom, 4-10 character merchant prefix as per your brand requirements. For example, `acmevendor`. To configure this prefix, click the **click here** button.
        ![VPA Configure Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/vpa-configure-button.jpg.md)
        - Add the custom prefix and click **Save**.
            ![Custom VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/vpa-new-custom-name.jpg.md)
    - Descriptor  

    10-16 character unique identifier of your customer provided by you. For example, `gaurikumari`.
- Handle

    The name of the partner bank. For example, `@icici`.

![](/docs/assets/images/smart-collect-upiid_components.jpg)

> **INFO**
>
> 
> **Handy Tips**
> 
> - The combination of merchant identifier and custom descriptor **must be exactly 20 characters**. Special characters are not allowed in merchant identifier or descriptor.
> - Razorpay will auto-generate the descriptor if it is not provided at the time of customer identifier creation.
>
