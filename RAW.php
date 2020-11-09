<?php
error_reporting(0);
$get_data = file_get_contents("https://podcasts.apple.com/us/podcast/trap-nation-radio/id1328005034"); // SEE COPY_LINK.png AND PASTE HERE

if(preg_match_all('/explicit","artistName":"(.*?)","assetUrl":"(http.*?)",/',
$get_data,
$matches,
PREG_SET_ORDER));

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
foreach ($matches as $items)
{
$Title = $items[1];
$Stream = $items[2];

$Title = str_replace(
    array(" \u0026","/"),
    array("","ft"),
    $Title
);

echo $Title."\n";
echo $Stream."\n";
}
?>