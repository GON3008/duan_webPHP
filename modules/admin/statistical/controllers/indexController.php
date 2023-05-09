<?php

function construct() {
   // request_auth(false);
    load_model('index');
}
function indexAction() {
    request_auth(true);
    load('helper','format');
    load_view('index');
  }