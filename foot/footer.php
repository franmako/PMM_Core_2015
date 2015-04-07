<?php
$author= $ini['Footer']['author_name'];
$copyright_date= $ini['Footer']['copyright_date'];
echo 
'
<div id="copyright">
<p>Author: '.$author.' <a href="index.php?rq=contact">Contact the admin.</a> Copyright &copy;'. $copyright_date.'</p>
</div>
';
?>