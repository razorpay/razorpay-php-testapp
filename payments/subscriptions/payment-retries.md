---
title: Payment Retries
description: Handle payment retries when an auto-charge fails for Razorpay Subscriptions. Check different failure scenarios and handle them using webhooks.
---

# Payment Retries

Recurring payments for a Subscription are auto-debited based on the scheduled day that you defined. However, these payments could fail. 

## Reasons for Payment Failures

- The card has expired.
- The bank has blocked the card.
- The customer's account has insufficient balance.
- The customer has cancelled the mandate from their end.

## What Happens in Case of a Payment Failure

Here is the Subscription flow if a payment fails:

1. The Subscription will move to the `pending` state. 
2. You are notified about it via our webhooks. We automatically retry the payment on the following day.
      - We automatically charge the last invoice if the customer changes the card when the Subscription is in the `pending` state. 
      - If this charge is successful, the Subscription moves to the `active` state. 
3. If the payment fails after all retries, the Subscription will move to the `halted` state.
     - If the customer successfully changes the card details when a Subscription is in the `halted` state, it moves to the `active` state. Invoices for such Subscriptions are still created. However, we will not charge these invoices. You will have to charge them manually.

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> This process will not affect the charge cycle for the subsequent months.
> 

### Notifications

- If you have enabled the `subscription.pending` and `subscription.halted` webhook, you receive notifications every time a Subscription moves to one of the above-mentioned states. You can then decide to hold off the delivery of the service as per your business model.
- We also send an email to the customer notifying them about the payment failure. This email contains a link that the customer can use to change the card details associated with the Subscription.

## Retry Model
Following is the retry model for Emandate, UPI and Cards:

  
   In failure scenarios, we attempt to retry only when we get the confirmation or rejection of the last payment, as it may take more than 24 hours.

   Below is the retry model:

   1. If the charge day (T) is a bank holiday, we will charge on T-1 days
   1. If the charge day (T) and the previous day (T-1) are bank holidays, we will charge on T-3 days.

    The customer can switch to a different payment method to continue with the payment process.
  
  
   For UPI payments, below is the retry model: 

   1. Let T=0 be the charge day. On this day, we attempt the charge.
   1. If the charge fails, the subscription moves to the `pending` state, and we automatically reattempt the charge on T+1 day.
   1. If the charge fails again, we automatically reattempt the charge two more times on T+2 and T+3 days, respectively.
   1. If the charge still fails, the subscription moves to the `halted` state.

   The customer can switch to a different payment method to continue with the payment process.
  
  
    In failure scenarios, we automatically retry the payment the next day without your interference.
    In a T+3 days cycle, we will retry the payment thrice. That is, once every day for 3 days, excluding the date of the charge. If the payment fails on all retires, the Subscription moves to the `halted` state.

    Below is the retry model:

    1. Let T=0 be the charge day.
    1. On T=0, we attempt to charge the card.
    1. If the charge fails, the Subscription moves to the `pending` state, and we automatically reattempt the charge on T+1 day.
    1. If the charge fails again, we automatically reattempt the charge two more times on T+2 and T+3 days, respectively.
    1. If the charge still fails, the Subscription moves to the `halted` state.

    The customer can switch to a different payment method to continue with the payment process.
  

## Handle Failed Charge (Cards)

