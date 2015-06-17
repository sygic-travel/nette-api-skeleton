<?php

require __DIR__ . '/../vendor/autoload.php';

$tomDebug = getenv('TOM_DEBUG') === 'TRUE' && isset($_COOKIE['tom_api_debug']);
$tomLogDir = getenv('TOM_LOG_DIR') ?: '/var/log/tripomatic-api-skeleton';
$tomTmpDir = getenv('TOM_TMP_DIR') ?: '/var/tmp/tripomatic-api-skeleton';
$tomConfigFile = getenv('TOM_CONFIG_FILE') ?: __DIR__ . '/config.local.neon';

$configurator = new Nette\Configurator();
$configurator->setDebugMode($tomDebug);
$configurator->enableDebugger($tomLogDir);

// fix for HHVM to always correctly render Tracy bluescreen
register_shutdown_function(function () { flush(); });

$configurator->setTempDirectory($tomTmpDir);
$configurator->addConfig(__DIR__ . '/config.neon');
if (file_exists($tomConfigFile)) {
	$configurator->addConfig($tomConfigFile);
}

return $configurator->createContainer();
