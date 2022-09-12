<?php
require ROOT_FOLDER.'/config/bootstrap.php';

return
    [
        'dependencies' => [
            'App\Repository\TerritoriesRepository' => [
                'args' => [$entityManager]
            ],
            'App\Repository\HierarchyRepository' => [
                'args' => [$entityManager]
            ],
            'App\Repository\UserRepository' => [
                'args' => [$entityManager]
            ],
            'App\Repository\ArticleRepository' => [
                'args' => [$entityManager]
            ]
        ]
    ]
;