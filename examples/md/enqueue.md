# How this theme enqueues assets

See: [Enqueueing assets in the Editor](https://developer.wordpress.org/block-editor/how-to-guides/enqueueing-assets-in-the-editor/#editor-content-scripts-and-styles)

## Editor content assets

-   This is for user-generated content.
-   As of WordPress 6.3, all assets added through the `enqueue_block_assets` PHP action will also be enqueued in the iframed Editor.
-   This is the primary method you should use to enqueue assets for user-generated content (blocks), and this hook fires both in the Editor and on the front end of your site. It should not be used to add assets intended for the Editor UI or to interact with Editor APIs.

## Editor UI assets

-   This includes the custom block controls, but not user-generated content.
-   Use the `enqueue_block_editor_assets` hook coupled with the standard `wp_enqueue_script` and `wp_enqueue_style` functions.
-   While not the recommended approach, it’s important to note that `enqueue_block_editor_assets` can be used to style Editor content for backward compatibility.
-   There are instances where you may only want to add assets in the Editor and not on the front end. You can achieve this by using an `is_admin()` check.
-   You can also use the hook `block_editor_settings_all` to modify Editor settings directly. This method is a bit more complicated to implement but provides greater flexibility. It should only be used if `enqueue_block_assets` does not meet your needs.

If you need scripts/styles for the editor UI, use `enqueue_block_editor_assets`.

If you need scripts/styles for the editor content (the part in the `<iframe>`) and front-end view, use `enqueue_block_assets`. And in the rare case where you need an admin-only script/style for the editor content but not the front-end, use an `is_admin()` check.
