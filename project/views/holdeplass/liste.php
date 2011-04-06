<?php

if(isset($stops))
{
	foreach ($stops as $stop)
	{
		echo html::anchor(Model_Stop::getLinkFromArray($stop), $stop['stop_name']).'<br>';
	}
}
