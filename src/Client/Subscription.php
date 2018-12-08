<?php
namespace ActivityStreams\Client;

class Subscription extends Resource
{
    protected $application = null;
    
    function __construct(Application $application, array $data)
    {
        parent::__construct($data);
        $this->application = $application;
    }
    
    public function getObjectId()
    {
        return $this->data['object_id'];
    }
    
    public function getStreamId()
    {
        return $this->data['stream_id'];
    }
}
