<?php

return [
    'create'        => [
        'title' => 'New Organisation',
    ],
    'fields'        => [
        'is_defunct'    => 'Defunct',
        'members'       => 'Members',
    ],
    'helpers'       => [
        'descendants'       => 'This list contains all organisations which are descendants of this organisation, and not only those directly under it.',
        'nested_without'    => 'Displaying all organisations that don\'t have a parent organisation. Click on a row to see the children organisations.',
    ],
    'hints'         => [
        'is_defunct'    => 'This organisation is defunct.',
    ],
    'members'       => [
        'actions'       => [
            'add'       => 'Add a member',
            'submit'    => 'Add member',
        ],
        'create'        => [
            'success'   => 'Member added to :name.',
            'title'     => 'New Member',
        ],
        'destroy'       => [
            'success'   => 'Member removed from :name.',
        ],
        'edit'          => [
            'success'   => 'Member updated.',
            'title'     => 'Update Member for :name',
        ],
        'fields'        => [
            'parent'    => 'Superior',
            'pinned'    => 'Pinned',
            'role'      => 'Role',
            'status'    => 'Membership status',
        ],
        'helpers'       => [
            'all_members'   => 'All characters that are members of this organisations and it\'s sub-organisations.',
            'members'       => 'All characters that are members of this organisation.',
            'pinned'        => 'Choose if this member should be shown in the pinned section of the overview of its associated entities.',
        ],
        'pinned'        => [
            'both'  => 'Pinned on both',
            'none'  => 'Pinned nowhere',
        ],
        'placeholders'  => [
            'parent'    => 'Who is this member\'s superior',
            'role'      => 'Leader, Member, High Septon, Spymaster',
        ],
        'status'        => [
            'active'    => 'Active member',
            'inactive'  => 'Inactive member',
            'unknown'   => 'Unknown status',
        ],
    ],
    'placeholders'  => [
        'type'  => 'Cult, Gang, Rebellion, Fandom',
    ],
];
