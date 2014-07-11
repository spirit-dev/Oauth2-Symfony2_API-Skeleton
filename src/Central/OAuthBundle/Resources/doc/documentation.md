Central OAuth Bundle
====================

Welcome to this documentation concerning CentralOauthBundle.

---

Summary:
--------

1. Bundle commands

___

## 1. Bundle commands

The most important command you'll found in this bundle is the following:
```
php app/console central_oauth:client:create
```
You have several important options to have a better scoped command:
```
--redirect-uri="http://your.rediction.com"
--grant-type="your_grant_type"
  # grant type options: autorization_code
                        password
                        refresh_token
                        token
                        client_credentials
```
The following command is a complete example you can use:
```
php app/console central_oauth:client:create --redirect-uri="http://your.rediction.com/" --
grant-type="authorization_code" --grant-type="password" --grant-type="refresh_token" --grant-type="token" --grant-type="
client_credentials"
```