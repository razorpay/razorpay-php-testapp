---
title: Input Restriction in Custom Fields
description: Add custom fields and implement input restriction methods in your Custom Checkout Form.
---

# Input Restriction in Custom Fields

While using Custom Checkout, you can add custom fields and restrict their input.

```js
var formatter = Razorpay.setFormatter(parentFormElement)

formatter.add('card', cardField)
  .on('change', function() {
    this.value; // contains the latest unformatted value
    this.el; // contains the reference to cardField
    this.prettyValue; // contains formatted value. It might not immediately reflect in DOM
    this.caretPosition; // index at which caret is right now. reflects element.selectionStart
    this.type; // card network. Possible values listed below
    this.maxLen; // maximum permissible length for this type of card
    this.isValid(); // card number validity
  })
  .on('network', function(o) {
    // same params as change event
  })

// restrict format to "MM / YY" format
formatter.add('expiry', expiryField)

// restrict to numbers only. typing characters would not produce anything.
formatter.add('number', numberField)

// this will restrict to numbers, with "+" allowed at first character
formatter.add('contact', contactField)

// unbind events once done
formatter.off()
```

## Change and Network Events

`change`
: Event fired when unformatted value of target input field changes.

`network`
: Event specific to card fields, fired when card type changes.

## Possible Values

`card network type`
  - `visa`
  - `mastercard`
  - `maestro16` (Maestro cards with 16 digits that also have **cvv** and **expiry**)
  - `maestro`
  - `rupay`
  - `American Express`
  - `discover`
  

`maxLen`
  - `15`
  - `16`
  - `19`

```js

```

### Example

Check an example code below:

```js
// shortcut function for document.getElementById
var getEl = document.getElementById.bind(document);
var formatter = Razorpay.setFormatter(getEl('parent-form'));
var cvvField = getEl('card_cvv');

formatter.add('card', getEl('card_number'))
  .on('network', function(o) {

    var type = this.type; // for example, 'visa'

    // set length of cvv element based on mastercard card
    var cvvlen = type === 'amex' ? 4 : 3;
    cvvField.maxLength = cvvlen;
    cvvField.pattern = '^[0-9]{' + cvvlen + '}$';

    getEl('card_type').innerHTML = type;
  })
  .on('change', function() {
    var isValid = this.isValid();
    getEl('card_valid').innerHTML = isValid ? 'valid' : 'invalid';

    // automatically focus next field if card number is valid and filled
    if (isValid && this.el.value.length === this.caretPosition) {
      getEl('card_expiry').focus();
    }
  })

formatter.add('expiry', getEl('card_expiry'))
  .on('change', function() {
    var isValid = this.isValid();
    getEl('expiry_valid').innerHTML = isValid ? 'valid' : 'invalid';

    // automatically focus next field if card number is valid and filled
    if (isValid && this.el.value.length === this.caretPosition) {
      getEl('card_cvv').focus();
    }
  })
```
