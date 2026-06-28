=== BrqSMS: WordPress Mobile Number Signup and Login ===
Contributors: amolood
Tags: otp, login, sms, mobile login, registration
Requires at least: 5.0
Tested up to: 6.7
Requires PHP: 5.5
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Mobile number signup and login for WordPress with OTP verification, powered by the BrqSMS SMS gateway.

== Description ==

BrqSMS lets your visitors register and log in to WordPress using their mobile number. A one-time password (OTP) is sent over SMS through the BrqSMS gateway, and the user is signed in once the code is verified — no password required.

This is an open-source build released under the GPL. It ships the BrqSMS SMS gateway integration out of the box.

**Features**

* Mobile number signup and login with OTP verification
* BrqSMS SMS gateway integration (BrqSMS v3 API)
* Automatic unicode handling for Arabic OTP messages
* WooCommerce checkout and account integration
* Native login / registration forms and shortcodes
* WhatsApp and email OTP options
* Brute-force protection and configurable OTP rules
* Available in English and Arabic

== Installation ==

1. Upload the `brqsms` folder to the `/wp-content/plugins/` directory, or install the zip via Plugins > Add New > Upload Plugin.
2. Activate the plugin through the Plugins screen in WordPress.
3. Go to **BrqSMS > Settings > API Settings**, choose the **BrqSMS** gateway, and enter your API Token (and optional Sender ID).

== Frequently Asked Questions ==

= Where do I get a BrqSMS API token? =

Sign in to your BrqSMS dashboard at https://dash.brqsms.com, open the Developers section, and create an API token.

= Does it require a license key? =

No. This is an open-source build with no license activation.

= Which languages are supported? =

English (default) and Arabic.

== Changelog ==

= 1.0.0 =
* First release.
* BrqSMS SMS gateway integration with OTP delivery via the BrqSMS v3 API.
* Automatic unicode detection for Arabic messages.
* Open-source build: license activation and remote update checker removed.
* Admin dashboard restyled with the BrqSMS design system.
* Translations limited to English and Arabic.

== Upgrade Notice ==

= 1.0.0 =
First release.
