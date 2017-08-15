<?php
use JoelShepherd\CreateWith\Exceptions\EntropyException;
use JoelShepherd\CreateWith\Support;
use PHPUnit\Framework\TestCase;

class SupportTest extends TestCase
{
    public function testAttemptThrowsExceptionAfterMaxAttempts()
    {
        $this->expectException(EntropyException::class);

        $attempts = 0;
        while ($attempts < Support::$maxAttempts + 1) {
            Support::attempt($attempts);
        }
    }
}
