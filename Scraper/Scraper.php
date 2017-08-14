<?php
/**
 * This file is part of the web scraping package.
 *
 * Jeremy Knab <jknab@greenskunk.com>
 *
 */
namespace Cattaraugus;

use Goutte\Client;
use Symfony\Component\BrowserKit\Response;
use Guzzle\Http\Message\Response as GuzzleResponse;

// see https://stackoverflow.com/questions/21974796/access-guzzle-response-from-goutte
class Scraper extends \Goutte\Client
{
  protected $guzzleResponse;
  protected function createResponse(GuzzleResponse $response)
  {
    // \Guzzle\Http\Message\Response $response
    $this->guzzleResponse = $response;
    // return new Response((string) $response->getBody(), $response->getStatusCode(), $response->getHeaders());
    return parent::createResponse($response);
  }

  /**
   * @return \Guzzle\Http\Message\Response
   */
  public function getGuzzleResponse()
  {
    return $this->guzzleResponse;
  }
}
