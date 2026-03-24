---
title: Certificate Pinning
---

# Certificate Pinning

> **WARN**
>
> 
> **Watch Out!**
> 
> We highly discourage pinning our SSL Certificate to your applications. The certificate provided below is only in case you are mandated by internal policies to whitelist Razorpay's SSL Certificates. You should instead use the [latest CA Bundle](https://curl.haxx.se/docs/caextract.html) provided by your OS.
> 

The latest SSL certificates for `api.razorpay.com` are provided below with dates from which they are considered to be applicable.

 Certificate File | Valid From | Expiry
 ---
 [X1.pem](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/certs-x1.pem.md) & [Chain](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/certs-x1-chain.pem.md) | Feb 7th, 2016 | April 12th, 2019
 ---
 [X2.pem](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/certs-x2.pem.md) & [Chain](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/certs-x2-chain.pem.md) | April 10th, 2019 | April 15th, 2020

The "Valid From" is the date when we plan to roll out the certificate. Expiry Dates are expiration dates for the SSL Certificates. Since we roll out our infrastructure changes on a gradual basis, we recommend whitelisting our certificate as per Valid From/Expiry timelines. If they overlap, you should whitelist all of the certificates in that range.
