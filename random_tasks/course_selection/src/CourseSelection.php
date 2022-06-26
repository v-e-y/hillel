<?php

declare(strict_types=1);

namespace Course_Selection\Src;

class CourseSelection
{
    private string $inputString;
    private string $department;
    private string $courseNumber;
    private string $year;
    private string $semester;

    private array $semesters = [
        'f' => 'Fall',
        'w' => 'Winter',
        's' => 'Summer',
        'a' => 'Autumn'
    ];

    public function __construct(string $inputString)
    {
        $this->prepareGivenString($inputString);
        $this->castInputString();
    }

    private function prepareGivenString(string $inputString): string
    {
        return $this->inputString = strtolower(trim(strip_tags($inputString)));
    }

    private function castInputString(): void
    {
        preg_match_all("/[A-Za-z]+|\d+/", $this->inputString, $castsData);

        // Return error if department not a letter(s)
        if (! preg_match("/^[A-Za-z]+$/", $castsData[0][0])) {
            throw new \Exception("Department should be a letter(s)", 1);
        }

        $this->setDepartment($castsData[0][0]);

        // Return error if course number not integer(s)
        if (! preg_match("/^[0-9]+$/", $castsData[0][1])) {
            throw new \Exception("Course number should be integer(s)", 1);
        }

        $this->setCourseNumber($castsData[0][1]);

        // if third part of given string is an letter(s) set it as course semester and four part as course year
        if (preg_match("/^[A-Za-z]+$/", $castsData[0][2]) && preg_match("/^[0-9]+$/", $castsData[0][3])) {
            $this->setCourseSemester($castsData[0][2]);
            $this->setCourseYear($castsData[0][3]);

        // if third part of given string is an integer(s) set it as course year and four part as course semester
        } elseif(preg_match("/^[0-9]+$/", $castsData[0][2]) && preg_match("/^[A-Za-z]+$/", $castsData[0][3])) {
            $this->setCourseYear($castsData[0][2]);
            $this->setCourseSemester($castsData[0][3]);
        } else {
            throw new \Exception("Wrong input data schema", 1);
        }
    }

    /*
    * Setters
    */

    private function setDepartment(string $department): string
    {
        return $this->department = strtoupper($department);
    }

    private function setCourseNumber(string $courseNumber): string
    {
        return $this->courseNumber = $courseNumber;
    }

    private function setCourseYear(string $year): string
    {
        return $this->year = (mb_strlen($year) == 2)? '20' . $year : $year;
    }

    private function setCourseSemester(string $semester): string
    {
        return $this->semester = (mb_strlen($semester) == 1)? ucfirst($this->semesters[$semester]) : ucfirst($semester);
    }
    
    /**
    * Getters
    */

    public function getCourseDepartment(bool $withText = Null): string
    {
        return ($withText)? 'Department: ' . $this->department : $this->department;
    }

    public function getCourseNumber(bool $withText = Null): string
    {
        return ($withText)? 'Course Number: ' . $this->courseNumber : $this->courseNumber;
    }

    public function getCourseYear(bool $withText = Null): string
    {
        return ($withText)? 'Year: ' . $this->year : $this->year;
    }

    public function getCourseSemester(bool $withText = Null): string
    {
        return ($withText)? 'Semester: ' . $this->semester : $this->semester;
    }

    public function __toString()
    {
        return $this->getCourseDepartment(true) . '<br>' . $this->getCourseNumber(true) . '<br>' . $this->getCourseYear(true) . '<br>' . $this->getCourseSemester(true);
    }
}