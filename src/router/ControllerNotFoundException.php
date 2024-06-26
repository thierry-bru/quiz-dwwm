<?php
# src/router/ControllerNotFoundException.php
declare(strict_types=1);
namespace app\quizz\router;
class ControllerNotFoundException extends  \Exception
{
    public function __construct($message = "Controller was not found")
        {
            parent::__construct($message, 1);
        }
}
