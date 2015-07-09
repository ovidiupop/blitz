<?php

return backend\components\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'labelTemplate' => '<a href="#">{icon}<span>{label}</span>{right-icon}{badge}</a>',
            'linkTemplate' => '<a href="{url}">{icon}<span>{label}</span>{right-icon}{badge}</a>',
            'submenuTemplate' => "\n<ul class=\"treeview-menu\">\n{items}\n</ul>\n",
            'activateParents' => true,
            'items' => [
                //users
                [
                    'label' => Yii::t("app", "Users"),
                    'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        [ 'label' => 'Admin',
                            'url' => ['/user/admin/index'],
                            'icon' => '<i class="fa fa-list-ol"></i>'
                        ],
                        [ 'label' => Yii::t('app', 'Add'),
                            'url' => ['/user/admin/create'],
                            'icon' => '<i class="fa fa-list-ol"></i>'
                        ],
                        [
                        'label' => Yii::t("app", "Roles"),
                            'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                            'options' => ['class' => 'treeview'],
                            'items' => [
                                [ 'label' => 'Admin',
                                    'url' => ['/role/index'],
                                    'icon' => '<i class="fa fa-list-ol"></i>'
                                ],
                                [ 'label' => Yii::t('app', 'Add'),
                                    'url' => ['/role/create'],
                                    'icon' => '<i class="fa fa-list-ol"></i>'
                                ],
                            ],
                        ],
                        [
                        'label' => Yii::t("app", "Role Types"),
                            'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                            'options' => ['class' => 'treeview'],
                            'items' => [
                                [ 'label' => 'Admin',
                                    'url' => ['/role-types/index'],
                                    'icon' => '<i class="fa fa-list-ol"></i>'
                                ],
                                [ 'label' => Yii::t('app', 'Add'),
                                    'url' => ['/role-types/create'],
                                    'icon' => '<i class="fa fa-list-ol"></i>'
                                ],
                            ],
                        ],                        
                    ],
                ],
                //end users
                //
                //
                //orders
                [
                    'label' => Yii::t("app", "Orders"),
                    'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        [
                            'label' => 'Comenzi noi',
                            'url' => ['/comanda/administrare', 'ComandaSearch' => ['stare' => 0]],
                            'icon' => '<i class="fa fa-list-ol"></i> <span class="badge bg-red pull-right">4</span>',
                        ],
                        [ 'label' => 'Administrare comenzi',
                            'url' => ['/comanda/administrare'],
                            'icon' => '<i class="fa fa-list-ol"></i>'
                        ],
                        [
                            'label' => 'Operare comanda',
                            'url' => ['/comanda/operare'],
                            'icon' => '<i class="fa fa-list-ol"></i>'
                        ],
                    ],
                ],
                //end orders

                //editor
                [
                    'label' => Yii::t("app", "Editor"),
                    'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                    'options' => ['class' => 'treeview'],
                    'visible'=>Yii::$app->user->identity->can('editor'),
                    'items' => [
                                [
                                    'label' => Yii::t('app', 'Pages'),
                                    'url' => ['/page/index'],
                                    'icon' => '<i class="fa fa-list-ol"></i>'
                                ],
                    ]
                ],
                //end editor

                //master
                [
                    'label' => Yii::t("app", "Master"),
                    'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                    'options' => ['class' => 'treeview'],
                    'visible'=>Yii::$app->user->identity->can('master'),
                    'items' => [
                       
                        [
                            'label' => Yii::t('app', 'Pairs'),
                            'url' => ['/pair'],
                            'icon' => '<i class="fa fa-file-code-o"></i>'
                        ],
                        
                        //config
                        [
                            'label' => Yii::t("app", "Configuration"),
                            'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                            'options' => ['class' => 'treeview'],
                            'items' => [
                                [
                                    'label' => Yii::t('app', 'Parameters'),
                                    'url' => ['/params/index'],
                                    'icon' => '<i class="fa fa-file-code-o"></i>'
                                ],
                            ]
                        ],
                        //end config                        
                        //tools
                        [
                            'label' => Yii::t("app", "Tools"),
                            'icon' => '<i class="fa fa-thumbs-o-up"></i>',
                            'options' => ['class' => 'treeview'],
                            'items' => [
                                [
                                    'label' => 'Gii',
                                    'url' => ['/gii'],
                                    'icon' => '<i class="fa fa-file-code-o"></i>'
                                ],
                                [
                                    'label' => 'Debug',
                                    'url' => ['/debug'],
                                    'icon' => '<i class="fa fa-dashboard"></i>'
                                ],                        
                            ]
                        ],
                        //end tools
                    ]
                ],
                //end master
                
                
            ]
        ]);
?>