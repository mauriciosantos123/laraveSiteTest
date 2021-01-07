<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class AutoCrud extends Command
{
	
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Controller,Models and Views';

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
		$name = $this->argument('name');
		$name = strtolower($name);
		$name = ucfirst($name);
		$fp = fopen(base_path()."/crud.sh", 'w');
		fwrite($fp, "php artisan make:migration ".$name." --create=".strtolower($name)."s\n");
		fwrite($fp, "php artisan make:model ".$name."Model\n");
		fwrite($fp, "cp -fv \$HOME/ubuntu-scripts/laravel-command/CrudController.php app/Http/Controllers/".$name."Controller.php\n");
		fwrite($fp, "sed \"s/Crud/".$name."/g\" -i app/Http/Controllers/".$name."Controller.php\n");
		fwrite($fp, "sed \"s/crud/".strtolower($name)."/g\" -i app/Http/Controllers/".$name."Controller.php\n");
		fwrite($fp, "sed \"s/User/".$name."Model/g\" -i app/Http/Controllers/".$name."Controller.php\n");
		fwrite($fp, "php artisan route:auto\n");
		fwrite($fp, "mkdir resources/views/".strtolower($name)."\n");
		fwrite($fp, "touch resources/views/".strtolower($name)."/index.blade.php\n");
		fwrite($fp, "touch resources/views/".strtolower($name)."/edit.blade.php\n");
		fwrite($fp, "touch resources/views/".strtolower($name)."/create.blade.php\n");
		fwrite($fp, "touch resources/views/".strtolower($name)."/show.blade.php\n");
		fclose($fp);
        return 0;
    }
}