<?php

function filled_out($form_vars)
{
  // test that each variable has a value
  foreach ($form_vars as $key => $value)
  {
     if (!isset($key) || ($value == '')) 
        return false;
  } 
  return true;
}

function valid_email($address)
{
  // check an email address is possibly valid
  if (preg_match('^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$^', $address))
    return true;
  else 
    return false;
}

?>
