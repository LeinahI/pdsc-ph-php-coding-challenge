<?php

function Button($type,$text){
echo('<button
                    type="'.$type.'"
                    class="
                    whitespace-nowrap
                    py-2.5
                    px-5
                    text-sm
                    font-medium
                    text-gray-900
                    focus:outline-none
                    bg-white
                    rounded-lg
                    border
                    border-gray-200
                    hover:bg-gray-100
                    hover:text-blue-700
                    focus:z-10
                    focus:ring-4
                    focus:ring-gray-100
                    dark:focus:ring-gray-700
                    dark:bg-gray-800
                    dark:text-gray-400
                    dark:border-gray-600
                    dark:hover:text-white
                    dark:hover:bg-gray-700">'.$text.'</button>');
}
