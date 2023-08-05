<?php


function isInternalInput($key)
{
	$internalInputs = ["event_id", "user_id"];

	return in_array($key, $internalInputs);
}
