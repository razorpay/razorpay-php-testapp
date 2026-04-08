---
title: Customisation Options
description: Customise the Widget using Razorpay Affordability Widget.
---

# Customisation Options

After you successfully integrate the widget on your website, you can customise the following options:

1. [Offers](#1-offers).
    - Add additional Offers.
    - Show limited Offers.
    - Disable Offers.
2. [Payment Methods](#2-payment-methods) (EMI, Cardless EMI and Pay Later).
	- Configure the list of providers for various payment methods.
	- Disable payment methods.
3. [Themes and Colours](#3-themes-and-colours).
	  - Customise theme colour.
    - Change heading colour and font size.
    - Change content colour, font size and background colour.
    - Change discount value colour.
    - Change button appearance, colour and font size.
    - Change footer colour, font size and logo variants.
    - Enable Dark Mode.

> **WARN**
>
> 
> **Watch Out!**
> 
> Customisations on the widget are not applicable for Checkout.
> 

## Video Tutorial

Watch this video to learn how to customise the Affordability Widget.

[Video: https://www.youtube.com/embed/vLVXL2b-6Z0]

## 1. Offers

Configure the offers you want to display on the website based on your requirement. The customers can make a choice from a wide range of offers available for your product or service. Know how to [create offers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md).

> **INFO**
>
> 
> **Handy Tips**
> 
> By default all the offers which are marked visible on the Dashboard during the offer creation will appear on the widget.
> 

### 1.1 Additional Offers 

By default, all those offers with the **Show Offer on Checkout** option enabled during creation will appear on the widget. Additionally, you can enter the `offer_id` of the offer that did not have the [Show Offer on Checkout](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/offers/create.md#offer-validity:~:text=Show%20Offer%20on%20Checkout) option enabled during offer creation.

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "features": {
    "offers": {
      "list": [
        "offer_ANZoaxsOww2X53"
      ]
    }
  }
}
```

#### Parameters

`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`features.offers` 
: `object` Display a set of additional offers on the widget by passing the `offer_id`

  `list` _optional_
  : `array` Display a list of `offer_id` of the offers.

### 1.2 Limited Offers

By default, all offers which had the **Show Offer on Checkout** option enabled during the offer creation will appear on the widget. In case you want to display limited offers on the widget, enter the `offer_id` of the offers of your choice.

To show limited offers:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "offers": {
      "offerIds": [
        "offer_ANZoaxsOww2X53"
      ]
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display.offers` 
: `object` Display a set of limited offers.
  
  `offerIds` _optional_
  : `array` Unique identifier of the offer. 

### 1.3 Disable the Offers

If you disable the offers completely, they will not appear on the widget and the customers will not be able to view them.

To completely disable the offers:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "offers": false
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display` 
: `object` Display various offers on the widget.

  `offers` _optional_
  : `boolean` Indicates whether the offers should be displayed. Possible values:
   	- `true` (default): Display the offers on the widget.
    - `false`: Disable the offers on the widget.

## 2. Payment Methods

Configure the payment methods you want to display on the website based on your requirement. 

### 2.1 EMI

> **INFO**
>
> 
> **Handy Tips**
> 
> All EMI options applicable for the payment amount will appear on the widget by default. For example, if the payment amount is ₹3000, the widget displays only the suitable EMI options.
> 

#### 2.1.1 Limited Providers for EMI

Razorpay supports [Debit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#5-can-you-provide-a-list-of-the) and [Credit Card](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#1-what-are-the-standard-credit-card-interest) EMI providers for EMI options. By default, all EMI options satisfying the minimum transaction amount will appear on the widget. In case you want to display limited EMI options on the widget, enter the list of **provider codes** based on your requirement.

To show a limited set of providers:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 300000,
  "display": {
    "emi": {
      "issuers": [
        "KKBK"
      ]
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹3000, enter `300000`.

`display.emi.issuers` _optional_
: `array` List of limited set of [providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#1-what-are-the-issuers-that-razorpay-supports) for EMI options.

#### 2.1.2 Disable EMI Options

If you disable the EMI options completely, they will not appear on the widget and the customers will not be able to view them.

To completely disable EMI options:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "emi": false
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display` 
: `object` Display different payment method options on the widget.

  `emi` _optional_
    : `boolean` Indicates whether the EMI options should appear on the widget. Possible values:
   	  - `true` (default): Display the EMI options on the widget.
      - `false`: Disable the EMI options on the widget.

### 2.2 Cardless EMI

> **INFO**
>
> 
> **Handy Tips**
> 
> All Cardless EMI options applicable for the payment amount will appear on the widget by default. For example, if the payment amount is ₹3000, the widget displays only the suitable Cardless EMI options.
> 
 

#### 2.2.1 Limited providers for Cardless EMI

Razorpay supports these [Cardless EMI providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#cardless-emi). By default, all Cardless EMI options satisfying the minimum transaction amount will appear on the widget. In case you want to display limited Cardless EMI options on the widget, enter the list of **provider codes** based on your requirement.

To show a limited set of providers:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 300000,
  "display": {
    "cardlessEmi": {
      "providers": [
        "zestmoney",
        "earlysalary"
      ]
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹3000, enter `300000`.

`display.cardlessEmi.providers` _optional_
: `array` List of limited set of [providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/emi/cardless-emi.md#supported-payment-partners) for Cardless EMI options.

#### 2.2.2 Disable Cardless EMI Options

If you disable the Cardless EMI options completely, they will not appear on the widget and the customers will not be able to view them.

To completely disable Cardless EMI options:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "cardlessEmi": false
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display` 
: `object` Display different payment method options on the widget  pages.

  `cardlessEmi` _optional_
  : `boolean` Indicates whether the Cardless EMI options should appear on the widget. Possible values:
   	- `true` (default): Display the Cardless EMI options on the widget.
    - `false`: Disable the Cardless EMI options on the widget.

### 2.3 Pay Later

> **INFO**
>
> 
> **Handy Tips**
> 
> All Pay Later options applicable for the payment amount will appear on the widget by default. For example, if the payment amount is ₹4000, the widget displays only the suitable Pay Later options.
> 
 

#### 2.3.1 Limited Providers for Pay Later

Razorpay supports these [Pay Later providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#2-what-are-the-standard-interest-rates-charged). By default, all Pay Later options satisfying the minimum transaction amount will appear on the widget. In case you want to display limited Pay Later options on the widget, enter the list of **provider codes** based on your requirement.

To show a limited set of providers:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "paylater": {
      "providers": [
        "lazypay"
      ]
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹100, enter `400000`.

`display.paylater.providers` _optional_
: `array` List of limited set of [providers](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/pay-later.md#providers) for Pay Later options.

#### 2.3.2 Disable Pay Later Options

If you disable the Pay Later options completely, they will not appear on the widget and the customers will not be able to view them.

To completely disable Pay Later options:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "paylater": false
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹100, enter `400000`.

`display` 
: `object` Display different payment method options on the widget.

  `paylater` _optional_
    : `boolean` Indicates whether the Pay Later options should appear on the widget. Possible values:
   	  - `true` (default): Display the Pay Later options on the widget.
      - `false`: Disable Pay Later options on the widget.  

## 3. Themes and Colours

Change the appearance of the widget based on your website. Following are the customisations you can perform on the widget:

### 3.1 Customise Theme Colour (Only Header)

Customise the theme colour based on your requirement. For example, if the background colour of the header is blue, you can change the colour to purple.

![Customise the widget theme colour](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/widget-theme-colour-v2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> - The default theme colour (blue) set on the widget will be considered if no colour is passed here.

> - Only a 6-character HEX code is supported.
> 

To change the theme colour:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "theme": {
    "color": "#800080"
  }
}
```
#### Parameters

`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`theme` 
: `object` Thematic options to modify the appearance of the header.

  `color` _optional_
  : `string` Enter the HEX code of your choice to change the appearance of the header.

### 3.2 Change Heading Colour and Font Size

You can customise the colour and font size of the headings on the widget. For example, if the colour of the heading is white and the font size is 12px you can change the colour to black and the font size to 14px.

![Customise the heading colour and font size](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/widget-heading-v2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The default colour (white) and font size set on the widget will be considered if nothing is passed here.
> 

To change the heading colour and font size: 

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "widget": {
      "main": {
        "heading": {
          "color": "black",
          "fontSize": "14px"
        }
      }
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display.widget.main.heading` 
: `object` Customise the heading on the widget.

  `color` _optional_
  : `string` Enter the colour of your choice.

  `fontSize` _optional_
  : `string` Enter the font size of your choice.

### 3.3 Change Content Colour, Font Size and Background Colour

You can customise the colour and font size of the content on the widget. For example, if the colour of the content is black and the font size is 12px you can change the colour to blue and the font size to 13px.

Additionally, you can also customise the background colour to match the look and feel of your website. 

![Customise the content colour and font size](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/widget-content-v2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The default colour (black), font size and background colour (white) set on the widget will be considered if nothing is passed here.
> 

To change the content colour, font size and background colour: 

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "widget": {
      "main": {
        "content": {
          "backgroundColor": "#e6f0ff",
          "color": "#003380",
          "fontSize": "13px"
        }
      }
    }
  }
}
```
#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display.widget.main.content` 
: `object` Customise the content on the widget.

  `backgroundColor` _optional_
  : `string` Enter the background colour of your choice.

  `color` _optional_
  : `string` Enter the colour of your choice.

  `fontSize` _optional_
  : `string` Enter the font size of your choice.

### 3.4 Change Discount Value Colour

You can customise the colour of the discount value on the widget. For example, if the colour of the value is green, you can change the colour to pink.

![Customise the content colour and font size](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/widget-discount-v2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The default colour (green) set on the widget will be considered if nothing is passed here.
> 

To change the discount value colour:

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "widget": {
      "main": {
        "discount": {
          "color": "#e60099"
        }
      }
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display.widget.main.discount` 
: `object` Customise the discount value on the widget.

  `color` _optional_
  : `string` Enter the colour of your choice.

### 3.5 Change Button Appearance, Colour and Font Size

By default, a button appears on the widget to view the plans, offers and options. You can change the appearance of the button to a link based on your requirement. 

Additionally, you can customise the colour and font size of the link on the widget. For example, if the colour of the link is blue and the font size is 10px you can change the colour to black and the font size to 12px.

![Customise the link colour and font size](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/widget-button-link.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The default colour (blue) and font size set on the widget will be considered if nothing is passed here.
> 

To change the button to a link and its colour and font size: 

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "widget": {
      "main": {
        "link": {
          "button": false, // default is true, shown as a button
          "color": "black",
          "fontSize": "12px"
        }
      }
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display.widget.main.link` 
: `object` Customise the link on the widget.

  `button` _optional_
  : `boolean` Determine the presentation of EMI plans, offers, and Pay Later options. Possible values:
   	- `true` (default): Display the EMI plans, offers and Pay Later options as buttons.
    - `false`: Display the EMI plans, offers and Pay Later options as links.

  `color` _optional_
  : `string` Enter the colour of your choice.

  `fontSize` _optional_
  : `string` Enter the font size of your choice.

### 3.6 Change Footer Colour, Font Size and Logo 

You can customise the colour and font size of the footer on the widget. For example, if the colour of the footer is white and the font size is 10px you can change the colour to black and the font size to 12px.

Razorpay provides customisation option for the logo in two variants:
- Light (default)
- Dark 
![Customise the appearance of the logo on the widget](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/widget-dark-logo-v2.jpg.md)

> **INFO**
>
> 
> **Handy Tips**
> 
> The default colour, font size and Razorpay logo set on the widget will be considered if nothing is passed here.
> 

To change the footer colour, font size and logo: 

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "widget": {
      "main": {
        "footer": {
          "color": "black",
          "fontSize": "12px",
          "darkLogo": true // default is false, shown as light
        }
      }
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display.widget.main.footer` 
: `object` Customise the footer of the widget.

  `color` _optional_
  : `string` Enter the colour of your choice.

  `fontSize` _optional_
  : `string` Enter the font size of your choice.

  `darklogo` _optional_
  : `boolean` Indicates the colour of the Razorpay logo. Possible values:
   	- `true`: Display the Razorpay logo in a darker tone on the widget with a lighter theme colour. 
    - `false` (default): Display the default Razorpay logo on the widget with a darker theme colour. 

### 3.7 Enable Dark Mode

Activate the widget's dark mode when your website utilises dark mode. This is specifically designed for websites with darker background colors, improving the presentation of offers, plans, and options.

![Enable widget dark mode on your website](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/assets/images/widget-dark-mode.jpg.md)

To enable dark mode: 

```js: Add Parameter
{
  "key": "YOUR_KEY_ID",
  "amount": 400000,
  "display": {
    "widget": {
      "main": {
        "isDarkMode": true //default is false
      }
    }
  }
}
```

#### Parameters
 
`key` _mandatory_
: `string` API Key ID generated from the [Dashboard](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/authentication.md#generate-api-keys).

`amount` _mandatory_
: `integer` The amount to be paid by the customer in paise. For example, if the amount is ₹4000, enter `400000`.

`display.widget.main` 
: `object` Customise dark mode on the widget.

  `isDarkMode` _optional_
  : `boolean` Specifies whether dark mode is enabled for the widget. Possible values:
   	- `true`: Displays the widget in dark mode. (recommended for websites with darker background colors)
    - `false` (default): Displays the widget in light mode.

### Related Information

- [Integration steps](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/widget/native-web.md)
- [Affordability Widget FAQs](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/faqs.md#affordability-widget)
- [About Affordability Widget](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-gateway/emi²/widget.md)
