<?php


namespace App\Http\Views;


use App\Channel;

class ChannelViewComposer
{

    private $channel;

    public function __construct(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function compose($view)
    {
        $channels = $this->channel->all(['slug', 'name']);


        return $view->with(compact('channels'));
    }

}
