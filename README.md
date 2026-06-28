# BrqSMS — WordPress Mobile Number Signup and Login (Sudanese Provider)

> Passwordless, mobile-first signup and login for WordPress. Users register and authenticate with their phone number and a one-time password (OTP) delivered over SMS through the **BrqSMS** gateway.

[![License: GPL v2](https://img.shields.io/badge/License-GPLv2-blue.svg)](LICENSE)
![WordPress](https://img.shields.io/badge/WordPress-5.0%2B-21759b)
![PHP](https://img.shields.io/badge/PHP-5.5%2B-777bb3)

---

## Overview

BrqSMS replaces (or augments) the standard WordPress username/password flow with phone-number authentication:

1. A visitor enters their mobile number.
2. The plugin generates an OTP and sends it as an SMS via the **BrqSMS** gateway.
3. The visitor enters the code and is registered and/or logged in — no password required.

The OTP is generated and verified **inside the plugin**, so the gateway is only responsible for delivering the message. This keeps the integration simple and reliable.

BrqSMS is **open source** (GPLv2). There is no license key and no activation — install it and go.

## Features

- **Passwordless mobile login & registration** with OTP verification
- **BrqSMS SMS gateway** built in — BrqSMS v3 REST API, Bearer-token auth
- **Automatic unicode handling** — Arabic and other non-Latin OTP messages are sent correctly
- **WooCommerce integration** — phone field on checkout, account registration, and login
- **Native forms & shortcodes** — login, registration, forgot-password, edit-phone, logout, and modal variants
- **WhatsApp & email OTP** as alternative delivery channels
- **Two-factor / OTP on `wp-login.php`**
- **Brute-force protection** and configurable OTP rules (length, resend timer, expiry)
- **CAPTCHA support** on forms
- **WPML-ready** — message templates and key strings registered for translation
- **Localized** — ships with English and Arabic
- **Other gateways still available** — Twilio, MSG91, Firebase, MessageBird, Plivo, Nexmo, Clickatell and more remain selectable; BrqSMS is the default

## Requirements

| Requirement | Minimum |
|-------------|---------|
| WordPress   | 5.0     |
| PHP         | 5.5     |
| PHP ext.    | cURL, and GMP **or** BCMath |

## Installation

### From a release zip

1. Download `barq.zip` from the [latest release](https://github.com/amolood/brqsms-wordpress/releases/latest).
2. In WordPress, go to **Plugins → Add New → Upload Plugin** and upload the zip.
3. Activate **BrqSMS**.

### From source

1. Copy this folder into `wp-content/plugins/barq/`.
2. Activate **BrqSMS** from the **Plugins** screen.

## Configuration

1. Go to **BrqSMS → Settings → API Settings**.
2. Choose the **BrqSMS** gateway.
3. Enter your **API Token** (and an optional **Sender ID**).
4. Build your forms under the **Forms**, **Login**, and **Signup** tabs, or drop a shortcode on any page.

### Getting your BrqSMS API token

1. Sign in to your BrqSMS dashboard: <https://dash.brqsms.com>
2. Open the **Developers** section.
3. Create an API token and paste it into the plugin settings.

> **Tip:** Use the **Test Gateway** field on the API Settings tab to send a test SMS. The raw gateway response (including the HTTP status) is shown so you can confirm delivery or diagnose issues.

## Shortcodes

| Shortcode | Purpose |
|-----------|---------|
| `[barq-login]` | Login form |
| `[barq-registration]` | Registration form |
| `[barq-forgot-password]` | Forgot-password form |
| `[barq-modal-login]` | Login inside a modal |
| `[barq-edit-phone]` | Let a user change their phone number |
| `[barq-logout]` | Logout link |

Page variants (`[barq-page-registration]`, `[barq-page-forgot-password]`) and the `df-*` / `dm-*` aliases are also registered.

## How the BrqSMS gateway works

The gateway sends the verification message through the BrqSMS SMS API:

```
POST https://dash.brqsms.com/api/v3/sms/send
Authorization: Bearer <API_TOKEN>
Content-Type: application/json
Accept: application/json

{
  "recipient": "249912345678",
  "sender_id": "YOUR_SENDER",
  "type": "plain",          // "unicode" is used automatically for Arabic/non-Latin text
  "message": "Your verification code is 123456"
}
```

The gateway code lives in [`gateways/brqsms.php`](gateways/brqsms.php) and:

- validates the API token and recipient before sending,
- normalizes the recipient to a bare international number (digits only),
- auto-detects unicode (Arabic) vs. plain GSM text,
- returns clear, status-aware errors in test mode.

## Internationalization

- Bundled languages: **English** (source) and **Arabic** (`languages/digits-ar*.{po,mo}`).
- The translation template is `languages/digits.pot`.
- WPML users: translatable admin texts (including the SMS and WhatsApp message templates) are declared in [`wpml-config.xml`](wpml-config.xml).

## Uninstalling

Deleting the plugin runs [`uninstall.php`](uninstall.php), which removes the plugin's own settings and transients. It **does not** delete user accounts or their verification status, so removing the plugin never destroys customer data.

## Author

**ABDALRAHMAN MOLOOD**

## License

Released under the **GNU General Public License v2.0 or later**. See [LICENSE](LICENSE).
