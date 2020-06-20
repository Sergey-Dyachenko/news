<?php

namespace App\Listeners;

use App\Events\CreatedNewNews;
use App\Mail\NewNewsNotificationMail;
use App\Services\UserService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\User;
use Illuminate\Support\Facades\Mail;

class SendNotificationNewNewsMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Handle the event.
     *
     * @param $user
     * @return void
     */
    private function getSubscribersEmails($user)
    {
        return $user->subscribers()->pluck('subscriber_id')->toArray();
    }

    public function handle(CreatedNewNews $event)
    {
        $news = $event->news;
        $user = $this->userService->showOneByData(['id' => $news->user_id]);
        $subscribers_ids = $this->getSubscribersEmails($user);
        $subscribers_emails = User::whereIn('id', $subscribers_ids)->pluck('email')->toArray();
        Mail::to($subscribers_emails)->send(new NewNewsNotificationMail($news));

    }
}
