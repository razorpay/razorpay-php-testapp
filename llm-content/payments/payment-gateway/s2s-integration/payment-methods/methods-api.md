---
title: Methods API
description: Fetch payment methods configured for your account using Razorpay APIs.
---

# Methods API

You can configure payment methods of your choice for collecting payments from your customers.

## Fetch Payment Methods

Send the following request to fetch a list of payment methods enabled for your account:

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Provide only the API Key ID to send this request. Do not provide the API key secret.
> 

/methods

```curl: Request
curl -u [YOUR_KEY_ID] \
- X GET https://api.razorpay.com/v1/methods \
```json: Response
{
  "entity": "methods",
  "card": true,
  "debit_card": true,
  "credit_card": true,
  "prepaid_card": true,
  "card_networks": {
    "AMEX": 0,
    "DICL": 1,
    "MC": 1,
    "MAES": 1,
    "VISA": 1,
    "JCB": 1,
    "RUPAY": 1,
    "BAJAJ": 0
  },
  "card_subtype": {
    "consumer": 1,
    "business": 1
  },
  "amex": false,
  "netbanking": {
    "AUBL": "AU Small Finance Bank",
    "AIRP": "Airtel Payments Bank",
    "ANDB": "Andhra Bank",
    "UTIB": "Axis Bank",
    "BDBL": "Bandhan Bank",
    "BBKM": "Bank of Bahrein and Kuwait",
    "BARB_R": "Bank of Baroda - Retail Banking",
    "VIJB": "Bank of Baroda - Retail Banking (Erstwhile Vijaya Bank)",
    "BKID": "Bank of India",
    "MAHB": "Bank of Maharashtra",
    "BACB": "Bassein Catholic Co-operative Bank",
    "CNRB": "Canara Bank",
    "CSBK": "Catholic Syrian Bank",
    "CBIN": "Central Bank of India",
    "CIUB": "City Union Bank",
    "COSB": "Cosmos Co-operative Bank",
    "DCBL": "DCB Bank",
    "DEUT": "Deutsche Bank",
    "DBSS": "Development Bank of Singapore",
    "DLXB": "Dhanlaxmi Bank",
    "DLXB_C": "Dhanlaxmi Bank - Corporate Banking",
    "ESAF": "ESAF Small Finance Bank",
    "ESFB": "Equitas Small Finance Bank",
    "FDRL": "Federal Bank",
    "FSFB": "Fincare Small Finance Bank",
    "HSBC": "HSBC",
    "ICIC": "ICICI Bank",
    "IBKL": "IDBI",
    "IBKL_C": "IDBI - Corporate Banking",
    "IDFB": "IDFC FIRST Bank",
    "IDIB": "Indian Bank",
    "ALLA": "Indian Bank (Erstwhile Allahabad Bank)",
    "IOBA": "Indian Overseas Bank",
    "INDB": "Indusind Bank",
    "JAKA": "Jammu and Kashmir Bank",
    "JSFB": "Jana Small Finance Bank",
    "JSBP": "Janata Sahakari Bank (Pune)",
    "KCCB": "Kalupur Commercial Co-operative Bank",
    "KJSB": "Kalyan Janata Sahakari Bank",
    "KARB": "Karnataka Bank",
    "KVBL": "Karur Vysya Bank",
    "KKBK": "Kotak Mahindra Bank",
    "LAVB_C": "Lakshmi Vilas Bank - Corporate Banking",
    "LAVB_R": "Lakshmi Vilas Bank - Retail Banking",
    "MSNU": "Mehsana Urban Co-operative Bank",
    "NKGS": "NKGSB Co-operative Bank",
    "NSPB": "NSDL Payments Bank",
    "NESF": "North East Small Finance Bank",
    "ORBC": "PNB (Erstwhile-Oriental Bank of Commerce)",
    "UTBI": "PNB (Erstwhile-United Bank of India)",
    "PSIB": "Punjab & Sind Bank",
    "PUNB_R": "Punjab National Bank - Retail Banking",
    "RATN": "RBL Bank",
    "RATN_C": "RBL Bank - Corporate Banking",
    "ABNA": "Royal Bank of Scotland N.V.",
    "SRCB": "Saraswat Co-operative Bank",
    "SVCB_C": "Shamrao Vithal Bank - Corporate Banking",
    "SVCB": "Shamrao Vithal Co-operative Bank",
    "SIBL": "South Indian Bank",
    "SCBL": "Standard Chartered Bank",
    "SURY": "Suryoday Small Finance Bank",
    "SYNB": "Syndicate Bank",
    "TMBL": "Tamilnadu Mercantile Bank",
    "TNSC": "Tamilnadu State Apex Co-operative Bank",
    "TBSB": "Thane Bharat Sahakari Bank",
    "TJSB": "Thane Janata Sahakari Bank",
    "UCBA": "UCO Bank",
    "UBIN": "Union Bank of India",
    "CORP": "Union Bank of India (Erstwhile Corporation Bank)",
    "VARA": "Varachha Co-operative Bank",
    "YESB": "Yes Bank",
    "YESB_C": "Yes Bank - Corporate Banking",
    "ZCBL": "Zoroastrian Co-operative Bank"
  },
  "wallet": {
    "mobikwik": true,
    "payzapp": true,
    "olamoney": true,
    "airtelmoney": true,
    "jiomoney": true,
    "phonepe": true,
    "paypal": true
  },
  "emi": true,
  "upi": true,
  "cardless_emi": [],
  "paylater": {
    "epaylater": true,
    "getsimpl": true,
    "icic": true,
    "hdfc": true
  },
  "google_pay_cards": false,
  "app": {
    "cred": 0,
    "twid": 0
  },
  "gpay": false,
  "emi_types": {
    "credit": true,
    "debit": true
  },
  "debit_emi_providers": {
    "HDFC": 1
  },
  "nach": false,
  "cod": false,
  "emi_subvention": "customer",
  "emi_plans": {
    "KKBK": {
      "min_amount": 300000,
      "plans": {
        "3": 12,
        "6": 12,
        "9": 14,
        "12": 14,
        "18": 15,
        "24": 15
      }
    },
    "UTIB": {
      "min_amount": 300000,
      "plans": {
        "3": 13,
        "6": 13,
        "9": 14,
        "12": 14,
        "18": 15,
        "24": 15
      }
    },
    "INDB": {
      "min_amount": 200000,
      "plans": {
        "3": 13,
        "6": 13,
        "9": 13,
        "12": 12,
        "18": 12,
        "24": 12
      }
    },
    "RATN": {
      "min_amount": 100000,
      "plans": {
        "3": 13,
        "6": 14,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "HDFC": {
      "min_amount": 300000,
      "plans": {
        "3": 15,
        "6": 15,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "SCBL": {
      "min_amount": 250000,
      "plans": {
        "3": 13,
        "6": 13,
        "9": 14,
        "12": 14
      }
    },
    "BARB": {
      "min_amount": 250000,
      "plans": {
        "3": 13,
        "6": 13,
        "9": 13,
        "12": 13,
        "18": 15,
        "24": 15
      }
    },
    "ICIC": {
      "min_amount": 150000,
      "plans": {
        "3": 12.99,
        "6": 13.99,
        "9": 13.99,
        "12": 13.99,
        "18": 14.99,
        "24": 14.99
      }
    },
    "IDFB": {
      "min_amount": 250000,
      "plans": {
        "3": 14
        "6": 15,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15,
        "36": 15
      }
    },
    "YESB": {
      "min_amount": 150000,
      "plans": {
        "3": 14,
        "6": 14,
        "9": 14,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "CITI": {
      "min_amount": 250000,
      "plans": {
        "3": 13,
        "6": 13,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "AMEX": {
      "min_amount": 500000,
      "plans": {
        "3": 14,
        "6": 14,
        "9": 14,
        "12": 14,
        "18": 14,
        "24": 14
      }
    },
    "onecard": {
      "min_amount": 300000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "24": 16
      }
    },
    "FDRL": {
      "min_amount": 250000,
      "plans": {
          "3": 13,
          "6": 13,
          "9": 14,
          "12": 14,
          "18": 15,
          "24": 15
      }
    },
    "HDFC_DC": {
      "min_amount": 500000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16
      }
    }
  },
  "emi_options": {
    "KKBK": [
      {
        "duration": 3,
        "interest": 12,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "1.97"
      },
      {
        "duration": 6,
        "interest": 12,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "3.41"
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "5.59"
      },
      {
        "duration": 12,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "7.19"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "14.07"
      }
    ],
    "UTIB": [
      {
        "duration": 3,
        "interest": 12,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "1.97"
      },
      {
        "duration": 6,
        "interest": 12,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "3.41"
      },
      {
        "duration": 9,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "5.21"
      },
      {
        "duration": 12,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "6.70"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "14.07"
      },
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "2.13"
      },
      {
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "3.68"
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "5.59"
      },
      {
        "duration": 12,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "7.19"
      }
    ],
    "INDB": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "2.13"
      },
      {
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "3.68"
      },
      {
        "duration": 9,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "5.21"
      },
      {
        "duration": 12,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "6.70"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "14.07"
      },
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "2.13"
      },
      {
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "3.68"
      },
      {
        "duration": 9,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "5.21"
      },
      {
        "duration": 12,
        "interest": 12,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "6.21"
      },
      {
        "duration": 18,
        "interest": 12,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "8.90"
      },
      {
        "duration": 24,
        "interest": 12,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "11.49"
      }
    ],
    "RATN": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "2.13"
      },
      {
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "3.68"
      },
      {
        "duration": 9,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "5.21"
      },
      {
        "duration": 12,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "6.70"
      },
      {
        "duration": 18,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "9.59"
      },
      {
        "duration": 24,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "12.36"
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "3.96"
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "5.97"
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "7.67"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 100000,
        "merchant_payback": "14.07"
      }
    ],
    "HDFC": [
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "14.07"
      },
      {
        "duration": 3,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "2.45"
      },
      {
        "duration": 6,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "4.23"
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "5.97"
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "7.67"
      }
    ],
    "SCBL": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.13"
      },
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
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "3.68"
      },
      {
        "duration": 9,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "5.21"
      },
      {
        "duration": 12,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "6.70"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.07"
      }
    ],
    "ICIC": [
      {
        "duration": 3,
        "interest": 12.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "2.13"
      },
      {
        "duration": 6,
        "interest": 13.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "3.96"
      },
      {
        "duration": 9,
        "interest": 13.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "5.59"
      },
      {
        "duration": 12,
        "interest": 13.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "7.18"
      },
      {
        "duration": 24,
        "interest": 14.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "14.06"
      },
      {
        "duration": 18,
        "interest": 14.99,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "10.94"
      }
    ],
    "IDFB": [
      {
        "duration": 3,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.34"
      },
      {
        "duration": 6,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "4.42"
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "6.35"
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "8.31"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "12.29"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "16.37"
      }
      {
        "duration": 36,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "24.80"
      },
    ],
    "YESB": [
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "14.07"
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "5.59"
      },
      {
        "duration": 3,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "2.29"
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "3.96"
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "7.67"
      }
    ],
    "CITI": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.13"
      },
      {
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "3.68"
      },
      {
        "duration": 9,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "5.97"
      },
      {
        "duration": 12,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "7.67"
      },
      {
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "10.95"
      },
      {
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.07"
      }
    ],
    "AMEX": [
      {
        "duration": 3,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "2.29"
      },
      {
        "duration": 6,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "3.96"
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "5.59"
      },
      {
        "duration": 12,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "7.19"
      },
      {
        "duration": 18,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "10.27"
      },
      {
        "duration": 24,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "13.22"
      }
    ],
    "onecard": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "2.61"
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "4.51"
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "6.35"
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "8.15"
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "11.62"
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 300000,
        "merchant_payback": "14.90"
      }
    ],
    "FDRL": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.13"
      },
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
        "duration": 18,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "10.95"
      },
      { 
        "duration": 24,
        "interest": 15,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.07"
      }
    ],
    "HDFC_DC": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "2.61"
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "4.51"
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "6.35"
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "8.15"
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 500000,
        "merchant_payback": "11.62"
      }
    ]
  },
  "recurring": {
    "card": {
      "credit": [
        "MasterCard",
        "Visa"
      ]
    },
    "upi": true,
    "nach": false
  },
  "upi_intent": true
}
```

### Next Steps

You can start creating payment requests using the [sample payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/payment-methods.md) for the payment methods of your choice.

To get additional payment methods enabled for your account, contact our [Support team](https://razorpay.com/support/#request).
