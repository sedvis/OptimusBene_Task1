<?php

return [
    'title'    => 'ToDo tasks',
    'fields'   => [
        'title'       => 'Title',
        'description' => 'Description',
        'status'      => 'Status',
        'statuses'    => [
            'open'   => 'Open',
            'closed' => 'Closed',
        ],
        'created_at'  => 'Created At',
        'updated_at'  => 'Updated At',
    ],
    'actions'  => [
        'create' => 'Create',
        'read'   => 'Read',
        'update' => 'Edit',
        'delete' => 'Delete',
    ],
    'messages' => [
        'create'    => [
            'success' => 'Create success',
            'failed'  => 'Create failed',
        ],
        'read'      => [
            'success' => 'Read success',
            'failed'  => 'Read failed',
        ],
        'update'    => [
            'success' => 'Update success',
            'failed'  => 'Update failed',
        ],
        'delete'    => [
            'success' => 'Delete success',
            'failed'  => 'Delete failed',
        ],
        'not_found' => 'Task not found',
    ]
];