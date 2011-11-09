<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topics = $SNS->listTopics();

echo '<h1>Topics</h1>';

foreach($topics as $topic)
{
	echo '<a href="show_topic.php?topic=' . $topic['TopicArn'] . '">' . $topic['TopicArn'] . '</a><br />';
}
