# Bronius Watchdog Chatty
My Drupal 8 experimental module which listens for watchdog messages and relays them to user as a drupal_set_message.

## How to Install
1. Download or clone this repository into your Drupal 8 site root `/modules` or `/modules/custom` folder.
1. Enable the module (`drush en bronius_watchdog_chatty` or via the admin UI).

## Using the Module
Once enabled, any action the user performs which invokes a watchdog message will be shown to the user in a dsm. To test all watchdog levels in one fell swoop, visit `/test_chatty` in the Drupal site where this module is installed.
