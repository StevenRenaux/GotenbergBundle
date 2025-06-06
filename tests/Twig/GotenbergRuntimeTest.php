<?php

namespace Sensiolabs\GotenbergBundle\Tests\Twig;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Sensiolabs\GotenbergBundle\Builder\Pdf\AbstractChromiumPdfBuilder;
use Sensiolabs\GotenbergBundle\Builder\Screenshot\AbstractChromiumScreenshotBuilder;
use Sensiolabs\GotenbergBundle\Twig\GotenbergRuntime;

#[CoversClass(GotenbergRuntime::class)]
class GotenbergRuntimeTest extends TestCase
{
    public function testGetAssetThrowsPerDefault(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The gotenberg_asset function must be used in a Gotenberg context.');
        $runtime = new GotenbergRuntime();
        $runtime->getAssetUrl('foo');
    }

    public function testGetAssetThrowsWhenBuilderIsNotSet(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The gotenberg_asset function must be used in a Gotenberg context.');
        $runtime = new GotenbergRuntime();
        $runtime->setBuilder(null);
        $runtime->getAssetUrl('foo');
    }

    public function testGetAssetCallChromiumPdfBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumPdfBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame('foo', $runtime->getAssetUrl('foo'));
    }

    public function testGetAssetCallChromiumScreenshotBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumScreenshotBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame('foo', $runtime->getAssetUrl('foo'));
    }

    public function testGetFontThrowsPerDefault(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The gotenberg_font function must be used in a Gotenberg context.');
        $runtime = new GotenbergRuntime();
        $runtime->getFont('foo.ttf', 'my_font');
    }

    public function testGetFontThrowsWhenBuilderIsNotSet(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The gotenberg_font function must be used in a Gotenberg context.');
        $runtime = new GotenbergRuntime();
        $runtime->setBuilder(null);
        $runtime->getFont('foo.ttf', 'my_font');
    }

    public function testGetFontCallChromiumPdfBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumPdfBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo.ttf')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame(
            '@font-face {
                font-family: "my_font";
                src: url("foo.ttf");
            }',
            $runtime->getFont('foo.ttf', 'my_font'),
        );
    }

    public function testGetFontCallChromiumScreenshotBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumScreenshotBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo.ttf')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame(
            '@font-face {
                font-family: "my_font";
                src: url("foo.ttf");
            }',
            $runtime->getFont('foo.ttf', 'my_font'),
        );
    }

    public function testGetFontStyleTagThrowsPerDefault(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The gotenberg_font_style_tag function must be used in a Gotenberg context.');
        $runtime = new GotenbergRuntime();
        $runtime->getFontStyleTag('foo.ttf', 'my_font');
    }

    public function testGetFontStyleTagCallChromiumPdfBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumPdfBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo.ttf')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame(
            '<style>@font-face {font-family: "my_font";src: url("foo.ttf");}</style>',
            $runtime->getFontStyleTag('foo.ttf', 'my_font'),
        );
    }

    public function testGetFontStyleTagCallChromiumScreenshotBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumScreenshotBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo.ttf')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame(
            '<style>@font-face {font-family: "my_font";src: url("foo.ttf");}</style>',
            $runtime->getFontStyleTag('foo.ttf', 'my_font'),
        );
    }

    public function testGetFontFaceThrowsPerDefault(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage('The gotenberg_font_face function must be used in a Gotenberg context.');
        $runtime = new GotenbergRuntime();
        $runtime->getFontFace('foo.ttf', 'my_font');
    }

    public function testGetFontFaceCallChromiumPdfBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumPdfBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo.ttf')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame(
            '@font-face {font-family: "my_font";src: url("foo.ttf");}',
            $runtime->getFontFace('foo.ttf', 'my_font'),
        );
    }

    public function testGetFontFaceCallChromiumScreenshotBuilder(): void
    {
        $runtime = new GotenbergRuntime();
        $builder = $this->createMock(AbstractChromiumScreenshotBuilder::class);
        $builder
            ->expects($this->once())
            ->method('addAsset')
            ->with('foo.ttf')
        ;
        $runtime->setBuilder($builder);
        $this->assertSame(
            '@font-face {font-family: "my_font";src: url("foo.ttf");}',
            $runtime->getFontFace('foo.ttf', 'my_font'),
        );
    }
}
