#Laravel 4 Extended Pagination

An extension to the default Laravel 4 Pagination for better flexibility and configuration.

Mimics default Laravel 4 pagination out of the box. Change config or language options to customize.

Created and maintained by Micheal Mand. Copyright &copy; 2013. Licensed under the [MIT license](LICENSE.md).

[![Total Downloads](https://poser.pugx.org/kmd/pagination/downloads.png)](https://packagist.org/packages/kmd/pagination)

##Installation

Add `kmd/pagination` as a requirement to `composer.json`:

```javascript
{
    ...
    "require": {
        ...
        "kmd/pagination": "dev-master"
        ...
    },
}
```

Update composer:

```
$ php composer.phar update
```

Add the provider to your `app/config/app.php`:

```php
'providers' => array(

    ...
    'Kmd\Pagination\PaginationServiceProvider',

),
```

(Optional) Publish package config:

```
$ php artisan config:publish kmd/pagination
```

##Usage and Configuration

###Usage

This package sits on top of Laravel 4's Pagination, so use it the same way. [Laravel 4's Pagination Docs.](http://laravel.com/docs/pagination#usage)

###Configuration

 * `always_show`: Set to `true` to always show the paginator, even if there are no pages. Default: `false`.
 * `show_first_last`: Set to `true` to show First/Last page links. Default: `false`.
 * `align_simple`: Set to `true` to align the simple paginator links to the sides. Default: `false`.
 * `classes`: Set the sliding paginator's classes. For example, to center the paginator: `pagination pagination-centered`. See: [Twitter Bootstrap Pagination Docs](http://twitter.github.io/bootstrap/components.html#pagination). Default: `pagination`.
 * `slider`:
   * `prev_link_text`: Set the previous link text. Default: `&lsaquo;`.
   * `next_link_text`: Set the next link text. Default: `&rsaquo;`.
   * `first_link_text`: Set the first link text. Default: `&laquo; First`.
   * `last_link_text`: Set the last link text. Default: `Last &raquo;`.
 * `simple`:
   * `prev_link_text`: Set the previous link text. Default: `&larr; Previous`.
   * `next_link_text`: Set the next link text. Default: `Next &rarr;`.

To change the pagination view, edit `app/config/view.php` and change the `pagination` value. Want to create your own? Model it after [one of the views](src/views).
