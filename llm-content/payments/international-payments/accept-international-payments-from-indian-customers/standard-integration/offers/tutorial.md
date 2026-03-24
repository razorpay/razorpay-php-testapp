---
title: Tutorial - How to Create Offers
description: Create Offers from the Razorpay Dashboard using an example.
---

# Tutorial - How to Create Offers

Let us create an offer from the Dashboard using an example. 

Assume that you are the manager of Tea Factory, a beverage company that sells packaged teabags using your website. You want to provide discounts on online purchases to attract customers and increase sales. 

You want to create a Diwali Offer with the following settings:

Offer Criteria | Offer Information
---
Offer Name | Diwali Dhamaka
---
Display Text | 10% discount on netbanking payments
---
Offer Type | Discount - Percentage 
---
Payment Method | Netbanking
---
Discount % | 10
--
Minimum Order Amount | ₹400
---
Maximum Discount Allowed | ₹500

Let us create this offer.

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
    ![Payment Link Test Offer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offer-dashboard-test.jpg.md)
3. Enter your contact details and click **Proceed**. The relevant offers appear upfront on checkout.
4. Select the offer you created from the Dashboard and click **Apply Offer**.
5. Select the payment option you created the offer on from the Dashboard. Enter the required [test details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payments/test-card-details.md) and click **PAY**. 
6. Select Success or Failure, depending on which flow you wish to test.
7. You should see a confirmation message depending on the flow you have selected.

On successful payment, you should have received a discount on your payment. You can verify this by navigating to the Transactions → Payments tab and viewing the payment details.

![Verifying transaction](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/offer-details.jpg.md)

## Integrate Offer with Standard Checkout

Now that an Offer is created, you should integrate Offers in Checkout for customers to avail the discounts and make payments.

Know how to integrate Offers in [Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/standard-integration.md).

### Related Information

- [About Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers.md)
- [Offers FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/faqs.md)
