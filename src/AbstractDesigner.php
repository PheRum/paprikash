<?php

namespace PheRum\Paprikash;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

abstract class AbstractDesigner
{
    /** @var string $name */
    protected $name;

    /** @var string $surname */
    protected $surname;

    /** @var string $avatar */
    protected $avatar;

    /** @var string $salary */
    protected $salary;

    /** @var \GuzzleHttp\Client $client */
    protected $client;

    /** @var \Symfony\Component\DomCrawler\Crawler $crawler */
    protected $crawler;

    /**
     * AbstractDesigner constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->crawler = new Crawler();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = str_replace(',', '', $surname);
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = str_replace('//', 'https://', $avatar);
    }

    /**
     * @return string
     */
    public function getSalary(): string
    {
        return $this->salary;
    }

    /**
     * @param string $salary
     */
    public function setSalary(string $salary): void
    {
        $this->salary = $salary;
    }
}
