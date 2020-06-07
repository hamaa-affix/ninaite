<?php
// resources/lang/ja/enums.php
use App\Enums\Status;
use App\Enums\PostBy;

return [
    Status::class => [
        Status::PRIVATE => '非公開',
        Status::PUBLIC => '公開',
    ],
    
     PostBy::class => [
        PostBy::FARM => '農業関係者',
        PostBy::USER => 'ユーザー',
    ],
];