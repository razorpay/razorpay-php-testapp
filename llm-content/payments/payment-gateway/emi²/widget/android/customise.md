---
title: Payment Gateway | Android App - Customisation Options
heading: Customisation Options
description: Customise the Affordability Widget on your Android App.
---

# Customisation Options

After you successfully integrate the widget on your Android app, create a JSON Object as per your customisation requirements and add it as an additional parameter in the `loadwidget()` method. Check all the [customisation options](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget/native-web/customise.md) available.

```java: Java
JSONObject widgetConfig = new JSONObject(
    "{" +
        "\"key\": \"YOUR_KEY_ID\"," + // Enter your Live Key ID generated from the Dashboard
        "\"amount\": 400000," +
        "\"currency\": \"INR\"," +
        "\"display\": {" +
            "\"offers\": false" +
        "}" +
    "}"
);

widget.render(this, widgetConfig);

```kotlin: Kotlin
val widgetConfig = JSONObject(
    """
    {
        "key": "YOUR_KEY_ID", // Enter your Live Key ID generated from the Dashboard
        "amount": 400000,
        "currency": "INR",
        "display": {
            "offers": false
        }
    }
    """.trimIndent()
)

widget.render(this, widgetConfig)
```

### Related Information

- [FAQs](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/faqs.md)
- [About Affordability Widget](@/Applications/MAMP/htdocs/new-docs/llm-content/payments/payment-gateway/emi²/widget.md)
