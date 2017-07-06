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

    public function testSlugGenerateMethod()
    {
        $model = new TestSlugModel();

        $this->assertRegExp(
            '/^[A-Za-z0-9]+(?:-[a-z0-9]+)*$/',
            $model->generateCandidateSlug('')
        );

        $this->assertRegExp(
            '/^[A-Za-z0-9]+(?:-[a-z0-9]+)*$/',
            $model->generateCandidateSlug('test-title')
        );
    }
}

class TestSlugModel extends Model
{
    use WithSlug;
}
