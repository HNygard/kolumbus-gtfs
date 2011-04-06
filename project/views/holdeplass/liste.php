<?php

if(isset($stops))
{
	foreach ($stops as $stop)
	{
		echo html::anchor($stop->getLink(), $stop->stop_name).'<br>';
	}
}
