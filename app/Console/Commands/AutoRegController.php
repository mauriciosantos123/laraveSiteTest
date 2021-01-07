<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoRegController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Register Route Controllers';

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

        $controllers = dirname(dirname(dirname(__FILE__))).'/Http/Controllers';
        $this->write_controller();
        foreach(glob( $controllers.'/*Controller.php') as $filename) {
            //echo $filename."\n";
            $controller = basename($filename);
            $controller = str_replace('.php', '', $controller);
            $this->add_controller($controller);
          }
          $this->add_line();
          foreach(glob( $controllers.'/*Controller.php') as $filename) {
            $controller = basename($filename);
            $controller = str_replace('.php', '', $controller);
            if ($controller !== 'Controller') {
              $this->add_method($filename, $controller);
              $this->add_line();
            }
          }
          $this->end_controller();
          echo "Ok";
        return 0;
    }
    public function write_controller(){
        $webroute = dirname(dirname(dirname(dirname(__FILE__)))).'/routes/web.php';        
        $fp = fopen($webroute, 'w');
        fwrite($fp, "<?php\n");
        fwrite($fp, "\n");
        fwrite($fp, "use Illuminate\\Support\\Facades\\Route;\n");
        fclose($fp);
    }
    public function end_controller(){
        $webroute = dirname(dirname(dirname(dirname(__FILE__)))).'/routes/web.php';        
        $fp = fopen($webroute, 'a');
        fwrite($fp, "\nRoute::redirect('/', 'home');\n");
        fclose($fp);
    }
    public function add_line(){
        $webroute = dirname(dirname(dirname(dirname(__FILE__)))).'/routes/web.php';        
        $fp = fopen($webroute, 'a');
        fwrite($fp, "\n");
        fclose($fp);
    }
    public function add_controller($controller){
        $webroute = dirname(dirname(dirname(dirname(__FILE__)))).'/routes/web.php';        
        $fp = fopen($webroute, 'a');
        fwrite($fp, "use App\\Http\\Controllers\\$controller;\n");
        fclose($fp);
    }
    public function add_method($filename, $controller){
        $name = strtolower(str_replace('Controller', '', $controller));
        $webroute = dirname(dirname(dirname(dirname(__FILE__)))).'/routes/web.php';        
        preg_match_all('/public function (.*)\(/', file_get_contents($filename), $output);        

        $fp = fopen($webroute, 'a');
        foreach($output[1] as $method){
            if ($method == 'index') {
                fwrite($fp, "Route::match(['GET','POST'],'$name', [$controller::class, '$method'])->name('$name.$method');\n");
            } else  if ($method == 'create') {
                fwrite($fp, "Route::get('$name', [$controller::class, '$method'])->name('$name.$method');\n");
            } else  if ($method == 'store') {
                fwrite($fp, "Route::post('$name', [$controller::class, '$method'])->name('$name.$method');\n");
            } else  if ($method == 'show') {
                fwrite($fp, "Route::get('$name/{id}', [$controller::class, '$method'])->name('$name.$method');\n");
            } else  if ($method == 'edit') {
                fwrite($fp, "Route::get('$name/{id}/edit', [$controller::class, '$method'])->name('$name.$method');\n");
            } else  if ($method == 'update') {
                fwrite($fp, "Route::match(['PUT','PATCH'],'$name/{id}', [$controller::class, '$method'])->name('$name.$method');\n");
            } else  if ($method == 'destroy') {
                fwrite($fp, "Route::delete('$name/{id}', [$controller::class, '$method'])->name('$name.$method');\n");
            } else {
                fwrite($fp, "Route::match(['GET','POST'],'$name-$method', [$controller::class, '$method'])->name('$name.$method');\n");
            }
        }
        fclose($fp);
    }
}
