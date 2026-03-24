---
title: Payouts Approval
description: List of Payouts Approval API endpoints to approve/reject payout requests.
---

# Payouts Approval

In Payouts Approval API, the payout can be reviewed by multiple approvers from your [team](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams.md) on the same level of approval. However, the payout is not processed until the [owner](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/create-user-role.md) approves it. 
      

      Payouts Approval API is not available by default. [Contact support](@/Applications/MAMP/htdocs/new-docs/llm-content/x/support.md) to get this feature activated on your account. To use the Approvals APIs, it is mandatory to be a [Technology Partner](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/existing-merchant/#become-a-razorpay-partner.md) and [integrate with OAuth](@/Applications/MAMP/htdocs/new-docs/llm-content/partners/technology-partners/onboard-businesses/integrate-oauth.md). Only then you can make payouts. 

        

      Fork the Razorpay Postman Public Workspace and try the Payouts Approval APIs using your [Test API Keys](@/Applications/MAMP/htdocs/new-docs/llm-content/x/dashboard/api-keys.md). 

        

      [![Run in Postman](https://run.pstmn.io/button.svg)](https://www.postman.com/razorpaydev/workspace/razorpay-public-workspace/folder/12492020-117c93d1-1a79-4958-9067-eb97a3459f08)
    

    
### Related Guides

      [About Approval Workflow](@/Applications/MAMP/htdocs/new-docs/llm-content/x/manage-teams/approval-workflow.md)
      [Set Up Webhooks](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks/setup-edit-payouts.md)
      [Webhook Payloads](@/Applications/MAMP/htdocs/new-docs/llm-content/webhooks.md)
      [Make Payouts](@/Applications/MAMP/htdocs/new-docs/llm-content/api/x/payouts.md)
    

    
### Endpoints

        - **post** `/v1/payouts/:id/approve` - Approve Payouts: 
          Approves the Payout.
        

        - **post** `/v1/payouts/:id/reject` - Reject Payouts: 
          Rejects the Payout.
