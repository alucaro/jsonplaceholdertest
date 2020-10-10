<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class DataController extends Controller
{
    
    const API_BASE_PATH = 'https://jsonplaceholder.typicode.com/';
        
    public function getRegister(string $endpoint, string $id) 
    {      
        $uri    = self::API_BASE_PATH . $endpoint;
        $params = ['id' => $id];
        $response = $this->doGet($uri, $params, true);
        $data = $response->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data[0]);       
    }
    

    public function getAllRegisters(string $endpoint) 
    {              
        $uri    = self::API_BASE_PATH . $endpoint;        
        $response = $this->doGet($uri, [], true);
        $data = $response->getBody()->getContents();        
        $data = json_decode($data);
        return response()->json($data);   
    }

    public function createRegister(string $endpoint, Request $request) 
    {                          
        
        $isValid = $this->validateRoutes($endpoint);
        if ($isValid) 
        {             
            $data = $request->all();
            $isValid = $this->validateRequestByCategory($endpoint, $data, "create");
            if ($isValid)
            {
                $uri  = self::API_BASE_PATH . $endpoint;
                $response = $this->doPost($uri, $data, true);
                $data = $response->getBody()->getContents();                
                $data = json_decode($data);                
                return response()->json($data); 
            }
            else
            {
                return response()->json([
                    'error' => 'Error en la peticion, los datos no son validos'], 400);
            }
        }
        else 
        {
            return response()->json([
                'error' => 'Pagina no encontrada, por favor verifica los datos'], 404);
        }                 
    }    

    public function updateRegister(string $endpoint, string $id, Request $request) 
    {        
        //dd($request->all());
        $isValid = $this->validateRoutes($endpoint);
        if ($isValid) 
        {             
            $data = $request->all();
            $isValid = $this->validateRequestByCategory($endpoint, $data, "edit");
            if ($isValid)
            {
                $uri    = self::API_BASE_PATH . $endpoint . '/' . $id; 
                $response = $this->doPut($uri, $data, true);
                $data = $response->getBody()->getContents();                
                $data = json_decode($data);                
                return response()->json($data); 
            }
            else
            {
                return response()->json([
                    'error' => 'Error en la peticion, los datos no son validos'], 400);
            }
        }
        else 
        {
            return response()->json([
                'error' => 'Pagina no encontrada, por favor verifica los datos'], 404);
        }           
    }

    public function deleteRegister(string $endpoint, string $id)
    {             
        $isValid = $this->validateRoutes($endpoint);
        if ($isValid) 
        {             
            //$data = $request->all();                             
            $isValid =  $this->validateRegister(["id" => $id], "required|numeric", "id");            
            if ($isValid)
            {
                $uri    = self::API_BASE_PATH . $endpoint . '/' . $id; 
                $response = $this->doDelete($uri, [], true);
                $data = $response->getBody()->getContents();                
                $data = json_decode($data);                
                return response()->json($data); 
            }
            else
            {
                return response()->json([
                    'error' => 'Error en la peticion, los datos no son validos'], 400);
            }
        }
        else 
        {
            return response()->json([
                'error' => 'Pagina no encontrada, por favor verifica los datos'], 404);
        }   
    }

    public function filter(string $endpoint, string $field, string $value)
    {        
        $uri    = self::API_BASE_PATH . $endpoint ; 
        $data   = [$field => $value];
        $response = $this->doGet($uri, $data, true);
        $data = $response->getBody()->getContents();
        dd($data);
    }

    public function getCommentsPost(string $id)
    {
        
        $uri    = self::API_BASE_PATH . 'posts/' . $id . '/comments';
        $response = $this->doGet($uri, [], true);    
        $data = $response->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data); 
    }

    public function getPhotosAlbum(string $id)
    {
        $uri    = self::API_BASE_PATH . 'albums/' . $id . '/photos';
        $response = $this->doGet($uri, [], true);
        $data = $response->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data); 
    }

    public function getAlbumsUser(string $id)
    {
        $uri    = self::API_BASE_PATH . 'users/' . $id . '/albums';
        $response = $this->doGet($uri, [], true);
        $data = $response->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data);  
    }

    public function getTodosUser(string $id)
    {
        $uri    = self::API_BASE_PATH . 'users/' . $id . '/todos';
        $response = $this->doGet($uri, [], true);
        $data = $response->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data);  
    }

    public function getPostsUser(string $id)
    {
        $uri    = self::API_BASE_PATH . 'users/' . $id . '/posts';
        $response = $this->doGet($uri, [], true);
        $data = $response->getBody()->getContents();
        $data = json_decode($data);
        return response()->json($data); 
    }

    public function validateRoutes(string $endpoint) 
    {
        $valid = false;
        switch ($endpoint) {
            case 'users'   : $valid = true; break;
            case 'posts'   : $valid = true; break;
            case 'albums'  : $valid = true; break;
            case 'todos'   : $valid = true; break;
            case 'comments': $valid = true; break;
            case 'photos'  : $valid = true; break;
            default: $valid = false;                           
        }
        return $valid;
    } 

    public function validateRequestByCategory(string $endpoint, array $data, $action = "create") 
    {
        $valid = false;
          
        $operation = $action == "create" ? "create" : "edit";
        switch ($endpoint) {
            case 'users'   : $valid = $this->validateUser($data, $operation);     break;
            case 'posts'   : $valid = $this->validatePost($data, $operation);     break;
            case 'albums'  : $valid = $this->validateAlbum($data, $operation);    break;
            case 'todos'   : $valid = $this->validateTodo($data, $operation);     break;            
            case 'photos'  : $valid = $this->validatePhotos($data, $operation);   break;
            case 'comments': $valid = $this->validateComments($data, $operation); break;
            default: $valid = false;                           
        }
        return $valid;
    }

    public function validateUser(array $data, $action = "create") 
    {
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric"      , "id");
        $isValid &= $this->validateRegister($data, "required"      , "name");
        $isValid &= $this->validateRegister($data, "required"      , "username");  
        $isValid &= $this->validateRegister($data, "required|email", "email");  

        return $isValid;
    }

    public function validatePost(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric"      , "id");
        $isValid &= $this->validateRegister($data, "required|numeric", "userId");
        $isValid &= $this->validateRegister($data, "required"  , "title");  

        return $isValid;
    }

    public function validateAlbum(array $data, $action = "create") 
    {  
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric"      , "id");
        $isValid &= $this->validateRegister($data, "required|numeric", "userId");        
        $isValid &= $this->validateRegister($data, "required", "title");

        return $isValid;
    }

    public function validateTodo(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric"      , "id");
        $isValid &= $this->validateRegister($data, "required|numeric", "userId");        
        $isValid &= $this->validateRegister($data, "required", "title"); 
        $isValid &= $this->validateRegister($data, "required", "completed");

        return $isValid;
    }

    public function validatePhotos(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric"      , "id");
        $isValid &= $this->validateRegister($data, "required|numeric", "albumId");        
        $isValid &= $this->validateRegister($data, "required", "title");

        return $isValid;
    }

    public function validateComments(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric"      , "id");
        $isValid &= $this->validateRegister($data, "required|numeric", "postId");        
        $isValid &= $this->validateRegister($data, "required", "title");
        $isValid &= $this->validateRegister($data, "required|email", "email");
        $isValid &= $this->validateRegister($data, "required", "body");

        return $isValid;
    }

    

    public function validateRegister(array $register, $rulesStr, $field)
    {        
        $isValid = true;
        $rules = explode("|", $rulesStr);
        if (!array_key_exists($field, $register))
        {                
            $isValid = array_key_exists("required", $rules) ? true : false;                 
            return $isValid;
        }    
    
        foreach ($rules as $key => $rule) 
        {
            switch($rule)
            {
                case "required":                                          
                        $isValid &= array_key_exists($field, $register) && !empty($register[$field]);                                                          
                    break;
                
                case "numeric":                        
                        $isValid &= !is_numeric($register[$field]) ? false : true;                                                                                              
                    break;
                
                case "email":                        
                        $isValid &= filter_var($register[$field], FILTER_VALIDATE_EMAIL) ? true : false;                         
                    break;                              
            }
        }
        
        return $isValid;
    }
    
    public function doPost(string $url, array $data, ?bool $jsonEncode = null): ?ResponseInterface
    {
       
        $header = [];
        if ($jsonEncode) {
            $header = ['headers' => ['Content-Type' => 'application/json']];
        }
        $client = new Client($header);

        return $client->post($url, ['body' => json_encode($data)]);
        
    }

    public function doPut(string $url, array $data, ?bool $jsonEncode = null): ?ResponseInterface
    {
       
        $header = [];
        if ($jsonEncode) {
            $header = ['headers' => ['Content-Type' => 'application/json']];
        }
        $client = new Client($header);

        return $client->put($url, ['body' => json_encode($data)]);
        
    }

    public function doDelete(string $url, array $data, ?bool $jsonEncode = null): ?ResponseInterface
    {
        
        $header = [];
        if ($jsonEncode) {
            $header = ['headers' => ['Content-Type' => 'application/json']];
        }
        $client = new Client($header);

        return $client->delete($url, ['query' => $data]);      
    }

    public function doGet(string $url, array $data, ?bool $jsonEncode = null): ?ResponseInterface
    {
        
        $header = [];
        if ($jsonEncode) {
            $header = ['headers' => ['Content-Type' => 'application/json']];
        }
        $client = new Client($header);

        return $client->get($url, ['query' => $data]);      
    }
}
