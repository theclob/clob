<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in the clob Admin.
    |
    */
    'nav' => [
        'toggle' => 'Toggle navigation',
        'posts' => 'Posts',
        'pages' => 'Pages',
        'forms' => 'Forms',
        'menu' => 'Menu',
        'current' => '(current)',
        'view_blog' => 'View Blog',
    	'settings' => 'Settings',
    	'logout' => 'Logout',
    ],

    'dashboard' => [
    	'title' => 'Dashboard'
    ],

    'common' => [
        'view' => 'View',
        'edit' => 'Edit',
        'move_up' => 'Move Up',
        'move_down' => 'Move Down',
        'yes' => 'Yes',
        'no' => 'No',
        'back' => 'Back',
    ],

    'settings' => [
    	'title' => 'Settings',
        'menu' => 'Navigation Menu',

        'blog' => [
            'title' => 'Blog Settings',
            'form' => [
                'title' => 'Blog Title',
                'description' => 'Description',
                'footer_text' => 'Footer Text',
                'footer_text_help' => 'e.g. Copyright notice',
                'posts_per_page' => 'Posts per page',
            ],
            'save_success' => 'Blog settings updated successfully.'
        ],

        'social_links' => [
            'title' => 'Social Links',
            'add' => 'Add Social Link',
            'add_success' => 'Social Link added successfully.',
            'edit' => 'Edit Social Link (ID: :id)',
            'edit_success' => 'Social Link updated successfully.',
            'delete' => 'Delete Link',
            'delete_confirm' => 'This will permanently delete this link. If you wish to continue, click OK.',
            'delete_success' => 'Social Link deleted successfully.',
            'move_success' => 'Social Link position updated successfully.',
            'form' => [
                'type' => 'Type',
                'url' => 'URL',
                'link' => 'Link',
                'position' => 'Pos.',
            ],
        ],

        'user' => [
            'title' => 'User Settings',
            'form' => [
                'name' => 'Your Name',
                'email' => 'Email Address',
            ],
            'save_success' => 'User settings updated successfully.'
        ],

        'password' => [
            'title' => 'Change Password',
            'form' => [
                'current' => 'Current Password',
                'new' => 'New Password',
                'confirm' => 'Confirm New Password',
            ],
            'save_success' => 'Password changed successfully.',
            'incorrect' => 'The current password is not correct.'
        ],
    ],

    'post' => [
    	'manage' => 'Manage Posts',
    	'add' => 'Add New Post',
        'add_success' => 'Post added successfully.',
    	'create' => 'Create your first post.',
    	'edit' => 'Edit Post (ID: :id)',
        'edit_success' => 'Post updated successfully.',
        'publish' => 'Publish',
        'publish_success' => 'Post published successfully.',
        'save_draft' => 'Save Draft',
    	'delete' => 'Delete Post',
        'cancel_changes' => 'Cancel Changes',
    	'delete_confirm' => 'This will permanently delete this post. If you wish to continue, click OK.',
        'delete_success' => 'Post deleted successfully.',
    	'title' => 'Title',
        'slug' => 'Post URL / Permalink',
        'slug_help' => 'This is the URL to your post. Leave blank to auto-generate based on title.',
        'subtitle' => 'Subtitle',
    	'post' => 'Post',
    	'post_help' => 'To format your post, use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown</a>.',
    	'publish_date' => 'Publish Date',
        'not_published' => 'Not Published',
    	'publish_date_help' => 'Schedule posts for later by setting a publish date in the future. Leave blank to save as draft and leave unpublished.',
    	'tags' => 'Tags',
    	'tags_placeholder' => 'e.g. php, laravel, vue',
    	'tags_help' => 'Separate tags with commas.',
        'read_time' => 'Read Time',

        'seo' => [
            'help_title' => 'What are these fields?',
            'help_text' => 'These fields allow you to specify optimized data for how links to your post will appear in search engine results and when the post is shared on social media sites like Facebook and Twitter.',
            'section' => 'SEO &amp; Social Sharing Optimization',
            'title' => 'SEO Title',
            'title_help' => 'Leave blank to use the post title. Max 60 characters.',
            'description' => 'Meta/OpenGraph Description',
            'description_help' => 'Leave blank to use start of post body. Max 160 characters.',
            'image_url' => 'Image URL',
            'image_url_help' => 'Image to display when post is shared on social media. Absolute URLs only.'
        ],

        'preview' => [
            'button' => 'Save &amp; Preview',
            'title' => 'This is a preview',
            'info' => 'This is a preview of what your post will look like. Don\'t share this page\'s URL,
                        it will only work for blog admins.',
            'published_url' => 'The public URL for this post is:',
            'unpublished_url' => 'When this post is published, it will be available at the following public
                            URL:',
            'back' => 'Back to Edit Post',
        ]
    ],

    'page' => [
        'manage' => 'Manage Pages',
        'add' => 'Add New Page',
        'add_success' => 'Page added successfully.',
        'create' => 'Create your first page.',
        'edit' => 'Edit Page (ID: :id)',
        'edit_success' => 'Page updated successfully.',
        'delete' => 'Delete Page',
        'cancel_changes' => 'Cancel Changes',
        'delete_confirm' => 'This will permanently delete this page. If you wish to continue, click OK.',
        'delete_success' => 'Page deleted successfully.',
        'title' => 'Title',
        'slug' => 'Page URL / Permalink',
        'slug_help' => 'This is the URL to your page. Leave blank to auto-generate based on title.',
        'menu_label' => 'Add Menu Item',
        'menu_label_placeholder' => 'Enter menu item label',
        'menu_label_help' => 'Leave blank for no menu item.',
        'subtitle' => 'Subtitle',
        'page' => 'Page Content',
        'page_help' => 'To format your page content, use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown</a>.',

        'seo' => [
            'help_title' => 'What are these fields?',
            'help_text' => 'These fields allow you to specify optimized data for how links to your page will appear in search engine results and when the page is shared on social media sites like Facebook and Twitter.',
            'section' => 'SEO &amp; Social Sharing Optimization',
            'title' => 'SEO Title',
            'title_help' => 'Leave blank to use the page title. Max 60 characters.',
            'description' => 'Meta/OpenGraph Description',
            'description_help' => 'Leave blank to use start of page body. Max 160 characters.',
            'image_url' => 'Image URL',
            'image_url_help' => 'Image to display when page is shared on social media. Absolute URLs only.'
        ],
    ],

    'form' => [
        'manage' => 'Manage Forms',
        'add' => 'Add New Form',
        'add_success' => 'Form added successfully.',
        'create' => 'Create your first form.',
        'edit' => 'Edit Form (ID: :id)',
        'edit_success' => 'Form updated successfully.',
        'delete' => 'Delete Form',
        'cancel_changes' => 'Cancel Changes',
        'delete_confirm' => 'This will permanently delete this form. If you wish to continue, click OK.',
        'delete_success' => 'Form deleted successfully.',
        'title' => 'Title',
        'slug' => 'Form URL / Permalink',
        'slug_help' => 'This is the URL to your form. Leave blank to auto-generate based on title.',
        'menu_label' => 'Add Menu Item',
        'menu_label_placeholder' => 'Enter menu item label',
        'menu_label_help' => 'Leave blank for no menu item.',
        'subtitle' => 'Subtitle',
        'form' => 'Form Content',
        'form_help' => 'To format your form content, use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown</a>.',

        'submissions' => [
            'button' => 'Submissions',
            'title' => ':form Form Submissions',
            'name' => 'Name',
            'email' => 'Email Address',
            'date' => 'Date Sent',
            'message' => 'Message',
            'empty' => 'No submissions to display.',
            'item_title' => ':form Form Submission',
        ],

        'seo' => [
            'help_title' => 'What are these fields?',
            'help_text' => 'These fields allow you to specify optimized data for how links to your form will appear in search engine results and when the form is shared on social media sites like Facebook and Twitter.',
            'section' => 'SEO &amp; Social Sharing Optimization',
            'title' => 'SEO Title',
            'title_help' => 'Leave blank to use the form title. Max 60 characters.',
            'description' => 'Meta/OpenGraph Description',
            'description_help' => 'Leave blank to use start of form body. Max 160 characters.',
            'image_url' => 'Image URL',
            'image_url_help' => 'Image to display when form is shared on social media. Absolute URLs only.'
        ],
    ],

    'menu' => [
        'manage' => 'Manage Menu',
        'add' => 'Add New Item',
        'add_success' => 'Menu item added successfully.',
        'create' => 'Create your first menu item.',
        'edit' => 'Edit menu Item (ID: :id)',
        'edit_success' => 'Menu item updated successfully.',
        'delete' => 'Delete Menu Item',
        'cancel_changes' => 'Cancel Changes',
        'delete_confirm' => 'This will permanently delete this menu item. If you wish to continue, click OK.',
        'delete_success' => 'Menu item deleted successfully.',
        'menuable_type' => 'Item Type',
        'menuable_id' => 'Item',
        'menuable_id_help' => 'Required only if Item Type is "Page"',
        'label' => 'Label',
        'url' => 'URL',
        'url_help' => 'Required only if Item Type is "Custom Link"',
        'position' => 'Pos',
        'enabled' => 'Enabled',
        'item' => 'Item',
        'page_link_to' => 'Page Link to <a href=":url" target="_blank">:text</a>',
        'custom_link_to' => 'Custom Link to <a href=":url" target="_blank">:url</a>',
        'move_success' => 'Menu item position updated successfully.',
    ]
];
