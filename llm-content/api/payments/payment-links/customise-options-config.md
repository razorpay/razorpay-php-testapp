---
title: Customise Payment Methods - Options and Config Parameters
description: Customise the payment methods available to customers while using Payment Links using Razorpay APIs.
---

# Customise Payment Methods - Options and Config Parameters

## Customise Payment Methods - Options and Config Parameters

Use this endpoint to configure the payment methods of your choice on the Checkout section of the Payment Links to provide a highly personalised experience for your customers.

- You can use the `options` and `config` parameters for greater control over display of specific payment methods or instruments on the Checkout section of Payment Link. 

- For example, you can remove a certain bank from Netbanking or highlight a specific wallet.

- These parameters must be passed along with the `options` and `checkout` parameters mentioned in the Request Parameters section below, along with the [Create Payment Link API](@/Applications/MAMP/htdocs/new-docs/llm-content/api/payments/payment-links/#create-payment-link.md) parameters.

## Use Cases

Depending on the use cases that you might have, Razorpay allows you to create configuration of the payment methods:

  
### Highlighting certain payment instruments on the Checkout

     For example, Google Pay could be displayed outside the UPI block as a separate payment method. HDFC Netbanking could come out of the Netbanking container as a separate payment method.
    

  
### Restricting a particular card or banking network, issuer, BIN and card type, different properties of the card, to accept payments.

     For example, you can choose to accept payments only from **HDFC Visa Debit cards** on the Checkout.
    

  
### Removing a certain payment method or instrument

     For example, OlaMoney can be removed as a payment method from wallets. The entire Netbanking block or a certain bank in Netbanking can be removed from the Checkout.
    

  
### Reordering of payment methods on the Checkout

     You can choose to arrange UPI as the first section instead of Cards on the Checkout. Within the UPI block, you can again order the PSPs, according to your need.
    

  
### Grouping of payment instruments

     For example, you can choose to group Netbanking and UPI payment methods of a bank as a block that will be labelled as Pay via Bank on the Checkout.
    

### Request

```curl: Curl

Use this API endpoint for HDFC Netbanking.

curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#21132",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "config": {
        "display": {
          "blocks": {
            "banks": {
              "name": "Pay using HDFC",
              "instruments": [
                {
                  "method": "netbanking",
                  "banks": [
                    "HDFC"
                  ]
                }
              ]
            }
          },
          "sequence": [
            "block.banks"
          ],
          "preferences": {
            "show_default_blocks": false
          }
        }
      }
    }
  }
}'

Use this API endpoint for Reordered Payment Methods.

curl -u [YOUR_KEY_ID]:[YOUR_KEY_SECRET] \
-X POST https://api.razorpay.com/v1/payment_links/ \
-H 'Content-type: application/json' \
-d '{
  "amount": 1000,
  "currency": "",
  "reference_id": "TSsd3ty1e99uu869",
  "description": "Payment for policy no #23y56",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "options": {
    "checkout": {
      "config": {
        "display": {
          "blocks": {
            "banks": {
              "name": "All Payment Methods",
              "instruments": [
                {
                  "method": "upi"
                },
                {
                  "method": "netbanking"
                },
                {
                  "method": "card",
                  "iins": [
                    "43558"
                  ]
                },
                {
                  "method": "wallet"
                }
              ]
            }
          },
          "sequence": [
            "block.banks"
          ],
          "preferences": {
            "show_default_blocks": false
          }
        }
      }
    }
  }
}'

```javascript: Node.js

Use this API endpoint for HDFC Netbanking.

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#21132",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "config": {
        "display": {
          "blocks": {
            "banks": {
              "name": "Pay using HDFC",
              "instruments": [
                {
                  "method": "netbanking",
                  "banks": [
                    "HDFC"
                  ]
                }
              ]
            }
          },
          "sequence": [
            "block.banks"
          ],
          "preferences": {
            "show_default_blocks": false
          }
        }
      }
    }
  }
})

Use this API endpoint for Reordered Payment Methods.

var instance = new Razorpay({ key_id: 'YOUR_KEY_ID', key_secret: 'YOUR_SECRET' })

