<?php

require_once('Model/course.php');

$course = new course();
$result = $course->search(array('STATUS' => 1, ':NAME' => '%php%'));
?>

<pre>
    <?php print_r($result); ?>
</pre>

