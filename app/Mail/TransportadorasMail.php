<?php

namespace App\Mail;

use App\Models\Transportadora;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransportadorasMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $transportadoras;

    public function __construct($transportadoras)
    {
        $this->transportadoras = $transportadoras;
    }

    public function build()
    {
        return $this->subject('Lista de Transportadoras')
                    ->view('emails.transportadoras')
                    ->with('transportadoras', $this->transportadoras);
    }
}
