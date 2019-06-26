<?php
$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'GXtc+040e4As0jFqmIWL/cI1cr48MZeXtwD2X6fh74Rw7Mk09LYByMWeBQZdiZRsBjmhV918UIFclBhJji87CThJbsvLez47hJA/lI0w4oy0lGeJ2uuA4SCQPiwO8rZnZrfcE9n68Q9L5Av3GNEWDwdB04t89/1O/w1cDnyilFU='; 
$channelSecret = 'e11cef3ff1c5c69f50f401ddcebff0f5';
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);
$request = file_get_contents('php://input');   // Get request content
$request_array = json_decode($request, true);   // Decode JSON to Array
$jsonFlex = [
    "type" => "flex",
    "altText" => "Flex Message",
    "contents" => [
      "type" => "carousel",
      "contents" => [
        [
          "type" => "bubble",
          "hero" => [
            "type" => "image",
            "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_5_carousel.png",
            "size" => "full",
            "aspectRatio" => "20:13",
            "aspectMode" => "cover"
          ],
          "body" => [
            "type" => "box",
            "layout" => "vertical",
            "spacing" => "sm",
            "contents" => [
              [
                "type" => "text",
                "text" => "Arm Chair, White",
                "size" => "xl",
                "weight" => "bold",
                "wrap" => true
              ],
              [
                "type" =>"box",
                "layout" => "baseline",
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "$49",
                    "flex" => 0,
                    "size" => "xl",
                    "weight" => "bold",
                    "wrap" => true
                  ],
                  [
                    "type" => "text",
                    "text" => ".99",
                    "flex" => 0,
                    "size" => "sm",
                    "weight" => "bold",
                    "wrap" => true
                  ]
                ]
              ]
            ]
          ],
          "footer" => [
            "type" => "box",
            "layout" => "vertical",
            "spacing" => "sm",
            "contents" => [
              [
                "type" => "button",
                "action" => [
                  "type" => "uri",
                  "label" => "สมัครสมาชิก",
                  "uri" => "https://linecorp.com"
                ],
                "color" => "#FD0A0A",
                "style" => "primary"
              ],
              [
                "type" => "button",
                "action" => [
                  "type" => "uri",
                  "label" => "เข้าเว็บ",
                  "uri" => "https://linecorp.com"
                ],
                "color" =>"#1BCA14",
                "style" => "primary"
              ]
            ]
          ]
        ],
        [
          "type" => "bubble",
          "hero" => [
            "type" => "image",
            "url" => "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_6_carousel.png",
            "size" => "full",
            "aspectRatio" => "20:13",
            "aspectMode" => "cover"
          ],
          "body" => [
            "type" => "box",
            "layout" => "vertical",
            "spacing" => "sm",
            "contents" => [
              [
                "type" =>"text",
                "text" =>"Metal Desk Lamp",
                "size" => "xl",
                "weight" => "bold",
                "wrap" => true
              ],
              [
                "type" => "box",
                "layout" => "baseline",
                "flex" => 1,
                "contents" => [
                  [
                    "type" => "text",
                    "text" => "$11",
                    "flex" => 0,
                    "size" =>"xl",
                    "weight" => "bold",
                    "wrap" => true
                  ],
                  [
                    "type" => "text",
                    "text" => ".99",
                    "flex" => 0,
                    "size" => "sm",
                    "weight" =>"bold",
                    "wrap" => true
                  ]
                ]
              ],
              [
                "type" => "text",
                "text" => "Temporarily out of stock",
                "flex" => 0,
                "margin" => "md",
                "size" => "xxs",
                "color" => "#FF5551",
                "wrap" => true
              ]
            ]
          ],
          "footer" => [
            "type" => "box",
            "layout" => "vertical",
            "spacing" => "sm",
            "contents" => [
              [
                "type" => "button",
                "action" => [
                  "type" => "uri",
                  "label" => "สมัครสมาชิก",
                  "uri" => "https://linecorp.com"
                ],
                "flex" => 2,
                "color" => "#FD0A0A",
                "style" => "primary"
              ],
              [
                "type" => "button",
                "action" => [
                  "type" => "uri",
                  "label" => "เข้าเว็บ",
                  "uri" => "https://linecorp.com"
                ],
                "color" => "#1BCA14",
                "style" => "primary"
              ]
            ]
          ]
        ],
        [
          "type" => "bubble",
          "body" => [
            "type" => "box",
            "layout" => "vertical",
            "spacing" => "sm",
            "contents" => [
              [
                "type" => "button",
                "action" => [
                  "type" => "uri",
                  "label" => "ดูเพิ่ม",
                  "uri" => "https://linecorp.com"
                ],
                "flex" => 1,
                "gravity" => "center"
              ]
            ]
          ]
        ]
      ]
    ]
];

$ThatTime ="19:00:00";
if (time() >= strtotime($ThatTime)) {
    $reply_message = '';
    $reply_token = $event['replyToken'];
    $data = [
        'replyToken' => $reply_token,
        'messages' => [$jsonFlex]
    ];
    print_r($data);
    $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
    $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
    echo "Result: ".$send_result."\r\n";
}

  echo "ok";

if ( sizeof($request_array['events']) > 0 ) {
    foreach ($request_array['events'] as $event) {
        error_log(json_encode($event));
        $reply_message = '';
        $reply_token = $event['replyToken'];
        $data = [
            'replyToken' => $reply_token,
            'messages' => [$jsonFlex]
        ];
        print_r($data);
        $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
        $send_result = send_reply_message($API_URL.'/reply', $POST_HEADER, $post_body);
        echo "Result: ".$send_result."\r\n";
        
    }
}
echo "OK";

function send_reply_message($url, $post_header, $post_body)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
?>