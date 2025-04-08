<?php
declare(strict_types=1);

namespace URIConverter;

class URI
{
    const URI_WITH_SCHEME   = 1;
    const URI_WITH_AUTH     = 2;
    const URI_WITH_HOST     = 4;
    const URI_WITH_PORT     = 8;
    const URI_WITH_DIR      = 16;
    const URI_WITH_FILE     = 32;
    const URI_WITH_QUERY    = 64;
    const URI_WITH_FRAGMENT = 128;

    const URI_WITH_PATH =
                  self::URI_WITH_DIR
                | self::URI_WITH_FILE;

    const URI_BASE =
                  self::URI_WITH_SCHEME
                | self::URI_WITH_AUTH
                | self::URI_WITH_HOST
                | self::URI_WITH_PORT
                ;
    const URI_DIR =
                  self::URI_BASE
                | self::URI_WITH_DIR
                ;
    const URI_NORMAL =
                  self::URI_BASE
                | self::URI_WITH_PATH
                ;
    const URI_FULL =
                  self::URI_NORMAL
                | self::URI_WITH_QUERY
                | self::URI_WITH_FRAGMENT
                ;

    private $original_uri;
    private $relative_uri;

    private $base; // Other \URIConverter\URI object
    private $directory_index;

    private $is_parsed;
    private $is_same_origin;
    private $normalized_path;
    private $scheme;
    private $host;
    private $port;
    private $user;
    private $pass;
    private $path;
    private $dirs;
    private $filename;
    private $query;
    private $fragment;

    public function __construct(string $uri = null)
    {
        $this->clear(true);
        $this->setUri($uri);
    }

    public function clear(bool $force = false)
    {
        if ($force) {
            $this->original_uri = null;
            $this->base = null;
            $this->directory_index = null;
        }
        $this->is_parsed = false;
        $this->is_same_origin = null;
        $this->relative_uri = null;
        $this->scheme = null;
        $this->host = null;
        $this->port = null;
        $this->user = null;
        $this->pass = null;
        $this->path = null;
        $this->dirs = [];
        $this->filename = null;
        $this->query = null;
        $this->fragment = null;
        return $this;
    }

    public function setUri(string $uri = null)
    {
        if (is_null($uri)) {
            return $this;
        }
        if (parse_url($uri) !== false) {
            $this->original_uri = $uri;
            $this->parseUri();
        }
        return $this;
    }

    public function getUri()
    {
        return $this->original_uri;
    }

    public function setBase(\URIConverter\URI $base = null)
    {
        if (!$base->isParsed()) {
            $base->parseUri();
        }
        $this->base = $base;
        $this->relative_uri = null;
        return $this;
    }

    public function setDirectoryIndex(string $directory_index = null)
    {
        $this->directory_index = $directory_index;
        return $this;
    }

    public function getRelativeUri(int $options = self::URI_FULL)
    {
        $this->convertRelative();
        $relative_uri = $this->relative_uri;
        if (is_null($relative_uri)) {
            return null;
        }
        if ($options & self::URI_WITH_FILE) {
            if ($this->directory_index && preg_match('!/\z!u', $relative_uri) === 1) {
                $relative_uri .= $this->directory_index;
            }
            if ($options & self::URI_WITH_QUERY && $this->query) {
                $relative_uri .= '?' . $this->query;
            }
            if ($options & self::URI_WITH_FRAGMENT && $this->fragment) {
                $relative_uri .= '#' . $this->fragment;
            }
        } else {
            $relative_uri = preg_replace('/\/' . preg_quote($this->filename, '/') . '\z/iu', '/', $relative_uri);
        }
        return $relative_uri;
    }

