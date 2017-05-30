# CHANGELOG

- `1.0.2`
    * Fixed CreditCard CVV to support 4 digit numbers (AMEX cards)

- `1.0.1`
    * Added new base exception class for the project and changed existing exception implementations to extend the new PayUException class
    * Fixed bug that `check` variable in `Credentials::factory` does not work
    * Fixed bug that try to parse credit card information in billet transactions

- `1.0.0`
    * First stable release
