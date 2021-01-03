<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Comment;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Photo;
use App\Models\PhotoTag;
use App\Models\PhotoUser;
use App\Models\Tag;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create();// On creer 5 User...
        $group = Group::factory()->create(); //...Un groupe... 
        Tag::factory()->count(10)->create();//...Et 10 tag 


        $tags = Tag::all();
        
        //On associe les users a un group
        $users = User::all();
        foreach($users as $user) {
            GroupUser::factory()->create(['group_id' => $group->id, 'user_id' => $user->id]);//en se basant sur groupUser on creer des users et des groupes
        }
        Photo::factory()->count(10)->create(['group_id' => $group->id, 'user_id' => $users->random()->id]);// on creer 10 photos avec des groupes et des user
        $photos = Photo::all();
        foreach($photos as $photo) {//Pour chaque photo on va ...
        //...Les comment
            Comment::factory()->count(rand(1,5))->create(['user_id' =>  $users->random()->id, 'photo_id' => $photo->id]);
   
        //...Les tager
            foreach($tags->random(rand(1,3)) as $tag) {
                PhotoTag::factory()->create(['photo_id' => $photo->id, 'tag_id' => $tag->id]);
            }
      
        //...indiquer les gens presents
            foreach($users->random(rand(1,3)) as $user) {
                PhotoUser::factory()->create(['photo_id' => $photo->id, 'user_id' => $user->id]);
            }
        }
        //on va creer des photo random
        $photoRandom = Photo::all()->random();
        Comment::factory()->count(rand(1,5))->create(['user_id' =>  $users->random()->id, 'photo_id' => $photoRandom->id, 'comment_id' => $photoRandom->comments->random()]);// on en creer entre 1 et 5
        
    }
}
