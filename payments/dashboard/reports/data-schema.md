---
title: Reports Data Schema
description: Explore reporting data schema on payments, refunds, settlements and more to build insightful reports.
---

# Reports Data Schema

Create standard and custom reports from your data. Utilise our schema documentation for all entities, columns and their descriptions.

## Refunds

Records details of amounts returned to customers from processed payments.

Details of the available columns are listed below:

Column Name | Type | Description | Is Nullable?
---
Unique Transaction Reference| String |  -  **UPI**: NPCI UPI transaction ID (RRN) 
 -  **E-mandate**: Unique Transaction Reference (UTR) 
 -  **Cards/Netbanking**: Acquirer Reference Number (ARN) 
  | Yes
---
Settled By | String | Indicates the entity responsible for settling the refund. | Yes
---
Notes | String | Additional notes or comments related to the refund. | Yes
---
Refund ID | Integer | Unique identifier for the refund. | No
---
Fees | Integer | The processing fees associated with the refund. | No
---
Tax | Integer | The tax amount applied to the refund. | No
---
Amount | Integer | The total amount of the refund. | No
---
Receipt | String | The unique receipt number for the refund. | Yes
---
Currency | String | The currency in which the refund was processed (for example, 'INR'). | No
---
Created At | Date/Time | Timestamp when the refund record was created. | No
---
Payment ID | String | The ID of the original payment to which the refund is linked. | No
---
Speed Requested | String | The requested processing speed for the refund. | No
---
Status | String | The current status of the refund (for example, `processed`, `pending`, `failed`). | No

## Transactions 

Captures comprehensive records of all financial movements, including debits, credits and associated fees.

Column Name | Type | Description | Is Nullable?
---
Tax | Integer | The tax amount associated with the transaction. | Yes
---
Debit | Integer | The debit amount the transaction. | No
---
Amount | Integer | The total amount of the transaction. | No
---
Credit | Integer | The credit amount of the transaction. | No
---
Currency | String | The currency of the transaction. | No
---
Entity ID | Integer | The ID of the entity related to this transaction (for example, payment ID, refund ID). | No
---
Created At | Date/Time | Timestamp when the transaction record was created. | No
---
Type | String | The type of transaction (for example, 'payment', 'refund', 'settlement'). | No
---
Settled | Boolean | Indicates if the transaction has been settled (True/False). | No
---
Fees | Integer | The total fees associated with the transaction. | No
---
On Hold | Boolean | Indicates if the transaction amount is currently on hold (True/False). | Yes
---
Settled At | Date/Time | Timestamp when the transaction record was settled. | Yes
---
Settlement ID | String | The ID of the settlement associated with this transaction. | Yes

## Orders

Represents the initial request or intent to collect a payment, often preceding the actual payment capture.

Column Name | Type | Description | Is Nullable?
---
Order ID | String | Unique identifier for the order. | No
---
Notes | String | Additional notes or comments for the order. | Yes
---
Receipt | String | The unique receipt number for the order. | Yes
---
Offer ID | String | The ID of any offer applied to the order. | Yes
---
Updated At | Date/Time | Timestamp when the order record was last updated. | No
---
Amount Paid | Integer | The total amount paid for the order. | Yes
---
Amount | Integer | The total amount of the order. | No
---
Status | String | The current status of the order (for example, `created`, `paid`, `fulfilled`). | No
---
Attempts | Integer | The number of payment attempts made for the order. | No
---
Currency | String | The currency of the order. | No
---
Created At | Date/Time | Timestamp when the order was created. | No

## UPI Metadata 

Stores additional details and technical information related to UPI (Unified Payments Interface) transactions.

Column Name | Type | Description | Is Nullable?
---
Settled By | String | The tax amount associated with the transaction. | Yes

## Disputes 

Manages details and statuses of chargebacks or disagreements initiated by customers regarding transactions.

