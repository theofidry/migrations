<?php

declare(strict_types=1);

namespace Doctrine\Migrations\Tests\Version;

use Doctrine\Migrations\Version\ExecutionResult;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ExecutionResultTest extends TestCase
{
    public function testHasSql() : void
    {
        self::assertTrue($this->versionExecutionResult->hasSql());
    }

    public function testGetSetSql() : void
    {
        self::assertSame(['SELECT 1'], $this->versionExecutionResult->getSql());

        $this->versionExecutionResult->setSql(['SELECT 2']);

        self::assertSame(['SELECT 2'], $this->versionExecutionResult->getSql());
    }

    public function testGetSetParams() : void
    {
        self::assertSame([1], $this->versionExecutionResult->getParams());

        $this->versionExecutionResult->setParams([2]);

        self::assertSame([2], $this->versionExecutionResult->getParams());
    }

    public function testGetTypes() : void
    {
        self::assertSame([2], $this->versionExecutionResult->getTypes());

        $this->versionExecutionResult->setTypes([3]);

        self::assertSame([3], $this->versionExecutionResult->getTypes());
    }

    public function testGetSetTime() : void
    {
        self::assertNull($this->versionExecutionResult->getTime());

        $this->versionExecutionResult->setTime(5.5);

        self::assertSame(5.5, $this->versionExecutionResult->getTime());
    }

    public function testGetSetMemory() : void
    {
        self::assertNull($this->versionExecutionResult->getMemory());

        $this->versionExecutionResult->setMemory(555555.0);

        self::assertSame(555555.0, $this->versionExecutionResult->getMemory());
    }

    public function testSkipped() : void
    {
        self::assertFalse($this->versionExecutionResult->isSkipped());

        $this->versionExecutionResult->setSkipped(true);

        self::assertTrue($this->versionExecutionResult->isSkipped());
    }

    public function testError() : void
    {
        self::assertFalse($this->versionExecutionResult->hasError());

        $this->versionExecutionResult->setError(true);

        self::assertTrue($this->versionExecutionResult->hasError());
    }

    public function testException() : void
    {
        self::assertNull($this->versionExecutionResult->getException());

        $exception = new InvalidArgumentException();

        $this->versionExecutionResult->setException($exception);

        self::assertSame($exception, $this->versionExecutionResult->getException());
    }

    protected function setUp() : void
    {
        $this->versionExecutionResult = new ExecutionResult(
            ['SELECT 1'],
            [1],
            [2]
        );
    }
}
