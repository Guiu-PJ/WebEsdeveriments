<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class RunMigrationsWithApi extends Command
{
    protected $signature = 'api:migrate:refresh';
    protected $description = 'Run the API migrations and then this project migrations with seeders';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Lee la ruta de la API desde la variable de entorno
        $apiPath = env('API_PATH');

        if (empty($apiPath)) {
            $this->error('La variable de entorno API_PATH no está definida.');
            return;
        }

        // Define el comando para tu API usando la ruta de la variable de entorno
        $apiCommand = "cd $apiPath && php artisan migrate:fresh";
        
        // Ejecuta el comando de la API
        $process = Process::fromShellCommandline($apiCommand);
        try {
            $process->mustRun();

            // Muestra la salida del comando de la API
            echo $process->getOutput();
            
            // Ahora ejecuta migrate:fresh --seed en el proyecto principal
            $this->call('migrate:fresh', [
                '--seed' => true,
            ]);
        } catch (ProcessFailedException $exception) {
            $this->error('El comando de la API falló.');
            echo $exception->getMessage();
        }
    }
}