Column Name | Type | Description | Is Nullable?
---
Dispute ID | String | Unique identifier for the dispute. | No
---
Reason Description | String | A detailed description of the reason for the dispute. | No
---
Created At | Date/Time | Timestamp when the dispute record was created. | No

## Settlements 

Tracks the process of transferring accumulated funds from Razorpay to your linked bank account.

Column Name | Type | Description | Is Nullable?
---
Created At | Date/Time | Timestamp when the settlement record was created. | No
---
Settlement ID | String | Unique identifier for the settlement. | No
---
UTR (Unique Transaction Reference) | String | The Unique Transaction Reference number for the settlement. | Yes
---
Status | String | The current status of the settlement (for example, `processed`, `pending`, `failed`). | No
---
Amount | Integer | The total amount of the settlement. | No
---
Tax | Integer | The tax amount associated with the settlement. | Yes
---
Fees | Integer | The total fees deducted from the settlement amount. | No

## Payments 

Holds the core information about successful and failed payment attempts, including amount, method and customer details.

Column Name | Type | Description | Is Nullable?
---
Settled By | String | Indicates the entity that settled the payment. | Yes
---
Notes | String | Additional notes or comments for the payment. | Yes
---
Payment Method | String | The method used for the payment (for example, 'card', 'netbanking', 'upi', 'wallet'). | Yes
---
Captured At | Date/Time | Timestamp when the payment was captured. | No
---
Payment ID | String | Unique identifier for the payment. | No
---
Customer Email | String | The email address of the customer who made the payment. | Yes
---
Customer Contact | String | The contact number of the customer who made the payment. | Yes
---
Currency | String | The currency in which the payment was made. | No
---
Order ID | String | The ID of the order associated with this payment. | Yes
---
Created At | Date/Time | Timestamp when the payment record was created. | No
---
Status | String | The current status of the payment (for example, `captured`, `failed`, `refunded`). | No
---
Amount | Integer | The total amount of the payment. | No
---
Fee | Integer | The fee associated with the payment. | Yes
---
Tax | Integer | The tax amount applied to the payment. | Yes
---
Receiver ID | String | The ID of the receiver of the payment. | Yes
---
Error Code | String | The error code if the payment failed. | Yes
---
Invoice ID | String | The ID of the invoice associated with this payment. | Yes
---
VPA | String | The Virtual Payment Address (VPA) used for UPI payments. | Yes
---
Error Description | String | A detailed description of the error if the payment failed. | Yes
---
Receiver Type | String | The type of the receiver of the payment. | Yes
---
Bank | String | The bank used for the payment. | Yes
---
Wallet | String | The wallet used for the payment. | Yes
---
Card ID | String | The ID of the card used for the payment. | Yes
---
Description | String | A general description of the payment. | Yes
---
International | Boolean | Indicates if the payment was an international transaction (True/False). | Yes
---
Refund Status | String | The status of any refund associated with this payment. | Yes
---
Amount Refunded | Integer | The amount that has been refunded from this payment. | No
---
Amount Transferred | Integer | The amount transferred out of this payment. | Yes
---
Primary Transaction ID | String | Stores the main transaction identifier from payment gateways.  -  **Netbanking**: bank_transaction_id 
 -  **UPI**: upi_transaction_id 
 -  **Cards/EMI**: ARN (Acquirer Reference Number) for recon 
 - **Wallet**: Transaction ID 
 -  **Pay Later/Cardless EMI**: Transaction ID 
| Yes
---
Retrieval Reference Number | String | **RRN** (Retrieval Reference Number) 
 

Mainly used for UPI transactions as a unique identifier for reconciliation and sometimes for Cards/EMI | Yes
---
Auth Code | String |  -  **Cards/EMI**: Auth code (auth_code) 
 -  **Wallet**: ARN (Acquirer Reference Number) 
 - **Various gateways**: Secondary transaction identifiers 
  | Yes
