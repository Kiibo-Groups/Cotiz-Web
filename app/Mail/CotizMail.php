<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CotizMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $title;
    public $description;

    /**
     * Create a new message instance.
     *
     * @param string $name
     * @param string $title
     * @param string $description
     * @return void
     */
    public function __construct($name, $title, $description)
    {
        $this->name = $name;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.cotiz')
                    ->subject('Nuevo correo de Cotiz')
                    ->with([
                        'name' => $this->name,
                        'title' => $this->title,
                        'description' => $this->description,
                    ]);
    }
}
