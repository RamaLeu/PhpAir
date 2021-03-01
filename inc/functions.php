<?php
function printData($post){

    $data = "data/tickets.txt";
    $content = file_get_contents($data);
    $formData = implode(',', $post);
    $content .= $formData.rand(1000, 9999).":";
    file_put_contents($data, $content);
}
function readData(){
    $data = "data/tickets.txt";
    $tickets = file_get_contents($data);
    $tickets = explode(':', $tickets);
    return $tickets;
}

