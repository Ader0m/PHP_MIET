<?php

use JetBrains\PhpStorm\Deprecated;

include "Department.php";


function whoMoreHaveMoney(array $depMass): string
{
    $name = "";
    $sum = 0;
    $countEmployee = 0;
    $tempSum = 0;
    $tempCountEmploye = 0;


    foreach ($depMass as $obj) {
        $tempSum = $obj->getSalarySum();
        $tempCountEmploye = $obj->getCountEmployee();
        if ($sum == $tempSum) {
            if ($countEmployee == $tempCountEmploye) {
                $name .= " " . $obj->name;
                continue;
            }
            if ($countEmployee < $tempCountEmploye) {
                $sum = $tempSum;
                $countEmployee = $tempCountEmploye;
                $name = $obj->name;
                continue;
            }
        }
        if ($sum < $tempSum) {
            $sum = $tempSum;
            $countEmployee = $tempCountEmploye;
            $name = $obj->name;
        }
    }

    return $name;
}

function whoSmalHaveMoney(array $depMass): string
{
    $name = "";
    $sum = 2147000;
    $countEmployee = 0;
    $tempSum = 0;
    $tempCountEmploye = 0;


    foreach ($depMass as $obj) {
        $tempSum = $obj->getSalarySum();
        $tempCountEmploye = $obj->getCountEmployee();
        if ($sum == $tempSum) {
            if ($countEmployee == $tempCountEmploye) {
                $name .= " " . $obj->name;
                continue;
            }
            if ($countEmployee < $tempCountEmploye) {
                $sum = $tempSum;
                $countEmployee = $tempCountEmploye;
                $name = $obj->name;
                continue;
            }
        }
        if ($sum > $tempSum) {
            $sum = $tempSum;
            $countEmployee = $tempCountEmploye;
            $name = $obj->name;
        }
    }

    return $name;
}

$emp1 = new Employee(2, "ivan", 1000, new DateTime('2020-12-31'));
$emp2 = new Employee(3, "bgbg", 1000, new DateTime());
$emp3 = new Employee(4, "6757", 1000, new DateTime());
$emp4 = new Employee(5, "55555bg", 1000, new DateTime());
$emp5 = new Employee(6, "hkhjg", 1000, new DateTime());
$emp6 = new Employee(7, "jojo", 1000, new DateTime());

echo $emp1->getExperience();
echo "\n";

$dep1 = new Department("First", [$emp1, $emp2, $emp3]);
$dep2 = new Department("Second", [$emp4, $emp5]);

echo $dep2->getSalarySum();
echo "\n";

$depMass = [$dep1, $dep2];

echo whoMoreHaveMoney($depMass);
echo "\n";
echo whoSmalHaveMoney($depMass);
echo "\n";
