<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Expr\Cast\Object_;

/**
 * Cliente JsonPlaceholder
 * https://testplaceholder.herokuapp.com/
 * https://github.com/alucaro/jsonplaceholdertest
 */

class DataController extends Controller
{
    //Do not change, it is the address where all requests are directed
    const API_BASE_PATH = 'https://jsonplaceholder.typicode.com/';
       
    /**
     * Get a endpoint and id to send the request and get one register
     * @param $endpoint $id
     * @return Object
     */
    public function getRegister(string $endpoint, string $id)
    {      
        $uri      = self::API_BASE_PATH . $endpoint;
        $params   = ['id' => $id];
        $response = $this->doGet($uri, $params, true);
        $data     = $response->getBody()->getContents();
        $data     = json_decode($data);
        return response()->json($data[0]);       
    }
    
    /**
     * Get a endpoint to send the request and get all register
     * @param $endpoint
     * @return Object
     */
    public function getAllRegisters(string $endpoint) 
    {              
        $uri      = self::API_BASE_PATH . $endpoint;        
        $response = $this->doGet($uri, [], true);
        $data     = $response->getBody()->getContents();        
        $data     = json_decode($data);
        return response()->json($data);   
    }

    /**
     * Get a endpoint and a request to create a new register
     * Please note that the new record is not created, it is for testing purposes only.
     * @param $endpoint $id $request
     * @return Object
     */
    public function createRegister(string $endpoint, Request $request) 
    {                          
        
        $isValid = $this->validateRoutes($endpoint);

        if ($isValid) 
        {             
            $data    = $request->all();
            $isValid = $this->validateRequestByCategory($endpoint, $data, "create");
            
            if ($isValid)
            {
                $uri      = self::API_BASE_PATH . $endpoint;
                $response = $this->doPost($uri, $data, true);
                $data     = $response->getBody()->getContents();                
                $data     = json_decode($data);                
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

    /**
    * Get a endpoint, id and a request to update an existent register
    * Please note that the record is not really edited, it is for testing purposes only.
    * @param $endpoint $id $request
    * @return Object
    */
    public function updateRegister(string $endpoint, string $id, Request $request) 
    {        
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

     /**
    * Get a endpoint and id to delete an existent register
    * Please note that the record is not really delete, it is for testing purposes only
    * @param $endpoint $id
    * @return Object
    */
    public function deleteRegister(string $endpoint, string $id)
    {             
        $isValid = $this->validateRoutes($endpoint);

        if ($isValid) 
        {             
            //$data = $request->all();                             
            $isValid =  $this->validateRegister(["id" => $id], "required|numeric", "id");            
            if ($isValid)
            {
                $uri      = self::API_BASE_PATH . $endpoint . '/' . $id; 
                $response = $this->doDelete($uri, [], true);
                $data     = $response->getBody()->getContents();                
                $data     = json_decode($data);                
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
    
    /**
    * Get a endpoint, field and a value to get an register using filtering through query parameters
    * @param $endpoint $field $value
    * @return Object
    */
    public function filter(string $endpoint, string $field, string $value)
    {        
        $uri      = self::API_BASE_PATH . $endpoint ; 
        $data     = [$field => $value];
        $response = $this->doGet($uri, $data, true);
        $data     = $response->getBody()->getContents();
        $data     = json_decode($data);
        return response()->json($data); 
    }

    /**
    * Get comments to the especific posts id
    * Please note that the record is not really delete, it is for testing purposes only
    * @param $id
    * @return Object
    */
    public function getCommentsPost(string $id)
    {
        
        $uri      = self::API_BASE_PATH . 'posts/' . $id . '/comments';
        $response = $this->doGet($uri, [], true);    
        $data     = $response->getBody()->getContents();
        $data     = json_decode($data);
        return response()->json($data); 
    }

    /**
    * Get albums to the especific photos id
    * Please note that the record is not really delete, it is for testing purposes only
    * @param $id
    * @return Object
    */
    public function getPhotosAlbum(string $id)
    {
        $uri      = self::API_BASE_PATH . 'albums/' . $id . '/photos';
        $response = $this->doGet($uri, [], true);
        $data     = $response->getBody()->getContents();
        $data     = json_decode($data);
        return response()->json($data); 
    }

    /**
    * Get albums to the especific users id
    * Please note that the record is not really delete, it is for testing purposes only.
    * @param $id
    * @return Object
    */
    public function getAlbumsUser(string $id)
    {
        $uri      = self::API_BASE_PATH . 'users/' . $id . '/albums';
        $response = $this->doGet($uri, [], true);
        $data     = $response->getBody()->getContents();
        $data     = json_decode($data);
        return response()->json($data);  
    }

    /**
    * Get todo to the especific users id
    * Please note that the record is not really delete, it is for testing purposes only
    * @param $id
    * @return Object
    */
    public function getTodosUser(string $id)
    {
        $uri      = self::API_BASE_PATH . 'users/' . $id . '/todos';
        $response = $this->doGet($uri, [], true);
        $data     = $response->getBody()->getContents();
        $data     = json_decode($data);
        return response()->json($data);  
    }

    /**
    * Get posts to the especific users id
    * Please note that the record is not really delete, it is for testing purposes only
    * @param $id
    * @return Object
    */
    public function getPostsUser(string $id)
    {
        $uri      = self::API_BASE_PATH . 'users/' . $id . '/posts';
        $response = $this->doGet($uri, [], true);
        $data     = $response->getBody()->getContents();
        $data     = json_decode($data);
        return response()->json($data); 
    }

    /**
     * The names send on endpoint should match the type required
     * @param $endpoint
     * @return Boolean
     */
    public function validateRoutes(string $endpoint) 
    {
        $valid = false;
        switch ($endpoint) {
            case 'comments': $valid = true; break;
            case 'albums'  : $valid = true; break;
            case 'photos'  : $valid = true; break;
            case 'users'   : $valid = true; break;
            case 'posts'   : $valid = true; break;
            case 'todos'   : $valid = true; break;
            default: $valid = false;                           
        }
        return $valid;
    } 

    /**
     * Select the action type and send data to validate depending of the endpoint
     * @param $endpoint $data $action
     * @return Boolean
     */
    public function validateRequestByCategory(string $endpoint, array $data, $action = "create") 
    {
        $valid = false;
          
        $operation = $action == "create" ? "create" : "edit";
        switch ($endpoint) {
            
            case 'comments': $valid = $this->validateComments($data, $operation); break;
            case 'albums'  : $valid = $this->validateAlbum($data, $operation);    break;            
            case 'photos'  : $valid = $this->validatePhotos($data, $operation);   break;
            case 'users'   : $valid = $this->validateUser($data, $operation);     break;
            case 'posts'   : $valid = $this->validatePost($data, $operation);     break;
            case 'todos'   : $valid = $this->validateTodo($data, $operation);     break;
            default: $valid = false;                           
        }
        return $valid;
    }

    /**
     * Check required data for create or edit an user
     * @param $data $action
     * @return Boolean
     */
    public function validateUser(array $data, $action = "create") 
    {
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required"        , "username"); 
            $isValid &= $this->validateRegister($data, "required|email"  , "email"   );
            $isValid &= $this->validateRegister($data, "required"        , "name"    );   
            $isValid &= $this->validateRegister($data, "required|numeric", "id"      );
        return $isValid;
    }

    /**
     * Check required data for create or edit an post
     * @param $data $action
     * @return Boolean
     */
    public function validatePost(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric", "userId");
            $isValid &= $this->validateRegister($data, "required"        , "title");
            $isValid &= $this->validateRegister($data, "required|numeric", "id");  

        return $isValid;
    }

    /**
     * Check required data for create or edit an Album
     * @param $data $action
     * @return Boolean
     */
    public function validateAlbum(array $data, $action = "create") 
    {  
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric", "userId");        
            $isValid &= $this->validateRegister($data, "required"        , "title");
            $isValid &= $this->validateRegister($data, "required|numeric", "id");

        return $isValid;
    }

    /**
     * Check required data for create or edit an todo
     * @param $data $action
     * @return Boolean
     */
    public function validateTodo(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required"        , "completed");
            $isValid &= $this->validateRegister($data, "required|numeric", "userId");      
            $isValid &= $this->validateRegister($data, "required"        , "title"); 
            $isValid &= $this->validateRegister($data, "required|numeric", "id");  

        return $isValid;
    }

    /**
     * Check required data for create or edit a photo
     * @param $data $action
     * @return Boolean
     */
    public function validatePhotos(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric", "albumId");        
            $isValid &= $this->validateRegister($data, "required",         "title");
            $isValid &= $this->validateRegister($data, "required|numeric", "id");

        return $isValid;
    }

    /**
     * Check required data for create or edit a comment
     * @param $data $action
     * @return Boolean
     */
    public function validateComments(array $data, $action = "create") 
    {   
        $isValid = true;

        if ($action == "edit")
            $isValid &= $this->validateRegister($data, "required|numeric", "postId");        
            $isValid &= $this->validateRegister($data, "required"        , "name");
            $isValid &= $this->validateRegister($data, "required|email"  , "email");
            $isValid &= $this->validateRegister($data, "required"        , "body");
            $isValid &= $this->validateRegister($data, "required|numeric", "id");

        return $isValid;
    }

    /**
     * Check the type of validation of the data
     * @param $endpoint $id $register $rulesStr $field
     * @return Boolean
     */
    public function validateRegister(array $register, $rulesStr, $field)
    {        
        $isValid = true;
        $rules   = explode("|", $rulesStr);

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
    
    /**
     * Create a GuzzleHttp client and send a post request
     * @param $url $data $jsonEncode
     * @return Object
     */
    public function doPost(string $url, array $data, ?bool $jsonEncode = null): ?ResponseInterface
    {
        $header = [];

        if ($jsonEncode) {
            $header = ['headers' => ['Content-Type' => 'application/json']];
        }

        $client = new Client($header);
        return $client->post($url, ['body' => json_encode($data)]);
        
    }

    /**
     * Create a GuzzleHttp client and send a put request
     * @param $url $data $jsonEncode
     * @return Object
     */
    public function doPut(string $url, array $data, ?bool $jsonEncode = null): ?ResponseInterface
    {
        $header = [];

        if ($jsonEncode) {
            $header = ['headers' => ['Content-Type' => 'application/json']];
        }

        $client = new Client($header);
        return $client->put($url, ['body' => json_encode($data)]);
        
    }

    /**
     * Create a GuzzleHttp client and send a delete request
     * @param $url $data $jsonEncode
     * @return Object
     */
    public function doDelete(string $url, array $data, ?bool $jsonEncode = null): ?ResponseInterface
    {
        $header = [];

        if ($jsonEncode) {
            $header = ['headers' => ['Content-Type' => 'application/json']];
        }

        $client = new Client($header);
        return $client->delete($url, ['query' => $data]);      
    }

    /**
     * Create a GuzzleHttp client and get a post request
     * @param $url $data $jsonEncode
     * @return Object
     */
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