instance.paymentLink.create({
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#21132",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "config": {
        "display": {
          "blocks": {
            "banks": {
              "name": "All Payment Methods",
              "instruments": [
                {
                  "method": "upi"
                },
                {
                  "method": "netbanking"
                },
                {
                  "method": "card"
                },
                {
                  "method": "wallet"
                }
              ]
            }
          },
          "sequence": [
            "block.banks"
          ],
          "preferences": {
            "show_default_blocks": false
          }
        }
      }
    }
  }
})

```php: PHP 

Use this API endpoint for HDFC Netbanking.

$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>1000,'currency'=>'INR','accept_partial'=>true,'first_min_partial_amount'=>100,'reference_id'=>'#21132','description'=>'Payment for policy no #23456','customer'=>array('name'=>'','contact'=>'','email'=>'',),'notify'=>array('sms'=>true,'email'=>true,),'reminder_enable'=>true,'options'=>array('checkout'=>array('config'=>array('display'=>array('blocks'=>array('banks'=>array('name'=>'Pay using HDFC','instruments'=>array(0=>array('method'=>'netbanking','banks'=>array(0=>'HDFC',),),),),),'sequence'=>array(0=>'block.banks',),'preferences'=>array('show_default_blocks'=>false,),),),),),));

Use this API endpoint for Reordered Payment Methods.

$api = new Api($key_id, $secret);

$api->paymentLink->create(array('amount'=>1000,'currency'=>'INR','accept_partial'=>true,'first_min_partial_amount'=>100,'reference_id'=>'#21132','description'=>'Payment for policy no #23456','customer'=>array('name'=>'','contact'=>'','email'=>'',),'notify'=>array('sms'=>true,'email'=>true,),'reminder_enable'=>true,'options'=>array('checkout'=>array('config'=>array('display'=>array('blocks'=>array('banks'=>array('name'=>'All Payment Methods','instruments'=>array(0=>array('method'=>'upi',),1=>array('method'=>'netbanking',),2=>array('method'=>'card',),3=>array('method'=>'wallet',),),),),'sequence'=>array(0=>'block.banks',),'preferences'=>array('show_default_blocks'=>false,),),),),),));

```go: Go 

Use this API endpoint for HDFC Netbanking.

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
        "amount": 1000,
        "currency": "INR",
        "accept_partial": true,
        "first_min_partial_amount": 100,
        "reference_id": "#21132",
        "description": "Payment for policy no #23456",
        "customer": map[string]interface{}{
          "name": "",
          "contact": "",
          "email": ",
        },
        "notify": map[string]interface{}{
          "sms": true,
          "email": true,
        },
        "reminder_enable": true,
        "options": map[string]interface{}{
          "checkout": map[string]interface{}{
            "config": map[string]interface{}{
              "display": map[string]interface{}{
                "blocks": map[string]interface{}{
                  "banks": map[string]interface{}{
                    "name": "Pay using HDFC",
                    "instruments": []interface{}{
                        map[string]interface{}{
                            "method": "netbanking",
                            "banks": []string{
                                "HDFC",
                            },
                           },
                    },
                      },
                  },
                },
                "sequence": []string{
                    "block.banks",
                },
                "preferences": map[string]interface{}{
                  "show_default_blocks": false,
                },
              },
            },
          },
        }
            

    body, err := client.PaymentLink.Create(para_attr, nil)

Use this API endpoint for Reordered Payment Methods.

import ( razorpay "github.com/razorpay/razorpay-go" )
client := razorpay.NewClient("YOUR_KEY_ID", "YOUR_SECRET")

para_attr := map[string]interface{}{
        "amount": 1000,
        "currency": "INR",
        "accept_partial": true,
        "first_min_partial_amount": 100,
        "reference_id": "#21132",
        "description": "Payment for policy no #23456",
        "customer": map[string]interface{}{
          "name": "",
          "contact": "",
          "email": "",
        },
        "notify": map[string]interface{}{
          "sms": true,
          "email": true,
        },
        "reminder_enable": true,
        "options": map[string]interface{}{
          "checkout": map[string]interface{}{
            "config": map[string]interface{}{
              "display": map[string]interface{}{
                "blocks": map[string]interface{}{
                  "banks": map[string]interface{}{
                    "name": "Pay using HDFC",
                    "instruments": []interface{}{
                        map[string]interface{}{
                            "method": "netbanking",
                        },
                        map[string]interface{}{
                            "method": "upi",
                        },
                        map[string]interface{}{
                            "method": "wallet",
                        },
                        map[string]interface{}{
                            "method": "card",
                        },
                    },
                      },
                  },
                },
                "sequence": []string{
                    "block.banks",
                },
                "preferences": map[string]interface{}{
                  "show_default_blocks": false,
                },
              },
            },
          },
        }
            

    body, err := client.PaymentLink.Create(para_attr, nil)

