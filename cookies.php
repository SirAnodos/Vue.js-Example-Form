<?php

$attributes = ['fname' => null, 'lname' => null, 'dob' => null, 'sex' => null,
    'children' => null, 'veteran' => null, 'exp' => null, 'jobs' => null,];

if ($_GET['action'] == 'save') {
    foreach ($_POST as $attribute => $value) {
        if (array_key_exists($attribute, $attributes)) { // only set cookie if the name is valid
            setcookie($attribute, $value);
            if ($value == 'null' || $value == '') {
                setcookie($attribute, '', time()-1000);
            } else {
                setcookie($attribute, $value);
            }
        }
    }
} elseif ($_GET['action'] == 'load') {
    foreach ($_COOKIE as $attribute => $value) {
        $attributes[$attribute] = $value;
    }
    echo json_encode($attributes);
}
?>