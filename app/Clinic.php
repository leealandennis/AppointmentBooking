<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    private static $instance = null;

    public function __construct()
    {
        parent::__construct();
    }

    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
