<?php

namespace PheRum\Paprikash;

interface DesignerInterface
{
    /**
     * Load author info
     *
     * @return mixed
     */
    public function load();

    /**
     * Calculate salary
     *
     * @param int $class
     * @return mixed
     */
    public function calc(int $class);
}
