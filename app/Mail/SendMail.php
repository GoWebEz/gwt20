<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $full_name;
    public $token = '';
    public $token_expiry;
    public $add_user;
    public $change_password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_details)
    {
        $this->full_name = $mail_details['full_name'];
        $this->token = $mail_details['token'];
        $this->token_expiry = $mail_details['token_expiry'];
        $this->add_user = $mail_details['add_user'];
        $this->change_password = $mail_details['change_password'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = !empty($this->add_user) ? "Create password" : (!empty($this->change_password) ? "Change password" : "Reset password");

        return $this ->subject($subject)
              ->view('email.mail')
              ->with([
                'full_name'         => $this->full_name,
                'verify_token'      => $this->token,
                'token_expiry'      => $this->token_expiry,
                'add_user'          => $this->add_user,
                'change_password'   => $this->change_password,
            ]);    }
}
