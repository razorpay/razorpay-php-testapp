---
title: Sample Codes
description: Sample codes to help you integrate the payment methods of your choice on Razorpay Checkout.
---

# Sample Codes

If you want to list all the payment methods offered by `Axis` bank, allow card payments for `ICICI` bank only and hide `upi` payment method from the Checkout, you can do so as follows:

  
    
  
  
    
  

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

## Show OlaMoney

Use the code given below to show OlaMoney on Checkout:

```js: Ola Money
config: {
    display: {
      blocks: {
        banks: {
          name: 'Methods With Offers',
          instruments: [
            {
              method: 'wallet',
              wallets: ['olamoney']
            }]
        },
      },
      sequence: ['block.banks'],
      preferences: {
        show_default_blocks: true,
      },
    },
  },
};
```

  
    
  
  
    
  

## Show Most Used Methods

Use the code given below to show the most used methods:

```js: Most Used Methods
config: {
    display: {
      blocks: {
        banks: {
          name: 'Most Used Methods',
          instruments: [
            {
              method: 'wallet',
              wallets: ['payzapp']
            },
            {
                method: 'upi'
            },
            ],
        },
      },
      sequence: ['block.banks'],
      preferences: {
        show_default_blocks: true,
      },
    },
  },
};
```

  
    
  
  
    
  

## Show Instruments of a Certain Bank Only

Use the code given below to show the instruments of a certain bank only on Checkout:

```js: Instruments of Axis Bank Only
config: {
    display: {
      blocks: {
        banks: {
          name: 'Pay Using Axis Bank',
          instruments: [
            {
              method: 'netbanking',
              banks: ['UTIB'],
            },
            {
              method: 'card',
              issuers: ['UTIB'],
            }
          ],
        },
      },
      sequence: ['block.banks'],
      preferences: {
        show_default_blocks: false,
      },
    },
  },
};
```

> **WARN**
>
> 
> **Watch Out!**
> 
> This configuration is not applicable for [Recurring Payments](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments.md).
> 

  
    
  
  
    
  

## Highlight Instruments of a Certain Bank

Use the code given below to highlight the instruments of a certain bank only on Checkout:

```js: Highlight Instruments of Axis Bank
config: {
    display: {
      blocks: {
        banks: {
          name: 'Pay Using Axis Bank',
          instruments: [
            {
              method: 'netbanking',
              banks: ['UTIB'],
            },
            {
              method: 'card',
              issuers: ['UTIB'],
            }
          ],
        },
      },
      sequence: ['block.banks'],
      preferences: {
        show_default_blocks: true,
      },
    },
  },
};
```

  
    
  
  
    
  

## Reorder Payment Methods

Use the code given below to reorder payment methods on Checkout:

```js: Reorder Payment Methods
config: {
    display: {
      blocks: {
        banks: {
          name: 'All Payment Options',
          instruments: [
            {
              method: 'upi'
            },
            {
              method: 'card'
            },
            {
                method: 'wallet'
            },
            {
                method: 'netbanking'
            }
          ],
        },
      },
      sequence: ['block.banks'],
      preferences: {
        show_default_blocks: false,
      },
    },
  },
};
```

## Remove a Method from Checkout

Use the code given below to remove a method from Checkout:

```js: EMI Removed from Checkout
config: {
    display: {
      hide: [
        {
          method: 'emi'
        }
      ],
      preferences: {
        show_default_blocks: true,
      },
    },
  },
};
```

  
    
  
  
    
  

## Show Only a Certain Payment Method on Checkout

Use the code given below to show only a certain payment method on Checkout:

### Card

```js: Land on Card
config: {
  display: {
    blocks: {
      cards_only: {
        name: "Pay via Card",
        instruments: [
          {
            method: "card",
          },
        ],
      },
    },
    sequence: ["block.cards_only"],
    preferences: {
      show_default_blocks: false,
      },
    },
  },
};
```

### UPI

```js: Land on UPI
config: {
    display: {
      blocks: {
        banks: {
          name: 'Pay via UPI',
          instruments: [
            {
              method: 'upi'
            }
          ],
        },
      },
      sequence: ['block.banks'],
      preferences: {
        show_default_blocks: false,
      },
    },
  },
};
```

### EMI

```js: Land on EMI
config: {
  display: {
    blocks: {
      banks: {
        name: "Pay Using HDFC Bank",
        instruments: [
          {
              method: "emi",
              issuers: ["HDFC"],
              types: ["debit"],
              iins: [438628]
          },
        ]
      },
    },
    sequence: ["block.banks"],
    preferences: {
      show_default_blocks: false 
    }
  }
}
```

### Related Information
- [Supported Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods/supported-methods.md)
- [Configurability of Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard/configure-payment-methods.md)
