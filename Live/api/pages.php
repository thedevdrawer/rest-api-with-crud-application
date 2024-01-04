<?php
/*
Create api documentation root
Swagger PHP by ZirCote
install in api folder
composer require zircote/swagger-php

Swagger UI: 
https://swagger.io/tools/swagger-ui/
git clone https://github.com/swagger-api/swagger-ui.git
Clone then only copy the dist

mv ./dist /path/to/your/project/public/web/

showcase demo

Copy index.html to Documentation root

change yaml to json

*/
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';

if($_POST['type'] == 'list'):
    listPages();
elseif($_POST['type'] == 'single'):
    singlePage($_POST['slug']);
else:
    exit();
endif;

function listPages() {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT slug,title FROM pages ORDER BY orderid ASC');
    $stmt->execute();
    $result = $stmt->get_result();
    $pages = array();
    if($result->num_rows === 0):
        $ret = false;
    else:
        while($row = $result->fetch_assoc()):
            $pages[] = array('slug'=>$row['slug'],'title'=>$row['title']);
        endwhile;
    endif;
    $stmt->close();
    echo json_encode($pages);
}

function singlePage($slug) {
    global $mysqli;
    $stmt = $mysqli->prepare('SELECT title,content FROM pages WHERE slug = ?');
    $stmt->bind_param('s', $slug);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0):
        $page = false;
    else:
        while($row = $result->fetch_assoc()):
            $page = array('title'=>$row['title'], 'content'=>$row['content']);
        endwhile;
    endif;
    $stmt->close();
    echo json_encode($page);
}