<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use JoelShepherd\CreateWith\WithIpAddress;
use PHPUnit\Framework\TestCase;

class WithIpAddressTest extends TestCase
{
    public function testTraitAttachesToModel()
    {
        $this->assertTrue(
            method_exists(new TestIpAddressModel(), 'bootWithIpAddress')
        );
    }

    public function testGetIpAddress()
    {
        $model = new TestIpAddressModel();

		$this->assertTrue(false !== filter_var($model->getIpAddress(), FILTER_VALIDATE_IP));
    }
}

class TestIpAddressModel extends Model
{
    use WithIpAddress;
}
