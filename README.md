# Uitje 🎡

Uitje is a reservation system for the leisure industry, currently focussed on providing an interface to reserve group trips to leisure-focused locations.

## Features
- Manage customers
- Create custom reservation types (such as birthday parties, school trips, boy/girl scout events, meal packages)
- The ability to link multiple reservation types to a single order (tickets, meal menus, extra's, ...)
- Manage frequently asked questions and link them to reservation types

## Setting up

1. Install all dependencies using `npm i` and `composer i`
2. Copy the `.env.example` file to `.env` and fill in the correct information. After that, the application can be run by executing `php artisan serve`.
3. Run the migrations by executing `php artisan migrate:fresh`
    - If you want some test data, run `php artisan db:seed` to fill the database with fake data.
4. Build the front-end assets using `npm run prod`
5. Run `php artisan serve` to run the application locally.
   
## License

Uitje uses the Laravel framework. The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
