---
title: Rainy Day | Payment Downtime API
heading: About Payment Downtime API
description: Downtimes on payment methods and how to receive notifications.
---

# About Payment Downtime API

Downtime is when one or more payment options underperform, leading to considerable delays in payment processing. These downtimes are due to technical issues or outages at Razorpay's partner or issuing banks. Razorpay informs you about the downtime to communicate it to your customers and display only the unaffected payment methods while accepting payments from them.

You can poll the API or configure Webhooks to be notified of the downtimes and plan the remediation steps accordingly.

Downtime communication for the payment methods such as cards, netbanking and UPI is available.

## Entity

```json: Netbanking
{
  "id": "down_F1cxDoHWD4fkQt",
  "method": "netbanking",
  "begin": 1591946222,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "bank": "COSB"
  },
  "created_at": 1591946223,
  "updated_at": 1591946297
}
```json: UPI - VPA Handle
{
  "id": "down_F8LCfthx90fMOo",
  "method": "upi",
  "begin": 1593412063,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "vpa_handle": "oksbi"
  },
  "created_at": 1593412092,
  "updated_at": 1593412092
}
```json: UPI - PSP
{
  "id": "down_F8LCfthx90fMOo",
  "method": "upi",
  "begin": 1593412063,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "psp": "bhim"
  },
  "created_at": 1593412092,
  "updated_at": 1593412092
}
```json: Turbo UPI
{
  "entity": "collection",
  "count": 1,
  "items": [
    {
      "id": "down_F1cxDoHWD4fkQt",
      "entity": "payment.downtime",
      "method": "upi",
      "begin": 1591946222,
      "end": null,
      "status": "started",
      "scheduled": false,
      "severity": "high",
      "instrument": {
        "flow": "in_app"
      },
      "created_at": 1591946223,
      "updated_at": 1591946297
    }
  ]
}
```json: Card - Issuer
{
  "id": "down_F7LroRQAAFuswd",
  "method": "card",
  "begin": 1593196031,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "issuer": "SBIN",
    "card_type": "credit"
  },
  "created_at": 1593196089,
  "updated_at": 1593196089
}

```json: Card - Network
{
  "id": "down_F7LroRQAAFuswd",
  "method": "card",
  "begin": 1593196031,
  "end": null,
  "status": "started",
  "scheduled": false,
  "severity": "high",
  "instrument": {
    "network": "VISA",
    "card_type": "credit"
  },
  "created_at": 1593196089,
  "updated_at": 1593196089
}
```

Given below is a list of the downtime entity parameters.

`id`
: `string` Unique identifier of the downtime's occurrence.

`entity`
: `string` Here, it will be `payment.downtime`.

`method`
: `string` The payment method that is experiencing the downtime. Possible values include:
  - `card`
  - `netbanking`
  - `upi`

`begin`
: `integer` Timestamp (in Unix) that indicates the start of the downtime. Applicable for both scheduled and unscheduled downtimes.

`end`
: `integer` Timestamp (in Unix) that indicates the end of the downtime.
 Available only for scheduled downtimes, where the end-time is known. Set to `null` when the end-time is unknown, possibly during unscheduled downtimes.

`status`
: `string` Status of the downtime.
Possible statuses are.
  - `scheduled`: A downtime is scheduled to happen at a later time.
  - `started`: The downtime has started and is ongoing.
  - `resolved`: The downtime is resolved.
  - `cancelled`: A scheduled downtime that is invalidated. For example, when a scheduled downtime was communicated but was later cancelled by the bank.

`scheduled`
: `boolean` Possible values:
   - `true`: This is a scheduled downtime by the issuer, network, or the bank, which was informed to Razorpay.
   - `false`: This is an unscheduled downtime.

`severity`
: `string` Severity of the downtime.
Possible values:
  -  `high`: Possible when all the payment methods are affected by downtime. Observed when the issuer, bank or network is down.
  - `medium`: Possible when a higher number of declines in transactions or low success rates are observed with the payment methods.
  - `low`: Possible when the reason for the downtime is unknown. Impact on payment methods is minimal.

`instrument`
: Payment method that is underperforming.

  `bank` _if method=netbanking_
  : `string` Bank code of the affected bank. Possible values:
    - `HDFC`
    - `ICIC`
    - `SBIN`
    - `KKBK`
    - `UTIB`
    - `PUNB`

  `network` _if method=card_
  : `string` Card network. Possible values:
    - `AMEX`
    - `DICL`
    - `MC`
    - `RUPAY`
    - `VISA`
    - `ALL`

  `issuer` _if method=card_
  : `string` The 4-character issuer code unique to each issuing bank in India. Possible values:
    - `SBIN`
    - `HDFC`
    - `ICIC`
    - `UTIB`
    - `CITI`
    - `PUNB`  
    - `KKBK`
    - `CNRB`
    - `BKID`
    - `BARB`
    - `JAKA`
    - `UBIN`

  `psp` _if method=upi_
  : `string` Code of the affected Payment Service Provider (PSP). This is populated only when VPA handles associated with the PSP are down. If a PSP is associated with multiple VPA handles, it is marked down only when **all** the handles associated with it are down. For example, `google_pay` is marked down only when all Google Pay handles - `oksbi`, `okhdfcbank`, `okicici` and `okaxis` are down. Possible values for this parameter are:
    - `google_pay`
    - `phonepe`
    - `paytm`
    - `bhim`

  `vpa_handle` _if method=upi_
  : `string` Affected VPA handle. For example, `@oksbi`. To learn about the possible values, refer to the [list of handles supported by NPCI](https://www.npci.org.in/what-we-do/upi/3rd-party-apps). If the entire UPI system is experiencing a downtime, the value `ALL` is displayed.

  `card_type` _if method=card_
  : `string` The card type used to process the payment. Possible values:
    - `credit`
    - `debit`  

`created_at`
: `integer` Timestamp (in Unix) that indicates the time at which the downtime was recorded in Razorpay servers.

`updated_at`
: `integer` Timestamp (in Unix) that indicates the time at which the downtime record was updated in Razorpay servers.

`flow`
: `string` Indicates the UPI payments flow being used during the downtime event. Possible values:
    - `collect`
    - `intent` 
    - `in_app` Only applicable for Turbo UPI payments. 

Know more about [the possible values](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/payments/payment-methods/upi.md).

## Fetch Payment Downtime Details

To retrieve details of payment downtimes, see this [endpoint](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime/fetch-all.md).

## Fetch Payment Downtime Details by ID

To retrieve details of payment downtimes by ID, see this [endpoint](https://raw.githubusercontent.com/razorpay/razorpay-php-testapp/markdown-docs/llm-content/api/payments/downtime/fetch-with-id.md).

## Webhooks

The table below lists the webhook events available for payments downtime.

Webhook Event | Description
---
`payment.downtime.started` | Triggered at the beginning of the downtime.
---
`payment.downtime.resolved` | Triggered when a downtime is resolved.
---
`payment.downtime.updated` | Triggered when a downtime is updated.

### Payment Downtime Started

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "netbanking",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "bank": "VIJB"
        },
        "instrument_schema": ["bank"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Issuer
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "issuer": "SBIN",
          "type": "credit"          
        },
        "instrument_schema": ["issuer", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Network
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "network": "MC",
          "type": "credit"
        },
        "instrument_schema": ["network", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - VPA Handle
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "vpa_handle": "oksbi",
          "flow":"collect"
        },
        "instrument_schema": ["vpa_handle", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - PSP
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "started",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "psp": "bhim",
          "flow":"collect"
        },
        "instrument_schema": ["psp", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Turbo UPI
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.started",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
         "id": "down_F8LCfthx90fMOo",
         "method": "upi",
         "begin": 1593412063,
         "end": null,
         "status": "started",
         "scheduled": false,
         "severity": "high",
         "instrument": {
            "flow": "in_app"
         },
         "created_at": 1593412092,
         "updated_at": 1593412092
       }

    }
  },
  "created_at": 1591935238
}
```

