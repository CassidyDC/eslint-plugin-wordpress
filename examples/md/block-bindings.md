# Updates made to use block binding

## Resources

- [WordPress 6.6 Field Guide](https://make.wordpress.org/core/2024/06/25/wordpress-6-6-field-guide/)
- [What’s new for developers? (July 2024)](https://developer.wordpress.org/news/2024/07/10/whats-new-for-developers-july-2024/)

- [New Feature: The Block Bindings API](https://make.wordpress.org/core/2024/03/06/new-feature-the-block-bindings-api/)

- [An introduction to overrides in Synced Patterns](https://developer.wordpress.org/news/2024/06/18/an-introduction-to-overrides-in-synced-patterns/)
- [Editing custom fields from connected blocks](https://make.wordpress.org/core/2024/06/28/editing-custom-fields-from-connected-blocks/)

- [Introducing Block Bindings, part 1: connecting custom fields](https://developer.wordpress.org/news/2024/02/20/introducing-block-bindings-part-1-connecting-custom-fields/)
- [Introducing Block Bindings, part 2: Working with custom binding sources](https://developer.wordpress.org/news/2024/03/06/introducing-block-bindings-part-2-working-with-custom-binding-sources/)

- [Building a book review site with Block Bindings, part 1: Custom fields and block variations](https://developer.wordpress.org/news/2024/05/06/building-a-book-review-site-with-block-bindings-part-1-custom-fields-and-block-variations/)
- [Building a book review site with Block Bindings, part 2: Queries, patterns, and templates](https://developer.wordpress.org/news/2024/06/06/building-a-book-review-site-with-block-bindings-part-2-queries-patterns-and-templates/)

## Feature

1. Synced Hero Pattern for Posts with the following parts editable:
   a. Cover background image
   b. Author name (which can include their position too) via a custom field, with the default name being the post author.

# Steps

1. Bind the block to the source, such as a custom field (aka post-meta) such as:

```html
<!-- wp:paragraph {
  "metadata":{
    "bindings":{
      "content":{
        "source":"core/post-meta",
        "args":{
          "key":"book-genre"
        }
      }
    }
  }
} -->
<p></p>
<!-- /wp:paragraph -->
```

2. Register the post-meta via functions.php

```php
function theme_slug_register_meta() {
  register_meta(
      'post',
      'book-genre',
      array(
          'show_in_rest' => true,
          'single'       => true,
          'type'         => 'string',
          'default'      => 'Default text field',
      )
  );
}
add_action( 'init', 'theme_slug_register_meta' );
```

## NOTES

- Block bindings can use custom fields (core/post-meta), pattern overrides (core/pattern-overrides), and more.
- when using custom fields, content can be unique in different pages, but will be the same on the same page.