```java: Java

 Use this API endpoint for HDFC Netbanking.

 import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
JSONObject paymentLinkRequest = new JSONObject();
paymentLinkRequest.put("amount",1000);
paymentLinkRequest.put("currency","INR");
paymentLinkRequest.put("accept_partial",true);
paymentLinkRequest.put("first_min_partial_amount",100);
paymentLinkRequest.put("expire_by",1691097057);
paymentLinkRequest.put("reference_id","TS1989");
paymentLinkRequest.put("description","Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name","");
customer.put("contact","");
customer.put("email","");
paymentLinkRequest.put("customer",customer);
JSONObject notify = new JSONObject();
notify.put("sms",true);
notify.put("email",true);
paymentLinkRequest.put("reminder_enable",true);
JSONObject checkout = new JSONObject();
JSONObject config = new JSONObject();
JSONObject display = new JSONObject();
List sequence = new ArrayList<>();
JSONObject preference = new JSONObject();
JSONObject banks = new JSONObject();
banks.put("name", "Pay using HDFC");
List instruments = new ArrayList<>();
JSONObject netbanking = new JSONObject();
netbanking.put("method","netbanking");
List bankDetails = new ArrayList<>();
bankDetails.add("HDFC");
netbanking.put("banks", bankDetails);
instruments.add(netbanking);
banks.put("instruments", instruments);
sequence.add("block.banks");
preference.put("show_default_blocks", false);
JSONObject displayObj = new JSONObject();
displayObj.put("blocks", banks);
displayObj.put("sequence",sequence);
displayObj.put("preferences", preference);
config.put("config", display);
display.put("display", displayObj);
checkout.put("checkout", config);
paymentLinkRequest.put("options",checkout);

PaymentLink payment = instance.paymentLink.create(paymentLinkRequest);

Use this API endpoint for Reordered Payment Methods.

 import org.json.JSONObject;
import com.razorpay.Payment;
import com.razorpay.RazorpayClient;
import com.razorpay.RazorpayException;

RazorpayClient razorpay = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
JSONObject paymentLinkRequest = new JSONObject();
paymentLinkRequest.put("amount",1000);
paymentLinkRequest.put("currency","INR");
paymentLinkRequest.put("accept_partial",true);
paymentLinkRequest.put("first_min_partial_amount",100);
paymentLinkRequest.put("expire_by",1691097057);
paymentLinkRequest.put("reference_id","TS1989");
paymentLinkRequest.put("description","Payment for policy no #23456");
JSONObject customer = new JSONObject();
customer.put("name","");
customer.put("contact","");
customer.put("email","");
paymentLinkRequest.put("customer",customer);
JSONObject notify = new JSONObject();
notify.put("sms",true);
notify.put("email",true);
paymentLinkRequest.put("reminder_enable",true);
JSONObject checkout = new JSONObject();
JSONObject config = new JSONObject();
JSONObject display = new JSONObject();
List sequence = new ArrayList<>();
JSONObject preference = new JSONObject();
JSONObject banks = new JSONObject();
banks.put("name", "Pay using HDFC");
List instruments = new ArrayList<>();

JSONObject netbanking = new JSONObject();
netbanking.put("method","netbanking");
JSONObject upi = new JSONObject();
upi.put("method","upi");
JSONObject card = new JSONObject();
card.put("method","card");
JSONObject wallet = new JSONObject();
wallet.put("method","wallet");

instruments.add(netbanking);
instruments.add(upi);
instruments.add(card);
instruments.add(wallet);

banks.put("instruments", instruments);
sequence.add("block.banks");
preference.put("show_default_blocks", false);
JSONObject displayObj = new JSONObject();
displayObj.put("blocks", banks);
displayObj.put("sequence",sequence);
displayObj.put("preferences", preference);
config.put("config", display);
display.put("display", displayObj);
checkout.put("checkout", config);
paymentLinkRequest.put("options",checkout);

PaymentLink paymentlink = instance.paymentLink.create(paymentLinkRequest);

```csharp: .NET

