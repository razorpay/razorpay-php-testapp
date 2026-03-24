---
title: Accept UPI Payments with Razorpay
heading: About UPI
description: Accept payments by enabling various UPI apps at Razorpay Checkout. Check all the supported UPI integrations.
---

# About UPI

UPI checkout is a smooth payment experience for users as compared to other payment modes, thus provides higher transaction success rates for your business. 
 Razorpay supports multiple [third-party apps](https://www.npci.org.in/what-we-do/upi/3rd-party-apps) and has direct integration with [Google Pay.](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/upi/google-pay.md) 

Check the UPI payment flow and the various UPI integrations available with Razorpay.

@include payment-methods/upi-collect-deprecated/standard

## Special Onboarding Requirements for SEBI-Registered Intermediaries (MCC 6211)

If your business is classified under **Merchant Category Code 6211 (Securities Brokers/Dealers)** and is a **SEBI-registered intermediary** (including Stockbrokers, Mutual Funds, PMS providers and so on), you must adhere to a special regulatory mandate for UPI collection, effective **October 1, 2025**.

**UPI Identifier Requirements**

- Businesses must **use a standardised UPI identifier** as mandated by SEBI for all registered intermediaries.
- The identifier must incorporate the `@validbankpsp` handle. For example, `@validhdfc` or `@validicici`.
- This specific `@validbankpsp` handle can only be allocated by a **Self-Certified Syndicate Bank (SCSB)**.
- The allocation by the SCSB must follow a prescribed validation process.

    
### List of Self-Certified Syndicate Banks Eligible to Issue UPI IDs

        1. AU Small Finance Bank
        2. Axis Bank
        3. Bandhan Bank
        4. Bank of Baroda
        5. Bank of India
        6. Bank of Maharashtra
        7. Canara Bank
        8. Central Bank of India
        9. Citibank N.A
        10. City Union Bank
        11. DBS Bank India Limited
        12. DCB Bank
        13. Deustche Bank
        14. Dhanlaxmi Bank Limited
        15. Equitas Small Finance Bank
        16. GP Parsik Sahakari Bank Limited
        17. HDFC Bank Limited
        18. HSBC Bank
        19. ICICI Bank
        20. IDBI Bank Limited
        21. IDFC FIRST Bank
        22. Indian Bank
        23. Indian Overseas Bank
        24. IndusInd Bank
        25. Jana Small Finance Bank Limited
        26. Janata Sahakari Bank Limited
        27. Karnataka Bank Limited
        28. Karur Vysya Bank Limited
        29. Kotak Mahindra Bank
        30. Nutan Nagarik Sahakari Bank Limited
        31. Punjab & Sind Bank
        32. Punjab National Bank
        33. Rajkot Nagarik Sahakari Bank Limited
        34. RBL BANK
        35. Saraswat Co-operative Bank Limited
        36. South Indian Bank
        37. Standard Chartered Bank
        38. State Bank of India
        39. SVC Co-operative Bank Limited
        40. Tamilnad Mercantile Bank
        41. The Ahmedabad Mercantile Co-operative Bank Limited
        42. The Catholic Syrian Bank Limited
        43. The Federal Bank Limited
        44. The Jammu & Kashmir Bank Ltd
        45. The Kalupur Commercial Co-operative Bank Limited
        46. The Mehsana Urban Co-operative Bank Limited
        47. The Surat People's Co-op Bank Limited
        48. TJSB Sahakari Bank Limited
        49. UCO Bank
        50. Union Bank of India
        51. Utkarsh Small Finance Bank Limited
        52. Yes Bank
        

### Get Standardised UPI Address

Follow the steps to successfully create your new UPI id.

    
### Step 1: Request Your `@valid` UPI ID (Mandatory Action on SI Portal)

        The standard Razorpay terminal request is **not supported**. All `@valid` UPI IDs must be requested and approved through the **SEBI Intermediary Portal (SI Portal)**.

        1. Log in to the [SEBI Intermediary Portal](https://siportal.sebi.gov.in/intermediary/index.html) using your credentials.
        2. From the dropdown menu, navigate to: **Entity Category → @valid UPI ID Request → UPI Request Portal**.
        3. Click **Request New UPI IDs** or **View All Requests**.
        4. Click **Add new UPI ID**.

        Please determine your settlement model and bank account as a next step, before you continue to fill the form.
        

    
### Step 2: Determine Your Settlement Model and Bank Account

        Your VPA creation and required bank accounts depend on how the funds are settled. You must create separate VPAs for **One-Time** and **Autopay** transactions, using **RZP1** and **RZP2** respectively.

        
            
                Model I: Settlement to the Intermediary (Broking, AMC, PMS)
                
                Funds settle directly into your entity's bank account.

                **Requirement**: You must use your own bank account that resides within the chosen PSP Bank. If you choose `@validhdfc`, you must use an **HDFC Bank account**. If you do not have an account, you must open one.

                **VPA Format Examples**:

                - **One-Time**: `mfhouse.rzp1.mf@validhdfc`
                - **Autopay**: `mfhouse.rzp2.mf@validhdfc`
                

            
### Model II: Settlement to the Clearing Corporation (Broking for Mutual Funds/Bonds)

                Funds settle into the bank account of a Clearing Corporation (**ICCL / NCL**).

                **Requirement**: You must use the specific Bank Account Number and IFSC provided by Razorpay that corresponds to the respective Clearing Corporation (ICCL or NCL) and PSP Bank (**ICICI/Axis/HDFC**).

                **VPA Format Examples**:

                - **MF Broker (ICCL)**: `mfbroker.icclrzp1.brk@validhdfc`
                - **Bond Broker (NCL)**: `bondsbroker.nsecbricsrzp1.brk@validhdfc`
                

        
        
    
    
### Step 3: Fill Form to Request Your `@valid` UPI ID on SI Portal 

        5. Under **Entity Information**, enter the following details:
            - Entity Name
            - Registration Number
            - PAN
            - Category Code
        6. Under **Legal Account Holder Name**, enter the following details:
            - Legal Account Holder Name
            - Legal Account Holder PAN
            - Set up different legal account holder based on your model:

            
                
                    For Model I users:
                    
                    If the funds are intended to settle directly into your own SEBI-registered entity's bank account (applicable for most Brokers, AMCs and PMS providers):

                    1. Set **Different Legal Account Holder?** to **No**. The system will automatically use your **Entity's Name** as the Legal Account Holder.
                    2. Proceed to enter your entity's bank account details (which must be with the chosen PSP Bank).
                    

                
### For Model II users:

                    If the funds are intended to settle into the bank account of a Clearing Corporation (applicable for intermediaries facilitating transactions settled via an exchange, such as Broking for Mutual Funds or Bonds):

                    3. Set **Different Legal Account Holder?** to **Yes**.
                    4. Select **Clearing Corporation**, under **Legal Account Holder Role***.
                    5. Select **NSE Clearing Limited** or **Indian Clearing Corporation Limited** (as applicable), under **Legal Account Holder Name***.
                    

            

        7. To use a registered Trade Name, set **Use Trade Name as Username:** to **Yes** and provide the **Trademark Registration Number**.

            The default username is based on your **Legal Entity Name**.

        8. Under the **UPI Handle Request** section, fill up the below **Beneficiary Information**:
            - Account Number
            - IFSC Code
            - Select the "**I confirm that Account Number: `123456789101112` and IFSC: `BANK123456` belongs to Gaurav (PAN: `ABCD123456`)**" checkbox.

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             This account must correspond to the chosen **PSP Bank (Model I)** or the respective **Clearing Corporation (Model II)**.
>             

        9. Enter a **Username**. The system auto-generates a unique UPI Username based on your entity information.
            
            If the default name is not descriptive enough, click **Generate Longer** to add more words from your Entity Name. Click **Reset** to revert to the original system-generated name.

        10. Add an **Optional Parameter**. Click **Enable** to add this field. This parameter is **mandatory** to ensure the VPA can be successfully mapped to your Razorpay account.

            The primary purpose of this identifier is to allow you to create multiple unique VPAs using the same base username and PSP handle.

            - **First VPA Request**: Use `RZP1`
            - **Second VPA Request**: Use `RZP2`
            - **Subsequent VPAs**: Use sequential identifiers as needed (for example, `RZP3`, `RZP4` and so on).

            Each UPI id you request must have a unique optional parameter for sequencing.

            **Example VPA Structure**: `[yourname].rzp1.[suffix]@valid[bank]`

        11. The **Payment Service Provider (PSP)** section determines which bank's `@valid` handle will be used in your UPI id (for example, `@validhdfc`).
            
            - The system automatically selects the bank that holds the **Beneficiary Bank Account** you provided (based on the IFSC). The dropdown will then only display the corresponding `@valid` handles from that bank.
            - To use a PSP different from your bank account's bank, set **Do you wish to use beneficiary's bank as PSP?** option to **No**. 
            - Then, select the desired **Bank Name** from the new options and choose the suitable `@valid` **UPI Handle**.

            
> **INFO**
>
> 
>             **Handy Tips**
> 
>             If your preferred PSP is not listed, you must check with your bank as this indicates a configuration issue or restriction.
>             

            
        12. Click **Add Record**. A record of your UPI handle request will be created.
        13. To submit your UPI handle request, go to **View All Requests** → click **Submit UPI Handle Request**.

        Once submitted, the request goes to the selected **Self-Certified Syndicate Bank (PSP)** for due diligence and document verification before approving the UPI id on the SI Portal.

        
    
    
### Step 4: Final Submission to Razorpay for Mapping

        After the bank confirms the UPI id allocation, you must share the final, approved VPA details with the [Razorpay support team](https://razorpay.com/support/) to link it to your Payment Gateway MIDs.

        14. **Share the approved VPA(s)**, corresponding Bank Account, IFSC, Account Holder Name and the Razorpay Merchant IDs (MIDs) that need to be mapped.
        15. **Submit bank-specific documents** (as part of the bank's due diligence):

            
            **PSP Bank** | **Required Documentation**
            --- 
            **Axis Bank** | Only the VPA details are required. Razorpay will reach out if the bank needs additional documentation.
            ---
            **HDFC Bank** | **Mandatory:** You must provide a screenshot of the SEBI Portal landing page, clearly displaying the approved Bank A/c, IFSC, UPI ID and UTN No.
            ---
            **ICICI Bank** | You are required to complete and share the following directly with ICICI Bank: - Parent MID Sheet
 - UPI Merchant Onboarding Form
 - Corporate API Suite (CAS)
 - Technical Details to Include in Forms: Port, IP, URL 
 You are required to complete and share the **Parent MID Sheet** and the **UPI Merchant Onboarding Form** directly with ICICI Bank.
            
        
        16. **Wait for Review:** Our Operations Team will manually review your request, validate your SEBI registration and coordinate with the necessary banking partners for handle allocation. 
        
        This manual process typically takes **5 to 7 business days** to complete.
        

## UPI Payment Flow

Given below is the payment flow for UPI:

![Payment Flow for UPI](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/payment-flow-upi_collect.jpg.md)

@include payment-methods/supported-upi-apps

> **INFO**
>
> 
> **Third Party Validation**
> 
> If your business model requires the customers to make transactions **only** from the bank account that was submitted to your business at the time of registration then know more about [Third-Party Validation](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation.md). Check the [list of banks that support TPV](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/third-party-validation/bank-list.md).
> 

### Related Information

- [UPI Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/payments/upi.md)
- [UPI Transaction Limits](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/transaction-limits/upi.md)
