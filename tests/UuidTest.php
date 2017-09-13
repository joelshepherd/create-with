<?php
use Illuminate\Database\Eloquent\Model;
use JoelShepherd\CreateWith\Uuid;
use PHPUnit\Framework\TestCase;

class WithUUidTest extends TestCase
{
    public function testTraitAttachesToModel()
    {
        $this->assertTrue(
            method_exists(new TestUuidModel(), 'bootUuid')
        );
    }

    public function testUuid4GenerateMethod()
    {
        $model = new TestUuidModel();

        $this->assertRegExp(
            '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i',
            $model->generateCandidateUuid()
        );
    }
}

class TestUuidModel extends Model
{
    use Uuid;
}
