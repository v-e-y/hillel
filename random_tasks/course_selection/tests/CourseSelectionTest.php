<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Course_Selection\Src\CourseSelection;

final class CourseSelectionTest extends TestCase
{
    private array $exampleStrings = [
        'CS111 2016 Fall',
        'CS-333 Winter 2016',
        'CS 22 F2016',
        '  <div> CS 111 F2016 <p>',
        'CS 22 F16',
    ];

    public function testClassConstructor()
    {
        $inputString = new CourseSelection($this->exampleStrings[0]);
 
        $this->assertNotEmpty($inputString->__toString());
    }

    public function testPrepareInputString()
    {
        $method = new ReflectionMethod(CourseSelection::class, 'prepareGivenString');

        $method->setAccessible(TRUE);

        $this->assertSame(
            'cs 111 f2016', 
            $method->invoke(
                new CourseSelection($this->exampleStrings[3]),
                $this->exampleStrings[3]
            )
        );
    }

    public function testGetDepartment()
    {
        $inputString = new CourseSelection($this->exampleStrings[1]);

        $this->assertSame('CS', $inputString->getCourseDepartment());
        $this->assertSame('Department: CS', $inputString->getCourseDepartment(true));
    }

    public function testGetCourseNumber()
    {
        $inputString = new CourseSelection($this->exampleStrings[2]);

        $this->assertSame('22', $inputString->getCourseNumber());
        $this->assertSame('Course Number: 22', $inputString->getCourseNumber(true));
    }

    public function testGetCourseYear()
    {
        $inputString = new CourseSelection($this->exampleStrings[0]);

        $this->assertSame('2016', $inputString->getCourseYear());
        $this->assertSame('Year: 2016', $inputString->getCourseYear(true));

        $inputStringShortYear = new CourseSelection($this->exampleStrings[4]);

        $this->assertSame('2016', $inputStringShortYear->getCourseYear());
        $this->assertSame('Year: 2016', $inputStringShortYear->getCourseYear(true));
    }

    public function testGetCourseSemester()
    {
        $inputString = new CourseSelection($this->exampleStrings[0]);

        $this->assertSame('Fall', $inputString->getCourseSemester());
        $this->assertSame('Semester: Fall', $inputString->getCourseSemester(true));

        $inputStringShortSemester = new CourseSelection($this->exampleStrings[2]);

        $this->assertSame('Fall', $inputStringShortSemester->getCourseSemester());
        $this->assertSame('Semester: Fall', $inputStringShortSemester->getCourseSemester(true));

        $inputStringMiddleSemester = new CourseSelection($this->exampleStrings[1]);

        $this->assertSame('Winter', $inputStringMiddleSemester->getCourseSemester());
        $this->assertSame('Semester: Winter', $inputStringMiddleSemester->getCourseSemester(true));
    }
}