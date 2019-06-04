<?php
function get_post($conn, $var)
{
    return $conn->real_escape_string($_POST[$var]);
}

function mysql_fix_string($conn, $string)
{
    if (get_magic_quotes_gpc())
    {
        $string = stripslashes($string);
        $res = $conn->real_escape_string($string);
        return $res;
    }
    return $string;
}

function mysql_entities_fix_string($conn, $string)
{
    $htm = mysql_fix_string($conn, $string);
    return $htm;
}

