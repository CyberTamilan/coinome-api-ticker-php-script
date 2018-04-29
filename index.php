
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$context = stream_context_create([ 
    'http'=> [ 
        'method'=> 'GET', 
        'user_agent'=> $_SERVER['HTTP_USER_AGENT'] 
    ]
]); 

$url = "https://www.coinome.com/api/v1/ticker.json";
$json = file_get_contents($url , false, $context);
$json_data = json_decode($json, true);
$btcinr = $json_data["btc-inr"]["last"];

$bchinr = $json_data["bch-inr"]["last"];
$ltcinr = $json_data["ltc-inr"]["last"];
$dgbinr = $json_data["dgb-inr"]["last"];
$zecinr = $json_data["zec-inr"]["last"];
$dashinr = $json_data["dash-inr"]["last"];
$qtuminr = $json_data["qtum-inr"]["last"];
$btginr = $json_data["btg-inr"]["last"];

$bchbtc = $json_data["bch-btc"]["last"];
$bchbtcinr = $json_data["bch-btc"]["last"]*$btcinr;
$ltcbtc = $json_data["ltc-btc"]["last"];
$ltcbtcinr = $json_data["ltc-btc"]["last"]*$btcinr;
$dgbbtc = $json_data["dgb-btc"]["last"];
$dgbbtcinr = $json_data["dgb-btc"]["last"]*$btcinr;
$zecbtc = $json_data["zec-btc"]["last"];
$zecbtcinr = $json_data["zec-btc"]["last"]*$btcinr;
$dashbtc = $json_data["dash-btc"]["last"];
$dashbtcinr = $json_data["dash-btc"]["last"]*$btcinr;
$qtumbtc = $json_data["qtum-btc"]["last"];
$qtumbtcinr = $json_data["qtum-btc"]["last"]*$btcinr;
$btgbtc = $json_data["btg-btc"]["last"];
$btgbtcinr = $json_data["btg-btc"]["last"]*$btcinr;


echo "<table border='1'>";
echo "<tr><td>BTC</td> <td>Rs $btcinr </td></tr>";
echo "<tr><td>BCH </td> <td>Rs $bchinr</td><td>$bchbtc(Rs$bchbtcinr)</td></tr>";
echo "<tr><td>LTC </td> <td>Rs $ltcinr</td><td>$ltcbtc(Rs$ltcbtcinr)</td></tr>";
echo "<tr><td>DGB </td> <td>Rs $dgbinr</td><td>$dgbbtc(Rs$dgbbtcinr)</td></tr>";
echo "<tr><td>ZEC</td> <td>Rs $zecinr </td><td>$zecbtc(Rs$zecbtcinr)</td></tr>";
echo "<tr><td>DASH </td> <td>Rs $dashinr</td><td>$dashbtc(Rs$dashbtcinr)</td></tr>";
echo "<tr><td>QTUM </td> <td>Rs $qtuminr</td><td>$qtumbtc(Rs$qtumbtcinr)</td></tr>";
echo "<tr><td>BTG </td> <td>Rs $btginr</td><td>$btgbtc(Rs$btgbtcinr)</td></tr>";
echo"</table>";


