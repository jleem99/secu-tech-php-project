<?php

use Monolog\ErrorHandler;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggerService
{
	protected $logger;
	protected $handler;
	private $log_path = 'monolog.log';

	private function __construct()
	{
		$this->logger = new Logger('DEFAULT_LOGGER');
		$this->logger
			->pushHandler(new StreamHandler($this->log_path, Level::Warning));

		$this->handler = new ErrorHandler($this->logger);
		$this->handler->registerErrorHandler([], false);
		$this->handler->registerExceptionHandler();
		$this->handler->registerFatalHandler();
	}
}
