---
title: Account Code
description: Create an Account Code for your Linked Account and use it as an alternative for Linked Account id.
---

# Account Code

When a linked account is created, a unique identifier is generated for it. This account id should be passed in all APIs. For some businesses, this can slow down the process of mapping these account ids to the internal reference values in the database. Also, this affects the integration time for large enterprises that depend on in-house hosting.

Using the Account Code feature on Route, you can now provide aliases during account onboarding via your Dashboard. Therefore, in addition to the linked account id, you can alternatively use aliases to create direct transfers and transfers via orders or payments API.

Suppose you have a linked account called GoodWill Traders North, with an account_id `acc_CNo3jSI8OkFJJJ`. You can use the account code feature to create an alias called `Acme_Corp_North` and use it in the APIs.

Characteristics of the Account Code:
- **Type**
Varchar(255) type
- **Minimum and Maximum length**
Minimum 3 characters and maximum 20 characters length.
- **Allowed characters**
Alphanumeric (A-Z, a-z, 0-9), periods (.), dashes(-) and underscores(_). Alphabets are case-sensitive (A and a will be considered differently).
- **Unique value**
Each linked account must have a unique account code.

An example of an account code is `GoodWill_Traders-1.`

 to get this feature activated on your Razorpay account.

## Use Account Code

Know more about:
- Creation of [Account Code for linked accounts on the Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/account-code/dashboard.md).
- Usage of [Account Code in Transfers API](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/account-code/api.md).

### Related Information

- [Route Product Documentation](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route.md)
- [Route API Reference](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/route.md)
- [Route Dashboard Guide](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/route/batch-upload.md)
