---
title: About UPI Autopay
description: Accept UPI Autopay payments from customers with Recurring Payments integration.
---

# About UPI Autopay

Razorpay UPI Autopay enables businesses to offer a frictionless recurring payment experience to their customers using UPI mandates. With one-time authentication via UPI apps like Google Pay, PhonePe or Paytm, customers can authorise recurring payments without having to manually approve every transaction.

Built on top of the NPCI's UPI Autopay framework, Razorpay's solution allows you to easily create, manage and track mandates with full compliance and real-time payment insights. Whether you are a SaaS provider, a D2C brand or a fintech company, UPI Autopay helps you reduce dropoff, improve retention and deliver a superior billing experience.

## How it Works

UPI Autopay operates through a three-phase process that ensures regulatory compliance and seamless recurring payment collection.

    
### Phase 1: Mandate Registration

         UPI mandates for businesses are fundamentally **Payer Initiated Mandates** where customers must explicitly begin the process, even when starting within your business application.

         The customer logs into your application and chooses UPI Autopay for a service (such as monthly subscriptions). They specify the maximum amount, frequency (monthly, weekly or as-presented) and validity period.

         The customer then completes the authorisation transaction and register their UPI. A token will be generated once a customer makes this transaction.

         Using this authorisation transaction, we can authenticate the customer's UPI and ensure that we can charge them recurring payments. This authorisation transaction can be created using Razorpay Standard Checkout or Registration Link.

         [Mandate Registration →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/integrate.md#1-mandate-registration)
        

    
### Phase 2: Fetch Token

         This is a process of fetching the token that contains the registration details of the customer and checking its status.

         A token represents a mandate registration and is generated after the authorisation transaction is successfully captured. A token contains customer's payment details stored by Razorpay and is used to create a recurring payment.

         
         [Token Fetch →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/integrate.md#2-fetch-mandate-registration-details)
        

    
### Phase 3: Subsequent Debits

     This phase represents the actual revenue collection process based on the approved mandate.

    
     A critical regulatory requirement mandates notifying the customer at least 24 hours prior to initiating each debit. This is called Pre-Debit Notification (PDN). This allows customers to ensure fund availability or manage the mandate if needed.

     On the scheduled date, your Acquiring Bank/Payee PSP initiates a Collect Request to the UPI system.

     The UPI system routes the request to the customer's Payer PSP/Remitter Bank. If valid, funds are debited without requiring the customer to enter their UPI PIN again, eliminating the need for additional authentication.

     Funds are transferred and credited to your account following the existing UPI settlement process.

     [Charge Subsequent Payments →](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/recurring-payments/upi/integrate.md#3-charge-customers)
    

## Get Started

Given below are the steps to proceed with UPI Autopay.

    
        If you are new to Razorpay, [set up your account](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/set-up.md) to start accepting payments using UPI Autopay.
    
    
        UPI Autopay is already enabled for existing Razorpay users. To verify activation:
        1. Log in to the Dashboard.
        2. Navigate to **Account & Settings** → **UPI/QR** under **Payment methods**.
        3. Check if UPI Autopay is activated. If not activated, contact your Account Manager or reach out to the [support team](https://razorpay.com/support/).
    

## Setup & Configuration

Razorpay offers two primary approaches for setting up UPI Autopay mandates: Recurring Payments and Subscriptions.

Choose the right approach based on your business model.

Feature | Subscriptions | Recurring Payments
---
**Setup Complexity** | Requires creating Plans first, then Subscriptions for each customer. | Direct token creation and charging without plan structure.
---
**Payment Configuration** | Schedule payments with predefined frequency (weekly, monthly, quarterly and yearly). Razorpay automatically creates debits per the selected frequency. | Cannot auto-schedule debits. You initiate debit requests as needed and Razorpay processes them according to your request.
---
**Intervention for Debits** | Schedule a Plan and Subscription - Razorpay creates debits automatically per the agreed Plan. No intervention required. | You must raise debit requests per your schedule and Razorpay processes them.
---
**Best For** | Predictable, fixed-amount recurring billing | Variable or usage-based charging

**Recommendations:**
- Use **Subscriptions** for predictable, fixed-amount recurring billing. Know more about [Razorpay Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md).
- Use **Recurring Payments (CAW)** for variable or usage-based charging. Given below are the various variants and integration methods available.

    
### Switch from Razorpay Subscriptions to Razorpay Recurring Payments

         [Subscriptions](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/subscriptions.md) allow you to automatically charge your customers at regular intervals. The system handles the scheduling and execution of payments based on predefined plans, reducing manual intervention and ensuring consistent revenue collection.

         As a Razorpay Subscriptions user you can switch to Recurring Payments. Similarly, an existing Recurring Payments user can switch to Subscriptions.
         - **From Subscriptions to CAW:** Reach out to support for guidance on transitioning your existing customer base
         - **From CAW to Subscriptions:** Contact your Account Manager for feature enablement and migration assistance
        

## UPI Autopay Variants & Integration Options

Apart from the regular Razorpay UPI Autopay option, we offer multiple variants to meet your unique business requirements. Also, Razorpay offers multiple checkout integration options. 
- **Standard Checkout**: Quick setup, minimal customisation.
- **Custom Checkout**: Custom UI, branded experience.
- **Server-to-Server (S2S)**: Full control, PCI DSS compliance.

The section below elaborates on each variant type and lists the available integration options.

    
### UPI Autopay

         The standard UPI Autopay solution that helps businesses to offer frictionless recurring payments through UPI mandates. With one-time authentication via UPI apps like Google Pay, PhonePe or Paytm, customers authorise recurring payments without manual approval for each transaction.

         **Available Integrations** 

         
         Integrations | Docs Link
         ---
         Standard Checkout | [Link to Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi/create-authorization-transaction.md)
         ---
         Custom Checkout | [Link to Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom/upi/create-authorization-transaction.md)
         ---
         S2S APIs | - [Link to S2S Collect Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi/authorization-transaction.md)
- [Link to S2S Intent Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-intent/authorization-transaction.md)

         
        

    
### UPI TPV (Third Party Validation)

         Third-Party Validation (TPV) of bank accounts is a mandatory requirement for businesses in the BFSI (Banking, Financial Services and Insurance) sector dealing with Securities, Broking and Mutual Funds. As per Securities and Exchange Board of India (SEBI) guidelines, transactions must be made by the investors only from those bank accounts provided when they registered with your business.

         With Razorpay UPI TPV APIs, you can comply with the SEBI guidelines for online payment collections by offering TPV integrations with major banks.
         
         
         Integrations | Docs Link
         ---
         Standard Checkout | [Link to Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-tpv/create-authorization-transaction.md)
         ---
         Custom Checkout | [Link to Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/custom/upi-tpv/create-authorization-transaction.md)
         ---
         S2S APIs | [Link to Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-tpv/authorization-transaction.md)
         
        

    
### UPI OTM (One Time Mandate)

         Create a one time mandate on UPI to let your customers block an amount and pay later. The amount gets blocked on the customer's bank account and can be debited once within the expiry of the mandate. A one time mandate on UPI can help charge customers post-delivery of products or services, helping make the customer experience delightful for businesses like Ecommerce, Travel, Transport, Healthcare and many more.

         **Example** 

         Gaurav Kumar wants to reserve a room at Acme Hotel. However, he is still determining the travel plan. He wants to pay after check-in.

         Using UPI One Time Mandate, Gaurav Kumar can consent to block the hotel booking amount and only let Acme Hotel debit the amount after check-in.

         
         Integrations | Docs Link
         ---
         Standard Checkout | [Link to Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/recurring-payments/upi-otm/authorization-transaction.md)
         ---
         Custom Checkout | Not Applicable
         ---
         S2S APIs | - [Link to S2S Collect Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/collect/authorization-transaction.md)
- [Link to S2S Intent Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/s2s-integration/recurring-payments/upi-otm/intent/authorization-transaction.md)

         
        

    
### UPI Reserve Pay with Single Block Multiple Debit(SBMD)

         UPI Reserve Pay with Single Block Multiple Debit (SBMD) enables you to block a specific amount in the customer's account and debit smaller amounts multiple times until the blocked amount is exhausted, perfect for usage-based billing models. 

         **Example** 

         Gaurav Kumar using the Acme Quick commerce app authorises a one-time UPI block of ₹2000 for future purchases. When he places a ₹400 order on Monday and a ₹600 order on Wednesday, both amounts are automatically debited from that reserved fund. Gaurav never has to enter a PIN at checkout, making his repeat orders completely frictionless.
        

    
### Irrevocable Mandate

         Irrevocable Mandates (applicable for Lending businesses only) provide enhanced security for recurring transactions by ensuring that once created, cannot be cancelled by the end-user, thus ensuring better collection rates.
        

## Next Steps

1. **Choose Your Integration:** Select between Recurring Payments or Subscriptions based on your business model.
2. **Select Variant and Implementation Method:** Pick the right variant and integration approach that fits your technical requirements.
3. **Test Integration:** Use our test environment to validate your implementation.
4. **Go Live:** Contact support for production enablement and go-live assistance.
