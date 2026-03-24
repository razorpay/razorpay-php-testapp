---
title: CVV-less Flow for Card Payments
description: Save customer card details as tokens and enable CVV-less payment flows for customers via Razorpay.
---

# CVV-less Flow for Card Payments

CVV-less card payments are recently introduced for saved cards where the card-holder can complete a payment without the card CVV. CVV-less card payments are simple, fast and secure, and do not require a memory test of your customers.

## Recommended Checkout Experience

To provide your customers with a faster and more seamless payment experience, we recommend removing the CVV field from your checkout flow.
- Removing the CVV field encourages customers to use their saved (tokenised) cards, making payments more convenient and frictionless.
- Alternatively, you can also make CVV optional. You can choose to retain the CVV box and mark it as optional, with a clear message such as “CVV not required for tokenised cards”.

> **INFO**
>
> 
> 
> **Note**
> 
> If you are already integrated with Razorpay Standard Checkout, these UI changes are handled automatically and no additional action is required on your part.
> 

 

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Offering CVV-less saved card flows to your customers can increase the conversion rate by 4%.
> 

![CVV Less Card Payment Flow GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/cvv-less-otp-less.gif.md)

## Saved Card Payment without CVV

```java: Java

  Pay
  
       var razorpay = new Razorpay({
        key: "",
        image: "https://i.imgur.com/n5tjHFD.jpg",
        name: "Crime Master Gogo",
       });
       var data = {
        amount: 6666,
        currency: "INR",
        email: "gaurav.kumar@example.com",
        order_id: "order_ISsp1ekSCHgoAw",
        contact: 9123456780,
        notes: {
          address: "Ground Floor, SJR Cyber, Laskar Hosur Road, Bengaluru",
        },
        customer_id: "cust_1Aa00000000001",
        token: "token_4zwefDSCC829ma",
        method: "card",
        card[cvv]: '123'
       };

       document.getElementById("rzp-button1").onclick = function(){
        razorpay.createPayment(data);
        razorpay.on("payment.success", function(resp) {
          alert(resp.razorpay_payment_id)
          }); 
        razorpay.on("payment.error", function(resp){alert(resp.error.description)});
}

```

#### Request Parameters

`card` _optional_
: `string` The card’s CVV.

> **INFO**
>
> 
> **Handy Tips**
> 
> CVV-less payments on RuPay is an on-demand feature for standard checkout merchants. Reach out to our [support team](https://razorpay.com/support/#request) for more information.
> 

### Related information

- [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/cards/features/cvv-less-flow/#frequently-asked-questions-faqs.md)
