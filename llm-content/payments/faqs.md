---
title: Payments | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to some Frequently Asked Questions (FAQs) about Razorpay.
---

# Frequently Asked Questions (FAQs)

## Master KYC & Account Verification

  
### 1. What is Central KYC Registry (CKYC) and how does it help me?

     **Central KYC Registry (CKYC)** is a centralised government database maintained by CERSAI (Central Registry of Securitisation Asset Reconstruction and Security Interest of India) containing verified KYC records from all financial institutions in India.

    **Benefits for businesses:**
    - **Instant Verification:** If you have CKYC records (from bank, mutual fund, insurance), verification happens in seconds.
    - **No Document Uploads:** Many required documents are auto-fetched from CKYC.
    - **Skip Video KYC:** Businesses can bypass Video KYC completely.
    - **Faster Activation:** Complete onboarding in minutes instead of days.

    

 
### 2. How do I give consent to download my CKYC records?

    The consent process differs for individuals and businesses:

    **For Individuals/Unregistered Businesses:**

    1. Enter your Personal PAN.
    2. Razorpay checks if CKYC record exists.
    3. Enter mobile number linked to your CKYC record.
    4. Enter OTP sent by CKYC system.
    5. Your CKYC record is downloaded with documents.

    **For Registered Businesses:**

    1. Enter Business PAN and upload PAN document.
    2. Date of Incorporation is extracted from PAN document.
    3. Razorpay checks CKYC using PAN and Date of Incorporation.
    4. Your business CKYC record is downloaded.
  
    
> **WARN**
>
> 
>     **Watch Out!**
>     
>     The mobile number must be the same one registered with your CKYC record (typically the same as the mobile number linked to Aadhaar). 
>     

    

  
### 3. What is Video KYC and when is it required?

    **Video KYC** is a live video call with a Razorpay agent to verify your identity when CKYC data is not available.
    **Video KYC is NOT Required when:**
    - CKYC data is successfully fetched for your entity.
    - You can proceed directly with document submission.

    **Video KYC is Required when:**
    - CKYC search returns no record for your business.
    - CKYC OTP verification fails.
    - You do not have existing CKYC records.

    Only the **Authorised Signatory** needs to complete Video KYC. Ultimate Beneficial Owners (UBOs) do NOT need Video KYC.
    

  
### 4. Why must I show the original PAN card during Video KYC?

    RBI regulations require verification of original documents during Video KYC.

    The Authorised Signatory must physically hold and display the original PAN card on camera. This ensures:
    
    - Document authenticity.
    - Prevention of fraudulent submissions.
    - Compliance with regulatory requirements.

    **NOT Accepted:**
    - Printed copies of PAN.
    - Screenshots of PAN.
    - E-PAN displayed on mobile screen.

    **Accepted:**
    - Original physical PAN card only.
    

  
### 5. Is UBO verification mandatory for my business type?

    **UBO verification is mandatory if your business type is:**

    - Private Limited Company (>10% shareholding)
    - Public Limited Company (>10% shareholding)
    - Section 8 Company (>10% shareholding)
    - Partnership Firm (>10% holding)
    - Limited Liability Partnership (>10% contribution)
    - Trust (≥10% interest - includes exactly 10%)
    - Society (>15% interest - higher threshold)

    **UBO Declaration is not required if your business type is:**

    - Individual/Unregistered Business (owner is the merchant)
    - Sole Proprietorship (owner is the merchant)
    - Hindu Undivided Family (HUF)
    - Government Entity
    - Judicial Person
    - Local Authority

    **For Each UBO:** Provide PAN number (verified), Aadhaar document (front & back) and ownership percentage (self-declared).
    

  
### 6. What if I do not have a CKYC record?

    If CKYC you do not have a CKYC record, follow the standard verification flow:

    **Your Onboarding Path:**

    1. **Upload Required Documents:** Based on your business type.
    2. **Complete Video KYC:** Live video call with original PAN display.
    3. **Digilocker Verification:** Within 3 days of video call.
    4. **Review:** Our team reviews your submission (3-4 business days).

    **After Successful Onboarding:**

    Razorpay uploads your KYC data to CKYC for future use. This helps:
    - Speed up any future KYC processes.
    - Enable instant verification with other financial institutions.
    - Reduce document resubmission across services.

    

  
