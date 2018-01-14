<?php

namespace Sven\Helpers\Tests;

use Closure;
use Illuminate\Pipeline\Pipeline;

class PipeTest extends TestCase
{
    /** @test */
    function it_returns_a_pipeline_instance()
    {
        $this->assertInstanceOf(Pipeline::class, pipe('foo-bar'));
    }

    /** @test */
    function the_pipeline_is_successfully_executed()
    {
        pipe('foo')->through([
            new class {
                public function handle($content, Closure $next)
                {
                    return $next($content.'-bar');
                }
            },
            new class {
                public function handle($content, Closure $next)
                {
                    return $next($content.'-baz');
                }
            },
        ])->then(function ($content) {
            $this->assertEquals('foo-bar-baz', $content);
        });
    }
}
