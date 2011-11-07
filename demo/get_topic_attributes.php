<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$attributes = $SNS->getTopicAttributes('arn:aws:sns:us-east-1:728309626753:TestTopic');

print_r($attributes);