### Payment Downtime Resolved

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "netbanking",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "bank": "COSB"
        },
        "instrument_schema": ["bank"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: Card - Issuer
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "issuer": "SBIN",
          "type": "credit"
        },
        "instrument_schema": ["issuer", "type"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: Card - Network
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "network": "MC",
          "type": "credit"
        },
        "instrument_schema": ["network", "type"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: UPI - VPA Handle
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "vpa_handle": "oksbi",
          "flow":"collect"
        },
        "instrument_schema": ["vpa_handle", "flow"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: UPI - PSP
{
  "entity": "event",
  "account_id": "acc_DjF2cSbjtnqhJ5",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_ENCWhh1lon7Hpp",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1583119550,
        "end": 1583119551,
        "status": "resolved",
        "scheduled": false,
        "severity": "medium",
        "instrument": {
          "psp": "bhim",
          "flow":"collect"
        },
        "instrument_schema": ["psp", "flow"],
        "created_at": 1583119551,
        "updated_at": 1591948663
      }
    }
  },
  "created_at": 1591948663
}

```json: Turbo UPI
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.resolved",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
         "id": "down_F8LCfthx90fMOo",
         "method": "upi",
         "begin": 1593412063,
         "end": null,
         "status": "resolved",
         "scheduled": false,
         "severity": "high",
         "instrument": {
             "flow": "in_app"
         },
         "created_at": 1593412092,
         "updated_at": 1593412092
       }

    }
  },
  "created_at": 1591935238
}
```

### Payment Downtime Updated

```json: Netbanking
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "netbanking",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "bank": "VIJB"
        },
        "instrument_schema": ["bank"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Network
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "network": "MC",
          "type": "credit"
        },
        "instrument_schema": ["network", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Card - Issuer
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "card",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "issuer": "SBIN",
          "type": "credit"
        },
        "instrument_schema": ["issuer", "type"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - VPA Handle
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "vpa_handle": "oksbi",
          "flow": "collect"
        },
        "instrument_schema": ["vpa_handle", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: UPI - PSP
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
        "id": "down_F1Zppa6lcVheSE",
        "entity": "payment.downtime",
        "method": "upi",
        "begin": 1591935238,
        "end": null,
        "status": "updated",
        "scheduled": false,
        "severity": "high",
        "instrument": {
          "psp": "bhim",
          "flow": "collect"
        },
        "instrument_schema": ["psp", "flow"],
        "created_at": 1591935238,
        "updated_at": 1591935238
      }
    }
  },
  "created_at": 1591935238
}

```json: Turbo UPI
{
  "entity": "event",
  "account_id": "acc_CWX291oykl9aZA",
  "event": "payment.downtime.updated",
  "contains": [
    "payment.downtime"
  ],
  "payload": {
    "payment.downtime": {
      "entity": {
         "id": "down_F8LCfthx90fMOo",
         "method": "upi",
         "begin": 1593412063,
         "end": null,
         "status": "updated",
         "scheduled": false,
         "severity": "high",
         "instrument": {
             "flow": "in_app"
         },
         "created_at": 1593412092,
         "updated_at": 1593412092
       }

    }
  },
  "created_at": 1591935238
}
```
