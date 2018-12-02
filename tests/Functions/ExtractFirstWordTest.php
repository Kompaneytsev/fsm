<?php

namespace Tests\Functions;

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/Functions/extractFirstWord.php';

/**
 * Class ExtractFirstWordTest
 * @package Tests\Functions
 */
class ExtractFirstWordTest extends TestCase
{
    public function testFullSentence(): void
    {
        $sentence = 'Php is bad choice';

        $result1 = extractFirstWord($sentence);

        $this->assertEquals(
            'Php',
            $result1[0]
        );

        $this->assertEquals(
            'is bad choice',
            $result1[1]
        );

        $result2 = extractFirstWord($result1[1]);

        $this->assertEquals(
            'is',
            $result2[0]
        );

        $this->assertEquals(
            'bad choice',
            $result2[1]
        );
    }
    
    public function testFullSentenceSecond(): void
    {
        $sentence = 'Perl is shit';

        $result1 = extractFirstWord($sentence);

        $this->assertEquals(
            'Perl',
            $result1[0]
        );

        $this->assertEquals(
            'is shit',
            $result1[1]
        );

        $result2 = extractFirstWord($result1[1]);

        $this->assertEquals(
            'is',
            $result2[0]
        );

        $this->assertEquals(
            'shit',
            $result2[1]
        );
    }
    
    public function testOneWordSentence(): void
    {
        $sentence = 'kek';
        
        $result1 = extractFirstWord($sentence);

        $this->assertEquals(
            'kek',
            $result1[0]
        );

        $this->assertEquals(
            '',
            $result1[1]
        );
    }

    public function testEmptySentence(): void
    {
        $sentence = '';

        $result1 = extractFirstWord($sentence);

        $this->assertEquals(
            '',
            $result1[0]
        );

        $this->assertEquals(
            '',
            $result1[1]
        );
    }
}