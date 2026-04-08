---
title: Sample Codes - Configurability of Payment Methods
description: Sample codes to help you integrate the payment methods of your choice on Razorpay Checkout.
---

# Sample Codes - Configurability of Payment Methods

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

  
    ![](/docs/assets/images/payment-methods-customise-olamoney-mweb.jpg)
  
  
    ![](/docs/assets/images/payment-methods-customise-olamoney-dweb.jpg)
  

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

  
    ![](/docs/assets/images/payment-methods-customise-sample-code-show-most-used.jpg)
  
  
    ![](/docs/assets/images/payment-methods-customize-sample-code-show-most-used-dweb.jpg)
  

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

  
    ![](/docs/assets/images/payment-methods-customise-instruments-certain-bank.jpg)
  
  
    ![](/docs/assets/images/payment-methods-customize-instruments-certain-bank-dweb.jpg)
  

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

  
    ![](/docs/assets/images/payment-methods-customise-certain-bank.jpg)
  
  
    ![](/docs/assets/images/payment-methods-customize-certain-bank-dweb.jpg)
  

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

![reorder payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/payment-methods-reorder-customise.jpg.md)

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

  
    ![](/docs/assets/images/payment-methods-customise-hide-payment-method.jpg)
  
  
    ![](/docs/assets/images/payment-methods-customize-hide-payment-method-dweb.jpg)
  

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

![](/docs/assets/images/payment-methods-customise-sample-code-land-on-card.jpg)

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

![](/docs/assets/images/payment-methods-customise-sample-code-land-on-upi.jpg)

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
![](/docs/assets/images/payment-methods-customise-sample-code-land-on-emi.jpg)
