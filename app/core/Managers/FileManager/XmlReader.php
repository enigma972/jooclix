<?php
/**
 * Created by PhpStorm.
 * User: Lusavuvu
 * Date: 12/01/2018
 * Time: 18:15
 */

namespace app\core\Managers\FileManager;


class XmlReader implements ReaderInterface
{
    protected $xml;

    /**
     * XMLReader constructor.
     * @param string $file
     * @param bool $formate
     */
    public function __construct(string $file, bool $formate = false)
    {
        $this->xml = new \DOMDocument('1.0', 'utf-8');
        $this->xml->formatOutput = ($formate == true) ? true : false;

        if (file_exists($file) && stripos($file, '.xml') !== false)
            $this->xml->load($file);
        else
            throw new \InvalidArgumentException('Le fichier que vous avez passé n\'est pas valide');
    }

    /**
     * @param string $name
     * @param array $attributes
     * @param array $values
     * @return bool
     */
    public function createNode(string $name, array $attributes, array $values): bool
    {
        // TODO: Implement createNode() method.

        return true;
    }

    /**
     * @param string $name
     */
    public function removeNode(string $name): void
    {
        // TODO: Implement removeNode() method.
    }

    /**
     * @param string $name
     * @param array $attributes
     * @return array
     */
    public function getNodeAttributes(string $name, array $attributes): array
    {

        $elements = $this->xml->getElementsByTagName($name);
        $attributes_number = count($attributes);


        foreach ($elements as $element) {
            $i = 0;
            $value = [];

            while ($i < $attributes_number) {

                if ($element->hasAttribute($attributes[$i]))
                    $value[$attributes[$i]] = $element->getAttribute($attributes[$i]);
                else
                    $value[$i] = "";

                $i++;
            }
            $list [] = $value;
        }

        return $list;
    }

    /**
     * @param string $name
     * @param array $attributes
     * @param array $values
     * @return bool
     */
    public function updateNode(string $name, array $attributes, array $values): bool
    {
        // TODO: Implement updateNode() method.

        return true;
    }
}
