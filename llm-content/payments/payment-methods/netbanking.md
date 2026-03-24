---
title: Netbanking
description: List of banks supported on Razorpay Payment Gateway for Netbanking payments.
---

# Netbanking

You can accept payments from your customers using Netbanking. The customers enter their Netbanking credentials to make payments. This method is available by default. No additional integration or permissions are needed to enable this method at your application Checkout.

## Netbanking Payment Flow

The diagram given below represents the payment flow for netbanking:

![Payment Flow for Netbanking](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-flow-netbanking.jpg.md)

To pay using the Netbanking payment method, customers:

1. Select **Netbanking** as the payment method on the checkout page and choose their bank from the list of supported banks.
2. Are redirected to their bank's secure login page.
3. Enter their **Netbanking credentials (User ID and Password)** to authenticate.
4. Review the payment details and authorise the transaction.

  ![Payment Flow for Netbanking](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/NB_Payment_Flow.gif.md)

After successful payment, customers are redirected back to your website or app with the payment confirmation.

    
### Supported Platforms and Availability

         
         **Supported Platforms** | **Availability**
          ---
            - Web
- Mobile web
- Android
- iOS
 | Available by default. No additional integration or permissions needed.
        
        

## Supported Banks

  
### List of supported banks:

     
     
> **WARN**
>
> 
>      **Watch Out!**
>      
>      Allahabad Bank netbanking is merged with Indian Bank, and both the bank codes are supported.
>      

     
     

      Sl. No. | Bank Code | Bank Name
      ---
      1 | AIRP | Airtel Payments Bank
      ---
      2 | ALLA | Allahabad Bank
      ---
      3 | AUBL | AU Small Finance Bank
      ---
      4 | BARB_R | Bank of Baroda - Retail Banking
      ---
      5 | BBKM | Bank of Bahrain and Kuwait
      ---
      6 | BDBL | Bandhan Bank
      ---
      7 | BKDN | Dena Bank
      ---
      8 | BKID | Bank of India - Retail Banking
      ---
      9 | CBIN | Central Bank of India
      ---
      10 | CIUB | City Union Bank
      ---
      11 | CNRB | Canara Bank
      ---
      12 | CORP | Corporation Bank
      ---
      13 | COSB | Cosmos Co-operative Bank
      ---
      14 | CSBK | Catholic Syrian Bank
      ---
      15 | DBSS | Development Bank of Singapore
      ---
      16 | DCBL | DCB Bank
      ---
      17 | DEUT | Deutsche Bank
      ---
      18 | DLXB | Dhanlaxmi Bank
      ---
      19 | ESAF | ESAF Small Finance Bank
      ---
      20 | ESFB | Equitas Small Finance Bank
      ---
      21 | FDRL | Federal Bank
      ---
      22 | HDFC | HDFC Bank
      ---
      23 | HSBC | HSBC
      ---
      24 | IBKL | IDBI
      ---
      25 | ICIC | ICICI Bank
      ---
      26 | IDFB | IDFC FIRST Bank
      ---
      27 | IDIB | Indian Bank
      ---
      28 | INDB | Indusind Bank
      ---
      29 | IOBA | Indian Overseas Bank
      ---
      30 | JAKA | Jammu and Kashmir Bank
      ---
      31 | JSBP | Janata Sahakari Bank (Pune)
      ---
      32 | JSFB | Jana Small Finance Bank
      ---
      33 | KARB | Karnataka Bank
      ---
      34 | KCCB | The Kalupur Commercial Co-Operative Bank
      ---
      35 | KJSB | Kalyan Janata Sahakari Bank
      ---
      36 | KKBK | Kotak Mahindra Bank
      ---
      37 | KVBL | Karur Vysya Bank
      ---
      38 | LAVB_R | Lakshmi Vilas Bank - Retail Banking
      ---
      39 | MAHB | Bank of Maharashtra
      ---
      40 | MSNU | Mehsana Urban Bank
      ---
      41 | NESF | North East Small Finance Bank
      ---
      42 | NKGS | NKGSB Co-operative Bank
      ---
      43 | NSPB | NSDL Payments Bank
      ---
      44 | ORBC | Oriental Bank of Commerce
      ---
      45 | PMCB | Punjab & Maharashtra Co-operative Bank
      ---
      46 | PSIB | Punjab & Sind Bank
      ---
      47 | PUNB_R | Punjab National Bank - Retail Banking
      ---
      48 | RATN | RBL Bank
      ---
      49 | SRCB | Saraswat Co-operative Bank
      ---
      50 | SBBJ | State Bank of Bikaner and Jaipur
      ---
      51 | SBHY | State Bank of Hyderabad
      ---
      52 | SBIN | State Bank of India
      ---
      53 | SBMY | State Bank of Mysore
      ---
      54 | SBTR | State Bank of Travancore
      ---
      55 | SCBL | Standard Chartered Bank
      ---
      56 | SIBL | South Indian Bank
      ---
      57 | STBP | State Bank of Patiala
      ---
      58 | SURY | Suryoday Small Finance Bank
      ---
      59 | SVCB | Shamrao Vithal Co-operative Bank
      ---
      60 | SYNB | Syndicate Bank
      ---
      61 | TJSB | Thane Janata Sahakari Bank
      ---
      62 | TMBL | Tamilnadu Mercantile Bank
      ---
      63 | TNSC | Tamilnadu State Apex Co-operative Bank
      ---
      64 | UBIN | Union Bank of India
      ---
      65 | UCBA | UCO Bank
      ---
      66 | UTBI | United Bank of India
      ---
      67 | UTIB | Axis Bank
      ---
      68 | VARA | Varachha Co-operative Bank Limited
      ---
      69 | YESB | Yes Bank
      
    

