<?php
ob_start();
error_reporting(0);
set_time_limit(0);

date_default_timezone_set("Europe/Tirane");

$referer = "https://iptv.kodi.al/";
$Stream_Provider = "Podcast";
$Stream_Type = "Fetcher";

$zone = "Europe/Tirane";
$data1 = date("l d/m/Y - H:i:s");
$data2 = date("l, d F Y - H:i:s");
$data3 = date("d F Y");
$viti = date("Y");

$STRUKTURA_FILLIM = <<<KODI
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<channel>
<name>[COLOR lime][B]{$Stream_Provider} {$Stream_Type} at Albdroid TV[/B][/COLOR]</name>
<thumbnail>https://png.kodi.al/tv/albdroid/black.png</thumbnail>
<fanart>https://png.kodi.al/tv/albdroid/black.png</fanart>
<items_info> <!-- THIS IS OPTIONAL -->
<title>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime] [B][I][COLOR red]([/COLOR]{$Stream_Provider} {$Stream_Type}[COLOR red])[/I][/B][/COLOR]</title>
<genre>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime] [B][I][COLOR red]([/COLOR]{$Stream_Provider} {$Stream_Type}[COLOR red])[/I][/B][/COLOR]</genre>
<description>[COLOR blue][B]Author:[/COLOR] [COLOR lime][B]Olsion Bakiaj[/B][/COLOR][COLOR red] &amp;[/COLOR][COLOR lime][B] Endrit Pano[/B][/COLOR]</description>
<thumbnail>https://png.kodi.al/tv/albdroid/black.png</thumbnail>
<fanart>https://png.kodi.al/tv/albdroid/black.png</fanart>
<date>[COLOR lime][B]{$data3}[/B][/COLOR]</date>
<credits>[COLOR lime]TRC4[/B][/COLOR]</credits>
<year>[COLOR lime][B]{$viti}[/B][/COLOR]</year>
</items_info>\n\n
KODI;
$STRUKTURA_FUND = <<<FUND
<SetViewMode>504</SetViewMode>

</channel>
FUND;

$API_HOST = 'https://podcasts.apple.com/us/podcast/trap-nation-radio/id1328005034'; // SEE COPY_LINK.png AND PASTE HERE
$get_data = file_get_contents($API_HOST);
if(!$get_data) die("<b><center><font color=red>Network Error!!!</b></center></font><br/><body style='background-color:black'><b><center><font color=lime>API Don't Fetching Data From Remote Server<br/><br/> Or API Server it's Down</b></center></font><br/><b><center><font color=lime>Contact: TRC4@USA.COM</b></center></font><br/><b><center><font color=lime>Facebook:  /albdroid.official/</b></center></font><br/>");
header("Content-Type: application/rss+xml; charset=utf-8");

preg_match_all('/explicit","artistName":"(.*?)","assetUrl":"(http.*?)",/',
	$get_data,
    $matches,
    PREG_SET_ORDER
);
echo $STRUKTURA_FILLIM;
foreach ($matches as $item) {

$title = $item[1];
$stream = $item[2];

$title = str_replace(
    array(" \u0026","/"),
    array("","ft"),
    $title
);

$thumbnail = "https://png.kodi.al/tv/albdroid/black.png";

echo "<item>\n";
echo "<title>[COLOR lime][B]".$title."[/COLOR][/B]</title>\n";
echo "<link>".$stream."</link>\n";
echo "<thumbnail>".$thumbnail."</thumbnail>\n";
echo "<fanart>".$thumbnail."</fanart>\n";
echo "<date>[COLOR lime][B]" . $data2 . "[/B][/COLOR]</date>\n";
echo "<genre>[COLOR lime][B][I]Albdroid[/I][/B][/COLOR][COLOR lime][B][I] [COLOR red]([/COLOR]".$title."[COLOR red])[/I][/B][/COLOR]</genre>\n";
echo "<info>[COLOR lime][B]Website:[/B][/COLOR] [COLOR red][B]([/B][/COLOR][COLOR lime][B]Albdroid.AL[/B][/COLOR] [COLOR red][B]&amp;[/B][/COLOR] [COLOR lime][B]Kodi.AL[/B][/COLOR][COLOR red][B])[/B][/COLOR]</info>\n";
echo "</item>\n\n";
}
{
echo $STRUKTURA_FUND;
}
ob_end_flush();
?>