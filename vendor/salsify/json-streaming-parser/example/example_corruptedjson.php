<?php

declare(strict_types=1);

require_once __DIR__.'/../vendor/autoload.php';

$testfile = __DIR__.'/../tests/data/example.geojson';

$listener = new \JsonStreamingParser\Listener\CorruptedJsonListener();
$stream = fopen($testfile, 'r');
try {
    $parser = new \JsonStreamingParser\Parser($stream, $listener);
    $parser->parse();
    fclose($stream);
} catch (\Exception $e) {
    fclose($stream);
    throw $e;
}
$listener->forceEndDocument();
//get repaired json
$repairedJson = $listener->getJson();

print_r($repairedJson);
