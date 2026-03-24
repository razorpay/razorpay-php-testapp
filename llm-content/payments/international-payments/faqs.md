---
title: International Payments | FAQs
description: Find answers to frequently asked questions about Razorpay International Payments.
---

# International Payments | FAQs

### 1. Can I avail the early settlement feature for international payments and reduce my settlement period from T+7 working days?

       Yes, you can apply for early settlement on international payments at an additional charge. Please reach out to our [support team](https://razorpay.com/support/).
      

   
### 2. Can NGOs accept international payments via Razorpay?

       Due to certain compliance guidelines, we cannot provide the international payment feature to NGOs.
      

   
### 3. Do you support companies registered outside India?

       Yes, Razorpay serves businesses registered in India and [Malaysia](http://curlec.com/).
      

   
### 4. How do I display different currencies (other than INR) on the Razorpay Checkout to my customers?

       - You must get the [international payments feature](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#application-process) enabled on your Razorpay account to accept payments in currencies other than INR. 
       - The native currencies like USD and SGD, which are a part of the [list of currencies supported by Razorpay](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies), can be updated as a part of the **currency** parameter on the payment request. 
       -  to display any currencies that are not a part of the above list.
      

   
### 5. Do you support wire transfers for international payments?

      No. Currently, we only support international payments made using cards issued by overseas banks for all the major networks, following are the supported card networks:
      - Visa 
      - Mastercard
      - Amex
      - Diners
      - Discover  
      
> **WARN**
>
> 
>       **Watch Out!**
> 
>       To enable Diners and Discover cards, .
> 
>       

     

   
### 6. What currencies do you support?

      Razorpay supports more than 100 international currencies. Refer to the list of [supported currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies).
     

   
### 7. Is there a list of Razorpay products that support international payments?

      Yes. Know more about the [products that support](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-products) international payments.
     

   
### 8. Who handles the currency conversion?

      - [Supported Currencies](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#supported-currencies): No currency conversion is required. You can pass the payment amount in the native currency. Know more about [Currency Conversion](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/international-payments.md#currency-conversion/).
      - Non-supported Currencies: For the currencies we do not support, you will have to handle conversion at your end and pass it to Razorpay in INR.
     

   
### 9. What is the settlement cycle for international payments?

      The default settlement cycle is as per applicable law(s). You can view your settlement cycle on the Razorpay Dashboard.
     

   
### 10. How does the settlement happen for international payments?

     The Settlement currency is INR (Indian rupees) for all transactions made using Razorpay. Thus, international payments are settled in INR. The exchange rate at the time of the payment creation is considered for conversion.
