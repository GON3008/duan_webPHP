<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction() {
    request_auth(true);
    load('helper','format');
    
    $data['bill_details'] = get_list_bill_detail();
    load_view('index',$data); 
}
function deleteAction(){
    request_auth(true);
    $id=$_GET['id'];
    delete_bill_detail($id);
    push_notification('success', ['Xoá danh mục sản phẩm thành công']);
    header('location:/du_an_1_poly_hotel/?role=admin&mod=bill&action=index');


}

