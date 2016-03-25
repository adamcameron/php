<?php
$configRaw = file_get_contents(__DIR__ . '/config.xml');
$configSchema = file_get_contents(__DIR__ . '/config.xsd');

$configXml = new DOMDocument();
$configXml->loadXml($configRaw);

$isConfigValid = $configXml->schemaValidateSource($configSchema);

echo '<pre>';
var_dump(['config is valid'=>$isConfigValid]);
echo '</pre>';

$deploymentRaw = file_get_contents(__DIR__ . '/deployment.xml');
$deploymentSchema = file_get_contents(__DIR__ . '/deployment.xsd');

$deploymentXml = new DOMDocument();
$deploymentXml->loadXml($deploymentRaw);

$isDeploymentValid = $deploymentXml->schemaValidateSource($deploymentSchema);

echo '<pre>';
var_dump(['deployment is valid'=>$isDeploymentValid]);
echo '</pre>';
