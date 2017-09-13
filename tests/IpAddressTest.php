<?php
use Illuminate\Database\Eloquent\Model;
use JoelShepherd\CreateWith\IpAddress;
use PHPUnit\Framework\TestCase;

class IpAddressTest extends TestCase
{
    public function testTraitAttachesToModel()
    {
        $this->assertTrue(
            method_exists(new TestIpAddressModel(), 'bootIpAddress')
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
    use IpAddress;
}
