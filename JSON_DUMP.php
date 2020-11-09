<?php

/*
 ┌─────────────────────────────────────────────────────────────┐
 |  For More Modules Or Updates Stay Connected to Kodi dot AL  |
 └─────────────────────────────────────────────────────────────┘
 ┌───────────┬─────────────────────────────────────────────────┐
 │ Product   │ PHP Source Code Regex Generator                 │
 │ Version   │ v1.0 BETA                                       │
 │ Provider  │ https://paidcodes.albdroid.al                   │
 │ Support   │ PHP 5/7                                         │
 │ Sources   │ Multiple Regex Data                             │
 │ Licence   │ Personal                                        │
 │ Author    │ Olsion Bakiaj                                   │
 │ Email     │ TRC4@USA.COM                                    │
 │ Author    │ Endrit Pano                                     │
 │ Email     │ INFO@ALBDROID.AL                                │
 │ Website   │ https://kodi.al                                 │
 │ Facebook  │ /albdroid.official/                             │
 │ Github    │ github.com/SxtBox/                              │
 │ Created   │ 29 August 2020                                  │
 │ Modified  │ 00:00:0000                                      │
 └─────────────────────────────────────────────────────────────┘
*/

/*
 PHP Code Generated Date: Monday, 09 November 2020 - 14:06:51
 PHP Code Generated From Host: demo.kodi.al
*/

/*
   Error Output
   E_ALL or E_NOTICE or 0 For Disable
   https://www.php.net/manual/en/function.error-reporting.php
*/

ob_start();
error_reporting(0); // C'AKTIVOZO ERRORS ON PHP
set_time_limit(0); // SET UNLIMITET TIME LIMIT
@ini_set("default_socket_timeout", 10);
ini_set("user_agent", "Albdroid PHP Codes");
date_default_timezone_set("Europe/Tirane");

    $API_HOST = "https://podcasts.apple.com/us/podcast/trap-nation-radio/id1328005034"; // SEE COPY_LINK.png AND PASTE HERE
    $source = file_get_contents(trim($API_HOST));

		$Titles = "";
		$Regex_1 = 'explicit\",\"artistName\":\"(.*?)\",\"assetUrl\":\"(http.*?)\",';
		if(preg_match_all('/' . $Regex_1 . '/', $source, $matches)) {
			$Titles = $matches[1]; // ARRAY TITLES
			// NON ARRAY TITLES
			//foreach($matches[1] as $items) {
				//$Titles .= $items;
			//}
			// NON ARRAY TITLES
		}

        $Titles = str_replace(
            array(" \u0026"),
            array(""),
            $Titles
        );

        $Streams = "";
		$Regex_2 = 'explicit\",\"artistName\":\"(.*?)\",\"assetUrl\":\"(http.*?)\",';
		if(preg_match_all('/' . $Regex_2 . '/', $source, $matches)) {
			$Streams = $matches[2];
		}

        $data_array = array();

    $data_array["Titles"] = $Titles;
    $data_array["Streams"] = $Streams;

echo str_replace('\/', '/', json_encode($data_array));
ob_end_flush();
?>