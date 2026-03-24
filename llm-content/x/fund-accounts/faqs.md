---
title: RazorpayX Fund Accounts | FAQs
heading: Frequently Asked Questions (FAQs)
description: Find answers to frequently asked questions about RazorpayX Fund Accounts.
---

# Frequently Asked Questions (FAQs)

## Fund Accounts

### 1. What are Fund Accounts?

To make a payout to a Contact, you must [create a Fund Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts/#create-a-contact-with-fund-account.md) associated with that Contact. Payouts made to the Contact are credited to that Fund Account. Thus, its necessary to create a Fund Account to start transacting with the contact. 

There are multiple types of Fund Accounts and RazorpayX supports two types of them.
- Bank account 
- VPA (Virtual Payment Address)

They are necessary to process bank transfers of UPI/VPA payments.

### 2. How do I add bank account for a Contact?

You can add a bank account for a contact by [creating a Fund Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts/#create-a-contact-with-fund-account.md) for that Contact. 
         
1. Select the contact to which you want to add bank account details. 
1. Specify the bank account number, IFSC, bank name and the contact’s full name (as given in their bank records) while creating a Fund Account of the type bank account.

### 3. Can I add the same bank account against multiple Contacts?

Yes. You can add the same bank account against multiple Contacts as per your business needs.

### 4. Can I add multiple bank accounts or VPA addresses to a Contact?

Yes. You can add as many bank accounts and VPA addresses against a Contact as you wish. This creates more than one Fund Account for that Contact.

### 5. What is a VPA and how do I add VPA for a Contact?

VPA stands for Virtual Payment Address. This is required to make UPI based payouts to a person or an entity. 
         
You must provide the Contact’s VPA while [creating a Fund Account](@/Applications/MAMP/htdocs/new-docs/llm-content/x/fund-accounts/#create-a-contact-with-fund-account.md) of type VPA.

## Fund Account Validation

### 1. What is the correct usage of the product?

The bank account/VPA validation service offered is used to validate if the end user's account exists or not. If it does, we share the registered name of the user in the response. 

There are high chances that users might misuse this feature and make multiple validation requests to receive funds. Hence, we request you to keep a check on the number of requests made by a user.

### 2. What are the possible ways to do FAV?

Currently, it can be done via the [Fund Account Validation API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/composite-account-validation.md) only. We do not support validation of Fund Accounts through the Dashboard.

### 3. Can the Current Account be used for FAV?

FAV is only supported for RazorpayX Lite and not the Current Account.

### 4. For VPA validation, does `active` status mean that the underlying bank account is also active?

Yes. The NPCI confirms the validity of the primary account associated with the contact.

    

### 5. If a bank account is deactivated, will the VPA handle linked to it also get deactivated?

The VPA might be active. Since there is no bank account linked to the VPA address, the completed status of a Fund Account Validation Request and the account status will be invalid and the registered name appears as null. 

If this is not the case, please raise [a support query](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support/#razorpayx-users.md).

### 6. What fields are returned after a Fund Account validation?

Upon successful Fund Account Validation, the following fields are returned:
- Account status.
- Registered name of the bank account.

### 7. What will be the response in case the customer has linked multiple bank accounts for a single VPA?

The details of the primary bank account associated with the VPA address are returned.

    

### 8. Are there any charges levied for Fund Account validation for Bank Account and VPA?

- Yes, there is a verification charge for every validation.
- In case the validation moves to a failed state, the charges will be reversed to your account.

For more information on fund account validation charges, please raise [a support query](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support/#razorpayx-users.md).

### 9. What is the time taken for Fund Account Validation to move to a `completed` state?

Most of the Fund Account Validation status moves to `completed` instantaneously. However, if there are any NPCI or Beneficiary Bank issues, there might be a delay of T+3 bank working days.

### 10. Is FAV supported in test mode?

No, it is not supported in [test mode](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/test-mode.md).

### 11. Why is the status `created`, while registered_name and account_status fields are null?

For example, 
"status": "created" 

"results": \{ "account_status": null, "registered_name": null \}
         
The status of Fund account Validation requests is always `created`. To fetch the latest status, you can either: 
- Make a GET call and get the status.
- Subscribe to webhooks and consume the payload for status update.

Know more about [Fund Account Validation statuses](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/account-validation.md).

### 12. How to delete a Fund Account?

It is not possible to delete a Fund Account after it has been created.

### 13. My FAV status is complete but registered_name and account_status are null, why?

If your status is `complete` and the `registered_name` & `account_status` are `null`, it means that the account validation process is completed and the result is that the account is invalid.

## Reverse Penny Drop

### 1. Is the ₹1 refunded to the user?

Yes, the ₹1 payment is automatically refunded to the user in real time once the account validation is complete. There is no manual action required from you or your user.

### 2. Which bank account does Reverse Penny Drop work on?

Reverse Penny Drop works with any bank account linked to a UPI id - covering 99% of Indian bank accounts. Users can pay via any UPI app that they use.

### 3. Is Reverse Penny Drop compliant with the NPCI guidelines?

Yes, reverse penny drop feature is an NPCI-approved validation methodology. Because the transaction is user-initiated and provides a complete audit trail, it meets all regulatory requirements.
