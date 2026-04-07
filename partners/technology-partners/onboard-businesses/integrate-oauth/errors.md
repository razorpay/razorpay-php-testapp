---
title: Partners OAuth Integration Errors
heading: Errors
description: List of errors that could arise during Razorpay OAuth integration.
---

# Errors

Given below is a list of errors you might face while integrating with Razorpay OAuth. 

## Initiate Authorisation Using URL

Error | Cause | Solution
---
The authorization grant type is not supported by the authorization server. | - The `response_type` is not provided or is not `code`.
- The `client_id` is not provided.
 | - Ensure that you pass the `response_type` as `code`.
- Provide your application `client_id`.

---
A server error occurred while serving this error. | One or more of the following is not provided: - State
- Scope
- Redirect URI
 | Ensure that you enter the state, scope and `redirect_uri`.
---
The requested scope is invalid, unknown or malformed | The scope entered is invalid. | Use a valid scope. Possible values are `read_only` and `read_write`.
---
Client authentication failed | The `client_id` or `redirect_uri` provided is wrong. | Use a valid `client_id` and `redirect_uri`.
---
Access is forbidden | The scope entered is invalid. | Use a valid scope. Possible values are `read_only` and `read_write`.

## Token APIs

Error | Cause | Solution
---
Check the `client_id` parameter | The `client_id` is not provided. | Provide your application `client_id`.
---
Check the `client_secret` parameter | The `client_secret` provided is not a string. | Ensure that the `client_secret` is a string.
---
Invalid Client or Grant type | The `client_id` does not exist. | Use a valid `client_id`.
---
Access denied | The `client_secret` provided is wrong. | Use a valid `client_secret`.
---
Check that all required parameters have been provided | - The `grant_type` provided is invalid.
- The `authorization_code` is not provided.
 | - Use a valid `grant_type`.
- Ensure that you enter the authorisation code.

---
Check the `redirect_uri` parameter | The `redirect_uri` is not provided or is not a string. | Ensure that the `redirect_uri` is a valid string.
---
Client authentication failed | The `redirect_uri` provided does not match the one configured with the client. | Use the `redirect_uri` that is configured with the client.
---
Only allowed modes are test or live | The mode used is not valid. | Only use either live or test mode.
---
Mode can be only set to live for production clients | A production client is using test mode API keys. | Ensure that you only use live API keys if you are a production client.
---
Cannot decrypt the authorization code | The `authorization_code` provided is invalid. | Use a valid authorisation code.
---
Authorization code has expired | The `authorization_code` provided has expired. | Use a valid authorisation code.
---
Authorization code has been revoked | The `authorization_code` provided has been revoked. | Use a valid authorisation code.
---
Authorization code was not issued to this client | The `authorization_code` provided does not belong to the client id used. | Ensure that the `authorization_code` belongs to the client id used.
---
Invalid redirect URI | The `redirect_uri` entered is incorrect. | Ensure that the `redirect_uri` entered matches the one added in the application settings.

### Refresh Token API

In addition to the [Token API errors](#token-apis), you may also face the below errors when refreshing a token.

Error | Cause | Solution
---
Check the `refresh_token` parameter | The refresh token is not provided. | Ensure that you enter the refresh token in the request.
---
Cannot decrypt the refresh token | An invalid refresh token is provided. | Use a valid refresh token.
---
Token is not linked to client | The refresh token provided: - Does not belong to the client id.
- Has expired.
 | Use a valid refresh token that belongs to the client id provided.
---
Token has been revoked | The refresh token provided has been revoked. | Use a valid refresh token.

### Revoke Token API

Error | Cause | Solution
---
Could not validate the token provided | - The access token used is invalid, has expired or has already been revoked.
- The access token used does not belong to the OAuth client id provided.
 | - Use a valid access token that has not been revoked yet.
- Ensure that the access token belongs to the OAuth client id provided.

---
The server encountered an error. The incident has been reported to admins | The server was not able to process the request. | Retry after some time.
