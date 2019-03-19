
## ~ Tune ~

A [Laravel](https://laravel.com/docs) application to provide "second screen" real-time captions for a specific audio/video installation. Tune is used as a central location to store and serve captions in a browser, but receives timing for those captions from a source via REST `PATCH` requests.


## Requirements
Run a local development environment using the [Laravel Homestead](https://laravel.com/docs/5.8/homestead) virtual machine, or see 
the framework [installation guide](https://laravel.com/docs/5.8/installation#installation).

## Development

- Clone the repository.
```bash
git clone https://github.com/ericpugh/tune.git
```
- From the application root directory run `composer install` and `npm install` to install dependencies.
- Copy the .env.example file to .env and enter your own database name, host, and credentials.
- Ensure the storage, bootstrap/cache folder is writable by the web server.
- In the application root, run `php artisan migrate` to update the database.
- Set the web root on your server to point to the Tune public folder. For example, an NGINX config:
```
server {
    listen 80;
    root /var/www/tune/public;
    index index.php index.html index.htm;
}
```




