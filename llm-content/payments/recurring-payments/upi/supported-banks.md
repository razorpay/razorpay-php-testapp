---
title: Supported Banks and Apps
description: List of banks and apps that support recurring payments via UPI.
---

# Supported Banks and Apps

We support all the apps and banks mentioned in the [NPCI list](https://www.npci.org.in/what-we-do/autopay/list-of-banks-and-apps-live-on-autopay).

> **INFO**
>
> 
> **Handy Tips**
> 
> For certain MCCs, the maximum amount limit for one transaction is ₹1,00,000.
> Refer to the [list of supported MCCs, issuing banks and PSP applications](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/subscriptions/supported-banks-apps/#supported-mccs.md).
> 

### Intent Support with PSP Apps

The below table gives information about the frequently used intent-supported PSP apps on different platforms and checkout integrations.

  
  
  PSP Apps | Android (mWeb) | Android (SDK) | iOS (mWeb) | iOS (SDK)
  ---
  GPay | ✓ | ✓ | ✓ | ✓
  ---
  PhonePe | ✓ | ✓ | ✓ | ✓
  ---
  Paytm | ✓ | ✓ | ✓ | ✓
  ---
  Cred | ✓ | ✓ | ✓ | ✓
  ---
  BHIM | ✓ | ✓ | ✓ | ✓
  ---
  SuperMoney | ✓ | ✓ | ✓ | ✓
  ---
  Navi | ✓ | ✓ | ✓ | ✓
  ---
  Mobikwik | x | x | x | x
  ---
  Pop | Coming Soon | ✓ | Coming Soon | Coming Soon
  ---
  Amazon Pay | x | x | x | x
  ---
  BharatPe | Coming Soon | ✓ | x | x
  ---
  PayZapp | x | x | x | x
  ---
  iMobile | x | ✓ | x | x
  ---
  
  
  
  
  PSP Apps | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓
  ---
  PhonePe | ✓ | ✓
  ---
  Paytm | ✓ | ✓
  ---
  Amazon Pay | ✓ | x
  ---
  BHIM | ✓ | x
  
  
  
    
  PSP Apps | mWeb | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓ | x
  ---
  PhonePe | ✓ | ✓ | x
  ---
  Paytm | ✓ | ✓ | x
  ---
  Amazon Pay | ✓ | ✓ | x
  ---
  BHIM | ✓ | ✓ | x
  ---
  
  

#### Intent Support with PSP Apps for TPV

The below table gives information about the frequently used intent-supported PSP apps for TPV on different platforms and checkout integrations.

  
  
  PSP Apps | mWeb | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓ | ✓
  ---
  PhonePe | ✓ | ✓ | x
  ---
  Paytm | ✓ | ✓ | ✓
  ---
  Amazon Pay | x | ✓ | x
  ---
  BHIM | x | ✓ | x
  ---
  
  
  
  
  PSP Apps | mWeb | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓ | ✓
  ---
  PhonePe | ✓ | ✓ | x
  ---
  Paytm | ✓ | ✓ | ✓
  ---
  Amazon Pay | x | ✓ | x
  ---
  BHIM | x | ✓ | x
  ---
  
  
  
  
  PSP Apps | mWeb | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓ | x
  ---
  PhonePe | ✓ | ✓ | x
  ---
  Paytm | ✓ | ✓ | x
  ---
  Amazon Pay | ✓ | ✓ | x
  ---
  BHIM | ✓ | ✓ | x
  ---
  
  

> **WARN**
>
> 
> **Watch Out!**
> 
> - Contact our [Support team](https://razorpay.com/support/#request) to enable PSP apps other than PhonePe and Paytm on Standard Checkout for UPI TPV. Watch this video on how to get it enabled.
>   ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> - UPI Intent TPV is not supported for @okaxis handle.
> 

### Intent Support with PSP Apps for OC125

The below table gives information about the frequently used intent-supported PSP apps for OC125 (restrict pausing and cancelling mandate) on different platforms and checkout integrations.

> **WARN**
>
> 
> **Watch Out!**
> 
> OC125 is supported only for lending businesses.
> 

  
  
  PSP Apps | mWeb | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓ | ✓
  ---
  PhonePe | ✓ | ✓ | x
  ---
  Paytm | ✓ | ✓ | ✓
  ---
  
  
  
  
  PSP Apps | mWeb | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓ | ✓
  ---
  PhonePe | ✓ | ✓ | x
  ---
  Paytm | ✓ | ✓ | ✓
  ---
  
  
  
    
  PSP Apps | mWeb | Android SDK | iOS SDK
  ---
  GPay | ✓ | ✓ | x
  ---
  PhonePe | ✓ | ✓ | x
  ---
  Paytm | ✓ | ✓ | x
  ---
  
  

> **WARN**
>
> 
> **Watch Out!**
> - Contact our [Support team](https://razorpay.com/support/#request) to enable UPI Intent on Standard Checkout. Watch this video on how to get it enabled.
>   ![Feature Request GIF](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/feature-request.gif.md)
> - UPI Intent is not supported for @okaxis handle.
> 

## Fetch Supported Methods

Use the below endpoint to fetch a list of all methods enabled for your account.

/methods

> **INFO**
>
> 
> **[YOUR_KEY_ID] Required**
> 
> To fire this API, you need to provide your [KEY_ID] for authorization. Your [KEY_SECRET] is not required and should not be passed.
> 

```curl: Request
curl -u [YOUR_KEY_ID] \
    -X GET https://api.razorpay.com/v1/methods
```json: Response
{
   "entity":"methods",
   "card":true,
   "debit_card":true,
   "credit_card":true,
   "prepaid_card":true,
   "card_networks":{
      "AMEX":1,
      "DICL":1,
      "MC":1,
      "MAES":1,
      "VISA":1,
      "JCB":1,
      "RUPAY":1,
      "BAJAJ":0
   },
   "card_subtype":{
      "consumer":1,
      "business":1
   },
   "amex":true,
   "netbanking":{
      "AUBL":"AU Small Finance Bank",
      "AIRP":"Airtel Payments Bank",
      "ANDB":"Andhra Bank",
      "UTIB":"Axis Bank",
      "BDBL":"Bandhan Bank",
      "BBKM":"Bank of Bahrein and Kuwait",
      "BARB_R":"Bank of Baroda - Retail Banking",
      "VIJB":"Bank of Baroda - Retail Banking (Erstwhile Vijaya Bank)",
      "BKID":"Bank of India",
      "MAHB":"Bank of Maharashtra",
      "BACB":"Bassein Catholic Co-operative Bank",
      "CNRB":"Canara Bank",
      "CSBK":"Catholic Syrian Bank",
      "CBIN":"Central Bank of India",
      "CIUB":"City Union Bank",
      "COSB":"Cosmos Co-operative Bank",
      "DCBL":"DCB Bank",
      "DEUT":"Deutsche Bank",
      "DBSS":"Development Bank of Singapore",
      "DLXB":"Dhanlaxmi Bank",
      "DLXB_C":"Dhanlaxmi Bank - Corporate Banking",
      "ESAF":"ESAF Small Finance Bank",
      "ESFB":"Equitas Small Finance Bank",
      "FDRL":"Federal Bank",
      "FSFB":"Fincare Small Finance Bank",
      "HDFC":"HDFC Bank",
      "HSBC":"HSBC",
      "ICIC":"ICICI Bank",
      "IBKL":"IDBI",
      "IBKL_C":"IDBI - Corporate Banking",
      "IDFB":"IDFC FIRST Bank",
      "IDIB":"Indian Bank",
      "ALLA":"Indian Bank (Erstwhile Allahabad Bank)",
      "IOBA":"Indian Overseas Bank",
      "INDB":"Indusind Bank",
      "JAKA":"Jammu and Kashmir Bank",
      "JSFB":"Jana Small Finance Bank",
      "JSBP":"Janata Sahakari Bank (Pune)",
      "KCCB":"Kalupur Commercial Co-operative Bank",
      "KJSB":"Kalyan Janata Sahakari Bank",
      "KARB":"Karnataka Bank",
      "KVBL":"Karur Vysya Bank",
      "KKBK":"Kotak Mahindra Bank",
      "LAVB_C":"Lakshmi Vilas Bank - Corporate Banking",
      "LAVB_R":"Lakshmi Vilas Bank - Retail Banking",
      "MSNU":"Mehsana Urban Co-operative Bank",
      "NKGS":"NKGSB Co-operative Bank",
      "NSPB":"NSDL Payments Bank",
      "NESF":"North East Small Finance Bank",
      "ORBC":"PNB (Erstwhile-Oriental Bank of Commerce)",
      "UTBI":"PNB (Erstwhile-United Bank of India)",
      "PSIB":"Punjab & Sind Bank",
      "PUNB_R":"Punjab National Bank - Retail Banking",
      "RATN":"RBL Bank",
      "RATN_C":"RBL Bank - Corporate Banking",
      "ABNA":"Royal Bank of Scotland N.V.",
      "SRCB":"Saraswat Co-operative Bank",
      "SVCB_C":"Shamrao Vithal Bank - Corporate Banking",
      "SVCB":"Shamrao Vithal Co-operative Bank",
      "SIBL":"South Indian Bank",
      "SCBL":"Standard Chartered Bank",
      "SURY":"Suryoday Small Finance Bank",
      "SYNB":"Syndicate Bank",
      "TMBL":"Tamilnadu Mercantile Bank",
      "TNSC":"Tamilnadu State Apex Co-operative Bank",
      "TBSB":"Thane Bharat Sahakari Bank",
      "TJSB":"Thane Janata Sahakari Bank",
      "UCBA":"UCO Bank",
      "UBIN":"Union Bank of India",
      "CORP":"Union Bank of India (Erstwhile Corporation Bank)",
      "VARA":"Varachha Co-operative Bank",
      "YESB":"Yes Bank",
      "YESB_C":"Yes Bank - Corporate Banking",
      "ZCBL":"Zoroastrian Co-operative Bank"
   },
   "wallet":{
      "mobikwik":true,
      "payzapp":true,
      "olamoney":true,
      "airtelmoney":true,
      "jiomoney":true,
      "openwallet":true,
      "phonepe":true
   },
   "emi":true,
   "upi":true,
   "cardless_emi":[
      
   ],
   "paylater":{
      "epaylater":true,
      "getsimpl":true,
      "icic":true,
      "hdfc":true,
      "lazypay":true
   },
   "google_pay_cards":false,
   "app":{
      "cred":0,
      "twid":0
   },
   "gpay":false,
   "emi_types":{
      "credit":true,
      "debit":true
   },
   "debit_emi_providers":{
      "HDFC":0
   },
   "nach":true,
   "cod":false,
   "bank_transfer":true,
   "emi_subvention":"customer",
   "emi_plans":{
      "KKBK":{
         "min_amount":300000,
         "plans":{
            "3":12,
            "6":12,
            "9":14,
            "12":14,
            "18":15,
            "24":15
         }
      },
      "UTIB":{
         "min_amount":300000,
         "plans":{
            "3":13,
            "6":13,
            "9":14,
            "12":14,
            "18":15,
            "24":15
         }
      },
      "INDB":{
         "min_amount":200000,
         "plans":{
            "3":13,
            "6":13,
            "9":13,
            "12":12,
            "18":12,
            "24":12
         }
      },
      "RATN":{
         "min_amount":100000,
         "plans":{
            "3":13,
            "6":14,
            "9":15,
            "12":15,
            "18":15,
            "24":15
         }
      },
      "HDFC":{
         "min_amount":300000,
         "plans":{
            "18":15,
            "24":15,
            "3":15,
            "6":15,
            "9":15,
            "12":15
         }
      },
      "SCBL":{
         "min_amount":250000,
         "plans":{
            "3":13,
            "6":13,
            "9":14,
            "12":14
         }
      },
      "BARB":{
         "min_amount":250000,
         "plans":{
            "3":13,
            "6":13,
            "9":13,
            "12":13,
            "18":15,
            "24":15
         }
      },
      "ICIC":{
         "min_amount":150000,
         "plans":{
            "3":12.99,
            "6":13.99,
            "9":13.99,
            "12":13.99,
            "24":14.99,
            "18":14.99
         }
      },
      "YESB":{
         "min_amount":150000,
         "plans":{
            "18":15,
            "24":15,
            "9":14,
            "3":14,
            "6":14,
            "12":15
         }
      },
      "CITI":{
         "min_amount":250000,
         "plans":{
            "3":13,
            "6":13,
            "9":15,
            "12":15,
            "18":15,
            "24":15
         }
      },
      "AMEX":{
         "min_amount":500000,
         "plans":{
            "3":14,
            "6":14,
            "9":14,
            "12":14,
            "18":14,
            "24":14
         }
      },
      "onecard":{
         "min_amount":300000,
         "plans":{
            "3":16,
            "6":16,
            "9":16,
            "12":16,
            "18":16,
            "24":16
         }
      },
      "HSBC":{
         "min_amount":200000,
         "plans":{
            "3":12.5,
            "6":12.5,
            "9":13.5,
            "12":13.5,
            "18":13.5
         }
      }
   },
   "emi_options":{
      "KKBK":[
         {
            "duration":3,
            "interest":12,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"1.97"
         },
         {
            "duration":6,
            "interest":12,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"3.41"
         },
         {
            "duration":9,
            "interest":14,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"5.59"
         },
         {
            "duration":12,
            "interest":14,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"7.19"
         },
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"14.07"
         }
      ],
      "UTIB":[
         {
            "duration":3,
            "interest":12,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"1.97"
         },
         {
            "duration":6,
            "interest":12,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"3.41"
         },
         {
            "duration":9,
            "interest":13,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"5.21"
         },
         {
            "duration":12,
            "interest":13,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"6.70"
         },
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"14.07"
         },
         {
            "duration":3,
            "interest":13,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"3.68"
         },
         {
            "duration":9,
            "interest":14,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"5.59"
         },
         {
            "duration":12,
            "interest":14,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"7.19"
         }
      ],
      "INDB":[
         {
            "duration":3,
            "interest":13,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"3.68"
         },
         {
            "duration":9,
            "interest":13,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"5.21"
         },
         {
            "duration":12,
            "interest":13,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"6.70"
         },
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"14.07"
         },
         {
            "duration":3,
            "interest":13,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"3.68"
         },
         {
            "duration":9,
            "interest":13,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"5.21"
         },
         {
            "duration":12,
            "interest":12,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"6.21"
         },
         {
            "duration":18,
            "interest":12,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"8.90"
         },
         {
            "duration":24,
            "interest":12,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"11.49"
         }
      ],
      "RATN":[
         {
            "duration":3,
            "interest":13,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"3.68"
         },
         {
            "duration":9,
            "interest":13,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"5.21"
         },
         {
            "duration":12,
            "interest":13,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"6.70"
         },
         {
            "duration":18,
            "interest":13,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"9.59"
         },
         {
            "duration":24,
            "interest":13,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"12.36"
         },
         {
            "duration":6,
            "interest":14,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"3.96"
         },
         {
            "duration":9,
            "interest":15,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"5.97"
         },
         {
            "duration":12,
            "interest":15,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"7.67"
         },
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":100000,
            "merchant_payback":"14.07"
         }
      ],
      "HDFC":[
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"14.07"
         },
         {
            "duration":3,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"2.45"
         },
         {
            "duration":6,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"4.23"
         },
         {
            "duration":9,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"5.97"
         },
         {
            "duration":12,
            "interest":15,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"7.67"
         }
      ],
      "SCBL":[
         {
            "duration":3,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"3.68"
         },
         {
            "duration":9,
            "interest":14,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"5.59"
         },
         {
            "duration":12,
            "interest":14,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"7.19"
         }
      ],
      "BARB":[
         {
            "duration":3,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"3.68"
         },
         {
            "duration":9,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"5.21"
         },
         {
            "duration":12,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"6.70"
         },
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"14.07"
         }
      ],
      "ICIC":[
         {
            "duration":3,
            "interest":12.99,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13.99,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"3.96"
         },
         {
            "duration":9,
            "interest":13.99,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"5.59"
         },
         {
            "duration":12,
            "interest":13.99,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"7.18"
         },
         {
            "duration":24,
            "interest":14.99,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"14.06"
         },
         {
            "duration":18,
            "interest":14.99,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"10.94"
         }
      ],
      "YESB":[
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"14.07"
         },
         {
            "duration":9,
            "interest":14,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"5.59"
         },
         {
            "duration":3,
            "interest":14,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"2.29"
         },
         {
            "duration":6,
            "interest":14,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"3.96"
         },
         {
            "duration":12,
            "interest":15,
            "subvention":"customer",
            "min_amount":150000,
            "merchant_payback":"7.67"
         }
      ],
      "CITI":[
         {
            "duration":3,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"2.13"
         },
         {
            "duration":6,
            "interest":13,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"3.68"
         },
         {
            "duration":9,
            "interest":15,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"5.97"
         },
         {
            "duration":12,
            "interest":15,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"7.67"
         },
         {
            "duration":18,
            "interest":15,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"10.95"
         },
         {
            "duration":24,
            "interest":15,
            "subvention":"customer",
            "min_amount":250000,
            "merchant_payback":"14.07"
         }
      ],
      "AMEX":[
         {
            "duration":3,
            "interest":14,
            "subvention":"customer",
            "min_amount":500000,
            "merchant_payback":"2.29"
         },
         {
            "duration":6,
            "interest":14,
            "subvention":"customer",
            "min_amount":500000,
            "merchant_payback":"3.96"
         },
         {
            "duration":9,
            "interest":14,
            "subvention":"customer",
            "min_amount":500000,
            "merchant_payback":"5.59"
         },
         {
            "duration":12,
            "interest":14,
            "subvention":"customer",
            "min_amount":500000,
            "merchant_payback":"7.19"
         },
         {
            "duration":18,
            "interest":14,
            "subvention":"customer",
            "min_amount":500000,
            "merchant_payback":"10.27"
         },
         {
            "duration":24,
            "interest":14,
            "subvention":"customer",
            "min_amount":500000,
            "merchant_payback":"13.22"
         }
      ],
      "onecard":[
         {
            "duration":3,
            "interest":16,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"2.61"
         },
         {
            "duration":6,
            "interest":16,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"4.51"
         },
         {
            "duration":9,
            "interest":16,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"6.35"
         },
         {
            "duration":12,
            "interest":16,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"8.15"
         },
         {
            "duration":18,
            "interest":16,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"11.62"
         },
         {
            "duration":24,
            "interest":16,
            "subvention":"customer",
            "min_amount":300000,
            "merchant_payback":"14.90"
         }
      ],
      "HSBC":[
         {
            "duration":3,
            "interest":12.5,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"2.05"
         },
         {
            "duration":6,
            "interest":12.5,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"3.55"
         },
         {
            "duration":9,
            "interest":13.5,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"5.40"
         },
         {
            "duration":12,
            "interest":13.5,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"6.94"
         },
         {
            "duration":18,
            "interest":13.5,
            "subvention":"customer",
            "min_amount":200000,
            "merchant_payback":"9.93"
         }
      ]
   },
   "recurring":{
      "card":{
         "credit":[
            "MasterCard",
            "Visa"
         ],
         "debit":{
            "CITI":"CITI Bank",
            "CNRB":"Canara Bank",
            "CIUB":"City Union Bank",
            "ESFB":"Equitas Small Finance Bank",
            "HSBC":"HSBC",
            "ICIC":"ICICI Bank",
            "KVBL":"Karur Vysya Bank",
            "KKBK":"Kotak Mahindra Bank"
         }
      },
      "emandate":{
         "APGB":{
            "auth_types":[
               "netbanking"
            ],
            "name":"Andhra Pragathi Grameena Bank"
         },
         "UTIB":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Axis Bank"
         },
         "BDBL":{
            "auth_types":[
               "netbanking"
            ],
            "name":"Bandhan Bank"
         },
         "BARB_R":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Bank of Baroda - Retail Banking"
         },
         "MAHB":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Bank of Maharashtra"
         },
         "CITI":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"CITI Bank"
         },
         "CNRB":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Canara Bank"
         },
         "CSBK":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Catholic Syrian Bank"
         },
         "CBIN":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"Central Bank of India"
         },
         "CIUB":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"City Union Bank"
         },
         "COSB":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"Cosmos Co-operative Bank"
         },
         "DCBL":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"DCB Bank"
         },
         "DEUT":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Deutsche Bank"
         },
         "DBSS":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Development Bank of Singapore"
         },
         "DLXB":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Dhanlaxmi Bank"
         },
         "ESFB":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Equitas Small Finance Bank"
         },
         "FDRL":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Federal Bank"
         },
         "HDFC":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"HDFC Bank"
         },
         "HSBC":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"HSBC"
         },
         "ICIC":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"ICICI Bank"
         },
         "IBKL":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"IDBI"
         },
         "IDFB":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"IDFC FIRST Bank"
         },
         "IDIB":{
            "auth_types":[
               "netbanking"
            ],
            "name":"Indian Bank"
         },
         "IOBA":{
            "auth_types":[
               "netbanking"
            ],
            "name":"Indian Overseas Bank"
         },
         "INDB":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Indusind Bank"
         },
         "JSFB":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Jana Small Finance Bank"
         },
         "JIOP":{
            "auth_types":[
               "netbanking"
            ],
            "name":"Jio Payments Bank"
         },
         "KARB":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Karnataka Bank"
         },
         "KVGB":{
            "auth_types":[
               "netbanking"
            ],
            "name":"Karnataka Vikas Grameena Bank"
         },
         "KVBL":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"Karur Vysya Bank"
         },
         "KKBK":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Kotak Mahindra Bank"
         },
         "PYTM":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Paytm Payments Bank"
         },
         "PSIB":{
            "auth_types":[
               "netbanking"
            ],
            "name":"Punjab & Sind Bank"
         },
         "PUNB_R":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Punjab National Bank - Retail Banking"
         },
         "RATN":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"RBL Bank"
         },
         "SIBL":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"South Indian Bank"
         },
         "SCBL":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Standard Chartered Bank"
         },
         "SBIN":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"State Bank of India"
         },
         "TMBL":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Tamilnadu Mercantile Bank"
         },
         "UCBA":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"UCO Bank"
         },
         "UJVN":{
            "auth_types":[
               "netbanking",
               "debitcard"
            ],
            "name":"Ujjivan Small Finance Bank"
         },
         "UBIN":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Union Bank of India"
         },
         "VARA":{
            "auth_types":[
               "netbanking",
               "aadhaar"
            ],
            "name":"Varachha Co-operative Bank"
         },
         "YESB":{
            "auth_types":[
               "netbanking",
               "aadhaar",
               "debitcard"
            ],
            "name":"Yes Bank"
         },
         "ABHY":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Abhyudaya Co-operative Bank"
         },
         "APSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Adarniya P.d. Patilsaheb Sahakari Bank"
         },
         "ACUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Adarsh Co-operative Urban Bank"
         },
         "TACX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Adinath Co-operative Bank"
         },
         "SATX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Adv.shamraoji Shinde Satyashodhak Bank"
         },
         "AGCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Agrasen Co-operative Urban Bank"
         },
         "AHUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ahilyadevi Urban Co-operative Bank Limited Solapur"
         },
         "ADBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ahmedabad District Co-operative Bank"
         },
         "AMCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ahmedabad Mercantile Co-operative Bank"
         },
         "AHMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ahmednagar District Central Co-operative Bank"
         },
         "AUCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ajara Urban Co-operative Bank"
         },
         "AACX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Akhand Anand Co.op Bank"
         },
         "AJKB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Akola Janata Commercial Co-operative Bank"
         },
         "ALAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Alavi Co-operative Bank"
         },
         "ALLX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Allahabad District Co-operative Bank"
         },
         "AMAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Aman Sahakari Bank"
         },
         "AJPX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ambajogai Peoples Co-operative Bank"
         },
         "AJSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ambarnath Jai-hind Co-operative Bank"
         },
         "AVDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Amravati District Central Co-operative Bank"
         },
         "AMRX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Amreli Jilla Madhyastha Sahakari Bank"
         },
         "TAMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Anand Mercantile Co-operative Bank"
         },
         "ANSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Andaman & Nicobar State Co-operative Bank"
         },
         "APGX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Andhra Pradesh Grameena Vikas Bank"
         },
         "APBL":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Andhra Pradesh State Co-operative Bank"
         },
         "ACKX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Annasaheb Chougule Urban Co-operative Bank"
         },
         "ASKX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Arvind Sahakari Bank"
         },
         "ASHX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ashta People's Co-operative Bank"
         },
         "BUZX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Badaun Zila Sahkari Bank"
         },
         "BKDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Banaskantha Dist Central Co-operative Bank"
         },
         "BMPX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Banaskantha Mercantile Co-operative Bank"
         },
         "BDUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Banda Urban Co-operative Bank"
         },
         "TBMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bapunagar Mahila Co-operative Bank"
         },
         "BSBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Baramati Sahakari Bank"
         },
         "BARX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Baroda City Co-operative Bank"
         },
         "BNBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Betul Nagrik Sahakari Bank Mydt"
         },
         "BHDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhadohi Urban Co-operative Bank Gyanpur"
         },
         "BNSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhagini Nivedita Sahakari Bank"
         },
         "BHAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhagyodaya Co-operative Bank"
         },
         "BCBM":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bharat Co-operative Bank"
         },
         "BKCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhavasara Kshatriya Co-operative Bank"
         },
         "BHUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhilwara Urban Co-operative Bank"
         },
         "BBLX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhingar Urban Co-operative Bank"
         },
         "BHCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhuj Commercial Co-operative Bank"
         },
         "BHJX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bhuj Mercentile Co-operative Bank"
         },
         "TBSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bihar State Co-operative Bank"
         },
         "BJUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bijnor Urban Co-operative Bank"
         },
         "BMCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bombay Mercantile Co-operative Bank"
         },
         "BORX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Boral Union Co-operative Bank"
         },
         "BRMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Bramhapuri Urban Co-operative Bank"
         },
         "BURX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Burdwan Central Co-operative Bank"
         },
         "CALX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Calicut Co-operative Urban Bank"
         },
         "CBHX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Central Co-operative Bank  Bhilwara"
         },
         "CHBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Chamba Urban Co-operative Bank Chamba"
         },
         "CSBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Chartered Sahakari Bank Niyamitha"
         },
         "CJAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Citizens' Co-operative Bank Jammu"
         },
         "CMLX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Commercial Co-operative Bank"
         },
         "DHUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Dahod Urban Co-operative Bank"
         },
         "DENS":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Delhi Nagrik Sehkari Bank"
         },
         "TDMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Dhanera Mercantile Co-operative Bank"
         },
         "DSUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Dharamvir Sambhaji Urban Co-operative Bank"
         },
         "DNSB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Dombivli Nagari Sahakari Bank"
         },
         "DBAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Dr Babasaheb Ambedkar Sahakari Bank Nasik"
         },
         "ABDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Dr. Ambedkar Nagrik Sahakari Bank Mydt Gwalior"
         },
         "DSPX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Durgapur Steel Peoples' Co-operative Bank"
         },
         "EUCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Etah Urban Co-operative Bank"
         },
         "FINX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Financial Co-operative Bank"
         },
         "GPCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Gandevi People's Co-operative Bank"
         },
         "GNCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Gandhi Co-operative Urban Bank"
         },
         "GHPX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ghatal Peoples' Co-operative Bank"
         },
         "GUCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Goa Urban Co-operative Bank"
         },
         "PJSB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Gopinath Patil Parsik Janata Sahakari Bank"
         },
         "GRAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Grain Merchants' Co-operative Bank"
         },
         "GACX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Gujarat Ambuja Co-operative Bank"
         },
         "GSCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Gujarat State Co-operative Bank"
         },
         "GCBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Guruvayur Co-operative Urban Bank"
         },
         "HAMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Hamirpur District Co-operative Bank"
         },
         "HSDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Hassan District Co-operative Central Bank"
         },
         "HMNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Himatnagar Nagarik Sahakari Bank"
         },
         "IMPX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Imphal Urban Co-operative Bank"
         },
         "ITDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Income Tax Dept Co-operative Bank"
         },
         "ICMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Indore Cloth Market Co-operative Bank"
         },
         "IPSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Indore Paraspar Sahakari Bank"
         },
         "IPCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Indore Premier Co-operative Bank Indore"
         },
         "ICBL":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Industrial Co-operative Bank"
         },
         "ITCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Irinjalakuda Town Co-operative Bank"
         },
         "XJKG":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"J&K Grameen Bank"
         },
         "JPCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Jalgaon Peoples Co-operative Bank"
         },
         "JMCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Jalna Merchants Co-operative Bank"
         },
         "TJNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Jamnagar Mahila Sahakari Bank"
         },
         "JASB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Janaseva Sahakari Bank (Borivli)"
         },
         "JSBP":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Janata Sahakari Bank (Pune)"
         },
         "JSMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Janata Sahakari Bank Amravati"
         },
         "JHAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Jharneshwar Nagrik Sahakari Bank Maryadit"
         },
         "JVCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Jivan Commercial Co-operative Bank"
         },
         "JODX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Jodhpur Central Co-operative Bank"
         },
         "JONX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Jodhpur Nagrik Sahakari Bank"
         },
         "KALX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kalna Town Credit Co-operative Bank"
         },
         "KNBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kalol Nagarik Sahakari Bank"
         },
         "KAMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kamala Co-operative Bank Solapur"
         },
         "KKMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kankaria Mainagar Nagrik Sahakari Bank"
         },
         "KSCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Karnataka State Co-operative Apex Bank"
         },
         "KRNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Karnavati Co-operative Bank"
         },
         "KVCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kavita Urban Co-operative Bank"
         },
         "KHUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Khamgaon Urban Co-operative Bank"
         },
         "KUCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kolhapur Urban Co-operative Bank"
         },
         "KTBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kottayam District Co-operative Bank"
         },
         "KDCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Kozhikode District Co-operative Bank"
         },
         "KMCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Krishna Mercantile Co-operative Bank"
         },
         "LATX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Latur Urban Co-operative Bank Latur"
         },
         "LBMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Laxmibai Mahila Nagrik Sahakari Bank Maradit"
         },
         "LKMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Lokmangal Co-operative Bank Solapur"
         },
         "MSCI":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Maharashtra State Co-operative Bank"
         },
         "MVCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Mahaveer Co-operative Bank"
         },
         "MAKX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Makarpura Industrial Estate Co-operative Bank"
         },
         "MSBL":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Malad Sahakari Bank"
         },
         "MPDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Malappuram District Co-operative Bank"
         },
         "MABL":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Malleshwaram Co-operative Bank"
         },
         "MALX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Malviya Urban Co-operative Bank"
         },
         "MSCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Manipur State Co-operative Bank"
         },
         "MSOX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Manorama Co-operative Bank Solapur"
         },
         "MGCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Mansing Co-operative Bank"
         },
         "MRTX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Maratha Co-operative Bank"
         },
         "MYAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Meghalaya Co-operative Apex Bank"
         },
         "MSNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Mehsana District Central Co-operative Bank"
         },
         "MLCG":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Merchants Liberal Co-operative Bank"
         },
         "MZCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Mizoram Urban Co-operative Development Bank"
         },
         "TMSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Modasa Nagarik Sahkari Bank"
         },
         "MDEX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Model Co-operative Bank"
         },
         "MPCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Moirang Primary Co-operative Bank"
         },
         "MUSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Muslim Co-operative Bank"
         },
         "NCCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nabadwip Co-operative Credit Bank"
         },
         "NGRX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nagar Sahkari Bank"
         },
         "NVSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nagar Vikas Sahkari Bank"
         },
         "NSIX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nagrik Sahakari Bank Indore"
         },
         "NBMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nagrik Sahakari Bank, Vidisha"
         },
         "NTBL":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nainital Bank"
         },
         "TNMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nanded Merchants Co-operative Bank Nanded"
         },
         "NJSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nasik Jilha Mahila Sahakari Bank"
         },
         "NMCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nasik Merchants Co-operative Bank"
         },
         "NBBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"National Co-operative Bank Bangalore"
         },
         "NJCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nav Jeevan Co-operative Bank"
         },
         "NMCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Navi Mumbai Co-operative Bank"
         },
         "NAVX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Navnirman Co-operative Bank"
         },
         "NAWX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Nawanagar Co-operative Bank"
         },
         "TNKX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Neela Krishna Co-operative Urban Bank"
         },
         "NICB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"New India Co-operative Bank"
         },
         "OMCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ojhar Merchant's Co-operative Bank"
         },
         "ONSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Omkar Nagreeya Sahkari Bank"
         },
         "OSMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Osmanabad Janata Sahakari Bank"
         },
         "PALX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Pali Urban Co-operative Bank"
         },
         "PLUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Palus Sahakari Bank"
         },
         "PDUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Pandharpur Urban Co-operative Bank"
         },
         "PASX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Paschim Banga Gramin Bank"
         },
         "PCBL":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Patan Co-operativeeartive Bank"
         },
         "PTSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Patan Nagarik Sahakari Bank"
         },
         "PATX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Pathanmthitta District Co-operative Bank"
         },
         "PUBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Peoples Urban Co-operative Bank"
         },
         "PCUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Pochampally Co-operative Urban Bank"
         },
         "PMEC":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Prime Co-operative Bank"
         },
         "PCTX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Pune Cantonment Sahakari Bank"
         },
         "PPBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Pune People's Co-operative Bank"
         },
         "RECX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Railway Employees Co-operative Banking Society"
         },
         "RCUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Rajadhani Co-operative Urban Bank"
         },
         "RBBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Rajarambapu Sahakari Bank Peth"
         },
         "RACX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Rajkot Commercial Co-operative Bank"
         },
         "RAKX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Rajkot Peoples Co-operative Bank"
         },
         "RRSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Ramrajya Sahakari Bank"
         },
         "REBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Rendal Sahakari Bank Rendal"
         },
         "SKUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"S S L S A Kurundwad Urban Bank"
         },
         "SADX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sabarkantha District Central Co-operative Bank"
         },
         "SSKX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sadhana Sahakari Bank"
         },
         "SASA":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sahyadri Sahakari Bank"
         },
         "SPSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sandur Pattana Souharda Sahakari Bank Niyamitha"
         },
         "SISX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sanmati Sahakari Bank"
         },
         "SNGX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sarangpur Co-operative Bank"
         },
         "SNAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Saraspur Nagarik Co-operative Bank"
         },
         "SRCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Saraswat Co-operative Bank"
         },
         "SAVX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sardar Vallabhbhai Sahakari Bank"
         },
         "SACX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sarvodaya Co-operative Bank Mumbai"
         },
         "SNBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sarvodaya Nagrik Sahkari Bank"
         },
         "SDSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Satara District Central Co-operative Bank"
         },
         "TSUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Saurashtra Co-operative Bank"
         },
         "SVCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shamrao Vithal Co-operative Bank"
         },
         "SHCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shimla Urban Co-operative Bank"
         },
         "SPCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shirpur Peoples Co-operative Bank"
         },
         "SSBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shivdaulat Sahakari Bank"
         },
         "SBUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shree Balaji Urban Co-operative Bank"
         },
         "KDIX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shree Kadi Nagarik Sahakari Bank"
         },
         "SMNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shree Mahuva Nagrik Sahakari Bank"
         },
         "HPCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shree Parswanath Co-operative Bank"
         },
         "ADCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shri Adinath Co-operative Bank"
         },
         "SCNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shri Chhani Nagrik Sahkari Bank"
         },
         "SMUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shri Mahavir Urban Co-operative Bank"
         },
         "SEWX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shri Mahila Sewa Sahakari Bank"
         },
         "VCCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shri Veershaiv Co-operative Bank"
         },
         "SKCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Shrikrishna Co-operative Bank"
         },
         "SNDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sind Co-operative Urban Bank"
         },
         "SDCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sindhudurg  District Central Co-operative Bank"
         },
         "SIRX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sircilla Co-operative Urban Bank"
         },
         "SDHX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Solapur Siddheshwar Sahakari Bank"
         },
         "SONX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sonbhadra Nagar Sahkari Bank"
         },
         "SNCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sonepat Urban Co-operative Bank"
         },
         "SCUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sudha Co-operative Urban Bank"
         },
         "SDCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Surat District Co-operative Bank"
         },
         "SUMX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Surat Mercantile Co-operative Bank"
         },
         "SPCB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Surat People's Co-operative Bank"
         },
         "SUTB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Sutex Co-operative Bank"
         },
         "TJSB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Thane Janata Sahakari Bank"
         },
         "TUCL":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"The Union Co-operative Bank Mahinagar"
         },
         "TTUX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Tirur Urban Co-operative Bank"
         },
         "TCUB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Trivandrum Co-operative Urban Bank"
         },
         "TGMB":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Tumkur Grain Merchant's Co-operativeerate Bank"
         },
         "UCCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Udaipur Central Co-operative Bank"
         },
         "UMAX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Uma Co-operative Bank"
         },
         "UNSX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Unava Nagrik Sahakari Bank"
         },
         "TUNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Union Co-operative Bank"
         },
         "UBBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Urban Co-operative Bank Basti"
         },
         "UCDX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Urban Co-operative Bank Dehradun"
         },
         "UROX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Urban Co-operative Bank Rourkela"
         },
         "UBGX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Uttar Bihar Gramin Bank"
         },
         "VUCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Vaidyanath Urban Co-operative Bank"
         },
         "VVCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Vallabh Vidyanagar Commercial Bank"
         },
         "VERX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Veraval Mercantile Co-operative Bank"
         },
         "TVPX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Veraval Peoples Co-operative Bank"
         },
         "WKGX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Vidharbha Kokan Gramin Bank"
         },
         "VSBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Vidya Sahakari Bank"
         },
         "VSCX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Vikas Souharda Co-operative Bank"
         },
         "VIKX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Vikramaditya Nagrik Sahakari Bank"
         },
         "VCBX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Vishwas Co-operative Bank"
         },
         "WAIX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Wai Urban Co-operative Bank"
         },
         "YLNX":{
            "auth_types":[
               "aadhaar"
            ],
            "name":"Yadagiri Lakshmi Narsimha Swamy Co-operative Urban Bank "
         },
         "AUBL":{
            "auth_types":[
               "debitcard"
            ],
            "name":"AU Small Finance Bank"
         },
         "BKID":{
            "auth_types":[
               "debitcard"
            ],
            "name":"Bank of India"
         },
         "CNSX":{
            "auth_types":[
               "debitcard"
            ],
            "name":"Chembur Nagarik Sahakari Bank"
         },
         "SHIX":{
            "auth_types":[
               "debitcard"
            ],
            "name":"Shivalik Mercantile Co-operative Bank"
         }
      },
      "upi":true,
      "nach":true
   },
   "upi_intent":true
}
```
### Related Information

- [Integrate Recurring Payments Using UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/integrate.md)
- [Recurring Payments APIs for UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/recurring-payments/upi/apis.md)
