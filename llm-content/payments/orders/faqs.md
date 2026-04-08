---
title: Orders | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to some Frequently Asked Questions (FAQs) about Razorpay Orders.
---

# Frequently Asked Questions (FAQs)

### 1. What happens if an order is in the attempted state with an authorised payment id?

        If an order is in the attempted state with the associated payment id in the authorised state, initiating another payment using the same order id is not allowed.
        

    
### 2. Can an order be attempted more than once?

        No further payment requests are allowed once an order is in the paid state. Even if the payment associated with the order is refunded, the order remains in the paid state.
        

    
### 3. Can I view order details on the Dashboard?

        Yes, you can [view the order details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders/dashboard.md#view-order-details-from-dashboard) from the Dashboard.
        

    
### 4. What are the different states of an order? 

        An order can be in one of three states: Created, Attempted, or Paid. Know more about the [different states of an order](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/orders.md#order-states).
