---
title: Tokenisation Webhooks
description: List of webhook events for token status updates.
---

# Tokenisation Webhooks

Use Razorpay Webhooks to configure and receive notifications when a specific event occurs. When one of these events is triggered, we send an HTTP POST payload in JSON to the webhook's configured URL.
    
## Webhook Events for Token Status Updates

The table below lists the webhook events available for tokens.

Event | Description
---
`token.initiated` | Triggered when tokenisation request is initiated.
---
`token.service_provider.activated` | Triggered when, for a given service provider: 
• The token status is changed to `activated` for the first time. 
• The token status for a previously suspended token is changed to `activated` again.
---
`token.service_provider.cancelled` | Triggered when, for a given service provider, the issuing bank temporarily suspends a token.
---
`token.service_provider.deactivated` | Triggered when, for a given service provider, the issuing bank permanently deactivates a token.
---
`token.service_provider.failed` | Triggered when, for a given service provider, the token creation is unsuccessful due to any reason.

> **INFO**
>
> 
> **Handy Tips**
> 
> In case of network tokenised cards, the last 4 digits will be of the tokenised card and not the actual card.
> 

### token.initiated

```json: Initiated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.initiated",
  "contains": [
    "token"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "453335"
        },
        "compliant_with_tokenisation_guidelines": true,
        "expired_at": 1748716199,
        "status": "initiated",
        "notes": []
      }
    }
  }
}
```

### token.service_provider.activated

```json: Activated
{
  "entity": "event",
  "account_id": "acc_BwStjpJx6XTnrr",
  "event": "token.service_provider.activated",
  "contains": [
    "token",
    "service_provider_token",
    "customer"
  ],
  "payload": {
    "token": {
      "entity": {
        "id": "token_P4te1r2wJWRw6u",
        "customer_id": "cust_P3n4TvVcp9CjWr",
        "method": "card",
        "created_at": 1728030886,
        "expired_at": 1827599399,
        "status": "active",
        "notes": [],
        "source": "issuer",
        "entity": "token",
        "card": {
          "last4": "3925",
          "network": "MasterCard",
          "type": "credit",
          "cobranding_partner": null,
          "issuer": "UTIB",
          "international": false,
          "emi": true,
          "sub_type": "consumer",
          "token_iin": "544635553"
        },
        "compliant_with_tokenisation_guidelines": true,
        "service_provider_tokens": [
          {
            "id": "spt_P4te4IRw3GtimW",
            "entity": "service_provider_token",
            "provider_type": "network",
            "provider_name": "mastercard",
            "interoperable": true,
            "provider_data": {
              "token_reference_number": "DM4MMC1IN0000000baba944fc96e4036bfa21e3977e4b1c5",
              "payment_account_reference": "50016T4RAH5SPGJPQUPSSIQCG8P08",
              "token_expiry_month": 11,
              "token_expiry_year": 27
            },
            "status": "active"
          }
        ],
        "customer": {
          "id": "cust_P3n4TvVcp9CjWr",
          "entity": "customer",
          "name": null,
          "email": "qa.testing@razorpay.com",
          "contact": "CONTACT_MASKED",
          "gstin": null,
          "notes": [],
          "created_at": 1727789397
        }
      }
    },
    "service_provider_token": {
      "entity": [
        {
          "id": "spt_P4te4IRw3GtimW",
          "entity": "service_provider_token",
          "provider_type": "network",
          "provider_name": "mastercard",
          "interoperable": true,
          "provider_data": {
            "token_reference_number": "DM4MMC1IN0000000baba944fc96e4036bfa21e3977e4b1c5",
            "payment_account_reference": "50016T4RAH5SPGJPQUPSSIQCG8P08",
            "token_expiry_month": 11,
            "token_expiry_year": 27,
            "card": []
          },
          "status": "active",
          "tokenised_terminal_id": "NSmfkEiYIuPnRg"
        }
      ]
    },
    "customer": {
      "entity": {
        "id": "P3n4TvVcp9CjWr",
        "email": "qa.testing@razorpay.com",
        "contact": "CONTACT_MASKED"
      }
    }
  },
  "created_at": 1728030889
}
```

### Sample Payload for token.service_provider.activated as part of payment

