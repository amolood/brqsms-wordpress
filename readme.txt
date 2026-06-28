=== BrqSMS: WordPress Mobile Number Signup and Login ===
Contributors: amolood
Tags: otp, sms login, mobile login, phone registration, two factor
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 5.5
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Let users sign up and log in to WordPress with their mobile number and an OTP, delivered over SMS through the BrqSMS gateway.

== Description ==

**BrqSMS** turns the WordPress login and registration experience into a passwordless, mobile-first flow. A visitor enters their phone number, receives a one-time password (OTP) by SMS through the BrqSMS gateway, and is signed in once they confirm the code — no password required.

It works with the standard WordPress forms, WooCommerce, and the plugin's own native forms and shortcodes, and it can also deliver verification codes over WhatsApp or email.

This is an open-source build released under the GPL. There is no license key, no activation, and no remote update checker — install it and go.

= Key features =

* **Passwordless mobile login & signup** — register and authenticate with a phone number + OTP.
* **BrqSMS SMS gateway** built in (BrqSMS v3 REST API, Bearer-token auth).
* **Automatic unicode handling** — Arabic and other non-Latin OTP messages are sent correctly instead of being mangled.
* **WooCommerce integration** — phone field on checkout, account registration, and login.
* **Native forms & shortcodes** — drop-in login, registration, forgot-password, edit-phone, logout, and modal forms.
* **WhatsApp & email OTP** — alternative delivery channels for verification codes.
* **Two-factor / OTP on the WordPress login** — add phone verification to wp-login.php.
* **Brute-force protection** and configurable OTP rules (length, resend timer, expiry).
* **CAPTCHA support** to protect forms from abuse.
* **WPML-ready** — message templates and key strings are registered for translation.
* **Localized** — ships with English and Arabic.

= How it works =

1. The user enters their mobile number on a BrqSMS form (or WooCommerce / WordPress form).
2. The plugin generates a one-time password and sends it as an SMS via the BrqSMS gateway.
3. The user enters the code; on success they are registered and/or logged in.

The OTP itself is generated and verified by the plugin, so the BrqSMS gateway is only responsible for delivering the message — which keeps the integration simple and reliable.

= Available shortcodes =

* `[digits-login]` — login form
* `[digits-registration]` — registration form
* `[digits-forgot-password]` — forgot-password form
* `[digits-modal-login]` — login in a modal
* `[digits-edit-phone]` — let a user change their phone number
* `[digits-logout]` — logout link

Page variants (`[digits-page-registration]`, `[digits-page-forgot-password]`) and the `df-*` / `dm-*` aliases are also available.

== Installation ==

1. Upload the `barq` folder to `/wp-content/plugins/`, or go to **Plugins > Add New > Upload Plugin** and upload the zip.
2. Activate **BrqSMS** from the **Plugins** screen.
3. Open **BrqSMS > Settings > API Settings**, select the **BrqSMS** gateway, and enter your **API Token** (and an optional **Sender ID**).
4. Configure your login/registration forms under the **Forms**, **Login**, and **Signup** tabs, or place a shortcode on any page.

= Requirements =

* WordPress 5.0 or higher
* PHP 5.5 or higher
* The cURL PHP extension
* The GMP or BCMath PHP extension

== Frequently Asked Questions ==

= Where do I get a BrqSMS API token? =

Sign in to your BrqSMS dashboard at https://dash.brqsms.com, open the **Developers** section, and create an API token. Paste it into **BrqSMS > Settings > API Settings**.

= Do I need a Sender ID? =

A Sender ID is optional. If your BrqSMS account has an approved Sender ID, enter it so messages are branded; otherwise leave it blank.

= Does it require a license key? =

No. This is an open-source build with no license activation and no remote calls back to a vendor for licensing or updates.

= Will it work with WooCommerce? =

Yes. Phone-number registration and login integrate with the WooCommerce checkout and account pages.

= Can I send the OTP over WhatsApp or email instead of SMS? =

Yes. WhatsApp and email OTP delivery are available in the gateway settings as alternatives to SMS.

= Does it send OTP messages in Arabic correctly? =

Yes. The BrqSMS gateway detects non-Latin content (such as Arabic) and sends it using unicode encoding so the message arrives intact.

= Which languages are included? =

English (the source language) and Arabic. Additional translations can be added with any standard WordPress translation tool, and key strings are registered for WPML.

= How do I test that sending works? =

On the **API Settings** tab there is a **Test Gateway** field. Enter a phone number and send a test message; the raw gateway response (including the HTTP status) is shown so you can confirm delivery or diagnose problems.

== Screenshots ==

1. API Settings — select the BrqSMS gateway and enter your API token.
2. Dashboard — overview, logs, and quick links.
3. Mobile login form with OTP verification.

== Changelog ==

= 1.0.0 =
* First release.
* BrqSMS SMS gateway integration with OTP delivery via the BrqSMS v3 API.
* Automatic unicode detection so Arabic (and other non-Latin) messages send correctly.
* Hardened gateway: credential and recipient validation, clearer test-call diagnostics.
* BrqSMS set as the default SMS gateway for new installs.
* Open-source build: license activation, the remote update checker, and vendor phone-home calls removed.
* Admin dashboard restyled with the BrqSMS design system.
* Translations limited to English and Arabic.
* `uninstall.php` added — removes plugin settings on delete while preserving user accounts.
* WPML config updated to register the SMS/WhatsApp message templates for translation.

== Upgrade Notice ==

= 1.0.0 =
First public release of BrqSMS.
