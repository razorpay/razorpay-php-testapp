---
title: Contacts
description: List of Contacts APIs to create, retrieve, update and delete RazorpayX Contacts.
---

# Contacts

A contact is an entity to whom payouts can be made through various supported modes like UPI, IMPS, NEFT and RTGS, Cards and more. Know more about [Contacts and Fund Accounts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md). 
 

It is mandatory to [allowlist the IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md) that you use while making payouts via APIs, else the request will fail. In case of errors, you can refer to the error codes in the respective API endpoint pages. 

Fork the Razorpay Postman Public Workspace and try the Contacts APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys.md).

[![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-46855750-fa22-46cd-9fa2-2f294507ec22)

### Related Guides

[About Contacts](@/Applications/MAMP/htdocs/new-docs/llm-content/x/contacts.md)
[Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)

### Endpoints

- **post** `/v1/contacts` - Create a Contact: 
Creates a new Contact with phone number/email id.

- **patch** `/v1/contacts/:id` - Update a Contact: 
Updates a particular Contact's details.

- **get** `/v1/contacts` - Retrieve All Contacts: 
Retrieves all Contacts created in your RazorpayX account. 

- **get** `/v1/contacts/:id` - Retrieve Contact With ID: 
Retrieves a single Contact with ID.

- **patch** `/v1/contacts/:id` - Activate or Deactivate a Contact: 
Activates or deactivates an existing contact.