### 7. Which business types can never be auto-activated?

    The following entity types always require manual review and can never be auto-activated via CKYC. They are identified by the **4th character** in their business PAN:

    - **Hindu Undivided Family (HUF)** - PAN 4th letter: **H**
    - **Government Entity** - PAN 4th letter: **G**
    - **Judicial Person** - PAN 4th letter: **J**
    - **Local Authority** - PAN 4th letter: **L**

    These entities have **unique regulatory, legal and ownership structures** that require detailed manual verification regardless of CKYC availability.

    **All other business types** can be auto-activated if:
    - CKYC data is successfully fetched.
    - All required documents are present.
    - Business category supports auto-activation.
    

  
### 8. What documents are NEW requirements under Master KYC?

    New mandatory documents (Effective January 1, 2026):

    **For Private/Public Limited Companies:**
    - **Memorandum of Association (MOA)** - NEW.
    - **Articles of Association (AOA)** - NEW.
    - **Board Resolution or Power of Attorney** - NEW (for Authorised Signatory).
    - **UBO Declaration** - NEW (for shareholders >10%).

    **For Sole Proprietorship:**
    - **2 Business Documents** - NEW requirement (from approved list).
    - Previously only 1 document (GSTIN) was required.

    **For All Registered Businesses:**
    - **Ultimate Beneficial Owner (UBO) Declaration** - NEW.
    - **Power of Attorney** - NEW (if Authorised Signatory is not owner/director/partner).

    **Removed Requirements:**
    - Website policies (Terms, Refund, Privacy) - No longer required at onboarding.
    

  
### 9. Can I track my CKYC verification status?

    Yes, you can track CKYC verification status on your Dashboard.

    **Status Indicators:**
    - **Checking CKYC:** System searching for your CKYC record.
    - **Awaiting Consent:** Waiting for mobile OTP verification.
    - **CKYC Fetched:** Records successfully downloaded.
    - **CKYC Not Found:** No record exists, proceed with manual verification.
    - **Consent Failed:** OTP verification failed, retry or use manual method.

    **If CKYC Fetch Fails:**
    1. System automatically switches to traditional verification.
    2. You will be prompted to upload documents.
    3. Video KYC requirement will be displayed.
    4. Proceed with Digilocker + Video KYC flow.

    Check your Dashboard notifications and email for real-time updates on your KYC status.
    

  
