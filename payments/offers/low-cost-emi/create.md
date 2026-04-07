---
title: Create Low Cost EMI Offers
description: Create Low Cost EMI Offers from the Razorpay Dashboard.
---

# Create Low Cost EMI Offers

A Low Cost EMI is an offer where you can decide the cost to subvent for each EMI tenure and the customer bears the remaining cost.
This approach ensures that customers enjoy the benefits of EMI at an affordable price, helping you minimise the overall cost.

**Handy Tips**

Once you create a Low Cost EMI offer, you cannot edit it. To make changes, disable the previous offer and create a new one. 

You can review the offer configurations at the end under the [**Overview**](#overview) tab.

## Description

In the **Description** section, enter the following details. All the fields are mandatory.

1. **Offer Name**: Enter the name of the offer. For example, **Diwali Dhamaka**. This appears at the Checkout.
2. **Display Text**: Enter a meaningful description for the offer. For example, **Low Cost EMI Offers**. This appears at the Checkout.
3. **Terms**: Enter the terms and conditions for this offer.
4. Click **Next**.
  

## Discount Type

In the **Discount Type** section, enter the discount details that should be applied to the offer.

1. **Minimum Order amount**: Enter the minimum bill amount for which the Low Cost EMI Offer can be applied. For example, the offer can be applied to a minimum amount of **₹4,000**. This is a mandatory field.
2. **Maximum Order amount**: Enter the maximum bill amount for which the Low Cost EMI Offer can be applied. For example, the offer can be applied to a maximum amount of **₹1,00,000**.
3. Click **Next**.
  

## Applicable On

Under the **Applicable On** tab, fill in the following details:

1. **Issuer**: Select the bank issuing the Low Cost EMI and click **Next**.
2. **EMI Tenure**: Select the tenures to be listed at the Checkout. 
3. **EMI Offer Type**: Select **Low Cost EMI** from the drop-down list and configure the interest rate that you will bear for each tenure. The remaining interest rate is auto-filled which is borne by the customer.
4. Click **Next**.
  

## Additional Offer Type

> **INFO**
>
> 
> 
> **Feature Request**
> 
> This feature is being released out gradually and may not be available to all businesses yet.
> 
> 

In the Additional Offer Type section, you can configure extra incentives to make your Low Cost EMI offer more attractive to customers. This step allows you to provide additional discounts or cashback rewards on top of the reduced interest EMI benefit.

> **INFO**
>
> 
> **Handy Tip**
> 
> This additional offer will be applied on top of the EMI discount.
> 

1. **Additional Offer**: From the dropdown menu, select the type of additional offer you want to provide:
   - **Instant Discount**: Provides an immediate reduction in the order amount at the time of purchase.
   - **Cashback**: Credits the discount amount back to the customer's account after successful payment completion.
     
> **WARN**
>
> 
>      **Watch Out!**
> 
>      Please note that cashback processing is handled externally and not managed by Razorpay.
>      

2. **Tenures Applicable**: Select the specific EMI tenures for which this additional offer applies. You can choose from the tenures that were configured in the previous step.

3. **Discount**: Choose between a flat amount or a percentage-based discount:

   - **Flat**: Enter a fixed discount amount in rupees.
   - **Percentage**: Enter a percentage-based discount with a maximum limits.

4. **Discount Worth**: Enter the discount amount in cash value. For example, ₹1000.
The field shows "Discount worth in cash" as a helper text to clarify the input format

5. Click **Next**.

  

## Offer Validity

In the **Offer Validity** tab, set how long the offer should be valid and how you want to handle the payment failure situations:

1. **Starting On**: Select the **Starts Immediately** check box for the offer to come into effect immediately. Alternatively, you can select the date and time the created Offer should become active.
2. **Expires On**: Select the date and time the offer should end.
3. **On Payment Failure**: Define how to handle payment failure.
    - **Do not allow payment to go through**: The payment has failed.
    - **Allow customer to pay without availing offer**: The payment is allowed even though the set validations are not met. However, the offer is not applied to the bill amount. The customer will be charged the entire order amount.
4. **Max Usage**: Set the number of times the offer should be applied across all transactions. For example, **100**.
5. **Show Offer on Checkout**: Select this check box for the created offer to be displayed for all Standard Checkout payments including [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md).
6. Click **Next**.

  

## Overview

Click the **Overview** tab to view the offer summary you just created.

1. **Terms and Conditions**: Select the check box after you have read the disclaimer.
2. Click **Create EMI Offer**.
  

By default, all the created offers are in the **enabled** state.

## Test the Low Cost EMI Offer

You can test the created Low Cost EMI offer for all Standard Checkout payments, including [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md), [Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md), [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md) and so on.

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can toggle between Live and Test Modes on your **Dashboard**. Navigate to the top menu ribbon and click the drop-down icon against **Live Mode**. Toggle to **Test Mode** and test the offers enabled.
> 
> - You can make test payments using one of the payment methods at the Checkout. No money is deducted from your account as this is a simulated transaction.
> 

We will test the offer using a valid Payment Link for this example. Follow the steps given below: 

1. Select the **Payment Link Id** you wish to test the created offer from the Dashboard.
    
2. Copy the **Payment Link** URL and open it in your browser.
3. Enter your contact details and click **Proceed**. 
4. Select **EMI**.
5. Select the payment option you created for the offer on from the Dashboard. Select the EMI plan and enter the required [test details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md).
6. Click **Pay via EMI**
7. Select **Success** or **Failure**, depending on which flow you wish to test.
8. You should see a confirmation message depending on the flow you have selected.

On successful payment, you should have received a discount on your payment. You can verify this by navigating to the **Transactions** → **Payments** tab and viewing the payment details.

## Disabling Low Cost EMI Offers

To disable Low Cost EMI offers:

## Next Steps

Now that the Low Cost EMI is created, you should integrate it with the Checkout for customers to avail the EMI scheme.
Know more about [integrating Low Cost EMI Offers with Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/standard-integration.md).

### Related Information
- [Tutorial - How to Create Low Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/tutorial.md)
- [Low Cost EMI FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/low-cost-emi/faqs.md)
