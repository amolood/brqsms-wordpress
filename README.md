# BrqSMS — WordPress Mobile Number Signup and Login

BrqSMS lets your visitors register and log in to WordPress using their mobile number. A verification code (OTP) is sent over SMS and the user is signed in once it is confirmed — no password required.

This build ships the **BrqSMS** SMS gateway out of the box and integrates with WordPress, WooCommerce, and popular form plugins.

## Features

- Mobile number signup & login with OTP verification
- BrqSMS SMS gateway integration (plus a wide range of other SMS providers)
- WooCommerce checkout & account integration
- Native login / registration forms and shortcodes
- WhatsApp & email OTP options
- Brute-force protection and configurable OTP rules

## Requirements

- WordPress
- PHP 5.5 or higher
- cURL and GMP or BCMath PHP extensions

## Installation

1. Copy the plugin folder into `wp-content/plugins/`.
2. Activate **BrqSMS** from the WordPress *Plugins* screen.
3. Go to **BrqSMS → Settings → API Settings**, select the **BrqSMS** gateway, and enter your API Token (and optional Sender ID).

## BrqSMS Gateway Setup

1. Sign in to your BrqSMS dashboard: <https://dash.brqsms.com>
2. Create an API token under **Developers**.
3. In the plugin settings choose **BrqSMS** as the SMS gateway and paste your API Token.
4. (Optional) Set a Sender ID approved on your BrqSMS account.

## Author

ABDALRAHMAN MOLOOD

## License

Released under the **GNU General Public License v2.0 or later**. See [LICENSE](LICENSE).
