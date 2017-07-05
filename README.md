# Create with X - Laravel Models
A simple package that provides traits to add common indentity fields to Laravel
models when they are created.

## Install
Just add the package via composer

```
composer install joelshepherd/create-with
```

## Usage
Simply add a trait to your models that provides your desired indentity field.

### Create with UUID
Adds an unique UUID to the model.

**Default options**
- `getUuidField()` returns `uuid`

```php
<?php
use JoelShepherd\CreateWith\WithUuid;

class Example extends Model
{
    use WithUuid;

    // ...

    // Optionally override the uuid field
    public function getUuidField()
    {
        return 'uuid';
    }
}
```

```php
<?php

$example = Example::create(
    $request->input()
);

$example->uuid;
// 123e4567-e89b-12d3-a456-426655440000
```

### Create with Slug
Adds an unique slug to the model. This can optionally be based on a text string
(like a title field on the model) and appended with a random slug if required
for uniqueness.

**Default options**
- `getSlugField()` returns `slug`
- `getSlugBaseText()` returns `null`
- `getSlugRandomLength()` returns `7`

```php
<?php
use JoelShepherd\CreateWith\WithSlug;

class Example extends Model
{
    use WithSlug;

    // ...

    // Optional override the slug field
    public function getSlugField()
    {
        return 'slug';
    }

    // Optionally set the base text string
    public function getSlugBaseText()
    {
        return $this->title;
    }

    // Optionally set the random string length
    public function getSlugRandomLength()
    {
        return 3;
    }
}
```

```php
<?php

$example = Example::create([
    'title' => 'This is a title'
]);

$example->slug;
// this-is-a-title-7iw
```

## Contributing
Bug and feature pull requests are welcome. If you have any feature requests, feel free to create an issue with your proposal.
