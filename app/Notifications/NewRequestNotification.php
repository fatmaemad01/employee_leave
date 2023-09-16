<?php

namespace App\Notifications;

use App\Models\LeaveRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [
            'database',
            'mail',
            // 'broadcast'
        ];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $leaveRequest = $this->leaveRequest;

        $content =  __(':name send a new :type request', [
            'name'  => $leaveRequest->user->first_name . ' ' . $leaveRequest->user->last_name,
            'type' => __($leaveRequest->leave_type->name),
        ]);


        return (new MailMessage)
            ->subject(__('New :type Request', ['type' => $leaveRequest->type]))
            ->greeting(__('Hi :name', ['name' => $notifiable->first_name]))
            ->line($content)
            ->action(__('Show Request?'), route('leave_request.index'))
            ->line('Please handle the request quickly!');
    }

    public function toDatabase(object $notifiable): DatabaseMessage
    {
        $leaveRequest = $this->leaveRequest;

        $content =  __(':name send a new :type request ', [
            'name'  => $leaveRequest->user->first_name . ' ' . $leaveRequest->user->last_name,
            'type' => __($leaveRequest->leave_type->name),
        ]);


        return (new DatabaseMessage([
            'title' => __('New :type Request', ['type' => $leaveRequest->type]),
            'body' => $content,
            'link' =>  route('leave_request.index'),
            'request_id' => $leaveRequest->id
        ]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
