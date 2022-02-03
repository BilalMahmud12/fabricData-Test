<p align="center"><a href="https://fabricdata.com" target="_blank"><img src="https://fabricdata.com/images/fabric-logo.png" width="180"></a></p>



## About This Test

In Order to maintain security and privacy while collecting data from the given APIs, I decided to create a singleton service that instantiate a contract instance; so only functions found there could be used to execute the connection with external server, this contract can be applied via specific driver.

The Driver's main functionality is to prepare & protect the connection credentials, this Service can be called from the controller ( or anywhere inside the app ) when receiving requests sent from the router.

## Technologies Used

- PHP 7.4
- Laravel 8.75
- Vuejs 3
- InertiaJs
- TailwindCSS 3

## Instructions

After cloning this repo:

- you have to add : `IMDB_KEY` , `IMDB_BASE_URL` keys and their values to `.env` file.
- add `database` value to `.env` file.
- run `composer install`.
- run `php artisan migrate` or import the `db` tables directly from `test.sql` found in `database` folder.
- run `npm install && npm run dev`.

