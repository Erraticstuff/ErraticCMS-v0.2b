<?php

if (count($output) > 0) {
	echo "<div>";
		foreach ($output as $out) {
            echo "<p>". $out ."</p>";
        }
    echo "</div>";
}
?>