There are two ways to handle a failed charge:
- [Manually attempt to charge the same card](#manual-charge-on-same-card)
- [Change the card details associated with the Subscription](#change-card-linked-to-subscription)

### Manual Charge on Same Card

When an auto-charge fails, you can manually attempt to charge the invoice as long as the invoice is in the `issued` state.

> **WARN**
>
> 
> **Watch Out!**
> 
> Manual charging of a domestic card is not supported.
> 

**Example** 

The customer's account might have an insufficient balance when you attempt to auto-charge. When they receive the payment failure email, they add money to their account and inform you about this. You can [attempt a manual charge on the invoice using the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/manually-charge-card.md).

- If you have enabled the `subscription.pending` and `subscription.halted` webhook, you receive notifications every time a Subscription moves to one of the above-mentioned states. You can then decide to hold off the delivery of the service as per your business model.
- We also send an email to the customer notifying them about the payment failure. This email contains a link that the customer can use to change the card details associated with the Subscription.

### Change Card Linked to Subscription

1. When an auto-charge fails, we send the customer an email about the payment failure. This email has a link that the customer can use to change the card linked to the Subscription.
2. You can ask the customer to change the card linked to the Subscription.

  
### Change Card Using Checkout

     You can ask the customer to change the card details associated with the Subscription on your checkout using our APIs. Use the `subscription_card_change` parameter to control this feature:

      - 1 : Allow the customer to change the card details from your checkout
      - 0 : Do not allow the customer to change the card details from your checkout

      
      ```html: Checkout with handler function
      Pay
      
      
        var options = {
          "key": "key_id",
          "subscription_id": "sub_00000000000001",
          "name": "Acme Corp.",
          "description": "Monthly Test Plan",
          "image": "/your_logo.jpg",
          "subscription_card_change": true,
          "handler": function(response) {
            alert(response.razorpay_payment_id),
            alert(response.razorpay_subscription_id),
            alert(response.razorpay_signature);
          },
          "prefill": {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "+919876543210"
          },
          "notes": {
            "note_key_1": "Tea. Earl Grey. Hot",
            "note_key_2": "Make it so."
          },
          "theme": {
            "color": "#F37254"
          }
        };
      var rzp1 = new Razorpay(options);
      document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
      }
      
      ```html: Manual checkout with callback URL
      Pay
      
      
        var options = {
          "key": "key_id",
          "subscription_id": "sub_00000000000001",
          "name": "Acme Corp.",
          "description": "Monthly Test Plan",
          "image": "/your_logo.jpg",
          "subscription_card_change": true,
          "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
          "prefill": {
            "name": "Gaurav Kumar",
            "email": "gaurav.kumar@example.com",
            "contact": "+919876543210"
          },
          "notes": {
            "note_key_1": "Tea. Earl Grey. Hot",
            "note_key_2": "Make it so."
          },
          "theme": {
            "color": "#F37254"
          }
        };
      var rzp1 = new Razorpay(options);
      document.getElementById('rzp-button1').onclick = function(e) {
        rzp1.open();
        e.preventDefault();
      }
      
      ```
      

      
> **INFO**
>
> 
> 
>       **Handler Function vs Callback URL**
> 
>       
>       Handler Function| Callback URL
>       ---
>       When you use the handler function, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the checkout form. You need to collect these and send them to your server. | When you use a Callback URL, the response object of the successful payment (`razorpay_payment_id`, `razorpay_order_id` and `razorpay_signature`) is submitted to the callback URL.
>       
>       

    

  
### Update Payment Method on Our Hosted Page

     You can use our ready-made hosted page solution to handle payment failures when you attempt an auto-charge. Here is how the hosted page handles payment failure:

      
      - The customer is notified via email about the payment failure.

      - The payment failure email contains a link that allows the customer to take further action on the failed payment.

      - Customers can either retry the payment on the same card or update the card details or change the payment method to UPI or Emandate (bank accounts) using the link. These actions are handled seamlessly by the hosted page.

      

      The following table lists the supported payment method change.

      

      Current Payment Method | Change to Card | Change to UPI | Change to Emandate
      ---
      Card | Yes | Yes | Yes
      ---
      UPI | Yes | No | No
      ---
      Emandate | Yes | No | No
      

      - A sample hosted page is shown below:

         

      - After the customer clicks the **Update Payment Method** button, the checkout page appears as shown. The customer can choose a card (of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md)), UPI or Emandate (of [supported banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/supported-banks-apps.md#emandate)) to make the payment. If the payment is successful, the Subscription moves back to the `actived` state.

          

      - Use the Dashboard status filter to search for `halted` and `pending` Subscriptions. You can send the Subscription link to the respective customers to clear dues and make those Subscriptions active.

         
    

      The following table lists the supported payment method change.

      

      Current Payment Method | Change to Card | Change to Wallet (Touch'n Go)
      ---
      Card | Yes | Yes
      ---
      Wallet (Touch'n Go) | Yes | Yes

      

      Use the Dashboard status filter to search for `halted` and `pending` Subscriptions. You can send the Subscription link to the respective customers to clear dues and make those Subscriptions active.

      
    
  

### Related Information

- [Subscription Workflow](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/workflow.md)
- [Subscription States](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/states.md)
- [Create Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/create.md)
- [Test Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/test.md)
- [Subscriptions APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions/apis.md)
