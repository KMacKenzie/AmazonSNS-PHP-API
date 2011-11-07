<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topics = $SNS->listTopics()->member;

foreach($topics as $topic)
{
	print_r($topic);
}
