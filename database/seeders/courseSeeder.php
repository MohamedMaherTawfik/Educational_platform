<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses=[
            [
                'title'=>'frontend Development',
                'description'=>'introduction to frontend begineer level',
                'price'=> 14.25,
                'image'=>'frontend.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Backend Development',
                'description'=>'introduction to Backend begineer level',
                'price'=> 28.88,
                'image'=>'backend.png',
                'user_id'=>1
            ],
            [
                'title'=>'Ui/UX Designer',
                'description'=>'introduction to Ui/UX begineer level',
                'price'=> 18.10,
                'image'=>'uiux.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Cyber Security ',
                'description'=>'introduction to CCNA begineer level',
                'price'=> 30.15,
                'image'=>'cyber.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Data Science',
                'description'=>'introduction to Data Science using python',
                'price'=> 20.75,
                'image'=>'DataScience.png',
                'user_id'=>1
            ],
            [
                'title'=>'Data Analysis',
                'description'=>'introduction to Data Analysis using python',
                'price'=> 14.25,
                'image'=>'dataAnalysis.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Ai Generator',
                'description'=>'introduction to Ai Generator using python',
                'price'=> 14.25,
                'image'=>'AiGenerator.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Graphic Design',
                'description'=>'introduction to Graphic Design using photoshop',
                'price'=> 14.25,
                'image'=>'Gaphic.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'NLP Development',
                'description'=>'introduction to NLP Development using python',
                'price'=> 14.25,
                'image'=>'NLP.png',
                'user_id'=>1
            ],
            [
                'title'=>'Testing',
                'description'=>'introduction to Testing using python',
                'price'=> 14.25,
                'image'=>'testing.png',
                'user_id'=>1
            ],
            [
                'title'=>'frontend Development',
                'description'=>'introduction to frontend begineer level',
                'price'=> 14.25,
                'image'=>'frontend.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Backend Development',
                'description'=>'introduction to Backend begineer level',
                'price'=> 28.88,
                'image'=>'backend.png',
                'user_id'=>1
            ],
            [
                'title'=>'Ui/UX Designer',
                'description'=>'introduction to Ui/UX begineer level',
                'price'=> 18.10,
                'image'=>'uiux.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Cyber Security ',
                'description'=>'introduction to CCNA begineer level',
                'price'=> 30.15,
                'image'=>'cyber.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Data Science',
                'description'=>'introduction to Data Science using python',
                'price'=> 20.75,
                'image'=>'DataScience.png',
                'user_id'=>1
            ],
            [
                'title'=>'Data Analysis',
                'description'=>'introduction to Data Analysis using python',
                'price'=> 14.25,
                'image'=>'dataAnalysis.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Ai Generator',
                'description'=>'introduction to Ai Generator using python',
                'price'=> 14.25,
                'image'=>'AiGenerator.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'Graphic Design',
                'description'=>'introduction to Graphic Design using photoshop',
                'price'=> 14.25,
                'image'=>'Gaphic.jpg',
                'user_id'=>1
            ],
            [
                'title'=>'NLP Development',
                'description'=>'introduction to NLP Development using python',
                'price'=> 14.25,
                'image'=>'NLP.png',
                'user_id'=>1
            ],
            [
                'title'=>'Testing',
                'description'=>'introduction to Testing using python',
                'price'=> 14.25,
                'image'=>'testing.png',
                'user_id'=>1
            ],

        ];
        foreach($courses as $course){
            Courses::create($course);
        }
    }
}