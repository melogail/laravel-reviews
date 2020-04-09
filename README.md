[![contributions welcome](https://img.shields.io/badge/contribution-welcome-brightgreen)](https://github.com/melogail/laravel-reviews/issues)  ![version 1.0.0](https://img.shields.io/badge/version-1.0.0-orange)

# laravel-Reviews
Laravel Tags package for Laravel framework applications, it is useful for adding tags to different models in the application, useful for Blogs, eCommerce...etc

# How to use
## Installation
* Install the package using `composer` in your project.
```
composer require melogail/laravel-reviews
```
* Publish the package migration files, config file `config/laravel-reviews`, and migration files.
```
php artisan vendor:publish --tag=reviews_data
```
* Update your autoload files
```
composer dump-autoload -o
```
* Migrate your new migration files
```
php artisan migrate
```
* Add the `reviewable` trait inside your desired models to have tags
```php
use Melogail\LaravelTags\Reviweable;

class Articles extends Model {
    
    use Reviewable;
    
    // model code follow...

}
```
* Inside `config/` directory, add the model class where `reviewer_id` will match. ex: `users` table.
```php
'models' => [

        'reviewer' => [

            'class' => App\User::class,  // model reviewer

        ]

    ]
```


## Usage
To get all the tags added for specific model, use a `foreach` loop:
```php
foreach ($article->reviews as $review) {
    $tag->name;
}
```
---
To add review, you use the `addReview($data = [])` method on your object.
```php
$article->addReview($data)
``` 