### 10. What happens if my Video KYC verification fails?

    Common reasons for Video KYC failure:

     - Poor video quality (lighting, connection).
     - Face mismatch between PAN, Aadhaar and live video.
     - Original PAN card not shown (showing e-PAN or printout).
     - Digilocker verification not completed within 3 days.
     - Wrong person attended the call (not the Authorised Signatory).

    **What Happens Next:**
    1. You will receive notification of failure reason.
    2. Can retry Video KYC (no limit on retries).
    3. Ensure all requirements are met before retry.

    **How to Avoid Failure:**
    - Use original physical PAN card.
    - Ensure good lighting and stable internet.
    - Authorised Signatory must attend (not someone else).
    - Complete Digilocker verification first.
    - Enable camera, microphone, GPS permissions.
    - Schedule call during the **8 AM - 7 PM (Monday to Sunday)** window.

    Contact our [support team](https://razorpay.com/support/) if you face repeated failures.
    

  
### 11. Do I need to complete separate CKYC for my business and myself?

    Yes, for registered businesses, entity CKYC and individual CKYC are separate.

    **Two Types of CKYC Records:**

    **1. Entity CKYC (Business)**
    - For the registered business entity
    - **Contains**: Business PAN, Certificate of Incorporation, MOA/AOA and so on.
    - **Used for**: Business identity verification

    **2. Individual CKYC (Authorised Signatory)**
    - For the person authorised to sign on behalf of business
    - **Contains**: Personal PAN, Aadhaar, address proof
    - **Used for**: Authorised Signatory verification

    **Example - Private Limited Company:**
    - **Entity CKYC:** Company's CKYC record (Business PAN and Date of Incorporation)
    - **Individual CKYC:** Director's CKYC record (Director's personal PAN)

    **For Individuals/Proprietorships:**
    - Only one CKYC record (individual's record)
    - Proprietorship may have separate entity CKYC in some cases

    Both records are checked during onboarding. If either is missing, that portion requires manual verification/Video KYC.
    

## Account Activation

    
### 1. Do you support freelancers or individuals?

         Yes, we do support freelancers/individual business entities. You can [sign up here](https://dashboard.razorpay.com/#/access/signup/) and submit your activation form.
        

    
### 2. I submitted the activation form a while ago. How can I get my account activated?

         If you have already submitted the activation form but have not received any communication, please check your email inbox, including the spam or junk folders. Look for an email from Razorpay that would have been sent shortly after submitting the activation form. In case you don't find the email, please raise a request to [Razorpay Support](https://razorpay.com/support/) and our team will get back to you.
        

    
### 3. I have signed up with Razorpay. How do I complete my activation form?

         Follow the steps given below to complete the activation process:
         1. Log in to your Dashboard.
         2. Complete Account Activation and KYC Verification steps.
         3. Submit the activation form.
        

    
### 4. I have submitted my activation form, but my account is not activated. Can I start integrating?

         Yes, you can start integrating without your account getting activated. But you must have an active account for the [settlements](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/settlements.md). Check the [various integration options available](https://razorpay.com/integrations/) to you. If you face any issues during the integration, [raise a Razorpay Support request.](https://razorpay.com/support/#request)
        

    
### 5. I have submitted my activation form. When will my account get activated?

         Activation of an account is subject to approval from our banking partners (Working days do not include Saturdays, Sundays and bank holidays).

         We will update your account status after receiving the bank's response.
        

    
### 6. My account has not been activated; it has been too long since I got any update. What do I do?

         We try our best to have everyone's account activated on time. However, since you have not received an update on this, please raise a request with [Razorpay Support](https://razorpay.com/support/). Our team will update you at the earliest on the status of your account.
        

    
### 7. What are the documents needed to sign-up?

         To ensure a smooth sign-up process, it is important to provide the necessary documents as per Razorpay's requirements. Check the [list of documents](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/business-types-kyc-documents.md#kyc-documents) required for signing up at Razorpay.
        

    
### 8 . What payment methods are supported by Razorpay?

         Razorpay supports [various payment methods](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods.md#supported-payment-methods) to cater to diverse customer preferences.
        

    
### 9. Why is my settlement on hold and my account under review after activation?

         Our compliance team and partner banks perform routine audits of your KYC documents. We might temporarily pause your settlements during this time. Look out for clarifications asked by our team on your registered email. Upon receiving your response, we will process the application within 2 days and re-enable settlements for you.

         
> **INFO**
>
> 
>          **Handy Tips**
> 
>          You can still accept payments from your customers.
>          
  
        

    
### 10. Can I change my business type once my account is created?

         No, you cannot change your business type once the account is created. However, you can update the business type if you still need to submit your KYC details.
        

    
### 11. I am unable to use my mobile number. It shows that the mobile number already exists. How can I create an account using the same number?

         You can refer to [Create Multiple Account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md#create-multiple-accounts).
        

    
### 12. Can a UK company register with Razorpay?

        No, only Indian companies can register. You can refer to [Razorpay Curlec](https://curlec.com/) for Malasyia and [Razorpay](https://razorpay.com/sg/) for Singapore.
        

    
### 13. I don’t have GST and a current account. It is a very small, new business. How can I proceed without the above details?

        Submitting GST and current account details is not mandatory. You can select **I don’t have GST** and proceed with a savings account.
        

    
### 14. How do I know my KYC status?

        The status of your KYC is communicated on your Dashboard.
        

    
### 15. How do I submit my HUF document?

        Select your business type as HUF during onboarding to submit your HUF document. You can edit all the fields if you still need to submit the form.
        

    
### 16. I am unable to add comments to my activation form. It says "locked by admin". How can I resolve this?

        You cannot edit a KYC form once it is submitted. If more information is required, we will email you.
        

    
### 17. Can I update my PAN Card details?

        Once your KYC is verified, you can contact our [Support Team](https://razorpay.com/in/support/) to update your PAN card details.
        

  
## Account Configuration

    
### 1. Can I disable the customer receipt emails from Razorpay?

         Customers receive email receipts for the transactions on their account (payments or refunds). Unfortunately, this is mandated by our partner banks and hence cannot be disabled.
        

    
### 2. I have signed up using my phone number. How do I setup my password?

         To setup a password:
         1. Enter your email address and click **Forgot?**. You will receive a verification link on your email ID.
            
         2. Click the verification link and setup your password.
        

## Account Rejection

    
### 1. Why has my account been rejected?

         Your account may have been rejected because we do not support your business sub-category. You can refer to our [terms](https://razorpay.com/terms/) to know more.
        

 to know more.
