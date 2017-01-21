<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Setup Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used for the installer setup utility.
    |
    */
    'title' => 'Set up your blog',
    'basic_info' => 'Let\'s set up some basic information about your blog.',
    'account_info' => 'To create your administrator account, we\'ll need your email address and password. You\'ll use these credentials to log in to the <strong>clob</strong> Admin.',
    'finish' => 'Finish &raquo;',

    'form' => [
    	'title' => 'Blog Title',
    	'description' => 'Description',
    	'name' => 'Your Name',
    	'email' => 'Email Address',
    	'password' => 'Password'
    ],

    'errors' => [
        'database_connection' => 'Whoops, looks like there\'s a problem with your database configuration. Check your database configuration and try again.',
        'migration_failure' => 'Whoops, looks like there\'s a problem with one of the database migration scripts. Review any changes you made to :file and try again.'
    ]
];
