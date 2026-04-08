---
title: Smart Collect APIs
description: List of Smart Collect 2.0, Smart Collect and Smart Collect with TPV APIs. Check the API integration checklist.
---

# Smart Collect APIs

Use Razorpay Smart Collect to create Customer Identifiers and accept large payments from your customers in the form of bank transfers via NEFT, RTGS and IMPS. Customer Identifiers are similar to bank accounts wherein customers can transfer payments. You can create, retrieve and close Customer Identifiers using the Smart Collect APIs.

> **INFO**
>
> 
> **Smart Collect 2.0**
> 
> Use [Smart Collect 2.0 ](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)to collect payments using UPI and other banking modes.
> 

## Smart Collect 2.0 APIs

Use Smart Collect 2.0 APIs to create and manage Customer Identifiers of the type `VPA (UPI)`. You can use the Smart Collect APIs to manage Customer Identifiers of the type `Bank Account`.

    
### List of Smart Collect 2.0 APIs

         Refer to the list of Smart Collect 2.0 APIs to create and manage Customer Identifiers of the type `VPA (UPI)`. 

         
            API | Description
            ---
            [Create a Customer Identifier With VPA Receiver](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2/create-cust-id-vpa.md) | API to create a Customer Identifier with VPA receiver.
            ---
            [Create a Customer Identifier With VPA and Bank Account Receivers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2/create-cust-id-bank-account-vpa.md) | API to create a Customer Identifier with VPA and bank account receivers.
            ---
            [Fetch Payments Using UPI](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2/fetch-payments-upi.md) | API to retrieve details of a UPI payment using the Payment id.
            ---
            [Add Receiver to an Existing Customer Identifier With VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2/add-receiver-vpa.md) | API to add receiver to an existing Customer Identifier. 
            ---
            [Add Receiver to an Existing Customer Identifier With Bank Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2/add-receiver-bank-transfer.md) | API to add receiver to an existing Customer Identifier. 
            
        

    
### List of Smart Collect 2.0 API for TPV

         Refer to the list of Smart Collect 2.0 APIs to create and manage Customer Identifiers of the type `VPA (UPI)`with TPV.
         
         
            API | Description
            ---
            [Add VPA Receiver to an Existing Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2/tpv-add-receiver-vpa.md) | API to add receiver to an existing Customer Identifier. 
            ---
            [Add Bank Account Receiver to an Existing Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-2/tpv-add-receiver-bank-transfer.md) | API to add receiver to an existing Customer Identifier. 
            ---
            
        

## Smart Collect APIs

    
### List of Smart Collect APIs

         
            API | Description
            ---
            [Create Customer Identifier With Bank Account Receiver](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/create-cust-id-bank-account.md) | API to create a Customer Identifier with bank account receiver.
            ---
            [Fetch a Customer Identifier With ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/fetch-with-id.md) | API to Fetch a Customer Identifier by ID.
            ---
            [Fetch all Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/fetch-all.md) | API to fetch all Customer Identifiers.
            ---
            [Fetch Payments for a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/fetch-payments-cust-id.md)| API to fetch payments made against a particular Customer Identifier.
            ---
            [Fetch Payment Details using ID and Transfer Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/fetch-payments-bank-transfer.md) | API to retrieve details of a payment using the Payment ID and transfer method.
            ---
            [Fetch Payments Using Bank Transfer via UTR](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/fetch-payments-bank-transfer-utr.md) | API to retrieve details of a payment using bank transfer method via UTR.
            ---
            [Update a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/update.md) | API to update a Customer Identifier.
            ---
            [Close a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect/close.md) | API to close a Customer Identifier.
            
        

    
