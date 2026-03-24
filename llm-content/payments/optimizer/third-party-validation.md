---
title: Third Party Validation on Optimizer
description: Perform Third-Party Validation (TPV) of your customers' bank accounts in real-time on Razorpay Optimizer.
---

# Third Party Validation on Optimizer

Third-Party Validation (TPV) of bank accounts is a mandatory requirement for businesses in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. As per Securities and Exchange Board of India (SEBI) guidelines, customers must only make transactions from those bank accounts provided when registering with your business.

You can use Optimizer and comply with the SEBI guidelines for online payment collections by offering TPV integrations with major bank gateways and payment aggregators at the Checkout. Customers can make payments using netbanking or UPI.

 to get this feature activated on your Razorpay account.

## Prerequisites

1. You need to have an [active Razorpay account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md) with [Optimizer](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/optimizer.md) enabled.
2. [Generate API keys](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys) required to authenticate API requests sent to Razorpay servers.
3. Follow [the integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md#integration-flow) to let Razorpay map the customers' bank accounts to ensure the payment is processed only from their registered bank accounts.
4. Check the [best practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/best-practices.md).
5. Write to your Razorpay and external gateway Relationship Manager to enable **TPV feature flag** for the required payment methods.
6. Ensure you complete the prerequisites of the particular bank or payment gateway before adding it as a provider. 

## Add a Bank or Payment Gateway as a Payment Provider
Given below is an example of how to add BillDesk with TPV support as a payment provider:
1. Log in to your Dashboard.
2. Go to the **PAYMENT PRODUCTS** section and click **Optimizer**.
3. In the top-right section, click **+ Add provider**.
4. Select **Billdesk** in the list of gateways available and click **Next**.
    ![Add Billdesk](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-billdesk2.jpg.md)
5. Enter the provider name and description and click **Next**.
    ![Add Billdesk Provider Name](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/billdesk-provider-name-description.jpg.md)
6. Enter your Client ID and Merchant ID.
7. Select the payment methods and TPV option you want to enable for Billdesk and click **Submit**. 

    ![Add Security ID Billdesk](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/add-security-id2.jpg.md)
You have successfully added **Billdesk** as a payment provider and enabled TPV on Optimizer.

## Supported Bank Gateways, Payment Gateways and Payment Methods
List of banks and payment gateways supported on Optimizer TPV is given below:

    
        
        S No. | Bank Gateways | Payment Methods Supported
        ---
        1 | Axis | UPI and Netbanking
        ---
        2 | HDFC Mindgate | UPI
        ---
        3 | ICICI | UPI
        
    
    
        
        S No. | Gateways | Payment Methods Supported
        ---
        1 | Billdesk | UPI and Netbanking
        ---
        2 | Razorpay | UPI and Netbanking
        ---
        3 | Cashfree | UPI and Netbanking
        ---
        4 | PayU | UPI and Netbanking
        ---
        5 | Pay10 | UPI 
        ---
        6 | ZaakPay | UPI and Netbanking
        ---
        7 | Easebuzz | UPI and Netbanking
        ---
        8 | Ingenico | UPI and Netbanking
        ---
        9 | Atom | UPI and Netbanking
        
    

### Related Information

- [Third Party Validation on Razorpay Standard Integration](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation.md)
- [Best Practices](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/third-party-validation/best-practices.md)
