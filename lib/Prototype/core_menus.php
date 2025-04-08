<?php
$core_menus = ['manage_plugins' => [
               'display_system' => 1, 'display_space' => 1, 'component' => 'Core',
                 'permission' => 'manage_plugins', 'mode' => 'manage_plugins',
                 'label' => 'Manage Plugins', 'order' => 20],
               'manage_scheme' => [
                 'display_system' => 1, 'component' => 'Core', 'mode' => 'manage_scheme',
                 'condition' => 'can_manage_scheme', 'label' => 'Manage Scheme', 'order' => 30],
               'manage_theme' => [
                 'display_system' => 1, 'display_space' => 1, 'component' => 'Core',
                 'permission' => ['import_objects', 'can_activate_template', 'can_create_urlmapping'],
                 'mode' => 'manage_theme', 'label' => 'Manage Theme', 'order' => 40],
               'import_objects' => [
                 'display_system' => 1, 'display_space' => 1, 'component' => 'Core',
                 'permission' => 'import_objects', 'mode' => 'import_objects',
                 'condition' => 'can_im_export', 'label' => 'Import Objects', 'order' => 50],
               'maintenance_setting' => [
                 'display_system' => 1, 'component' => 'Core',
                 'permission' => 'superuser', 'mode' => 'maintenance_setting',
                 'label' => 'Maintenance Setting', 'order' => 99999] ];
$this->registry['menus'] = $core_menus;