### API-wise Integration Checklist for Smart Collect

         
            
            - Use [Create a Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#create-a-customer) if a Customer Identifier/UPI ID will be mapped to a unique customer.
            - You can use the **fail_existing** (set to `"1"`) API parameter to create a customer. This helps you avoid `customer_id` being created multiple times for the same customer and will help in your reconciliation process.
            - We request you to create a single `customer_id` rather than making multiple IDs for the same customer. If their details change, you can use the [Edit Customer Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#edit-customer-details) API. Duplicate validation is done based on the combination of email ID and phone number.
            
            
            - UPI Customer Identifiers are supported only in Live mode.
            - The combination of merchant prefix and descriptor must be 20 characters. The length of the merchant prefix can vary between 4-10 characters and the length of the descriptor from 10-16 characters.
            - Payments made to the Customer Identifiers must be within the [transaction limits](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/transaction-limits.md).
            - We recommend that you use [Fetch APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md#fetch-a-virtual-account-by-id) to make a GET call for any downstream dependencies. Webhooks are just a recommended layer on top of this.
            - We recommend you [Close the Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect.md#close-a-customer-identifier) once the payment is received.
            
            
        

    
### List of APIs for Smart Collect TPV

         To know more about Third Party Validation (TPV), click [here](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/third-party-validation.md).
            
            API | Description
            ---
            [Create Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv/create.md) | API to create a Customer Identifier.
            ---
            [Add an Allowed Payer Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv/add-allowed-payer.md) | API to add allowed payers account details to a Customer Identifier.
            ---
            [Fetch a Customer Identifier by ID](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv/fetch-with-id.md) | API to Fetch a Customer Identifier by ID.
            ---
            [Fetch all Customer Identifiers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv/fetch-all.md) | API to fetch all Customer Identifiers.
            ---
            [Fetch Payments for a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv/fetch-payments.md)| API to fetch payments made against a particular Customer Identifier.
            ---
            [Fetch Payment Details using ID and Transfer Method](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv/fetch-payment-id-transfer.md) | API to retrieve details of a payment using the Payment ID and transfer method.
            ---
            [Delete an Allowed Payer Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv/delete-allowed-payer.md) | API to delete allowed payers account details added to a Customer Identifier.
            ---
            [Close a Customer Identifier](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv.md#close-a-virtual-account) | API to close a Customer Identifier.
            
        

    
### API-wise Integration Checklist for Smart Collect TPV

         
            
            - Use [Create a Customer API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#create-a-customer) if a Customer Identifier is mapped to a unique customer.
            - You can use the **fail_existing** (set to `"1"`) API parameter to create a customer. This helps you avoid `customer_id` being created multiple times for the same customer and will help in your reconciliation process.
            - We request you to create a single `customer_id` rather than making multiple IDs for the same customer. If their details change, you can use the [Edit Customer Details](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/customers.md#edit-customer-details) API. Duplicate validation is done based on the combination of email ID and phone number.
            
            
            - Smart Collect with TPV is supported only for Netbanking.
            - The combination of merchant prefix and descriptor must be 20 characters. The length of the merchant prefix can vary between 4-10 characters and the length of the descriptor from 10-16 characters.
            - Avoid ambiguous account numbers. Consider the following:
                - When displaying a bank account number to a customer, the font may cause the customer to misread the alphanumeric characters (if any) in the number. Customers can commit typos while entering the beneficiary account number. Misreading the letter `O` in an account number as the numeral `0`, for example, is extremely common.
                - Payments made to such mistyped accounts are considered invalid. They are refunded to the customer's account within 1 working day. However, this is still a massive inconvenience for the customer, who now has to wait 24 hours to receive a refund for what is often a rather large payment.
                - We strongly advise against using the following characters in your descriptor for alphanumeric accounts, as they may appear ambiguous in specific fonts.
                    - `0` or `O`
                    - `1` or `I`
                    - `5` or `S`
                    - `8` or `B`
                    - `2` or `Z`
            - You can add up to 10 allowed payers while creating the Customer Identifier.
            - The allowed payer can be deleted or added later using the [Add an Allowed Payer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv.md#add-an-allowed-payer-account) and the [Delete an Allowed Payer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/smart-collect-tpv.md#delete-an-allowed-payer-account) APIs.
            
        
        

    
### List of Banks Supporting TPV for Smart Collect

         Given below is the list of banks supporting TPV for Smart Collect. 
         
         
Bank Name | Bank Code
---
A. P Mahesh Bank | APMC
---
Abhyudaya Co-op Bank | ABHY
---
Adarsh Cooperative Bank Ltd | ACBX
---
Ahmedabad Mercanatile Co-op Bank | AMCB
---
Airtel Payments Bank | AIRP
---
Allahabad Bank | ALLA
---
Andhra Bank | ANDB
---
Andhra Pragathi Grameena Bank | APGB
---
Andhra Pragathi Grameena Vikas Bank | APGV
---
Apna Sahakari Bank | ASBL
---
Assam Gramin Vikash Bank | AGVX
---
Associate Co-operative Bank Limited,Surat | ASOX
---
AU Small Finance Bank | AUBL
---
Axis Bank | UTIB
---
Banaskantha Mercantile Co-operative Bank Limited | BMPX
---
Bandhan Bank | BDBL
---
Bank of America | BOFA
---
Bank Of Baroda | BARB
---
Bank Of India | BKID
---
Bank of Maharashtra | MAHB
---
Baroda Central Co-operative Bank | BRDX
---
Baroda Gujarat Gramin Bank | BGGX
---
Baroda Rajasthan Khetriya Gramin Bank | BRGX
---
Baroda Uttar Pradesh Gramin Bank | BUGX
---
Bassein Catholic Coop Bank | BACB
---
Bhagini Nivedita Sahakari Bank Ltd,Pune | BNSB
---
Bharat Co-operative Bank | BCBM
---
Bhilwara Urban Co-operative Bank Ltd | BHUX
---
Canara Bank | CNRB
---
Capital Small Finance Bank | CLBL
---
Catholic Syrian Bank | CSBK
---
Central Bank of india | CBIN
---
Chaitanya Godavari Grameena Bank | CGGX
---
Chartered Sahakari Bank Niyamitha | CSBX
---
Chhattisgarh Rajya Gramin Bank | CGBX
---
Citibank Retail | CITI
---
Citizen Co-operative Bank Ltd - Noida | CCBX
---
Citizens Co-operative Bank Ltd. | CTBX
---
City Union Bank | CIUB
---
Costal Local Area Bank Ltd | COAS
---
Dakshin Bihar Gramin Bank | MBGX
---
DBS Digi Bank | DBSS
---
DCB Bank | DCBL
---
Dena Bank | BKDN
---
Dena Gujarat Gramin Bank | DEGX
---
Deutsche Bank AG | DEUT
---
Dhanalaxmi bank | DLXB
---
Dombivli Nagrik Sahakari Bank | DNSB
---
Equitas Small Finance Bank | ESFB
---
ESAF Small Finance Bank | ESAF,ESMF
---
Federal Bank | FDRL
---
Fincare Small Finance Bank | FSFB
---
Fingrowth Co-operative Bank Ltd | FGCB
---
FINO Payments Bank | FINO
---
G P Parsik Bank | PJSB
---
HDFC | HDFC
---
Himachal Pradesh Gramin Bank | HMBX
---
HSBC | HSBC
---
Hutatma Sahakari Bank Ltd | HUTX
---
ICICI Bank | ICIC
---
IDBI Bank | IBKL
---
IDFC | IDFB
---
India Post Payment Bank | IPOS
---
Indian Bank | IDIB
---
Indian Overseas Bank | IOBA
---
Indore Paraspar Sahakari Bank Ltd | IPSX
---
IndusInd Bank | INDB
---
J & K Grameen Bank | JAKA
---
Jalgaona Janata Sahkari Bank | JJSB
---
Jalna Merchant's Co-operative Bank Ltd. | JMCX
---
Jammu & Kashmir Bank | JAKA
---
Jana Small Finance Bank | JSFB
---
Janakalyan Sahakari Bank | JSBL
---
Janaseva Sahakari Bank Ltd Pune | JANA,JASB
---
Janta Sahakari Bank Pune | JSBP
---
Jio Payments Bank | JIOP
---
Jivan Commercial co-operative Bank Ltd. | JVCX
---
Kallappanna Awade Ichalkaranji Janata Sahakari Bank Ltd. | KAIJ
---
Kalupur Commercial Co-operative Bank | KCCB
---
Karnataka Bank | KARB
---
Karnataka vikas Gramin Bank | KVGB
---
Karur Vysaya Bank | KVBL
---
Kashi Gomti Samyut Gramin Bank | KGSX
---
Kerala Gramin Bank | KLGB
---
Kokan Merchantile Co-Operative Bank Ltd | KMCB
---
Kolhapur District Central Co-operative Bank Limited | KPCX
---
Kotak Mahindra Bank | KKBK
---
Krishna Bhima Samruddhi Local Area Bank | KBSX
---
Maharashtra Grameen Bank | MAHG
---
Maharashtra state co opp Bank | MSCI
---
Malad Sahakari Bank | MSBL
---
Malviya Urban Co-operative Bank Limited | MALX
---
Manipur Rural Bank | MRBX
---
Manvi Pattana Souharda Sahakari Bank | MVIX
---
Maratha Cooprative Bank Ltd | MRTX
---
Meghalaya Rural Bank | MERX
---
Mizoram Rural Bank | MZRX
---
Model Co-operative Bank Limited | MDBK
---
Nagarik Sahakari Bank Maryadit, Vidisha | NBMX
---
Nanital Bank Ltd | NTBL
---
NKGSB | NKGS
---
NSDL Payments Bank | NSPB
---
Nutan Nagrik Sahakari Bank | NNSB
---
Pali Urban Co-operative Bank Ltd. | PALX
---
Paschim Banga Gramin Bank | PASX
---
Patan Nagrik Sahakari Bank Ltd | PTSX
---
Paytm Payments Bank | PYTM
---
Pragathi Krishna Gramin Bank | PGBX
---
Prathama Bank | PRTH
---
Prime Co-operative Bank Ltd. | PMEC
---
Priyadarshini Nagari Sahakari Bank Ltd. | PDSX
---
Pune Cantonment Sahakari Bank Ltd | PCTX
---
Punjab and Maharastra Co. bank | PMCB
---
Punjab and Sind Bank | PSIB
---
Punjab Gramin Bank | PUGX
---
Punjab National Bank | PUNB
---
Purvanchal Bank | NA
---
Rajasthan Marudhara Gramin Bank | RMGB
---
Rajkot Nagari Sahakari Bank Ltd | RNSB
---
Rani Channamma Mahila Sahakari Bank Belagavi | ZRNB
---
Samarth Sahakari Bank Limited | SBLS
---
Samruddhi Co-op bank ltd | SCOB
---
Sandue Pattana Souharda Sahakari Bank | SPSX
---
Sarva Haryana Gramin Bank | HGBX
---
Sarva UP Gramin Bank | SUBX
---
Sarvodaya Commercial Co-operative Bank | SVCX
---
Saurashtra Gramin Bank | SAGX
---
SBM BANK (INDIA) LIMITED | STCB
---
Shree Dharati Co-operative Bank Ltd. | SRHX
---
Shree Kadi Nagarik Sahakari Bank Ltd | KDIX
---
Shri Arihant Co-operative Bank Ltd. | SACB
---
Shri Basaveshwar Sahakari Bank Niyamit, Bagalkot | BASX
---
Shri Chhatrapathi Rajarsshi Shahu Bank | CRUB
---
Shri Mahila Sewa Sahakari Bank Limited | SEWX
---
Shri Rajkot District Co-operative Bank Ltd | RJTX
---
Shri Veershaiv Co-op Bank Ltd. | VCCX
---
Sindhudurg Co-operative Bank | SIDC
---
Smriti Nagrik Sahakari Bank Maryadit, Mandsaur | SNSX
---
South Indian Bank | SIBL
---
Sri Rama Co-operative Bank Ltd | NA
---
Sri Vasavamba Cooperative Bank Ltd | SVAX
---
Standard Chartered | SCBL
---
State Bank Of India | SBIN
---
Sterling Urban Co-operative Bank Ltd | STRX
---
Suco Souharda Sahakari bank | SSDX
---
Surat People Cooperative Bank | SPCB
---
Suryoday Small Finance Bank Ltd | SURY
---
Sutex Co operative Bank | SUTB
---
Suvarnayug Sahakari Bank Ltd | SUVX
---
SVC Co-operative Bank | SVCB
---
Syndicate Bank | SYNB
---
Tamilnad Mercantile Bank | TMBL
---
Telangana Gramin Bank | DGBX
---
Telangana State Co Operative Apex Bank | TSAB
---
Thane Bharat Sahakari Bank | TBSB
---
The Adarsh Urban Co-op. Bank Ltd., Hyderabad | ACUX
---
The Ahmedabad District Coop bank | ADBX
---
The Ahmednagar Merchants Co-operative Bank | AMDN
---
The Anand Mercantile Co-Op. Bank Ltd. | TAMX
---
The Andhra Pradesh state cooperative | APBL
---
The Banaskantha District Central Co-Op. Bank Ltd. | BKDX
---
The Baramati Sahakari Bank Ltd. | BARA
---
The Cosmos Co-Operative Bank LTD | COSB
---
The Darussalam Co-operative Urban Bank Ltd. | DCUX
---
The Gadchiroli District Central Co-operative Bank | GDCB
---
The Gayatri Co-operative Urban Bank Ltd. | GCUX
---
The Gujarat State Co-operative Bank Limited | GSCB
---
The Hasti Co-operative Bank Ltd | HCBL
---
The Himachal Pradesh State Co-operative Bank Ltd | HPSC,HPSC
---
The Kaira District Central Co-Op. Bank Ltd. | KARX
---
The Kalyan Janta Sahkari Bank | KJSB
---
The Kanakmahalakshmi Co-operative Bank Ltd | IBKL
---
The Lakshmi Vilas Bank Limited | LAVB_R
---
The Mahanagar Co-Op. Bank Ltd | MCBL
---
The Mehsana Urban Co-Operative Bank | MSNU
---
The Merchants Souharda Sahakari Bank Ltd | MSSX
---
The Modasa Nagarik Sahakari Bank Limited | TMSX
---
The Municipal Co-op Bank | MUBL
---
The Muslim Co-operative Bank Ltd. | MSLM
---
The Pochampally Co-operative Urban bank Ltd | PCUX
---
The Ratnakar Bank Limited | RATN
---
The Sabarkantha district Central Coop Bank Ltd | SADX
---
The Saraswat Co-Operative Bank | SRCB
---
The Satara Distric Central Co-operative Bank Ltd. | SDCE
---
The SSK Co-operative Bank | NA
---
The Surat District Co-op Bank Ltd. | SDCB
---
The Thane Janta Sahakari Bank Ltd(TJSB) | TJSB
---
The Udaipur Mahila Samridhi Urban Co-operative Bank Ltd. | UMSX
---
The Udaipur Mahila Urban Co-op Bank Ltd | TUMX
---
The Udaipur Urban Co-operative Bank ltd. | UUCX,UUCB
---
The Urban Cooperative Bank Ltd Dharangaon | TUDX
---
The Vallabh Vidyanagar Commercial Co-operative Bank Ltd | VVCX
---
The Varachha Co-op Bank Ltd. | VARA
---
The Vijay Co-operative Bank Ltd, Ahmedabad | VCOB
---
The Visakhapatnam Co-operative Bank Ltd. | VISX
---
The Vishweshwar Sahakari Bank Ltd | VSBL
---
Tripura Gramin Bank | TGBX
---
UCO Bank | UCBA
---
Ujjivan Small Finance Bank Limited (Web Collect) | UJVN
---
Union Bank of India | UBIN
---
Uttarakhand Gramin Bank | UTGX
---
Vananchal Gramin Bank | VGBX
---
Vasai Vikas Co-op Bank Ltd | VVSB
---
Vijaya Bank | VIJB
---
Vikas Souharda Co-operative Bank Ltd. | VSCX
---
Yadagiri Lakshmi Narasimha Swamy Co-Op Urban Bank Ltd | YLNX
---
Yes Bank | YESB

        

### Related Information
- [Smart Collect](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect.md)
- [How Smart Collect Works](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/smart-collect/how-it-works.md)