```json: Token activated as part of payment
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.service_provider.activated",
  "contains": [
    "service_provider_token",
    "token"
  ],
  "payload": {
    "service_provider_token": {
      "entity": {
        "id": "spt_1234abcd",
        "entity": "service_provider_token",
        "provider_type": "network",
        "provider_name": "Visa",
        "interoperable": true,
        "status": "activated",
        "provider_data": {
          "token_reference_number": "sas7wqaoidasdfssdjjk",
          "payment_account_reference": "8324ssdas7wqaoidassdjjk",
          "token_iin": "453335",
          "token_expiry_month": 12,
          "token_expiry_year": 2021
        }
      }
    },
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer"
        },
        "compliant_with_tokenisation_guidelines": true,
        "service_provider_tokens": [
          {
            "id": "spt_1234abcd",
            "entity": "service_provider_token",
            "provider_type": "network",
            "provider_name": "Visa",
            "interoperable": true,
            "status": "activated",
            "provider_data": {
              "token_reference_number": "sas7wqaoidasdfssdjjk",
              "payment_account_reference": "8324ssdas7wqaoidassdjjk",
              "token_iin": "453335",
              "token_expiry_month": 12,
              "token_expiry_year": 2021
            }
          },
          {
            "id": "spt_1234abcd",
            "entity": "service_provider_token",
            "provider_type": "aggregator",
            "provider_name": "razorpay",
            "interoperable": false,
            "status": "activated",
            "provider_data": {
              "expired_at": 1748716199
            }
          }
        ],
        "expired_at": 1748716199,
        "status": "activated",
        "notes": []
      }
    },
    "payment": {
      "entity": {
        "id": "pay_FPoJKWQQ8lK13n",
        "entity": "payment",
        "amount": 500000,
        "currency": "INR",
        "base_amount": 500000,
        "status": "captured",
        "order_id": "order_FPoIeimWki9j8A",
        "invoice_id": null,
        "international": false,
        "method": "netbanking",
        "amount_refunded": 190000,
        "amount_transferred": 0,
        "refund_status": "partial",
        "captured": true,
        "description": null,
        "card_id": null,
        "bank": "HDFC",
        "wallet": null,
        "vpa": null,
        "email": "gaurav.kumar@example.com",
        "contact": "+919000090000",
        "notes": [],
        "fee": 11800,
        "tax": 1800,
        "error_code": null,
        "error_description": null,
        "error_source": null,
        "error_step": null,
        "error_reason": null,
        "acquirer_data": {
          "bank_transaction_id": "4827433"
        },
        "created_at": 1597226379
      }
    }
  }
}
```

### token.service_provider.cancelled

```json: Suspended
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.service_provider.cancelled",
  "contains": [
    "service_provider_token",
    "token"
  ],
  "payload": {
    "service_provider_token": {
      "entity": {
        "id": "spt_1234abcd",
        "entity": "service_provider_token",
        "provider_type": "network",
        "provider_name": "Visa",
        "interoperable": true,
        "status": "suspended",
        "provider_data": {
          "token_reference_number": "sas7wqaoidasdfssdjjk",
          "payment_account_reference": "8324ssdas7wqaoidassdjjk",
          "token_iin": "453335",
          "token_expiry_month": 12,
          "token_expiry_year": 2021
        }
      }
    },
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer"
        },
        "compliant_with_tokenisation_guidelines": true,
        "service_provider_tokens": [
          {
            "id": "spt_1234abcd",
            "entity": "service_provider_token",
            "provider_type": "network",
            "provider_name": "Visa",
            "interoperable": true,
            "status": "suspended",
            "provider_data": {
              "token_reference_number": "sas7wqaoidasdfssdjjk",
              "payment_account_reference": "8324ssdas7wqaoidassdjjk",
              "token_iin": "453335",
              "token_expiry_month": 12,
              "token_expiry_year": 2021
            }
          },
          {
            "id": "spt_1234abcd",
            "entity": "service_provider_token",
            "provider_type": "aggregator",
            "provider_name": "razorpay",
            "interoperable": false,
            "status": "activated",
            "provider_data": {
              "expired_at": 1748716199
            }
          }
        ],
        "expired_at": 1748716199,
        "status": "activated",
        "notes": []
      }
    }
  }
}
```

### token.service_provider.deactivated

