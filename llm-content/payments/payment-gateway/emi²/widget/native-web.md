---
title: Integrate the Widget on Your Website
description: Integrate Affordability Widget on your Website to spread awareness about the EMI²-based payment options before they reach checkout.
---

# Integrate the Widget on Your Website

Integrate with Affordability Widget to influence your customer's purchase decisions before they reach checkout by displaying various affordable payment options and offers.

> **INFO**
>
> 
> **Handy Tips**
> 
> Razorpay Affordability Widget is compatible with all JavaScript frameworks like React, Vue, Angular, Svelte and so on.
> 

> **INFO**
>
> 
> 
> **Handy Tips**
> 
> Only the Owner, Admin and Manager roles can enable the widget.
> 

## Integration Steps

Follow the integration steps given below to embed the widget on your website.

1. [Integrate the Widget](#step-1-integrate-the-widget).
2. [Enable the Widget](#step-2-enable-the-widget).

### Step 1: Integrate the Widget 

Follow the integration steps given below to integrate the widget: 

1. Embed the JavaScript file into your website. Copy the snippet and add it to the head section of your website.

	```js: JavaScript
	
	
	
	```

2. Create an HTML element with the below id under the product price. This is to indicate where the affordability widget should appear. 
 
	```js: Add Parameter
	 
	```

3. Copy-paste the following snippet to the JS file and link it to your HTML file. Add the test key ID generated from the [Dashboard](#prerequisites).  

	```js: Add Parameter
	const key = "rzp_test_XXXX00000XXXX"; //Replace it with your Test Key ID generated from the Dashboard
	const amount = 400000; //in paise

	window.onload = function() {
	const widgetConfig = {
		"key": key,
		"amount": amount,
	};
	const rzpAffordabilitySuite = new RazorpayAffordabilitySuite(widgetConfig);
	rzpAffordabilitySuite.render();
	}
	```
	

`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication#generate-api-keys.md). For example, `rzp_test_XXXX00000XXXX`.

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

> **WARN**
>
> 
> **Watch Out!**
> 
> Ensure you pass the final amount in paise to the widget which you want to display to your customers on the product and checkout pages.
> 

You can now preview the widget on your product description page in test mode. Here is a glimpse of the default widget.
![Preview the widget in test mode](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/widget-native-test-v2.jpg.md)

#### Switch to Live Mode

After you preview the widget, switch to live mode and replace the test API keys in the sample code with the live ones to take the integration live. Know more about [live API keys](@/Applications/MAMP/htdocs/new-docs/llm-content/api/authentication/#live-mode-api-keys.md).

### Step 2: Enable the Widget

Once you preview the widget on your product description page, you have to enable the widget to display it on your website for your customers.

## Successful Activation

Here is a glimpse of the default widget with offers and payment method options enabled.

![Glimpse of the default widget](@/Applications/MAMP/htdocs/new-docs/llm-content/assets/images/default-widget1-v2.jpg.md)

> **INFO**
>
> 
> **Minimum Order Limit**
> 
> All the payment method options that are enabled and that satisfy the minimum order limit appear on the widget. Know more about the minimum order limit for:
> - [EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/faqs/#1-what-are-the-standard-credit-card-interest.md) 
> - [Cardless EMI](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/faqs#cardless-emi.md)  
> - [Pay Later](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/faqs#2-what-are-the-standard-interest-rates-charged.md)
> 

> **INFO**
>
> 
> **Feature Enablement**
> 
> Raise a request with our [Support team](https://razorpay.com/support/#request) to integrate Razorpay Affordability Widget with Checkout. Your customers can select an offer/payment option on the widget, proceed to checkout and complete the payment. 
> 

## Next Steps 

After you successfully integrate the widget on your website, you can choose to [customise the widget](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web/customise.md) based on your requirement.

> **INFO**
>
> 
> **Handy Tips**
> 
> - Fill in the [integration support form](https://form.typeform.com/to/Ro3nJPzp) in case you are facing any issues with the integration.
> - In case you have any queries, raise a ticket on the [Razorpay Support Portal](https://razorpay.com/support/).
> 

### Related Information

- [Affordability Widget FAQs for Native website](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/faqs/#native-website.md)
- [ Integrate Affordability Widget on WooCommerce website](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/woocommerce.md)
- [Integrate Affordability Widget on your Shopify store](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/shopify.md) 
- [Integrate Affordability Widget on your Android app](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/android.md)
