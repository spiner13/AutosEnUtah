<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public $carousel = [];
    public $testimonial = [];
    public $cars = 8;
    public $pictures = [
        ['picture' => 1 , 'text' => ' some text for all images', 'name' => 'Bertha y su hija'],
        ['picture' => 2 , 'text' => ' some text for all images', 'name' => 'Familia Smith'],
        ['picture' => 3 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 4 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 5 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 6 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 7 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 8 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 9 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 10 , 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 11, 'text' => ' some text for all images', 'name' => 'name'],
        ['picture' => 12, 'text' => ' some text for all images', 'name' => 'name']
    ];

	public function __construct()
    {
        parent::__construct();
        $this->setCars();
        $this->setTestimonial();

        $this->twig->addGlobal('carousel', $this->carousel);
        $this->twig->addGlobal('testimonial', $this->testimonial);
        $this->twig->addGlobal('sitename', 'AutosEnUtah');
    }

    public function setCars()
    {
        $min = 4;
        while(count($this->carousel) < $min)
        {
            array_push($this->carousel, $this->getRandNumber(1, $this->cars));
            $this->cleanRepeatNumber($this->carousel);
        }
    }

    public function setTestimonial()
    {
        $min = 8;
        $tmp = [];

        while(count($tmp) < $min)
        {
            $selected = $this->getRandNumber(0, count($this->pictures)-1);
            array_push($tmp, $selected);
            $tmp = $this->cleanRepeatPicture($tmp);
        }

        foreach($tmp as $number)
        {
            array_push($this->testimonial, $this->pictures[$number]);
        }
        
    }

    public function getRandNumber(int $min, int $max)
    {
        return rand($min, $max);
    }

    public function cleanRepeatNumber(array $array)
    {
        $this->carousel = array_unique($array);
    }

    public function cleanRepeatPicture(array $array)
    {
        return array_unique($array);
    }

}