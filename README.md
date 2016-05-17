# Laravel Composite Key Trait

This is a small trait that I use in my projects, if I need support for composite keys in my Eloquent models.

Install via composer:

```bash
composer require mpociot/laravel-composite-key
```


Then use the trait in your model:
```php
class MyModel extends Model
{
    use HasCompositeKey;

    protected $primaryKey = ['foo', 'bar'];

}
```