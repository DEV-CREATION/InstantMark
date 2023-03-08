<?php

namespace App\Service;

use App\Entity\Campaign;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RegieApi
{
    private $client;

    private $baseUrl;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        $this->baseUrl = $_ENV['REGIE_API_URL'];
    }

    public function createCampaign(Campaign $campaign): bool
    {
        $response = $this->client->request('POST', $this->baseUrl . '/campaigns', [
            'json' => [
                'name' => $campaign->getName(),
                'startedAt' => $campaign->getStartedAt()->format('Y-m-d'),
                'endedAt' => $campaign->getEndedAt()->format('Y-m-d'),
            ],
        ]);

        return $response->getStatusCode() === 201;
    }

    public function loadCampaign(Campaign $campaign): bool
    {
        $response = $this->client->request('GET', $this->baseUrl . '/campaigns/' . $campaign->getId());

        if ($response->getStatusCode() === 200) {
            try {
                $data = $response->toArray();
                $campaign->setName($data['name']);
                $campaign->setStartedAt(new \DateTimeImmutable($data['startedAt']));
                $campaign->setEndedAt(new \DateTimeImmutable($data['endedAt']));

                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        return false;
    }
}