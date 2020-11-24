<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 30/01/2018
 * Time: 12:24
 *
 * This Interface is base infrastructure for All Reader
 */

namespace app\core\Managers\FileManager;


interface ReaderInterface
{
    public function __construct(string $file, bool $formate = false);

    public function createNode(string $name, array $attributes, array $values): bool;

    public function removeNode(string $name): void;

    public function getNodeAttributes(string $name, array $attributes): array;

    public function updateNode(string $name, array $attributes, array $values): bool;
}
