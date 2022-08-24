<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Santa;

class SantaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::inRandomOrder()->get();
        foreach ($users as $user) {
            $ids = Santa::pluck('user_id');
            if ($check_last_item=User::where('id','!=',$user->id)->whereNotIn('id',$ids)->inRandomOrder()->first()) {
                $user_id = $check_last_item->id;
            } else {
                $last = Santa::where('santa_id','!=',$user->id)->first();
                $user_id = $last->user_id;
                $last->update([
                    'user_id' => $user->id
                ]);
            }

            $santa = Santa::create([
                'santa_id' => $user->id,
                'user_id' => $user_id
            ]);
        }
    }
}
