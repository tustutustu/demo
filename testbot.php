<?php
$httpClient = new \CurlHTTPClient('<channel access token>');
$bot = new \LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

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