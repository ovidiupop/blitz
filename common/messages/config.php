<?php

//./yii message common/messages/config.php

return [
    'sourcePath' => __DIR__ . '/../../backend/',
//    'sourcePath' => __DIR__ . '/../../frontend/',
    'messagePath' => __DIR__,
    'languages' => ['ro'], //Add languages to the array for the language files to be generated.
    'translator' => 'Yii::t',
    'sort' => false,
    'removeUnused' => false,
    'only' => ['*.php'],
    'except' => [
        '.svn',
        '.git',
        '.gitignore',
        '.gitkeep',
        '.hgignore',
        '.hgkeep',
        '/messages',
        '/vendor',
    ],
    'overwrite' => true,
    'format' => 'php',
];