---
title: Payment Gateway | Build Your Own - Integration Steps
heading: Integration Steps
description: Build your own custom plugin to integrate Razorpay with your ecommerce website and start accepting payments.
---

# Integration Steps

- **Troubleshooting & FAQs**: Troubleshoot common error scenarios and find answers to frequently asked questions about building a custom plugin.

You can build a plugin that integrates Razorpay Payment Gateway with websites created using ecommerce platforms such as Spree Commerce.

## Use Cases

Following are some specific cases whose integration is handled on a case-by-case basis:

  
### Donations

     If the platform is used to collect donations, you cannot rely on the amount to be generated on the backend. While you will be ignoring this check, you should still be storing the Razorpay order ID and re-verifying it after payment completion.

     
> **INFO**
>
> 
>      **Handy Tips**
> 
>      We won't be able to activate all non-profits and would be considering such merchants on a case-by-case basis.
>      

    

  
### WebView

     If your website is likely to be accessed mostly in the Facebook browser or via other mobile applications in a WebView, it might face certain issues. Refer to our [Callback URL documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/callback-url.md) for more details on how to handle this.
    

  
### Network Connectivity Issues

     If the customer has an issue with the network connectivity, you will not know of the payment completion from your website. In such cases, you can use our [Webhooks](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/webhooks.md) to get notified of all authorized payments and then you can mark them as successful at your end.
    

## Build Integration

A to-do-list for integration is given below:

  
### 1. Clone the Razorpay Sample Application in Your Language and Test the Payment Flow.

     You can clone any of the sample applications available in our [Integrations](https://razorpay.com/integrations/) page.
    

  
### 2. Integrate with Orders API on the Server Side.

     @include integration-steps/order-creation

     @include integration-steps/store-fields

     @include integration-steps/pass-orderid
    

  
### 3. Display the Checkout Form on Your Website to Your Customer.

     You can display the [Standard Checkout form](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/web-integration/standard.md) on your website to collect payments from customers. Ensure that the `order_id` option is passed along with the other checkout options mentioned below.

     @include checkout-parameters/standard
    

  
### 4. Verify the Signature Post Checkout Form Submission.

     @include integration-steps/verify-signature
    

  
### 5. Display the Confirmation Message to the Customer.

     You must display a `payment successful` message to the customer.
    

  
### 6. Mark the Platform Order as Successful.

     After verifying the signature, fetch the order in your system that corresponds to `razorpay_order_id` in your database. You can now mark this fetched order as successful and process the order.

     You can make a test payment to check whether the integration works.
    

## Common Issues Faced During Integration

Following are some of the common issues that you must watch out for while integrating:

1. Not storing the Razorpay order ID at your end.
1. Passing the amount from the frontend to the Razorpay order creation call.
1. Passing `USD` or any other `non-SGD` currency while creating the order.
1. Passing `razorpay_order_id` from the frontend while verifying the signature.

Alternatively, you can use this value to check the integrity of the signature while looking up the corresponding order at your end with this Razorpay order ID and marking only that as successful.

## Support

If you have queries, raise a ticket on the [Razorpay Support Portal](https://razorpay.com/support/).
