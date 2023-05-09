<?php

function construct() {
   // request_auth(false);
    load_model('index');
}


function indexAction() {
    request_auth(true);
    load('helper','format');
    $data['bill_details'] = get_list_bill_detail();
    // Call the function to retrieve the total bill
    $total_bill =  get_total_bill();
    if (isset($total_bill['total_orders'])) {
        $data['total_orders'] = $total_bill['total_orders'];
    } else {
        $data['total_orders'] = 0;
    }
  
    $comment_total =  get_total_comment();
    if (isset($comment_total['total_comments'])) {
        $data['total_comments'] = $comment_total['total_comments'];
    } else {
        $data['total_comments'] = 0;
    }

    $user_total = get_total_users();
    if (isset($user_total['total_users'])){
        $data['total_users'] = $user_total['total_users'];
    }else {
        $data['total_users'] = 0;
    }

    $view_total = get_total_view();
    if (isset($view_total['total_view'])){
        $data['total_view'] = $view_total['total_view'];
    }else {
        $data['total_view'] = 0;
    }
    load_view('index', $data);
}







// function get_total_orders() {
//     $data = array();
//     $result = db_fetch_array("SELECT COUNT(*) as total_orders FROM bill_details");
   
//     if (isset($result['total_orders'])) {
//         $data['total_orders'] = $result['total_orders'];
//     } else {
//         $data['total_orders'] = 0;
//     }
    
//     return $data;
// }

// function indexAction() {
//     request_auth(true);
//     load('helper','format');
    
//     $data = get_total_orders();
//     $data['bill_details'] = get_list_bill_detail();
    
//     load_view('index', $data);
// }