Use this API endpoint for HDFC Netbanking.

RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount", 1000);
paymentLinkRequest.Add("currency", "INR");
paymentLinkRequest.Add("accept_partial", true);
paymentLinkRequest.Add("first_min_partial_amount", 100);
paymentLinkRequest.Add("expire_by", 1691097057);
paymentLinkRequest.Add("reference_id", "TS1989");
paymentLinkRequest.Add("description", "Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("name", "");
customer.Add("contact", "");
customer.Add("email", "");
paymentLinkRequest.Add("customer", customer);
Dictionary notify = new Dictionary();
notify.Add("sms", true);
notify.Add("email", true);
paymentLinkRequest.Add("reminder_enable", true);
Dictionary checkout = new Dictionary();
Dictionary config = new Dictionary();
Dictionary display = new Dictionary();
List sequence = new List();
Dictionary preference = new Dictionary();
Dictionary banks = new Dictionary();
banks.Add("name", "Pay using HDFC");
List instruments = new List();
Dictionary bankingDetails = new Dictionary();
bankingDetails.Add("method", "netbanking");
List instrumentBanks = new List();
instrumentBanks.Add("HDFC");
bankingDetails.Add("banks", instrumentBanks);
instruments.Add(bankingDetails);
banks.Add("instruments", instruments);
sequence.Add("block.banks");
preference.Add("show_default_blocks", false);
Dictionary displayObj = new Dictionary();
displayObj.Add("blocks", banks);
displayObj.Add("sequence", sequence);
displayObj.Add("preferences", preference);
config.Add("config", display);
display.Add("display", displayObj);
checkout.Add("checkout", config);
paymentLinkRequest.Add("options", checkout);

PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);

Use this API endpoint for Reordered Payment Methods.

RazorpayClient client = new RazorpayClient("[YOUR_KEY_ID]", "[YOUR_KEY_SECRET]");
Dictionary paymentLinkRequest = new Dictionary();
paymentLinkRequest.Add("amount", 1000);
paymentLinkRequest.Add("currency", "INR");
paymentLinkRequest.Add("accept_partial", true);
paymentLinkRequest.Add("first_min_partial_amount", 100);
paymentLinkRequest.Add("expire_by", 1691097057);
paymentLinkRequest.Add("reference_id", "TS1989");
paymentLinkRequest.Add("description", "Payment for policy no #23456");
Dictionary customer = new Dictionary();
customer.Add("name", "");
customer.Add("contact", "");
customer.Add("email", "");
paymentLinkRequest.Add("customer", customer);
Dictionary notify = new Dictionary();
notify.Add("sms", true);
notify.Add("email", true);
paymentLinkRequest.Add("reminder_enable", true);
Dictionary checkout = new Dictionary();
Dictionary config = new Dictionary();
Dictionary display = new Dictionary();
List sequence = new List();
Dictionary preference = new Dictionary();
Dictionary banks = new Dictionary();
banks.Add("name", "Pay using HDFC");
List instruments = new List();
Dictionary netbanking = new Dictionary();
netbanking.Add("method", "netbanking");
Dictionary upi = new Dictionary();
upi.Add("method", "upi");
Dictionary card = new Dictionary();
card.Add("method", "card");
Dictionary wallet = new Dictionary();
wallet.Add("method", "wallet");
instruments.Add(netbanking);
instruments.Add(upi);
instruments.Add(card);
instruments.Add(wallet);
banks.Add("instruments", instruments);
sequence.Add("block.banks");
preference.Add("show_default_blocks", false);
Dictionary displayObj = new Dictionary();
displayObj.Add("blocks", banks);
displayObj.Add("sequence", sequence);
displayObj.Add("preferences", preference);
config.Add("config", display);
display.Add("display", displayObj);
checkout.Add("checkout", config);
paymentLinkRequest.Add("options", checkout);

