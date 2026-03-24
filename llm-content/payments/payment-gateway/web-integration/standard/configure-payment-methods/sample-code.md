---
title: Sample Codes
description: Sample codes to help you integrate the payment methods of your choice on Razorpay Checkout.
---

# Sample Codes

If you want to list all the payment methods offered by `Axis` bank, allow card payments for `ICICI` bank only and hide `upi` payment method from the Checkout, you can do so as follows:

  
    ![payment gateway customised checkout on mobile](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-methods-customise-checkout-mweb.jpg.md)
  
  
    ![payment gateway customised checkout on desktop](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-methods-customised-checkout.gif.md)
  

```html: Checkout Code

** Own Checkout

  var options = {
    "key": "[YOUR_KEY_ID]", // Enter the Key ID generated from the Dashboard
    "amount": "1000",
    "currency": "",
    "description": "Acme Corp",
    "image": "example.com/image/rzp.jpg",
    "prefill":
    {
      "email": "",
      "contact": ,
    },
    config: {
      display: {
        blocks: {
          utib: { //name for Axis block
            name: "Pay Using Axis Bank",
            instruments: [
              {
                method: "card",
                issuers: ["UTIB"]
              },
              {
                method: "netbanking",
                banks: ["UTIB"]
              },
            ]
          },
          other: { //  name for other block
            name: "Other Payment Methods",
            instruments: [
              {
                method: "card",
                issuers: ["ICIC"]
              },
              {
                method: 'netbanking',
              }
            ]
          }
        },
        hide: [
          {
          method: "upi"
          }
        ],
        sequence: ["block.utib", "block.other"],
        preferences: {
          show_default_blocks: false // Should Checkout show its default blocks?
        }
      }
    },
    "handler": function (response) {
      alert(response.razorpay_payment_id);
    },
    "modal": {
      "ondismiss": function () {
        if (confirm("Are you sure, you want to close the form?")) {
          txt = "You pressed OK!";
          console.log("Checkout form closed by the user");
        } else {
          txt = "You pressed Cancel!";
          console.log("Complete the Payment")
        }
      }
    }
  };
  var rzp1 = new Razorpay(options);
  document.getElementById('rzp-button1').onclick = function (e) {
    rzp1.open();
    e.preventDefault();
  }

```

> **WARN**
>
> 
> 
> **Watch Out!**
> 
> You can use the payment methods enabled for your account on the Dashboard. Also, you can raise a request with our [Support Team](https://razorpay.com/support/)    for additional payment methods or providers.
> 

@include payment-methods/upi-collect-deprecated/standard

@include payment-methods/configurability/sample-code

### Related Information
- [Supported Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md)
- [Configurability of Payment Methods](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md)
