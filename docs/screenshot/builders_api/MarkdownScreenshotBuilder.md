# MarkdownScreenshotBuilder

* `wrapper(string $template, array $context)`:
The HTML file that wraps the markdown content, rendered from a Twig template.

* `wrapperFile(string $path)`:
The HTML file that wraps the markdown content.

* `files(Stringable|string $paths)`:

* `cookies(array $cookies)`:

* `setCookie(string $key, Symfony\Component\HttpFoundation\Cookie|array $cookie)`:

* `forwardCookie(string $name)`:

* `width(int $width)`:
The device screen width in pixels. (Default 800).

* `height(int $height)`:
The device screen width in pixels. (Default 600).

* `clip(bool $bool)`:
Define whether to clip the screenshot according to the device dimensions. (Default false).

* `format(Sensiolabs\GotenbergBundle\Enumeration\ScreenshotFormat $format)`:
The image compression format, either "png", "jpeg" or "webp". (default png).

* `quality(int $quality)`:
The compression quality from range 0 to 100 (jpeg only). (default 100).

* `omitBackground(bool $bool)`:
Hides default white background and allows generating screenshot with
transparency. (Default false).

* `optimizeForSpeed(bool $bool)`:
Define whether to optimize image encoding for speed, not for resulting size. (Default false).

* `waitDelay(string $delay)`:
Sets the duration (i.e., "1s", "2ms", etc.) to wait when loading an HTML
document before converting it to screenshot. (default None).

* `waitForExpression(string $expression)`:
Sets the JavaScript expression to wait before converting an HTML
document to screenshot until it returns true. (default None).
For instance: "window.status === 'ready'".

* `emulatedMediaType(Sensiolabs\GotenbergBundle\Enumeration\EmulatedMediaType $mediaType)`:
Forces Chromium to emulate, either "screen" or "print". (default "print").

* `userAgent(string $userAgent)`:
Override the default User-Agent HTTP header. (default None).

* `extraHttpHeaders(array $headers)`:
Sets extra HTTP headers that Chromium will send when loading the HTML
document. (default None). (overrides any previous headers).

* `addExtraHttpHeaders(array $headers)`:
Adds extra HTTP headers that Chromium will send when loading the HTML
document. (default None).

* `failOnHttpStatusCodes(array $statusCodes)`:
Return a 409 Conflict response if the HTTP status code from
the main page is not acceptable. (default [499,599]). (overrides any previous configuration).

* `failOnResourceHttpStatusCodes(array $statusCodes)`:
Return a 409 Conflict response if the HTTP status code from at least one resource is not acceptable.
(default None). (overrides any previous configuration).

* `failOnResourceLoadingFailed(bool $bool)`:
Forces GotenbergScreenshot to return a 409 Conflict response if there are
exceptions load at least one resource. (default false).

* `failOnConsoleExceptions(bool $bool)`:
Forces GotenbergScreenshot to return a 409 Conflict response if there are
exceptions in the Chromium console. (default false).

* `skipNetworkIdleEvent(bool $bool)`:

* `assets(string $paths)`:
Adds additional files, like images, fonts, stylesheets, and so on (overrides any previous files).

* `addAsset(string $path)`:
Adds a file, like an image, font, stylesheet, and so on.

* `downloadFrom(array $downloadFrom)`:

* `webhookConfiguration(string $name)`:
Providing an existing $name from the configuration file, it will correctly set both success and error webhook URLs as well as extra_http_headers if defined.

* `webhookUrl(string $url, ?string $method)`:
Sets the webhook for cases of success.
Optionaly sets a custom HTTP method for such endpoint among : POST, PUT or PATCH.

* `errorWebhookUrl(?string $url, ?string $method)`:
Sets the webhook for cases of error.
Optionaly sets a custom HTTP method for such endpoint among : POST, PUT or PATCH.

* `webhookExtraHeaders(array $extraHeaders)`:
Extra headers that will be provided to the webhook endpoint. May it either be Success or Error.

* `addCookies(array $cookies)`:
Add cookies to store in the Chromium cookie jar.

