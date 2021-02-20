<?php
namespace Confee\Support\Database;

use Illuminate\Database\Eloquent\Factory;
use Faker\Generator;

/**
 *
 * @author Jeferson Guedes
 *        
 */
abstract class ModelFactory
{
    
/** 
     * @var string
     */
    protected $model;
    
    /**
     * @var \Faker\Factory
     */
    protected $factory;
    
    /**
     * @var Generator
     */
    protected $faker;
    
    /**
     * ModelFactory Constructor
     */
    public function __construct()
    {
        $this->factory = app()->make(Factory::class);
        $this->faker = app()->make(Generator::class);
    }
    
    /**
     * 
     */
    public function define() 
    {
        $this->factory->define($this->model, function () {
           return $this->fields(); 
        });
    }
    
    /**
     * @return array
     */
    abstract protected function fields();
}

