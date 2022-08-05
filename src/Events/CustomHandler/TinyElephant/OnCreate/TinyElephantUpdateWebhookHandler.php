<?php

namespace App\Events\CustomHandler\TinyElephant\OnCreate;

use App\Events\Shared\EventPriority;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler(handles: TinyElephantOnCreateMessage::class, priority: EventPriority::HEIGHT)]
class TinyElephantUpdateWebhookHandler
{
    public function __invoke(TinyElephantOnCreateMessage $tinyElephantMessage)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://webhook.site/f23ed6d2-d167-4a5b-883f-1794a77f75e7?id=' .
                $tinyElephantMessage->getTinyElephant()->getId(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        curl_exec($curl);

        curl_close($curl);
    }
}
