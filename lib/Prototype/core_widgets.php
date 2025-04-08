<?php
$core_widgets = ['activity' => [
                    'label' => 'Activity',
                    'component' => 'Core',
                    'order' => 10,
                    'scope' => ['system', 'workspace']],
                 'workflow' => [
                    'label' => 'Workflow',
                    'component' => 'Core',
                    'order' => 40,
                    'scope' => ['system', 'workspace']],
                 'newsbox' => [
                    'label' => 'Events and News',
                    'component' => 'Core',
                    'order' => 70,
                    'scope' => ['system']],
                 'models' => [
                    'label' => 'Models',
                    'component' => 'Core',
                    'order' => 50,
                    'scope' => ['workspace']],
                 'workspaces' => [
                    'label' => 'WorkSpaces',
                    'component' => 'Core',
                    'order' => 30,
                    'scope' => ['system']]];
$this->registry['widgets'] = $core_widgets;