---
title: Payout Links
description: List of Payout Links API endpoints to create, retrieve and cancel Payout Links.
---

# Payout Links

[Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links.md) enable you to make payouts to those Contacts whose Fund Account details are not available. Allowlisting your IP is mandatory for using the Payout Link APIs. Know how to [allowlist your IP](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md).
        

      Fork the Razorpay Postman Public Workspace and try the Payout Links APIs using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/api-keys.md).
        

      [![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-60f1103d-eb2b-454b-8b17-7911e3c9d2f5)
    

    
### Related Guides
 
      [About Payout Links](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payout-links.md)
      [Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
      [Webhook Payloads](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/payout-links.md)
    

    
### Endpoints

        - **post** `/v1/payout-links` - Create a Payout Link (Contact Details): 
          Creates a Payout Link using contact details like email id/mobile number.
        

        - **post** `/v1/payout-links` - Create a Payout Link (Contact ID): 
          Creates a Payout Link using Contact ID.
        

        - **get** `/v1/payout-links` - Fetch All Payout Links: 
          Retrieves all Payout Links created. 
        

        - **get** `/v1/payout-links/:id/` - Fetch Payout Links With ID: 
          Retrieves a particular Payout Link. 
        

        - **post** `/v1/payout-links/:id/post` - Cancel a Payout Link: 
          Cancels a Payout Link.
