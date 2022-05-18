<?php

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Unique;
use Symfony\Component\Validator\Constraints\Date;

require_once __DIR__. '/vendor/autoload.php';


class Employee
{
    public int $id;
    public string $name;
    public int $salary;
    public DateTime $startJob;


    public function __construct(
        int $id = 1,
        string $name = "Kola",
        int $salary = 100,
        DateTime $startJob = new Datetime()
    ) {
        $validator = Validation::createValidator();


        $errorsId = $validator->validate($id, [
            new Type('int'),
            new Positive(),
        ]);
        $errorsSalary = $validator->validate($salary, [
            new Type('int'),
            new Positive(),
        ]);
        $errorsName = $validator->validate($name, [
            new Type('string'),
            new Length(['min' => 3]),
        ]);
        $errorsStartJob = $validator->validate($startJob, [
            //new Date(), Не нужна
        ]);

        if (count($errorsId) + count($errorsName) + count($errorsSalary) + count($errorsStartJob) == 0) {
            $this->id = $id;
            $this->salary = $salary;
            $this->name = $name;
            $this->startJob = $startJob;
        } else {
            if (count($errorsId) != 0) {
                foreach ($errorsId as $error) {
                    echo $error->getMessage();
                }
            }

            if (count($errorsName) != 0) {
                foreach ($errorsName as $error) {
                    echo $error->getMessage();
                }
            }

            if (count($errorsSalary) != 0) {
                foreach ($errorsSalary as $error) {
                    echo $error->getMessage();
                }
            }

            if (count($errorsStartJob) != 0) {
                foreach ($errorsStartJob as $error) {
                    echo $error->getMessage();
                }
            }
        }
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getExperience(): int
    {
        $year = date_diff($this->startJob, new DateTime())->y;

        return $year;
    }
}
