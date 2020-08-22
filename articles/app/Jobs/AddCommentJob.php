<?php

namespace App\Jobs;

use App\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $article_id;
    protected $subject;
    protected $text;


    /**
     * AddCommentJob constructor.
     * @param int $article_id
     * @param string $subject
     * @param string $text
     */
    public function __construct(int $article_id, string $subject, string $text)
    {
        $this->article_id = $article_id;
        $this->subject = $subject;
        $this->text = $text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $comment = new Comment();
        $comment->article_id = $this->article_id;
        $comment->subject = $this->subject;
        $comment->text = $this->text;
        $comment->save();
    }
}
