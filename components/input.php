<?php

function TextInput($type, $name, $id = null, $value = null){
echo('
<input
    type="'.$type.'"
    name="'.$name.'"
    id="'.$id.'"
    value="'.$value.'"
    class="
    text-slate-500
    font-medium 
    text-sm 
    bg-gray-100 
    cursor-pointer
    file:cursor-pointer
    file:border-0
    file:py-2 
    file:px-4 
    file:mr-4
    file:bg-gray-800
    file:hover:bg-gray-700
    file:text-white rounded"
/>');
}