    public function getAbsoluteUri(int $options = self::URI_FULL)
    {
        $absolute_uri = '';
        if (!$this->isParsed()) {
            return $absolute_uri;
        }
        if ($options & self::URI_WITH_HOST && $this->host) {
            $absolute_uri = '//';
            if ($options & self::URI_WITH_SCHEME && $this->scheme) {
                $absolute_uri = $this->scheme . ':' . $absolute_uri;
            }
            if ($options & self::URI_WITH_AUTH && $this->user && $this->pass) {
                $absolute_uri .= $this->user . ':' .  $this->pass . '@';
            }
            $absolute_uri .= $this->host;
            if ($options & self::URI_WITH_PORT && $this->port) {
                $absolute_uri .= ':' . $this->port;
            }
        }
        if ($options & self::URI_WITH_PATH) {
            $absolute_uri .= $this->path;
            if ($options & self::URI_WITH_FILE) {
                if ($this->directory_index) {
                    if (is_null($this->path)) {
                        $absolute_uri .= '/';
                    }
                    if (preg_match('!/\z!u', $absolute_uri) === 1) {
                        $absolute_uri .= $this->directory_index;
                    }
                }
                if ($options & self::URI_WITH_QUERY && $this->query) {
                    $absolute_uri .= '?' . $this->query;
                }
                if ($options & self::URI_WITH_FRAGMENT && $this->fragment) {
                    $absolute_uri .= '#' . $this->fragment;
                }
            } else {
                $absolute_uri = preg_replace('/\/' . preg_quote($this->filename, '/') . '\z/iu', '/', $absolute_uri);
            }
        }

        return $absolute_uri;
    }

    public function isParsed()
    {
        return $this->is_parsed;
    }

    private function parseUri(bool $force = false)
    {
        if (!$force && $this->is_parsed) {
            return $this;
        }
        if (!$this->original_uri) {
            return $this;
        }
        $props = parse_url($this->original_uri);
        if ($props === false) {
            //return false;
            return $this;
        }
        $this->clear();
        foreach ($props as $key => $value) {
            $this->$key = $value;
        }

        $path = (string) $this->path;
        $path = preg_replace('!/{2,}!u', '/', $path);
        if ($path === '') {
            $path = null;
        }
        if (is_string( $path ) && $path !== '/') {
            $path_is_dir = preg_match('!/\z!u', $path) === 1;
            $this->dirs = explode('/', preg_replace('!\A/|/\z!u', '', $path));
            if (!$path_is_dir) {
                $this->filename = array_pop($this->dirs);
            }
        }
        $this->normalized_path = $path;

        $this->is_parsed = true;
        return $this;
    }

    private function convertRelative(bool $force = null)
    {
        if (is_null($this->base)) {
            //return false;
            return $this;
        }
        if (!$this->isSameOrigin()) {
            //return false;
            return $this;
        }
        if (!$force && !is_null($this->relative_uri)) {
            return $this;
        }

        $from = $this->base->dirs;
        $to   = $this->dirs;
        $relPath = $to;
        foreach ($from as $depth => $dir) {
            // find first non-matching dir
            if (isset($to[$depth]) && $dir === $to[$depth]) {
                // ignore this directory
                array_shift($relPath);
            } else {
                // get number of remaining dirs to $from
                $remaining = count($from) - $depth;
                if ($remaining > 0) {
                    // add traversals up to first matching dir
                    $padLength = (count($relPath) + $remaining) * -1;
                    $relPath = array_pad($relPath, $padLength, '..');
                    break;
                }
            }
        }

        // build relative URI
        $relative_uri = implode('/', $relPath);
        if ($relative_uri) {
            $relative_uri .= '/';
        }
        $relative_uri = './' . $relative_uri . $this->filename;

        $this->relative_uri = $relative_uri;

        return $this;
    }

    private function isSameOrigin()
    {
        if (is_bool($this->is_same_origin)) {
            return $this->is_same_origin;
        }
        if (is_null($this->base)) {
            $this->is_same_origin = false;
            return $this->is_same_origin;
        }
        if (is_null($this->host)) {
            $this->is_same_origin = true;
            return $this->is_same_origin;
        }
        $options = self::URI_BASE & ~ self::URI_WITH_AUTH & ~ self::URI_WITH_PORT;
        if (!$this->scheme) {
            $options = $options & ~ self::URI_WITH_SCHEME;
        }

        $this_origin = $this->getAbsoluteUri($options);
        $base_origin = $this->base->getAbsoluteUri($options);

        $this->is_same_origin = $this_origin === $base_origin;
        return $this->is_same_origin;
    }
}
