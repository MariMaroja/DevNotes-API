<?php

require_once 'utils/Response.php';
require_once 'models/Note.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $noteModel = new Note();
    if (isset($_GET['id'])){
        $note = $noteModel->findById((int) $_GET['id']);
        if (!$note){
            Response::json(["error" => "Note not found"], 404);
            exit;
        }
        Response::json($note);
        exit;
    }
    Response::json($noteModel->getAll());
    exit;
}

if ($method === 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);
    $noteModel = new Note();
    $note = $noteModel->create($body['title'], $body['content']);
    Response::json($note, 201);
    exit;
}

if ($method === 'PUT'){
    if (!isset($_GET['id'])){
        Response::json(["error"=> "Id is required"],400);
        exit;
    }
    $body = json_decode(file_get_contents("php://input"), true);
    if (empty($body['title']) || empty($body['content'])){
        Response::json(["error"=> "Title "],400);
        exit;
    }
    $noteModel = new Note();
    $updatedNote = $noteModel->update((int) $_GET['id'], $body['title'], $body['content']);
    if (!$updatedNote){
        Response::json(["error"=> "Note not found"],404);
        exit;
    }
    Response::json($updatedNote);
    exit;
}

if ($method === 'DELETE'){
    if (!isset($_GET['id'])){
        Response::json(["error" => "Id is required"], 400);
        exit;
    }
    $noteModel = new Note();
    $deleted = $noteModel->delete((int) $_GET["id"]);
    if (!$deleted){
        Response::json(["error"=> "Note not found"],404);
        exit;
    }
    Response::json(["message" => "Note deleted successfully"]);
    exit;
}

Response::json(["error" => "Method not allowed"], 405);