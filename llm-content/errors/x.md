---
title: Error Types
description: Explore the RazorpayX Error Codes and know how to troubleshoot and understand them.
---

# Error Types

RazorpayX aims to make all transactions successful for its customers. Even then, errors might still occur in the financial ecosystem due to intermittent communication and technical issues at multiple levels. 

In RazorpayX, you can identify error codes at the `source` of the response, along with the `reason` for such errors. This will help in minimising the errors reducing the losses.

- [API Error Codes](#api-error-codes)*: These are returned to you when the API does not fire as expected.
- [**Contact Error Codes**](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/contacts.md): These are returned when an error occurs during contact creation.
- [**Fund Account Error Codes**](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/fund-account.md): These are returned when Fund Account creation fails.
- [**Payout Status Details**](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md): These provide the reason for a payouts' state and the next steps to be taken. These are returned in the API response and webhook payloads and are available on the Dashboard.

  
### Advantages of Error Codes

    Error codes can help you build your own logic and take further remedial action at your end, wherever possible. Deriving these insights can help your business to:

  - Map and analyse top failure reasons.
  - Identify the source of failure.
  - Narrow down and understand the cause of the failure (could be due to actions taken by your contact or external factors such as the beneficiary bank or network connectivity).
  - Identify the exact reason of the failure.
  - Handle actionable error codes.
  - Avoid possible integration errors.
  

## API Error Codes

API error codes are sent to you when an API cannot be fired. All successful Razorpay API responses return with HTTP Status code 200.

Razorpay Errors API identifies two types of errors:
- Business: Errors where merchant action is required.
- Internal: Technical errors at Razorpay's server.

In case of a failure, we return a JSON error response that contains the reason for the failure. You can use this response to make changes to the API request body and try to fire them again.

Check [API Error Reason and Next Steps](#api-error-reason-and-next-steps) to understand the reason and troubleshooting procedure.

    
### Sample Code for API Errors

         API errors appear in the format shown below. You can refer to the [API errors troubleshooting steps](#api-error-reason-and-next-steps) to resolve them.
         
         Here is an example of how an error code appears when an API does not fire.

         ```json: Sample Error Response
        {
          "error": {
          "code": "BAD_REQUEST_ERROR",
          "description": "The account number field is required",
          "source": "business",
          "step": "null",
          "reason": "input_validation_failed",
          "metadata": {},
          "field": "account_number"
          }
        }
        ```json: Complete Error Response
        {
          "id": "pout_00000000000001",
          "entity": "payout",
          "fund_account_id": "fa_00000000000001",
          "amount": 1000000,
          "currency": "INR",
          "notes": {
          "notes_key_1": "Tea, Earl Grey, Hot",
          "notes_key_2": "Tea, Earl Grey… decaf."
          },
          "fees": 0,
          "tax": 0,
          "status": "failed",
          "utr": null,
          "mode": "IMPS",
          "purpose": "refund",
          "reference_id": "Acme Transaction ID 12345",
          "narration": "Acme Corp Fund Transfer",
          "batch_id": null,
          "failure_reason": "IMPS is not enabled on Beneficiary Account",
          "created_at": 1545383037,
          "error": {
          "description": "IMPS is not enabled on beneficiary account, Retry with different mode",
          "source": "beneficiary_bank",
          "reason": "imps_not_allowed",
          "code": "NA",
          "step": "NA",
          "metadata": {}
          }
        }
        ```

        `code`
        : `string` Type of the error. For example, `BAD_REQUEST_ERROR`.

        `description`
        : `string` A description for the error. For example, `The id provided does not exist`.

        `source`
        : `string` Possible values:
          - `business`: Merchant action required.
          - `internal`: Technical error at Razorpay's server.

        `reason`
        : `string` The error reason. For example, `input_validation_failed`.

        `step`
        : `NA` Not applicable for API Error Codes, value displayed to maintain consistency of error object.

        `metadata`
        : `Null value` Not applicable for API Error Codes, value displayed to maintain consistency of error object.

        

### API Error Reasons and Next Steps

The below tables lists the API error reasons and the steps to fix them. 

Error Description | Next Steps
---
The requested URL was not found on the server. | Occurs when wrong URL or HTTPS method is passed. Enter the correct URL as per the respective API request. Know more about [API gateway URLs](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x#api-gateway-url.md). If the issue persists, [contact support](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md).
---
Transactions from this IP are not allowed. Contact support for help. | Occurs when the API call is sent from an IP whose server/node is not allowlisted. Always [allowlist IPs](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/allowlist-ip.md).
---
Different request body sent for the same Idempotency Header. | Occurs when the system receives a different payout request body for an existing idempotent header. Ensure that every payout body has a [unique idempotency header](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md).
---
We are facing some trouble completing your request at the moment. Please try again shortly. | Occurs in exceptional cases when there is a server issue at Razorpay's end. Retry safely using an [idempotency request](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) or [contact support](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md).
---

## HTTP Errors

Given below is a list of HTTP error codes, reasons and next steps to fix them.

  
### HTTP Code 400: BAD_REQUEST ERROR

    - **Error Description**: Payout is not in pending state and cannot be approved or rejected.

    - **Source**: business

    - **Reason**: `payout_approval_not_allowed`

    - **Next Steps**: Payout approval is no longer required. No further action required.

    

  
### HTTP Code 401: BAD_REQUEST_AUTHENTICATION_ERROR

    
        
        The OAuth token used in the request was invalid or has expired
        
        - **Source**: business

        - **Reason**: `authentication_failed`

        - **Next Steps**: Please check the OAuth token being used and retry again.

        

        
### The OAuth token used does not have sufficient permissions for this request

        - **Source**: business

        - **Reason**: `authentication_failed`

        - **Next Steps**: Please check the OAuth token being used and retry again.

        

    
    
  

### Handling 5XX Errors

5xx errors occur when servers fail to connect causing network issues during an ongoing payout process. The [idempotency feature](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) is specifically built to handle such network issues. In case of any network issue like timeouts/5xx, you can safely fire the same request again using the same idempotency key and the request body as the original timed out request within 7 calendar days. Razorpay will ensure that the request does not get processed again if it has already been processed on our end.

### Reducing 5XX Errors

If the payout was created in the first request to the RazorpayX system using the same idempotency key, you get the created payout details along with the current [status](@/Applications/MAMP/htdocs/new-docs/llm-content/x/payouts/states-life-cycle#payout-states.md) in the response to the new request.

> **WARN**
>
> 
> **Watch Out!**
> 
> The current status of the payout can be returned as `pending` `processing` or `failed`.
> 

- When retrying a request, the [request body](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payout-idempotency/make-request.md) must be the same as the first request for idempotency to work. A different payload will be rejected as a `BAD_REQUEST`.
- If the payout gets created in the new request, you will receive the payout details with the current status in response to the new request.
- If the retry request times out, you can again retry using the same idempotency key. We recommend doing 3 retries at an interval of 1, 2 and 5 mins for each retry.

### Mark Failed Status of a Payout request with 5XX error

If 5XX error is received on the request or retried request:

1. Check the status of payout using `reference_id` (the same `reference_id` you passed as part of the request) after 5 minutes using [Fetch all payouts API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts/fetch-all.md) up to 1 hour from payout creation time, in case you do not receive webhook within 5 minutes.
2. If you do not receive any status for the payouts using Fetch Payout API for the reference ID provided after 1 hour, then `fail` the payout after 1 hour.

> **INFO**
>
> 
> **Handy Tips**
> 
> After 3 retries, there will be no payout for 1 hour.
> 

## Webhooks 

We recommend you to enable webhooks so that you are alerted of the status updates in any process. By enabling alerts for errors, you can reduce the delay in troubleshooting. 

- You can [Set Up Payout Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md) to configure and receive instant notifications. 
- They are sent whenever a specific [event](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md) occurs. 
- When the configured events are triggered, we send an HTTP POST [payload](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/payouts.md) in JSON to the webhook's configured URL.

### Related Information

- [Contact Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/contacts.md)
- [Fund Account Error Codes](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/fund-account.md)
- [Payout Status Details](@/Applications/MAMP/htdocs/new-docs/llm-content/errors/x/payout-status-details.md)
