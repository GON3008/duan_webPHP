<?php

function construct() {
   // request_auth(false);
    load_model('index');
}

function indexAction() {
    load_view('index');
}