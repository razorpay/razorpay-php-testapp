---
title: Contest a Dispute
description: Contest a Dispute using Razorpay Disputes API.
---

# Contest a Dispute

## Contest a Dispute

Use this endpoint to contest a dispute, indicating that you would like to challenge the dispute raised against a payment.

In addition to explicitly contesting a dispute, the contest process can also be triggered by:
- Attaching an evidence document using [Documents API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/documents.md) with having a purpose set to `dispute_evidence`.
- Providing the evidence in textual format.
- Specifying the contest amount (partial or full). The default choice is contesting the full amount if it is not specifically mentioned.

- Ensure you pass the `action` parameter as `submit` to confirm the contest of the dispute. Dispute evidence draft does not get auto-submitted.
- Ensure you provide a minimum of one document for contesting a dispute. Add as many relevant documents as possible to maximise the chances of dispute resolution in your favor.

### Response

```json: Draft
{
  "id": "disp_AHfqOvkldwsbqt",
  "entity": "dispute",
  "payment_id": "pay_EsyWjHrfzb59eR",
  "amount": 10000,
  "currency": "",
  "amount_deducted": 0,
  "reason_code": "chargeback",
  "respond_by": 1590604200,
  "status": "open",
  "phase": "chargeback",
  "created_at": 1590059211,
  "evidence": {
    "amount": 5000,
    "summary": "goods delivered",
    "shipping_proof": [
      "doc_EFtmUsbwpXwBH9",
      "doc_EFtmUsbwpXwBH8"
    ],
    "billing_proof": null,
    "cancellation_proof": null,
    "customer_communication": null,
    "proof_of_service": null,
    "explanation_letter": null,
    "refund_confirmation": null,
    "access_activity_log": null,
    "refund_cancellation_policy": null,
    "term_and_conditions": null,
    "others": [
      {
        "type": "receipt_signed_by_customer",
        "document_ids": [
          "doc_EFtmUsbwpXwBH1",
          "doc_EFtmUsbwpXwBH7"
        ]
      }
    ],
    "submitted_at": null
  }
}

```json: Submit
{
  "id": "disp_AHfqOvkldwsbqt",
  "entity": "dispute",
  "payment_id": "pay_EsyWjHrfzb59eR",
  "amount": 10000,
  "currency": "INR",
  "amount_deducted": 0,
  "reason_code": "chargeback",
  "respond_by": 1590604200,
  "status": "under_review",
  "phase": "chargeback",
  "created_at": 1590059211,
  "evidence": {
    "amount": 5000,
    "summary": "goods delivered",
    "shipping_proof": [
      "doc_EFtmUsbwpXwBH9",
      "doc_EFtmUsbwpXwBH8"
    ],
    "billing_proof": [
      "doc_EFtmUsbwpXwBG9",
      "doc_EFtmUsbwpXwBG8"
    ],
    "cancellation_proof": null,
    "customer_communication": null,
    "proof_of_service": null,
    "explanation_letter": null,
    "refund_confirmation": null,
    "access_activity_log": null,
    "refund_cancellation_policy": null,
    "term_and_conditions": null,
    "others": [
      {
        "type": "receipt_signed_by_customer",
        "document_ids": [
          "doc_EFtmUsbwpXwBH1",
          "doc_EFtmUsbwpXwBH7"
        ]
      }
    ],
    "submitted_at": 1590603200
  }
}
```json: Failure
{
  "error":{
    "code":"BAD_REQUEST_ERROR",
    "description":"The id provided does not exist",
    "source":"business",
    "step":"payment_initiation",
    "reason":"input_validation_failed",
    "metadata":{
      
    }
  }
}
```

### Parameters

`id` _mandatory_
: `string` The unique identifier of the dispute.

### Parameters

`amount` _optional_
: `integer` The amount being contested. If the contest amount is not mentioned, we will assume it to be a full dispute contest.
  
`summary`
: `string` The explanation provided by you for contesting the dispute. It can have a maximum length of 1000 characters.

`shipping_proof`
: `list` List of document ids which serves as proof that the product was shipped to the customer at their provided address. It should show their complete shipping address, if possible.

`billing_proof`
: `list` List of document ids which serves as proof of order confirmation, such as a receipt.

