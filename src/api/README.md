# Wordpress Boilerplate API Settings

To work on creation an API, create a new file for each API and include the it in `api.php`
```
add_action( 'wp_ajax_foobar', 'my_ajax_foobar_handler' );

function my_ajax_foobar_handler() {
    include get_stylesheet_directory() . '/api/foobar.php';
}
```

To make a non private API use the following:
```
add_action( 'wp_ajax_nopriv_foobar', 'my_ajax_foobar_handler' );
```

To access the API from frontend please use URL
```
http://www.example.com/wp-admin/admin-ajax.php?action=upcomingPayment
```