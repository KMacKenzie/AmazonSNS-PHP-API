<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topicArn = $_GET['topic'];

$topic = $SNS->getTopicAttributes($topicArn);

echo '<h1>Topic</h1>';

print_r($topic);

echo '<h2>Subscriptions</h2>';

$subs = $SNS->listSubscriptionsByTopic($topicArn);

foreach($subs as $sub)
{
	print_r($sub);
}
