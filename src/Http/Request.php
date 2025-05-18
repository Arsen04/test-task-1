<?php

declare(strict_types=1);

namespace App\Http;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

final class Request implements ServerRequestInterface
{
    public function __construct(
        private UriInterface $uri,
        private StreamInterface $body
    ) {
    }

    public function getMethod(): string
    {
        return '';
    }

    public function withMethod($method): self
    {
        return $this;
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    public function withUri(UriInterface $uri, $preserveHost = false): self
    {
        return $this;
    }

    public function getHeaders(): array
    {
        return [];
    }

    public function hasHeader($name): bool
    {
        return true;
    }

    public function getHeader($name): array
    {
        return [];
    }

    public function withHeader($name, $value): self
    {
        return $this;
    }

    public function getQueryParams(): array
    {
        return [];
    }

    public function withQueryParams(array $query): self
    {
        return $this;
    }

    public function getParsedBody(): array
    {
        return [];
    }

    public function withParsedBody(mixed $data): self
    {
        return $this;
    }

    public function getProtocolVersion(): string
    {
        return '';
    }

    public function withProtocolVersion(string $version): MessageInterface
    {
        return $this;
    }

    public function getHeaderLine(string $name): string
    {
        return '';
    }

    public function withAddedHeader(string $name, mixed $value): MessageInterface
    {
        return $this;
    }

    public function withoutHeader(string $name): MessageInterface
    {
        return $this;
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        return $this;
    }

    public function getRequestTarget(): string
    {
        return '';
    }

    public function withRequestTarget(string $requestTarget): RequestInterface
    {
        return $this;
    }

    public function getServerParams(): array
    {
        return [];
    }

    public function getCookieParams(): array
    {
        return [];
    }

    public function withCookieParams(array $cookies): ServerRequestInterface
    {
        return $this;
    }

    public function getUploadedFiles(): array
    {
        return [];
    }

    public function withUploadedFiles(array $uploadedFiles): ServerRequestInterface
    {
        return $this;
    }

    public function getAttributes(): array
    {
        return [];
    }

    public function getAttribute(string $name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
    }

    public function withAttribute(string $name, $value): ServerRequestInterface
    {
        return $this;
    }

    public function withoutAttribute(string $name): ServerRequestInterface
    {
        return $this;
    }
}
