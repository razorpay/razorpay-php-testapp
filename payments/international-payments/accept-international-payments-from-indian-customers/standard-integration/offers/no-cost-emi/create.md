---
title: Create No Cost EMI Offers
description: Create No Cost EMI Offers from the Razorpay Dashboard.
---

# Create No Cost EMI Offers

A No cost EMI offer is a plan where your customers can pay for a product or service in affordable monthly installments with zero interest. This means that the customers are only paying for the product's total price, with no extra charges.

You can create No Cost EMI offers from the Dashboard.

**Handy Tips**

Once you create a No Cost EMI offer, you cannot edit it. To make changes, disable the previous offer and create a new one. 

You can review the offer configurations at the end under the [**Overview**](#overview) tab.

### Description

In the **Description** section, enter the following details. All the fields are mandatory.

1. **Offer Name**: Enter the name of the offer. For example, **Diwali Dhamaka**. This appears at the Checkout.
2. **Display Text**: Enter a meaningful description for the offer. For example, **No Cost EMI Offer**. This appears at the Checkout.
3. **Terms**: Enter the terms and conditions for this offer.
4. Click **Next**.
  

### Discount Type

In the **Discount Type** section, enter the discount details that should be applied for the offer.

1. **Minimum Order amount**: Enter the minimum bill amount for which the No Cost EMI Offer can be applied. For example, the offer can be applied to a minimum amount of **₹3,000**. This is a mandatory field.
2. **Maximum Order amount**: Enter the maximum bill amount for which the No Cost EMI Offer can be applied. For example, the offer can be applied to a maximum amount of **₹4,00,000**.
3. Click **Next**.
  

### Applicable On

Under the **Applicable On** tab, fill in the following details:

1. **Issuer**: Select the bank issuing the No Cost EMI and click **Next**.
2. **EMI Tenure**: Select the tenures to be listed at the Checkout.
3. **EMI Offer Type**: Select **No Cost EMI** from the drop-down list. This also displays the discount that you will bear.
4. Click **Next**.

  

### Offer Validity

In the **Offer Validity** tab, set how long the offer should be valid and how you want to handle the payment failure situations:

1. **Starting On**: Select the **Starts Immediately** check box for the offer to come into effect immediately. Alternatively, you can select the date and the time from which the created Offer should become active.
2. **Expires On**: Select the date and time at which the offer should end. For example, **31 Oct 2020** at **11:59pm**.
3. **On Payment Failure**: Define how to handle payment failure.
    - **Do not allow payment to go through**: The payment is failed.
    - **Allow customer to pay without availing offer**: The payment is allowed even though the set validations are not met. However, the offer is not applied to the bill amount. The customer will be charged the entire order amount.
4. **Max Usage**: Set the number of times the offer should be applied across all transactions. For example, **100**.
5. **Show Offer on Checkout**: Select this check box for the created offer to be displayed for all Standard Checkout payments, including [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md).
6. Click **Next**.

  

### Overview

Click the **Overview** tab to view the summary of the offer that you just created.

1. **Terms and Conditions**: Select the check box after you have read the disclaimer.
2. Click **Create EMI Offer**.
  

By default, all the created offers are in the **enabled** state.

## Test the No Cost EMI Offer

You can test the created No Cost EMI offer for all Standard Checkout payments, including [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md), [Payment Button](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-button.md), [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md) and so on.

> **INFO**
>
> 
> **Handy Tips**
> 
> - You can toggle between Live and Test Modes on your **Dashboard**. Navigate to the top menu ribbon and click the drop-down icon against **Live Mode**. Toggle to **Test Mode** and test the offers enabled.
> 
> - You can make test payments using one of the payment methods at the Checkout. No money is deducted from your account as this is a simulated transaction.
> 

For this example, we will test the offer on a valid Payment Link. Follow the steps given below: 

1. Select the **Payment Link Id** you wish to test the created offer from the Dashboard.
2. Copy the **Payment Link** URL and open it in your browser.
    
3. Enter your contact details and click **Proceed**. 
4. Select **EMI**.
5. Select the payment option you created the offer on from the Dashboard. Enter the required [test details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md).
6. Select Success or Failure, depending on which flow you wish to test.
7. You should see a confirmation message depending on the flow you have selected.

On successful payment, you should have received a discount on your payment. You can verify this by navigating to the Transactions → Payments tab and viewing the payment details.

## Disabling No Cost EMI Offers

To disable No Cost EMI offers:

## Next Steps

Now that the No Cost EMI is created, you should integrate it with the Checkout for customers to avail the EMI scheme.
Know more about [integrating No Cost EMI Offers with Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/no-cost-emi/standard-integration.md).

### Related Information

- [Tutorial - How to Create No Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/no-cost-emi/tutorial.md)
- [No Cost EMI FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/faqs.md)
