<?php

require_once('Model/student.php');

$student = new student();
$result = $student->find(1);
$student->setName("José Andrei Oliveira");
$student->save();

?>

<pre>
    <?php print_r($student->getName()); ?>
</pre>

