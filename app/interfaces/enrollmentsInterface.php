<?php

namespace App\Interfaces;

interface EnrollmentsInterface
{
    public function index($course_id);
    public function store($course_id,$price);
}


