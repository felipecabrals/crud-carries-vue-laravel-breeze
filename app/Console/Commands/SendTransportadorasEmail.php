<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Carries;
use App\Mail\TransportadorasMail;

class SendTransportadorasEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar lista de transportadoras por e-mail';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $transportadoras = Carries::all();
        Mail::to($email)->send(new TransportadorasMail($transportadoras));
        $this->info('E-mail enviado com sucesso!');
    }
}
