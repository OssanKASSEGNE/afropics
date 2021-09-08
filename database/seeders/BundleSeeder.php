<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bundle;

class BundleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Bundle::$bundleInfos as $bundleType => $contents){
            
            Bundle::create(
                ['bundle_type' => $bundleType]
            );
        }
    }
}