---
Updated At | Date/Time | Timestamp when the payment record was last updated. | No

## Transfers 

Records the movement of funds from one account or entity to another within the Razorpay ecosystem.

Column Name | Type | Description | Is Nullable?
--- 
Transfer ID | String | Unique identifier for the transfer. | No
---
Amount | Integer | The total amount of the transfer. | No
---
Currency | String | The currency of the transfer. | No
---
Created At | Date/Time | Timestamp when the transfer record was created. | No
---
Amount Reversed | Integer | The amount reversed from this transfer. | Yes
---
Notes | String | Additional notes or comments for the transfer. | Yes
---
Source Type | String | The type of the source for the transfer (for example, 'payment'). | No
---
Source ID | String | The ID of the source entity for the transfer. | No
---
Tax | Integer | The tax amount applied to the transfer. | Yes
---
Fees | Integer | The fees associated with the transfer. | Yes
---
On Hold | Boolean | Indicates if the transferred amount is currently on hold (True/False). | No
---
To ID | String | The ID of the recipient of the transfer. | No
---
On Hold Until | Date/Time | The timestamp until which the transferred amount is on hold. | Yes

## Reversals 

Documents the reversal of previously completed transfers or other financial movements.

Column Name | Type | Description | Is Nullable?
--- 
Reversal ID | String | Unique identifier for the reversal. | No
---
Currency | String | The currency of the reversal. | No
---
Created At | Date/Time | Timestamp when the reversal record was created. | No
---
Amount | Integer | The amount of the reversal. | No
---
Notes | String | Additional notes or comments for the reversal. | Yes

## Customers 

Contains demographic and contact information for the individuals or businesses making payments or associated with transactions.

Column Name | Type | Description | Is Nullable?
---
Customer ID | String | Unique identifier for the customer. | No
---
Customer Name | String | The full name of the customer. | Yes
---
Customer Email | String | The email address of the customer. | Yes
---
Customer Contact | String | The contact number of the customer. | Yes

## Payment Links 

Enables the creation and management of shareable web links for collecting payments.

Column Name | Type | Description | Is Nullable?
---
Payment Link ID | String | Unique identifier for the payment link. | No
---
Title | String | The title or name of the payment link. | Yes

## Contacts 

Stores general contact information for various entities or individuals relevant to your business operations.

Column Name | Type | Description | Is Nullable?
--- 
Contact ID | String | Unique identifier for the contact. | No
---
Contact Name | String | The name of the contact. | No
---
Contact Type | String | The type of contact (for example, 'customer', 'vendor'). | Yes
---
Contact Email | String | The email address of the contact. | Yes
---
Notes | String | Additional notes or comments for the contact. | No
---
Contact Number | String | The contact number of the entity. | Yes
---
Created At | Date/Time | Timestamp when the contact record was created. | No
---
Reference ID | String | An external reference ID for the contact. | Yes

## Fund Accounts 

Consists of details of the bank accounts or other financial instruments used for payouts and settlements.

Column Name | Type | Description | Is Nullable?
---
Fund Account ID | String | Unique identifier for the fund account. | No
---
Account Type | String | The type of fund account (for example, `bank_account`, `vpa`). | No

## Credits 

Represents a form of balance or credit available to a merchant or customer.

Column Name | Type | Description | Is Nullable?
---
Credit Type | String | The type of credit. | No

## Credit Transactions 

Records the specific actions where credits are used or adjusted.

Column Name | Type | Description | Is Nullable?
---
Credits Used | Integer | The number of credits used in the transaction. | No

## Payment Link (Customers) 

Stores customer-specific information related to interactions with payment links.

Column Name | Type | Description | Is Nullable?
--- 
Customer ID | String | Unique identifier of the customer associated with a payment link. | Yes
---
Customer Name | String | The name of the customer. | Yes
---
Customer Email | String | The email address of the customer. | Yes
---
Customer Contact | String | The contact number of the customer. | Yes