`cancellation_proof`
: `list` List of document ids that serves as proof that this product/service was cancelled.

`customer_communication`
: `list` List of document ids listing any written/email communication from the customer confirming that the customer received the product/service or is satisfied with the product/service.

`proof_of_service`
: `list` List of document ids showing proof of service provided to the customer. 
  
`explanation_letter`
: `list` (List of document ids) Any letter(s) from you specifying information pertinent to the dispute/payment that needs to be considered for processing the dispute.
  
`refund_confirmation`
: `list` List of document ids showing proof that the refund was provided to the customer. 

`access_activity_log`
: `list` List of document ids of any server or activity logs which prove that the customer accessed or downloaded the purchased digital product.

`refund_cancellation_policy`
: `list` List of document ids listing your refund and/or cancellation policy, as shown to the customer.

`term_and_conditions`
: `list` List of document ids listing your sales terms and conditions, as shown to the customer.

  `others`
  : `list` Specifies the evidence documents to be uploaded as a part of contesting a dispute. It is a list of tuples consisting of the following:

    `type` 
    : `string` Describes the custom type of evidence document(s) provided.

    `document_ids` 
    : `list` List of document ids corresponding to the customer evidence type.

    ```json: Example
    [
      {
        "type": "receipt_signed_by_customer",
        "document_ids": [
          "doc_EFtmUsbwpXwBH7",
          "doc_EFtmUsbwpXwBH6"
        ]
      }  
    ]
    ```

`action` _optional_
: `string` The action to be taken for this contest. Possible values:
    - `draft`: Allows you to contest the dispute by updating the dispute entity. This action does not submit the dispute yet. The absence of the key action or a corresponding value would default the action to `draft`.
    - `submit`: Allows you to contest the dispute by updating the dispute entity and submitting the same to Razorpay. You need to provide a minimum of one document id (across any of the evidence object attributes) for a successful submission:
      - Submitting for review would change the status of your dispute from `open` to `under_review`. 
      - It triggers the webhook event `payment.dispute.under_review`.

    Add as many relevant documents as possible to maximise the chances of dispute resolution in your favour.

### Parameters

`id`
: `string` The unique identifier of the dispute generated by Razorpay. For example, `disp_AHfqOvkldwsbqt`.

`entity`
: `string` Indicates the type of entity. In this case, it is `dispute`.

`payment_id`
: `string` The unique identifier of the payment against which the dispute was created. For example, `pay_EsyWjHrfzb59eR`.

`amount`
: `integer` Amount, in currency subunits, for which the dispute was created.

`currency`
: `string` 3-letter ISO currency code associated with the amount. 

