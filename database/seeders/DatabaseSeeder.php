<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Subscription;
use App\Models\Bundle;
use App\Models\Card;
use Database\Factories\UserFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    //    User::factory(20)
    //    ->has(Card::factory(rand(1,3)),'cards')->create(); //Laravel link is card
    $this->call([
        BundleSeeder::class,
    ]);
    
    User::factory(10)
      ->hasCards(rand(1,3))
      ->hasSubscription()
      ->create(); 

    Image::factory(100)
      ->has(Category::factory(rand(1,5)),'categories')
      ->create();

    //Many To Many Seeding
    for($i= 0; $i < 10; $i++){
        $user_id =rand(1, User::count());
        $card_id = User::find($user_id)->cards->random()->id;
        //Seed user buy image with one of his cards (optional)
        DB::table('buyer_images')->insert([
            'buyer_id' => $user_id,
            'image_id' => rand(1,Image::count()),
            //if user_id even card is null
            'card_id' => $card_id,
            //Faire plutôt deux tables une pour les achats bundles et une pour les achats cartes
            'created_at' => now(), // No need to use it if we use create or save
            'updated_at' => now(),
        
        ]);

        //Seed user buy bundle with one of his cards
        DB::table('buyer_bundles')->insert([
            'buyer_id' => $user_id,
            'bundle_id' => rand(1,Bundle::count()),
            'card_id' => $card_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        
    }
    
}}
