---
title: Payout Idempotency
description: Use the Payout Idempotency API to retry a request without duplication.
---

# Payout Idempotency

Razorpay uses Idempotency Key for payout API requests, so that the requests can be retried safely. The Idempotency Key is a unique value that you generate which will be used to recognize subsequent retries of the same request. This is useful when an API request is disrupted during transit. Razorpay saves the response to the first request made with an Idempotency Key. Subsequent requests using the same key will return the saved result, thereby avoiding duplication. Hence we recommend you to use the same Idempotency Key for all attempts of the same payout until it is `processed` or `failed`.

  
  

      

      Consider that you are attempting a payout.
      - You have generated an Idempotency Key and initiated the payout. 
      - There is a network issue and the system does not return a `processed` value.
      - After sometime, you retry the payout using the same Idempotency Key. 
      - The system maps both attempts to a single payout because of the same Idempotency Key used.
      - The payout is `processed` only once. There is no duplication because of the same Idempotency Key used.
      - If the payout returns a `failed` state, it means all attempts using the same Idempotency Key are failed.
      - You generate a new key to retry the payout.

    
> **WARN**
>
> 
>      **Watch Out!**
> 
>       - Idempotency key has been made mandatory for all payout requests since March 15, 2025.
>       - Ensure that you do not retry the same payout using a fresh Idempotency Key when the first attempt is still `processing`. The system will treat them as different payouts and will process both resulting in duplication.
>     

      
        

      To use the Payout Idempotency API, you must [create a Contact](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/contacts/create.md) and create a Fund Account (using [bank account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/fund-accounts/create/bank-account.md) details or [VPA](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/fund-accounts/create/vpa.md)). Ensure to [allowlist the IPs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/allowlist-ip.md) that you use while making payouts via APIs or the request will fail. 
        

      Fork the Razorpay Postman Public Workspace and try the Payout Idempotency API using your [Test API Keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/dashboard/api-keys.md).

      [](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/request/12492020-122ae23d-c682-44b1-904f-a56871286f94)
    

    
### Related Guides
 
      [About Payouts](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/x/payouts.md)
      [Set Up Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks/setup-edit-payouts.md)
      [Payouts APIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/x/payouts.md)
    

    
### Endpoints

        - **post** `/v1/payouts` - Make an Idempotent Request: 
          Requests for an idempotent payout.
