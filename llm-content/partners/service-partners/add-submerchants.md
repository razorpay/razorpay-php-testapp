---
title: Service Partners | Add Sub-merchants from Partner Dashboard
heading: Add Sub-merchants
description: Service Partners can invite Sub-merchants using their email IDs or by sharing a referral link from the Razorpay Dashboard.
---

# Add Sub-merchants

As a Service Partner, you can invite your affiliates to use Razorpay Payments products and RazorpayX powered Current Account. You get a partnership commission when the Sub-merchants perform any transaction using Razorpay products. Know more about [partnership commission](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/commissions.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> You can invite your clients to use Razorpay payments. To become a Sub-merchant, the invitee has to accept the invite and create a Razorpay account.
> 

## Who is a Sub-merchant

Sub-merchants are the merchants who get onboarded on the Razorpay platform by a Partner. For example, *Acme* wants to provide an order management solution for its client company "Gekko". In this scenario, "Gekko" is Acme's Sub-merchant.

Once onboarded, Sub-merchant accounts (Affiliate accounts) must be activated to start collecting or disbursing payments.

You can invite your Affiliate partners/Sub-merchants directly using the Dashboard. You can also encourage businesses to sign up for Razorpay products by sharing referral links on social media and instant messengers.

## Add Sub-merchants Using Email Id

You can invite Sub-merchants using their email id to sign up and register on Razorpay. You can send an invite link to an individual account or multiple accounts.

> **INFO**
>
> 
> **Handy Tips**
> 
> You can send a maximum of 1,00,000 invites/day. This could be individual invites, bulk invites or a combination of both.
> 

### Add One Sub-merchant

    
### To invite a new Sub-merchant using email id:

            1. Log in to the Dashboard.
            2. Click **Partner** and navigate to **Affiliate Accounts**.
            3. Select the **Payments** or **RazorpayX** tab depending on the product you want to refer your affiliate. 
            4. Click **+ Add New Clients**.
                 ![Service Partners - add new clients](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-reseller-add-client.jpg.md)
            5. Under the **Using Email** tab, enter the **Client Name**, **Email ID** and **Contact number** (_optional_) to which the invite link must be sent. Click **Next**.
                 ![Service Partners - enter client details](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-add_sub_merchant.jpg.md)
            6. If you want to perform KYC for your client, select **Yes, I will assist my client with their KYC** and click **Send Invite**.
                 ![Service Partners - perform client KYC](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-add-sumb-do-kyc.jpg.md)

                
> **INFO**
>
> 
>                     **Handy Tips**
>                     
>                     We recommended you to perform KYC for your Sub-merchants as it decreases onboarding time by 50% and acts as a value added service. Know how to [perform KYC for your Sub-merchants](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/service-partners/perform-kyc.md). During onboarding, your client will see a consent screen to allow you access to perform KYC. They need to approve it for you to submit the KYC form on their behalf.
>                          ![KYC consent form during Sub-merchant onboarding.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/onboarding-kyc-consent-screen.jpg.md)
>                 

        

### Bulk Upload Multiple Sub-merchants

You can send invites to multiple users using the **Bulk Upload** option. Upload an XLSX or CSV file with the Dashboard's required data. This sends a single sign up invitation link to multiple affiliate accounts in bulk. This enables your Sub-merchants to sign up and register on Razorpay.

    
### Bulk Upload Template

         To view and understand the file format requirements, download the [sample template](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/sample_invite_submerchant_batch.xlsx.md). The account creation template contains the following headers.

            `account_name` _optional_
            : Name of the Sub-merchant's account.

            `email` _mandatory_
            : The email address of the Sub-merchant.

            
> **WARN**
>
> 
> 
>             **Watch Out!**
> 
>             - Do not modify field names/headers (`account_name` and `email`) in a batch as it might result in an upload failure.
>             - There should be **only 1** sheet in the file.
>             - The size of the file can be up to 50 MB. You can add up to 5,000 rows in a particular file. The links will be processed in the same sequence as listed in the file.
>             

        

    
### Add Multiple Accounts Using Bulk Upload Template

            1. Log in to the Dashboard.
            2. Click **Partner** and navigate to **Affiliate Accounts**.
            3. Select the **Payments** or **RazorpayX** tab depending on the product you want to refer your affiliate. 
            4. Click **+ Add New Clients**.
            5. Shift to the **Bulk Upload** tab.
            6. Upload the file. You can drag and drop or **click to upload**. 
                 ![add multiple account](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-add-multiple-account.jpg.md)
            7. The file is validated for any associated errors and uploaded to the Razorpay server. Click **Next**.
                 ![send invite](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-send-invite.jpg.md)
            8. If you want to perform KYC for your client, select **Yes, I will assist my client with their KYC** and click **Send Invites** to send invites to your clients via email.
                 ![Reseller Partners - perform client KYC](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-add-sumb-do-kyc-bulk.jpg.md)

                
> **INFO**
>
> 
>                 **Handy Tips**
>                 
>                 We recommended you to perform KYC for your Sub-merchants as it decreases onboarding time by 50% and acts as a value added service. Know how to [perform KYC for your Sub-merchants](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/service-partners/perform-kyc.md). During onboarding, your client will see a consent screen to allow you access to perform KYC. They need to approve it for you to submit the KYC form on their behalf.
>                    ![KYC consent form during Sub-merchant onboarding.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/onboarding-kyc-consent-screen.jpg.md)
>                 

        

#### What Happens Next

Once the file is successfully processed, you will receive the account creation status via email. The email attachment will include both success and/or failure details for each account, including the error code and exact reason for the failure.

    
        - The newly added Payments Sub-merchants will appear on your list on the Partner Dashboard with a default **Activation Status** as **Not Submitted**. 
        - To get started, the Sub-merchants must proceed to complete the [Account Set Up](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up.md) and [KYC Verification](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up/#2-submit-kyc-details.md) processes by using their Razorpay account credentials.
              ![email sent](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-email-sent.jpg.md)
    
    
        - RazorpayX Affiliates will appear with a default CA status as **Application not initiated**. 
        - To get started, Sub-merchants must log in to their [RazorpayX Dashboard](https://x.razorpay.com/auth) and initiate Current Account application.
    
    

## Add Sub-merchants Using a Referral Link

Share a referral link with potential Sub-merchants via social media or instant messengers. You can also copy the referral link and send it via email.

    
### To add Sub-merchants using a referral link:

            1. Log in to the Dashboard.
            2. In the **Partner** section, navigate to **Affiliate Accounts**.
            3. Click **Share Referral Link**.
                 ![Service Partners - share referral link](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/partners-share-referral-link.jpg.md)
            4. For Partner accounts on which X referrals have been activated in the **Share Referral Link** modal, select Razorpay Payments or RazorpayX depending on the product you want to refer an affiliate.
            5. If you want to perform KYC for your client, select **Yes, I will assist my client with their KYC**.
                 ![Service Partners - share referral link with KYC](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/referral-link-with-kyc.jpg.md)
            6. A drop-down page appears where you can share the link using:
                - Copy button: This copies the referral link. You can copy-paste this link and send it via email or instant messaging apps such as WhatsApp.
                - Facebook: Click the Facebook icon to share the referral link as a post on your Facebook account.
                - Twitter: Click the Twitter icon to send a tweet with the referral link.
                - WhatsApp: Click the WhatsApp icon to send a message with the referral link.
            7. If you do not want to perform KYC for your Sub-merchants, select **No, my client will perform KYC on their own**. A **different** referral link will be displayed. You can share this link using the above options.
                ![Service Partners - share referral link without KYC](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/referral-link-without-kyc.jpg.md)

                
> **INFO**
>
> 
>                 **Handy Tips**
>                 
>                 We recommended you to perform KYC for your Sub-merchants as it decreases onboarding time by 50% and acts as a value added service. Know how to [perform KYC for your Sub-merchants](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/service-partners/perform-kyc.md). During onboarding, your affiliate will see a consent screen to allow you access to perform KYC. They need to approve it for you to submit the KYC form on their behalf.
>                    ![KYC consent form during Sub-merchant onboarding.](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/onboarding-kyc-consent-screen.jpg.md)
>                 

            
            Businesses can click on this referral link and sign up as an Affiliate account. As a Service Partner, you will get 0.1% commission for every transaction done by the Affiliate accounts who sign up using this link.
        

## Actions After Inviting

    
        Your contact will receive an invite via email and SMS to create a Razorpay account. To get started, the contacts invited for `Payment` products, must proceed to create a Razorpay account and complete account activation and [KYC Verification](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/set-up/#2-submit-kyc-details.md). Sub-merchants invited for `Payments` can be seen under **Payments**.

        **All Invites**

        You can check all the invites sent in the **All Invites** tab. You can resend invites to your contacts.
             ![Service Partners - All invites sent](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/resellers-all-invites.jpg.md)
            
        **Accepted Invites**

        To see the contacts that have accepted your invite, switch to the **Accepted Invites** tab. You can check the activation status and request for KYC.
              ![Service Partners - Accepted invites](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/resellers-accepted-invites.jpg.md)
              
    
        A RazorpayX affiliate will be displayed with a default CA status as **Application not initiated**. Sub-merchants referred for `RazorpayX powered Current Account` must log in to their [RazorpayX Dashboard ](https://x.razorpay.com/auth) and initiate Current Account application. 

        Sub-merchants invited for `Current Account` can be seen under **RazorpayX**:
             ![Service Partners - List of affiliate account](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/resellers-affiliate-accounts-x.jpg.md)
    

## Sub-merchant Activation Status

You can track the account activation status of the Sub-merchant on your Dashboard under the **Affiliate Accounts** tab.

---
Activated | The account activation status is `Activated` once the KYC documents are successfully verified. The payments made by the affiliate accounts before they submitted the KYC form and documents will be settled to your account.

    

        

        Status | Description
        ---
        Not Submitted | When you invite the Sub-merchant, and your affiliate account is successfully added, the activation status by default is `Not submitted`. This is the default status.
        ---
        Instantly Activated | Your affiliate account sets the Razorpay account password and provides contact details, business details, and account details. Once these details are fully verified, the activation status moves to `Instantly Activated`. The Sub-merchants can start accepting payments once the account is instantly activated. However, the settlements will not be enabled.
        ---
        Under Review| Your affiliate account submits business documents to Razorpay depending on their business type. Razorpay then starts with the KYC review process. This changes the activation status to `Under Review`.
        ---
        Activated | The account activation status is `Activated` once the KYC documents are successfully verified. The payments made by the affiliate accounts before they submitted the KYC form and documents will be settled to your account.
        
    
    
            

            Current Account Status | Description
            ---
            Application not initiated | Affiliate has not initiated a Current Account application yet.
            ---
            Application completion pending | Complete CA application is yet to be submitted.
            ---
            PAN verification in progress | We are verifying the PAN details submitted by your affiliate. Takes about 5-10 minutes to complete.
            ---
            PAN Verification Failed | Direct your affiliate to enter a valid PAN number that is registered with their business to submit KYC.
            ---     
            Telephonic verification | RazorpayX executive will call the affiliate in a few days for verification.
            ---
            Razorpay processing | RazorpayX team is verifying the application internally.
            ---
            Documents pick up pending | Our partner bank’s executive will help the affiliate to fill the forms and collect them. Details will be shared soon.
            ---
            Account opening in progress | We are working with our partner bank to get the account opened and activated.
            ---
            Account opened | Current Account is opened. Our team is working on activating the account on RazorpayX. This usually takes 3-5 working days.
            ---
            Account activated | Current account is now active.
            ---
            Request Cancelled | Current Account request has been cancelled.
            ---
            Unserviceable | We are unable to service the Current Account opening request.
            ---
            Request Rejected | Current Account opening request has been rejected by RazorpayX/partner bank's team.
            ---
            On hold | Current Account opening request has been put on hold.
            ---
            Request Received | We have received your request and will contact you to understand your requirements and help you gather the documents required to open a current account.
            ---
            Process Started | We inform our partner bank RBL to contact you, collect the required documents and take the process further. Documents required to open a Current Account will differ based on your business type.
            ---
            Bank KYC in progress | Our partner bank has received the documents required to process your request and complete KYC. A Relationship Manager from RBL will contact you if further clarification is needed.

            
    

### Related Information

- [Partners](@/Applications/MAMP/htdocs/new-docs/llm-content/partners.md)
- [About Service Partners](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/service-partners.md)
- [Partner Commissions](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/commissions.md)
