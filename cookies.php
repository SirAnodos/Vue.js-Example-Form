<?php

$attributes = ['fname' => null, 'lname' => null, 'dob' => null, 'sex' => null,
    'children' => null, 'veteran' => null, 'exp' => null, 'jobs' => null,];

if (sizeof($_GET) > 0) {
    foreach ($_GET as $attribute => $value) {
        if (array_key_exists($attribute, $attributes)) { // only set cookie if the name is valid
            if ($value == 'null' || $value == '') {
                setcookie($attribute, '', time()-1000);
            } else {
                setcookie($attribute, $value);
            }
        }
    }
} else {
    foreach ($_COOKIE as $attribute => $value) {
        $attributes[$attribute] = $value;
    }
    echo json_encode($attributes);
}
?>