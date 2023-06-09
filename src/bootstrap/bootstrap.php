<?php

# HTTP Session 시
session_start();

# composer autoload 설정
require __DIR__ . '/../../vendor/autoload.php';

# Class Autoload 설정
require __DIR__ . '/setup_autoload.php';

# Core Components
require __DIR__ . '/../core/QueryBuilder.php';
require __DIR__ . '/../core/RelationalDataSource.php';
