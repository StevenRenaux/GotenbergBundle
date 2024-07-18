<?php

namespace Sensiolabs\GotenbergBundle\Client;

use Sensiolabs\GotenbergBundle\Exception\ClientException;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class GotenbergClient implements GotenbergClientInterface
{
    public function __construct(
        private readonly HttpClientInterface $client,
    ) {
    }

    public function call(string $endpoint, array $multipartFormData, array $headers = []): GotenbergResponse
    {
        $formData = new FormDataPart($multipartFormData);
        $headers = array_merge($headers, $this->prepareHeaders($formData));

        $response = $this->client->request(
            'POST',
            $endpoint,
            [
                'headers' => $headers,
                'body' => $formData->bodyToString(),
            ],
        );

        if (200 !== $response->getStatusCode()) {
            throw new ClientException($response->getContent(false), $response->getStatusCode());
        }

        return new GotenbergResponse($this->client->stream($response), $response->getStatusCode(), new ResponseHeaderBag($response->getHeaders()));
    }

    /**
     * @return array<string|int, mixed>
     */
    private function prepareHeaders(FormDataPart $dataPart): array
    {
        $preparedHeaders = $dataPart->getPreparedHeaders();

        $headers = [];
        foreach ($preparedHeaders->getNames() as $header) {
            $headers[$header] = $preparedHeaders->get($header)?->getBodyAsString();
        }

        return $headers;
    }
}
