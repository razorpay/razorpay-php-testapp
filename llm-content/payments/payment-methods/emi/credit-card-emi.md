---
title: About Credit Card EMI
description: Let your customers avail Credit Card EMIs at Razorpay Standard Checkout.
---

# About Credit Card EMI

Razorpay Checkout supports EMIs on credit cards issued by major banks. EMI is available by default on Razorpay Standard Checkout. No additional integration is needed. 

> **WARN**
>
> 
> **Watch Out!**
> 
> Instant Refunds are not supported on EMI, Cardless EMI and Pay Later.
> 

## Supported Payment Partners

Following is the list of supported Payment Partners for Credit Card EMI and the minimum order amount stipulated by them:

  
    
    Bank Code | Issuer Bank | Availability | Minimum Amount (in INR)
    ---
    AMEX | American Express | [Request Activation](https://dashboard.razorpay.com/app/payment-methods/emi) | 5000
    ---
    BARB | Bank of Baroda | Enabled on first card transaction | 2500
    ---
    CITI | Citibank | Enabled on first card transaction | 2500
    ---
    FDRL | Federal Bank | Enabled on first card transaction | 2500
    ---
    HDFC | HDFC Bank | [Request Activation](https://dashboard.razorpay.com/app/payment-methods/emi) | 1000
    ---
    HSBC | HSBC Bank | Enabled on first card transaction | 2000
    ---
    ICIC | ICICI Bank | Enabled on first card transaction | 1500
    ---
    IDFB | IDFC Bank | Enabled on first card transaction | 2500
    ---
    INDB | IndusInd Bank | Enabled on first card transaction | 2000
    ---
    KKBK | Kotak Mahindra Bank | Enabled on first card transaction | 2500
    ---
    RATN | RBL Bank | Enabled on first card transaction | 1500
    ---
    SBIN | State Bank of India | [Request Activation](https://dashboard.razorpay.com/app/payment-methods/emi) | 2500
    ---
    SCBL | Standard Chartered | Enabled on first card transaction | 2500
    ---
    UTIB | Axis Bank | Enabled on first card transaction | 3000
    ---
    YESB | Yes Bank | Enabled on first card transaction | 1500
    
  
  
    
    Code | Card Network Name | Availability | Minimum Amount (in INR)
    ---
    Onecard  | OneCard | Enabled on first card transaction | 2500 
    
  

  
   For HDFC Bank and State Bank of India (SBI), please raise a request [here](https://dashboard.razorpay.com/app/payment-methods/emi) to enable them (not enabled by default).
  

  
   Check the standard [credit card interest rates charged by major banks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/faqs.md#1-what-are-the-standard-credit-card-interest).
   

### Fetch EMI Plans

Use the below endpoint to fetch a list of EMI plans offered by banks:

/methods

> **INFO**
>
> 
> **[YOUR_KEY_ID] Required**
> 
> To fire this API, you must provide your [KEY_ID] for authorization. Your [KEY_SECRET] is not required and should not be passed. Know how to generate the [API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).
> 

```curl: Request
curl -u [YOUR_KEY_ID] \
-X GET https://api.razorpay.com/v1/methods

```json: Response
{
  "entity": "methods",
  ...
  ...
  "emi_plans": {
    "SCBL": {
      "min_amount": 250000,
      "plans": {
        "6": 13,
        "9": 14,
        "12": 14,
        "3": 11.880000000000001
      }
    },
    "BARB": {
      "min_amount": 250000,
      "plans": {
        "3": 13,
        "18": 15,
        "6": 14,
        "9": 14,
        "12": 15,
        "24": 16
      }
    },
    "AMEX": {
      "min_amount": 500000,
      "plans": {
        "3": 14,
        "6": 14,
        "9": 14,
        "12": 14,
        "18": 15,
        "24": 15
      }
    },
    "onecard": {
      "min_amount": 250000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "24": 16
      }
    },
    "INDB": {
      "min_amount": 200000,
      "plans": {
        "18": 15,
        "24": 15,
        "3": 14,
        "6": 14,
        "9": 15,
        "12": 15
      }
    },
    "HDFC": {
      "min_amount": 100000,
      "plans": {
        "3": 16,
        "18": 16,
        "24": 16,
        "6": 16,
        "9": 16,
        "12": 16
      }
    },
    "KKBK": {
      "min_amount": 250000,
      "plans": {
        "18": 16,
        "24": 16,
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16
      }
    },
    "RATN": {
      "min_amount": 150000,
      "plans": {
        "3": 13,
        "6": 14,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "ICIC": {
      "min_amount": 150000,
      "plans": {
        "3": 15.99,
        "6": 15.99,
        "9": 15.99,
        "12": 15.99,
        "18": 15.99,
        "24": 15.99
      }
    },
    "YESB": {
      "min_amount": 150000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "24": 16
      }
    },
    "CITI": {
      "min_amount": 250000,
      "plans": {
        "3": 14,
        "6": 14,
        "9": 16,
        "18": 16,
        "24": 16,
        "12": 16
      }
    },
    "UTIB": {
      "min_amount": 300000,
      "plans": {
        "18": 16,
        "24": 16,
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16
      }
    },
    "IDFB": {
      "min_amount": 2500,
      "plans": {
        "3": 14,
        "6": 15,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "FDRL": {
      "min_amount": 250000,
      "plans": {
        "3": 15.99,
        "6": 15.99,
        "9": 15.99,
        "12": 15.99,
        "18": 15.99,
        "24": 15.99
      }
    },
    "HSBC": {
      "min_amount": 200000,
      "plans": {
        "3": 15,
        "6": 15,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "HDFC_DC": {
      "min_amount": 300000,
      "plans": {
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "3": 16
      }
    },
    "INDB_DC": {
      "min_amount": 500000,
      "plans": {
        "3": 17,
        "6": 17,
        "9": 17,
        "12": 17,
        "18": 17,
        "24": 17
      }
    }
  },
  "emi_options": {
    "SCBL": [
      {
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "3.68"
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "5.59"
      },
      {
        "duration": 12,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "7.19"
      },
      {
        "duration": 3,
        "interest": 11.880000000000001,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "1.95"
      }
    ],
    "BARB": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.13"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "3.96"
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "5.59"
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "7.67"
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.90"
      }
    ],
    "AMEX": [
      {
        "duration": 3,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "2.29",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "3.96",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "5.59",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 12,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "7.19",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "10.95",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "14.07",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ],
    "onecard": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.61"
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "4.51"
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "6.35"
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "8.15"
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "11.62"
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.90"
      }
    ],
    "INDB": [
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "10.95",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "14.07",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 3,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "2.29",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "3.96",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "5.97",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "7.67",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      }
    ],
    "HDFC": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "4.51",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ],
    "KKBK": [
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "4.51",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ],
    "RATN": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "2.13",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "3.96",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "5.97",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "7.67",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "10.95",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "14.07",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ],
    "ICIC": [
      {
        "duration": 3,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 6,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "4.50",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 9,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 12,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 18,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "11.61",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 24,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "14.89",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ],
    "YESB": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "4.51",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      }
    ],
    "CITI": [
      {
        "duration": 3,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.29",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "3.96",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      }
    ],
    "UTIB": [
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "4.51",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "combination",
          "percentage": 1,
          "amount": 10000
        }
      }
    ],
    "IDFB": [
      {
        "duration": 3,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 2500,
        "merchant_payback": "2.29"
      },
      {
        "duration": 6,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 2500,
        "merchant_payback": "4.23"
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 2500,
        "merchant_payback": "5.97"
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 2500,
        "merchant_payback": "7.67"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 2500,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 2500,
        "merchant_payback": "14.07"
      }
    ],
    "FDRL": [
      {
        "duration": 3,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.61"
      },
      {
        "duration": 6,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "4.50"
      },
      {
        "duration": 9,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "6.35"
      },
      {
        "duration": 12,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "8.15"
      },
      {
        "duration": 18,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "11.61"
      },
      {
        "duration": 24,
        "interest": 15.99,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.89"
      }
    ],
    "HSBC": [
      {
        "duration": 3,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "2.45",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 9900
        }
      },
      {
        "duration": 6,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "4.23",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 9900
        }
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "5.97",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 9900
        }
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "7.67",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 9900
        }
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "10.95",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 9900
        }
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "14.07",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 9900
        }
      }
    ],
    "HDFC_DC": [
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "4.51",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ],
    "INDB_DC": [
      {
        "duration": 3,
        "interest": 17,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "2.77",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 6,
        "interest": 17,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "4.78",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 9,
        "interest": 17,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "6.73",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 12,
        "interest": 17,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "8.63",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 18,
        "interest": 17,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "12.28",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      },
      {
        "duration": 24,
        "interest": 17,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "15.73",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ]
  },
  ...
}
```

## Payment Flow on Standard Checkout

Customers select the products on your website or app and proceed to Checkout. On the Checkout page, the customers:

1. Enter the **Phone Number** and click **Continue**.
2. Select **EMI** as the payment method.
    
    ![Select emi payment option on checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emi-options-card.jpg.md)
    
3. Select **Credit Card**.
    
    ![Select credit card payment option on checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emi-credit-card.jpg.md)
    
4. Choose a bank from the list and select the EMI tenure. Click **Continue**.
    
    ![EMI tenure and click Select Plan](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/emi-credit-tenure1.jpg.md)
    
5. Enter the relevant details. The eligibility depends on the customer's card's BIN (first 6 digits). If the card is not eligible, the customers can pay the full amount.
6. Choose if they want to **Save this card as per RBI guidelines** or pay without saving the card.

After the successful payment, Razorpay redirects customers to your application or website. Customers' monthly statements will reflect the EMI amount with interest charged by the bank.

When the customers complete the payment on the Checkout, the entire transaction amount is authorized by the customer's issuing bank and converted into EMIs within 3-4 days, depending on the payment terms agreed with the credit card provider.

## FAQs

[Credit Card EMI FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/faqs.md#credit-card-emi).
