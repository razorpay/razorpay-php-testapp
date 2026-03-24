---
title: Frequently Asked Questions
description: Troubleshoot common error scenarios and find answers to frequently asked questions about Import Flow integration.
---

# Frequently Asked Questions

## Common

   
### 1. What payment methods does Razorpay support for my customers?

       Razorpay supports a comprehensive range of payment methods including UPI, Netbanking, Credit/Debit Cards (Visa, Mastercard, RuPay, Diners Club, American Express) and Recurring Payments to provide your customers with maximum payment flexibility.
      

   
### 2. Do you offer no-code payment solutions or simple integration options?

       Currently, we do not offer a no-code payment button solution. However, our payment gateway integration requires minimal coding effort, and our technical team handles all the complex backend processing. If you are looking for low-code solutions, you can explore [Payment Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-links.md) or [Payment Pages](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-pages.md), depending on your use case and eligibility. These options allow you to start accepting payments with minimal setup.

       To understand the customer checkout experience, try our [interactive demo](https://razorpay.com/demopg3/). To get started with integration, refer to our [integration guide](https://razorpay.com/docs/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/build-integration/).
      

   
### 3. Can Razorpay handle recurring payments for subscription-based businesses?

       Yes, under the recurring payments model, you can charge the customer any amount up to the maximum mandate limit, based on the customer's usage. However, increasing the maximum mandate amount is not permitted as per regulations. To charge a higher amount, you must create a new mandate with the revised limit.
      

   
### 4. Does Razorpay support pro-rated billing when customers upgrade or downgrade subscription plans?

       Yes, you can request mandate updates whenever customers need to upgrade or downgrade their subscription plans, enabling flexible billing management for your business.
      

   
### 5. What dispute and chargeback management tools does Razorpay provide?

      Razorpay provides comprehensive dispute management tools including a dedicated dashboard to track all dispute cases, automated email notifications with detailed transaction information and an online portal for submitting supporting evidence. Additionally, you can configure webhook notifications to receive real-time alerts about dispute status changes. Know more about [disputes](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/disputes.md).
     

   
### 6. How does Razorpay handle customer refunds?

      Razorpay supports both full and partial refunds that you can process instantly through our merchant dashboard or via API integration. This gives you complete control over your refund operations. Know more about [refunds](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/refunds.md).
     

   
### 7. Can I track transactions in real-time?

      Yes, Razorpay provides comprehensive real-time transaction monitoring through our dashboard, API endpoints, and webhook notifications. You can instantly track payment statuses, settlements, refunds and all transaction activities as they occur.
     

   
### 8. What business analytics and reporting tools are available?

      The Razorpay merchant dashboard provides detailed visibility into your transaction data, payment status tracking, visual charts, and comprehensive business insights. You can also configure custom reports tailored to your business needs. Explore our [dashboard features](https://razorpay.com/docs/payments/dashboard/) for complete details.
     

   
### 9. What communications will my customers receive from Razorpay?

      Your customers will receive email confirmations upon successful payment completion. For recurring payments, we send SMS notifications 24 hours before scheduled debits to keep customers informed about upcoming charges.
     

   
### 10. Is Razorpay compliant with financial security standards?

      Yes, Razorpay is PCI-DSS compliant, ensuring the highest standards of payment security. We are also licensed and regulated by the Reserve Bank of India as a Payment Aggregator - Payment Gateway (PA PG) and Payment Aggregator - Cross Border (PA CB), providing you with complete regulatory compliance.
     

   
### 11. Can international merchants access all Razorpay features?

      Yes, international merchants have full access to all Razorpay features including the merchant dashboard, dispute management functionality, and all payment processing capabilities. You do not need to be an Indian-registered business to access these features and the dashboard is available regardless of your business location.
     

   
### 12. What are the requirements for setting up a Razorpay account and going live

      To go live with Razorpay, your website must include essential business pages: 
        - Bank Statement
        - Passport of Authorised Signatory
        - Board Resolution
        - Certificate of Incorporation.
     

   
### 13. Can I disable the email notifications that Razorpay sends to my customers for successful payments and refunds?

       Yes, you can control customer email notifications. For Server-to-Server (S2S) integrations, you can disable email notifications by setting the `email` parameter to "false" under the `notify` object in your API request. Refer to our [Payment Links customisation documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/payment-links/customise-payment-methods.md) for more details. Alternatively, you can contact our [support team](https://razorpay.com/support/) to have this setting configured for your account.
      

## Anti-Money Laundering

   
### 1. Why are certain transactions being flagged for AML?

       Transactions are flagged by our Authorised Dealer (AD) bank's compliance team during mandatory AML checks. Screening is usually based on name matches with sanction/watchlists (OFAC, UN, EU, UK and internal/government lists). If there is a potential match, the bank requests additional information (for example, date of birth, place of birth, address, nationality).
      

   
### 2. What information may be requested for flagged transactions?

       Depending on the case, banks may request the following information:
       
       - **For Individuals**: Full name, address, date of birth, place of birth, national id, passport number, nationality, citizenship.
       
       - **For Entities**: Full Name, registered address, nature of business, ownership with percentages, website, purpose of payment.
      

   
### 3. What happens if we do not provide the requested details?

       The bank cannot settle the transaction without the required details. Funds are kept on hold and may eventually be reported to the Government as unclaimed. Customers are not automatically refunded. If required, refunds must be initiated by the platform/business (possibly up to 6 months).
      

   
### 4. Will customers be refunded automatically if a transaction is rejected?

       No. Funds are not refunded automatically. Business/platforms may choose to initiate a refund to the customer. If information is provided later (even after the timeline), we can attempt to re-settle the transaction with the bank.
      

   
### 5. What short-term measures can reduce AML flags?

       Mandating full names (first and last) at checkout reduces flagged transactions by 50%. Collecting date of birth at checkout reduces false positives by 70%+. Address capture, wherever possible, can also help.
      

   
### 6. What are the long-term solutions?

       Razorpay is building real-time AML detection for the following:
       
       - **Hosted Checkout**: Users are asked for additional info (DOB and so on.) only if flagged.
       
       - **API/S2S flows**: The AML risk score is shared in the create order API response.
      

   
### 7. What are the integration options for handling AML?

       a. **Fail upfront**: Razorpay fails orders at the create order API stage if a likely AML flag is detected.

       b. **Risk Score**: Razorpay provides a risk score. The partner can request DOB or block the order.

       c. **Post-flag data collection**: Partner collects additional information only for flagged cases and shares via API (PATCH Order).
      

   
### 8. How quickly can AML solutions be enabled?

       Pre-screening/fail-at-order can be enabled within 1 business day of request. Reports on AML-flagged/fail transactions are currently shared manually (T+2), with automation in progress.
      

   
### 9. Who bears liability if users refuse to share AML information?

       If AML information is not provided, the bank will not settle the funds. The platform/business can refund the user to revoke access to the service/product. Funds that are not refunded remain on hold until settled or reported to authorities.
      

   
### 10. Are there cultural concerns in collecting DOB?

       In India, collecting DOB for payment verification is common and acceptable. However, in some geographies (for example, Japan), DOB collection may face user friction. In such cases, partners can rely on full name and address improvements to reduce AML hits while selectively using DOB collection only when flagged.
      

## Invoice Collection and Secure File Transfer Protocol (SFTP)

   
### 1. What key format should I use to upload invoices?

       You must use one of the supported SSH key formats mentioned in our documentation. Using an unsupported or incorrectly formatted key will result in authentication failure.
       
       **Supported formats**:
         - RSA (2048-bit or higher). For example, `ssh-rsa`.
         - ECDSA. For example, `ssh-ecdsa`.
         - Ed25519. For example, `ssh-ed25519`.
       
       Ensure your public key is in the correct format before sharing it with Razorpay.
      

   
### 2. Can I access the SFTP from any IP address?

       No. You can whitelist a maximum of 4 IP addresses. SFTP access will work only from the whitelisted IPs. Attempting to connect from any other IP address will result in connection failure.
      

   
### 3. Which key should I use to access Razorpay's SFTP?

       You must use your private key to authenticate whilst connecting to Razorpay's SFTP.
       
       - **Public key**: Uploaded to Razorpay.
       - **Private key**: Used by you to access SFTP.
       
       Never share your private key with anyone. If you have multiple public keys configured with Razorpay, ensure you use the correct corresponding private key for authentication.
      

   
### 4. What is the correct folder path to upload invoices?

       Invoices must be uploaded to the following directory structure:
       
       `/invoiceUpload/automated///`
       
       For example:
       `/invoiceUpload/automated/MDoeHNNpi0nB7m/2025-05-10/INV_09876.pdf`
       
       **Important**:
       - You must include your Merchant ID (MID) in the path.
       - You must include the date folder in `YYYY-MM-DD` format.
       - Missing either component will result in upload failure.
      

   
### 5. Can I delete or modify the uploaded invoices?

       No. Once an invoice is uploaded, it becomes read-only and cannot be edited, renamed or deleted via SFTP. This ensures invoice integrity and compliance with audit requirements.
       
       If you need to correct an invoice, upload a new file with a different invoice number. Do not attempt to upload the same invoice multiple times to the same path.
