---
title: Create a Fund Account of Type Wallet
description: Create a Fund Account of type the wallet via API.
---

# Create a Fund Account of Type Wallet

## Create a Fund Account of Type Wallet

Use this endpoint to create a Fund Account of the type `wallet`. A new Fund Account is created if any combination of the following details is unique: `contact_id`, `wallet.phone.number`, `wallet.phone.country_code`, and `wallet.email`.

  - If **all** the above details match the details of an existing Fund Account, the API returns details of the existing Fund Account.
  - You cannot edit the details of a Fund Account.

@include rzpx/fund-accounts/fund-account-create-wallet

### Parameters

@include rzpx/fund-accounts/fund-account-create-wallet-req

### Parameters

@include rzpx/fund-accounts/fund-account-create-wallet-res
