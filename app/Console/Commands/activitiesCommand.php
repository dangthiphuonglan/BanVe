<?php

namespace App\Console\Commands;

use App\danhmuc;
use App\lichChieu;
use App\Repositories\MainRepositoryInterface;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class activitiesCommand extends Command
{
    protected $post;

    /**
     * PostController constructor.
     *
     * @param MainRepositoryInterface $post
     */

    /**
     * List all posts.
     *
     * @return mixed
     */
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activities:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(MainRepositoryInterface $post)
    {
        parent::__construct();
        $this->post = $post;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh'); // timezone Việt Nam
        $currentDateTime = date('Y-m-d H:i:s');
        $listLC = DB::table('lichchieu')->where('created_at','<',$currentDateTime)->get();
        foreach($listLC as $item){
            $this->post->xoaVe($item->id);
            $this->post->xoaLichChieu($item->id);
        }
        // $itemnew = new danhmuc();
        // $itemnew->tenDanhMuc = 'mới';
        // $itemnew->save();
    }
}
