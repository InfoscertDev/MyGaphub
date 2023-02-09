<?php

namespace Database\Seeders;

use App\Models\AcquisitionCms;
use App\Models\AcquisitionOpportunityCms;
use Illuminate\Database\Seeder;
use DB;

class AcquisionTablesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        DB::table('acquisition_cms')->insert([
            ['name' => 'business', 'fullname' => 'Business Asset', 'photo' => 'images/wuuquywhqe-12835412.png', 'description' => 'Buy an existing business currently generating revenue.' ],
            ['name' => 'risk', 'fullname' => 'Risk Asset', 'photo' => 'images/hq7uswer52.png', 'description' => 'Explore the world of stocks and share. Many retirement plans in the world today are based on this vehicle.' ],
            ['name' => 'appreciating', 'fullname' => 'Appreciating Asset', 'photo' => 'images/7w22164504.png', 'description' => 'Both Architecture and Agriculture rely on land to presents their solutions. You can profit from either.' ],
            ['name' => 'intellectual', 'fullname' => 'Intellectual Asset', 'photo' => 'images/uhafhgwhe-19677.png', 'description' => 'The most valuable asset in the world is the human brain. Take advantage of this opportunity.' ],
            ['name' => 'depreciating', 'fullname' => 'Depreciating Asset', 'photo' => 'images/ghabsnnd-157520.png', 'description' => 'The world’s most popular asset is cash but only when it is in a good savings account. Explore your options.' ],
        ]);
 
        DB::table('acquisition_opportunity_cms')->insert([
            [
                'category' => 'reap', 'fullname' => 'Real Estate Asset Program (REAP)', 
                'country' => 'Multiple', 'capital' => '£10,000.00', 'acquision_id' => 3,
                'roi' =>'Up to 20%', 'photo' => 'images/photomix-coyarsgz76866any101808.png'
            ], 
            [ 
                'category' => 'ganp', 'fullname' => 'Green Asset National Product (GANP)', 
                'country' => 'Multiple', 'capital' => '£500.00', 'acquision_id' => 3,
                'roi' =>'Up to 30%', 'photo' => 'images/piawsgxshsgsxszazxabay163752.png'
            ],
        ]);
    }
}
