<?php

namespace Sven\Helpers\Tests;

class CurrentRouteTest extends TestCase
{
    /**
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['router']->get('test', ['as' => 'test', 'uses' => function () {
            return 'test route';
        }]);
    }

    /** @test */
    public function it_gets_current_route()
    {
        $this->call('GET', 'test');

        $this->assertTrue(active_route('test'));
        $this->assertFalse(active_route('not.test'));
    }

    /** @test */
    public function it_gets_active_route_from_array()
    {
        $this->call('GET', 'test');

        $this->assertTrue(active_route(['foo', 'test', 'bar']));
        $this->assertFalse(active_route(['foo', 'bar', 'baz']));
    }

    /** @test */
    public function it_returns_custom_positive()
    {
        $this->call('GET', 'test');

        $this->assertEquals('positive', active_route('test', 'positive'));
    }

    /** @test */
    public function it_returns_custom_negative()
    {
        $this->call('GET', 'test');

        $this->assertEquals('negative', active_route('foo', null, 'negative'));
    }
}