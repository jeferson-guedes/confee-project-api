<?php
namespace Confee\Support\Http\Routing;

/**
 *
 * @author Jeferson Guedes
 *        
 */
abstract class RouteFile
{
    /**
     * 
     * @var array
     */
    protected $options;
    
    /**
     * 
     * @var \Illuminate\Routing\Router
     */
    protected $router;
    
    /**
     * RouteFile constructor.
     * 
     * @param array $options
     */
    public function __construct($options = []) 
    {
        $this->options = $options;
        
        $this->router = app('router');  
    }
    
    /**
     *  Register routers
     */
    public function register() 
    {
        $this->router->group($this->options, function () {
           $this->routes();  
        });   
    }
    
    /**
     * @return mixed
     */
    abstract protected function routes();
}