## Fetch Supported Methods

Use the below endpoint to fetch a list of banks Razorpay supports for netbanking payments:

/methods

> **WARN**
>
> 
> **Watch Out!**
> 
> To fire this API, provide your [KEY_ID] for authorization. Your `` is **NOT** required and should **NOT** be passed.
> 

```curl: Request
curl -u [YOUR_KEY_ID] \
    -X GET https://api.razorpay.com/v1/methods
```json: Response
{
  "entity": "methods",
  ...
  ...
  ...
  "netbanking": {
    "AUBL": "AU Small Finance Bank",
    "AIRP": "Airtel Payments Bank",
    "ALLA": "Allahabad Bank",
    "ANDB": "Andhra Bank",
    "ANDB_C": "Andhra Bank - Corporate Banking",
    "UTIB": "Axis Bank",
    "BDBL": "Bandhan Bank",
    "BBKM": "Bank of Bahrein and Kuwait",
    "BARB_R": "Bank of Baroda - Retail Banking",
    "BKID": "Bank of India",
    "MAHB": "Bank of Maharashtra",
    "BACB": "Bassein Catholic Co-operative Bank",
    "CNRB": "Canara Bank",
    "CSBK": "Catholic Syrian Bank",
    "CBIN": "Central Bank of India",
    "CIUB": "City Union Bank",
    "COSB": "Cosmos Co-operative Bank",
    "DCBL": "DCB Bank",
    "BKDN": "Dena Bank",
    "DEUT": "Deutsche Bank",
    "DBSS": "Development Bank of Singapore",
    "DLXB": "Dhanlaxmi Bank",
    "DLXB_C": "Dhanlaxmi Bank - Corporate Banking",
    "ESAF": "ESAF Small Finance Bank",
    "ESFB": "Equitas Small Finance Bank",
    "FDRL": "Federal Bank",
    "FSFB": "Fincare Small Finance Bank",
    "HDFC": "HDFC Bank",
    "ICIC": "ICICI Bank",
    "IBKL": "IDBI",
    "IBKL_C": "IDBI - Corporate Banking",
    "IDFB": "IDFC FIRST Bank",
    "IDIB": "Indian Bank",
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
    "NESF": "North East Small Finance Bank",
    "ORBC": "PNB (Erstwhile-Oriental Bank of Commerce)",
    "UTBI": "PNB (Erstwhile-United Bank of India)",
    "PSIB": "Punjab & Sind Bank",
    "PUNB_R": "Punjab National Bank - Retail Banking",
    "RATN": "RBL Bank",
    "RATN_C": "RBL Bank - Corporate Banking",
    "SRCB": "Saraswat Co-operative Bank",
    "SVCB_C": "Shamrao Vithal Bank - Corporate Banking",
    "SVCB": "Shamrao Vithal Co-operative Bank",
    "SIBL": "South Indian Bank",
    "SCBL": "Standard Chartered Bank",
    "SBBJ": "State Bank of Bikaner and Jaipur",
    "SBHY": "State Bank of Hyderabad",
    "SBIN": "State Bank of India",
    "SBMY": "State Bank of Mysore",
    "STBP": "State Bank of Patiala",
    "SBTR": "State Bank of Travancore",
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
  ...
  ...
  ...
}
```

## Third-Party Validation (TPV)

Use Third-Party Validation if your business model requires customers to register a bank account and use the registered account to make payments.

- [Third-Party Validation document](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation.md)
- [List of banks that support TPV](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/bank-list.md)
