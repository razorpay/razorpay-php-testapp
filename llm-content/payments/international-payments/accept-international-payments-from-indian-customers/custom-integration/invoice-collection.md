---
title: Invoice Collection
description: Automate invoice uploads and buyer details with seamless SFTP integration.
---

# Invoice Collection

> **WARN**
>
> 
> **Watch Out!**
> 
> 1. Invoice collection is mandatory for any import payment to be eligible for settlement.
> 2. Turnaround Time (TAT) for settlement begins **only after a valid invoice** is uploaded.
> 3. Ensure each invoice contains the following details:
>    - Unique invoice number (Partner's invoice ID or Razorpay Order ID).
>    - Partner's or business name.
>    - Partner's or business address.
>    - Customer's complete address.
>    - Description of goods/services.
>    - Units sold (time period, quantity and so on).
>    - Amount in INR (2 decimal places only. For example, ).
>    - Taxes applied.
> 

## Invoice Submission via SFTP

You can automate invoice uploads using **Secure File Transfer Protocol (SFTP)**, enabling streamlined, secure file transfer.

### Steps to Connect with Razorpay via SFTP

   
### 1. Share Your Public Key

       - Required for setting up SFTP credentials and folder access.
       - Submit your SSH public key to your Razorpay point of contact.
       - **Supported SSH key formats**:
         - RSA (2048-bit or higher). For example, `ssh-rsa`.
         - ECDSA. For example, `ssh-ecdsa`.
         - Ed25519. For example, `ssh-ed25519`.
       - Ensure your key is in the correct format. Using an unsupported or incorrectly formatted key will result in authentication failure.
       
       
> **WARN**
>
> 
>        **Watch Out!**
>        
>        Never share your private key with anyone. Only the public key should be provided to Razorpay.
>        

      

   
### 2. IP Whitelisting

       - Only requests from your whitelisted IPs will be accepted.
       - Share a list of authorised outbound IPs to enable secure access.
       - Maximum of 4 IP addresses can be whitelisted.
       - SFTP access will work only from the whitelisted IPs. Attempting to connect from any other IP address will result in connection failure.
      

   
### 3. Credentials & Access Details

       - Razorpay will provide:
         - Hostname: `sftp.razorpay.com`
         - Port: `22`
         - Username
         - Path prefix (based on your `MID`)
       - Use your **private key** (corresponding to the public key you shared) to authenticate while connecting to Razorpay's SFTP.
       - Use an SFTP client to connect.
       - **Test your connection**: Run `telnet sftp.razorpay.com 22` to verify connectivity before attempting SFTP access.
      

## How to Share Invoices via SFTP

   
### File Path Format

Use the following folder and file structure:
"/invoiceUpload/automated//YYYY-MM-DD/InvoiceNumber.pdf." 

For example: `/invoiceUpload/automated/MDoeHNNpi0nB7m/2025-05-10/INV_09876.pdf`

> **WARN**
>
> 
> **Watch Out!**
> 
> - You must include your Merchant ID (MID) in the path.
> - You must include the date folder in `YYYY-MM-DD` format.
> - Missing either component will result in upload failure.
> - Once uploaded, invoices become read-only. You cannot edit, rename or delete files after you upload.
> - Do not attempt to upload the same invoice multiple times to the same path.
> 

      

   
### File Types and Flows

Direction | Filename Format | Description
---
Client → Razorpay | `InvoiceNumber.pdf` | Inbound File: This will be the invoices submitted by you to Razorpay. It should always be in PDF format. Example: `INV_09876.pdf`

      

## Invoice ID Validation Process

Razorpay enforces strong validation rules to prevent duplicate or invalid invoice usage.

   
### Successful Payments

       - **Status**: `Captured`
       - **Invoice Action**: Permanently blocked
       - **Note**: Same invoice ID cannot be reused.
      

   
### Failed Payments

       - **Status**: `Failed`
       - **Invoice Action**: Released
       - **Note**: Invoice ID can be reused.
      

   
### Payments in Intermediate States

       - **Status**: `Created` or `Authorised`
       - **Invoice Action**: Temporarily blocked
       - **Note**: Invoice ID is reusable only after final status (`Failed` or `Captured`) is reached.
      

### Refunded Payments

   
### Auto-Refunded (Never Captured)

       - **Status**: `Refunded`
       - **Action**: Invoice ID is released.
       - **Note**: ID can be reused.
      

   
### Merchant-Initiated Refund (Post-Capture)

       - **Status**: `Refunded`
       - **Action**: Invoice ID is permanently blocked.
       - **Note**: Cannot be reused.
      

Partial capture scenarios are not validated by default. Contact Razorpay [Support team](https://razorpay.com/support/).

## AML Screening Process

As per RBI regulations, payments to offshore accounts must undergo AML (Anti-Money Laundering) checks by Razorpay's Authorised Dealer (AD) Bank.

   
### Daily AML Communication

       - You will receive daily emails listing transactions **flagged** for additional details.
       - **Subject Line**: `Additional Details Required - [Business Name]_MDoeHNNpi0nB7m`.
      

   
### Turnaround Time

       - Share required information within **5 working days** to avoid auto-cancellation.
       - Information may include: Full name, address, ownership, percentage of ownership, nature of business, purpose of payment, business website, company, date of birth/incorporation, place of birth/incorporation and so on.
      

   
### Consequences of Delay

       Missing TAT results in:
         - Razorpay lien-marking the funds or
         - Refund initiation via Dashboard/API.
      

## Best Practices for Invoice IDs

To ensure seamless experience and compliance:

- **Always generate unique invoice IDs** per payment.
- Acceptable IDs:
  - Razorpay `order_id`.
  - Your internal unique invoice number.
- Do not reuse invoice IDs for different transactions unless the original payment has failed.