```json: Deactivated
{
  "entity": "event",
  "account_id": "acc_BFQ7uQEaa7j2z7",
  "event": "token.service_provider.deactivated",
  "contains": [
    "service_provider_token",
    "token"
  ],
  "payload": {
    "service_provider_token": {
      "entity": {
        "id": "spt_1234abcd",
        "entity": "service_provider_token",
        "provider_type": "network",
        "provider_name": "Visa",
        "interoperable": true,
        "status": "deactivated",
        "provider_data": {
          "token_reference_number": "sas7wqaoidasdfssdjjk",
          "payment_account_reference": "8324ssdas7wqaoidassdjjk",
          "token_iin": "453335",
          "token_expiry_month": 12,
          "token_expiry_year": 2021
        }
      }
    },
    "token": {
      "entity": {
        "id": "token_4lsdksD31GaZ09",
        "entity": "token",
        "customer_id": "cust_1Aa00000000001",
        "method": "card",
        "card": {
          "last4": "3335",
          "network": "Visa",
          "type": "debit",
          "issuer": "HDFC",
          "international": false,
          "emi": true,
          "sub_type": "consumer"
        },
        "compliant_with_tokenisation_guidelines": true,
        "service_provider_tokens": [
          {
            "id": "spt_1234abcd",
            "entity": "service_provider_token",
            "provider_type": "network",
            "provider_name": "Visa",
            "interoperable": true,
            "status": "deactivated",
            "provider_data": {
              "token_reference_number": "sas7wqaoidasdfssdjjk",
              "payment_account_reference": "8324ssdas7wqaoidassdjjk",
              "token_iin": "453335",
              "token_expiry_month": 12,
              "token_expiry_year": 2021
            }
          }
        ],
        "expired_at": 1748716199,
        "status": "deactivated",
        "notes": []
      }
    }
  }
}
```

### token.service_provider.failed

```json: Failed
{
  "event": {
    "name": "token.service_provider.failed",
    "id": "RNR8hMNdcxoOdE",
    "service": "api-live",
    "payload": {
      "entity": "event",
      "account_id": "acc_J4wp4KDwgP3sX4",
      "event": "token.service_provider.failed",
      "contains": [
        "token",
        "service_provider_token"
      ],
      "payload": {
        "token": {
          "entity": {
            "id": "token_RNR8fPcREzZ8If",
            "customer_id": null,
            "method": "card",
            "created_at": 1759153135,
            "expired_at": 1885487399,
            "status": "failed",
            "notes": {
              "key1": "value3 new notes",
              "key2": "value2"
            },
            "source": "business",
            "entity": "token",
            "card": {
              "last4": "7474",
              "network": "Visa",
              "type": "debit",
              "cobranding_partner": null,
              "issuer": "ICIC",
              "international": false,
              "emi": false,
              "sub_type": "consumer",
              "token_iin": "442305271"
            },
            "compliant_with_tokenisation_guidelines": true,
            "service_provider_tokens": [
              {
                "id": "spt_RCEc38VJqgSyQ9",
                "entity": "service_provider_token",
                "provider_type": "network",
                "provider_name": "visa",
                "interoperable": true,
                "provider_data": {
                  "token_reference_number": "6f6b884be604faab0b251106abd90d0a",
                  "payment_account_reference": "V0010014623136258585767285530",
                  "token_expiry_month": 9,
                  "token_expiry_year": 2029
                },
                "status": "failed",
                "error": {
                  "code": "BAD_REQUEST_ERROR",
                  "description": "Failed to tokenise the card",
                  "source": "internal",
                  "step": "token_creation",
                  "reason": "token_creation_failed",
                  "metadata": "{}"
                }
              }
            ],
            "error": {
              "code": "BAD_REQUEST_ERROR",
              "description": "Failed to tokenise the card",
              "source": "internal",
              "step": "token_creation",
              "reason": "token_creation_failed",
              "metadata": "{}"
            }
          }
        },
        "service_provider_token": {
          "entity": [
            {
              "id": "spt_RCEc38VJqgSyQ9",
              "entity": "service_provider_token",
              "provider_type": "network",
              "provider_name": "visa",
              "interoperable": true,
              "provider_data": {
                "token_reference_number": "6f6b884be604faab0b251106abd90d0a",
                "payment_account_reference": "V0010014623136258585767285530",
                "token_expiry_month": 9,
                "token_expiry_year": 2029,
                "card": []
              },
              "status": "failed",
              "tokenised_terminal_id": "KHoy17IpWjN99l",
              "error": {
                "code": "BAD_REQUEST_ERROR",
                "description": "Failed to tokenise the card",
                "source": "internal",
                "step": "token_creation",
                "reason": "token_creation_failed",
                "metadata": "{}"
              }
            }
          ]
        }
      },
      "created_at": 1759153136
    },
    "owner_id": "J4wp4KDwgP3sX4",
    "owner_type": "merchant"
  }
}
```
