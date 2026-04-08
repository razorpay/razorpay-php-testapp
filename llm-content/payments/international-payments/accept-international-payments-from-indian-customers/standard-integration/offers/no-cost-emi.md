---
title: About No Cost EMI Offers
description: Provide No Cost EMI Offers to customers at the Razorpay Checkout.
---

# About No Cost EMI Offers

No Cost EMI is an offer by which your customer pays the EMI provider only the product price, which is equally divided over the repayment timeline. Know more about [No Cost EMIs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/no-cost-emi.md) as a Razorpay payment method. 

> **WARN**
>
> 
> **Watch Out!**
> 
> - We do not support offers on international currency and the CFB (Customer Fee Bearer) model.
> - We do not support No Cost EMI offers on Cardless EMI.
> 

> **INFO**
>
> 
> **Handy Tips**
> 
> An EMI discount will be applied to the customer's purchase to cover the interest the bank charges. For example, if the bank's interest is ₹100, an EMI discount of ₹100 will be applied to the order, thereby making the effective interest 0.
> 
> The customer will be charged the GST on interest by the bank. This interest and GST will show up on the customer's bank statement.
> 

## Example

Let us consider the example of a customer buying a mobile phone worth ₹15,000 on No Cost EMI on a 3-month EMI period. The bank charges 15% interest per annum. Additionally, the bank may charge the customer GST on the interest.

```
Cost of mobile phone: ₹15,000
Tenure of No Cost EMI: 3 months
Interest Rate: 15% per annum
Interest Amount: ₹367.33
No Cost EMI Amount: ₹5,000
Actual loan amount charged on customer's card (Cost of Mobile Phone minus Interest Amount): ₹14,632.67
```

The No Cost EMI calculation is given below:

Month | Outstanding loan at the start of the month | EMI | Interest | Loan Principal Paid | Outstanding principal at the end of the month | GST on Interest at 18% | EMI + GST
---
1 | 14632.67 | 5000 | 182.91 | 4817.09 | 9815.58 | 32.92 | 5032.92
---
2 | 9815.58 | 5000 | 122.69 | 4877.31 | 4938.27 | 22.09 | 5022.09
---
3 | 4938.27 | 5000 | 61.73 | 4938.27 | Nil | 11.11 | 5011.11
---
Total | | 15000 | 367.33 | 14632.67 | | 66.12 | 15066.12

> **INFO**
>
> 
> **Customers Pay GST on Interest**
> 
> In a no cost EMI, you provide a discount on the principal. The monthly installment paid by the customer consists of this principal and the interest. As the issuing banks still charge the interest, the customer will be charged the GST on interest by the bank.
> 

## Calculation of EMI

EMI is generally calculated using the below formula:

`EMI = [P x R x (1+R)ᴺ]/[(1+R)ᴺ⁻¹]`

where

**P**  = Principal

**R**  = Interest rate per month

**N**  = Number of installations of the EMI

For No Cost EMI, the EMI value is calculated as A/N, where **A** is the price of the product.

From the above example, EMI is ₹15000/3 = ₹5000

We will replace this value in the above equation to calculate the value of P.

`5000 = [P x (0.15/12) x (1+(0.15/12))³]/[(1+(0.15/12))³⁻¹]`

**P** comes out to be ₹14632.67, and the discount borne by you is ₹367.33. This is equal to 2.45% of the original amount.

### Related Information

- [Create No Cost EMI Offers from the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/no-cost-emi/create.md)
- [Integrate No Cost EMI Offers with Standard Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/no-cost-emi/standard-integration.md)
- [Tutorial on How to Create No Cost EMI Offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/no-cost-emi/tutorial.md)
- [No Cost EMI FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments/accept-international-payments-from-indian-customers/standard-integration/offers/low-cost-emi/faqs.md)
- [EMI²](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi².md)
