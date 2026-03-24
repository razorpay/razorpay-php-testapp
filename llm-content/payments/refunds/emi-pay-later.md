---
title: EMI and Pay Later Refunds
description: Initiate the process of Refunds for EMI transactions and Pay Later.
---

# EMI and Pay Later Refunds

You can refund payments to customers who have used EMI methods, such as Debit Card EMI, Credit Card EMI, Cardless EMI and so on, offered by different banks that have partnered with Razorpay.

You can also process refunds to your customers who have made payments using the [Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later.md) option. Know more about the various [third-party providers offering Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later.md).

## How EMI and Pay Later Refunds Work

When your customer makes an online purchase using EMI methods on your website or app, the transaction amount is converted into Equated Monthly Instalments (EMIs). Following is the EMI payment flow from the customer to the merchant:

1. Customer purchases for Total_Amt via EMI on your website or app.
2. Bank pays Razorpay (Razorpay_Amt = Total_Amt - Bank Commission).
3. Razorpay pays you (Merchant_Amt = Razorpay_Amt - Razorpay Commission).

> **INFO**
>
> 
> **Handy Tips**
> 
> The EMI includes a portion of the principal outstanding and interest component, which your customer needs to pay every month until the full amount is paid.
> 

## Refund Flow for EMI Transactions

1. You receive a refund request from your customer.
2. You will raise a Refund Request with Razorpay, indicating the amount to be refunded, which is ₹X.
    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     You can set the required payment terms and conditions.
>     

3. Razorpay then passes the Refund Request with the bank, indicating the amount to be refunded.
4. The bank refunds the amount, Min (₹X, Total Principal paid).
    - If ₹X = Total Principal Amount paid by the customer, it is a **Full Refund**.
    - If ₹X  **INFO**
>
> 
>     **Handy Tips**
> 
>     - Your customer may be charged cancellation charges by the bank over and above the refund amount.
>     - The interest paid for EMI payments cannot be refunded.
>     

### Use Cases

    

       If your customer purchases a product from your website or app using the Debit Card EMI option and raises a refund request, only a full refund request can be raised.

        Debit Card EMI does not support multiple partial refunds as order information or product details are not sent to the bank processing the EMI payments. Razorpay team shares the reconciliation file with the bank, and the bank refunds the amount based on the calculations.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         - For DC EMI, only a full refund is allowed. A partial refund is not supported.
>         - The interest paid for EMI payments cannot be refunded and is directly managed by the issuing bank.
>         

       **Examples -  How refund is processed for Debit Cards EMIs**

        - A customer purchases 3 products - Product A, B and C, in a single payment using the Debit Card EMI option. The customer cancels Product A within 5 days of purchase and then cancels Product B on the 7th day. Here, a partial refund will not be supported as there are multiple items/orders, and Razorpay does not provide an order-level split up to the bank. A full refund request can be raised with the bank for all the 3 products.
        - A customer purchases 2 products - Product A (₹2000) and Product B (₹7000). In a 3-month EMI plan, the customer needs to pay an EMI amount of ₹3100 (Total payment of ₹9300 in 3 months). After paying the first installment, the customer returns Product A. In this case, for a Debit Card EMI option, you cannot raise a partial refund request for ₹2000. You will have to raise a full refund request for the entire amount of ₹9000. The interest of ₹100 that the customer paid as part of the first EMI installment cannot be refunded.

        Know more about [Debit Card EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/debit-card-emi.md).
    
    
        If a customer purchases a product on your website or app using the Credit Card EMI option and requests for refund, there can be the following two scenarios in case the refund is processed:

        - For a full refund request made by your customer, the full principal amount is refunded.
        - For a partial refund, the principal amount will be reduced by the amount that has been refunded.

        **Examples -  How refund is processed for Credit Cards EMIs**

        - A customer purchases 2 products - Product A (₹2000) and Product B (₹7000). In a 3-month EMI plan, the customer needs to pay an EMI amount of ₹3100 (Total payment of ₹9300 in 3 months). The customer decides to return both Product A and Product B. In this case, for a Credit Card EMI option, the entire amount of ₹9000 will be refunded to your customer. However, the interest or any other processing charges levied for using the EMI option may not be reversed.
        - A customer purchases 2 products - Product A (₹2000) and Product B (₹7000). In a 3-month EMI plan, the customer needs to pay an EMI amount of ₹3100 (Total payment of ₹9300 in 3 months). The customer decides to return Product A. In this case of partial refund, for a Credit Card EMI option, the principal amount of ₹2000 will be refunded to your customer. The remaining EMIs will be re-calculated basis the new principal amount, which is the Original amount - Refunded amount.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         - The interest paid for EMI payments cannot be refunded and is directly managed by the issuing bank.
