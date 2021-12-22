<?php

//Работа с примитивной базой данных с использованием 'serialize'
class Storage
{
    public function write($database, $data)
    {
      $handle = fopen ("storage/$database.txt","w") or $error = array(
        "code" => 500,
        "message" => "Internal Server Error"
      );
      $s_data = serialize($data);
      fwrite($handle, $s_data);
      fclose ($handle);
      return $error ?  $error : true;
    }
    public function read($database)
    {
      $handle = file_get_contents("storage/$database.txt");
      $data = unserialize($handle);
      return $handle ? $data : false;
    }

}

try {
  $code = 200;
  $message = "ok";

  header("Access-Control-Allow-Origin: *");
  header( `HTTP/1.1 $code $message`); 
  header("Content-Type: application/json; charset=UTF-8");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Pragma: no-cache");
  http_response_code($code);

  $method = $_SERVER['REQUEST_METHOD'];
  if ($method != 'GET') throw  new Exception('Bad request', 400); // 400 Bad request

  $uri = explode("/", $_SERVER["PATH_INFO"]);
  if (count($uri) > 3 || $uri[1] != 'api' || $uri[2] != 'items') throw  new Exception('Forbidden', 403); // 403 Forbidden

  $storage = new Storage();
  $data = $storage->read("item");

  if (!$data) throw new Exception('Origin Is Unreachable', 523);

  echo json_encode($data, JSON_UNESCAPED_UNICODE);
} catch (Exception $e) {
  $code = $e->getCode();
  $message = $e->getMessage();

  switch ($code) {
    case 400:
      $body = array(
        "type" => "/errors/bad-request",
        "title" => $message,
        "status" => $code,
        "detail" => "This method is not processed by the server",
        "instance" => $_SERVER["REQUEST_URI"]
      );
      break;
      case 403:
        $body = array(
          "type" => "/errors/no-access",
          "title" => $message,
          "status" => $code,
          "detail" => "there is no access to the file",
          "instance" => $_SERVER["REQUEST_URI"]
        );
        break;
      case 523:
        $body = array(
          "type" => "/errors/database-empty",
          "title" => $message,
          "status" => $code,
          "detail" => "Data could not be found",
          "instance" => $_SERVER["REQUEST_URI"]
        );
        break;
    default:
    $body = array(
      "type" => "/errors/undifined-error",
      "title" => "Undifined Internal Server Error",
      "status" => 500,
      "detail" => "The error cannot be handled by the server",
      "instance" => $_SERVER["REQUEST_URI"]
    );
      break;
  }
  

  echo json_encode($body);
};
