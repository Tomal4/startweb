<?php

$isError = false;
$msg = [];

$arrErrors = [
    'required' => 'Pole %s% jest wymagane!',
	'email' => 'Adres E-mail w polu %s% jest niepoprawny!'
];

function fieldRequired($fieldName, $fieldVal)
{
    global $isError, $msg, $arrErrors;
    if (empty($fieldVal))
    {
        $isError = true;
        $msg[] = str_replace('%s%', $fieldName, $arrErrors['required']);
    }
}


function isEmail($fieldName, $fieldVal)
{
	global $isError, $msg, $arrErrors;
	$regex = '/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+\.[a-z]{2,3}$/';
	if( !preg_match($regex, $fieldVal))
	{
        $isError = true;
        $msg[] = str_replace('%s%', $fieldName, $arrErrors['email']);		
	}
	
}

function compareFields($fieldVal1, $fieldVal2)
{
    global $isError, $msg, $arrErrors;
    if ($fieldVal1 !== $fieldVal2)
    {
        $isError = true;
        $msg[] = 'Pola Hasła muszą mieć identyczną wartość';
    }
}

function displayErrors()
{
    global $isError, $msg;
    if($isError)
    {
        $html = '<div class="message"><ul class="error">';
        foreach ($msg as $m)
        {
            $html .= '<li>' . $m . '</li>';
        }

        $html .= "</ul></div>";
        echo $html;
    }
    else
    {
        return null;
    }
}