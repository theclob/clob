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
    	'view_blog' => 'View Blog',
    	'logout' => 'Logout',
    ],

    'dashboard' => [
    	'title' => 'Dashboard'
    ],

    'settings' => [
    	'title' => 'Settings',

        'blog' => [
            'title' => 'Blog Settings',
            'form' => [
                'title' => 'Blog Title',
                'description' => 'Description',
            ],
            'save_success' => 'Blog settings updated successfully.'
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
    	'view' => 'View Post',
    	'delete' => 'Delete Post',
    	'delete_confirm' => 'This will permanently delete this post. If you wish to continue, click OK.',
        'delete_success' => 'Post deleted successfully.',
    	'title' => 'Title',
    	'post' => 'Post',
    	'post_help' => 'To format your post, use <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="_blank">Markdown</a>.',
    	'publish_date' => 'Publish Date',
    	'publish_date_help' => 'Schedule posts for later by setting a publish date in the future. Leave blank to publish immediately.',
    	'tags' => 'Tags',
    	'tags_placeholder' => 'e.g. php, laravel, vue',
    	'tags_help' => 'Separate tags with commas.'
    ],

];
