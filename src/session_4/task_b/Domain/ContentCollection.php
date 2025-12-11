<?php

class ContentCollection
{
    /**
     * Undocumented variable
     *
     * @var array<Content>
     */
    private array $contents;

    public function __construct()
    {
        $this->contents = [];
    }

    /**
     *
     * @param Content $content
     * @return void
     */
    public function add(Content $content): void
    {
        $this->contents[] = $content;
    }

    /**
     *
     * @return array<Content>
     */
    public function get(): array
    {
        return $this->contents;
    }
}