`amount_deducted`
: `integer` The amount, in currency subunits, deducted from your Razorpay current balance when the dispute is `lost`. This amount will be `0` unless the status of dispute is updated to `lost`. Know about the different [ states of disputes](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/disputes/#dispute-states.md).

`reason_code`
: `string` Code associated with the reason for the dispute.

`reason_description`
: `string` A brief description of the reason for dispute.

`respond_by`
: `integer` Unix timestamp by which a response should be sent to the customer.

`status`
: `string` The status of the dispute. Possible statuses are:
    - `open`: Indicates that the dispute has been created.
    - `under_review`: Indicates that the issuing bank is reviewing the dispute.
    - `won`: Indicates that the bank has accepted the remedial documents, and you have won the chargeback.
    - `lost`: Indicates that the bank did not accept the remedial documents, and you have lost the chargeback.
    - `closed`: Indicates that the fraudulent transaction was closed after you provided either the transaction details or made a refund to the customer.

`phase`
: `string` Phase associated with the dispute. Possible phases are:
  - `fraud`: A dispute raised by the bank when it suspects a transaction to be fraudulent based on the risk analysis.
   - `retrieval`: A request initiated by the customer with their issuer bank for additional information about a transaction.  
  - `chargeback`: A refund claim initiated by the customers with their issuer banks. In such cases, the bank starts an official inquiry.
  - `pre_arbitration`: A chargeback that you have won is challenged by the customer for the second time.
  - `arbitration`: A chargeback that you have won is challenged for a third time by the customer and the card networks directly getting involved. 

`created_at`
: `integer` Unix timestamp when the dispute was created.

`evidence`
: `object` Provides details of the evidence submitted/saved for contesting a dispute. Use the [Documents API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/documents.md) to securely share documents with Razorpay.

  `amount`
  : `integer` The contested amount in currency subunits, for which evidence is provided. The value can vary from `0` to the dispute amount. The default value is the dispute amount. 
  
  `summary`
  : `string` The explanation provided by you for contesting the dispute. It can have a maximum length of 1000 characters.

  `shipping_proof`
  : `list` List of document ids which serves as proof that the product was shipped to the customer at their provided address. It should show their complete shipping address, if possible.

  `billing_proof`
  : `list` List of document ids which serves as proof of order confirmation, such as a receipt.

  `cancellation_proof`
  : `list` List of document ids that serves as proof that this product/service was cancelled.

  `customer_communication`
  : `list` List of document ids listing any written/email communication from the customer confirming that the customer received the product/service or is satisfied with the product/service.

  `proof_of_service`
  : `list` List of document ids showing proof of service provided to the customer. 
  
  `explanation_letter`
  : `list` (List of document ids) Any letter(s) from you specifying information pertinent to the dispute/payment that needs to be considered for processing the dispute.
  
  `refund_confirmation`
  : `list` List of document ids showing proof that the refund had been provided to the customer. 

  `access_activity_log`
  : `list` List of document ids of any server or activity logs which prove that the customer accessed or downloaded the purchased digital product.

  `refund_cancellation_policy`
  : `list` List of document ids listing your refund and/or cancellation policy, as shown to the customer.

  `term_and_conditions`
  : `list` List of document ids listing your sales terms and conditions, as shown to the customer.

  `others`
  : `list` Specifies the evidence documents to be uploaded as a part of contesting a dispute. It is a list of tuples consisting of the following:

    `type` 
    : `string` Describes the custom type of evidence document(s) provided.

    `document_ids` 
    : `list` List of document ids corresponding to the customer evidence type.

    ```json: Example
    [
      {
        "type": "receipt_signed_by_customer",
        "document_ids": [
          "doc_EFtmUsbwpXwBH7",
          "doc_EFtmUsbwpXwBH6"
        ]
      }  
    ]
    ```

  `submitted_at`
  : `integer` Unix timestamp when the dispute was last submitted by you (for review) to Razorpay. The default value is `null`.

### Errors

The id provided does not exist.
* code: 400
* description: - A wrong prefix is used.
- The dispute id does not exist or does not belong to the requestor.

* solution: - The dispute id must start with `disp_`.
- Use a valid dispute id that belongs to the requestor. 

 
_id is not a valid id.
* code: 400
* description: - The id is not 14 characters long.
- The id is not alphanumeric.

* solution: Use a valid dispute id.

invalid_proof_type is/are not required and should not be sent.
* code: 400
* description: Incorrect parameters are passed in the request body.
* solution: No parameter is required in the request body.

Action not allowed as deadline to respond has elapsed.
* code: 400
* description: The deadline to respond for a dispute has elapsed.
* solution: You can only respond to a dispute within the deadline.

Action not allowed when dispute is in lost status.
* code: 400
* description: This error occurs when you try to perform an action on a dispute with lost status.
* solution: You cannot perform any action on a dispute with lost status.

Action not allowed when dispute is in won status.
* code: 400
* description: This error occurs when you try to perform an action on a dispute with won status.
* solution: You cannot perform any action on a dispute with won status.

Action not allowed when dispute is in closed status.
* code: 400
* description: This error occurs when you try to perform an action on a closed dispute.
* solution: You cannot perform any action on a closed dispute.

Action not allowed when dispute is in under_review status.
* code: 400
* description: This error occurs when you try to perform an action on a dispute under review.
* solution: You cannot perform any action on a dispute under review.

contest amount cannot be greater than dispute amount.
* code: 400
* description: This error occurs when the contest amount is greater than the dispute amount.
* solution: Make sure the contest amount is lesser than the dispute amount.

The selected action is invalid.
* code: 400
* description: This error occurs when you try to perform an invalid action.
* solution: Only valid actions can be performed.

Invalid file id provided or merchant is unauthorized to access the fileId(s) provided
* code: 400
* description: This error occurs when you try to access invalid or unauthorised files.
* solution: Make sure the file is valid or you have access to the file.
