<?php
function flattenArray($temp = [], $flatten = [])
{
    foreach ($temp as $key => $value) {
        if (is_array($value)) {
            $flatten = flattenArray($value, $flatten);
        } else {
            $flatten[] = $value;
        }
    }
    return $flatten;
}

$result = [];
if (isset($_POST) && !empty($_POST['txtArray'])) {
    $input = json_decode($_POST['txtArray']);
    if (is_array($input)) {
        $result = [
            'status' => true,
            'header' => 'Successfully converted.',
            'info' => json_encode(flattenArray($input))
        ];
    } else {
        $result = [
            'status' => false,
            'header' => 'There were some errors with your entry.',
            'info' => 'Please enter a valid entry. eg. [0,[1,2],4]'
        ];
    }
}
echo json_encode($result);