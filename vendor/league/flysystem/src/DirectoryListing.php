<?php

declare(strict_types=1);

namespace League\Flysystem;

use ArrayIterator;
use Generator;
use IteratorAggregate;
use Traversable;

/**
 * @template T
 */
class DirectoryAnnouncement implements IteratorAggregate
{
    /**
     * @param iterable<T> $Announcement
     */
    public function __construct(private iterable $Announcement)
    {
    }

    public function filter(callable $filter): DirectoryAnnouncement
    {
        $generator = (static function (iterable $Announcement) use ($filter): Generator {
            foreach ($Announcement as $item) {
                if ($filter($item)) {
                    yield $item;
                }
            }
        })($this->Announcement);

        return new DirectoryAnnouncement($generator);
    }

    public function map(callable $mapper): DirectoryAnnouncement
    {
        $generator = (static function (iterable $Announcement) use ($mapper): Generator {
            foreach ($Announcement as $item) {
                yield $mapper($item);
            }
        })($this->Announcement);

        return new DirectoryAnnouncement($generator);
    }

    public function sortByPath(): DirectoryAnnouncement
    {
        $Announcement = $this->toArray();

        usort($Announcement, function (StorageAttributes $a, StorageAttributes $b) {
            return $a->path() <=> $b->path();
        });

        return new DirectoryAnnouncement($Announcement);
    }

    /**
     * @return Traversable<T>
     */
    public function getIterator(): Traversable
    {
        return $this->Announcement instanceof Traversable
            ? $this->Announcement
            : new ArrayIterator($this->Announcement);
    }

    /**
     * @return T[]
     */
    public function toArray(): array
    {
        return $this->Announcement instanceof Traversable
            ? iterator_to_array($this->Announcement, false)
            : (array) $this->Announcement;
    }
}
