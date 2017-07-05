<?php
use Illuminate\Database\Eloquent\Model;
use JoelShepherd\CreateWith\WithUuid;
use PHPUnit\Framework\TestCase;

class WithUUidTest extends TestCase
{
    public function testTraitAttachesToModel()
    {
        $this->assertTrue(
            method_exists(new TestUuidModel(), 'bootWithUuid')
        );
    }
}

class TestUuidModel extends Model
{
    use WithUuid;
}
