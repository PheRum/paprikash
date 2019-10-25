<?php

namespace PheRum\Paprikash;

use PheRum\Paprikash\Exceptions\DesignerException;

class Designer extends AbstractDesigner implements DesignerInterface
{
    /**
     * Salary Classes
     *
     * @var array
     */
    protected static $salaryClasses = [
        1 => 10000,
        2 => 15000,
        3 => 20000,
    ];

    /**
     * @inheritDoc
     */
    public function load($url = null): void
    {
        $response = $this->client->get($url)->getBody()->getContents();

        $this->crawler->addHtmlContent($response);

        $fullName = $this->crawler->filter('.author__name')->text();
        $fullName = explode(' ', $fullName);

        $avatar = $this->crawler->filter('.author__image')->attr('src');

        $this->setName($fullName[0]);
        $this->setSurname($fullName[1]);
        $this->setAvatar($avatar);
    }

    /**
     * @inheritDoc
     * @throws \PheRum\Paprikash\Exceptions\DesignerException
     */
    public function calc(int $class): void
    {
        if (!array_key_exists($class, self::$salaryClasses)) {
            throw new DesignerException(sprintf('Unsupported class [%s]', $class));
        }

        $this->setSalary(self::$salaryClasses[$class]);
    }
}
