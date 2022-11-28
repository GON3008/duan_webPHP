<?php

function get_list_productions() {
    // $result = db_fetch_array("SELECT p.id,p.name,p.image,p.count,p.price,p.description,p.created_at, p.created_id ,u.full_name as `full_name` FROM `productions` p JOIN `users` u ON p.created_id = u.id ");
    $result=db_fetch_array("select *  from productions  where 1 order by id ");
    return $result;
}
function lodall_sanpham_top10(){
    // $sql="select * from productions where 1 order by views desc limit 0,10";
    $result=db_fetch_array("select * from productions where 1 order by views desc limit 0,10");
    // $result=$production;
    return   $result;
}
