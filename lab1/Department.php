<?php

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

require_once __DIR__. '/vendor/autoload.php';

include 'Employee.php';

class Department
{
    public string $name;
    public array $employeers;


    public function __construct(
        string $name = "1",
        array $employeers = []
    ) {
        $validator = Validation::createValidator();


        $errorsName = $validator->validate($name, [
            new Type('string'),
            new Length(['min' => 3]),
            new NotBlank(),
        ]);
        $errorEmployees = $validator->validate($name, new NotBlank());

        if (count($errorsName)+count($errorEmployees) == 0) {
            $this->name = $name;
            $this->employeers = $employeers;
        }
    }

    public function getSalarySum(): int
    {
        $sum = 0;
        foreach ($this->employeers as $s_value) {
            $sum = $sum + $s_value->getSalary();
        }
        return $sum;
    }

    public function getCountEmployee(): int
    {
        $count = 0;
        foreach ($this->employeers as $s_value) {
            $count++;
        }
        return $count;
    }
}
