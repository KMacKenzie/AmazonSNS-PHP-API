<?php

include('./config.inc.php');
include('../lib/amazonsns.class.php');

$SNS = new AmazonSNS(AMAZON_ACCESS_KEY_ID, AMAZON_SECRET_ACCESS_KEY);

$topics = $SNS->listTopics();

echo '<h1>Topics</h1>';

?>

<table border="1">
<tr><th>TopicArn</th><th></th></tr>
<?php
foreach($topics as $topic)
{
	?>
	<tr>
		<td><a href="show_topic.php?topic=<?php echo $topic['TopicArn']; ?>"><?php echo $topic['TopicArn']; ?></a></td>
		<td><a href="delete_topic.php?topic=<?php echo $topic['TopicArn']; ?>">Delete</a></td>
	</tr>
	<?php
}
?>

<h3>New</h3>
<form action="new_topic.php" method="post">
	<input type="text" name="name" value="name" /><br />
	<input type="submit" value="Create" />
</form>
