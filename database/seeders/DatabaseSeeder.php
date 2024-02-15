<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make("admin@gmail.com"),
        //     "active" => "1"
        // ]);


    //     $columns = [
    //         // header
    //         [
    //             "key" => "header_img",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "header_title",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "header_dis",
    //             "value" => ""
    //         ],
    //         // about
    //         [
    //             "key" => "about_dis",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "our_services_dis",
    //             "value" => ""
    //         ],
    //         // sp
    //         [
    //             "key" => "sp_img",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "sp",
    //             "value" => ""
    //         ],
    //         // saying
    //         [
    //             "key" => "saying_img",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "saying_dis",
    //             "value" => ""
    //         ],
    //         // call_us
    //         [
    //             "key" => "call_dis",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "call_adress",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "call_title",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "call_email",
    //             "value" => ""
    //         ],
    //         [
    //             "key" => "call_phone",
    //             "value" => ""
    //         ],

    //     ];
    //     DB::table('homes')->insert($columns);

        // $columns = [
        //     [
        //         "key" => "header_services_img",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "header_services_dis",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "header_about_img",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "header_about_dis",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "sec2_about_img",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "sec2_about_dis",
        //         "value" => ""
        //     ],

        //     [
        //         "key" => "mission_dis",
        //         "value" => ""
        //     ],

        //     [
        //         "key" => "distinguishes_dis",
        //         "value" => ""
        //     ],
        // ];

        // $columns = [
        //     [
        //         "key" => "facebook",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "youtube",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "x",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "insta",
        //         "value" => ""
        //     ],

        // ];

        // $columns = [
        //     [
        //         "key" => "header_project_img",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "header_project_dis",
        //         "value" => ""
        //     ],
        //     [
        //         "key" => "project_dis",
        //         "value" => ""
        //     ],
        // ];
        // $columns = [
        //     [
        //         "key" => "distinguishes_img",
        //         "value" => ""
        //     ],

        // ];

        $columns = [
            [
                "key" => "logo",
                "value" => ""
            ],
            [
                "key" => "title",
                "value" => "تكامل"
            ],

        ];


        DB::table('varibales')->insert($columns);
    }
}
