<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $carousel = [];
    public $testimonial = [];
    public $cars = [1,2,3,4,5,6,7,8];
    public $pictures = [1,2,3,4,5,6,7,8,9,10,11,12];

	public function __construct()
    {
        parent::__construct();
        $this->setCars();
        $this->setTestimonial();

        $this->twig->addGlobal('carousel', $this->carousel);
        $this->twig->addGlobal('testimonial', $this->testimonial);
        $this->twig->addGlobal('config', $this->config->config);
    }

    public function setCars()
    {
        $min = 4;
        shuffle($this->pictures);
        
        for($i = 0; $i < $min; $i++){
            array_push($this->carousel, $this->pictures[$i]);
        }   
    }

    public function setTestimonial()
    {
        $min = 8;
        shuffle($this->cars);

        for($i = 0; $i < $min; $i++){
            array_push( $this->testimonial , $this->cars[$i]);
        }        
    }
}