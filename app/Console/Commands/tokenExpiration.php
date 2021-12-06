<?php

namespace App\Console\Commands;

use App\Models\GeplandeExamens;
use Illuminate\Console\Command;
use App\Models\GeplandeExamensTokens;

class tokenExpiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes expired examenMoment tokens and their linked ';

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
     * @return int
     */
    public function handle()
    {
        $expiredTokens = GeplandeExamensTokens::where('exp_date', '<=', time()-(24*60*60))->each(function ($token) {
            GeplandeExamens::where('id', '=', $token['gepland_examen_id'])->delete();
            $token->delete();
        });
    
        echo('running schedule task');
        return Command::SUCCESS;
    }
}
