<?php

function getIndecator($date){
    $hours =Carbon\Carbon::parse($date)->diffInHours() ;
    if($hours> 1000 ) return 1;
    if( $hours-1000 == 0) return 1;
    return (int) abs(($hours-1000)/10);

}