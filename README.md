# TPV Virtual

This is just a virtual payment platform for stripe.com. Once installed you'll be able to setup payments for your site with credit card with just sending a link.

## Usage

Just send a url with 2 paramenters:

```
?cuantia=<insert here the amount>$concepto=<insert here the a product or invoice number, etc... >

```

To get started just install dependences with
```
composer install

```
Rename config.php.sample to config.php and set stripe keys and preferences

## Credits:
* [@monjo](https://twitter.com/monjo) - Development
* [Google](https://getmdl.io) - Frontend HTML framework. Material Design Lite
* [Stripe checkout](https://stripe.com/checkout) - Payment API
