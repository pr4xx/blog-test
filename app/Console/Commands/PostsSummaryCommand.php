<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use App\User;
use Illuminate\Console\Command;

class PostsSummaryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:summary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a summary of posts.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $admin = User::whereIsAdmin(true)->first();

        if(!$admin) {
            $this->error('No admin user available!');

            return 1;
        }

        $post = Post::create([
            'title' => 'Zusammenfassung ' . now()->format('m.Y'),
            'body' => 'Aktuelle Anzahl von Posts: ' . Post::count(),
            'user_id' => $admin->id,
            'category_id' => Category::first()->id
        ]);

        $this->info('Created post: ' . $post->title);

        return 0;
    }
}
