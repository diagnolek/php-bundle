<?php
/**
 * @author Sebastian Pondo
 */

namespace Example\HelloBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HelloControllerTest extends WebTestCase
{

    public function testHelloSite(): void
    {
        $client = static::createClient();

        // Request a specific page
        $crawler = $client->request('GET', '/example/hello');

        // Validate a successful response and some content
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Example Hello Bundle');
    }

}
