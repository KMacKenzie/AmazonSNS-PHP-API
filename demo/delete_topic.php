<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topicArn = $_GET['topic'];

$SNS->deleteTopic($topicArn);

?>

<h2>Deleted topic</h2>
<a href="list_topics.php">Return to topics list</a>
