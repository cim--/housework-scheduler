# Housework scheduler

There are hundreds of open-source options for scheduling computer
tasks, and very few for scheduling people.

The big thing I couldn't find was a nice simple one which had
"schedule a task for X days after the last time the task was
completed".

At the moment, very much a "minimal viable solution". Extra features
to be added as I realise they'd be useful...

GPLv3 license

## Installation

Set up the .env file as usual for a Laravel 5 app, and a database for it
npm install
composer install
php artisan migrate
php artisan db:seed --class=SchedulerSeeder

(doing the default --class=DatabaseSeeder will also add a bunch of
sample tasks which are probably no actual use except for testing)