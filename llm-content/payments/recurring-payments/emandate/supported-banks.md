---
title: Supported Banks
description: Use the Methods API to fetch the list of banks that support recurring payments via Emandate (Netbanking, Debit Card, Aadhaar).
---

# Supported Banks

Use the **Methods API** endpoint to fetch the list of banks that support Emandate payments using Netbanking, Aadhaar (eSign authentication) and Debit card authorisation types.

/methods

> **INFO**
>
> 
> **[YOUR_KEY_ID] Required**
> 
> To fire this API, you need to provide your [KEY_ID] for authorisation. Your [KEY_SECRET] is not required and should not be passed.
> 

```curl: Request
curl -u [YOUR_KEY_ID] \
-X GET https://api.razorpay.com/v1/methods
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
    "BAJAJ": 0,
    "UNP": 0
  },
  "card_subtype": {
    "consumer": 1,
    "business": 1,
    "premium": 0
  },
  "amex": false,
  "netbanking": {
    "AUBL": "AU Small Finance Bank",
    "AIRP": "Airtel Payments Bank",
    "BARB_R": "Bank of Baroda - Retail Banking",
    "VIJB": "Bank of Baroda - Retail Banking (Erstwhile Vijaya Bank)",
    "MAHB": "Bank of Maharashtra",
    "CNRB": "Canara Bank",
    "CSBK": "Catholic Syrian Bank",
    "CBIN": "Central Bank of India",
    "DCBL": "DCB Bank",
    "DEUT": "Deutsche Bank",
    "DLXB": "Dhanlaxmi Bank",
    "ESFB": "Equitas Small Finance Bank",
    "FSFB": "Fincare Small Finance Bank",
    "IBKL": "IDBI",
    "IDFB": "IDFC FIRST Bank",
    "IDIB": "Indian Bank",
    "ALLA": "Indian Bank (Erstwhile Allahabad Bank)",
    "IOBA": "Indian Overseas Bank",
    "INDB": "Indusind Bank",
    "JAKA": "Jammu and Kashmir Bank",
    "JSFB": "Jana Small Finance Bank",
    "KARB": "Karnataka Bank",
    "KVBL": "Karur Vysya Bank",
    "LAVB_R": "Lakshmi Vilas Bank - Retail Banking",
    "NSPB": "NSDL Payments Bank",
    "ORBC": "PNB (Erstwhile-Oriental Bank of Commerce)",
    "UTBI": "PNB (Erstwhile-United Bank of India)",
    "PSIB": "Punjab & Sind Bank",
    "PUNB_R": "Punjab National Bank - Retail Banking",
    "RATN": "RBL Bank",
    "SVCB": "SVC Co-Operative Bank Ltd.",
    "SRCB": "Saraswat Co-operative Bank",
    "SIBL": "South Indian Bank",
    "TMBL": "Tamilnad Mercantile Bank",
    "UCBA": "UCO Bank",
    "UJVN": "Ujjivan Small Finance Bank",
    "UBIN": "Union Bank of India",
    "CORP": "Union Bank of India (Erstwhile Corporation Bank)",
    "YESB": "Yes Bank"
  },
  "wallet": {
    "mobikwik": true,
    "payzapp": true,
    "olamoney": true,
    "airtelmoney": true,
    "jiomoney": true
  },
  "emi": true,
  "upi": true,
  "cardless_emi": {
    "earlysalary": true
  },
  "paylater": [],
  "google_pay_cards": false,
  "app": {
    "cred": 0,
    "twid": 0,
    "trustly": 0,
    "poli": 0,
    "sofort": 0,
    "giropay": 0
  },
  "gpay": false,
  "emi_types": {
    "credit": true,
    "debit": true,
    "offline_credit": false,
    "offline_debit": false
  },
  "debit_emi_providers": {
    "HDFC": 1,
    "KKBK": 0,
    "INDB": 0,
    "ICIC": 0
  },
  "intl_bank_transfer": [],
  "fpx": [],
  "duitnow_pay": false,
  "gift_cards": false,
  "instalment": {
    "vis": 0
  },
  "nach": true,
  "offline_debit_emi_providers": {
    "HDFC": 0,
    "ICIC": 0,
    "KKBK": 0
  },
  "offline_credit_emi_providers": {
    "AMEX": 0,
    "AUBL": 0,
    "BARB": 0,
    "CITI": 0,
    "CNRB": 0,
    "FDRL": 0,
    "HDFC": 0,
    "HSBC": 0,
    "ICIC": 0,
    "IDFB": 0,
    "INDB": 0,
    "JAKA": 0,
    "KKBK": 0,
    "PUNB": 0,
    "RATN": 0,
    "SBIN": 0,
    "SCBL": 0,
    "UTIB": 0,
    "YESB": 0,
    "ONECARD": 0
  },
  "cod": false,
  "offline": false,
  "sodexo": false,
  "emi_subvention": "customer",
  "emi_plans": {
    "SCBL": {
      "min_amount": 250000,
      "plans": {
        "3": 11.88,
        "6": 13,
        "9": 14,
        "12": 14
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
    "BARB": {
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
    "HDFC": {
      "min_amount": 100000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "24": 16
      }
    },
    "KKBK": {
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
    "UTIB": {
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
    "IDFB": {
      "min_amount": 250000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "24": 16,
        "36": 16
      }
    },
    "INDB": {
      "min_amount": 200000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "24": 16,
        "36": 16
      }
    },
    "RATN": {
      "min_amount": 200000,
      "plans": {
        "3": 13,
        "6": 14,
        "9": 15,
        "12": 15,
        "18": 15,
        "24": 15
      }
    },
    "AUBL": {
      "min_amount": 200000,
      "plans": {
        "3": 16,
        "6": 16,
        "9": 16,
        "12": 16,
        "18": 16,
        "24": 16
      }
    },
    "HDFC_DC": {
      "min_amount": 300000,
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
    "SCBL": [
      {
        "duration": 6,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "3.68",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 9,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "5.59",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 12,
        "interest": 14,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "7.19",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
      },
      {
        "duration": 3,
        "interest": 11.88,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "1.95",
        "processing_fee_plan": {
          "type": "percentage",
          "percentage": 1
        }
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
    "BARB": [
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "14.90"
      },
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 24900
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
          "amount": 24900
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
          "amount": 24900
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
          "amount": 24900
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
          "amount": 24900
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
          "amount": 24900
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
          "type": "fixed",
          "amount": 29900
        }
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "4.51",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 29900
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 29900
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 29900
        }
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 29900
        }
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 150000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 29900
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
    "IDFB": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
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
          "amount": 24900
        }
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
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
          "amount": 24900
        }
      },
      {
        "duration": 36,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 250000,
        "merchant_payback": "20.99",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
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
          "amount": 24900
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
          "amount": 24900
        }
      }
    ],
    "INDB": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "2.61",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 6,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "4.51",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 9,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "6.35",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 12,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "8.15",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 18,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "11.62",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 24,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      },
      {
        "duration": 36,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
        "merchant_payback": "20.99",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 24900
        }
      }
    ],
    "RATN": [
      {
        "duration": 3,
        "interest": 13,
        "subvention": "customer",
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
        "merchant_payback": "14.07",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
        }
      }
    ],
    "AUBL": [
      {
        "duration": 3,
        "interest": 16,
        "subvention": "customer",
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
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
        "min_amount": 200000,
        "merchant_payback": "14.90",
        "processing_fee_plan": {
          "type": "fixed",
          "amount": 19900
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 29900
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
          "amount": 29900
        }
      }
    ]
  },
  "upi_config": [],
  "recurring": {
    "card": {
      "credit": [
        "MasterCard",
        "Visa",
        "RuPay"
      ],
      "prepaid": [
        "MasterCard",
        "Visa",
        "RuPay"
      ],
      "debit": {
        "APMC": "A.P. Mahesh Co-operative Urban Bank",
        "AUBL": "AU Small Finance Bank",
        "ABHY": "Abhyudaya Co-operative Bank",
        "ANDB": "Andhra Bank",
        "ASBL": "Apna Sahakari Bank",
        "UTIB": "Axis Bank",
        "BARB": "Bank of Baroda",
        "VIJB": "Bank of Baroda - Retail Banking (Erstwhile Vijaya Bank)",
        "BKID": "Bank of India",
        "MAHB": "Bank of Maharashtra",
        "CITI": "CITI Bank",
        "CNRB": "Canara Bank",
        "CIUB": "City Union Bank",
        "DCBL": "DCB Bank",
        "BKDN": "Dena Bank",
        "DNSB": "Dombivli Nagari Sahakari Bank",
        "ESFB": "Equitas Small Finance Bank",
        "FDRL": "Federal Bank",
        "PJSB": "Gopinath Patil Parsik Janata Sahakari Bank",
        "HCBL": "HASTI Co-operative Bank",
        "HDFC": "HDFC Bank",
        "HSBC": "HSBC",
        "ICIC": "ICICI Bank",
        "IBKL": "IDBI",
        "IDFB": "IDFC FIRST Bank",
        "IDIB": "Indian Bank",
        "ALLA": "Indian Bank (Erstwhile Allahabad Bank)",
        "IOBA": "Indian Overseas Bank",
        "INDB": "Indusind Bank",
        "JSFB": "Jana Small Finance Bank",
        "JSBL": "Janakalyan Sahakari Bank",
        "JANA": "Janaseva Sahakari Bank, Pune",
        "KVBL": "Karur Vysya Bank",
        "KKBK": "Kotak Mahindra Bank",
        "MCBL": "Mahanagar Co-operative Bank",
        "MSCI": "Maharashtra State Co-operative Bank",
        "ORCB": "Odisha State Co-operative Bank",
        "PSIB": "Punjab & Sind Bank",
        "PUNB": "Punjab National Bank",
        "RATN": "RBL Bank",
        "STCB": "SBM Bank",
        "SRCB": "Saraswat Co-operative Bank",
        "SCBL": "Standard Chartered Bank",
        "SBIN": "State Bank of India",
        "SYNB": "Syndicate Bank",
        "TJSB": "TJSB Sahakari Bank",
        "TBSB": "Thane Bharat Sahakari Bank",
        "UCBA": "UCO Bank",
        "UBIN": "Union Bank of India",
        "CORP": "Union Bank of India (Erstwhile Corporation Bank)",
        "YESB": "Yes Bank"
      }
    },
    "emandate": {
      "AACX": {
        "auth_types": [
          "netbanking",
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "AKHAND ANAND CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "ACUB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE ARYAPURAM CO OP URBAN BANK LTD",
        "bank_code": "HDFC"
      },
      "ACUX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE ADARSH CO OP URBAN BANK LTD",
        "bank_code": "ICIC"
      },
      "ADBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE AHMEDABAD DISTRICT CO OP BANK LTD",
        "bank_code": "GSCB"
      },
      "AIRP": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "AIRTEL PAYMENTS BANK LTD"
      },
      "AKOX": {
        "auth_types": [
          "netbanking",
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE AKOLA URBAN CO OP BANK LTD",
        "bank_code": "YESB"
      },
      "AMCB": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "AHMEDABAD MERCANTILE CO-OPBANK LTD"
      },
      "AMRX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "AMRELI JILLA MADHYASTHA SAHAKARI BANK LTD",
        "bank_code": "GSCB"
      },
      "APBL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE ANDHRA PRADESH STATE CO OP BANK LTD"
      },
      "APGB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "ANDHRA PRAGATHI GRAMEENA BANK"
      },
      "APGX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "ANDHRA PRADESH GRAMEENA VIKAS BANK",
        "bank_code": "SBIN"
      },
      "ARCX": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "ARUNACHAL PRADESH STATE CO OP APEX BANK LTD",
        "bank_code": "YESB"
      },
      "ASOX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE ASSOCIATE CO OP BANK LTD",
        "bank_code": "YESB"
      },
      "AUBL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "AU SMALL FINANCE BANK"
      },
      "BARB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "BANK OF BARODA"
      },
      "BBRX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE BANGALORE BANGALORE RURAL AND RAMANAGARA DCCB",
        "bank_code": "KSCB"
      },
      "BDBL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "BANDHAN BANK LTD"
      },
      "BDSX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "THE BABASAHEB DESHMUKH SAHAKARI BANK LTD ATPADI"
      },
      "BHOX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "BHOPAL CO-OP CENTRAL BANK",
        "bank_code": "CBIN"
      },
      "BKDX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE BANASKANTHA DIST CENTRAL CO OP BANK LTD",
        "bank_code": "GSCB"
      },
      "BKID": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "BANK OF INDIA"
      },
      "BMPX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE BANASKANTHA MERCANTILE CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "BMSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE BHAGYALAKSHMI MAHILA SAHAKARI BANK LTD",
        "bank_code": "HDFC"
      },
      "BRMX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "BRAMHAPURI URBAN CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "BRUX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE BHARUCH DISTRICT CENTRAL CO OP BANK LTD BHARUC",
        "bank_code": "GSCB"
      },
      "BSBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE BARAMATI SAHAKARI BANK LTD",
        "bank_code": "HDFC"
      },
      "CBIN": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "CENTRAL BANK OF INDIA"
      },
      "CGBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "CHHATTISGARH RAJYA GRAMIN BANK",
        "bank_code": "SBIN"
      },
      "CHNX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "THE CHARADA NAGARIK SAHAKARI BANK LTD"
      },
      "CIUB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "CITY UNION BANK LTD"
      },
      "CLBL": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "CAPITAL SMALL FINANCE BANK LTD"
      },
      "CNRB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "CANARA BANK"
      },
      "CNSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE CHEMBUR NAGARIK SAHAKARI BANK",
        "bank_code": "ICIC"
      },
      "COLX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "COASTAL LOCAL AREA BANK LTD",
        "bank_code": "MAHB"
      },
      "COMX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE COOP BANK OF MEHSANA LTD",
        "bank_code": "IBKL"
      },
      "COSB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE COSMOS CO-OPERATIVE BANK LTD"
      },
      "CRSX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "CG RAJYA SAHAKARI BANK LTD",
        "bank_code": "CBIN"
      },
      "CSBK": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "CSB BANK LIMITED"
      },
      "DBSS": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "DBS BANK INDIA LTD"
      },
      "DCBL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "DCB BANK LTD"
      },
      "DCUX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE DARUSSALAM CO OP URBAN BANK LTD",
        "bank_code": "HDFC"
      },
      "DDCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "DARJEELING DISTRICT CENTRAL CO OP BANK LTD",
        "bank_code": "WBSC"
      },
      "DEUT": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "DEUTSCHE BANK AG"
      },
      "DGBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "TELANGANA GRAMEENA BANK",
        "bank_code": "SBIN"
      },
      "DHUX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE DAHOD URBAN CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "DLXB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "DHANALAXMI BANK"
      },
      "DMKB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "DMK JAOLI BANK",
        "bank_code": "DMKJ"
      },
      "ESAF": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "ESAF SMALL FINANCE BANK LTD",
        "bank_code": "ESMF"
      },
      "ESFB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "EQUITAS SMALL FINANCE BANK LTD"
      },
      "FDRL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "FEDERAL BANK"
      },
      "FINO": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "FINO PAYMENTS BANK LTD"
      },
      "GSCB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE GUJARAT STATE CO OP BANK LTD"
      },
      "GSSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "GUARDIAN SOUHARDA SAHAKARI BANK NIYAMITA",
        "bank_code": "SVCB"
      },
      "HDFC": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "HDFC BANK LTD"
      },
      "HPSX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE HIMACHAL PRADESH STATE CO OP BANK LTD",
        "bank_code": "YESB"
      },
      "HSBC": {
        "auth_types": [
          "netbanking",
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "THE HONGKONG AND SHANGHAI BANKING CORPORATION LTD"
      },
      "HUTX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "HUTATMA SAHAKARI BANK LTD",
        "bank_code": "IBKL"
      },
      "IBKL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "IDBI BANK"
      },
      "ICIC": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "ICICI BANK LTD"
      },
      "IDFB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "IDFC FIRST BANK LTD"
      },
      "IDIB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "INDIAN BANK"
      },
      "INDB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "INDUSIND BANK"
      },
      "IOBA": {
        "auth_types": [
          "netbanking",
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "INDIAN OVERSEAS BANK"
      },
      "IPCX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "INDORE PREMIER CO OP BANK LTD INDORE",
        "bank_code": "CBIN"
      },
      "IPPB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "INDIA POST PAYMENTS BANK LTD",
        "bank_code": "IPOS"
      },
      "JAKA": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE JAMMU AND KASHMIR BANK LTD"
      },
      "JANA": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "JANASEVA SAHAKARI BANK LTD PUNE"
      },
      "JBHX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": " JILA SAHAKRI KENDRIYA BANK MARYADIT BHIND",
        "bank_code": "CBIN"
      },
      "JBIX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHKARI KENDRIYA BANK MARYADIT BILASPUR",
        "bank_code": "UTIB"
      },
      "JBMX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT SAGAR",
        "bank_code": "CBIN"
      },
      "JCHX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT CHHATARPUR",
        "bank_code": "CBIN"
      },
      "JGWX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI BANK MYDT GWALIOR",
        "bank_code": "CBIN"
      },
      "JHSX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT HOSHANGABAD",
        "bank_code": "CBIN"
      },
      "JIBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT ,BALAGHAT",
        "bank_code": "CBIN"
      },
      "JICX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT CHHINDWARA",
        "bank_code": "CBIN"
      },
      "JIDX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHKARI KENDRIYA BANK MYDT DAMOH",
        "bank_code": "CBIN"
      },
      "JIGX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT ,GUNA",
        "bank_code": "CBIN"
      },
      "JIKX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDARIYA BANK MYDT KHANDWA",
        "bank_code": "CBIN"
      },
      "JIMX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT MANDLA",
        "bank_code": "CBIN"
      },
      "JIOX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT SHAHDOL",
        "bank_code": "CBIN"
      },
      "JJHX": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT,JHABUA",
        "bank_code": "CBIN"
      },
      "JJSB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "JALGAON JANATA SAHKARI BANK LTD"
      },
      "JKDX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT JABALPUR",
        "bank_code": "CBIN"
      },
      "JKHX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT ,KHARGONE",
        "bank_code": "CBIN"
      },
      "JKMX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT JAGDALPUR",
        "bank_code": "UTIB"
      },
      "JKRX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILLA SAHAKARI KENDRIYA BANK MYDT RAISEN",
        "bank_code": "CBIN"
      },
      "JLSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT VIDISHA",
        "bank_code": "CBIN"
      },
      "JMAX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT MANDSAUR",
        "bank_code": "CBIN"
      },
      "JMBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT BETUL",
        "bank_code": "CBIN"
      },
      "JMCX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JALNA MERCHANTS CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "JMDX": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHKARI KENDRIYA BANK MYDT DATIA",
        "bank_code": "CBIN"
      },
      "JMOX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT MORENA",
        "bank_code": "CBIN"
      },
      "JMYX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT DURG",
        "bank_code": "UTIB"
      },
      "JNAX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT,NARSINGHPUR",
        "bank_code": "CBIN"
      },
      "JNDX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE JUNAGADH JILLA SAHAKARI BANK LTD",
        "bank_code": "GSCB"
      },
      "JPAX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT PANNA",
        "bank_code": "CBIN"
      },
      "JRAX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT RATLAM",
        "bank_code": "CBIN"
      },
      "JRKX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT UJJAIN",
        "bank_code": "CBIN"
      },
      "JRNX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT RAJNANDGAON",
        "bank_code": "UTIB"
      },
      "JSBL": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "JANAKALYAN SAHAKARI BANK"
      },
      "JSBP": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "JANATA SAHAKARI BANK LTD"
      },
      "JSDX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT,DHAR",
        "bank_code": "CBIN"
      },
      "JSEX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT ,SEHORE",
        "bank_code": "CBIN"
      },
      "JSFB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "JANA SMALL FINANCE BANK LTD"
      },
      "JSHX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT SHAJAPUR",
        "bank_code": "CBIN"
      },
      "JSKX": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MARYADIT RAIPUR",
        "bank_code": "UTIB"
      },
      "JSSX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "JANATA SAHAKARI BANK LTD SATARA"
      },
      "JSTX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "JILA SAHAKARI KENDRIYA BANK MYDT SATNA",
        "bank_code": "CBIN"
      },
      "JUCX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE JUNAGADH COMMERCIAL CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "KACE": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE KANGRA CENTRAL CO OP BANK LTD"
      },
      "KARB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "KARNATAKA BANK LTD"
      },
      "KARX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE KAIRA DISTRICT CENTRAL CO OP BANK LTD",
        "bank_code": "YESB"
      },
      "KBSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "KRISHNA BHIMA SAMRUDDHI LOCAL AREA BANK",
        "bank_code": "HDFC"
      },
      "KCCB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE KALUPUR COMMERCIAL CO OP BANK"
      },
      "KDIX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "SHREE KADI NAGARIK SAHAKARI BANK LTD",
        "bank_code": "YESB"
      },
      "KJSB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE KALYAN JANATA SAHAKARI BANK LTD"
      },
      "KKBK": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "KOTAK MAHINDRA BANK LTD"
      },
      "KLGB": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "KERALA GRAMIN BANK"
      },
      "KMCB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "KOKAN MERCANTILE CO OP BANK LTD",
        "bank_code": "KKBK"
      },
      "KNBX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE KALOL NAGARIK SAHAKARI BANK LTD",
        "bank_code": "IBKL"
      },
      "KNSB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "KURLA NAGARIK SAHAKARI BANK LTD",
        "bank_code": "ICIC"
      },
      "KRNX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE KARNAVATI CO OP  BANK LTD",
        "bank_code": "KKBK"
      },
      "KUKX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE KUKARWADA NAGARIK SAHAKARI BANK LTD",
        "bank_code": "HDFC"
      },
      "KVBL": {
        "auth_types": [
          "netbanking",
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "KARUR VYSA BANK"
      },
      "KVGB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "KARNATAKA VIKAS GRAMEENA BANK"
      },
      "MADX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "MADHYANCHAL GRAMIN BANK",
        "bank_code": "SBIN"
      },
      "MAHB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "BANK OF MAHARASHTRA"
      },
      "MDGX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "RAJASTHAN MARUDHARA GRAMIN BANK",
        "bank_code": "SBIN"
      },
      "MDMX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "MANN DESHI MAHILA SAHKARI BANK LTD",
        "bank_code": "YESB"
      },
      "MERX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "MEGHALAYA RURAL BANK",
        "bank_code": "SBIN"
      },
      "MGBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "MAHARASHTRA GRAMIN BANK",
        "bank_code": "MAHB"
      },
      "MHSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "MAHESH SAHAKARI BANK LTD PUNE",
        "bank_code": "HDFC"
      },
      "MNBX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "MAHILA CO OP NAGARIK BANK LTD BHARUCH",
        "bank_code": "HDFC"
      },
      "MPRX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "MADHYA PRADESH RAJYA SAHAKARI BANK MARYADIT",
        "bank_code": "CBIN"
      },
      "MSNU": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "THE MEHSANA URBAN CO OP BANK"
      },
      "MSNX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE MEHSANA DISTRICT CENTRAL CO OP BANK LTD",
        "bank_code": "GSCB"
      },
      "MUBL": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE MUNICIPAL CO OP BANK LTD"
      },
      "MUSX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE MUSLIM CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "MVTX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "THE MUVATTUPUZHA URBAN CO OPERATIVE BANK LTD"
      },
      "MYAX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE MEGHALAYA CO OP APEX BANK LTD",
        "bank_code": "YESB"
      },
      "MZRX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "MIZORAM RURAL BANK",
        "bank_code": "SBIN"
      },
      "NAWX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE NAWANAGAR CO OP BANK LTD",
        "bank_code": "IBKL"
      },
      "NCBL": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE NATIONAL CO OP BANK LTD",
        "bank_code": "KKBK"
      },
      "NGKX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "NAGRIK SAHAKARI BANK MARYADIT GWALIOR",
        "bank_code": "INDB"
      },
      "NGSB": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "NAGPUR NAGARIK SAHAKARI BANK LTD"
      },
      "NJCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE NAV JEEVAN CO OP BANK LTD",
        "bank_code": "ICIC"
      },
      "NMCX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "NAVI MUMBAI CO OP BANK LTD",
        "bank_code": "IBKL"
      },
      "NNSB": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "NUTAN NAGARIK SAHAKARI BANK LTD"
      },
      "NSPB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "NSDL PAYMENTS BANKS LTD"
      },
      "PABX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "TAMIL NADU GRAMA BANK",
        "bank_code": "IDIB"
      },
      "PANX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE PANCHMAHAL DISTRICT CO OP BANK LTD",
        "bank_code": "GSCB"
      },
      "PBGX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "PUDUVAI BHARATHIAR GRAMA BANK",
        "bank_code": "IDIB"
      },
      "PDSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "PRIYADARSHANI NAGARI SAHAKARI BANK LTD JALNA",
        "bank_code": "KKBK"
      },
      "PGBX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "KARNATAKA GRAMIN BANK",
        "bank_code": "PKGB"
      },
      "PMEC": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "PRIME CO OP BANK LTD"
      },
      "PNCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE PANIPAT URBAN CO OP BANK LTD",
        "bank_code": "YESB"
      },
      "PPBX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "PUNE PEOPLES CO OP BANK LTD",
        "bank_code": "IBKL"
      },
      "PSIB": {
        "auth_types": [
          "netbanking",
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "PUNJAB AND SIND BANK"
      },
      "PUNB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "PUNJAB NATIONAL BANK"
      },
      "PYTM": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "PAYTM PAYMENTS BANK LTD"
      },
      "QUCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE QUILON CO OP URBAN BANK LTD",
        "bank_code": "IBKL"
      },
      "RACX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "RAJKOT COMMERCIAL CO OP BANK LTD",
        "bank_code": "ICIC"
      },
      "RATN": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "RBL BANK LIMITED"
      },
      "RDCX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "RAIGAD DISTRICT CENTRAL CO OP BANK LTD",
        "bank_code": "IBKL"
      },
      "RJTX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "SHRI RAJKOT DISTRICT CO OP BANK LTD",
        "bank_code": "GSCB"
      },
      "RSSX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "RAJARSHI SHAHU SAHAKARI BANK LTD",
        "bank_code": "HDFC"
      },
      "SADX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE SABARKANTHA DISTRICT CENTRAL CO OP BANK LTD",
        "bank_code": "GSCB"
      },
      "SAGX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "SAURASHTRA GRAMIN BANK",
        "bank_code": "SBIN"
      },
      "SBCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE SULTANS BATTERY CO OP URBAN BANK LTD",
        "bank_code": "ICIC"
      },
      "SBIN": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "STATE BANK OF INDIA"
      },
      "SCBL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "STANDARD CHARTERED BANK"
      },
      "SDCB": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "THE SURAT DISTRICT CO OP BANK"
      },
      "SEWX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "SHRI MAHILA SEWA SAHAKARI BANK LTD",
        "bank_code": "HDFC"
      },
      "SHIX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "SHIVALIK SMALL FINANCE BANK LTD",
        "bank_code": "SMCB"
      },
      "SIBL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE SOUTH INDIAN BANK LIMITED"
      },
      "SMBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "SAMPADA SAHAKARI BANK LTD PUNE",
        "bank_code": "IBKL"
      },
      "SNSX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "SMRITI NAGRIK SAHAKARI BANK",
        "bank_code": "YESB"
      },
      "SPBX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "SAPTAGIRI GRAMEENA BANK",
        "bank_code": "IDIB"
      },
      "SPCB": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE SURAT PEOPLES CO OP BANK LTD"
      },
      "SPCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE SHIRPUR PEOPLES CO OP BANK LTD",
        "bank_code": "KKBK"
      },
      "SRCB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "SARASWAT BANK"
      },
      "STCB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "SBM BANK INDIA LTD"
      },
      "SUNB": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "SURAT NATIONAL CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "SURY": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "SURYODAY SMALL FINANCE BANK LTD"
      },
      "SVAX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "SRI VASAVAMBA CO OP BANK LTD",
        "bank_code": "IBKL"
      },
      "SVCB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "SVC CO OP BANK LTD"
      },
      "SVCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "SARVODAYA COMMERICAL CO OP BANK LTD",
        "bank_code": "IBKL"
      },
      "TASX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE ANNASAHEB SAVANT CO OP URBAN BANK MAHAD LTD",
        "bank_code": "HDFC"
      },
      "TBSB": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "THANE BHARAT SAHAKARI BANK LTD"
      },
      "TCBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE CO OP BANK OF RAJKOT LTD",
        "bank_code": "YESB"
      },
      "TGCX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "TAMLUK GHATAL CENTRAL CO OP BANK LTD",
        "bank_code": "WBSC"
      },
      "TGNX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE GANDHINAGAR NAGRIK CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "TMBL": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "TAMILNAD MERCANTILE BANK LTD"
      },
      "TSIX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE SHILLONG CO OP URBAN BANK LTD",
        "bank_code": "IBKL"
      },
      "UBIN": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "UNION BANK OF INDIA"
      },
      "UCBA": {
        "auth_types": [
          "netbanking",
          "aadhaar"
        ],
        "is_merged_bank": false,
        "name": "UCO BANK"
      },
      "UGBX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "UTKAL GRAMEEN BANK",
        "bank_code": "SBIN"
      },
      "USFB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "UJJIVAN SMALL FINANCE BANK LTD",
        "bank_code": "UJVN"
      },
      "UTGX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "UTTARAKHAND GRAMIN BANK",
        "bank_code": "SBIN"
      },
      "UTIB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "AXIS BANK"
      },
      "UTKS": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "UTKARSH SMALL FINANCE BANK LTD"
      },
      "VARA": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE VARACHHA CO OP BANK LTD"
      },
      "VERX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE VERAVAL MERCANTILE CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "VGBX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "JHARKHAND RAJYA GRAMIN BANK",
        "bank_code": "SBIN"
      },
      "VIDX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "VIDYASAGAR CENTRAL CO OP BANK LTD",
        "bank_code": "WBSC"
      },
      "VIJX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE VIJAY CO OP BANK LTD",
        "bank_code": "HDFC"
      },
      "VISX": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": true,
        "name": "THE VISAKHAPATNAM CO OP BANK LTD",
        "bank_code": "IBKL"
      },
      "VVCX": {
        "auth_types": [
          "aadhaar"
        ],
        "is_merged_bank": true,
        "name": "THE VALLABH VIDYANAGAR COMMERCIAL BANK LTD",
        "bank_code": "HDFC"
      },
      "YESB": {
        "auth_types": [
          "netbanking",
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "YES BANK"
      },
      "ZCBL": {
        "auth_types": [
          "aadhaar",
          "debitcard"
        ],
        "is_merged_bank": false,
        "name": "THE ZOROASTRIAN CO OP BANK LTD"
      }
    },
    "upi": true,
    "upi_autopay": {
      "collect": true,
      "intent": true
    },
    "nach": true
  },
  "upi_intent": true
}
```

#### Related Information
- [Integrate Recurring Payments Using Emandate](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/integrate.md)
- [Charge Customers During Registration - Use Cases and Payment Methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/charge-customer-during-registration.md)
- [APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/apis.md)
- [Handle Errors](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/emandate/errors.md)
