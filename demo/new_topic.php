<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$name = $_POST['name'];

$topicArn = $SNS->createTopic($name);

?>

<h2>Created topic</h2>
<?php echo $topicArn; ?><br />
<a href="list_topics.php">Return to topics list</a>
