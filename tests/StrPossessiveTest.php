<?php

namespace Sven\Helpers\Tests;

class StrPossessiveTest extends TestCase
{
    /** @test */
    public function it_appends_apostrophe_and_s_to_words_ending_in_anything_but_an_s_z_or_ch()
    {
        $this->assertEquals('John\'s', str_possessive('John'));
        $this->assertEquals('Mike\'s', str_possessive('Mike'));
    }

    /** @test */
    public function it_only_appends_an_apostrophe_if_the_word_ends_with_s_z_or_ch()
    {
        $this->assertEquals('Iris\'', str_possessive('Iris'));
        $this->assertEquals('Angus\'', str_possessive('Angus'));

        $this->assertEquals('Aziz\'', str_possessive('Aziz'));

        $this->assertEquals('Finch\'', str_possessive('Finch'));
    }
}
