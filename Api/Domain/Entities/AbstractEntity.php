<?php

declare(strict_types=1);

namespace Demo\Api\Domain\Entities;

use Demo\Api\Domain\{
    Contracts\EntityInterface,
    Contracts\ValueObjectInterface
};

abstract class AbstractEntity implements EntityInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var int
     */
    protected $categoryId;

    /**
     * @var ?string
     */
    protected $description;

    /**
     * @var bool
     */
    protected $isVisible;

    /**
     * @var ValueObjectInterface
     */
    protected $type;

    /**
     * @var ?\DateTime
     */
    protected $date;

    /**
     * @var ?\DateTime
     */
    protected $update;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function isVisible(): bool
    {
        return $this->isVisible;
    }

    public function getType(): ValueObjectInterface
    {
        return $this->type;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function getUpdate(): ?\DateTime
    {
        return $this->update;
    }

    public function toArray(): array
    {
        $reflection = new \ReflectionClass($this);
        $properties = $reflection->getProperties();

        $array = [];

        foreach ($properties as $property) {
            $method = 'get'. ucfirst($property->geName());

            if (method_exists($this, $method)) {
                $array[$property->geName()] = call_user_func(array($this, $method));
            }
        }

        return $array;
    }
}