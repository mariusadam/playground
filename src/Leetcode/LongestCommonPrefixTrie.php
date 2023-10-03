<?php

namespace App\Leetcode;

class TrieNode
{
    /**
     * @var array<string, TrieNode>
     */
    private array $charactersMap = [];

    public function getNodeForChar(string $char): ?TrieNode
    {
        return $this->charactersMap[$char] ?? null;
    }

    public function addNewNode(string $char): TrieNode
    {
        if (isset($this->charactersMap[$char])) {
            throw new \InvalidArgumentException(sprintf('Char "%s" already present in the trie', $char));
        }

        $node = new TrieNode();
        $this->charactersMap[$char] = $node;

        return $node;
    }

    public function containsOnlyChar(string $char): bool
    {
        return isset($this->charactersMap[$char]) && count($this->charactersMap) === 1;
    }
}

class Trie
{
    private TrieNode $root;

    public function __construct()
    {
        $this->root = new TrieNode();
    }

    public function insert(string $str): void
    {
        $strLength = strlen($str);
        $currentNode = $this->root;
        for ($i = 0; $i < $strLength; $i++) {
            $nodeForChar = $currentNode->getNodeForChar($str[$i]);
            if (null === $nodeForChar) {
                $nodeForChar = $currentNode->addNewNode($str[$i]);
            }
            $currentNode = $nodeForChar;
        }
    }

    public function findLongestCommonPrefix(string $str): string
    {
        $strLength = strlen($str);
        $longestPrefix = '';
        $currentNode = $this->root;
        $i = 0;
        while ($i < $strLength && $currentNode !== null && $currentNode->containsOnlyChar($str[$i])) {
            $longestPrefix .= $str[$i];
            $currentNode = $currentNode->getNodeForChar($str[$i]);
            $i++;
        }

        return $longestPrefix;
    }
}

/**
 * @link https://leetcode.com/problems/longest-common-prefix/
 */
class LongestCommonPrefixTrie
{
    /**
     * @param array<string> $strs
     */
    public function longestCommonPrefix(array $strs): string
    {
        $shortestStringLength = PHP_INT_MAX;
        $trie = new Trie();
        foreach ($strs as $str) {
            $trie->insert($str);
            $strLength = strlen($str);
            if ($strLength < $shortestStringLength) {
                $shortestString = $str;
                $shortestStringLength = $strLength;
            }
        }

        return $trie->findLongestCommonPrefix($shortestString);
    }
}
