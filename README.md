# WP Demo Autoload

WordPress Plugin to demo autoloading.

This plugin autoloads code to add a REST API Endpoint at the path `salcode/v1/owner`,
e.g. https://example.com/wp-json/salcode/v1/owner.

## Error Log on Class Load

The `Owner` class file has an error log statement

```
error_log( 'class Owner has been loaded' );
```

so if you open your PHP error log, you can see when
that file is loaded.

### Without an Autoloader

Before adding the autoloader, the `Owner` class is loaded
on _all_ WordPress requests.

e.g.

- `/wp-json/salcode/v1/owner`
- `/wp-json/`
- `/wp-admin/`
- `/wp-admin/post.php`
- `/hello-world`
- `/`

### With an Autoloader

With the autoloader, the `Owner` class is _only_ loaded
when it is needed.

Specifically, this plugin uses the `Owner` class on the
`rest_api_init` hook, so any WordPress request that starts
with `/wp-json` will load the class.

e.g.

#### Loads Owner

- `/wp-json/salcode/v1/owner`
- `/wp-json/wp/v2/posts`
- `/wp-json/`

#### Does NOT Load Owner

- `/wp-admin/`
- `/wp-admin/post.php`
- `/hello-world`
- `/`

## Author

[Sal Ferrarello](https://salferrarello.com)
