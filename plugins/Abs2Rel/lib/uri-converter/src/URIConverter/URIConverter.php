<?php
declare(strict_types=1);

namespace URIConverter;

use \URIConverter\URI;

class URIConverter
{
    private $fromURI;
    private $toURI;

    public function __construct($from_uri)
    {
        $this->fromURI = new URI();
        $this->toURI = new URI();
        $this->toURI->setBase($this->fromURI);
        if ($from_uri) {
            $this->setBase($from_uri);
        }
    }

    public function setBase($from_uri)
    {
        if (is_object($from_uri) && $from_uri instanceof \URIConverter\URI) {
            $from_uri = $from_uri->getUri();
        }
        $this->fromURI->clear();
        $this->fromURI->setUri($from_uri);
        return $this;
    }

    public function setTarget($to_uri)
    {
        if (is_object($to_uri) && $to_uri instanceof \URIConverter\URI) {
            $to_uri = $to_uri->getUri();
        }
        $this->toURI->clear();
        $this->toURI->setUri($to_uri);
        return $this;
    }

    public function setDirectoryIndex(string $directory_index = null)
    {
        $this->toURI->setDirectoryIndex($directory_index);
        return $this;
    }

    public function getRelativeUri(int $options = 0)
    {
        return $this->toURI->getRelativeUri($options);
    }

    public function getAbsoluteUri(int $options = 0)
    {
        $check_options = URI::URI_BASE;
        $toOrigin = $this->toURI->getAbsoluteUri($check_options);
        if (strpos($toOrigin, '//') === 0) {
            $check_options &= ~ URI::URI_WITH_SCHEME;
        }
        $fromOrigin = $this->fromURI->getAbsoluteUri($check_options);
        if ($toOrigin === $fromOrigin) {
            return $this->toURI->getAbsoluteUri($options);
        } else {
            return $this->toURI->getUri();
        }
    }
}
