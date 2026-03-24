---
title: Saved VPA
description: Save the VPA details entered by a customer at Razorpay Checkout and use them for future transactions made by the customer on your website or app.
---

# Saved VPA

In an online transaction using UPI collect flow, the flow looks like this:
1. Customers enter their Virtual Payment Address (VPA) at the Checkout.
2. Open the respective UPI apps and complete the payment after successful two-factor authentication. 
3. Customers are redirected to your website or app after successful payment. 

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

## What is Saved VPA

With Razorpay, you can save the VPAs (UPI ids) of a customer at the Checkout itself. 
- The VPAs entered by the customer are stored and secured as **tokens** in Razorpay. 
- The customers do not need to enter the VPAs and use the saved VPAs every time they make a transaction.

    
### On-Demand Feature - Raise a Request

         

> **INFO**
>
> 
> 
> **Feature Request**
> 
> - This is an on-demand feature. Please raise a request with our [Support team](https://razorpay.com/support/#request) to get this feature activated on your Razorpay account.
> - Watch this video to know how to raise a feature enablement request on the Dashboard.
> 
> ![Feature Request GIF](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/feature-request.gif.md)
> 

 to get this feature activated on your account.

        

### Advantages

- **Faster Checkout Experience**: By saving the VPAs at the Checkout, you can help your customers to complete their UPI payments faster, resulting in better success rates and better customer retention for you.
- **Global Tokens**: Razorpay utilizes global tokens functionality wherein tokens saved by a customer on one instance of Razorpay Standard Checkout are displayed in another instance. For example, on a visit to a store A, the customer has saved the `gaurav.kumar@okhdfcbank` on Razorpay Checkout. On a visit to store B, while making the UPI transaction on Razorpay Checkout, the customer will be shown `gaurav.kumar@okhdfcbank`, the VPA previously saved at store A's Checkout.

## Prerequisites

The customers should authenticate once (be logged in) through the saved card flow on Razorpay Checkout.

## How this Works

Watch the GIF to understand Saved VPA flow:

![Saved VPA Flow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/saved-vpa2.gif.md)

On the Checkout page, the customers:

1. Enter the **Phone Number** and click **Continue**.

2. Select **UPI** as the payment method.

3. Enter the UPI ID, that is **VPA**, of their choice and select **Save UPI ID for future use** check box. Razorpay saves the VPAs as tokens.

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     All the saved VPAs are visible under the **UPI** tab at the Checkout.
>     

4. On a repeat visit, customer clicks **Cards**. If there are any saved card details associated to the entered phone number, an OTP is sent.
5. After customer enters OTP, the saved cards become visible. The customer can go back to the checkout screen and select **UPI**.

 to get this feature activated on your account.

        
    

### Advantages

 **Faster Checkout Experience**: By saving the VPAs at the Checkout, you can help your customers to complete their UPI payments faster, resulting in better success rates and better customer retention for you. 
 - For example, on a visit to a store A, the customer has saved the `gaurav.kumar@okhdfcbank` on Razorpay Checkout. 
 - On a visit to store B, while making the UPI transaction on Razorpay Checkout, the customer will be shown `gaurav.kumar@okhdfcbank`, the VPA previously saved at store A's Checkout.

## Prerequisites

The customers should authenticate once (be logged in) through the saved card flow on Razorpay Checkout.

## How this Works

On the Checkout page, the customers:

1. Enter the **Phone Number** and click **Continue**.

2. Select **UPI** as the payment method.

3. Enter the UPI ID, that is **VPA**, of their choice and select **Save UPI ID for future use** check box. 

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     All the saved VPAs are visible under the **UPI** tab at the Checkout.
>     

4. On a repeat visit, customer clicks **Cards**. If there are any saved card details associated to the entered phone number, an OTP is sent.
5. After customer enters OTP, the saved cards become visible. The customer can go back to the checkout screen and select **UPI**.