PaymentLink paymentlink = client.PaymentLink.Create(paymentLinkRequest);

```ruby: Ruby

Use this API endpoint for HDFC Netbanking.

Razorpay.setup('key_id', 'key_secret')

Razorpay.headers = {"Content-type" => "application/json"}

para_attr = {
    "amount": 1000,
    "currency": "INR",
    "accept_partial": true,
    "first_min_partial_amount": 100,
    "reference_id": "#21132",
    "description": "Payment for policy no #23456",
    "customer": {
      "name": "",
      "contact": "",
      "email": ""
    },
    "notify": {
      "sms": true,
      "email": true
    },
    "reminder_enable": true,
    "options": {
      "checkout": {
        "config": {
          "display": {
            "blocks": {
              "banks": {
                "name": "Pay using HDFC",
                "instruments": [
                  {
                    "method": "netbanking",
                    "banks": [
                      "HDFC"
                    ]
                  }
                ]
              }
            },
            "sequence": [
              "block.banks"
            ],
            "preferences": {
              "show_default_blocks": false
            }
          }
        }
      }
    }
  }

Razorpay::PaymentLink.create(para_attr)

Use this API endpoint for Reordered Payment Methods.

Razorpay.setup('key_id', 'key_secret')

Razorpay.headers = {"Content-type" => "application/json"}

para_attr = {
    "amount": 1000,
    "currency": "INR",
    "accept_partial": true,
    "first_min_partial_amount": 100,
    "reference_id": "#21132",
    "description": "Payment for policy no #23456",
    "customer": {
      "name": "",
      "contact": "",
      "email": ""
    },
    "notify": {
      "sms": true,
      "email": true
    },
    "reminder_enable": true,
    "options": {
      "checkout": {
        "config": {
          "display": {
            "blocks": {
              "banks": {
                "name": "All Payment Methods",
                "instruments": [
                  {
                    "method": "upi"
                  },
                  {
                    "method": "netbanking"
                  },
                  {
                    "method": "card"
                  },
                  {
                    "method": "wallet"
                  }
                ]
              }
            },
            "sequence": [
              "block.banks"
            ],
            "preferences": {
              "show_default_blocks": false
            }
          }
        }
      }
    }
  }

Razorpay::PaymentLink.create(para_attr)

```python: Python 

Use this API endpoint for HDFC Netbanking.

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#21132",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "config": {
        "display": {
          "blocks": {
            "banks": {
              "name": "Pay using HDFC",
              "instruments": [
                {
                  "method": "netbanking",
                  "banks": [
                    "HDFC"
                  ]
                }
              ]
            }
          },
          "sequence": [
            "block.banks"
          ],
          "preferences": {
            "show_default_blocks": false
          }
        }
      }
    }
  }
})

Use this API endpoint for Reordered Payment Methods.

import razorpay
client = razorpay.Client(auth=("YOUR_ID", "YOUR_SECRET"))

client.payment_link.create({
  "amount": 1000,
  "currency": "INR",
  "accept_partial": true,
  "first_min_partial_amount": 100,
  "reference_id": "#21132",
  "description": "Payment for policy no #23456",
  "customer": {
    "name": "",
    "contact": "",
    "email": ""
  },
  "notify": {
    "sms": true,
    "email": true
  },
  "reminder_enable": true,
  "options": {
    "checkout": {
      "config": {
        "display": {
          "blocks": {
            "banks": {
              "name": "All Payment Methods",
              "instruments": [
                {
                  "method": "upi"
                },
                {
                  "method": "netbanking"
                },
                {
                  "method": "card"
                },
                {
                  "method": "wallet"
                }
              ]
            }
          },
          "sequence": [
            "block.banks"
          ],
          "preferences": {
            "show_default_blocks": false
          }
        }
      }
    }
  }
})

```

### Response

### Parameters

@include payment-links-v2/create-req

`options` _mandatory_
: `array` Options to display or hide payment methods on the Checkout section. Parent parameter under which the `checkout` child parameters must be passed.

  `checkout` _mandatory_
  : `array` The parameter for the Checkout section.

### Parameters

@include payment-links-v2/create-res