>         - Depending on the card issuer and their terms and conditions, the processing charges levied for using the EMI option may or may not be reversed.
>         - Whether it is a full refund or a partial refund, the GST and other charges already levied by the bank may not get refunded.
>         - To cancel a Credit Card EMI, your customer should contact the credit card issuing bank.
>         

        To cancel a Credit Card EMI, your customer must reach out to the bank. Know more about [Credit Card EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi.md).
    
    
      The No Cost EMI Refund process is similar to a normal [EMI Refunds](#refund-flow-for-emi-transactions) process. The only difference is that the Principal Amount used in calculations is the amount after subtracting the discount amount.

        **Example**
        Let us consider the example of buying a mobile phone worth ₹15000 using the No Cost EMI on a 3-month EMI period. The bank charges 15% interest per annum. In this case, the retailer offers a discount of ₹367.33.

        
        **Original Cost of Mobile Phone** | **No Cost EMI Discount Offered by Retailer** | **Net Cost of Phone** | **Total interest to be paid under EMI (In case of purchase on EMI)** | **Final Price** | **EMI for 3 months**
        ---
        ₹15000 | ₹367.33 | ₹14632.67 | ₹367.33 | ₹15000 | ₹5000
        

        In the above example, the Principal Amount = ₹14632.67 (and not ₹15000). The original price is discounted by ₹367.33. This cost is borne by the retailer. For a bank charging 15% interest per annum with an EMI period of 3 months, the discount is 2.45%. The discounted amount is ₹367.33 (₹15000 * 2.45%).
Your customer will pay interest on a discounted amount of ₹14632.67. The interest paid by them would-be ₹367.33.

        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         - Your customer may be charged cancellation charges by the bank over and above the refund amount.
>         - Interest already billed in a particular transaction is not refundable under any circumstances.
>         - The processing charges levied by the bank for using the No Cost EMI option cannot be refunded to the customer.
>         

        Know more about [No Cost EMIs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/no-cost-emi.md).
    
    
        Your customer purchases a product from your website or app using the Cardless EMI option and requests for a refund. Any EMI instalments paid by the customer is refunded to the same payment mode or account that was used to make the payment.
        
> **INFO**
>
> 
>         **Handy Tips**
> 
>         Razorpay does not do calculations for Cardless EMI.
>         

        Know more about [Cardless EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/emi/cardless-emi.md).
    

## Refund Flow for Pay Later

1. You receive a refund request from your customer.
2. You will raise a Refund Request with Razorpay, indicating the amount to be refunded.
3. Razorpay passes the refund request details to the respective [Pay Later providers](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later/#supported-pay-later-providers.md), where the refund takes place before the Payback Period:
    - If it is a **full refund**, your customer’s loan is closed by the respective provider. They are no longer billed to repay this amount.
    - If it is a **partial refund**, your customer is billed and will need to repay the balance amount to the Pay Later provider. Here, the refunded amount gets adjusted against the loan amount.

    
> **INFO**
>
> 
>     **Handy Tips**
> 
>     - The refund will take place within 5-7 business days, depending on the provider’s processing time.
>     - Where the amount is repaid to the Pay Later provider, your customer gets a good credit limit (amount of credit available for use) with the refund amount. This balance amount can be used for subsequent payments.
>     

Know more about [Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-methods/pay-later.md).

## Refund Timelines 

Below is the list of refund timelines supported by cardless EMI and pay later providers.

    
        
        Providers | Refund Timelines
        ---
        axio | 30 days
        ---
        Zestmoney | 1 year
        ---
        Fibe | Infinite
        ---
        InstaCred | Infinite
      
    
    
        
        Providers | Refund Timelines
        ---
        Lazypay | 6 months
        ---
        PayPal | 6 months
        
    

## Frequently Asked Questions (FAQs)

    
### 1. How can the customers track the EMI refund amount in their accounts?

         For the EMI refund, a record is displayed in the customer's bank statement stating the Refund/Reversal amount for the payment towards EMI. The EMI amount refunded to your customer depends upon their bank based on the cancellation fee, processing fee, or any other bank charges.
        

    
### 2. What happens to the EMIs if the customer cancels an order?

         If your customer cancels or returns an order purchased using the Credit Card or Debit Card EMI option, the entire purchase amount is immediately refunded to the customer's card. The EMI is also canceled at your (merchant) end. If the customer has paid any down-payment amount, it is refunded to the customer's card within 5-7 business days. The customers should contact their bank to confirm the EMI cancellation.
        

    
### 3. How will future EMI payments be affected in case there is a pending amount to be paid after a refund?

         Suppose there is a balance amount to be paid by the customer. In that case, the remaining EMIs will be re-calculated basis the new principal amount, which is the Original amount, the refunded amount.
In order to close the loan, the customer has to pay the pending amount and only then it would be complete closure. However, this is a very rare case scenario. Refer to the following examples:
         - A customer purchases 2 products - Product A and Product B. After paying a few EMIs, the customer decides to cancel the complete order. In this case, the customer needs to pay the full refund. The original loan booking amount will be debited in full and get adjusted against the full refund credit. The interest debits done earlier will be credited. However, the customer might need to follow up with the bank to ensure that the EMI transaction is canceled and that no more EMIs are debited.
         - A customer purchases 2 products - Product A (₹2000) and Product B (₹7000). In a 3-month EMI plan, the customer needs to pay an EMI amount of ₹3100 (A total payment of ₹9300 in 3 months). After paying for a couple of monthly installments, the customer returns Product B. In this case, the customer will pay as per the regular EMI plan, that is, without affecting the EMI booking. The refund amount will reflect as a credit on the card. However, the interest already billed will not be reversed.
