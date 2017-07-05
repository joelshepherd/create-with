<?php
use Illuminate\Database\Eloquent\Model;
use JoelShepherd\CreateWith\WithSlug;
use PHPUnit\Framework\TestCase;

class WithSlugTest extends TestCase
{
    public function testTraitAttachesToModel()
    {
        $this->assertTrue(
            method_exists(new TestSlugModel(), 'bootWithSlug')
        );
    }
}

class TestSlugModel extends Model
{
    use WithSlug;
}
