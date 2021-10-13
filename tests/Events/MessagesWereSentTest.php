<?php

namespace NotificationChannels\JetSMS\Test\Events;

use Mockery as M;
use BahriCanli\JetSms\ShortMessageCollection;
use NotificationChannels\JetSms\Events\MessagesWereSent;
use BahriCanli\JetSms\Http\Responses\JetSmsResponseInterface;

class MessagesWereSentTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        M::close();

        parent::tearDown();
    }

    public function test_it_constructs()
    {
        $shortMessageCollection = M::mock(ShortMessageCollection::class);
        $response = M::mock(JetSmsResponseInterface::class);

        $event = new MessagesWereSent($shortMessageCollection, $response);

        $this->assertInstanceOf(MessagesWereSent::class, $event);
        $this->assertEquals($shortMessageCollection, $event->messages);
        $this->assertEquals($response, $event->response);
    }
}
