---
title: FAQs & Troubleshooting
description: Common questions and solutions for the Razorpay n8n Community Node.
---

# FAQs & Troubleshooting

## General FAQs

  
### 1. What is the Razorpay n8n Community Node?

      The Razorpay n8n Community Node connects Razorpay APIs with the n8n workflow automation platform. It enables you to automate payment operations, build no-code workflows and connect payments with 400+ other services. The node is officially maintained by Razorpay and is open-source.
      
      View [Getting Started Guide](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node.md).
    

  
  
### 2. Do I need a Razorpay account to use this node?

      Yes. You need an active Razorpay account and API keys. There are two types of API keys:
      - **Test Mode** (`rzp_test_*`): Free, no KYC needed, for development.
      - **Live Mode** (`rzp_live_*`): Requires completed KYC, for production.
      
      Generate keys from [Razorpay Dashboard](https://dashboard.razorpay.com/) → **Account & Settings** → **API Keys**.
      
      Start with test mode for safe development.
    

  
  
### 3. What operations are available in the node?

      View [Complete Operations Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node/operations-reference.md) to know about the available operations.
    

  
  
### 4. Can I use webhooks for real-time payment events?

        Currently, the node uses a polling approach to monitor payment events. You can set up automated workflows using the **Cron** node to check for new payments at regular intervals:
        **Polling Workflow**: 

        Cron (every 5 min) → Fetch Payments (last 5 min) → IF (new payments exist) → Process payments
       **Implementation Steps**: 

          1. Add **Cron** node (set interval: every 2-5 minutes).
          2. Add **Razorpay** node (Fetch All Payments operation).
          3. Use date filters: `from` = last check time, `to` = now.
          4. Add **IF** node to check if results exist.
          5. Process new payments in subsequent nodes.
          
          This approach provides near real-time monitoring (2-5 minute delay) and works reliably for most use cases.
      

  
  
### 5. How do I convert rupees to paise for the amount field?

      **Critical**: Razorpay requires amounts in **paise** (smallest currency unit).
      
      **Conversion**: 

      - ₹1 = 100 paise
      - ₹100 = 10,000 paise
      - ₹1,500 = 150,000 paise
      
      **Example**: To create a ₹500 Payment Link, use `amount: 50000`.
    

  
  
### 6. How do I handle pagination for large datasets?

      Use `count` (max 100) and `skip` parameters:
      
      **Example - Fetch 300 Payments**: 

      - Page 1: `count: 100, skip: 0`
      - Page 2: `count: 100, skip: 100`
      - Page 3: `count: 100, skip: 200`
      
      **Implementation**: 

      1. Use **Loop Over Items** or **Split in Batches** node.
      2. Increment `skip` by 100 each iteration.
      3. Add **Wait** node (1-2 sec) between pages to avoid rate limits.
    

  
  
### 7. How do I test my workflows safely?

      **Testing Steps**: 

      
      1. **Use Test Mode**:
         - Create a credential with test keys (`rzp_test_*`).
         - Use [test cards](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payments/test-card-details.md).
         - No real money involved.
      2. **Test in n8n**:
         - Click **Execute Workflow**.
         - Verify each node output.
         - Check for errors.
      3. **Go Live**:
         - Create a separate production workflow.
         - Use live keys (`rzp_live_*`).
         - Test with small amounts first.
         - Monitor execution logs.
      
      Always test thoroughly in test mode before production.
    

## Troubleshooting

  
### 1. I installed the node, but it is not showing up. What should I do?

      **Troubleshooting Steps**: 

      
      1. Verify Installation.
         ```bash
         npm list @razorpay/n8n-nodes-razorpay
         ```
      2. Restart n8n:
         ```bash
         pm2 restart n8n  # or systemctl restart n8n
         ```
      3. Enable Community Nodes:
         - Settings → Community Nodes → Toggle ON
      4. Clear Browser Cache.
      5. Check Version: Minimum n8n v1.104.2
         ```bash
         n8n --version
         ``` 
   

  
  
### 2. I cannot connect - it says my API key is invalid. How do I fix this?

      **Common Causes**:
      - Incorrect Key id or Secret (typos, spaces).
      - Keys regenerated in Dashboard (old keys invalid).
      - Wrong environment (test keys with live data or vice versa).
      
      **Fix**: 

      1. Verify keys in Razorpay Dashboard → **Account & Settings** → **API Keys**.
      2. In n8n, go to **Settings** → **Credentials**.
      3. Edit your Razorpay credentials and update both Key and Secret.
      4. Ensure no leading/trailing spaces.
      5. Test connection.
      
      **Still failing?** Generate new keys and try again.
    

  
  
### 3. I get a "Bad Request" error when creating a Payment Link. What is wrong?

      **Common Causes**: 

      - Missing required fields (amount, currency for Payment Links).
      - Wrong amount format (rupees instead of paise).
      - Invalid field values.
      
      **Fix**: 

      1. Check the error message for the specific field name.
      2. Verify required parameters:
         - **Create Payment Link**: amount (paise), currency required.
         - Amount must be an integer in paise: ₹100 = 10000.
      3. Check [Operations Reference](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node/operations-reference.md) for required fields.
      
      **Example**: For ₹1,500 Payment Link, use `amount: 150000`, not `1500`.
    

  
  
### 4. The workflow says it cannot find my payment or order. What should I check?

      **Common Causes**:
      - Incorrect id format or value.
      - Resource in a different environment (test vs live).
      - Resource from a different Razorpay account.
      
      **Fix**:
      1. Verify id format:
         - Payment: `pay_*`.
         - Order: `order_*`.
         - Refund: `rfnd_*`.
         - Payment Link: `plink_*`.
      2. Ensure API keys match resource environment (test/live).
      3. Copy id directly from Dashboard or previous workflow output.
    

  
  
### 5. My workflow keeps failing with "Too Many Requests". How do I fix this?

      **Common Causes**:
      - Too many API calls in a short period.
      - Polling interval too short.
      - Multiple workflows hitting the same endpoints.
      
      **Fix**: 

      1. Add **Wait** node (1-2 seconds) between operations.
      2. Use **Split in Batches** for bulk operations.
      3. Increase polling interval (5-10 minutes instead of 1 minute).
      4. Use pagination: Fetch max 100 items per request.
      5. Contact Razorpay support for higher limits if needed.
    

  
  
### 6. The amounts in my Payment Links are incorrect. What am I doing wrong?

      **Common Mistakes**: 

      - Entering amount in rupees instead of paise.
      - Not rounding decimal values.
      - Currency mismatch.
      
      **Examples**:
      - ₹1 → 100 paise
      - ₹100 → 10,000 paise
      - ₹1,250.75 → 125,075 paise (rounded to 125,075)
    

  
  
### 7. My workflow times out when fetching payments. How can I fix this?

      **Common Causes**: 

      - Fetching too much data without pagination.
      - Network connectivity issues.
      - API is experiencing high load.
      
      **Fix**: 

      1. **Use Pagination**:
         - Fetch max 100 items per request.
         - Use `count` and `skip` parameters.
      2. **Increase Timeout**: Adjust workflow timeout in n8n settings.
      3. **Check Network**: Verify connectivity to `api.razorpay.com`.
      4. **Add Retry Logic**: Use **Error Trigger** node to catch and retry failures.
    

  
  
### 8. The workflow runs successfully but returns no data. Why is this happening?

      **Common Causes**: 

      - Filters too restrictive (no matching records).
      - Wrong environment (test keys with live data or vice versa).
      - Date range excludes all records.
      - Missing expand parameter for nested data.
      
      **Fix**: 

      1. **Widen Filters**: Check `from` and `to` date ranges.
      2. **Verify Environment**: Test keys only see test data, live keys only see live data.
      3. **Use Expand**: Add `expand[]` parameter for nested objects (for example, `expand[]=card`).
      4. **Test in Dashboard**: Verify data exists in the Razorpay Dashboard with the same filters.
    

### Related Documentation

- [Install the Node](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node/installation.md)
- [Explore Use Cases](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node/use-cases.md)
- [View Operations](@/Applications/MAMP/htdocs/new-docs/llm-content/razorpay-n8n-node/operations-reference.md)
