<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Model::unguard();

        $this->call(ProductsTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        factory(User::class,20)
            ->create()
            ->each(function($user){
                $user->blood()->save(factory(App\Blood::class)->make());
                $user->body()->save(factory(App\Body::class)->make());
                $user->base()->save(factory(App\Base::class)->make());

                $diet = $user->diets()->save(factory(App\Diet::class)->make());
                $array = [
                    ['eating_type'=>"Pusryčiai",'eating_time'=>"8:00"],
                    ['eating_type'=>"Priešpiečiai",'eating_time'=>"11:00"],
                    ['eating_type'=>"Pietūs",'eating_time'=>"13:00"],
                    ['eating_type'=>"Pavakariai",'eating_time'=>"16:00"],
                    ['eating_type'=>"Vakarienė",'eating_time'=>"18:00"],
                    ['eating_type'=>"Naktipiečiai",'eating_time'=>"21:00"]
                ];
                $product = Product::find(1);
                for($i=0;$i<6;$i++){
                    $eating = $diet->eatings()->save(factory(App\Eating::class)->make([
                        'eating_type'=>$array[$i]['eating_type'],
                        'eating_time'=>$array[$i]['eating_time'],
                    ]));
                    if($product != null){
                        $eating->products()->attach(1,['quantity'=>'100','protein'=>$product->protein,'fat'=>$product->fat,'carbs'=>$product->carbs,'cholesterol'=>$product->cholesterol,'energy_value'=>$product->energy_value]);
                        $eating->protein = $product->protein;
                        $eating->fat = $product->fat;
                        $eating->carbs = $product->carbs;
                        $eating->cholesterol = $product->cholesterol;
                        $eating->energy_value = $product->energy_value;
                        $eating->save();
                    }
                }
                $diet->protein = $product->protein * 6;
                $diet->fat = $product->fat * 6;
                $diet->carbs = $product->carbs * 6;
                $diet->cholesterol = $product->cholesterol * 6;
                $diet->energy_value = $product->energy_value * 6;
                $diet->save();
                
                $dietDayStat = new App\DietDayStat();
                $dietDayStat->day = 1;
                $dietDayStat->protein = $product->protein * 6;
                $dietDayStat->fat = $product->fat * 6;
                $dietDayStat->carbs = $product->carbs * 6;
                $dietDayStat->cholesterol = $product->cholesterol * 6;
                $dietDayStat->energy_value = $product->energy_value * 6;
                $diet->dayStats()->save($dietDayStat);
                
            });
        $this->command->info("Diets were created!");
        Model::reguard();
    }
}
