<?php
 http_response_code(200);
$httpClient = new \CurlHTTPClient('GXtc+040e4As0jFqmIWL/cI1cr48MZeXtwD2X6fh74Rw7Mk09LYByMWeBQZdiZRsBjmhV918UIFclBhJji87CThJbsvLez47hJA/lI0w4oy0lGeJ2uuA4SCQPiwO8rZnZrfcE9n68Q9L5Av3GNEWDwdB04t89/1O/w1cDnyilFU=');
$bot = new \LINEBot($httpClient, ['channelSecret' => 'e11cef3ff1c5c69f50f401ddcebff0f5']);

$actions = array (
  // general message action
  New \MessageTemplateActionBuilder("button 1", "text 1"),
  // URL type action
  New \UriTemplateActionBuilder("Google", "http://www.google.com"),
  // The following two are interactive actions
  New \PostbackTemplateActionBuilder("next page", "page=3"),
  New \PostbackTemplateActionBuilder("Previous page", "page=1")
);
$img_url = "https://cdn.shopify.com/s/files/1/0379/7669/products/sampleset2_1024x1024.JPG?v=1458740363";
$button = new \ButtonTemplateBuilder("button text", "description", $img_url, $actions);
$outputText = new \TemplateMessageBuilder("Button template builder", $button);
$response = $bot->replyMessage($event->getReplyToken(), $outputText);
?>