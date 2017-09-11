<?php
namespace App\Libraries;

use Carbon\Carbon;
use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\RequestInterface;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_EventDateTime;
use Google_Service_Calendar_Event;
use Google_Http_Batch;

class GoogleCalendar
{
    protected $client;
    protected $service;
    protected $calendarId;

    public function __construct()
    {
        $accessToken = json_decode(file_get_contents(config_path('google-calendar/credentials.json')), true);
        $guzzleClient = new GuzzleClient(['curl' => [CURLOPT_SSL_VERIFYPEER => false]]);

        $this->client = new Google_Client();
        $this->client->setApplicationName(config('app.name'));
        $this->client->addScope(Google_Service_Calendar::CALENDAR);
        $this->client->setAuthConfig(config_path('google-calendar/client-secret.json'));
        $this->client->setAccessType('offline');
        $this->client->setAccessToken($accessToken);
        $this->client->setHttpClient($guzzleClient);

        $this->service = new Google_Service_Calendar($this->client);

        $this->calendarId = env('GOOGLE_CALENDAR_ID');
    }

    /**
     * @param array $optParams
     *
     * @return Google_Service_Calendar_Event
     */
    public function getEvents($optParams = [])
    {
        $defaultParams = [
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c', strtotime('-20 days')),
        ];
        $optParams = array_merge($defaultParams, $optParams);
        return $this->service->events->listEvents($this->calendarId, $optParams)->getItems();
    }

    /**
     * @param $event
     * @param bool $returnRequest
     *
     * @return Google_Service_Calendar_Event|RequestInterface
     */
    public function insert($event, $returnRequest = false)
    {
        $calendarEvent = new Google_Service_Calendar_Event($event);

        if ($event['start'] instanceof Carbon) {
            $startDateTime = $event['start']->toRfc3339String();
        } else {
            $startDateTime = Carbon::parse($event['start'])->toRfc3339String();
        }
        $start = new Google_Service_Calendar_EventDateTime();
        $start->setDateTime($startDateTime);
        $calendarEvent->setStart($start);

        if ($event['end'] instanceof Carbon) {
            $endDateTime = $event['end']->toRfc3339String();
        } else {
            $endDateTime = Carbon::parse($event['end'])->toRfc3339String();
        }
        $end = new Google_Service_Calendar_EventDateTime();
        $end->setDateTime($endDateTime);
        $calendarEvent->setEnd($end);

        $insertedEvent = $this->service->events->insert($this->calendarId, $calendarEvent);
        return $returnRequest ? $insertedEvent : $insertedEvent->getId();
    }

    /**
     * @link https://stackoverflow.com/questions/17840333/google-calendar-api-batch-request-php
     *
     * @param array $events
     *
     * @return array|null
     */
    public function insertBatch(array $events = [])
    {
        $this->client->setUseBatch(true);
        $batch = new Google_Http_Batch($this->client);
        foreach ($events as $event) {
            $request = $this->insert($event, true);
            $batch->add($request);
            break; // TODO: remove me !
        }
        return $batch->execute();
    }

    /**
     * @return Google_Service_Calendar
     */
    public function getService()
    {
        return $this->service;
    }
}