<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Credenziali_administrator extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $username;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $username, $password)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('editors@apolloundici.it')
            ->subject('Credenziali Apollo11 Admins')
            ->markdown('mail.credenziali-administrator', [
                'name' => $this->name,
                'password' => $this->password,
                'username' => $this->username
            ]);
    }
}
