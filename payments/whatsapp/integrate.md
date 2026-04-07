---
title: Integrate Razorpay with WhatsApp Business Account
heading: Integration Steps
description: Steps to integrate Razorpay with your WhatsApp Business Account to accept Razorpay payments on WhatsApp.
---

# Integration Steps

To enable Razorpay - Payments on WhatsApp:
1. [Integrate with WhatsApp Business API](#1-integrate-with-whatsapp-business-api)
2. [Link Razorpay Account to WhatsApp](#2-link-razorpay-account-with-whatsapp)

## 1. Integrate With WhatsApp Business API

You must integrate with the WhatsApp Business API through a Business Service Provider (BSP) to accept Payments on WhatsApp. 

    
### WhatsApp Business API and BSPs

         - WhatsApp Business API provides automated messaging, chatbots, and customisation features. You can send messages in bulk and create customised messaging experiences with chatbots. If you have already integrated with WhatsApp Business API, you will see a green tick next to your business name.
            
        - BSPs are a worldwide community of third-party solution providers for the WhatsApp Business Platform. BSPs assist you in communicating with your clients on the WhatsApp Business Platform for approved use cases such as customer service and time-sensitive, customised notifications.
        

The steps differ based on the current status of your WhatsApp Business API integration.

### New to WhatsApp Business API

If you have not integrated with WhatsApp Business APIs, you can: 

- Fill [this form](https://form.typeform.com/to/ZpLyqJnU?typeform-source=www.google.com), and we will help you find a fully integrated BSP to integrate and go live with just a few clicks.
- Refer to the [Meta Partner directory](https://www.facebook.com/business/partner-directory/search?solution_type=messaging&ref=fmp_about_solution_card&capabilities=Payments&countries=IN&platforms=whatsapp) to find a suitable BSP.

### Already Integrated With WhatsApp Business API

Razorpay has partnered with major BSPs in the country, enabling effortless integration with only a few steps. To integrate with us, contact your BSP to integrate your Razorpay account with the WhatsApp Business API. If your BSP does not offer Razorpay integration, ask them to contact the Meta team.

## 2. Link Razorpay Account With WhatsApp

After integrating with the WhatsApp Business API through a BSP, you need to link your Razorpay account with WhatsApp. The steps differ based on who owns the WhatsApp Business Account (WABA).

- [Self-Owned WABA](#self-owned-waba)
- [BSP-Owned WABA (OBO model)](#bsp-owned-waba-obo-model)

### Self-Owned WABA

If you use a self-owned WABA, follow the below steps to link your Razorpay account with WhatsApp.

1. Log in to your Facebook Business Manager account.
2. Create a **Direct Pay Method**.
3. On the form, fill in details and give the method a name. This will be used to make API calls.
4. Select **Payment Gateway** as the option and choose **Razorpay** in the drop-down menu. 
5. On submission, you will be redirected to Razorpay. Log in and allow Meta to request payments on your behalf.

Know more about [linking self-owned WABA with Razorpay](https://developers.facebook.com/docs/whatsapp/on-premises/payments-api/payments-in/pg#direct-or-embedded-signups).

### BSP-Owned WABA (OBO Model)

If you use a BSP-owned WABA, below is the workflow to link your Razorpay account with WhatsApp.

1. The BSP logs in to WhatsApp Manager.
2. Creates a **Direct Pay Method** and selects **Razorpay** as the payment gateway.
3. Shares the link generated with the business that will redirect them to Razorpay.
4. The business logs in and allows Meta to request payments on their behalf. The business must log in using the Facebook Business Manager account linked to the WABA.

Know more about [linking BSP-owned WABA with Razorpay](https://developers.facebook.com/docs/whatsapp/on-premises/payments-api/payments-in/pg#on-behalf-of--obo--signups).

## Next Steps

After linking your Razorpay account with WhatsApp, you must integrate with [On-premises API](https://developers.facebook.com/docs/whatsapp/on-premises/payments-api/payments-in/pg) or [Cloud API](https://developers.facebook.com/docs/whatsapp/cloud-api/payments-api/payments-in/pg), based on your use case.
