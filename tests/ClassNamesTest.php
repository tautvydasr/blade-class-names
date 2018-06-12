<?php

namespace Test;

use ClassNames\ClassNames;
use PHPUnit\Framework\TestCase;

class ClassNamesTest extends TestCase
{
    /**
     * @var ClassNames
     */
    private $classes;

    protected function setUp(): void
    {
        parent::setUp();
        $this->classes = new ClassNames();
    }

    public function testImplodesNonConditionalClasses(): void
    {
        $result = $this->classes->render('a', 'b', 'c');
        $this->assertEquals('a b c', $result);
    }

    public function testFilterFalseClasses(): void
    {
        $result = $this->classes->render('a', '', null, false, 'b');
        $this->assertEquals('a b', $result);
    }

    public function testImplodesOnlyClassesWithTruthCondition(): void
    {
        $result = $this->classes->render([
            'a' => true, 'b' => 1, 'c' => -1, 'd' => '1', 'e' => '-1', 'f' => 'false', 'g' => ['yes'],
            'h' => '', 'i' => null, 'j' => false, 'k' => '0', 'l' => 0, 'm' => [],
        ]);
        $this->assertEquals('a b c d e f g', $result);
    }

    public function testCombineConditionalAndSimpleClasses(): void
    {
        $result = $this->classes->render('a', 'b', ['c' => true, 'd' => false]);
        $this->assertEquals('a b c', $result);
    }

    public function testCombineMultipleConditionalClasses(): void
    {
        $result = $this->classes->render(['a' => true], ['b' => true, 'c' => false]);
        $this->assertEquals('a b', $result);
    }

    public function testIncludesClassesOnlyOnce(): void
    {
        $result = $this->classes->render(['a' => true], ['a' => true, 'b' => true], 'b');
        $this->assertEquals('a b', $result);
    }

    public function testClassesEscapedUsingHtmlContext(): void
    {
        $result = $this->classes->render('&',  '"', "'", '<', '>');
        $this->assertEquals('&amp; &quot; &#039; &lt; &gt;', $result);
    }
}
