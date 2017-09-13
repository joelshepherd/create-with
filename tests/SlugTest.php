<?php
use Illuminate\Database\Eloquent\Model;
use JoelShepherd\CreateWith\Slug;
use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    public function testTraitAttachesToModel()
    {
        $this->assertTrue(
            method_exists(new TestSlugModel(), 'bootSlug')
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
    use Slug;
}
