<?php

namespace Config\Storage;

use Config\ConfigType;

/**
 * Give a simple key/value oriented storage interface
 *
 * Consider path here as being a raw string key, but please be careful with
 * tree handling, some methods needs the storage backend to be able to list
 * a complete specific subtree
 */
interface StorageInterface
{
    /**
     * Read a single value
     *
     * @param string $path      Path
     * @param int $expectedType ConfigType constant
     *
     * @return mixed            Value
     */
    public function read($path, $expectedType);

    /**
     * Tell if path exists with a value
     *
     * @param string $path Path
     *
     * @return boolean     True if path is writable
     */
    public function exists($path);

    /**
     * Tell if path is writable
     *
     * @param string $path Path
     *
     * @return boolean     True if path is writable
     */
    public function isWritable($path);

    /**
     * Write a single value
     *
     * @param string $path Path
     * @param int $type    ConfigType constant
     * @param mixed $value Value
     * @param string $safe If set to false unsafe or asynchronous operations
     *                     are allowed
     */
    public function write($path, $type, $value, $safe = true);

    /**
     * Delete one or more entries
     *
     * @param string|array $path If a string is given, it will be considered
     *                           as a single entry, if an array is given it
     *                           will be considered as a list of path
     */
    public function delete($path);
}