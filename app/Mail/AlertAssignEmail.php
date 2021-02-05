<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertAssignEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    protected $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$user)
    {
        $this->data = $data;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'taskmanger@elhadary.com';
        $name = ' Task Manger ';
        $subject = 'Assigned New Task';

        return $this->to($this->user->email)
            ->subject($subject)
            ->from($address, $name)
            ->view('emails.alert-assigned',['data' => $this->data]);
    }
}
